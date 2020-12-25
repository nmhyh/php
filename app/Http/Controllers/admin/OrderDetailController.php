<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;
use App\Classes\Helper;
use DB;

class OrderDetailController extends Controller
{

    public function __construct()
    {
        $this->viewprefix='admin.orderdetail.';
        $this->viewnamespace='admin/orderdetail';
    }
    
    public function index()
    {
        $orderDetails = OrderDetail::paginate(5);
        return view($this->viewprefix.'index')->with('orderDetails', $orderDetails);
    }

    public function create()
    {
        $order = Order::all();
        $products = Product::all();
        return view($this->viewprefix.'add', compact('order', 'products'));
    }

    public function store(Request $request)
    {
        $orderDetail = new OrderDetail();
        $this->validate($request, [
            'quantity' => 'required',
        ]);
        $orderDetail->quantity = $request->quantity;
        $orderDetail->id_order = $request->id_order;
        $orderDetail->id_product = $request->id_product;
        
        if($orderDetail->save())
        Session::flash('message', 'successfully!');
        else
        Session::flash('message', 'Failure!');
        return redirect()->route('admin-orderdetail-index');
    }

    public function getedit($id)
    {
        $order = Order::all();
        $products = Product::all();
        $orderDetail = OrderDetail::findOrFail($id);
        return view($this->viewprefix.'edit')->with('order', $order)->with('products', $products)->with('orderDetail', $orderDetail);      
    }

    public function postedit($id,request $request)
    {
        $orderDetail = OrderDetail::findOrFail($id);
        $this->validate($request, [
            'quantity' => 'required',
        ]);
        $orderDetail->quantity = $request->quantity;
        $orderDetail->id_order = $request->id_order;
        $orderDetail->id_product = $request->id_product;
        
        if($orderDetail->save())
        Session::flash('message', 'successfully!');
        else
        Session::flash('message', 'Failure!');
        return redirect()->route('admin-orderdetail-index');
    }

    public function destroy($id)
    {
        $orderDetail = OrderDetail::findOrFail($id);   
        if($orderDetail->delete())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-orderdetail-index');
    }
    
    public function active($id)
    {
        $orderDetail = OrderDetail::findOrFail($id);
        $orderDetail->status = 1;   
        if($orderDetail->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-orderdetail-index');        
    }
    
    public function unactive($id)
    {
        $orderDetail = OrderDetail::findOrFail($id); 
        $orderDetail->status = 0;    
        if($orderDetail->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-orderdetail-index');       
    }
}
