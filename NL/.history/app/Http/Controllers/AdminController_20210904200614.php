<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
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
    	$email = $req->Email;
    	$passwd =$req->Password;

    	$rs = DB::table('admins')->where('email',$email)->where('password',$passwd)->first();
    	
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
