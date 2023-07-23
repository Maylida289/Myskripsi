<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginPemberangkatanController extends Controller
{
    public function loginPemberangkatan(){
        return view('pemberangkatan.login_pemberangkatan.data');
    }

    public function postlogin(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/pemberangkatan') ->with('login-success', 'Login Berhasil');
        }
        return redirect('login')->with('login-failed', 'Email atau Password salah');
    }

    public function logout(){
        Auth::logout();
        return redirect ('/');
    }

}
