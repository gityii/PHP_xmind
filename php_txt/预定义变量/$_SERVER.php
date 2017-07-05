<?php
/*
$_SERVER 是一个包含了诸如头信息(header)、路径(path)、以及脚本位置(scriptlocations)等等信息的数组。这个数组中的项目由 Web 服务器创建。不能保证每个服务器都提供全部项目；服务器可能会忽略一些，或者提供一些没有在这里列举出来的项目。这也就意味着大量的此类变量都会在? CGI 1.1 规范中说明

$_SERVER 是一个包含了诸如头信息(header)、路径(path)、以及脚本位置(script locations)等等信息的数组。
在 $_SERVER 中，你也许能够，也许不能够找到下面的这些元素。
$_SERVER 变量由 web 服务器设定或者直接与当前脚本的执行环境相关联。


'PHP_SELF'
当前执行脚本的文件名，与 document root 有关。例如，在地址为 http://example.com/test.php/foo.bar 的脚本中使用 $_SERVER['PHP_SELF'] 将得到 /test.php/foo.bar。__FILE__ 常量包含当前(例如包含)文件的完整路径和文件名。

'GATEWAY_INTERFACE'
服务器使用的 CGI 规范的版本；例如，"CGI/1.1"。  

'SERVER_ADDR'
当前运行脚本所在的服务器的 IP 地址。  

'SERVER_NAME'
当前运行脚本所在的服务器的主机名。如果脚本运行于虚拟主机中，该名称是由那个虚拟主机所设置的值决定。

'SERVER_SOFTWARE'
服务器标识字符串，在响应请求时的头信息中给出。

'SERVER_PROTOCOL'
请求页面时通信协议的名称和版本。例如，"HTTP/1.0"。
 
'REQUEST_METHOD'
访问页面使用的请求方法；例如，"GET", "HEAD"，"POST"，"PUT"。 如果请求方法为 HEAD，PHP 脚本将在发送 Header 头信息之后终止(这意味着在产生任何输出后，不再有输出缓冲)。

'REQUEST_TIME'
请求开始时的时间戳。从 PHP 5.1.0 起可用。 

'REQUEST_TIME_FLOAT'
请求开始时的时间戳，微秒级别的精准度。 自 PHP 5.4.0 开始生效。  

'QUERY_STRING'
query string（查询字符串），如果有的话，通过它进行页面访问。

'DOCUMENT_ROOT'
当前运行脚本所在的文档根目录。在服务器配置文件中定义。 

'HTTP_ACCEPT'
当前请求头中 Accept: 项的内容，如果存在的话。

'HTTP_ACCEPT_CHARSET'
当前请求头中 Accept-Charset: 项的内容，如果存在的话。例如："iso-8859-1,*,utf-8"。

'HTTP_ACCEPT_ENCODING'
当前请求头中 Accept-Encoding: 项的内容，如果存在的话。例如："gzip"。  

'HTTP_ACCEPT_LANGUAGE'
当前请求头中 Accept-Language: 项的内容，如果存在的话。例如："en"。  

'HTTP_CONNECTION'
当前请求头中 Connection: 项的内容，如果存在的话。例如："Keep-Alive"。  

'HTTP_HOST'
当前请求头中 Host: 项的内容，如果存在的话。 
 
'HTTP_REFERER'
引导用户代理到当前页的前一页的地址（如果存在）。由useragent设置决定。并不是所有的用户代理都会设置该项，有的还提供了修改 HTTP_REFERER 的功能。简言之，该值并不可信。  

'HTTP_USER_AGENT'
当前请求头中User-Agent:项的内容，如果存在的话。该字符串表明了访问该页面的用户代理的信息。一个典型的例子是：Mozilla/4.5[en](X11;U;Linux2.2.9i586)。除此之外，你可以通过get_browser()来使用该值，从而定制页面输出以便适应用户代理的性能。 

'HTTPS'
如果脚本是通过 HTTPS 协议被访问，则被设为一个非空的值。  
Note: 注意当使用 IIS 上的 ISAPI 方式时，如果不是通过 HTTPS 协议被访问，这个值将为 off。  

'REMOTE_ADDR'
浏览当前页面的用户的 IP 地址。  

'REMOTE_HOST'
浏览当前页面的用户的主机名。DNS 反向解析不依赖于用户的 REMOTE_ADDR。  
Note: 你的服务器必须被配置以便产生这个变量。例如在 Apache 中，你需要在 httpd.conf 中设置 HostnameLookups On 来产生它。参见 gethostbyaddr()。 
 
'REMOTE_PORT'
用户机器上连接到 Web 服务器所使用的端口号。 

'REMOTE_USER'
经验证的用户  

'REDIRECT_REMOTE_USER'
验证的用户，如果请求已在内部重定向。 

'SCRIPT_FILENAME'
当前执行脚本的绝对路径。 

Note: 如果在命令行界面（Command Line Interface, CLI）使用相对路径执行脚本，例如 file.php 或 ../file.php，那么 $_SERVER['SCRIPT_FILENAME'] 将包含用户指定的相对路径。 

'SERVER_ADMIN'
该值指明了 Apache 服务器配置文件中的 SERVER_ADMIN参数。如果脚本运行在一个虚拟主机上，则该值是那个虚拟主机的值。

'SERVER_PORT'
 Web 服务器使用的端口。默认值为 "80"。如果使用 SSL 安全连接，则这个值为用户设置的 HTTP 端口。

'SERVER_SIGNATURE'
包含了服务器版本和虚拟主机名的字符串。 

'PATH_TRANSLATED'
当前脚本所在文件系统（非文档根目录）的基本路径。这是在服务器进行虚拟到真实路径的映像后的结果。  
Note: 自 PHP 4.3.2 起，PATH_TRANSLATED 在 Apache 2 SAPI 模式下不再和 Apache 1 一样隐含赋值，而是若 Apache 不生成此值，PHP 便自己生成并将其值放入 SCRIPT_FILENAME 服务器常量中。这个修改遵守了 CGI 规范，PATH_TRANSLATED 仅在 PATH_INFO 被定义的条件下才存在。  Apache 2 用户可以在 httpd.conf 中设置 AcceptPathInfo = On 来定义 PATH_INFO。
  
'SCRIPT_NAME'
包含当前脚本的路径。这在页面需要指向自己时非常有用。__FILE__ 常量包含当前脚本(例如包含文件)的完整路径和文件名。 

'REQUEST_URI' 
URI 用来指定要访问的页面。例如 "/index.html"。  
 
'PHP_AUTH_DIGEST'
当作为 Apache 模块运行时，进行 HTTP Digest 认证的过程中，此变量被设置成客户端发送的"Authorization" HTTP 头内容（以便作进一步的认证操作）。 
 
'PHP_AUTH_USER'
当 PHP 运行在 Apache 或 IIS（PHP5是ISAPI）模块方式下，并且正在使用HTTP认证功能，这个变量便是用户输入的用户名。

'PHP_AUTH_PW'
当 PHP 运行在 Apache 或 IIS（PHP 5 是 ISAPI）模块方式下，并且正在使用 HTTP认证功能，这个变量便是用户输入的密码。
 
'AUTH_TYPE'
当 PHP 运行在 Apache 模块方式下，并且正在使用 HTTP 认证功能，这个变量便是认证的类型。
 
'PATH_INFO' 包含由客户端提供的、跟在真实脚本名称之后并且在查询语句（querystring）之前的路径信息，如果存在的话。例如，如果当前脚本是通过 URL http://www.example.com/php/path_info.php/some/stuff?foo=bar 被访问，那么 $_SERVER['PATH_INFO'] 将包含 /some/stuff。  'ORIG_PATH_INFO'在被 PHP 处理之前，"PATH_INFO" 的原始版本。

*/

