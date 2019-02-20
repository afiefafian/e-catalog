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


Route::get('/', function () {
    return view('welcome');
});

//disable register routes
Auth::routes(['register' => false]);

Route::prefix('admin')->group(function () {

    Route::get('/', function () {
        return redirect('admin/home');
    });
    
    //auth
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('home', 'HomeController@index');

    Route::resource('supplier', 'SupplierController');
    Route::get('kab_kota_list', 'SupplierController@kab_kota_list_by_keyword');

    Route::resource('produk', 'ProdukController');
});