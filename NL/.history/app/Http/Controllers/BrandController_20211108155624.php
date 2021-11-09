<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Contracts\Session\Session as SessionSession;
// use Illuminate\Support\Facades\Redirect;
session_start();
class BrandController extends Controller
{
    public function add_brand()
    {
        return view('admin.add-brand');
    }
    public function save_brand(Request $req)
    {
        $data = array();
        $data['cate_name'] = $req->name_cate;
        $data['cate_name_author'] = $req->name_author;
        $data['cate_author_id'] = $req->id_author;
        $data['cate_images'] = $req->images;
        $data['cate_active'] = $req->status;


        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        DB::table('categories')->insert($data);
        Session::put('msg', 'THÊM THƯƠNG HIỆU THÀNH CÔNG');
        return Redirect::to('add-brand');
    }
    public function select_brand(){
        $b = DB::table('categories')->where('cate_active','1')->get()
        return view('add-product')->with('categories',$b)
    }
    public function show_brand()
    {
        $all_b = DB::table('categories')->get();
        $manager_b = view('admin.show-brand')->with('all_b', $all_b);


        return view('admin-layout')->with('admin.show-brand', $manager_b);
        // echo '<pre>';
        // print_r($all_cate);
        // echo '</pre>';
    }
    public function unactive_brand($b_id)
    {
        DB::table('categories')->where('id', $b_id)->update(['cate_active' => 1]);
        Session::put('msg', "HIỆN THƯƠNG HIỆU THÀNH CÔNG");
        return Redirect::to('show-brand');
    }

    public function active_brand($b_id)
    {
        DB::table('categories')->where('id', $b_id)->update(['cate_active' => 0]);
        Session::put('msg', "ẨN THƯƠNG HIỆU THÀNH CÔNG");
        return Redirect::to('show-brand');
    }
    public function delete_brand($b_id)
    {
        DB::table('categories')->where('id', $b_id)->delete();

        Session::put('msg', 'XÓA THƯƠNG HIỆU THÀNH CÔNG');
        return Redirect::to('show-brand');
    }
    public function edit_brand($b_id)
    {
        $edit_b = DB::table('categories')->where('id', $b_id)->get();
        $manager_b = view('admin.edit-categories')->with('edit_cate', $edit_b);

        return view('admin-layout')->with('manager_cate', $manager_b);
    }
    public function update_brand(Request $req, $b_id)
    {
        $data = array();
        $data['cate_name'] = $req->name_cate;
        // $data['cate_active'] = $req ->status;
        $data['cate_name_author'] = $req->name_author;
        $data['cate_author_id'] = $req->id_author;
        DB::table('categories')->where('id', $b_id)->update($data);
        Session::put('msg', 'CẬP NHẬT THƯƠNG HIỆU THÀNH CÔNG');
        return Redirect::to('show-categories');
    }
    public function show_brand_home($id)
    {
        $pro = DB::table('products')->join('categories', 'products.pro_category_id', '=', 'categories.id')->where('categories.id', $id)->where('products.pro_active', '1')->select('products.id', 'products.pro_name', 'products.pro_view', 'products.pro_price', 'products.pro_category_id', 'products.pro_description', 'products.pro_content')->get();
        $categories = DB::table('categories')->where('cate_active', '1')->get();
        return view('brand')->with('pro', $pro)->with('categories', $categories);
    }
}
