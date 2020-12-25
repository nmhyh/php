<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Classes\Helper;

class UserController extends Controller
{

    public function __construct()
    {   
        $this->viewprefix='admin.user.';
        $this->viewnamespace='admin/user';
    }

    public function index()
    {
        $users = User::paginate(5);
        return view($this->viewprefix.'index', compact('users'));
    }

    public function getadd()
    {
        return view('admin.user.add'); 
    }

    public function postadd(request $request)
    {
        $user = new User();
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->dateofbirth = $request->dateofbirth;
        $user->sex = $request->optradio;
        $user->phone = $request->phone;
        $user->position = $request->position;
        $user->image = $request->image;
        $user->save();
        
        $user->image = Helper::imageUpload($request, 'user', $user->id);
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

    public function myaccount($id)
    {
        $user = User::findOrFail($id);
        return view($this->viewprefix.'myaccount',compact('user'));      
    }

    public function postedit($id,request $request)
    {
        $user = User::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->dateofbirth = $request->dateofbirth;
        $user->sex = $request->optradio;
        $user->phone = $request->phone;
        $user->position = $request->position;
        $user->save();

        if($request->hasFile('image')){
            $user->image = Helper::imageUpload($request, 'user', $user->id);
        }
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

    public function active($id)
    {
        $user = User::findOrFail($id);
        $user->status = 1;   
        if($user->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect('admin/user');       
    }
    
    public function unactive($id)
    {
        $user = User::findOrFail($id); 
        $user->status = 0;    
        if($user->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect('admin/user');       
    }
}
