<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  public static function getPostsFromRegion($array){
    return Post::whereIn('region_id', $array)->get(['post']);
  }

  public static function getRegion($post){
    return Post::where('post', '=', $post)->get(['region_id']);
  }

  public function region(){
    return $this->belongsTo('App\Region');
  }
}
