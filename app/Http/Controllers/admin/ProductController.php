<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $viewprefix;
    public $viewnamespace;
    public $middleware;
    public function __construct()
    {
        $this->middleware('CheckAdminLogin');
        $this->viewprefix='admin.product.';
        $this->viewnamespace='admin/product';
    }
    public function index()
    {
        $products = Product::all();
        return view($this->viewprefix.'index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->viewprefix.'add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
            'price' => 'required',
            'size' => 'required',
            'material' => 'required',
            'strap_material' => 'required',
            'number_compartments' => 'required',
            'dimensions' => 'required',
            'color' => 'required',
            'discount' => 'required',
            'content' => 'required',
            'idcat' => 'required',
        ]);
        $product->name = $request->name;
        $product->image = $request->image;
        $product->price = $request->price;
        $product->size = $request->size;
        $product->material = $request->material;
        $product->strap_material = $request->strap_material;
        $product->number_compartments = $request->number_compartments;
        $product->dimensions = $request->dimensions;
        $product->color = $request->color;
        $product->discount = $request->discount;
        $product->content = $request->content;
        $product->idcat = $request->idcat;
        if($product->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-product-index');
    }
    public function getedit($id)
    {
        $products = Product::findOrFail($id);
        return view($this->viewprefix.'edit')->with('product', $products);      
    }
    public function postedit($id, request $request)
    {
        $product = Product::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
            'price' => 'required',
            'size' => 'required',
            'material' => 'required',
            'strap_material' => 'required',
            'number_compartments' => 'required',
            'dimensions' => 'required',
            'color' => 'required',
            'discount' => 'required',
            'content' => 'required',
            'idcat' => 'required',
        ]);
        $product->name = $request->name;
        $product->image = $request->image;
        $product->price = $request->price;
        $product->size = $request->size;
        $product->material = $request->material;
        $product->strap_material = $request->strap_material;
        $product->number_compartments = $request->number_compartments;
        $product->dimensions = $request->dimensions;
        $product->color = $request->color;
        $product->discount = $request->discount;
        $product->content = $request->content;
        $product->idcat = $request->idcat;
        if($products->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-product-index');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::findOrFail($id); 
        if($products->delete())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-product-index'); 
    }
}
