<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Replys extends Model
{
    public $timestamps = false;

    protected $fillable = ['UserID', 'VisitorFormID','ReplyMessage','ReplyDate','ApproveStatus'];
}
