<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Job;
use App\Company;
use App\User;
use App\Message;
use App\Apply;
use App\Post;

class CompanyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth:company');
    }


    public function index(){
        $company_id = Auth::guard('company')->user()->id;
        $company = Company::find($company_id);
        $jobs = $company->getCompanyJobs();
        return view('company-dashboard')->with('jobs', $jobs);
    }

    public function showNewJobForm(){
      return view('job-new');
    }

    public function userProfile($id){
      $user = User::find($id);
      return view('user-profile')->with('user', $user);
    }

    public function newJob(Request $request){
      $this->newJobValidator($request->all())->validate();
      $data = $request->input();

      // Create new job
      $job = Job::create([
          'company_id' => Auth::guard('company')->user()->id,
          'job_type_id' => $data['job_type'],
          'category_id' => $data['category'],
          'post_id' => ($data['post']),
          'degree_id' => $data['degree'],
          'title' => $data['title'],
          'description' => $data['description'],
          'position' => $data['position'],
          'terms' => $data['terms'],
          'duration' => $data['duration'],
          'hourly_wage' => $data['hourly_wage'],
          'home' => $data['home'],
          'trial' => $data['trial'],
          'work_time' => $data['work_time'],
          'weekends' => $data['weekends'],
          'address' => $data['address']
      ]);

      // send mail to users if subscribed
      $users = User::all();


      $region = Post::getRegion($data['post']);
      $category = $data['category'];
      $type = $data['job_type'];

      foreach ($users as $user) {
        if($user->isSubbedRegion($region) &&
          $user->isSubbedCategory($category) &&
          $user->isSubbedType($type)){
            Mail::send('email.subscribe', ['job' => $job, 'user' => $user], function($message) use ($user) {
              $message->subject("Novo delovno mesto za vas");
              $message->from('noreply@jobr.linyoon.com', 'Jobr');
              $message->to($user->email);
            });
          }
      }

      // Redirect to company view/edit of job
      return redirect(route('company.job', $job));
    }

    public function showJobStats($id){;
      $job = Job::find($id);

      $companyID = Auth::guard('company')->user()->id;

      if($companyID == $job->company_id){
        $applied = $job->applies;
        return view('job-stats')->with(['job' => $job, 'applies' => $applied]);
      }
      else{
        return redirect(route('company.dashboard'));
      }
    }

    public function applyYes(Request $request){
      $job = Job::find($request->input('job_id'));
      if($job->status == 0){
        $apply = Apply::getApplyFromJobAndUser($request->input('job_id'), $request->input('user_id'));
        $apply->status = 1;
        $apply->save();

        Mail::send('email.apply-yes', ['apply' => $apply], function($message) use ($apply) {
          $message->subject("Bili ste sprejeti na delovno mesto");
          $message->from('noreply@jobr.linyoon.com', 'Jobr');
          $message->to($apply->user->email);
        });
      }

      return redirect()->back();
    }

    public function applyNo(Request $request){
      $job = Job::find($request->input('job_id'));
      if($job->status == 0){
        $apply = Apply::getApplyFromJobAndUser($request->input('job_id'), $request->input('user_id'));
        $apply->status = 2;
        $apply->save();

        Mail::send('email.apply-no', ['apply' => $apply], function($message) use ($apply) {
          $message->subject("Niste bili sprejeti na delovno mesto");
          $message->from('noreply@jobr.linyoon.com', 'Jobr');
          $message->to($apply->user->email);
        });
      }

      return redirect()->back();
    }

    public function showEditJob($id){
      $job = Job::find($id);

      $companyID = Auth::guard('company')->user()->id;

      if($companyID == $job->company_id){
        return view('job-edit')->with('job', $job);
      }
      else{
        return redirect(route('company.dashboard'));
      }
    }

    public function updateJob($id, Request $request){
      $job = Job::find($id);

      $this->newJobValidator($request->all())->validate();
      $data = $request->input();


      $job->update([
          'job_type_id' => $data['job_type'],
          'category_id' => $data['category'],
          'post_id' => ($data['post']),
          'degree_id' => $data['degree'],
          'title' => $data['title'],
          'description' => $data['description'],
          'position' => $data['position'],
          'terms' => $data['terms'],
          'duration' => $data['duration'],
          'hourly_wage' => $data['hourly_wage'],
          'home' => $data['home'],
          'trial' => $data['trial'],
          'work_time' => $data['work_time'],
          'weekends' => $data['weekends'],
          'address' => $data['address']
      ]);

      $job->save();

      return redirect(route('company.job', $job->id));
    }

    public function activateJob($id){
      $job = Job::find($id);
      $job->status = 0;
      $job->save();
      return redirect()->back();
    }

    public function deactivateJob($id){
      $job = Job::find($id);
      $job->status = 1;
      $job->save();
      return redirect()->back();
    }


    public function deleteJob($id){
      $job = Job::find($id);
      $job->delete();
      return redirect(route('company.dashboard'));
    }

    public function updateProfile(Request $request){
      $company = Auth::guard('company')->user();
      $data = $request->input();
      $company->update([
        'name' => $data['name'],
        'email' => $data['email'],
        'expertise_area' => $data['expertise_area'],
        'address' => $data['address'],
        'phone' => $data['phone'],
        'davcna' => $data['davcna'],
        'spletna' => $data['website'],
        'opis' => $data['desc']
    ]);

         return redirect(route('profile'));
    }
    /**
     * Get a validator for an incoming new job request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function newJobValidator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1024',
            'position' => 'required|string|max:1024',
            'terms' => 'nullable|string|max:1024',
            'duration' => 'nullable|numeric',
            'trial' => 'nullable|numeric',
            'hourly_wage' => 'required|numeric',
            'post' => 'required|numeric',
            'work_time' =>'required|max:2',
            'address' => 'required|string|max:100',
            'weekends' => 'required',
            'home' => 'required',
        ]);
    }

}
