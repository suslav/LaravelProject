<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Srividyacourses extends Model
{
   public $timestamps = false;

   protected $fillable = ['CouresTitle', 'CourseFromDate','CourseToDate','CourseImageUrl','CourseDescription'];
}
