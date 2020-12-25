<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Session;
use DB;
session_start();

class CartController extends Controller
{

    public function add_cart_ajax(Request $request)
    {
        $data = $request->all();
        $session_id = substr(md5(microtime()), rand(0, 26), 5);
        $cart = Session::get('cart');
        if($cart == true){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if($val['id'] == $data['cart_product_id']){
                    $is_avaiable++;
                }
            }

            if($is_avaiable == 0){
                $cart[] = array(
                    'session_id' => $session_id,
                    'name' => $data['cart_product_name'],
                    'id' => $data['cart_product_id'],
                    'image' => $data['cart_product_image'],
                    'qty' => $data['cart_product_qty'],
                    'price' => $data['cart_product_price'],
                );
                Session::put('cart', $cart); 
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'name' => $data['cart_product_name'],
                'id' => $data['cart_product_id'],
                'image' => $data['cart_product_image'],
                'qty' => $data['cart_product_qty'],
                'price' => $data['cart_product_price'],
            ); 
            Session::put('cart', $cart);
        }
       
        Session::save();
    }

    public function show_cart(Request $request)
    {
        // seo
        $meta_desc = "Giỏ hàng của bạn";
        $meta_keywords = "Giỏ hàng";
        $meta_title = "Giỏ hàng";
        $url_canonical = $request->url();

        // seo
        $product_5 = DB::table('product')->where('status', '1')->orderby('id', 'asc')->limit(5)->get();
        $category = DB::table('category')->where('status', '1')->orderby('id', 'desc')->get();
        $brand = DB::table('brand')->where('status', '1')->orderby('id', 'desc')->get();
        $size = DB::table('size')->where('status', '1')->get();

        return view('client.cart.show_cart')->with('category', $category)->with('brand', $brand)->with('size', $size)->with('meta_desc', $meta_desc)->with('meta_keywords', $meta_keywords)->with('meta_title', $meta_title)->with('url_canonical', $url_canonical)->with('product_5', $product_5);
    }

    public function save_cart(Request $request)
    {
        // $category = DB::table('category')->where('status', '1')->get();
        // $brand = DB::table('brand')->where('status', '1')->get();
        // $size = DB::table('size')->where('status', '1')->get();

        // $product_id = $request->product_id;
        // $quantity = $request->qty;

        // $data =  DB::table('product')->where('id', $product_id)->get();
        // return View('client.cart.show_cart')->with('category', $category)->with('brand', $brand)->with('size', $size);
    }

    public function delete_product($id)
    {
        $cart = Session::get('cart');
        if($cart == true){
            foreach($cart as $key => $value){
                if($value['session_id'] == $id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart', $cart);
            return redirect()->back()->with('message', 'Xóa sản phẩm thành công');
        }else{
            return redirect()->back()->with('message', 'Xóa sản phẩm thất bại');
        }
    }
    public function update_cart(Request $request)
    {
        $data = $request->all();
        $cart = Session::get('cart');
        if($cart == true){
            foreach($data['cart_qty'] as $key => $qty){
                foreach($cart as $session => $value){
                    if($value['session_id'] == $key){
                        $cart[$session]['qty'] = $qty;
                    }
                }
            }
            Session::put('cart', $cart);
            return redirect()->back()->with('message', 'Cập nhật số lượng thành công');
        }else{
            return redirect()->back()->with('message', 'Cập nhật số lượng thất bại');
        }
    }
    public function delete_all_product()
    {
        $cart = Session::get('cart');
        if($cart == true){
            Session::forget('cart');
            return redirect()->back()->with('message', 'Xóa giỏ hàng thành công');
        }
    }


}
