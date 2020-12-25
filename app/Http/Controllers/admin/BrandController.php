<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;
use App\Classes\Helper;
use DB;

class BrandController extends Controller
{

    public function __construct()
    {
        $this->viewprefix='admin.brand.';
        $this->viewnamespace='admin/brand';
    }
    
    public function index()
    {
        $brands = Brand::paginate(5);
        return view($this->viewprefix.'index')->with('brands', $brands);
    }

    public function create()
    {
        return view($this->viewprefix.'add');
    }

    public function store(Request $request)
    {
        $brand = new Brand();
        $this->validate($request, [
            'name' => 'required',
        ]);
        $brand->name = $request->name;
        if($brand->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-brand-index');
    }


    public function getedit($id)
    {
        $brand = Brand::findOrFail($id);
        return view($this->viewprefix.'edit')->with('brand', $brand);   
    }

    public function postedit($id,request $request)
    {
        $brand = Brand::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
        ]);
        $brand->name = $request->name;       
        
        if($brand->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        
        return redirect()->route('admin-brand-index');  
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);   
        if($brand->delete())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-brand-index');
    }
    public function active($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->status = 1;   
        if($brand->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-brand-index');        
    }
    public function unactive($id)
    {
        $brand = Brand::findOrFail($id); 
        $brand->status = 0;    
        if($brand->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-brand-index');       
    }
    
    //Hàm client
    
    public function show_brand($id)
    {
        $category = DB::table('category')->where('status', '1')->get();
        $brand = DB::table('brand')->where('status', '1')->get();
        $size = DB::table('size')->where('status', '1')->get();

        $brand_by_id = DB::table('product')->select('product.name', 'product.image', 'product.id', 'product.price')->join('brand','product.idbra', '=', 'brand.id')->where('product.idbra', $id)->get();

        $brand_name = DB::table('brand')->where('brand.id', $id)->limit(1)->get();

        return view('client.home.fill.show_brand')->with('category', $category)->with('brand', $brand)->with('size', $size)->with('brand_by_id', $brand_by_id)->with('brand_name', $brand_name);
    }
}
