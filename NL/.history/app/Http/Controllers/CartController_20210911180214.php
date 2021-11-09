<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Echo_;
use Illuminate\Support\Facades\DB;
use Session;
use Cart;
use App\Http\Requests;
use Illuminate\Contracts\Session\Session as SessionSession;
// use Illuminate\Support\Facades\Redirect;
session_start();

class CartController extends Controller
{
    
    public function save_cart(Request $req){
    	$pro_id = $req->pro_id;
    	$quantity =$req->qty;
    	// $size_pro = $req->size_product;
    	$product_info = DB::table('products')->where('products.id',$pro_id)->first();
        // echo '<pre>';
        // print_r($product_info);
        // echo  '</pre>';
    	$data['id']=$pro_id;
    	$data['qty']=$quantity;
    	$data['name']=$product_info->pro_name;
    	$data['price']=$product_info->pro_price;
    	$data['weight']= ;
    	$data['options']['image']=$product_info->pro_view;
    	Cart::add($data);
        Session::put('msg','Thêm vào giỏ hàng thành công!');
    	return Redirect()->Route('product_detail',[$pro_id]);
    }
}
