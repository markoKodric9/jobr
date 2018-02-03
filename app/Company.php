<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{

    protected $guard = 'company';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'expertise_area', 'address', 'phone', 'geo_area', 'email_token', 'verifed', 'davcna', 'spletna', 'opis', 'post_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getCompanyJobs(){
      return $this->hasMany('App\Job')->get();
    }

    public function getActiveCompanyJobs(){
      return $this->hasMany('App\Job')->where('status', '=', '0')->get();
    }

    public function messages(){
      return $this->hasMany('\App\Message')->orderBy('created_at', 'DESC')->get();
    }
    public function sentMessages(){
      return $this->hasMany('\App\Message')->orderBy('created_at', 'DESC')->where('sender', '=', 'company')->get();
    }
    public function receivedMessages(){
      return $this->hasMany('\App\Message')->orderBy('created_at', 'DESC')->where('sender', '=', 'user')->get();
    }
    public function unreadMessages(){
        return $this->hasMany('\App\Message')->where('sender', '=', 'user')->where('seen', '=', 0)->get();
    }
}
