<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Job extends Model
{

  protected $fillable = [
      'company_id', 'job_type_id', 'category_id', 'post_id', 'degree_id', 'title', 'description', 'position', 'terms', 'duration', 'hourly_wage', 'home', 'trial', 'work_time', 'weekends', 'address'
  ];

    /**
     * Get Company Elequent object for company, that submitted the job offer
     * @return \App\Company
     */
    public function company(){
      return $this->belongsTo('\App\Company');
    }


    public function category(){
      return $this->belongsTo('\App\Category');
    }

    public function type(){
      return $this->belongsTo('\App\JobType', 'job_type_id');
    }

    public function post(){
      return $this->belongsTo('\App\Post', 'post_id', 'post');
    }


    public function degree(){
      return $this->belongsTo('\App\Degree');
    }

    public function applies(){
      return $this->hasMany('\App\Apply');
    }

    public function isApplied($user_id){
        return sizeof($this->hasMany('\App\Apply')->where('user_id', '=', $user_id)->get()) == 1;
    }
}
