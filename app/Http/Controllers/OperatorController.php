<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class OperatorController extends Controller
{
    public function data()
    {
        return view('operator.dashboard.dashboard');
    }

    public function mainOperator(){
        return view('operator.main');
    }
}
