<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Svcanswer extends Model
{
   public $timestamps = false;

   protected $fillable = ['SVCAnswer', 'SVCQuestionID','VisitorFormID'];
}
