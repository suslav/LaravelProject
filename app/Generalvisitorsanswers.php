<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Generalvisitorsanswers extends Model
{
     public $timestamps = false;

     protected $fillable = ['GVAnswer', 'GVQuestionID','VisitorFormID'];
}
