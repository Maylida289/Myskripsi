<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;

class OperatorController extends Controller
{
    public function data()
    {   
        $totalTki = DB::table('pendaftaran_tki')->count();
        $totalMedical =  DB::table('medical_checkup')->count();
        $totalBlk =  DB::table('blk')->count();
        $totalBerangkat = DB::table('pemberangkatan')->count();
        return view('operator.dashboard.dashboard',  ['totalTki' => $totalTki, 'totalMedical' => $totalMedical, 'totalBlk' => $totalBlk, 'totalBerangkat' => $totalBerangkat]);
    }

    public function validasiTki()
    {   
        $validasiTki = DB::table('hasil_validasi')->get();
        return view('operator.validasi_tki.data',  ['validasiTki' => $validasiTki]);
    }
    
    public function uploadKtp(Request $request, $id)
    {       
        $request->validate([
            'filename' => 'required',
            'filename.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000'
        ]);
        if ($request->hasfile('filename')) {            
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('filename')->getClientOriginalName());
            $request->file('filename')->move(public_path('images'), $filename);

            DB::table('pendaftaran_tki')->where('id', $id)
            ->update([
               'ktp' => $filename
         
            ]);
           /// TODO: Showing status upload on this line
        }else{
            echo'Gagal';
        }
    }

    public function pemberangkatan()
    {   
        $validasiTki = DB::table('pemberangkatan')->get();
        return view('operator.pemberangkatan.data',  ['validasiTki' => $validasiTki]);
    }

    public function detailPemberangkatanTki ($id)
    {
        $detail_tki = DB::table('pemberangkatan')->where('id', $id)->first();
        return view('operator/pemberangkatan/detail', compact('detail_tki'));
    }

    public function listP3mi()
    {   
        $listP3mi = DB::table('p3mis')->get();
        return view('operator.list_p3mi.data',  ['listP3mi' => $listP3mi]);
    }

    public function listTki()
    {   
        $listTki = DB::table('pendaftaran_tki')->get();
        return view('operator.dashboard.list_dashboard.total_tki',  ['listTki' => $listTki]);
    }

    public function detailTki ($id)
    {
        $detail_tki = DB::table('pendaftaran_tki')->where('id', $id)->first();
        return view('operator.dashboard.list_dashboard.detail.detail_tki', compact('detail_tki'));
    }


    public function listMedical()
    {   
        $listMedical = DB::table('medical_checkup')->get();
        return view('operator.dashboard.list_dashboard.medical',  ['listMedical' => $listMedical]);
    }

    public function detailMedical ($id)
    {
        $detail_medical = DB::table('medical_checkup')->where('id', $id)->first();
        return view('operator/dashboard/list_dashboard/detail/detail_medical', compact('detail_medical'));
    }

    public function listBlk()
    {   
        $listBlk = DB::table('blk')->get();
        return view('operator.dashboard.list_dashboard.blk',  ['listBlk' => $listBlk]);
    }

    public function detailBlk ($id)
    {
        $detail_blk = DB::table('blk')->where('id', $id)->first();
        return view('operator/dashboard/list_dashboard/detail/detail_blk', compact('detail_blk'));
    }
    public function listBerangkat()
    {   
        $listPemberangkatan = DB::table('pemberangkatan')->get();
        return view('operator.dashboard.list_dashboard.pemberangkatan',  ['listPemberangkatan' => $listPemberangkatan]);
    }

    public function detailBerangkat ($id)
    {
        $detail_pemberangkatan = DB::table('pemberangkatan')->where('id', $id)->first();
        return view('operator/dashboard/list_dashboard/detail/detail_pemberangkatan', compact('detail_pemberangkatan'));
    }

    public function statusTki($typeStatus = null)
    {   
        // Status Medical
        if($typeStatus === 'medical'){
            $active = 1;
            $statusTki = DB::table('validasi_berkas')
            ->whereNull('sertifikat_kesehatan')
            ->get();
            return view('operator.status_tki.data', ['statusTki' => $statusTki, 'active' => $active]);
        }
        // Status Blk
        elseif($typeStatus === 'blk'){
            $active = 3;
            $statusTki = DB::table('validasi_berkas')->whereNotNull('sertifikat_kesehatan')->whereNull('sertifikat_blk')->get();
            return view('operator.status_tki.data', ['statusTki' => $statusTki, 'active' => $active]);
        }
        // Status Waiting
        elseif($typeStatus === 'validasi'){
            $active = 5;
            $statusTki = DB::table('validasi_berkas')->whereNotNull('sertifikat_blk')->whereNull('hasil_validasi')->get();
             return view('operator.status_tki.data', ['statusTki' => $statusTki, 'active' => $active]);
        }
        // Status Approved
        elseif($typeStatus === 'hasil-validasi'){
            $active = 7;
            $statusTki = DB::table('validasi_berkas')->whereNotNull('sertifikat_kesehatan')->whereNotNull('sertifikat_blk')->whereNull('berangkat')->get();
             return view('operator.status_tki.data', ['statusTki' => $statusTki, 'active' => $active]);
        }
        // Status Berangkat
        elseif($typeStatus === 'berangkat'){
            $active = 9;
            $statusTki = DB::table('pemberangkatan')->get();
             return view('operator.status_tki.data', ['statusTki' => $statusTki, 'active' => $active]);
        }
        // Status Menampilkan semua status
        else{
            $active = 0;
            $statusTki = DB::table('validasi_berkas')->get();
             return view('operator.status_tki.data', ['statusTki' => $statusTki, 'active' => $active]);
        }
       
    }

}
