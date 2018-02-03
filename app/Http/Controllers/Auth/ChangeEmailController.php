<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use App\User;
use App\Company;

class ChangeEmailController extends Controller
{

  public function showChangeEmailForm(){
    if(Auth::guard('web')->check()){
      $email =  Auth::guard('web')->user()->email;
    }
    else if(Auth::guard('company')->check()){
      $email =  Auth::guard('company')->user()->email;
    }
    return view('change-email')->with('email', $email);
  }

  public function changeEmail(Request $request){
      $this->validator($request->all())->validate();

      if(Auth::guard('web')->check()){
        if(Auth::guard('web')->validate(['email' => Auth::guard('web')->user()->email, 'password' =>$request->input('password')])){
            $user = User::where('email', '=', (Auth::guard('web')->user()->email))->first();
            $user->email = $request->input('email');
            $user->save();

            return redirect(route('verify.send'));
        }
      }
      elseif (Auth::guard('company')->check()){
        if(Auth::guard('company')->validate(['email' => Auth::guard('company')->user()->email,  'password' => $request->input('password')])){
            $company = Company::where('email', '=', (Auth::guard('company')->user()->email))->first();
            $company->email = $request->input('email');
            $company->save();

            return redirect(route('verify.send'));
          }
      }
      $errors = new MessageBag();
      $errors->add('password', 'Napačno geslo');
      return back()->withErrors($errors)->withInput();
  }


  protected function validator(array $data)
  {
      return Validator::make($data, [
          'email' => 'required|string|email|max:255|confirmed',
          'password' => 'required|string|min:6',
      ]);
  }
}
