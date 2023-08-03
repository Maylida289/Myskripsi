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

    public function detailTkiUploadSertifikat ($id)
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

    public function listTki()
    {   
        $listTki = DB::table('pendaftaran_tki')->get();
        return view('blk.dashboard.list_dashboard.total_tki',  ['listTki' => $listTki]);
    }

    public function detailTki ($id)
    {
        $detail_tki = DB::table('pendaftaran_tki')->where('id', $id)->first();
        return view('blk.dashboard.list_dashboard.detail.detail_tki', compact('detail_tki'));
    }


    public function listMedical()
    {   
        $listMedical = DB::table('medical_checkup')->get();
        return view('blk.dashboard.list_dashboard.medical',  ['listMedical' => $listMedical]);
    }

    public function detailMedical ($id)
    {
        $detail_medical = DB::table('medical_checkup')->where('id', $id)->first();
        return view('blk/dashboard/list_dashboard/detail/detail_medical', compact('detail_medical'));
    }

    public function listBlk()
    {   
        $listBlk = DB::table('blk')->get();
        return view('blk.dashboard.list_dashboard.blk',  ['listBlk' => $listBlk]);
    }

    public function detailBlk ($id)
    {
        $detail_blk = DB::table('blk')->where('id', $id)->first();
        return view('blk/dashboard/list_dashboard/detail/detail_blk', compact('detail_blk'));
    }
    public function listBerangkat()
    {   
        $listPemberangkatan = DB::table('pemberangkatan')->get();
        return view('blk.dashboard.list_dashboard.pemberangkatan',  ['listPemberangkatan' => $listPemberangkatan]);
    }

    public function detailBerangkat ($id)
    {
        $detail_pemberangkatan = DB::table('pemberangkatan')->where('id', $id)->first();
        return view('blk/dashboard/list_dashboard/detail/detail_pemberangkatan', compact('detail_pemberangkatan'));
    }

    public function statusTki()
    {
        $statusTki = DB::table('validasi_berkas')->get();
        return view('blk.status_tki.data', ['statusTki' => $statusTki]);
    }
}
