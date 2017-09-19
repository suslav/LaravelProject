<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
   public $timestamps = false;

   protected $fillable = ['ArticleTitle', 'ArticleDescription'];
}
