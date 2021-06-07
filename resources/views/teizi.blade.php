@extends('base')

@section('mainbody')
    @include('teizibase')
    
    <DIV>
        <A href="/fatie/{{ $id }}">
            <IMG border=0 src="{{ URL::asset('images/post.gif') }}">
        </A> 
    </DIV><!--         翻 页         -->

    {{ $teiZiName ->links() }}
   
    <DIV class=t>
        <TABLE cellSpacing=0 cellPadding=0 width="100%">
        <TBODY>
        <TR>
            <TH style="WIDTH: 100%" class=h colSpan=4><SPAN>&nbsp;</SPAN></TH>
        </TR><!--       表 头           -->
        <TR class=tr2>
            <TD>&nbsp;</TD>
            <TD style="WIDTH: 80%" align=middle>文章</TD>
            <TD style="WIDTH: 10%" align=middle>作者</TD>
            <TD style="WIDTH: 10%" align=middle>回复</TD></TR><!--         主 题 列 表        -->
        @php
            $i = 0;
        @endphp
        @foreach($teiZiName as $data)
            <TR class=tr3>
                <TD><IMG border=0 src="{{ URL::asset('images/topic.gif') }}"></TD>
                <TD style="FONT-SIZE: 15px">
                    <A href="/list/{{ $data -> id }}/{{ $id }}"> {{ $data -> title }} </A>
                </TD>
                <TD align=middle>  {{ $data -> name }}  </TD>
                <TD align=middle> {{ $count[$i]}} </TD></TR>
            @php
                $i++;
            @endphp
        @endforeach     
@endsection

@section('footpage')
    {{ $teiZiName ->links() }}
@endsection