//例子：
<?php
//本页地址，SCRIPT_NAME也可以:php/test.php
echo $_SERVER['PHP_SELF']."<br />";

//链接到当前页面的前一页面的 URL 地址:
echo $_SERVER['HTTP_REFERER']."<br />";

//其它的见参考手册：语言参考》变量》预定义变量
//前执行脚本的绝对路径名:D:Inetpubwwwrootphp est.php 
echo $_SERVER["SCRIPT_FILENAME"]."<br />";

//正在浏览当前页面用户的 IP 地址:127.0.0.1
echo $_SERVER["REMOTE_ADDR"]."<br />";

//查询（query）的字符串（URL 中第一个问号 ? 之后的内容）:id=1&bi=2
echo $_SERVER["QUERY_STRING"]."<br />";

//当前运行脚本所在的文档根目录:d:inetpubwwwroot
echo $_SERVER["DOCUMENT_ROOT"]."<br />";


 
/*检查用户的 agent 字符串，它是浏览器发送的 HTTP 请求的一部分*/
/*$_SERVER 是一个特殊的 PHP 保留变量，它包含了 web 服务器提供的所有信息，被称为超全局变量*/

echo $_SERVER['HTTP_USER_AGENT']; 

/*如何用php的环境变量得到一个网页地址的内容？ip地址又要怎样得到*/

echo $_SERVER ['PHP_SELF'];
echo $_SERVER ['SERVER_ADDR'];


