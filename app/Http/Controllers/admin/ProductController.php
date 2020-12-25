<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Size;
use Illuminate\Http\Request;
use Session;
use App\Classes\Helper;
use DB;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->viewprefix='admin.product.';
        $this->viewnamespace='admin/product';
    }
    
    public function index()
    {
        $products = Product::paginate(5);
        return view($this->viewprefix.'index', compact('products'));
    }

    public function create()
    {
        $category = Category::all();
        $brand = Brand::all();
        $size = Size::all();
        return view($this->viewprefix.'add',compact('category', 'brand', 'size'));
    }

    public function store(Request $request)
    {
        $product = new Product();
        $this->validate($request, [
            'name' => 'required',
            'idcat' => 'required',
        ]);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->material = $request->material;
        $product->strap_material = $request->strap_material;
        $product->locktype = $request->locktype;
        $product->number_compartments = $request->number_compartments;
        $product->dimensions = $request->dimensions;
        $product->color = $request->color;
        $product->discount = $request->discount;
        $product->content = $request->content;
        $product->idcat = $request->idcat;
        $product->idbra = $request->idbra;
        $product->idsize = $request->idsize;
        $product->image = $request->image;
        $product->image2 = $request->image2;
        $product->image3 = $request->image3;
        $product->save();

        $product->image = Helper::imageUploadProduct($request, 'product', $product->id);
        $product->image2 = Helper::imageUploadProduct2($request, 'product', $product->id);
        $product->image3 = Helper::imageUploadProduct3($request, 'product', $product->id);

        if($product->save())
            Session::flash('message', 'successfully!');
            else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-product-index');
    }

    public function getedit($id)
    {
        $category = Category::all();
        $brand = Brand::all();
        $size = Size::all();
        $products = Product::findOrFail($id);
        return view($this->viewprefix.'edit')->with('product', $products)->with('category', $category)->with('brand', $brand)->with('size', $size);      
    }

    public function postedit($id, request $request)
    {
        $product = Product::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
            'idcat' => 'required',
        ]);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->material = $request->material;
        $product->strap_material = $request->strap_material;
        $product->locktype = $request->locktype;
        $product->number_compartments = $request->number_compartments;
        $product->dimensions = $request->dimensions;
        $product->color = $request->color;
        $product->discount = $request->discount;
        $product->content = $request->content;
        $product->idcat = $request->idcat;
        $product->idbra = $request->idbra;
        $product->idsize = $request->idsize;
        $product->save();

        if($request->hasFile('image')){
            $product->image = Helper::imageUploadProduct($request, 'product', $product->id);
        }
        if($request->hasFile('image2')){
            $product->image = Helper::imageUploadProduct2($request, 'product', $product->id);
        }
        if($request->hasFile('image3')){
            $product->image = Helper::imageUploadProduct3($request, 'product', $product->id);
        }
        if($product->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-product-index'); 
    }

    public function destroy($id)
    {
        $products = Product::findOrFail($id); 
        if($products->delete())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-product-index'); 
    }

    public function active($id)
    {
        $product = Product::findOrFail($id);
        $product->status = 1;   
        if($product->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-product-index');        
    }
    
    public function unactive($id)
    {
        $product = Product::findOrFail($id); 
        $product->status = 0;    
        if($product->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-product-index');       
    }

    // Hàm client
    public function product_detail($id)
    {
        $product_5 = DB::table('product')->where('status', '1')->orderby('id', 'asc')->limit(5)->get();
        $category = DB::table('category')->where('status', '1')->get();
        $brand = DB::table('brand')->where('status', '1')->get();

        $product_detail = DB::table('product')->select('product.id', 'product.name', 'product.image','product.image2','product.image3','product.color','product.idsize', 'product.price','product.material','product.strap_material','product.locktype','product.number_compartments', 'product.dimensions','product.discount','product.content')->join('category', 'category.id', '=', 'product.idcat')->join('brand', 'brand.id', '=', 'product.idbra')->where('product.id', $id)->get();

        $cates_id = DB::table('product')->select('category.id')->join('category', 'category.id', '=', 'product.idcat')->join('brand', 'brand.id', '=', 'product.idbra')->where('product.id', $id)->get();

        foreach($cates_id as $value){
            $category_id = $value->id;
        }

        // $related_product = DB::table('product')->select('product.id', 'product.name', 'product.image','product.price',)->join('category', 'category.id', '=', 'product.idcat')->join('brand', 'brand.id', '=', 'product.idbra')->where('category.id', $category_id)->whereNotIn('product.id', [$id])->limit(4)->get();

        $related_product = DB::table('product')->select('product.id', 'product.name', 'product.image','product.price',)->join('category', 'category.id', '=', 'product.idcat')->join('brand', 'brand.id', '=', 'product.idbra')->join('size', 'size.id', '=', 'product.idsize')->where('category.id', $category_id)->whereNotIn('product.id', [$id])->limit(4)->get();
        

        return view('client.home.product_detail')->with('category', $category)->with('brand', $brand)->with('product_detail', $product_detail)->with('related_product', $related_product)->with('product_5', $product_5);
    }

}
