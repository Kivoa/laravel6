<html>
    @foreach($stu as $key=>$val)
        {{$val->id}} {{$val->name}}<br>
    @endforeach

    @if ($store > 90)
        优秀
    @else
        良好
    @endif




</html>