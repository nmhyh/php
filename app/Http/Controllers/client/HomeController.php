<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use DB;

class HomeController extends Controller
{
    public function index(){
        $product = DB::table('product')->where('status', '1')->orderby('id', 'desc')->get();

        return View('client.home.index');
    }
    
}
