<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscribeRegion extends Model
{
    protected $fillable = ['user_id', 'region_id'];
}
