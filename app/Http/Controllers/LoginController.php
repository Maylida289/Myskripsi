<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login(){
        $list_p3mi = DB::table('p3mis')->get();
        return view('login.data', ['list_p3mi' => $list_p3mi]);
    }

    public function logout(){
        Auth::logout();
        return redirect ('/');
    }

}
