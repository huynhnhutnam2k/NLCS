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
    public function dashboard(){
        echo '123';
    }
    
    public function login(Request $req){
    	$email = $req->Email;
    	$password =$req->Password;

    	$rs = DB::table('admins')->where('email',$email)->where('password',$password)->first();

        if($rs){
    		Session::put('name',$rs->name);
            Session::put('id',$rs->id);
    		Session::put('msg','Đăng nhập thành công!');
    		return Redirect::to('/dashboard');

    	}else{
    		Session::put('msg','Mật khẩu hoặc tài khoản không đúng ! Mời nhập lại');
    		return Redirect::to('admin');
    	}
    }
}
