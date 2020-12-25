<?php

use Illuminate\Support\Facades\Route;

// trang chủ
Route::get('/', 'Client\HomeController@index')->name('get-client-index');

// tìm kiếm
Route::post('/search', 'Client\HomeController@search')->name('post-client-search');

// shop
Route::get('/shop', 'Client\HomeController@shop')->name('get-client-shop');

// lọc sản phẩm theo loại
Route::get('/shop/category/{id}', 'Admin\CategoryController@show_category')->name('get-client-shop-category');

// lọc sản phẩm theo thương hiệu
Route::get('/shop/brand/{id}', 'Admin\BrandController@show_brand')->name('get-client-shop-brand');

// lọc sản phẩm theo kích cỡ
Route::get('/shop/size/{id}', 'Admin\SizeController@show_size')->name('get-client-shop-size');

// chi tiết sản phẩm
Route::get('/shop/product_detail/{id}', 'Admin\ProductController@product_detail')->name('get-client-shop-product_detail');

// giỏ hàng
Route::post('/shop/savecart', 'Client\CartController@save_cart')->name('post-client-savecart');

// add-cart-ajax
Route::post('/shop/add-cart-ajax', 'Client\CartController@add_cart_ajax')->name('post-client-add-cart-ajax');
Route::get('/shop/show_cart', 'Client\CartController@show_cart')->name('get-client-showcart');
Route::post('/shop/update_cart', 'Client\CartController@update_cart')->name('post-client-update_cart');
Route::get('/shop/delete_product/{id}', 'Client\CartController@delete_product')->name('get-client-delete_product');
Route::get('/shop/delete_all_product', 'Client\CartController@delete_all_product')->name('get-client-delete_all_product');

// Checkout
Route::get('/login', 'Client\CheckoutController@login_checkout')->name('get-client-login');
Route::get('/register', 'Client\CheckoutController@register')->name('get-client-register');
Route::post('/add_customer', 'Client\CheckoutController@add_Customer')->name('post-client-register');
Route::post('/checkout', 'Client\CheckoutController@checkout')->name('post-client-checkout');



//Login

Route::group(['prefix' => 'admin', 'namespace' => 'admin'], function(){
    Route::get('login', 'LoginController@getLogin')->name('get-admin-Login');
    Route::post('login', 'LoginController@postLogin')->name('post-admin-Login');
    Route::get('logout', 'LoginController@getLogout')->name('get-admin-Logout');
});

// Overview
Route::group(['middleware' => 'CheckAdminLogin', 'prefix' => 'admin', 'namespace' => 'admin'], function() {
    // Route::get('/',function(){return view('admin.layout');})->name('welcome');
    Route::get('/', 'OverViewController@index')->name('overview');
});

Route::group(['middleware' => 'CheckAdminLogin', 'prefix' => 'admin/user', 'namespace' => 'admin'], function() {
    // Route::get('/',function(){return view('admin.layout');})->name('welcome');

    // User
    Route::get('', 'UserController@index')->name('admin-user-index');
    Route::get('add', 'UserController@getadd')->name('admin-user-getadd');
    Route::post('postadd', 'UserController@postadd')->name('admin-user-postadd');
    Route::get('edit/{id}', 'UserController@getedit')->name('admin-user-getedit');
    Route::get('myaccount/{id}', 'UserController@myaccount')->name('admin-user-myaccount');
    Route::post('edit/{id}', 'UserController@postedit')->name('admin-user-postedit');
    Route::get('delete/{id}', 'UserController@delete')->name('admin-user-delete');
    Route::get('active/{id}', 'UserController@active')->name('admin-user-active');
    Route::get('unactive/{id}', 'UserController@unactive')->name('admin-user-unactive');
});

Route::group(['middleware' => 'CheckAdminLogin', 'prefix' => 'admin/customer', 'namespace' => 'admin'], function() {

    // Customer
    Route::get('', 'CustomerController@index')->name('admin-customer-index');
    Route::get('add', 'CustomerController@create')->name('admin-customer-getadd');
    Route::post('postadd', 'CustomerController@store')->name('admin-customer-postadd');
    Route::get('edit/{id}', 'CustomerController@getedit')->name('admin-customer-getedit');
    Route::post('edit/{id}', 'CustomerController@postedit')->name('admin-customer-postedit');
    Route::get('delete/{id}', 'CustomerController@destroy')->name('admin-customer-destroy');
    Route::get('active/{id}', 'CustomerController@active')->name('admin-customer-active');
    Route::get('unactive/{id}', 'CustomerController@unactive')->name('admin-customer-unactive');
});

