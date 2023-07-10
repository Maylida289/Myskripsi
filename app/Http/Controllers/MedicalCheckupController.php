<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;


class MedicalCheckupController extends Controller
{
    public function dashboard()
    {   
        // Menampilkan jumlah total
        $totalTki = DB::table('pendaftaran_tki')->count();
        $totalMedical =  DB::table('medical_checkup')->count();
        $totalBlk =  DB::table('blk')->count();
        $totalBerangkat = DB::table('pemberangkatan')->count();
        //------------------------------------------------
        return view('medical_checkup.dashboard.dashboard', ['totalTki' => $totalTki, 'totalMedical' => $totalMedical, 'totalBlk' => $totalBlk, 'totalBerangkat' => $totalBerangkat]);
    }

    public function listDataTki(){
        $list_tki = DB::table('medical_checkup')->get();
        return view('medical_checkup.list_tki.data', ['list_tki' => $list_tki]);
    }

    public function detailTki ($id)
    {
        $detail_tki = DB::table('medical_checkup')->where('id', $id)->first();
        return view('medical_checkup/list_tki/detail', compact('detail_tki'));
    }


    public function uploadSertifikatKesehatan(Request $request, $id)
    {       
        $request->validate([
            'filename' => 'required',
            'filename.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000'
        ]);
        if ($request->hasfile('filename')) {            
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('filename')->getClientOriginalName());
            $request->file('filename')->move(public_path('images'), $filename);

            DB::table('medical_checkup')->where('id', $id)
            ->update([
               'sertifikat_kesehatan' => $filename
         
            ]);
            return redirect('listtki-medical-checkup')->with('status-upload', 'Sertifikat Kesehatan berhasil di upload!');
        }else{
            echo'Gagal';
        }
    }
}
