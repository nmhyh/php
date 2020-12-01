<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use DB;

class CartController extends Controller
{
    public function save_cart(Request $request)
    {
        $category = DB::table('category')->where('status', '1')->get();
        $brand = DB::table('brand')->where('status', '1')->get();
        $size = DB::table('size')->where('status', '1')->get();

        $product_id = $request->product_id;
        $quantity = $request->qty;

        $data =  DB::table('product')->where('id', $product_id)->get();
        return View('client.cart.show_cart')->with('category', $category)->with('brand', $brand)->with('size', $size);
    }
}
