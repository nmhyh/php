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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->middleware('CheckAdminLogin');
        $this->viewprefix='admin.receipt.';
        $this->viewnamespace='admin/receipt';
    }
    public function index()
    {
        $receipts = Receipt::all();
        return view($this->viewprefix.'index', compact('receipts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Supplier::all();
        $users = User::all();
        return view($this->viewprefix.'add',compact('category', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $receipt = new Receipt();
        $this->validate($request, [
            'name' => 'required',
            'iduser' => 'required',
            'idsup' => 'required',
        ]);
        $receipt->name = $request->name;
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
        // $receipts = Receipt::all();
        $category = Supplier::all();
        $users = User::all();
        return view($this->viewprefix.'edit',compact('receipt', 'category', 'users'));    
    }
    public function postedit($id, request $request)
    {
        $receipt = Receipt::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
            'iduser' => 'required',
            'idsup' => 'required',
        ]);
        $receipt->name = $request->name;       
        $receipt->iduser = $request->iduser;
        $receipt->idsup = $request->idsup;
        
        if($receipt->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        
        return redirect()->route('admin-receipt-index');  
    }
    // public function edit(Product $product)
    // {
    //     $products = Product::all();
    //     $category = Category::all();
    //     return view($this->viewprefix.'edit',compact('product', 'category'));
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function show(Receipt $receipt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function edit(Receipt $receipt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receipt $receipt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
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
