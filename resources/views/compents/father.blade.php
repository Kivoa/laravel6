<html>
    <h1>我是头部</h1>
    @section('sidebar')
            这里是侧边栏
    @show

    @yield('mainbody')
    
    <h1>我是尾部</h1>
</html>