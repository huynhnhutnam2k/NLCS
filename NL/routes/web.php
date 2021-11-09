<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/index', 'App\Http\Controllers\HomeController@index');
Route::get('/product', 'App\Http\Controllers\ProductController@index');
Route::get('/brand={id}', 'App\Http\Controllers\BrandController@show_brand_home');
Route::get('/product-detail={id}', 'App\Http\Controllers\ProductController@product_detail')->name('product-detail');
Route::post('/search', 'App\Http\Controllers\HomeController@search');

//admin

Route::get('/admin', 'App\Http\Controllers\AdminController@index');
Route::get('/dashboard', 'App\Http\Controllers\AdminController@show_dashboard');
Route::post('/dashboard', 'App\Http\Controllers\AdminController@login');
Route::get('/logout', 'App\Http\Controllers\AdminController@logout');

//Manager order 

Route::get('/manager-order', 'App\Http\Controllers\AdminController@manager_order');
Route::get('/view-order={orderId}', 'App\Http\Controllers\AdminController@view_order');
Route::get('/delete-order={orderId}', 'App\Http\Controllers\AdminController@delete_order');
//brand


Route::get('/add-brand', 'App\Http\Controllers\BrandController@add_brand');
Route::get('/edit-brand={b_id}', 'App\Http\Controllers\BrandController@edit_brand');
Route::get('/show-brand', 'App\Http\Controllers\BrandController@show_brand');
Route::get('/delete-brand={b_id}', 'App\Http\Controllers\BrandController@delete_brand');
Route::post('/update-brand={b_id}', 'App\Http\Controllers\BrandController@update_brand');
Route::post('/save-brand', 'App\Http\Controllers\BrandController@save_brand');
Route::get('/active-brand={b_id}', 'App\Http\Controllers\BrandController@active_brand');
Route::get('/unactive-brand={b_id}', 'App\Http\Controllers\BrandController@unactive_brand');



//cate
Route::post('/save-categories', 'App\Http\Controllers\CategoryProduct@save_category');
Route::get('/add-categories', 'App\Http\Controllers\CategoryProduct@add_category');
Route::get('/show-categories', 'App\Http\Controllers\CategoryProduct@show_category');
Route::get('/edit-categories={cate_id}', 'App\Http\Controllers\CategoryProduct@edit_category');
Route::get('/delete-categories={cate_id}', 'App\Http\Controllers\CategoryProduct@delete_category');
Route::post('/update-categories={cate_id}', 'App\Http\Controllers\CategoryProduct@update_category');
Route::get('/active-cate={cate_id}', 'App\Http\Controllers\CategoryProduct@active_category');
Route::get('/unactive-cate={cate_id}', 'App\Http\Controllers\CategoryProduct@unactive_category');



//Products


Route::get('/add-product', 'App\Http\Controllers\ProductController@add_product');
// Route::get('/add-product','App\Http\Controllers\ProductController@add_product');
Route::get('/edit-product={pro_id}', 'App\Http\Controllers\ProductController@edit_product');
Route::get('/delete-product={pro_id}', 'App\Http\Controllers\ProductController@delete_product');
Route::get('/show-product', 'App\Http\Controllers\ProductController@show_product');
Route::get('/unactive-product={pro_id}', 'App\Http\Controllers\ProductController@unactive_product');
Route::get('/active-product={pro_id}', 'App\Http\Controllers\ProductController@active_product');
Route::post('/save-product', 'App\Http\Controllers\ProductController@save_product');
Route::post('/update-product={pro_id}', 'App\Http\Controllers\ProductController@update_product');


//Cart

Route::post('/save-cart', 'App\Http\Controllers\CartController@save_cart');
// Route::get('/save-cart', function () {
//     return redirect('product-detail');
// });
Route::get('/show-cart', 'App\Http\Controllers\CartController@show_cart');
Route::get('/remove-cart={rowId}', 'App\Http\Controllers\CartController@remove_cart');
Route::post('/update-cart-qty', 'App\Http\Controllers\CartController@update_cart_qty');


//Checkout 
Route::get('/login-checkout', 'App\Http\Controllers\CheckoutController@login_checkout');
Route::post('/login', 'App\Http\Controllers\CheckoutController@login');
Route::get('/logout-checkout', 'App\Http\Controllers\CheckoutController@logout_checkout');
Route::post('/add-user', 'App\Http\Controllers\CheckoutController@add_user');
Route::get('/checkout', 'App\Http\Controllers\CheckoutController@checkout');
Route::post('/save-checkout', 'App\Http\Controllers\CheckoutController@save_checkout');
Route::get('/payment', 'App\Http\Controllers\CheckoutController@payment');


//order

Route::post('/order', 'App\Http\Controllers\CheckoutController@order');
Route::get('/show-order', 'App\Http\Controllers\CheckoutController@show_order');
