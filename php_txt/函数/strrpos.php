<?php
/*strrpos — 计算指定字符串在目标字符串中最后一次出现的位置

int strrpos ( string $haystack , string $needle [, int $offset = 0 ] )
返回字符串 haystack 中 needle 最后一次出现的数字位置。


参数
haystack    在此字符串中进行查找。 
needle      如果 needle不是一个字符串，它将被转换为整型并被视为字符的顺序值。 
offset      或许会查找字符串中任意长度的子字符串。负数值将导致查找在字符串结尾处开始的计数位置处结束。 

返回值      返回 needle 存在的位置。如果没有找到，返回 FALSE。 Also note that string positions start at 0, and not 1.
 
 */
 
 
$foo = "0123456789a123456789b123456789c";

var_dump(strrpos($foo, '7', -5));  // 从尾部第 5 个位置开始查找
                                   // 结果: int(17)，这个返回的是位置信息，如果不带-5的话，将返回27，即7出现的最后一个位置
echo "<br/>";
var_dump(strrpos($foo, '7', 20));  // 从第 20 个位置开始查找
                                   // 结果: int(27)
echo "<br/>";
var_dump(strrpos($foo, '7', 28));  // 结果: bool(false)

