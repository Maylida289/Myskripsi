<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;


class PemberangkatanController extends Controller
{
    public function dashboard()
    {
        $list_tki = DB::table('hasil_validasi')->get();
        return view('pemberangkatan.dashboard.dashboard', ['list_tki' => $list_tki]);
    }

    public function detailTki ($id)
    {
        $detail_tki = DB::table('hasil_validasi')->where('id', $id)->first();
        return view('pemberangkatan/dashboard/detail', compact('detail_tki'));
    }

    public function uploadPasporAndVisa(Request $request, $id)
    {       
        $request->validate([
            'paspor' => 'required',
            'paspor.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000'
        ]);
        $paspor = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('paspor')->getClientOriginalName());
            $request->file('paspor')->move(public_path('images'), $paspor);

        $request->validate([
                'visa' => 'required',
                'visa.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000'
            ]);   
        $visa = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('visa')->getClientOriginalName());
                $request->file('visa')->move(public_path('images'), $visa);
    

            DB::table('hasil_validasi')->where('id', $id)
            ->update([
               'paspor' => $paspor,
               'visa' => $visa
         
            ]);
            return redirect('/pemberangkatan')->with('status-upload', 'Paspor dan Visa berhasil di upload!');
    }
}