Route::group(['middleware' => 'CheckAdminLogin', 'prefix' => 'admin/category', 'namespace' => 'admin'], function() {
    // Category
    Route::get('', 'CategoryController@index')->name('admin-category-index');
    Route::get('add', 'CategoryController@create')->name('admin-category-add');
    Route::post('store', 'CategoryController@store')->name('admin-category-store');
    Route::get('edit/{id}', 'CategoryController@getedit')->name('admin-category-getedit');
    Route::post('edit/{id}', 'CategoryController@postedit')->name('admin-category-postedit');
    Route::get('destroy/{id}', 'CategoryController@destroy')->name('admin-category-destroy');
    Route::get('active/{id}', 'CategoryController@active')->name('admin-category-active');
    Route::get('unactive/{id}', 'CategoryController@unactive')->name('admin-category-unactive');
});

Route::group(['middleware' => 'CheckAdminLogin', 'prefix' => 'admin/product', 'namespace' => 'admin'], function() {
    // Product
    Route::get('', 'ProductController@index')->name('admin-product-index');
    Route::get('add', 'ProductController@create')->name('admin-product-add');
    Route::post('store', 'ProductController@store')->name('admin-product-store');
    Route::get('edit/{id}', 'ProductController@getedit')->name('admin-product-getedit');
    Route::post('edit/{id}', 'ProductController@postedit')->name('admin-product-postedit');
    Route::get('destroy/{id}', 'ProductController@destroy')->name('admin-product-destroy');
    Route::get('active/{id}', 'ProductController@active')->name('admin-product-active');
    Route::get('unactive/{id}', 'ProductController@unactive')->name('admin-product-unactive');
});

Route::group(['middleware' => 'CheckAdminLogin', 'prefix' => 'admin/supplier', 'namespace' => 'admin'], function() {
    // Supplier
    Route::get('', 'SupplierController@index')->name('admin-supplier-index');
    Route::get('add', 'SupplierController@create')->name('admin-supplier-add');
    Route::post('store', 'SupplierController@store')->name('admin-supplier-store');
    Route::get('edit/{id}', 'SupplierController@getedit')->name('admin-supplier-getedit');
    Route::post('edit/{id}', 'SupplierController@postedit')->name('admin-supplier-postedit');
    Route::get('destroy/{id}', 'SupplierController@destroy')->name('admin-supplier-destroy');
    Route::get('active/{id}', 'SupplierController@active')->name('admin-supplier-active');
    Route::get('unactive/{id}', 'SupplierController@unactive')->name('admin-supplier-unactive');
});

Route::group(['middleware' => 'CheckAdminLogin', 'prefix' => 'admin/receipt', 'namespace' => 'admin'], function() {
    // Receipt
    Route::get('', 'ReceiptController@index')->name('admin-receipt-index');
    Route::get('add', 'ReceiptController@create')->name('admin-receipt-add');
    Route::post('store', 'ReceiptController@store')->name('admin-receipt-store');
    Route::get('edit/{id}', 'ReceiptController@getedit')->name('admin-receipt-getedit');
    Route::post('edit/{id}', 'ReceiptController@postedit')->name('admin-receipt-postedit');
    Route::get('destroy/{id}', 'ReceiptController@destroy')->name('admin-receipt-destroy');
    Route::get('active/{id}', 'ReceiptController@active')->name('admin-receipt-active');
    Route::get('unactive/{id}', 'ReceiptController@unactive')->name('admin-receipt-unactive');
});

