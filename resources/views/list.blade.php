@extends('base')

@section('mainbody')
    @include('teizibase')
    
    <DIV>
        <A href="/reply/{{ $id }}/{{ $bid }}">
            <IMG border=0 src="{{ URL::asset('images/reply.gif') }}">
        </A> 
        <A href="/fatie/{{ $bid }}">
            <IMG border=0 src="{{ URL::asset('images/post.gif') }}">
        </A> 
    </DIV>
    
    {{ $replyuser ->links() }}

    <DIV><TABLE cellSpacing=0 cellPadding=0 width="100%">
        <TBODY>
            <TR>
                <TH class=h>本页主题:   {{$teiZiName}}  </TH></TR>
            <TR class=tr2>
                <TD>&nbsp;</TD></TR></TBODY></TABLE></DIV><!--      主题        -->

    {{-- 显示发帖信息 --}}  
    @foreach($user as $fa)  
        <DIV class=t>
            <TABLE style="BORDER-TOP-WIDTH: 0px; TABLE-LAYOUT: fixed" cellSpacing=0 cellPadding=0 width="100%">
            <TBODY> <TR class=tr1>
                <TH style="WIDTH: 20%"><B>  {{ $fa -> name }}  </B><BR>
                <IMG  src="{{ URL::asset('images/'.$fa->face) }}"><BR>注册: {{ $fa -> register_time  }} <BR></TH>
                <TH><H4>{{ $fa -> title  }} </H4>
                <DIV><PRE>   {{ $fa -> content }}   </PRE></DIV>
                <DIV class="tipad gray">发表：[ {{ $fa -> created_at  }} ] &nbsp; 
                    最后修改:[ {{ $fa -> updated_at  }} ]

                    {{-- 如果是当前用户，设置有修改，删除的权限 --}}
                    @if(($fa -> userId) == session('user.id'))
                        <A href='/faupdate/{{ $id }}/{{ $bid }} '> [修改] </A>    
                        <form style="margin:0px;display:inline;" id="delReply" action="/fadeldb/{{ $id }}/{{ $bid }}" method="post">
                            @csrf
                            @method('delete')
                            <button style= 'border: none; background: none; outline: none; font-size: 10px;' 
                                type="button" onclick='delReply()'><a>[删除]</a>
                            </button>
                        </form>
                    @endif 

                </DIV></TH> </TR></TBODY></TABLE>
        </DIV><!--      回复        -->
    @endforeach 
 
    {{-- 如果有回复，显示回复信息 --}}    
    @if($count>0)
        @foreach($replyuser as $data)           
            <DIV class=t>
                <TABLE style="BORDER-TOP-WIDTH: 0px; TABLE-LAYOUT: fixed" cellSpacing=0 cellPadding=0 width="100%">
                <TBODY>
                <TR class=tr1>
                    <TH style="WIDTH: 20%"><B>  {{ $data -> name }}  </B><BR>
                    <IMG  src="{{ URL::asset('images/'.$data->face) }}"><BR>注册: {{ $data -> register_time  }} <BR></TH>
                    <TH>
                        <H4> reply: </H4>
                    <DIV><PRE>   {{ $data -> content }}   </PRE></DIV>
                    <DIV class="tipad gray">发表：[ {{ $data -> created_at  }} ] &nbsp; 
                        最后修改:[ {{ $data -> updated_at  }} ]
                    @if(($data -> reuserId) == session('user.id'))
                        <A href='/reupdate/{{ $data -> id }}/{{ $bid }} '> [修改] </A>
                        <form style="margin:0px;display:inline;" method="post">  
                            @csrf
                            @method('delete')
                            <button style= 'border: none; background: none; outline: none; font-size: 10px;' 
                                type="button" id="delReplyBtn" onclick='delReply1({{ $data -> id }},{{ $bid }})'><a>[删除]</a>
                            </button>
                        </form>
                    @endif 
            </DIV></TH></TR></TBODY></TABLE></DIV>
          
        @endforeach   
    @endif        
@endsection

@section('footpage') 
    {{ $replyuser ->links() }}
     
    <script> 
        // 删除回复帖子     
        function delReply1(id,bid) {           
            if (confirm('确定要删除吗？')) {
                // 设置删除帖子ID与板块ID
                let delReplyObj1 = document.getElementById('delReplyBtn');
                delReplyObj1.parentElement.action='/redeldb/'+id+'/'+bid;
                delReplyObj1.parentElement.submit();
            }
        }    

        // 删除发帖信息
        function delReply() {
            if (confirm('确定要删除吗？')) {
                let delReplyObj = document.getElementById('delReply');
                delReplyObj.submit();
            }
        }        
    </script>
@endsection
