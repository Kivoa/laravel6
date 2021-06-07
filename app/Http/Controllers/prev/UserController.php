<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($a,$b)
    {
        return $a+$b;
    }
}

