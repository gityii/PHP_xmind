<?php
//1.在PHP中，当前脚本的名称（不包括路径和查询字符串）记录在预定义变量（1）中；而链接到当前页面的的前一页面URL记录在预定义变量（2）中
//  对于全部脚本而言，PHP提供了大量的预定义变量。这些变量将所有的外部变量表示成内建环境变量，并且将错误信息表示成返回头。

//本页地址，SCRIPT_NAME也可以:php/test.php
echo $_SERVER['PHP_SELF'].”<br />”;
//链接到当前页面的前一页面的 URL 地址:
echo $_SERVER['HTTP_REFERER'].”<br />”;
//其它的见参考手册：语言参考》变量》预定义变量
//前执行脚本的绝对路径名:D:Inetpubwwwrootphp est.php
echo $_SERVER["SCRIPT_FILENAME"].”<br />”;
//正在浏览当前页面用户的 IP 地址:127.0.0.1
echo $_SERVER["REMOTE_ADDR"].”<br />”;
//查询（query）的字符串（URL 中第一个问号 ? 之后的内容）:id=1&bi=2
echo $_SERVER["QUERY_STRING"].”<br />”;
//当前运行脚本所在的文档根目录:d:inetpubwwwroot
echo $_SERVER["DOCUMENT_ROOT"].”<br />”;
?>