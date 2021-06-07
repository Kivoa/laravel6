@extends('base')

@section('login')
    <SCRIPT language=javascript>
        function check() {
            if(document.loginForm.uName.value==""){
                alert("用户名不能为空");
                return false;
            }
            if(document.loginForm.uPass.value==""){
                alert("密码不能为空");
                return false;
            }
        }
    </SCRIPT>

    @include('loginbase')

    <FORM onsubmit="return check()" method=post name=loginForm action="{{ url('back') }}" enctype="multipart/form-data" >
        {{ csrf_field() }}  
        <BR>用户名 &nbsp;
        <INPUT class=input tabIndex=1 maxLength=20 size=35 type=text name=uName> 
        <BR>密　码 &nbsp;
        <INPUT class=input tabIndex=2 maxLength=20 size=40 type=password name=uPass>
        <BR>
        <INPUT class=btn tabIndex=6 value="登 录" type=submit> 
    </FORM></DIV><!--      声明        --><BR>

@endsection

