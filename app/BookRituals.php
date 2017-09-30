<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookrituals extends Model
{
    public $timestamps = false;

    protected $fillable = ['Name', 'Gotram','Gender','Address','Mobile','Date','RitualID','UserID'];
}
