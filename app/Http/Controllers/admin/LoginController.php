<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {

    }
    public function getLogin()
    {
        if (Auth::check()) {
            return view('admin.layout');
        } else {
            return view('admin.login.login');
        }
    }
    public function postLogin(request $request)
    {   
        $login = [
            'email' => $request->txtEmail,
            'password' => $request->txtPassword,
            'status'    => 1
        ];
        
        if (Auth::attempt($login)) {
            return view('admin.overview.index')->with('name', Auth::User()->name);
        } else {
            return view('admin.login.login')->with('status', 'Email hoặc Password không chính xác');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return view('admin.login.login');
    }

}
?>