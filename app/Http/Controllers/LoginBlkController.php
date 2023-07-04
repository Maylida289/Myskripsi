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
            return redirect('/medical-checkup') ->with('login-success', 'Login Berhasil');
        }
        return redirect('login-medical-checkup')->with('login-failed', 'Email atau Password salah');
    }

    public function logout(){
        Auth::logout();
        return redirect ('/');
    }

}
