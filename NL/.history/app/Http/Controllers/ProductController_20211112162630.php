<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Echo_;
use Illuminate\Support\Facades\DB;
use Session;

use App\Http\Requests;
use Illuminate\Contracts\Session\Session as SessionSession;
// use Illuminate\Support\Facades\Redirect;
session_start();
class ProductController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->where('categories.cate_active', '1')->get();
        $pro = DB::table('products')->where('pro_active', '1')->orderby('created_at', 'asc')->get();
        return view('product')->with('pro', $pro)->with('categories', $categories);
    }
    public function add_product()
    {
        $b = DB::table('categories')->where('cate_active', '1')->get();

        return view('admin.add-product')->with('brand', $b);
    }
    public function show_product()
    {
        $all = DB::table('products')->join('categories', 'products.pro_category_id', '=', 'categories.id')->join('admin', 'categories.cate_author_id', '=', 'admin.id')->select('products.id', 'products.pro_name', 'products.pro_view', 'products.pro_price', 'categories.cate_name', 'admin.name', 'products.pro_number', 'products.created_at', 'products.pro_active')->orderby('products.created_at', 'desc')->get();
        // $all_pro = DB::table('products')->get();
        // ->select('products.id','products.pro_name','products.pro_view','products.pro_price','categories.cate_name','admin.name','products.pro_number','products.created_at','products.pro_active')->orderby('products.created_at','desc')->
        $manager = view('admin.show-product')->with('all_pro', $all);
        return view('admin-layout')->with('all_pro', $manager);
    }
    public function save_product(Request $req)
    {
        $data = array();
        $data['pro_name'] = $req->name;
        $data['pro_category_id'] = $req->brand;
        $data['pro_price'] = $req->price;
        $data['pro_author_id'] = $req->id_author;
        // $data['pro_name_author'] = $req->name_author;
        $data['pro_number'] = $req->number;
        $data['pro_description'] = $req->des;

        $data['pro_content'] = $req->content;
        $data['pro_active'] = $req->status;
        $string = $data['pro_description'];
        echo strip_tags_content($string);
        function strip_tags_content($text)
        {

            return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text);
        }
        // $data['pro_view'] = $req->images;
        $get_image = $req->file('images');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = "images/" . $name_image . rand(20, 1000) . "." . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/images', $new_image);
            $data['pro_view'] = $new_image;
            DB::table('products')->insert($data);
            Session::put('msg', 'Thêm sản phẩm thành công!');

            return Redirect::to('show-product');
        } else {
            $data['pro_view'] = "";
        }
        DB::table('products')->insert($data);
        Session::put('msg', 'them thanh cong');

        return Redirect::to('show-product');
    }
    public function unactive_product($pro_id)
    {
        // $this->checkLogin();
        DB::table('products')->where('id', $pro_id)->update(['pro_active' => 1]);
        Session::put('msg', 'Kích hoạt thành công!');
        return Redirect::to('show-product');
    }
    public function active_product($pro_id)
    {
        // $this->checkLogin();
        DB::table('products')->where('id', $pro_id)->update(['pro_active' => 0]);
        Session::put('msg', 'Tắt kích hoạt thành công!');
        return Redirect::to('show-product');
    }
    public function edit_product($pro_id)
    {
        // $this->checkLogin();
        $edit = DB::table('products')->join('admin', 'products.pro_author_id', '=', 'admin.id')->where('products.id', $pro_id)->get();
        // $edit =  DB::table('products')->join('categories', 'products.pro_category_id', "=", "categories.id")->where('cate_active', '1')->get();
        $b = DB::table('categories')->where('cate_active', '1')->get();
        $manager = view('admin.edit-product')->with('edit_pro', $edit)->with('brand', $b);

        return view('admin-layout')->with('edit_pro', $manager);
    }
    public function delete_product($pro_id)
    {
        // $this->checkLogin();
        $delete = DB::table('products')->where('id', $pro_id)->delete();
        if ($delete) {
            Session::put('msg', 'Xóa sản phẩm thành công!');
            return Redirect::to('show-product');
        } else {
            Session::put('msg', 'Xóa sản phẩm thất bại!');
            return Redirect::to('show-product');
        }
    }
    public function update_product(Request $req, $pro_id)
    {
        // $this->checkLogin();
        $data = array();
        $data['pro_name'] = $req->name;
        $data['pro_author_id'] = $req->id_author;
        $data['pro_price'] = $req->price;
        $data['pro_category_id'] = $req->brand;
        $data['pro_content'] = $req->content;
        $data['pro_number'] = $req->number;
        // $data['pro_sale']=$req->sale;
        $get_image = $req->file('images');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = "images/" . $name_image . rand(20, 1000) . "." . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/images', $new_image);
            $data['pro_view'] = $new_image;
            DB::table('products')->where('products.id', $pro_id)->update($data);
            Session::put('msg', 'Cập nhật sản phẩm thành công!');
            // print_r($data);
            // die;
            return Redirect::to('show-product');
        }

        DB::table('products')->where('id', $pro_id)->update($data);
        Session::put('msg', 'Cập nhật sản phẩm thành công!');
        // print_r($data);
        // die;
        return Redirect::to('show-product');
    }
    public function product_detail($id)
    {
        $pro = DB::table('products')->join('categories', 'categories.id', '=', 'products.pro_category_id')->where('products.id', $id)->where('products.pro_active', '1')->select('products.id', 'products.pro_name', 'products.pro_view', 'products.pro_price', 'products.pro_category_id', 'products.pro_description', 'products.pro_content')->get();
        $categories = DB::table('categories')->where('cate_active', '1')->get();

        foreach ($pro as $key => $value) {
            $category_id = $value->pro_category_id;
        }
        $related_pro = DB::table('products')->join('categories', 'categories.id', '=', 'products.pro_category_id')->where('products.pro_category_id', $category_id)->where('products.pro_active', '1')->whereNotIN('products.id', [$id])->select('products.id', 'products.pro_name', 'products.pro_view', 'products.pro_price', 'categories.cate_name', 'products.pro_number', 'products.created_at', 'products.pro_active')->limit(4)->get();
        return view('product-detail')->with('pro', $pro)->with('categories', $categories)->with('related', $related_pro);
    }
}
