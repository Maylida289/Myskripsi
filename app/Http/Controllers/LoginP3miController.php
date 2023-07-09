<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginP3miController extends Controller
{
    public function loginP3mi(){
        return view('p3mi.login_operator.data');
    }

    public function postlogin(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/p3mi') ->with('login-success', 'Login Berhasil');
        }
        return redirect('login-p3mi')->with('login-failed', 'Email atau Password salah');
    }

    public function logout(){
        Auth::logout();
        return redirect ('/');
    }

}