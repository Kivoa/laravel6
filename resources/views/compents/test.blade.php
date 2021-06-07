<html>
   
    {{--     你好, {{ $name }}。<br>  有{{}}时注释的方法      --}}

    Hello, {!! $name !!}。<br>

    Hello, @{{ name }}。<br>

    Hello, {{{ $name }}}。<br>
    
    @isset($name)
        存在<br>
    @endisset

    @empty($name)
        不存在
    @endempty

    @switch($name)
    @case(1)
        First case...
        @break

    @case(2)
        Second case...
        @break

    @default
        Default case... <br>
    @endswitch

    @php
        echo 'Kitty'.'<br>';
    @endphp





    
</html>