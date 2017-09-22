<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Srimahameruanswers extends Model
{
   public $timestamps = false;

   protected $fillable = ['SMMAnswer', 'SMMQuestionID','VisitorFormID'];
}
