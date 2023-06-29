<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;

class PendaftarantkiController extends Controller
{
    public function data()
    {
        $pendaftaran_tki = DB::table('pendaftaran_tki')->get();

        //return $pendaftaran_tki;
        return view('operator.pendaftaran.data',['pendaftaran_tki'=> $pendaftaran_tki]);
    }

    public function add ()
    {
        return view('operator.pendaftaran.add');
    }

    public function addProcess (Request $request)
    {
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
