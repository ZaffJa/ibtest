<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input as input;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
class ChangePasswordController extends Controller
{
  //public function showForm()
  //{
//return view('auth.change_password');
  //}

  public function changePassword(){
    $User = User::find(Auth::user()->id);

    if(Hash::check(Input::get('passwordold'), $User['password']) && Input::get('password') == Input::get('password_confirmation')){

      $User->password = Hash::make(Input::get('password'));
      $User->save();
      return back()->with('success', 'Password Changed!!!');

    }
    else{
      return back()->with('error', 'Password NOT Changed!!');
    }
  }
}
