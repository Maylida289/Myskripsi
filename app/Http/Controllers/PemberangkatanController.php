<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;


class PemberangkatanController extends Controller
{

    public function data()
    {   
        $totalTki = DB::table('pendaftaran_tki')->count();
        $totalMedical =  DB::table('medical_checkup')->count();
        $totalBlk =  DB::table('blk')->count();
        $totalBerangkat = DB::table('pemberangkatan')->count();
        return view('pemberangkatan.dashboard.dashboard',  ['totalTki' => $totalTki, 'totalMedical' => $totalMedical, 'totalBlk' => $totalBlk, 'totalBerangkat' => $totalBerangkat]);
    }

    public function listTkiPemberangkatan()
    {
        $list_tki = DB::table('hasil_validasi')->get();
        return view('pemberangkatan.list_tki.data', ['list_tki' => $list_tki]);
    }

    public function detailTkiUploadAsset ($id)
    {
        $detail_tki = DB::table('hasil_validasi')->where('id', $id)->first();
        return view('pemberangkatan/list_tki/detail', compact('detail_tki'));
    }

    public function uploadPasporAndVisa(Request $request, $id)
    {       
        $request->validate([
            'paspor' => 'required',
            'paspor.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000'
        ]);
        $paspor = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('paspor')->getClientOriginalName());
            $request->file('paspor')->move(public_path('images'), $paspor);

        $request->validate([
                'visa' => 'required',
                'visa.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000'
            ]);   
        $visa = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('visa')->getClientOriginalName());
                $request->file('visa')->move(public_path('images'), $visa);
    

            DB::table('hasil_validasi')->where('id', $id)
            ->update([
               'paspor' => $paspor,
               'visa' => $visa
         
            ]);
            return redirect('/pemberangkatan')->with('status-upload', 'Paspor dan Visa berhasil di upload!');
    }

    public function listTki()
    {   
        $listTki = DB::table('pendaftaran_tki')->get();
        return view('pemberangkatan.dashboard.list_dashboard.total_tki',  ['listTki' => $listTki]);
    }

    public function detailTki ($id)
    {
        $detail_tki = DB::table('pendaftaran_tki')->where('id', $id)->first();
        return view('pemberangkatan.dashboard.list_dashboard.detail.detail_tki', compact('detail_tki'));
    }


    public function listMedical()
    {   
        $listMedical = DB::table('medical_checkup')->get();
        return view('pemberangkatan.dashboard.list_dashboard.medical',  ['listMedical' => $listMedical]);
    }

    public function detailMedical ($id)
    {
        $detail_medical = DB::table('medical_checkup')->where('id', $id)->first();
        return view('pemberangkatan/dashboard/list_dashboard/detail/detail_medical', compact('detail_medical'));
    }

    public function listBlk()
    {   
        $listBlk = DB::table('blk')->get();
        return view('pemberangkatan.dashboard.list_dashboard.blk',  ['listBlk' => $listBlk]);
    }

    public function detailBlk ($id)
    {
        $detail_blk = DB::table('blk')->where('id', $id)->first();
        return view('pemberangkatan/dashboard/list_dashboard/detail/detail_blk', compact('detail_blk'));
    }
    public function listBerangkat()
    {   
        $listPemberangkatan = DB::table('pemberangkatan')->get();
        return view('pemberangkatan.dashboard.list_dashboard.pemberangkatan',  ['listPemberangkatan' => $listPemberangkatan]);
    }

    public function detailBerangkat ($id)
    {
        $detail_pemberangkatan = DB::table('pemberangkatan')->where('id', $id)->first();
        return view('pemberangkatan/dashboard/list_dashboard/detail/detail_pemberangkatan', compact('detail_pemberangkatan'));
    }

    public function statusTki()
    {
        $statusTki = DB::table('validasi_berkas')->get();
        return view('pemberangkatan.status_tki.data', ['statusTki' => $statusTki]);
    }
}
