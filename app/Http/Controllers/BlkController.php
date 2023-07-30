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
        $totalMedical =  DB::table('medical_checkup')->count();
        $totalBlk =  DB::table('blk')->count();
        $totalBerangkat = DB::table('pemberangkatan')->count();
        //------------------------------------------------
        return view('blk.dashboard.dashboard', ['totalTki' => $totalTki, 'totalMedical' => $totalMedical, 'totalBlk' => $totalBlk, 'totalBerangkat' => $totalBerangkat]);
    }

    public function listDataTki(){
        $list_blk = DB::table('blk')->get();
        return view('blk.list_tki.data', ['data_blk' => $list_blk]);
    }

    public function detailTki ($id)
    {
        $detail_tki = DB::table('blk')->where('id', $id)->first();
        return view('blk/list_tki/detail', compact('detail_tki'));
    }

    public function uploadSertifikatBlk(Request $request, $id)
    {       
        $request->validate([
            'filename' => 'required',
            'filename.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000'
        ]);
        if ($request->hasfile('filename')) {            
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('filename')->getClientOriginalName());
            $request->file('filename')->move(public_path('images'), $filename);

            DB::table('blk')->where('id', $id)
            ->update([
               'sertifikat_blk' => $filename
         
            ]);
            return redirect('listtki-blk')->with('status-upload', 'Sertifikat BLK berhasil di upload!');
        }else{
            echo'Gagal';
        }
       
    }

    public function statusTki()
    {
        $statusTki = DB::table('validasi_berkas')->get();
        return view('blk.status_tki.data', ['statusTki' => $statusTki]);
    }
}
