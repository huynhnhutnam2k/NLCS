<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    public function index(){
        return view('admin-login');
        // echo 'adim';
    }

    public function show_dashboard(){
        return view('admin.dashboard');
    }

    
    public function login(Request $req){
    	$email = $req->email;
    	$password =$req->password;

    	$rs = DB::table('admins')->where('email',$email)->where('password',$password)->first();
    }
}
