<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Pendaftaranp3miController extends Controller
{
    public function data()
    {
        $pendaftaran_p3mi = DB::table('pendaftaran_p3mi')->get();

        //return $pendaftaran_tki;
        return view('p3mi.data',['pendaftaran_p3mi'=> $pendaftaran_p3mi]);
    }
}
