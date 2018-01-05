<html>
<head>
    <title>无限级联</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="zh-CN" />
    <script src="/static/assets/js/vendor/jquery.min.js"></script>
</head>

<style>
    .selection{
        display: block;
    }
</style>

<body>
<div id="jilianContainer"></div>
<script type="text/javascript">
    $(document).ready(function(){
        var getData = function(obj){

            $.ajax({
                url:'/record/record/groupaddtest',
                type:'POST',
                data:{"grade":obj.val()},
                //dataType:'json',
                //async:false,
                success:function(data){
                    console.log($(obj).index())
                    if($("#fulei").length){
                        $(".zilei").remove();    //移除后面所有子级下拉菜单
                        $("#fulei:last").after(data);                    //添加子级下拉菜单
                    }else {
                        $("#jilianContainer").append(data);                    //初始加载情况
                    }
                    //所有下拉响应
                    $("#fulei").unbind().change(function(){
                        getData($(this));
                    });
                },
                error:function(msg){
                    console.log(msg);
//                    alert('error');
                }
            });
        }
        //Init
        getData($(this));
    });
</script>


</body>
</html>


