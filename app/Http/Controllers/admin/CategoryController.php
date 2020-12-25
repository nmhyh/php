<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;
use Session;
use App\Classes\Helper;
use DB;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->viewprefix='admin.category.';
        $this->viewnamespace='admin/category';
    }
    
    public function index()
    {
        $categorys = Category::paginate(5);
        return view($this->viewprefix.'index')->with('cate', $categorys);
    }

    public function create()
    {
        return view($this->viewprefix.'add');
    }

    public function store(Request $request)
    {
        $category = new Category();
        $this->validate($request, [
            'name' => 'required',
        ]);
        $category->name = $request->name;
        $category->image = $request->image;
        $category->content = $request->content;
        $category->save();
        
        $category->image = Helper::imageUpload($request, 'category', $category->id);

        if($category->save())
        Session::flash('message', 'successfully!');
        else
        Session::flash('message', 'Failure!');
        return redirect()->route('admin-category-index');   
    }

    public function getedit($id)
    {
        $category = Category::findOrFail($id);
        return view($this->viewprefix.'edit')->with('cate', $category);      
    }

    public function postedit($id,request $request)
    {
        $category = Category::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',    
        ]);
        $category->name = $request->name;
        $category->content = $request->content;
        $category->save();

        if($request->hasFile('image')){
            $category->image = Helper::imageUpload($request, 'category', $category->id);
        }

        if($category->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-category-index');
    }
   
    public function destroy($id)
    {
        $category = Category::findOrFail($id);   
        if($category->delete())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-category-index');
    }
    
    public function active($id)
    {
        $category = Category::findOrFail($id);
        $category->status = 1;   
        if($category->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-category-index');        
    }
    
    public function unactive($id)
    {
        $category = Category::findOrFail($id); 
        $category->status = 0;    
        if($category->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-category-index');       
    }

    // hàm client
    public function show_category($id)
    {
        $category = DB::table('category')->where('status', '1')->get();
        $brand = DB::table('brand')->where('status', '1')->get();
        $size = DB::table('size')->where('status', '1')->get();

        $category_by_id = DB::table('product')->select('product.name', 'product.image', 'product.id', 'product.price')->join('category','product.idcat', '=', 'category.id')->where('product.idcat', $id)->get();

        $category_name = DB::table('category')->where('category.id', $id)->limit(1)->get();

        return view('client.home.fill.show_category')->with('category', $category)->with('brand', $brand)->with('size', $size)->with('category_by_id', $category_by_id)->with('category_name', $category_name);
    }
}
