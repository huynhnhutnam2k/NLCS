<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.login');
        // echo 'adim';
    }

    public function dashboard(){
        return view('admin.layout');
    }
}
