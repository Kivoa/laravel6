<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UseController extends Controller
{
    public function use()
    {
        $arr =[
            'name' => '黎明',
            'age' => '30'
        ];
        return view('my-view',$arr);
    }

}
