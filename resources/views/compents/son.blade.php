<html>
    @extends('father')

    @section('sidebar')
        <!-- @parent   继承父 -->
        @parent                  
        <p>Laravel学院致力于提供优质Laravel中文学习资源</p>
    @endsection

    @section('mainbody')
        我是内容
    @endsection
</html>