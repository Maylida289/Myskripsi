<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class AdminController extends Controller
{
    public function data()
    {
        return view('admin.dashboard.dashboard');
    }

    public function mainAdmin(){
        return view('admin.main');
    }

    public function validationDataTki(){
        return view('admin.file_validation_tki.data');
    }
}
