<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Session;
use App\Classes\Helper;
use DB;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
        //
    }

    //Hàm client
    
    public function show_size($id)
    {
        $category = DB::table('category')->where('status', '1')->get();
        $size = DB::table('size')->where('status', '1')->get();
        $brand = DB::table('brand')->where('status', '1')->get();

        $size_by_id = DB::table('product')->select('product.name', 'product.image', 'product.id', 'product.price')->join('size','product.idsize', '=', 'size.id')->where('product.idsize', $id)->get();

        $size_name = DB::table('size')->where('size.id', $id)->limit(1)->get();

        return view('client.home.fill.show_size')->with('category', $category)->with('size', $size)->with('brand', $brand)->with('size_by_id', $size_by_id)->with('size_name', $size_name);
    }
}
