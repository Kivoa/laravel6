<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bankuai extends Model
{
    protected $fillable = ['name','fatherId'];
    public $timestamps = false;
}
