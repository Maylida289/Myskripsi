<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginOperatorController extends Controller
{
    public function loginOperator(){
        return view('operator.login_operator.data');
    }

    public function postlogin(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/operator') ->with('login-success', 'Login Berhasil');
        }
        return redirect('login-operator')->with('login-failed', 'Email atau Password salah');
    }

    public function logout(){
        Auth::logout();
        return redirect ('/');
    }

}
