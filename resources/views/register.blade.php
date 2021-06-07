@extends('base')

@section('register')

   <SCRIPT language=javascript>
      function check() {
         if(document.regForm.uName.value==""){
            alert("用户名不能为空");
            return false;
         }
         if(document.regForm.uPass.value==""){
            alert("密码不能为空");
            return false;
         }
         if(document.regForm.uPass.value != document.regForm.uPass1.value){
            alert("2次密码不一样");
            return false;
         }
      }
   </SCRIPT>

   @include('loginbase')
   
      <FORM enctype="multipart/form-data" onsubmit="return check()" 
         method=post name=regForm action="{{ url('home') }}" >

         {{ csrf_field() }} 

         <BR>用&nbsp;户&nbsp;名 &nbsp; 
         <INPUT class=input tabIndex=1 maxLength=20 size=35 name=uName tryp="text">
         <BR>密&nbsp;&nbsp;&nbsp;&nbsp;码 &nbsp; 
         <INPUT class=input tabIndex=2 maxLength=20 size=40 type=password name=uPass> 
         <BR>重复密码 &nbsp;
         <INPUT class=input tabIndex=3 maxLength=20 size=40 type=password name=uPass1>
         <BR>性别 &nbsp; 女
         <INPUT value=1 type=radio name=gender>  男
         <INPUT value=2 CHECKED type=radio name=gender> 
         <BR>请选择头像 
         <BR><IMG src="images/1.gif"><INPUT value=1.gif CHECKED type=radio name=head> 
         <IMG src="images/2.gif"><INPUT value=2.gif type=radio name=head> 
         <IMG  src="images/3.gif"><INPUT value=3.gif type=radio name=head>
         <IMG src="images/4.gif"><INPUT value=4.gif type=radio name=head> 
         <IMG src="images/5.gif"><INPUT value=5.gif type=radio name=head> <BR>
         <IMG src="images/6.gif"><INPUT value=6.gif type=radio name=head> 
         <IMG src="images/7.gif"><INPUT value=7.gif type=radio name=head>
         <IMG src="images/8.gif"><INPUT value=8.gif type=radio name=head> 
         <IMG src="images/9.gif"><INPUT value=9.gif type=radio name=head>
         <IMG src="images/10.gif"><INPUT value=10.gif type=radio name=head> <BR>
         <IMG src="images/11.gif"><INPUT value=11.gif type=radio name=head> 
         <IMG src="images/12.gif"><INPUT value=12.gif type=radio name=head> 
         <IMG src="images/13.gif"><INPUT value=13.gif type=radio name=head> 
         <IMG src="images/14.gif"><INPUT value=14.gif type=radio name=head> 
         <IMG src="images/15.gif"><INPUT value=15.gif type=radio name=head> <BR>
         <INPUT class=btn tabIndex=4 value="注 册" type=submit> 
      </FORM>
   </DIV><!--      声明        --><BR>

@endsection   
   
