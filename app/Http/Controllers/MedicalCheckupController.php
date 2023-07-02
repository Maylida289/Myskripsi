<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;


class MedicalCheckupController extends Controller
{
    public function dashboard()
    {   
        // Menampilkan jumlah total TKI
        $totalTki = DB::table('pendaftaran_tki')->count();
        //------------------------------------------------
        return view('medical_checkup.dashboard.dashboard', ['totalTki' => $totalTki]);
    }

    public function listDataTki(){

        $list_tki = DB::table('pendaftaran_tki')->get();
        return view('medical_checkup.list_tki.data', ['pendaftaran_tki' => $list_tki]);
    }

    public function detailTki ($id)
    {
        $detail_tki = DB::table('pendaftaran_tki')->where('id', $id)->first();
        return view('medical_checkup/list_tki/detail', compact('detail_tki'));
    }
}