Route::group(['middleware' => 'CheckAdminLogin', 'prefix' => 'admin/brand', 'namespace' => 'admin'], function() {
    // Brand
    Route::get('', 'BrandController@index')->name('admin-brand-index');
    Route::get('add', 'BrandController@create')->name('admin-brand-add');
    Route::post('store', 'BrandController@store')->name('admin-brand-store');
    Route::get('edit/{id}', 'BrandController@getedit')->name('admin-brand-getedit');
    Route::post('edit/{id}', 'BrandController@postedit')->name('admin-brand-postedit');
    Route::get('destroy/{id}', 'BrandController@destroy')->name('admin-brand-destroy');
    Route::get('active/{id}', 'BrandController@active')->name('admin-brand-active');
    Route::get('unactive/{id}', 'BrandController@unactive')->name('admin-brand-unactive');
});

Route::group(['middleware' => 'CheckAdminLogin', 'prefix' => 'admin/size', 'namespace' => 'admin'], function() {
    // Size
    Route::get('', 'SizeController@index')->name('admin-size-index');
    Route::get('add', 'SizeController@create')->name('admin-size-add');
    Route::post('store', 'SizeController@store')->name('admin-size-store');
    Route::get('edit/{id}', 'SizeController@getedit')->name('admin-size-getedit');
    Route::post('edit/{id}', 'SizeController@postedit')->name('admin-size-postedit');
    Route::get('destroy/{id}', 'SizeController@destroy')->name('admin-size-destroy');
    Route::get('active/{id}', 'SizeController@active')->name('admin-size-active');
    Route::get('unactive/{id}', 'SizeController@unactive')->name('admin-size-unactive');
});

Route::group(['middleware' => 'CheckAdminLogin', 'prefix' => 'admin/receiptdetail', 'namespace' => 'admin'], function() {
    // ReceiptDetail
    Route::get('', 'ReceiptDetailController@index')->name('admin-receiptdetail-index');
    Route::get('add', 'ReceiptDetailController@create')->name('admin-receiptdetail-add');
    Route::post('store', 'ReceiptDetailController@store')->name('admin-receiptdetail-store');
    Route::get('edit/{id}', 'ReceiptDetailController@getedit')->name('admin-receiptdetail-getedit');
    Route::post('edit/{id}', 'ReceiptDetailController@postedit')->name('admin-receiptdetail-postedit');
    Route::get('destroy/{id}', 'ReceiptDetailController@destroy')->name('admin-receiptdetail-destroy');
    Route::get('active/{id}', 'ReceiptDetailController@active')->name('admin-receiptdetail-active');
    Route::get('unactive/{id}', 'ReceiptDetailController@unactive')->name('admin-receiptdetail-unactive');
});

Route::group(['middleware' => 'CheckAdminLogin', 'prefix' => 'admin/order', 'namespace' => 'admin'], function() {
    // Order
    Route::get('', 'OrderController@index')->name('admin-order-index');
    Route::get('add', 'OrderController@create')->name('admin-order-add');
    Route::post('store', 'OrderController@store')->name('admin-order-store');
    Route::get('edit/{id}', 'OrderController@getedit')->name('admin-order-getedit');
    Route::post('edit/{id}', 'OrderController@postedit')->name('admin-order-postedit');
    Route::get('destroy/{id}', 'OrderController@destroy')->name('admin-order-destroy');
    Route::get('active/{id}', 'OrderController@active')->name('admin-order-active');
    Route::get('unactive/{id}', 'OrderController@unactive')->name('admin-order-unactive');
});

Route::group(['middleware' => 'CheckAdminLogin', 'prefix' => 'admin/orderdetail', 'namespace' => 'admin'], function() {
    // Order
    Route::get('', 'OrderDetailController@index')->name('admin-orderdetail-index');
    Route::get('add', 'OrderDetailController@create')->name('admin-orderdetail-add');
    Route::post('store', 'OrderDetailController@store')->name('admin-orderdetail-store');
    Route::get('edit/{id}', 'OrderDetailController@getedit')->name('admin-orderdetail-getedit');
    Route::post('edit/{id}', 'OrderDetailController@postedit')->name('admin-orderdetail-postedit');
    Route::get('destroy/{id}', 'OrderDetailController@destroy')->name('admin-orderdetail-destroy');
    Route::get('active/{id}', 'OrderDetailController@active')->name('admin-orderdetail-active');
    Route::get('unactive/{id}', 'OrderDetailController@unactive')->name('admin-orderdetail-unactive');
});

?>