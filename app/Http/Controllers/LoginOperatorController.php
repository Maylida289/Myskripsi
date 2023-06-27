<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoginOperatorController extends Controller
{
    public function loginOperator(){
        return view('login_operator.data');
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
