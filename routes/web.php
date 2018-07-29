<?php

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

Route::get('/', 'TokoController@index');

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::get('/admin/home', 'HomeController@index')->name('home');
Route::get('/admin/home/month', 'HomeController@month')->name('home.month');
Route::get('/admin/home/year', 'HomeController@year')->name('home.year');

//CRUD
Route::get('admin/product/index', 'ProductController@index_admin')->name('product.index');
Route::get('admin/product/create', 'ProductController@create')->name('product.create');
Route::post('admin/product/create', 'ProductController@store')->name('product.store');
Route::get('admin/product/{product}/edit', 'ProductController@edit')->name('product.edit');
Route::patch('admin/product/{product}/edit', 'ProductController@update')->name('product.update');
Route::delete('admin/product/{product}/delete', 'ProductController@destroy')->name('product.destroy');
Route::get('admin/product/{product}/detail', 'ProductController@detail')->name('product.detail');

//ORDER
Route::get('admin/order', 'OrderController@index')->name('order.index');
Route::post('admin/order/edit/', 'OrderController@edit')->name('order.edit');
Route::patch('admin/order/update/{pembeli}', 'OrderController@update')->name('order.update');
Route::post('admin/order/delete/', 'OrderController@destroy')->name('order.destroy');

//Report
Route::get('/admin/reports', 'ReportController@index')->name('reports.index') ;
Route::post('/admin/reports/periode', 'ReportController@setPeriode')->name('reports.periode') ;
Route::get('/admin/reports/export', 'ReportController@export')->name('reports.export') ;
Route::post('/admin/reports/detail', 'ReportController@detail')->name('reports.detail') ;

//TOKO TRANSAKSI
Route::get('/product/{product}/detail', 'TokoController@showItem')->name('toko.detail');
Route::get('/product/cart/', 'TokoController@Cart')->name('toko.cart');
Route::get('/product/cart/{id}', 'TokoController@addtoCart')->name('toko.addtocart');
Route::get('/product/cart/add/{id}', 'TokoController@updateCartTambah')->name('toko.cartadd');
Route::get('/product/cart/min/{id}', 'TokoController@updateCartKurang')->name('toko.cartmin');
Route::get('/product/cart/del/{id}', 'TokoController@hapus')->name('toko.cartdel');
Route::get('/product/kategori/', 'TokoController@kategori')->name('toko.kategori');
Route::get('/product/cara-pemesaan/', 'TokoController@howTo')->name('toko.cara');

//TOKO CEK ORDER
Route::get('/product/checkout/', 'TokoController@checkout')->name('toko.checkout');
Route::post('product/checkout/form', 'TokoController@form_pembeli')->name('checkout.proc');
Route::get('/product/checkorder/', 'TokoController@checkorder')->name('toko.cek');
Route::get('/product/checkorder/search', 'TokoController@searchorder')->name('search.order');
Route::post('/product/checkorder/detail', 'TokoController@orderdetail')->name('order.detail');
Route::patch('/product/checkorder/upload/{pembeli}', 'TokoController@uploadTrans')->name('upload.trans');
Route::post('/product/checkorder/invoice', 'TokoController@invoice')->name('order.invoice');