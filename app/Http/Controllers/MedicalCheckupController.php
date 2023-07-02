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


    public function uploadSertifikatKesehatan(Request $request, $id)
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
               'sertifikat_kesehatan' => $filename
         
            ]);
            return redirect('listtki-medical-checkup')->with('status-upload', 'Sertifikat Kesehatan berhasil di upload!');
        }else{
            echo'Gagal';
        }
       
    }
}
