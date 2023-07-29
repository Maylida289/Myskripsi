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
        return view('operator.dashboard.dashboard', ['totalTki' => $totalTki, 'totalMedical' => $totalMedical, 'totalBlk' => $totalBlk, 'totalBerangkat' => $totalBerangkat]);
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
}
