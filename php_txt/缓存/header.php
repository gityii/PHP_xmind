<?php


/*
header — 发送原生 HTTP 头
void header ( string $string [, bool $replace = true [, int $http_response_code ]] )
header() 用于发送原生的 HTTP 头。

参数 
string ：头字符串。 
      有两种特别的头。第一种以"HTTP/"开头的 (case is not significant)，将会被用来计算出将要发送的HTTP状态码。 例如在 Apache 服务器上用 PHP 脚本来处理不存在文件的请求（使用 ErrorDocument 指令）， 就会希望脚本响应了正确的状态码。 
      <?php
      header("HTTP/1.0 404 Not Found");
      ?>  
      
      第二种特殊情况是"Location:"的头信息。它不仅把报文发送给浏览器，而且还将返回给浏览器一个 REDIRECT（302）的状态码，除非状态码已经事先被设置为了201或者3xx。 
      <?php
      header("Location: http://www.example.com/"); //Redirect browser 
      //Make sure that code below does not get executed when we redirect.
      exit;
*/
	  

/*
利用PHP的header函数可以调整缓存—————包括web浏览器的缓存和代理服务器的缓存
这里设计4种标头的类型：
Last-Modified(最后修改时间)，使用UTC时间，如果缓存系统发现Last-Modified的值比页面缓存版本的时间更接近当前时间，它就知道应该使用来自服务器的更新页面版本
Expires(过期时间)，用来表明缓存的版本应该过期而不能使用，设置Expires为一个以前的时间，就会强制使用服务器上的页面。
Pragma(编译提示)，声明了页面数据应该被如何处理，这样来避免对页面进行缓存：header("Pragma: no-cache");
cache-Control，是在HTTP1.1标准中新增的，能够实现更细致的控制：header("Cache-Control: no-cache");

*/	  
