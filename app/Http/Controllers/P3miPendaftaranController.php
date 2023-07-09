<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;

class P3miPendaftaranController extends Controller
{
    public function data()
    {
        $pendaftaran_p3mi = DB::table('p3mi')->get();
        return view('p3mi.pendaftaran.data',['pendaftaran_p3mi'=> $pendaftaran_p3mi]);
    }

}
