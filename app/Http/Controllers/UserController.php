<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Job;
use App\Company;
use App\SubscribeRegion;
use App\SubscribeCategory;
use App\SubscribeType;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth:web');
    }

    public function applies(){
      $user = Auth::guard('web')->user();
      $applies = $user->applies();
      return view('user-applies')->with(['user' => $user, 'applies' => $applies]);
    }

    public function showSubscriptions(){
      $user_id = Auth::guard('web')->user()->id;
      $region = SubscribeRegion::where('user_id', '=', $user_id)->pluck('region_id')->toArray();
      $category = SubscribeCategory::where('user_id', '=', $user_id)->pluck('category_id')->toArray();
      $type = SubscribeType::where('user_id', '=', $user_id)->pluck('job_type_id')->toArray();

      return view('user-subs')->with([
        'regionSubs' => $region,
        'categorySubs' => $category,
        'typeSubs' => $type,
      ]);
    }

    public function updateSubscriptions(Request $request){
      $user_id = Auth::guard('web')->user()->id;
      $regions = $request->input('regions');
      $categories = $request->input('categories');
      $types = $request->input('types');

      SubscribeRegion::where('user_id', '=', $user_id)->delete();
      if(sizeof($regions) > 0){
        foreach ($regions as $region => $region_id) {
          SubscribeRegion::create([
            'user_id' => $user_id,
            'region_id' => $region_id
          ]);
        }
      }

      SubscribeCategory::where('user_id', '=', $user_id)->delete();
      if(sizeof($categories) > 0){
        foreach ($categories as $category => $category_id) {
          SubscribeCategory::create([
            'user_id' => $user_id,
            'category_id' => $category_id
          ]);
        }
      }

      SubscribeType::where('user_id', '=', $user_id)->delete();
      if(sizeof($types) > 0){
        foreach ($types as $type => $type_id) {
          SubscribeType::create([
            'user_id' => $user_id,
            'job_type_id' => $type_id
          ]);
        }
      }

      return redirect()->route('subscriptions');
    }

    public function updateProfile(Request $request){
      $user = Auth::guard('web')->user();

       if(null !== Input::file('cv')){
         if (Input::file('cv')->isValid()) {
              $destinationPath = public_path('uploads/cvs');
              $extension = Input::file('cv')->getClientOriginalExtension();
              $cvName = uniqid().'.'.$extension;

              Input::file('cv')->move($destinationPath, $cvName);

              $user->cv = $cvName;
          }
        }

        if(null !== Input::file('pic')){
          if (Input::file('pic')->isValid()) {
               $destinationPath = public_path('uploads/pics');
               $extension = Input::file('pic')->getClientOriginalExtension();
               $picName = uniqid().'.'.$extension;

               Input::file('pic')->move($destinationPath, $picName);

               $user->pic = $picName;
           }
         }

         $user->about = $request->input('about');
         $user->save();

         return redirect(route('profile'));
    }
}
