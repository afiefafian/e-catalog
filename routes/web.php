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

Route::get('produk/{vue_capture?}', function () {
    return view('produk.index');
})->where('vue_capture', '[\/\w\.-]*');

//route to vue router
Route::get('/', function () {
    return redirect('produk');
});

//disable register routes
Auth::routes(['register' => false]);

//Admin 
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect('admin/home');
    });
    
    //auth
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    //dashboard
    Route::get('home', 'HomeController@index');

    //supplier
    Route::resource('supplier', 'SupplierController');
    Route::get('supplier_data', 'SupplierController@listData');
    Route::get('kab_kota_list', 'SupplierController@kab_kota_list_by_keyword');
    
    //produk
    Route::resource('produk', 'ProdukController');
    Route::get('produk_data', 'ProdukController@listData');
});