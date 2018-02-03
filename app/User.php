<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'about', 'cv', 'pic', 'first_name', 'last_name', 'email', 'password', 'gender', 'birthday', 'phone', 'email_token', 'verifed'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function applies(){
      return $this->hasMany('\App\Apply')->get();
    }

    public function messages(){
      return $this->hasMany('\App\Message')->orderBy('created_at', 'DESC')->get();
    }
    public function sentMessages(){
      return $this->hasMany('\App\Message')->orderBy('created_at', 'DESC')->where('sender', '=', 'user')->get();
    }
    public function receivedMessages(){
      return $this->hasMany('\App\Message')->orderBy('created_at', 'DESC')->where('sender', '=', 'company')->get();
    }
    public function unreadMessages(){
      return $this->hasMany('\App\Message')->where('sender', '=', 'company')->where('seen', '=', 0)->get();
    }

    // Subscriptions
    public function isSubbedRegion($region_id){
        return $this->hasMany('\App\SubscribeRegion')->whereIn('region_id',$region_id)->count() > 0;
    }

    public function isSubbedCategory($category_id){
        return $this->hasMany('\App\SubscribeCategory')->where('category_id', '=', $category_id)->count() > 0;
    }
    public function isSubbedType($type_id){
        return $this->hasMany('\App\SubscribeType')->where('job_type_id', '=', $type_id)->count() > 0;
    }
}
