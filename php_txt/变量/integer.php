<?php
/*整型值可以使用十进制，十六进制，八进制或二进制表示，前面可以加上可选的符号（- 或者 +）*/
/*要使用八进制表达，数字前必须加上 0（零）。要使用十六进制表达，数字前必须加上 0x。要使用二进制表达，数字前必须加上 0b*/
/*
integer 语法的结构形式是： 
decimal     : [1-9][0-9]*
            | 0

hexadecimal : 0[xX][0-9a-fA-F]+

octal       : 0[0-7]+

binary      : 0b[01]+

integer     : [+-]?decimal
            | [+-]?hexadecimal
            | [+-]?octal
            | [+-]?binary
*/

/*Integer 值的字长可以用常量 PHP_INT_SIZE来表示，自 PHP 4.4.0 和 PHP 5.0.5后，最大值可以用常量 PHP_INT_MAX 来表示*/

$a = 1234; // 十进制数
$b = -123; // 负数
$c = 0123; // 八进制数 (等于十进制 83)
$d = 0x1A; // 十六进制数 (等于十进制 26)	


echo PHP_INT_MAX."<br/>";
echo PHP_INT_SIZE."<br/>";

/*如果给定的一个数超出了 integer 的范围，将会被解释为 float。同样如果执行的运算结果超出了 integer 范围，也会返回 float*/

/*
PHP中没有整除的运算符。1/2产生出float0.5。值可以舍弃小数部分强制转换为integer，或者使用round()函数可以更好地进行四舍五入
*/

echo var_dump(25/7)."<br/>";         // float(3.5714285714286) 
echo var_dump((int) (25/7))."<br/>"; // int(3)
echo var_dump(round(25/7))."<br/>";  // float(4) 






?>