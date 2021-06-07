<html>
    <title>上传文件</title>

    <div class="container">
        <form class="form-horizontal" method="POST" action="test" enctype="multipart/form-data">
            {{ csrf_field() }}           
            用户名
            <input type="text" name="name"/><br>          
            密码 
            <input type="password" name="password"/><br>    
            <!-- <label for="file">选择文件</label>
            <input  type="file"  name="source" required>     -->
            <button type="submit" >确定</button>
        </form>
    </div>



</html>