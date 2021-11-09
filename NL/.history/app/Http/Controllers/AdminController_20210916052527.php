<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{   
       
    public function checkLogin(){
        $id = Session::get('id');
        if($id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function index(){
        return view('admin-login');
        // echo 'adim';
    }

    public function show_dashboard(){
        return view('admin.dashboard');
    }   
    public function login(Request $req){
    	$email = $req->Email;
    	$passwd =$req->Password;

    	$rs = DB::table('admin')->where('email',$email)->where('password',$passwd)->first();
    	
    	if($rs){
    		Session::put('name',$rs->name);
            Session::put('id',$rs->id);
    		// Session::put('msg','Đăng nhập thành công!');
    		return Redirect::to('/dashboard');

    	}else{
    		Session::put('msg','Mật khẩu hoặc email sai');
    		return Redirect::to('admin');
    	}
    }
    public function logout(){
        $this->checkLogin();
    	Session::put('name',null);
    	Session::put('msg',null);
    	return Redirect::to('/admin');

    }
   \
    public function manager_order(){
        $this->checkLogin();
        $rs = DB::table('orders')->join('users','orders.or_user_id','=','users.id')
         ->orderby('orders.created_at','desc')->select('orders.id','users.name','orders.or_total','orders.created_at','orders.or_status')->get();
        $manager = view('admin.manager-order')->with('all_order',$rs);
        return view('admin-layout')->with('all_order',$manager);
    
    }
    public function view_order($orderId){
        $this->checkLogin();
        $rs = DB::table('order_detail')->join('transactions','tr_user_id','=','order_detail.od_user_id')->join('orders','orders.id','order_detail.od_order_id')
         ->orderby('order_detail.od_created_at','desc')->select('order_detail.od_created_at','order_detail.od_pro_name','order_detail.od_pro_qty','order_detail.od_pro_price','tr_user_name','tr_note','tr_phone','tr_address','tr_user_name','or_total')->where('order_detail.od_order_id',$orderId)->limit(1)->get();
        $manager = view('admin.view-order')->with('all_order',$rs);
        return view('admin-layout')->with('all_order',$manager);
    }
    public function delete_order($orderId){
        $this->checkLogin();
        $delete1 = DB::table('order_detail')->where('od_order_id',$orderId)->delete();
        $delete2 = DB::table('orders')->where('orders.id',$orderId)->delete();
         if($delete1 && $delete2){
            Session::put('msg','Xóa đơn hàng thành công!');
            return Redirect::to('manager-order');
        }else{
            Session::put('msg','Xóa đơn hàng thất bại!');
            return Redirect::to('manager-order');
        }
    }
}
