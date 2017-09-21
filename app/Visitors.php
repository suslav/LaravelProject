<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitors extends Model
{
   public $timestamps = false;

   protected $fillable = ['UserID', 'FormTypeID','Date'];
}
