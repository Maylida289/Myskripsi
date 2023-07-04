<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginMedicalCheckupController extends Controller
{
    public function loginMedicalCheckup(){
        return view('medical_checkup.login_medical_checkup.data');
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
