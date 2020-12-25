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

    public function __construct()
    {
        $this->viewprefix='admin.size.';
        $this->viewnamespace='admin/size';
    }

    public function index()
    {
        $sizes = Size::paginate(5);
        return view($this->viewprefix.'index')->with('sizes', $sizes);
    }

    public function create()
    {
        return view($this->viewprefix.'add');
    }

    public function store(Request $request)
    {
        $size = new Size();
        $this->validate($request, [
            'name' => 'required',
        ]);
        $size->name = $request->name;
        if($size->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-size-index');
    }

    public function getedit($id)
    {
        $size = Size::findOrFail($id);
        return view($this->viewprefix.'edit')->with('size', $size);   
    }

    public function postedit($id,request $request)
    {
        $size = Size::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
        ]);
        $size->name = $request->name;       
        
        if($size->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        
        return redirect()->route('admin-size-index');  
    }
   
    public function destroy($id)
    {
        $size = Size::findOrFail($id);   
        if($size->delete())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-size-index');
    }

    public function active($id)
    {
        $size = Size::findOrFail($id);
        $size->status = 1;   
        if($size->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-size-index');        
    }
    
    public function unactive($id)
    {
        $size = Size::findOrFail($id); 
        $size->status = 0;    
        if($size->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-size-index');       
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
