<?php

/*
mod_rewrite是一种用于给服务器发送指令的工具，当用户访问一个链接URL的时候，服务器将会提供另外的资源。mod_rewrite使用正则表达式，因此，
可以根据需要处理尽量复杂的链接地址模式
*/

/*
对APACHE行为的其他一些改动，可以用两种方式实现：
1、修改APACHE的全局配置文件，httpd.conf
2、允许htaccess重写
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