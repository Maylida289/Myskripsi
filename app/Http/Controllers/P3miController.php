<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;


class P3miController extends Controller
{
    public function dashboard($sponsor, $typeStatus = null)
    {   
          // Status Medical
          if($typeStatus === 'medical'){
            $active = 1;
            $list_p3mi = DB::table('validasi_berkas')
            ->whereNull('sertifikat_kesehatan')
            ->get();
            return view('p3mi.dashboard.dashboard', ['list_p3mi' => $list_p3mi, 'active' => $active, 'sponsor' => $sponsor]);
        }
        // Status Blk
        elseif($typeStatus === 'blk'){
            $active = 3;
            $list_p3mi = DB::table('blk')->whereNull('sertifikat_blk')->get();
            return view('p3mi.dashboard.dashboard', ['list_p3mi' => $list_p3mi, 'active' => $active, 'sponsor' => $sponsor]);
        }
        // Status Waiting
        elseif($typeStatus === 'validasi'){
            $active = 5;
            $list_p3mi = DB::table('validasi_berkas')->whereNotNull('sertifikat_blk')->whereNull('hasil_validasi')->get();
             return view('p3mi.dashboard.dashboard', ['list_p3mi' => $list_p3mi, 'active' => $active, 'sponsor' => $sponsor]);
        }
        // Status Approved
        elseif($typeStatus === 'hasil-validasi'){
            $active = 7;
            $list_p3mi = DB::table('validasi_berkas')->whereNotNull('sertifikat_kesehatan')->whereNotNull('sertifikat_blk')->whereNull('berangkat')->get();
             return view('p3mi.dashboard.dashboard', ['list_p3mi' => $list_p3mi, 'active' => $active, 'sponsor' => $sponsor]);
        }
        // Status Berangkat
        elseif($typeStatus === 'berangkat'){
            $active = 9;
            $list_p3mi = DB::table('pemberangkatan')->get();
             return view('p3mi.dashboard.dashboard', ['list_p3mi' => $list_p3mi, 'active' => $active, 'sponsor' => $sponsor]);
        }
        // Status Menampilkan semua status
        else{
            $active = 0;
            $list_p3mi = DB::table('validasi_berkas')->get();
            return view('p3mi.dashboard.dashboard', ['list_p3mi' => $list_p3mi, 'sponsor' => $sponsor, 'active' => $active]);
        }
       
        
    }

  

}
