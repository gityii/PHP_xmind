<?php
/*
1、int strcasecmp ( string $str1 , string $str2 )
二进制安全比较字符串（不区分大小写）。 
返回值： 如果 str1 小于 str2 返回 < 0； 如果 str1 大于 str2 返回 > 0；如果两者相等，返回 0。 
*/

/*
在下面的程序中通过比较后的返回值判断两个比较字符串大小。使用strcmp()函数区分字符串中字母大小写的比较，使用strcasecmp()函数忽略字符串中字母大小写的比较。当然没有实际意义。代码如下所示：
*/
$username = "Admin";
$password = "lampBrother";
 
//不区分大小写的比较，如果两个字符串相等返回0
if(strcasecmp($userName,"admin")== 0){
echo "用户名存在";
}
//将两个比较的字符串相应的函数转成全大写或全小写后，也可以实现不区分大小写的比较
if(strcasecmp(strtolower($userName),strtolower("admin")) == 0){
echo "用户名存在";
}
 
//区分字符串中字母的大小写比较
switch(strcmp($password,"lampbrother")){
case 0:
echo "两个字符串相等<br>"; break;
case 1:
echo "第一个字符串大于第二个字符串<br>"; break;
case -1:
echo "第一个字符串小于第二个字符串<br>"; break;
}

/*
2、int strcmp ( string $str1 , string $str2 )
注意该比较区分大小写。 
返回值 ：如果 str1 小于 str2 返回 < 0； 如果 str1 大于 str2 返回 > 0；如果两者相等，返回 0。 

*/
