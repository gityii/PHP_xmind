<?php
/*
正则表达式是用于描述字符排列模式的一种语法规则。正则表达式也叫做模式表达式。
网站开发中正则表达式最常用于表单提交信息前的客户端验证。
比如验证用户名是否输入正确，密码输入是否符合要求，email、手机号码等信息的输入是否合法。
在php中正则表达式主要用于字符串的分割、匹配、查找和替换操作。

试举正则表达式对字符串最常用的3种操作:
1. 利用正则表达式，实现对一个字符串的切割，切割后返回一个数组。如split()。
2. 利用正则可以实现对一个字符串中符合的内容批量替换。如果替换为空则达到了过滤的作用。如preg_replace()。
3. 利用正则判断一个字符串中是否含有符合的子字符串。如preg_match()。
*/

/*
正则表达式表示：

变量的正则表达式表述为：[a - zA - Z_\x7f - \xff][a - zA - Z0 - 9_\x7f - \xff]*

函数的正则表达式表示为：[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*。 
*/

/*
preg系列函数可以处理。具体有以下几个：
		
string preg_quote ( string str [, string delimiter] )
	转义正则表达式字符 正则表达式的特殊字符包括：. \\ + * ? [ ^ ] $ ( ) { } = ! < > | :。
preg_replace -- 执行正则表达式的搜索和替换
mixed preg_replace ( mixed pattern, mixed replacement, mixed subject [, int limit] )
preg_replace_callback -- 用回调函数执行正则表达式的搜索和替换
mixed preg_replace_callback ( mixed pattern, callback callback, mixed subject [, int limit] )
preg_split -- 用正则表达式分割字符串
array preg_split ( string pattern, string subject [, int limit [, int flags]] )


*/


/*
给你一行文字 $string，你会如何编写一个正规表达式，把 $string 内的 HTML 标签除去:
首先，PHP 有内建函式 strip_tags() 除去 HTML 标签，为何要自行编写正规表达式？好了，便当作是面试的一道考题吧，我会这样回答：
$stringOfText = "<p>This is a test</p>";$expression = "/<(.*?)>(.*?)<\/(.*?)>/";echo preg_replace($expression, "[url=file://2/]\\2[/url]", $stringOfText);// 有人说也可以使用 /(<[^>]*>)/ $expression = "/(<[^>]*>)/";echo preg_replace($expression, "", $stringOfText);

*/


/*

过虑网页上的所有JSVBS脚本，即把script标记及其内容都去掉:

$script=”以下内容不显示：<script language=’javascript’>alert(‘cc’);</script>”;
echo preg_replace(“/<script[^>].*?>.*?</script>/si”, “替换内容”, $script);

(即把scrīpt标记及其内容都去掉):
preg_replace(" /<script[^>].*?>.*?</script>/si", "newinfo", $script);
*/


/*
验证电子邮件的格式是否正确:

function checkEmail($email)
  {
    $pregEmail = "/([a-z0-9]*[-_\.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[\.][a-z]{2,3}([\.][a-z]{2})?/i";
    return preg_match($pregEmail,$email);  
  }

-------------------------------------------------------------------------------------------

//if the email address is valid, return true,else return false
function validateEmail($email)
{
    if(eregi('^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*$',$email) ){
        return true;
    }else{
        return false;
    }
}
*/


