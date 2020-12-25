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

    public function __construct()
    {
        $this->viewprefix='admin.supplier.';
        $this->viewnamespace='admin/supplier';
    }

    public function index()
    {
        $suppliers = Supplier::paginate(5);
        return view($this->viewprefix.'index')->with('suppliers', $suppliers);
    }

    public function create()
    {
        return view($this->viewprefix.'add');
    }

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
    

}
