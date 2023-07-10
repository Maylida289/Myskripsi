<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;


class P3miController extends Controller
{
    public function dashboard($sponsor)
    {
        $list_p3mi = DB::table('validasi_berkas')->get();
        return view('p3mi.dashboard.dashboard', ['list_p3mi' => $list_p3mi, 'sponsor' => $sponsor]);
    }
}
