<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginBlkController extends Controller
{
    public function loginBlk(){
        return view('blk.login_blk.data');
    }

    public function postlogin(Request $request){
        if(Auth::attempt($request->only('email','password'))){
        return redirect('/blk') ->with('login-success', 'Login Berhasil');
        }
        return redirect('login')->with('login-failed', 'Email atau Password salah');
    }

    public function logout(){
        Auth::logout();
        return redirect ('/');
    }

}
