<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;

class OperatorPendaftarantkiController extends Controller
{
    public function data()
    {
        $pendaftaran_tki = DB::table('pendaftaran_tki')->get();
        return view('operator.pendaftaran.data',['pendaftaran_tki'=> $pendaftaran_tki]);
    }

    public function add ()
    {
        $list_p3mi = DB::table('p3mi')->get();
        return view('operator.pendaftaran.add',['list_p3mi'=> $list_p3mi]);
    }

    public function addProcess (Request $request)

   
    {   
        // Upload KTP
        $request->validate([
            'ktp' => 'required',
            'ktp.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000'
        ]);
        $ktp = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('ktp')->getClientOriginalName());
        $request->file('ktp')->move(public_path('images'), $ktp);

        // Upload Ijazah
        $request->validate([
            'ijazah' => 'required',
            'ijazah.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000'
        ]);
        $ijazah = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('ijazah')->getClientOriginalName());
        $request->file('ijazah')->move(public_path('images'), $ijazah);

        //return $request;
        DB::table('pendaftaran_tki')->insert([
            'nama' => $request->nama ,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'pendidikan' => $request->pendidikan,
            'no_tlp' => $request->no_tlp,
            'ktp'=> $ktp,
            'ijazah' => $ijazah,
            'sponsor' => $request->sponsor,
        ]);
        return redirect('pendaftarantki')->with('status','Nama TKI Berhasil Ditambahkan');
    }

    public function edit ($id)
    {
        $editpendaftarantki = DB::table('pendaftaran_tki')->where('id', $id)->first();
        return view('operator/pendaftaran/edit', compact('editpendaftarantki'));
    }

    public function editProcess(Request $request, $id)
    {
     DB::table('pendaftaran_tki')->where('id', $id)
     ->update([
        'nama' => $request->nama ,
        'jenis_kelamin' => $request->jenis_kelamin,
        'tempat_lahir' => $request->tempat_lahir,
        'tgl_lahir' => $request->tgl_lahir,
        'alamat' => $request->alamat,
        'agama' => $request->agama,
        'pendidikan' => $request->pendidikan,
        'no_tlp' => $request->no_tlp,
     ]);
     return redirect('pendaftarantki')->with('status', 'Data TKI berhasil diupdate!');
    }

    public function delete($id)
    {
        // return "delete";
        DB::table('pendaftaran_tki')->where('id', $id)->delete();
        return redirect('pendaftarantki')->with('status', 'Data TKI berhasil dihapus!');
    }
}
