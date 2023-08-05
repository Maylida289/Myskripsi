<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function dashboard()
    {
        // Menampilkan jumlah total 
        $totalTki = DB::table('pendaftaran_tki')->count();
        $totalMedical =  DB::table('medical_checkup')->count();
        $totalBlk =  DB::table('blk')->count();
        $totalBerangkat = DB::table('pemberangkatan')->count();
        //------------------------------------------------
        return view('admin.dashboard.dashboard', ['totalTki' => $totalTki, 'totalMedical' => $totalMedical, 'totalBlk' => $totalBlk, 'totalBerangkat' => $totalBerangkat]);
    }

    public function validationDataTki(){

        $list_tki = DB::table('validasi_berkas')->get();
        return view('admin.file_validation_tki.data', ['validasi_berkas' => $list_tki]);
    }

    public function detailTki ($id)
    {
        $detail_tki = DB::table('validasi_berkas')->where('id', $id)->first();
        return view('admin/file_validation_tki/detail', compact('detail_tki'));
    }

    public function approved ($id){
        DB::table('validasi_berkas')->where('id', $id)
        ->update([
           'hasil_validasi' => 'Approved'
        ]);
        return redirect('validation-admin')->with('status-validation', 'Calon TKI berhasil di verifikasi !');

    }

    public function rejected ($id, $information){

        DB::table('validasi_berkas')->where('id', $id)
        ->update([
           'hasil_validasi' => $information
        ]);
        return redirect('validation-admin')->with('status-validation', 'Calon TKI berhasil di verifikasi !');
    }

    public function listTki()
    {   
        $listTki = DB::table('pendaftaran_tki')->get();
        return view('admin.dashboard.list_dashboard.total_tki',  ['listTki' => $listTki]);
    }


    public function listMedical()
    {   
        $listMedical = DB::table('medical_checkup')->get();
        return view('admin.dashboard.list_dashboard.medical',  ['listMedical' => $listMedical]);
    }

    public function detailMedical ($id)
    {
        $detail_medical = DB::table('medical_checkup')->where('id', $id)->first();
        return view('admin/dashboard/list_dashboard/detail/detail_medical', compact('detail_medical'));
    }

    public function listBlk()
    {   
        $listBlk = DB::table('blk')->get();
        return view('admin.dashboard.list_dashboard.blk',  ['listBlk' => $listBlk]);
    }

    public function detailBlk ($id)
    {
        $detail_blk = DB::table('blk')->where('id', $id)->first();
        return view('admin/dashboard/list_dashboard/detail/detail_blk', compact('detail_blk'));
    }
    public function listBerangkat()
    {   
        $listPemberangkatan = DB::table('pemberangkatan')->get();
        return view('admin.dashboard.list_dashboard.pemberangkatan',  ['listPemberangkatan' => $listPemberangkatan]);
    }

    public function detailBerangkat ($id)
    {
        $detail_pemberangkatan = DB::table('pemberangkatan')->where('id', $id)->first();
        return view('admin/dashboard/list_dashboard/detail/detail_pemberangkatan', compact('detail_pemberangkatan'));
    }


    public function statusTki($typeStatus = null)
    {   
        // Status Medical
        if($typeStatus === 'medical'){
            $active = 1;
            $statusTki = DB::table('medical_checkup')
            ->whereNull('sertifikat_kesehatan')
            ->get();
            return view('admin.status_tki.data', ['statusTki' => $statusTki, 'active' => $active]);
        }
        // Status Blk
        elseif($typeStatus === 'blk'){
            $active = 3;
            $statusTki = DB::table('blk')->whereNull('sertifikat_blk')->get();
            return view('admin.status_tki.data', ['statusTki' => $statusTki, 'active' => $active]);
        }
        // Status Waiting
        elseif($typeStatus === 'validasi'){
            $active = 5;
            $statusTki = DB::table('validasi_berkas')->whereNotNull('sertifikat_blk')->whereNull('hasil_validasi')->get();
             return view('admin.status_tki.data', ['statusTki' => $statusTki, 'active' => $active]);
        }
        // Status Approved
        elseif($typeStatus === 'hasil-validasi'){
            $active = 7;
            $statusTki = DB::table('validasi_berkas')->whereNull('berangkat')->get();
             return view('admin.status_tki.data', ['statusTki' => $statusTki, 'active' => $active]);
        }
        // Status Berangkat
        elseif($typeStatus === 'berangkat'){
            $active = 9;
            $statusTki = DB::table('pemberangkatan')->get();
             return view('admin.status_tki.data', ['statusTki' => $statusTki, 'active' => $active]);
        }
        // Status Menampilkan semua status
        else{
            $active = 0;
            $statusTki = DB::table('validasi_berkas')->get();
             return view('admin.status_tki.data', ['statusTki' => $statusTki, 'active' => $active]);
        }
       
    }

}
