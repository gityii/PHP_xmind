<?php

/*
mod_rewrite是一种用于给服务器发送指令的工具，当用户访问一个链接URL的时候，服务器将会提供另外的资源。mod_rewrite使用正则表达式，因此，
可以根据需要处理尽量复杂的链接地址模式
*/

/*
对APACHE行为的其他一些改动，可以用两种方式实现：
1、修改APACHE的全局配置文件，httpd.conf，放置在conf目录内，它用于规范这个Apache网站服务器的运行规则；通常应该优先考虑修改httpd.conf，因为这个文件在每次服务器启动的时候才会由WEB服务器读取。
2、允许htaccess重写，放置在Wwb目录内，用来规范当前目录和子目录内Apache如何运行，相对的每个.htaccess文件可能应用的请求发起时都会被WEB服务器读取一遍。
*/

/*
# Script 2.7 - .htaccess

#IfModule标签用于定义只有一个命名的模块被加载了，其中的规则才会被应用，在这里就是mod_rewrite模块
<IfModule mod_rewrite.c>

# Turn on the engine:用于在重写引擎没有打开时打开重写引擎
RewriteEngine on

# Set the base to this directory:用于设定重定向匹配需要应用的URL基本地址，当重定向是在一个字目录中时很有用
RewriteBase /php_adv/ch02/

# Redirect certain paths to index.php:使特定的地址URL重定向到index.php文件，这里只重定向匹配一些特定的值
RewriteRule ^(about|contact|this|that|search)/?$ index.php?p=$1

</IfModule>

*/

/*
一个.htaccess文件其实就是一个文本文件，只是命名为.htaccess，当把它放置在WEB目录内的时候，.htaccess文件内的指令将会被应用到当前目录及其子目录中。
使用.htaccess文件一个前提是需要服务器被授予权限，允许.htaccess文件对服务器行为的修改生效。这个依赖于Apache的安装和配置，这个设置如下：

<Directory />    #Directory指令用于修改特定目录下的Apache行为，在上面的代码中，目标就是根目录（/），这个地方用来指定什么位置可以被重写
AllowOverride None
</Directory>


*/


/*
RewriteRule 指令

语法: RewriteRule Pattern Substitution [flags]

1) Pattern是一个作用于当前URL的兼容perl的正则表达式. 这里的“当前”是指该规则生效时的URL的值。

2) Substitution是，当原始URL与Pattern相匹配时，用以替代(或替换)的字符串。

3) 此外，Substitution还可以追加特殊标记[flags] 作为RewriteRule指令的第三个参数。 Flags是一个包含以逗号分隔的下列标记的列表:

redirect|R [=code] (强制重定向 redirect)

以 http://thishost[:thisport]/(使新的URL成为一个URI) 为前缀的Substitution可以强制性执行一个外部重定向。 如果code没有指定，则产生一个HTTP响应代码302(临时性移动)。如果需要使用在300-400范围内的其他响应代码，只需在此指定这个数值即可， 另外，还可以使用下列符号名称之一: temp (默认的), permanent, seeother. 用它可以把规范化的URL反馈给客户端，如, 重写“/~”为 “/u/”，或对/u/user加上斜杠，等等。

注意: 在使用这个标记时，必须确保该替换字段是一个有效的URL! 否则，它会指向一个无效的位置! 并且要记住，此标记本身只是对URL加上 http://thishost[:thisport]/的前缀，重写操作仍然会继续。通常，你会希望停止重写操作而立即重定向，则还需要使用’L’标记.



URL重写例子：
RewriteEngine On
RewriteBase /
RewriteRule ^([a-zA-Z\/\_]+)$    index.php?act=$1 [QSA,L]

*/



/*
例子1：
将www.example.com/category/23 改写成 www.example.com/category.php?id=23 
RewriteRule ^category/([0-9]+)/?$    category.php?id=$1
^符号表示匹配的开始，之后是但是category，然后跟着一个斜线，然后跟着任意数量的数字，最后以一个可选的斜线结束。$符号关闭这个匹配规则，这意味着最后可选的斜线之后不能跟任何东西，
$1用于向后引用到第一个括号所包括的组

*/


