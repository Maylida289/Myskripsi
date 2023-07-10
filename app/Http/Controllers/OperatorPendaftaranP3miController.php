<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OperatorPendaftaranP3miController extends Controller
{
 public function addP3mi ()
    {
        return view('operator.pendaftaran_p3mi.add');
    }

    public function addProcess (Request $request)
    {   
        DB::table('p3mis')->insert([
            'name' => $request->nama,
            'level' => 'admin-p3mi',
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'sponsor' => $request->sponsor,
            'remember_token' => Str::random(60),
        ]);
        return redirect('pendaftaranp3mi/add')->with('status','P3MI Berhasil di Daftarkan');
    }
}
