@extends('base')

@section('mainbody')
    <!--      主体        -->
    <DIV class=t>
        <TABLE cellSpacing=0 cellPadding=0 width="100%">
            <TBODY>
                <TR class=tr2 align=middle>
                    <TD colSpan=2>论坛</TD>
                    <TD style="WIDTH: 5%">主题</TD>
                    <TD style="WIDTH: 25%">最后发表</TD></TR><!--       主版块       -->
    @foreach($datas as $data)

        <TR class=tr3>
            <TD colSpan=4>   {{ $data['father'] -> name }}   </TD>
                </TR><!--       子版块       -->
            
                @php
                    $i = 0;
                @endphp
                
                @foreach($data['son'] as $data1)
                
                    <TR class=tr3>
                    <TD width="5%">&nbsp;</TD>
                    <TH align=left><IMG src="images/board.gif"> 
                        <A href="/bankuai/{{ $data1 -> id }}"> {{ $data1 -> name }}</A> 
                    </TH>
                    <TD align=middle>{{ $data['count'][$i]}} </TD>

                    <TH><SPAN>
                            <A href="/list/{{ $data['falast'][$i] -> id}}/{{$data1 -> id}} ">  {{ $data['falast'][$i] -> title}} </A>
                        </SPAN><BR>
                        @if($data['relast'][$i] == null)
                            <SPAN> {{ $data['falast'][$i] -> name}}  </SPAN> 
                            <SPAN class=gray>  [ {{ $data['falast'][$i] -> updated_at}} ]   </SPAN> 
                        @else
                            @if( strtotime($data['falast'][$i] -> updated_at) > strtotime($data['relast'][$i] -> updated_at))
                                <SPAN> {{ $data['falast'][$i] -> name}}  </SPAN> 
                                <SPAN class=gray>  [ {{ $data['falast'][$i] -> updated_at}} ]   </SPAN> 
                            @else
                                <SPAN> {{ $data['relast'][$i] -> name}}  </SPAN> 
                                <SPAN class=gray>  [ {{ $data['relast'][$i] -> updated_at}} ]   </SPAN> 
                            @endif
                        @endif
                        
                   
                    </TH>   
                    </TR>
                    
                    @php
                        $i++;
                    @endphp

                @endforeach

    @endforeach

@endsection
                   
                 
               
            
                
                

               