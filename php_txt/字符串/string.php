	<?php
/*一个字符串 string 就是由一系列的字符组成，其中每个字符等同于一个字节。这意味着 PHP 只能支持 256 的字符集，因此不支持 Unicode */
/*string 最大可以达到 2GB*/

/*
一个字符串可以用 4 种方式表达： 
单引号  
双引号  
heredoc 语法结构  
nowdoc 语法结构（自 PHP 5.3.0 起） 

要表达一个单引号自身，需在它的前面加个反斜线（\）来转义。要表达一个反斜线自身，则用两个反斜线（\\）。

其它任何方式的反斜线都会被当成反斜线本身：也就是说如果想使用其它转义序列例如 \r 或者 \n，并不代表任何特殊含义，就单纯是这两个字符本身。
*/

/*不像双引号和 heredoc 语法结构，在单引号字符串中的变量和特殊字符的转义序列将不会被替换。 */

/*如果字符串是包围在双引号（"）中， PHP 将对一些特殊的字符进行解析*/

/*
                   转义字符
\n                 换行（ASCII 字符集中的 LF 或 0x0A (10)） 
\r                 回车（ASCII 字符集中的 CR 或 0x0D (13)） 
\t                 水平制表符（ASCII 字符集中的 HT 或 0x09 (9)） 
\v                 垂直制表符（ASCII 字符集中的 VT 或 0x0B (11)）（自 PHP 5.2.5 起） 
\e                 Escape（ASCII 字符集中的 ESC 或 0x1B (27)）（自 PHP 5.4.0 起） 
\f                 换页（ASCII 字符集中的 FF 或 0x0C (12)）（自 PHP 5.2.5 起） 
\\                 反斜线 
\$                 美元标记 
\"                 双引号 
\[0-7]{1,3}        符合该正则表达式序列的是一个以八进制方式来表达的字符  
\x[0-9A-Fa-f]{1,2} 符合该正则表达式序列的是一个以十六进制方式来表达的字符  

*/

echo 'this is a simple string'."<br/>";

// 可以录入多行
echo 'You can also have embedded newlines in 
strings this way as it is
okay to do'."<br/>";

// 输出： Arnold once said: "I'll be back"
echo 'Arnold once said: "I\'ll be back"'."<br/>";

// 输出： You deleted C:\*.*?
echo 'You deleted C:\\*.*?'."<br/>";

// 输出： You deleted C:\*.*?
echo 'You deleted C:\*.*?'."<br/>";

// 输出： This will not expand: \n a newline
echo 'This will not expand: \n a newline'."<br/>";

//比较下面的
echo "This will not expand: \n a newline"."<br/>";


// 输出： Variables do not $expand $either
echo 'Variables do not $expand $either'."<br/>";

$juice = "apple";
echo "He drank some juice made of $juice."."<br/>";
/*
当 PHP 解析器遇到一个美元符号（$）时，它会和其它很多解析器一样，去组合尽量多的标识以形成一个合法的变量名。可以用花括号来明确变量名的界线。 
*/

/*（花括号）语法*/
// 显示所有错误
error_reporting(E_ALL);

$great = 'fantastic';

// 无效，输出: This is { fantastic}
echo "This is { $great}"."<br/>";

// 有效，输出： This is fantastic
echo "This is {$great}"."<br/>";
echo "This is ${great}"."<br/>";


// 有效
echo "This square is {$square->width}00 centimeters broad."; 

// 有效，只有通过花括号语法才能正确解析带引号的键名
echo "This works: {$arr['key']}";

// 有效
echo "This works: {$arr[4][3]}";

/*
存取和修改字符串中的字符

string 中的字符可以通过一个从 0 开始的下标，用类似 array 结构中的方括号包含对应的数字来访问和修改，比如 $str[42]。可以把 string 当成字符组成的 array。函数 substr() 和 substr_replace() 可用于操作多于一个字符的情况。 

*/

/*字符串下标必须为整数或可转换为整数的字符串，否则会发出警告*/

/*字符串可以用 '.'（点）运算符连接起来，注意 '+'（加号）运算符没有这个功能。*/






?> 



