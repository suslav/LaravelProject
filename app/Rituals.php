<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rituals extends Model
{
   public $timestamps = false;

    protected $fillable = ['RitualName', 'When','RitualCategoryID'];
}
