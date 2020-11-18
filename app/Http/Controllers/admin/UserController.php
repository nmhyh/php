<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Session;

class UserController extends Controller
{
    public $viewprefix;
    public $viewnamespace;
    public function __construct()
    {   
        //$this->middleware('CheckAdminLogin');
        $this->viewprefix='admin.user.';
        $this->viewnamespace='admin/user';
    }
    public function index()
    {
        $users = User::all();
        return view($this->viewprefix.'index', compact('users'));
    }
    public function getadd()
    {
        return view('admin.user.add'); 
    }
    public function postadd(request $request)
    {
        $user = new User;
        $user->name = $request->txtname;
        $user->email = $request->txtemail;
        $user->password = Hash::make($request->txtpassword);
        $user->dateofbirth = $request->txtdateofbirth;
        $user->sex = $request->optradio;
        $user->phone = $request->txtphone;
        $user->position = $request->txtposition;
        $user->image = $request->txtimage;
        if($user->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect('admin/user');
    }
    public function getedit($id)
    {
        $user = User::findOrFail($id);
        return view($this->viewprefix.'edit',compact('user'));      
    }
    public function postedit($id,request $request)
    {
        $user = User::findOrFail($id);
        $this->validate($request, [
            'txtname' => 'required',
            'txtemail' => 'required',
            'txtpassword' => 'required',
            'txtdateofbirth' => 'required',
            'optradio' => 'required',
            'txtposition' => 'required',
            'txtimage' => 'required',
        ]);
        $user->name = $request->txtname;
        $user->email = $request->txtemail;
        $user->password = Hash::make($request->txtpassword);
        $user->dateofbirth = $request->txtdateofbirth;
        $user->sex = $request->optradio;
        $user->phone = $request->txtphone;
        $user->position = $request->txtposition;
        $user->image = $request->txtimage;
        if($user->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect('admin/user');   
    }
    public function delete($id)
    {
        $user = User::findOrFail($id);   
        if($user->delete())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect('admin/user');       
    }
}
