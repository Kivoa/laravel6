<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name','password','sex','face'];
    public $timestamps = false;

    public function add($request) {
        $this->name = $request->uName;
        $this->password = md5($request->uPass);
        $this->sex = $request->gender;
        $this->face = $request->head;
        return $this->save();
    }
    
}
