<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Receipt;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Session;

class ReceiptController extends Controller
{
    public function __construct()
    {
        $this->viewprefix='admin.receipt.';
        $this->viewnamespace='admin/receipt';
    }
    public function index()
    {
        $receipts = Receipt::paginate(5);
        return view($this->viewprefix.'index', compact('receipts'));
    }

    public function create()
    {
        $supplier = Supplier::all();
        $users = User::all();
        return view($this->viewprefix.'add',compact('supplier', 'users'));
    }

    public function store(Request $request)
    {
        $receipt = new Receipt();
        $this->validate($request, [
            'name' => 'required',
            'total' => 'required',
            'iduser' => 'required',
            'idsup' => 'required',
        ]);
        $receipt->name = $request->name;
        $receipt->total = $request->total;
        $receipt->iduser = $request->iduser;
        $receipt->idsup = $request->idsup;

        if($receipt->save())
            Session::flash('message', 'successfully!');
            else
            Session::flash('message', 'Failure!');

        return redirect()->route('admin-receipt-index');

    }

    public function getedit($id)
    {
        $receipt = Receipt::findOrFail($id);
        $category = Supplier::all();
        $users = User::all();
        return view($this->viewprefix.'edit',compact('receipt', 'category', 'users'));    
    }

    public function postedit($id, request $request)
    {
        $receipt = Receipt::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
            'total' => 'required',
            'iduser' => 'required',
            'idsup' => 'required',
        ]);
        $receipt->name = $request->name;   
        $receipt->total = $request->total;    
        $receipt->iduser = $request->iduser;
        $receipt->idsup = $request->idsup;
        
        if($receipt->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        
        return redirect()->route('admin-receipt-index');  
    }
    
    public function destroy($id)
    {
        $receipt = Receipt::findOrFail($id);   
        if($receipt->delete())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-receipt-index');
    }

    public function active($id)
    {
        $receipt = Receipt::findOrFail($id);
        $receipt->status = 1;   
        if($receipt->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-receipt-index');        
    }
    
    public function unactive($id)
    {
        $receipt = Receipt::findOrFail($id); 
        $receipt->status = 0;    
        if($receipt->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-receipt-index');       
    }
}
