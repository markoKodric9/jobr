<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

class CompanyLoginController extends Controller{
    public function __construct(){
      $this->middleware('guest:company');
    }

    public function showLoginForm(){
      return View('auth.login-company');
    }

    public function login(Request $request){
      // Validate the form database
      $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required'
      ]);



      // Attemp to login user-comapny in
      if(Auth::guard('company')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
          //if successful, then redirect to intended location
          return redirect()->intended(route('company.dashboard'));
      }
      // if unsuccessful, then redirect back to the login with the form data

      return redirect()->back()->withInput($request->only('email'))->withErrors([
        'email' => [trans('auth.failed')]
      ]);
    }

}
