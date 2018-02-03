<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscribeType extends Model
{
    protected $fillable = ['user_id', 'job_type_id'];
}
