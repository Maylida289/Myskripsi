<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function dashboard()
    {   
        // Menampilkan jumlah total TKI
        $totalTki = DB::table('pendaftaran_tki')->count();
        $totalBlk = DB::table('data_blk')->count();
        //------------------------------------------------
        return view('admin.dashboard.dashboard', ['totalTki' => $totalTki, 'totalBlk' => $totalBlk]);
    }

    public function mainAdmin(){
        return view('admin.main');
    }

    public function validationDataTki(){

        $list_tki = DB::table('pendaftaran_tki')->get();
        return view('admin.file_validation_tki.data', ['pendaftaran_tki' => $list_tki]);
    }

    public function detailTki ($id)
    {
        $detail_tki = DB::table('pendaftaran_tki')->where('id', $id)->first();
        return view('admin/file_validation_tki/detail', compact('detail_tki'));
    }
}
