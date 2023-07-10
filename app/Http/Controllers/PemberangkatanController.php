<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;


class PemberangkatanController extends Controller
{
    public function dashboard()
    {
        $list_tki = DB::table('pendaftaran_tki')->get();
        return view('pemberangkatan.dashboard.dashboard', ['list_tki' => $list_tki]);
    }
}
