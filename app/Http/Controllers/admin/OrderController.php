<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use Session;
use App\Classes\Helper;
use DB;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->viewprefix='admin.order.';
        $this->viewnamespace='admin/order';
    }
    
    public function index()
    {
        $orders = Order::paginate(5);
        return view($this->viewprefix.'index')->with('orders', $orders);
    }

    public function create()
    {
        $customer = Customer::all();
        return view($this->viewprefix.'add',compact('customer'));
    }

    public function store(Request $request)
    {
        $order = new Order();
        $this->validate($request, [
            'total' => 'required',
        ]);
        $order->total = $request->total;
        $order->id_customer = $request->id_customer;
        
        if($order->save())
        Session::flash('message', 'successfully!');
        else
        Session::flash('message', 'Failure!');
        return redirect()->route('admin-order-index');
    }

    public function getedit($id)
    {
        $customer = Customer::all();
        $order = Order::findOrFail($id);
        return view($this->viewprefix.'edit')->with('order', $order)->with('customer', $customer);      
    }

    public function postedit($id,request $request)
    {
        $order = Order::findOrFail($id);
        $this->validate($request, [
            'total' => 'required',
        ]);
        $order->total = $request->total;
        $order->id_customer = $request->id_customer;

        if($order->save())
        Session::flash('message', 'successfully!');
        else
        Session::flash('message', 'Failure!');
        return redirect()->route('admin-order-index');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);   
        if($order->delete())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-order-index');
    }
    
    public function active($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 1;   
        if($order->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-order-index');        
    }
    
    public function unactive($id)
    {
        $order = Order::findOrFail($id); 
        $order->status = 0;    
        if($order->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('admin-order-index');       
    }
}
