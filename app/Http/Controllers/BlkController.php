<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;


class BlkController extends Controller
{
    public function dashboard()
    {   
        // Menampilkan jumlah total TKI
        $totalTki = DB::table('pendaftaran_tki')->count();
        //------------------------------------------------
        return view('blk.dashboard.dashboard', ['totalTki' => $totalTki]);
    }

    public function listDataTki(){

        $list_blk = DB::table('data_blk')->get();
        return view('blk.list_tki.data', ['data_blk' => $list_blk]);
    }

    public function detailTki ($id)
    {
        $detail_tki = DB::table('pendaftaran_tki')->where('id', $id)->first();
        return view('admin/file_validation_tki/detail', compact('detail_tki'));
    }
}
