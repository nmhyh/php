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
Route::get('/index', function () {
    return view('client.home.index');
});
Route::get('/shop', function () {
    return view('client.home.shop');
});


//Login

Route::group(['prefix' => 'admin', 'namespace' => 'admin'], function(){
    Route::get('login', 'LoginController@getLogin')->name('get-admin-Login');
    Route::post('login', 'LoginController@postLogin')->name('post-admin-Login');
    Route::get('logout', 'LoginController@getLogout')->name('get-admin-Logout');
});

Route::group(['middleware' => 'CheckAdminLogin', 'prefix' => 'admin/user', 'namespace' => 'admin'], function() {
    Route::get('/',function(){return view('admin.layout');})->name('welcome');

    // User
    Route::get('', 'UserController@index')->name('admin-user-index');
    Route::get('add', 'UserController@getadd')->name('admin-user-getadd');
    Route::post('postadd', 'UserController@postadd')->name('admin-user-postadd');
    Route::get('edit/{id}', 'UserController@getedit')->name('admin-user-getedit');
    Route::get('myaccount/{id}', 'UserController@myaccount')->name('admin-user-myaccount');
    Route::post('edit/{id}', 'UserController@postedit')->name('admin-user-postedit');
    Route::get('delete/{id}','UserController@delete')->name('admin-user-delete');
    Route::get('active/{id}', 'UserController@active')->name('admin-user-active');
    Route::get('unactive/{id}','UserController@unactive')->name('admin-user-unactive');
});

Route::group(['middleware' => 'CheckAdminLogin', 'prefix' => 'admin/category', 'namespace' => 'admin'], function() {
    // Category
    Route::get('', 'CategoryController@index')->name('admin-category-index');
    Route::get('add', 'CategoryController@create')->name('admin-category-add');
    Route::post('store', 'CategoryController@store')->name('admin-category-store');
    Route::get('edit/{id}', 'CategoryController@getedit')->name('admin-category-getedit');
    Route::post('edit/{id}', 'CategoryController@postedit')->name('admin-category-postedit');
    Route::get('destroy/{id}','CategoryController@destroy')->name('admin-category-destroy');
    Route::get('active/{id}', 'CategoryController@active')->name('admin-category-active');
    Route::get('unactive/{id}','CategoryController@unactive')->name('admin-category-unactive');
});

Route::group(['middleware' => 'CheckAdminLogin', 'prefix' => 'admin/product', 'namespace' => 'admin'], function() {
    // Product
    Route::get('', 'ProductController@index')->name('admin-product-index');
    Route::get('add', 'ProductController@create')->name('admin-product-add');
    Route::post('store', 'ProductController@store')->name('admin-product-store');
    Route::get('edit/{id}', 'ProductController@getedit')->name('admin-product-getedit');
    Route::post('edit/{id}', 'ProductController@postedit')->name('admin-product-postedit');
    Route::get('destroy/{id}','ProductController@destroy')->name('admin-product-destroy');
    Route::get('active/{id}', 'ProductController@active')->name('admin-product-active');
    Route::get('unactive/{id}','ProductController@unactive')->name('admin-product-unactive');
});

Route::group(['middleware' => 'CheckAdminLogin', 'prefix' => 'admin/supplier', 'namespace' => 'admin'], function() {
    // Supplier
    Route::get('', 'SupplierController@index')->name('admin-supplier-index');
    Route::get('add', 'SupplierController@create')->name('admin-supplier-add');
    Route::post('store', 'SupplierController@store')->name('admin-supplier-store');
    Route::get('edit/{id}', 'SupplierController@getedit')->name('admin-supplier-getedit');
    Route::post('edit/{id}', 'SupplierController@postedit')->name('admin-supplier-postedit');
    Route::get('destroy/{id}','SupplierController@destroy')->name('admin-supplier-destroy');
    Route::get('active/{id}', 'SupplierController@active')->name('admin-supplier-active');
    Route::get('unactive/{id}','SupplierController@unactive')->name('admin-supplier-unactive');
});

