<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginAdminController extends Controller
{
    public function loginAdmin(){
        return view('admin.login_admin.data');
    }

    public function postlogin(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/admin') ->with('login-success', 'Login Berhasil');
        }
        return redirect('login')->with('login-failed', 'Email atau Password salah');
    }

    public function logout(){
        Auth::logout();
        return redirect ('/');
    }

}
