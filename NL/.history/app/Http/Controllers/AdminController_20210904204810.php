<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    
    public function index(){
        return view('admin-login');
        // echo 'adim';
    }

    public function show_dashboard(){
        return view('admin.dashboard');
    }
    public function dashboard(Request $req){
        echo '123';
        $email = $req->Email;
        $password =$req->Password;
    
        $rs = DB::table('admin')->where('email',$email)->where('password',$password)->first();
        return view('admin.dashboard');
    }

}
