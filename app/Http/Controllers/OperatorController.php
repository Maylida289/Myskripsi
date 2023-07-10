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
        $totalMedical =  DB::table('medical_checkup')->count();
        $totalBlk =  DB::table('blk')->count();
        return view('operator.dashboard.dashboard',  ['totalTki' => $totalTki, 'totalMedical' => $totalMedical, 'totalBlk' => $totalBlk]);
    }

    public function validasiTki()
    {   
        $validasiTki = DB::table('hasil_validasi')->get();
        return view('operator.validasi_tki.data',  ['validasiTki' => $validasiTki]);
    }
    
    public function uploadKtp(Request $request, $id)
    {       
        $request->validate([
            'filename' => 'required',
            'filename.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000'
        ]);
        if ($request->hasfile('filename')) {            
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('filename')->getClientOriginalName());
            $request->file('filename')->move(public_path('images'), $filename);

            DB::table('pendaftaran_tki')->where('id', $id)
            ->update([
               'ktp' => $filename
         
            ]);
           /// TODO: Showing status upload on this line
        }else{
            echo'Gagal';
        }
    }
}
