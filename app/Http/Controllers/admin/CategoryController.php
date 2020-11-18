<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Session;
class CategoryController extends Controller
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
        $this->viewprefix='admin.category.';
        $this->viewnamespace='admin/category';
    }
    public function index()
    {
        $categorys = Category::all();
        return view($this->viewprefix.'index')->with('cate', $categorys);
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
        $category = new Category();
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
            'content' => 'required',
        ]);
        $category->name = $request->name;
        $category->image = $request->image;
        $category->content = $request->content;
        if($category->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-caterogy-index');   
    }
    public function imageUpload(Request $request)
    {
        if($request->hasFile('image')){
            if($request->file('image')->isValid()){
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/images'), $imageName);
                return $imageName;
            }
        }
        return "";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */

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
            'image' => 'required',
            'content' => 'required',
        ]);
        $category->name = $request->name;
        $category->image = $request->image;
        $category->content = $request->content;
        if($category->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-caterogy-index');  
    }
    // public function edit(Category $category)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);   
        if($category->delete())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-caterogy-index');
    }
}
