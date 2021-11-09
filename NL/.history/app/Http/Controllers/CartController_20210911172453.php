<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    
    public function save_cart(Request $req){
    	$pro_id = $req->pro_id;
    	$quantity =$req->qty;
    	// $size_pro = $req->size_product;
    	$product_info = DB::table('products')->where('products.id',$pro_id)->first();
    	$data['id']=$pro_id;
    	$data['qty']=$quantity;
    	$data['name']=$product_info->pro_name;
    	$data['price']=$product_info->pro_price;
    	// $data['weight']=$size_pro;
    	// $data['options']['image']=$product_info->pro_view;
    	Cart::add($data);
        Session::put('msg','Thêm vào giỏ hàng thành công!');
    	return Redirect()->Route('product_detail',[$pro_id]);
    }
}
