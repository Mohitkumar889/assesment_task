<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', "ProductController@webProductList")->name("web-product-list");

Route::get("detail","ProductController@productDetail")->name("product-details");


Route::group(['prefix'=>"admin"], function () {

	Route::match(['get','post'],'login','Controller@adminLogin')->name("admin-login");

	Route::group(["middleware" => 'auth'], function(){

		Route::group(['prefix'=>"product"],function(){
			Route::get("list","ProductController@list")->name("product-list");
			Route::match(['get','post'],'addUpdate',"ProductController@addUpdate")->name("addUpdate-product");
			Route::get('delete','ProductController@delete')->name("product-delete");
		});

		Route::group(['prefix'=> "categories"],function(){
			Route::get("list","CategoryController@list")->name("category-list");
			Route::match(['get','post'],"addUpdate","CategoryController@addUpdate")->name("addUpdate-category");
			Route::get('delete','CategoryController@delete')->name("category-delete");
		});

		Route::group(["prefix"=>"addons"], function(){
			Route::get("list","AddonController@list")->name("addon-list");
			Route::match(['get','post'],"addUpdate","AddonController@addUpdate")->name("addUpdate-addon");
			Route::get('delete','AddonController@delete')->name("addon-delete");
		});
	});

});
