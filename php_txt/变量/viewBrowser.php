<?php

/*检查用户的 agent 字符串，它是浏览器发送的 HTTP 请求的一部分*/
/*$_SERVER 是一个特殊的 PHP 保留变量，它包含了 web 服务器提供的所有信息，被称为超全局变量*/

   echo $_SERVER['HTTP_USER_AGENT']; 



?>