Route::group(['middleware' => 'CheckAdminLogin', 'prefix' => 'admin/receipt', 'namespace' => 'admin'], function() {
    // Receipt
    Route::get('', 'ReceiptController@index')->name('admin-receipt-index');
    Route::get('add', 'ReceiptController@create')->name('admin-receipt-add');
    Route::post('store', 'ReceiptController@store')->name('admin-receipt-store');
    Route::get('edit/{id}', 'ReceiptController@getedit')->name('admin-receipt-getedit');
    Route::post('edit/{id}', 'ReceiptController@postedit')->name('admin-receipt-postedit');
    Route::get('destroy/{id}','ReceiptController@destroy')->name('admin-receipt-destroy');
    Route::get('active/{id}', 'ReceiptController@active')->name('admin-receipt-active');
    Route::get('unactive/{id}','ReceiptController@unactive')->name('admin-receipt-unactive');
});

















Route::group(['middleware' => 'CheckAdminLogin', 'prefix' => 'admin', 'namespace' => 'admin'], function() {
    Route::get('/',function(){return view('admin.layout');})->name('welcome');

    // // Category
    // Route::get('caterogy', 'CategoryController@index')->name('admin-caterogy-index');
    // Route::get('caterogy/add', 'CategoryController@create')->name('admin-caterogy-add');
    // Route::post('caterogy/store', 'CategoryController@store')->name('admin-caterogy-store');
    // Route::get('caterogy/edit/{id}', 'CategoryController@getedit')->name('admin-caterogy-getedit');
    // Route::post('caterogy/edit/{id}', 'CategoryController@postedit')->name('admin-caterogy-postedit');
    // Route::get('caterogy/destroy/{id}','CategoryController@destroy')->name('admin-caterogy-destroy');

    // // User
    // Route::get('user', 'UserController@index')->name('admin-user-index');
    // Route::get('user/add', 'UserController@getadd')->name('admin-user-getadd');
    // Route::post('user/postadd', 'UserController@postadd')->name('admin-user-postadd');
    // Route::get('user/edit/{id}', 'UserController@getedit')->name('admin-user-getedit');
    // Route::get('user/myaccount/{id}', 'UserController@myaccount')->name('admin-user-myaccount');
    // Route::post('user/edit/{id}', 'UserController@postedit')->name('admin-user-postedit');
    // Route::get('user/delete/{id}','UserController@delete')->name('admin-user-delete');
    // Route::get('user/active/{id}','UserController@active')->name('admin-user-active');
    // Route::get('user/unactive/{id}','UserController@unactive')->name('admin-user-unactive');


    // // Product
    // Route::get('product', 'ProductController@index')->name('admin-product-index');
    // Route::get('product/add', 'ProductController@create')->name('admin-product-add');
    // Route::post('product/store', 'ProductController@store')->name('admin-product-store');
    // Route::get('product/edit/{id}', 'ProductController@getedit')->name('admin-product-getedit');
    // Route::post('product/edit/{id}', 'ProductController@postedit')->name('admin-product-postedit');
    // Route::get('product/destroy/{id}','ProductController@destroy')->name('admin-product-destroy');

    // // Supplier
    // Route::get('supplier', 'SupplierController@index')->name('admin-supplier-index');
    // Route::get('supplier/add', 'SupplierController@create')->name('admin-supplier-add');
    // Route::post('supplier/store', 'SupplierController@store')->name('admin-supplier-store');
    // Route::get('supplier/edit/{id}', 'SupplierController@getedit')->name('admin-supplier-getedit');
    // Route::post('supplier/edit/{id}', 'SupplierController@postedit')->name('admin-supplier-postedit');
    // Route::get('supplier/destroy/{id}','SupplierController@destroy')->name('admin-supplier-destroy');


});

// Route::get('admin/login', LoginController@getLogin::class,'getLogin'])->name('get-admin-Login');
// Route::post('admin/login', LoginController@getLogin::class, 'postLogin'])->name('post-admin-Login');
// Route::get('admin/logout', LoginController@getLogin::class,'getLogout'])->name('get-admin-Logout');


?>