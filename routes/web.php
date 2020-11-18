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


// Route::get('admin/', function () {
//     return view('admin.layout');
// });

// Route::get('admin/login', function () {
//     return view('admin.login.login');
// });

// layout

//Login

Route::group(['prefix' => 'admin', 'namespace' => 'admin'], function(){
    Route::get('login', 'LoginController@getLogin')->name('get-admin-Login');
    Route::post('login', 'LoginController@postLogin')->name('post-admin-Login');
    Route::get('logout', 'LoginController@getLogout')->name('get-admin-Logout');
});

Route::group(['middleware' => 'CheckAdminLogin', 'prefix' => 'admin', 'namespace' => 'admin'], function() {
    Route::get('/',function(){return view('admin.layout');})->name('welcome');

    // Category
    Route::get('caterogy', 'CategoryController@index')->name('admin-caterogy-index');
    Route::get('caterogy/add', 'CategoryController@create')->name('admin-caterogy-add');
    Route::post('caterogy/store', 'CategoryController@store')->name('admin-caterogy-store');
    Route::get('caterogy/edit/{id}', 'CategoryController@getedit')->name('admin-caterogy-getedit');
    Route::post('caterogy/edit/{id}', 'CategoryController@postedit')->name('admin-caterogy-postedit');
    Route::get('caterogy/destroy/{id}','CategoryController@destroy')->name('admin-caterogy-destroy');

    // User
    Route::get('user', 'UserController@index')->name('admin-user-index');
    Route::get('user/add', 'UserController@getadd')->name('admin-user-getadd');
    Route::post('user/postadd', 'UserController@postadd')->name('admin-user-postadd');
    Route::get('user/edit/{id}', 'UserController@getedit')->name('admin-user-getedit');
    Route::post('user/edit/{id}', 'UserController@postedit')->name('admin-user-postedit');
    Route::get('user/delete/{id}','UserController@delete')->name('admin-user-delete');


    // Product
    Route::get('product', 'ProductController@index')->name('admin-product-index');
    Route::get('product/add', 'ProductController@create')->name('admin-product-add');
    Route::post('product/store', 'ProductController@store')->name('admin-product-store');
    Route::get('product/edit/{id}', 'ProductController@getedit')->name('admin-product-getedit');
    Route::post('product/edit/{id}', 'ProductController@postedit')->name('admin-product-postedit');
    Route::get('product/destroy/{id}','ProductController@destroy')->name('admin-product-destroy');


});

// Route::get('admin/login', LoginController@getLogin::class,'getLogin'])->name('get-admin-Login');
// Route::post('admin/login', LoginController@getLogin::class, 'postLogin'])->name('post-admin-Login');
// Route::get('admin/logout', LoginController@getLogin::class,'getLogout'])->name('get-admin-Logout');


?>