<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photoalbum extends Model
{
   public $timestamps = false;

   protected $fillable = ['Title', 'Description', 'AlbumUrl','AlbumThumbUrl'];
}
