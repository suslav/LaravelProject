<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
   public $timestamps = false;

   protected $fillable = ['EventTitle', 'EventDescription','EventFromDate','EventToDate','EventImageUrl'];
}
