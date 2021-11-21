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

class HomeController extends Controller
{
    public function index()
    {
        // return view('pages.home');
        $categories = DB::table('categories')->where('cate_active', '1')->get();
        $pro_new = DB::table('products')->where('pro_active', '1')->orderby('id', 'desc')->limit(8)->get();
        $pro_hot = DB::table('products')->where('pro_active', '1')->where('pro_hot', '1')->where('pro_number', '<', '8')->limit(4)->get();
        return view('welcome')->with('categories', $categories)->with('pro_new', $pro_new)->with('pro_hot', $pro_hot);
    }
    public function search(Request $req)
    {
        $keywords =  $req->search;
        Session::put('keywords', $keywords);
        $categories = DB::table('categories')->where('categories.cate_active', '1')->get();
        $search_pro = DB::table('products')->where('pro_active', '1')->where('pro_name', 'like', '%' . $keywords . '%')->orderby('created_at', 'asc')->get();
        // $i=0;
        // foreach ($search_pro as $count) {
        //     $i+=1;
        // }
        // Session::put('sl',$i);
        if ($search_pro) {
            return view('pages.search')->with('pro', $search_pro)->with('categories', $categories);
        } else {
            Session::put('msg', 'Không tìm thấy sản phẩm tương tự ');
            return view('pages.search')with('categories', $categories);
        }
    }
}
