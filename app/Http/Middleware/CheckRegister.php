<?php

namespace App\Http\Middleware;

use Closure;

class CheckRegister
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $username = $request -> uName;
        $password = $request -> uPass;
        $password1 = $request -> uPass1;
        $sex = $request -> gender;
        $face = $request -> head;
        //判断用户信息是否为空
        if ($username == "" || $password == "" || $password1 == "" || $sex == "" || $face == "") {
            echo "<script>alert('信息不能为空！重新填写');</script>" ;
        //判断用户名长度
        } elseif ((strlen($username) < 3)||(!preg_match('/^\w+$/i', $username))) {
            echo "<script>alert('用户名至少3位且不含非法字符！请重新填写');</script>" ;
        //判断密码长度
        } elseif (strlen($password) < 7) {
            echo "<script>alert('密码长度需大于6位！请重新填写');</script>" ;
        //检测两次输入密码是否相同
        } elseif ($password != $password1) {
            echo "<script>alert('两次密码不相同！请重新填写');</script>" ;
        //检测用户名是否存在
        } elseif (empty($username)) {
            echo "<script>alert('用户名已存在');</script>" ;
        } else {
            return $next($request);
        }
    }
}
