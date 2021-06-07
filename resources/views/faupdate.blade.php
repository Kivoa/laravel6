@extends('base')

@section('mainbody')
    @include('teizibase')
    <DIV>
        <FORM onsubmit="return check()" method=post enctype="multipart/form-data"
            name=postForm  action= "/faupdatedb/{{ $id }}/{{ $bid }}" >
            {{ csrf_field() }} 
            <INPUT value=4 type=hidden name=boardId>
            <INPUT value=33 type=hidden name=topicId> 
        <DIV class=t>
        <TABLE cellSpacing=0 cellPadding=0 align=center>
        <TBODY><TR><TD class=h colSpan=3><B>修改帖子</B></TD></TR>
        
    @include('fareplybase')
    
    <TR class=tr3>
        <TH width="20%"><B>标题</B></TH>
        <TH>
            <INPUT style="PADDING-LEFT: 2px; FONT: 14px Tahoma" class=input tabIndex=1 size=60 name=title value={{ $content[0] -> title}}>
        </TH>
    </TR>

    <TR class=tr3>
    <TH vAlign=top><DIV><B>内容</B></DIV></TH>
    <TH colSpan=2>
        <DIV>
            <SPAN>
                <TEXTAREA style="WIDTH: 500px" tabIndex=2 rows=20 cols=90 name=content>{{ $content[0] -> content}}</TEXTAREA>
            </SPAN> 
        </DIV>(不能大于:<FONT color=blue>1000</FONT>字) 
    </TH>
    </TR></TBODY></TABLE></DIV>
    <DIV style="TEXT-ALIGN: center; MARGIN: 15px 0px"><INPUT class=btn tabIndex=3 value="提 交" type=submit> 
    <INPUT class=btn tabIndex=4 value="重 置" type=reset> </DIV></FORM></DIV></DIV><!--      声明        --><BR>

@endsection