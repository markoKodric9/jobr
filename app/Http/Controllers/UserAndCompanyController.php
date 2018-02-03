<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Job;
use App\Company;

class UserAndCompanyController extends Controller
{
    public function profile(){
        if(Auth::guard('web')->check()){
          return view('user-profile')->with('user', Auth::guard('web')->user());
        }
        else if(Auth::guard('company')->check()){
          $jobs = Auth::guard('company')->user()->getActiveCompanyJobs();
          return view('company-profile')->with(['company' => Auth::guard('company')->user(), 'jobs' => $jobs]);
        }
        return redirect(route('home'));
    }

    public function editProfile(){
        if(Auth::guard('web')->check()){
          return view('user-profile-edit')->with('user', Auth::guard('web')->user());
        }
        else if(Auth::guard('company')->check()){
          return view('company-profile-edit')->with('company', Auth::guard('company')->user());
        }
        return redirect(route('home'));
    }


}
