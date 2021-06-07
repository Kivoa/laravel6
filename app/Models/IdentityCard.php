<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IdentityCard extends Model
{
    protected $fillable = ['city'];
    public function name()
    {
        return $this->belongsTo('App\Name');
    }
}
