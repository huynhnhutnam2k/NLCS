<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Redirect;

session_start();
class CategoryProduct extends Controller
{
    public function add_category()
    {
        return view('admin.add-categories');
    }
    public function show_category()
    {
        $all_cate = DB::table('categories')->get();
        $manager_cate = view('admin.show-categories')->with('all_cate', $all_cate);


        return view('admin-layout')->with('admin.show-categories', $manager_cate);
    }
    public function save_category(Request $req)
    {
        $data = array();
        $data['cate_name'] = $req->name_cate;
        $data['cate_active'] = $req->status;
        $data['cate_name_author'] = $req->name_author;
        $data['cate_author_id'] = $req->id_author;

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        DB::table('categories')->insert($data);
        Session::put('msg', "THÊM THƯƠNG HIỆU THÀNH CÔNG");
        return Redirect::to('add-categories');
    }
    public function unactive_category($cate_id)
    {
        DB::table('categories')->where('id', $cate_id)->update(['cate_active' => 1]);
        Session::put('msg', "kich hoat thanh cong");
        return Redirect::to('show-categories');
    }

    public function active_category($cate_id)
    {
        DB::table('categories')->where('id', $cate_id)->update(['cate_active' => 0]);
        Session::put('msg', "tat kich hoat thanh cong");
        return Redirect::to('show-categories');
    }

    public function edit_category($cate_id)
    {
        $edit_cate = DB::table('categories')->where('id', $cate_id)->get();
        $manager_cate = view('admin.edit-categories')->with('edit_cate', $edit_cate);

        return view('admin-layout')->with('manager_cate', $manager_cate);
    }
    public function update_category(Request $req, $cate_id)
    {
        $data = array();
        $data['cate_name'] = $req->name_cate;
        // $data['cate_active'] = $req ->status;
        $data['cate_name_author'] = $req->name_author;
        $data['cate_author_id'] = $req->id_author;
        DB::table('categories')->where('id', $cate_id)->update($data);
        Session::put('msg', 'Cap nhap thanh cong');
        return Redirect::to('show-categories');
    }
    public function delete_category($cate_id)
    {
        DB::table('categories')->where('id', $cate_id)->delete();
        Session::put('msg', "XÓA THƯƠNG HIỆU THÀNH CÔNG");
        return Redirect::to('show-categories');
    }
}
