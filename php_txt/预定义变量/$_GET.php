<?php
/*
通过 URL 参数传递给当前脚本的变量的数组。 
get是发送请求HTTP协议通过url参数传递进行接收,而post是实体数据,可以通过表单提交大量信息. 
GET 是通过 urldecode() 传递的。 
*/

echo 'Hello ' . htmlspecialchars($_GET["name"]) . '!';

/*
假设用户访问的是 http://example.com/?name=Hannes 


以上例程的输出类似于：

 
Hello Hannes!
*/