<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML><HEAD><TITLE>欢迎访问斑马学员论坛</TITLE>
    <META content="text/html; charset=utf-8" http-equiv=Content-Type>
    <LINK rel=stylesheet type=text/css href="{{ URL::asset('css/style.css') }}">
    <META name=GENERATOR content="MSHTML 8.00.6001.18783"></HEAD>
    <BODY>
        <DIV><IMG src="{{ URL::asset('images/logo.png') }}" width="123px;" height="45px;"> </DIV>
        <!--      用户信息、登录、注册        -->

        @if(!empty(session('user.name')))
            <DIV class=h>您好:&nbsp;&nbsp;&nbsp; {{ session('user.name') }}&nbsp; | &nbsp;<A 
                href="{{ url('layout') }}">登出</A>  </DIV>            
            <DIV>          
        @else
            <DIV class=h>您尚未&nbsp;&nbsp; <A href="{{ url('login') }}">登录</A> &nbsp;| &nbsp; 
                <A href="{{ url('register') }}">注册</A>  </DIV>
            <DIV>
        @endif
        
            
    @yield('register')
    @yield('login')
    @yield('mainbody')

    </TBODY></TABLE></DIV></DIV>
        @yield('footpage')
    <BR>
    <CENTER class=gray>2021 Tokyo Banma education Co.Ltd 版权所有</CENTER>
    </BODY>
</HTML>
