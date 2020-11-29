<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
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
        $supplier = DB::table('supplier')->where('status', '1')->get();
        return View('client.home.shop')->with('product', $product)->with('category', $category)->with('supplier', $supplier);
    }
    
}
