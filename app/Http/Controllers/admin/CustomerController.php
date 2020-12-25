<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Classes\Helper;


class CustomerController extends Controller
{

    public function __construct()
    {   
        $this->viewprefix='admin.customer.';
        $this->viewnamespace='admin/customer';
    }
    
    public function index()
    {
        $customers = Customer::paginate(5);
        return view($this->viewprefix.'index', compact('customers'));
    }

    public function create()
    {
        return view($this->viewprefix.'add');
    }

    public function store(Request $request)
    {
        $customer = new Customer();
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $customer->dateofbirth = $request->dateofbirth;
        $customer->sex = $request->optradio;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->image = $request->image;
        $customer->save();
        
        $customer->image = Helper::imageUpload($request, 'customer', $customer->id);

        if($customer->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect('admin/customer');
    }

    public function getedit($id)
    {
        $customer = Customer::findOrFail($id);
        return view($this->viewprefix.'edit',compact('customer'));      
    }

    public function postedit($id,request $request)
    {
        $customer = Customer::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $customer->dateofbirth = $request->dateofbirth;
        $customer->sex = $request->optradio;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();

        if($request->hasFile('image')){
            $customer->image = Helper::imageUpload($request, 'customer', $customer->id);
        }
        if($customer->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect('admin/customer');   
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);   
        if($customer->delete())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect('admin/customer'); 
    }

    public function active($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->status = 1;   
        if($customer->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect('admin/customer');       
    }
    
    public function unactive($id)
    {
        $customer = Customer::findOrFail($id); 
        $customer->status = 0;    
        if($customer->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect('admin/customer');       
    }
}
