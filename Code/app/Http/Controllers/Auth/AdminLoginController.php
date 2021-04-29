<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Admin;


class AdminLoginController extends Controller
{

    use AuthenticatesUsers;


    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }



    public function showLoginForm()
    {
        return view('auth.adminlogin');
    }

    public function login(Request $request)
    {


        //validate the form data
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        //Attempt to log the admin in
        //$credentials array contain email and password
          //Auth::guard('admin')->attempt($credentials, $remember);

        if(Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember))
        {
           // return "got ya..";
              //if successful, then redirect to their inteneded location
              return redirect()->intended('/super/alladmins');
              //return redirect('/super/alladmins');
        }

            //  return "not yet..";
             //if unsuccessful return back to login page
             return redirect()->back()->withInput($request->only('email','remember'));
           //which user you choiced
           //return Auth::guard->user()

    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        //return ($this->showLoginForm());
        return redirect('/admin/login');
    }
}
