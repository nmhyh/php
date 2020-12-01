<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Size;
use DB;

class HomeController extends Controller
{
    public function index(){
        $product = DB::table('product')->where('status', '1')->orderby('id', 'desc')->limit(6)->get();

        return View('client.home.index')->with('product', $product);
    }
    public function shop(){
        $product = DB::table('product')->where('status', '1')->get();
        $category = DB::table('category')->where('status', '1')->get();
        $brand = DB::table('brand')->where('status', '1')->get();
        $size = DB::table('size')->where('status', '1')->get();
        return View('client.home.shop_layout')->with('product', $product)->with('category', $category)->with('brand', $brand)->with('size', $size);
    }
    
}
