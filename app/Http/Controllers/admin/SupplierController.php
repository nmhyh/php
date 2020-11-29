<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Session;
use App\Classes\Helper;
use DB;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('CheckAdminLogin');
        $this->viewprefix='admin.supplier.';
        $this->viewnamespace='admin/supplier';
    }
    public function index()
    {
        $suppliers = Supplier::all();
        return view($this->viewprefix.'index')->with('suppliers', $suppliers);
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
        $supplier = new Supplier();
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        if($supplier->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-supplier-index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function getedit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view($this->viewprefix.'edit')->with('supplier', $supplier);   
    }
    public function postedit($id,request $request)
    {
        $supplier = Supplier::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        $supplier->name = $request->name;       
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        
        if($supplier->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        
        return redirect()->route('admin-supplier-index');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);   
        if($supplier->delete())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-supplier-index');
    }
    public function active($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->status = 1;   
        if($supplier->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-supplier-index');        
    }
    public function unactive($id)
    {
        $supplier = Supplier::findOrFail($id); 
        $supplier->status = 0;    
        if($supplier->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-supplier-index');       
    }

    //Hàm client
    
    public function show_supplier($id)
    {
        $category = DB::table('category')->where('status', '1')->get();
        $supplier = DB::table('supplier')->where('status', '1')->get();

        $supplier_by_id = DB::table('product')->select('product.name', 'product.image', 'product.id', 'product.price')->join('supplier','product.idsup', '=', 'supplier.id')->where('product.idsup', $id)->get();

        $supplier_name = DB::table('supplier')->where('supplier.id', $id)->limit(1)->get();

        return view('client.home.show_supplier')->with('category', $category)->with('supplier', $supplier)->with('supplier_by_id', $supplier_by_id)->with('supplier_name', $supplier_name);
    }
}
