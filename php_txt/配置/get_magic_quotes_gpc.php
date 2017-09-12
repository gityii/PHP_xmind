<?php

/*
魔术引号
get_magic_quotes_gpc — 获取当前 magic_quotes_gpc 的配置选项设置


bool get_magic_quotes_gpc ( void )

返回值
如果 magic_quotes_gpc 为关闭时返回 0，否则返回 1。在 PHP 5.4.O 起将始终返回 FALSE。 


*/


/*
get_magic_quotes_gpc 取得 PHP 环境变量 magic_quotes_gpc 的值。 
语法: long get_magic_quotes_gpc(void); 返回值: 长整数
函数种类: PHP 系统功能 
内容说明 本函数取得 PHP 环境配置的变量 magic_quotes_gpc (GPC, Get/Post/Cookie) 值。返回 0 表示关闭本功能；返回 1 表示本功能打开。
当 magic_quotes_gpc 打开时，所有的 ' (单引号), " (双引号), \ (反斜线) and 空字符会自动转为含有反斜线的溢出字符。
*/


/*
magic_quotes_gpc函数在php中的作用是判断解析用户提示的数据，如包括有:post、get、cookie过来的数据增加转义字符“\”，以确保这些数据不会引起程序，特别是数据库语句因为特殊字符引起的污染而出现致命的错误

在magic_quotes_gpc=On的情况下，如果输入的数据有单引号（’）、双引号（”）、反斜线（）与 NUL（NULL 字符）等字符都会被加上反斜线。这些转义是必须的，如果这个选项为off，那么我们就必须调用addslashes这个函数来为字符串增加转义。

代码如下:
当magic_quotes_gpc=On的时候，函数get_magic_quotes_gpc()就会返回1
当magic_quotes_gpc=Off的时候，函数get_magic_quotes_gpc()就会返回0

因此可以看出这个get_magic_quotes_gpc()函数的作用就是得到环境变量magic_quotes_gpc的值。




php 判断是否开启get_magic_quotes_gpc功能了，以方便我们是否决定使用addslashes这个函数：

function SQLString($c, $t){

 $c=(!get_magic_quotes_gpc())?addslashes($c):$c;

 switch($t){

  case 'text':

   $c=($c!='')?"'".$c."'":'NULL';

   break;

  case 'search':

   $c="'%%".$c."%%'";

   break;

  case 'int':

   $c=($c!='')?intval($c):'0';

   break;

 }

 return $c;

}




预防数据库攻击的正确做法：

function check_input($value)
{
// 去除斜杠
if (get_magic_quotes_gpc())
{
$value = stripslashes($value);
}
// 如果不是数字则加引号
if (!is_numeric($value))
{
$value = “‘” . mysql_real_escape_string($value) . “‘”;
}
return $value;
}
$con = mysql_connect(“localhost”, “hello”, “321″);
if (!$con)
{
die(‘Could not connect: ‘ . mysql_error());
}
// 进行安全的 SQL
$user = check_input($_POST['user']);
$pwd = check_input($_POST['pwd']);
$sql = “SELECT * FROM users WHERE
user=$user AND password=$pwd”;
mysql_query($sql);
mysql_close($con);
?>


*/

/*
php中get_magic_quotes_gpc的配置防sql注入用法
get_magic_quotes_gpc();就是取得php环境变量magic_quotes_gpc的值。如果值为1时，表示开启；如果为0时，表示该配置关闭！
get_magic_quotes_gpc()；值为1，表示开启。那么 php会自动为POST、GET、COOKIE传过来的参数值自动增加转义字符“\”，来确保这些数据的安全性。尤其是防止SQL注入。
get_magic_quotes_gpc()；值为0，表示关闭。php解析器不会自动为POST、GET、COOKIE传过来的参数值加转义字符“\”，那么这时就用addslashes函数来转义参数了。


get_magic_quotes_gpc()；未开启，用addslashes函数过滤参数防止注入示例：
<?php

$str=$_POST['str'];

if(!get_magic_quotes_gpc()){//首先判断未开启

$newStr=addslashes($str);//然后用addslashes函数过滤

}

?>

*/



