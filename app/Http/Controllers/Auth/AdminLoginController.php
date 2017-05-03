<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{

      //middleware
      public function __construct()
      {
        $this->middleware('guest:admin');
      }
      public function showLoginForm()
      {
        return view('auth.admin-login');
      }

      public function login(Request $request)
      {
        //validte the form data
        $this->validate($request,
        [
          'email' => 'required|email',
          'password' => 'required|min:6'
        ]);

        //Attempt to login user in
        if(Auth::guard('admin')->attempt(['email'=> $request->email, 'password'=> $request->password], $request->remember))
        {
          //if succesfull, then redirect  to their intended function
          return redirect()->intended(route('admin.dashboard'));
        }
        //else, redirect back to login form
        return redirect()->back()->withInput($request->only('email', 'remember'));
      }
}
