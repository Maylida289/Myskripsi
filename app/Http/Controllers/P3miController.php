<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;


class P3miController extends Controller
{
    public function dashboard()
    {
        // Menampilkan jumlah total TKI
        $totalTki = DB::table('pendaftaran_tki')->count();
        $totalBlk = DB::table('pendaftaran_tki')->whereNotNull('sertifikat_blk')->count();
        //------------------------------------------------
        return view('p3mi.dashboard.dashboard', ['totalTki' => $totalTki, 'totalBlk' => $totalBlk]);
    }
}
