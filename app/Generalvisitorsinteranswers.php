<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Generalvisitorsinteranswers extends Model
{
   public $timestamps = false;

   protected $fillable = ['GVIAnswer', 'GVIQuestionID','VisitorFormID'];
}
