<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ReceiptDetail;
use App\Models\Receipt;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;

class ReceiptDetailController extends Controller
{

    public function __construct()
    {
        $this->viewprefix='admin.receiptdetail.';
        $this->viewnamespace='admin/receiptdetail';
    }

    public function index()
    {
        $receiptDetails = ReceiptDetail::paginate(5);
        return view($this->viewprefix.'index', compact('receiptDetails'));
    }

    public function create()
    {
        $receipt = Receipt::all();
        $products = Product::all();
        return view($this->viewprefix.'add',compact('receipt', 'products'));
    }

    public function store(Request $request)
    {
        $receiptDetail = new ReceiptDetail();
        $this->validate($request, [
            'quantity' => 'required',
            'price' => 'required',
            'id_receipt' => 'required',
            'id_product' => 'required',
        ]);
        $receiptDetail->quantity = $request->quantity;
        $receiptDetail->price = $request->price;
        $receiptDetail->id_receipt = $request->id_receipt;
        $receiptDetail->id_product = $request->id_product;

        if($receiptDetail->save())
            Session::flash('message', 'successfully!');
            else
            Session::flash('message', 'Failure!');

        return redirect()->route('admin-receiptdetail-index');
    }

    public function getedit($id)
    {
        $receiptDetail = ReceiptDetail::findOrFail($id);
        $receipt = Receipt::all();
        $products = Product::all();
        return view($this->viewprefix.'edit',compact('receiptDetail', 'receipt', 'products'));    
    }

    public function postedit($id, request $request)
    {
        $receiptDetail = ReceiptDetail::findOrFail($id);
        $this->validate($request, [
            'quantity' => 'required',
            'price' => 'required',
            'id_receipt' => 'required',
            'id_product' => 'required',
        ]);
        $receiptDetail->quantity = $request->quantity;
        $receiptDetail->price = $request->price;
        $receiptDetail->id_receipt = $request->id_receipt;
        $receiptDetail->id_product = $request->id_product;
        
        if($receiptDetail->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        
        return redirect()->route('admin-receiptdetail-index');  
    }

    public function destroy($id)
    {
        $receiptDetail = ReceiptDetail::findOrFail($id);   
        if($receiptDetail->delete())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-receiptdetail-index');
    }

    public function active($id)
    {
        $receiptDetail = ReceiptDetail::findOrFail($id);
        $receiptDetail->status = 1;   
        if($receiptDetail->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-receiptdetail-index');        
    }
    
    public function unactive($id)
    {
        $receiptDetail = ReceiptDetail::findOrFail($id); 
        $receiptDetail->status = 0;    
        if($receiptDetail->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-receiptdetail-index');       
    }
}
