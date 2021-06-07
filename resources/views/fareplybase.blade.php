<SCRIPT type=text/javascript>
        function check(){
            if(document.postForm.title.value=="") {
                alert("标题不能为空");
                return false;
            }
            if(/\s+/g.test(document.postForm.title.value)) {
                alert("标题不能包含空格");
                return false;
            }
            if(document.postForm.content.value=="") {
                alert("内容不能为空");
                return false;
            }
            if(/\s+/g.test(document.postForm.content.value)) {
                alert("内容不能包含空格");
                return false;
            }
            if(document.postForm.content.value.length>1000) {
                alert("长度不能大于1000");
                return false;
            }
        }
</SCRIPT>


    
    