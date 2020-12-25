<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;

class CheckoutController extends Controller
{
    public function login_checkout()
    {
        $product_5 = DB::table('product')->where('status', '1')->orderby('id', 'asc')->limit(5)->get();
        return View('client.checkout.checkout')->with('product_5', $product_5);
    }

    public function register()
    {
        $product_5 = DB::table('product')->where('status', '1')->orderby('id', 'asc')->limit(5)->get();
        return View('client.checkout.register')->with('product_5', $product_5);
    }

    public function add_Customer(Request $request)
    {
        $product_5 = DB::table('product')->where('status', '1')->orderby('id', 'asc')->limit(5)->get();
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

        if($customer->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return view('client.checkout.checkout')->with('product_5', $product_5);
    }

}
