<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class AdminController extends Controller
{
    public function data()
    {
        return view('operator.dashboard.dashboard');
    }

    public function mainOperator(){
        return view('operator.main');
    }

    public function mainAdmin(){
        return view('admin.main');
    }
}
