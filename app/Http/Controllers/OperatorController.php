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
        $totalBlk = DB::table('pendaftaran_tki')->whereNotNull('sertifikat_blk')->count();
        return view('operator.dashboard.dashboard',  ['totalTki' => $totalTki, 'totalBlk' => $totalBlk]);
    }
}
