<?php
//PHP 支持一个错误控制运算符：@。当将其放置在一个 PHP 表达式之前，该表达式可能产生的任何错误信息都被忽略掉。 
/*
用 set_error_handler() 设定了自定义的错误处理函数，仍然会被调用，但是此错误处理函数可以（并且也应该）调用 error_reporting()，而该函数在出错语句前有 @ 时将返回 0。 	
mixed set_error_handler ( callable $error_handler [, int $error_types = E_ALL | E_STRICT ] )
设置一个用户的函数(error_handler)来处理脚本中出现的错误。

*/
/*
如果激活了 track_errors  特性，表达式所产生的任何错误信息都被存放在变量 $php_errormsg 中。此变量在每次出错时都会被覆盖，所以如果想用它的话就要尽早检查。 
*/
/* Intentional file error */
$my_file = @file ('non_existent_file') or
    die ("Failed opening file: error was '$php_errormsg'");

// this works for any expression, not just functions:
$value = @$cache[$key];
// will not issue a notice if the index $key doesn't exist.

/*
@ 运算符只对表达式有效。对新手来说一个简单的规则就是：如果能从某处得到值，就能在它前面加上 @ 运算符。例如，可以把它放在变量，函数和include调用，常量，等等之前。不能把它放在函数或类的定义之前，也不能用于条件结构例如 if 和 foreach 等。 
*/

//error_reporting — 设置应该报告何种 PHP 错误
/*
error_reporting() 函数能够在运行时设置 error_reporting 指令。 PHP 有诸多错误级别，使用该函数可以设置在脚本运行时的级别。 如果没有设置可选参数 level， error_reporting() 仅会返回当前的错误报告级别。 
*/

// 关闭所有PHP错误报告
error_reporting(0);

// Report simple running errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// 报告 E_NOTICE也挺好 (报告未初始化的变量
// 或者捕获变量名的错误拼写)
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

// 除了 E_NOTICE，报告其他所有错误
// 这是在 php.ini 里的默认设置
error_reporting(E_ALL ^ E_NOTICE);

// 报告所有 PHP 错误 (参见 changelog)
error_reporting(E_ALL);

// 报告所有 PHP 错误
error_reporting(-1);

// 和 error_reporting(E_ALL); 一样
ini_set('error_reporting', E_ALL);
















