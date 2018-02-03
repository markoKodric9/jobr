<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
      'user_id',
      'company_id',
      'sender',
      'title',
      'message',
    ];

    public function user(){
      return $this->belongsTo('\App\User');
    }

    public function company(){
      return $this->belongsTo('\App\Company');
    }
}
