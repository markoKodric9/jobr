<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    protected $fillable = ['user_id', 'job_id'];

    public function user(){
      return $this->belongsTo('\App\User');
    }

    public function job(){
      return $this->belongsTo('\App\Job');
    }

    public static function getApplyFromJobAndUser($job_id, $user_id){
      return Apply::where('job_id', '=', $job_id)
                  ->where('user_id', '=', $user_id)
                  ->first();
    }
}
