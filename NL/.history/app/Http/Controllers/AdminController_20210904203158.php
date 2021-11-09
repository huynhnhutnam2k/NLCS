<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        return view('admin-login');
        // echo 'adim';
    }

    public function show_dashboard(){
        return view('admin.dashboard');
    }
    public function dashboard(){
        echo '123';
    }
    
    public function login(Request $req){
    	$email = $req->Email;
    	$password =$req->Password;

    	// $rs = DB::table('admins')->where('email',$email)->where('password',$password)->first();
    }
}
