<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teizireply extends Model
{
    protected $fillable = ['name','content','teizi_id','user_id'];
    // public $timestamps = true;
}
