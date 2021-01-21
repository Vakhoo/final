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

Route::get("/notadmin", function(){
	return "not admin";
})->name("notadmin");

Route::get("/admin/products/view", "AdminProductsController@index")->name("productsindex");
Route::get("/admin/products/create", "AdminProductsController@create");
Route::post("/admin/products/store", "AdminProductsController@store")->name("productsstore");
Route::get("/admin/products/show", "AdminProductsController@show")->name("productsshow");
Route::post("/admin/products/update", "AdminProductsController@update")->name("productsupdate");
Route::post("/admin/products/delete", "AdminProductsController@delete")->name("productsdelete");



Route::get("/guest/view", "GuestController@index");
Route::post("/guest/cart", "GuestController@addcart")->name("addtocart");
Route::get("/guest/mypage", "GuestController@mypage");


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
