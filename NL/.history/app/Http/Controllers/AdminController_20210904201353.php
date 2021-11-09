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

    public function dashboard(){
        return view('admin-layout');
    }

    
    public function login(Request $req){
    	$email = $req->email;
    	$passwd =$req->password;

    	// $rs = DB::table('admins')->where('email',$email)->where('password',$passwd)->first();
    }
}
