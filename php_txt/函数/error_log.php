<?php

/*

error_log — 发送错误信息到某个地方
bool error_log ( string $message [, int $message_type = 0 [, string $destination [, string $extra_headers ]]] )
把错误信息发送到 web 服务器的错误日志，或者到一个文件里。 
message：应该被记录的错误信息。 
message_type： 设置错误应该发送到何处。可能的信息类型有以下几个： 
error_log() 日志类型：
0 message 发送到 PHP 的系统日志，使用 操作系统的日志机制或者一个文件，取决于 error_log 指令设置了什么。 这是个默认的选项。  
1 message 发送到参数 destination 设置的邮件地址。 第四个参数 extra_headers 只有在这个类型里才会被用到。  
2 不再是一个选项。  
3 message 被发送到位置为 destination 的文件里。 字符 message 不会默认被当做新的一行。  
4 message 直接发送到 SAPI 的日志处理程序中。  

*/