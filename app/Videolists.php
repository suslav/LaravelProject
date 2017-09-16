<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videolists extends Model
{

 public $timestamps = false;

 protected $fillable = ['VideoTitle', 'VideoDescription', 'VideoEmbedcode','VideoCategoryId'];

//   public function videolists()
//{
  //  return $this->hasMany('App\Videolists');
//}

}
