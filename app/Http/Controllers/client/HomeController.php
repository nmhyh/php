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
        $product_5 = DB::table('product')->where('status', '1')->orderby('id', 'asc')->limit(5)->get();

        $product = DB::table('product')->where('status', '1')->orderby('id', 'desc')->limit(6)->get();

        return View('client.home.fill.new_arrival')->with('product', $product)->with('product_5', $product_5);
    }
    public function shop(){
        $product_5 = DB::table('product')->where('status', '1')->orderby('id', 'asc')->limit(5)->get();

        $product = DB::table('product')->where('status', '1')->get();
        $category = DB::table('category')->where('status', '1')->get();
        $brand = DB::table('brand')->where('status', '1')->get();
        $size = DB::table('size')->where('status', '1')->get();
        return View('client.home.shop')->with('product', $product)->with('category', $category)->with('brand', $brand)->with('size', $size)->with('product_5', $product_5);
    }
    public function search(Request $request){
        $product_5 = DB::table('product')->where('status', '1')->orderby('id', 'asc')->limit(5)->get();

        $product = DB::table('product')->where('status', '1')->get();
        $category = DB::table('category')->where('status', '1')->get();
        $brand = DB::table('brand')->where('status', '1')->get();
        $size = DB::table('size')->where('status', '1')->get();

        $key_word = $request->keywords_submit;

        $search_product = DB::table('product')->where('name', 'like', '%'. $key_word .'%')->where('status', '1')->get();

        return View('client.home.fill.search')->with('product', $product)->with('category', $category)->with('brand', $brand)->with('size', $size)->with('search_product', $search_product)->with('product_5', $product_5);
    }
    
}
