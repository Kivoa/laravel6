<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Name extends Model
{
    protected $fillable = ['name'];
    public function identity_card()
    {
        return $this->hasOne('App\IdentityCard');
    }
}
