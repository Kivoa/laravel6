<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\MessageBag;


class TestController extends Controller
{
    public function index(Request $request)
    {
        // $validate = $request->validate([
        //     'name' => 'required|between:4,32|unique:students',
        //     'age' => 'required',
        // ]);

        //表单验证
        $rq = $request->all();
        $validator = Validator::make($rq, [
            'name' => 'required|between:4,32|unique:peoples|alpha_dash',
            'password' => 'required|between:6,255',
        ]);
       if ($validator ->fails()) {
           return $validator -> errors();
       }
       echo '<script>alert("验证通过")</script>';
       return view('home1');
       //return redirect('/'); //不显示js代码 ？？
    }
}
