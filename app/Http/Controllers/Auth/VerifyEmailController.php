<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;;
use Carbon\Carbon;
use App\User;
use App\Company;

class VerifyEmailController extends Controller
{

    public function sendVerifyMail(){
      if(Auth::guard('web')->check()){
        $token =  $this->generateToken(Auth::guard('web')->user());
        $name = Auth::guard('web')->user()->first_name;
        Mail::send('email.verify', ['token' => $token, 'type' => 'user', 'name' => $name], function($message) {
          $message->subject("Dobrodošli na Jobr!" );
          $message->from('noreply@jobr.linyoon.com', 'Jobr');
          $message->to(Auth::guard('web')->user()->email);
        });
      }
      else if(Auth::guard('company')->check()){
        $token = $this->generateToken(Auth::guard('company')->user());
        $name = Auth::guard('company')->user()->name;
        Mail::send('email.verify', ['token' => $token, 'type' => 'company', 'name' => $name], function($message) {
          $message->subject("Dobrodošli na Jobr!" );
          $message->from('noreply@jobr.linyoon.com', 'Jobr');
          $message->to(Auth::guard('company')->user()->email);
        });
      }
      return redirect(route('verify'));
    }

    public function showVerifyMessage(){
      if(Auth::guard('web')->check()){
        return view('verify')->with('email', Auth::guard('web')->user()->email);
      }
      else if(Auth::guard('company')->check()){
        return view('verify')->with('email', Auth::guard('company')->user()->email);
      }
      return redirect(route('home'));
    }

    public function verifyEmailUser($token){
      $user = User::where('email_token', '=', $token)->first();

      if($user && Carbon::now()->diffInSeconds(Carbon::parse($user->email_token_expire), false) > 0){
        $user->verifed = 1;
        $user->email_token = null;
        $user->email_token_expire = null;
        $user->save();

        return view('verifed-success')->with('email', $user->email);
      }
      else if($user){
        return view('verifed-error')->with('email', $user->email);
      }
      else{
        return redirect()->route('home');
      }

    }

    public function verifyEmailCompany($token){

      $company = Company::where('email_token', '=', $token)->first();
      if($company && Carbon::now()->diffInSeconds(Carbon::parse($company->email_token_expire), false) > 0){
        $company->verifed = 1;
        $company->email_token = null;
        $company->email_token_expire = null;
        $company->save();

        return view('verifed-success')->with('email', $company->email);
      }
      else{
        return view('verifed-error')->with('email', $company->email);
      }
    }



    private function generateToken($user){
      do{
          $email_token = str_random(35);
          $user->email_token = $email_token;
          $user->email_token_expire = \Carbon\Carbon::now()->addDay(1);
      }
      while(!$user->save());
      return $email_token;
    }

}
