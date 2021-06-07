@extends('base')

@section('mainbody')
    @include('teizibase')
    <DIV>
        <FORM onsubmit="return check()" method=post enctype="multipart/form-data"
            name=postForm  action= "/fatiedb/{{ $id }}" >
            {{ csrf_field() }} 
            <INPUT value=4 type=hidden name=boardId>
            <INPUT value=33 type=hidden name=topicId> 
        <DIV class=t>
        <TABLE cellSpacing=0 cellPadding=0 align=center>
        <TBODY><TR><TD class=h colSpan=3><B>发表帖子</B></TD></TR>
        
    @include('fareplybase')
    
    <TR class=tr3>
        <TH width="20%"><B>标题</B></TH>
        <TH>
            <INPUT style="PADDING-LEFT: 2px; FONT: 14px Tahoma" class=input tabIndex=1 size=60 name=title>
        </TH>
    </TR>

    @include('fatiebase') 

@endsection