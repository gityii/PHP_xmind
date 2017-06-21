<?php

/*====if else elseif=====*/
/*
在 PHP 中，也可以写成"else if"（两个单词），它和"elseif"（一个单词）的行为完全一样。
必须要注意的是 elseif 与 else if 只有在类似上例中使用花括号的情况下才认为是完全相同。如果用冒号来定义 if/elseif 条件，那就不能用两个单词的 else if，否则 PHP 会产生解析错误。
*/
/* 不正确的使用方法： */
/*
if($a > $b):
    echo $a." is greater than ".$b;
else if($a == $b): // 将无法编译
    echo "The above line causes a parse error.";
endif;
*/
$a = 5;
$b=6;
/* 正确的使用方法： */
if($a > $b):
    echo $a." is greater than ".$b;
elseif($a == $b): // 注意使用了一个单词的 elseif
    echo $a." equals ".$b;
else:
    echo $a." is neither greater than or equal to ".$b;
endif;

echo '<br/>';
/*流程控制的替代语法 
PHP 提供了一些流程控制的替代语法，包括 if，while，for，foreach 和 switch。替代语法的基本形式是把左花括号（{）换成冒号（:），把右花括号（}）分别换成 endif;，endwhile;，endfor;，endforeach; 以及 endswitch;。 
*/
//不支持在同一个控制块内混合使用两种语法。 
/*
if ($a == 5): 
A is equal to 5;     //注意这两行都打印出来了
endif;
*/
if ($a == 5):
    echo "a equals 5";
    echo "...";
elseif ($a == 6):
    echo "a equals 6";
    echo "!!!";
else:
    echo "a is neither 5 nor 6";
endif;



echo '<br/>';

//while 循环
/*
while 语句的含意很简单，它告诉 PHP 只要 while 表达式的值为 TRUE 就重复执行嵌套中的循环语句。表达式的值在每次开始循环时检查，所以即使这个值在循环语句中改变了，语句也不会停止执行，直到本次循环结束。有时候如果 while 表达式的值一开始就是 FALSE，则循环语句一次都不会执行。
*/

$i = 1;
while ($i <= 10) {
    echo $i++;  /* the printed value would be
                    $i before the increment
                    (post-increment) */
}

/* example 2 */

$i = 1;
while ($i <= 10):
    print $i;
    $i++;
endwhile;

/*
do-while 循环和 while 循环非常相似，区别在于表达式的值是在每次循环结束时检查而不是开始时。和一般的 while 循环主要的区别是 do-while 的循环语句保证会执行一次（表达式的真值在每次循环结束后检查），然而在一般的 while 循环中就不一定了（表达式真值在循环开始时检查，如果一开始就为 FALSE 则整个循环立即终止）。
*/

$i = 0;
do {
   echo $i;
} while ($i > 0);



//for 循环
/*
for (expr1; expr2; expr3)
    statement

每个表达式都可以为空或包括逗号分隔的多个表达式。
表达式 expr2 中，所有用逗号分隔的表达式都会计算，但只取最后一个结果。expr2 为空意味着将无限循环下去（和 C 一样，PHP 暗中认为其值为 TRUE）。这可能不像想象中那样没有用，因为经常会希望用有条件的 break 语句来结束循环而不是用 for 的表达式真值判断。 
*/

$i = 1;
for (;;) {
    if ($i > 10) {
        break;
    }
    echo $i;
    $i++;
}



/*
 * 此数组将在遍历的过程中改变其中某些单元的值
 */
$people = Array(
        Array('name' => 'Kalle', 'salt' => 856412), 
        Array('name' => 'Pierre', 'salt' => 215863)
        );

for($i = 0; $i < count($people); ++$i)
{
    $people[$i]['salt'] = rand(000000, 999999);
}



/*
以上代码可能执行很慢，因为每次循环时都要计算一遍数组的长度。由于数组的长度始终不变，可以用一个中间变量来储存数组长度以优化而不是不停调用 count()：
*/
$people = Array(
        Array('name' => 'Kalle', 'salt' => 856412), 
        Array('name' => 'Pierre', 'salt' => 215863)
        );

for($i = 0, $size = count($people); $i < $size; ++$i)
{
    $people[$i]['salt'] = rand(000000, 999999);
}
	
echo '<br/>';


//foreach


/*
foreach 语法结构提供了遍历数组的简单方式。foreach 仅能够应用于数组和对象，如果尝试应用于其他数据类型的变量，或者未初始化的变量将发出错误信息。有两种语法： 
foreach (array_expression as $value)
    statement
foreach (array_expression as $key => $value)
    statement

第一种格式遍历给定的 array_expression 数组。每次循环中，当前单元的值被赋给 $value 并且数组内部的指针向前移一步（因此下一次循环中将会得到下一个单元）。 

第二种格式做同样的事，只除了当前单元的键名也会在每次循环中被赋给变量 $key。
	
当 foreach 开始执行时，数组内部的指针会自动指向第一个单元。这意味着不需要在 foreach 循环之前调用 reset()。 
由于 foreach 依赖内部数组指针，在循环中修改其值将可能导致意外的行为。 
	
*/


//可以很容易地通过在 $value 之前加上 & 来修改数组的元素。此方法将以引用赋值而不是拷贝一个值。 

$arr = array(1, 2, 3, 4);
foreach ($arr as &$value) {
    $value = $value * 2;
}
// $arr is now array(2, 4, 6, 8)
unset($value); // 最后取消掉引用

//数组最后一个元素的 $value 引用在 foreach 循环之后仍会保留。建议使用 unset() 来将其销毁。
//foreach 不支持用"@"来抑制错误信息的能力。 

$a = array();
$a[0][0] = "a";
$a[0][1] = "b";
$a[1][0] = "y";
$a[1][1] = "z";

foreach ($a as $v1) {
    foreach ($v1 as $v2) {
        echo "$v2\n";
    }
}

//用 list() 给嵌套的数组解包 
//PHP 5.5 增添了遍历一个数组的数组的功能并且把嵌套的数组解包到循环变量中，只需将 list() 作为值提供。 
$array = [
    [1, 2],
    [3, 4],
];

foreach ($array as list($a, $b)) {
    // $a contains the first element of the nested array,
    // and $b contains the second element.
    echo "A: $a; B: $b\n";
}
//list() 中的单元可以少于嵌套数组的，此时多出来的数组单元将被忽略

foreach ($array as list($a)) {
    // Note that there is no $b here.
    echo "$a\n";
}


//如果 list() 中列出的单元多于嵌套数组则会发出一条消息级别的错误信息



//break
//break 结束当前 for，foreach，while，do-while 或者 switch 结构的执行。 


//continue 
//continue 在循环结构用用来跳过本次循环中剩余的代码并在条件求值为真时开始执行下一次循环。 



//switch
/*switch 结构可以用字符串
如果不在 case 的语句段最后写上 break 的话，PHP 将继续执行下一个 case 中的语句段。
一个 case 的特例是 default。它匹配了任何和其它 case 都不匹配的情况。
case表达式可以是任何求值为简单类型的表达式，即整型或浮点数以及字符串。不能用数组或对象，除非它们被解除引用成为简单/类型*/
switch ($i) {
case "apple":
    echo "i is apple";
    break;
case "bar":
    echo "i is bar";
    break;
case "cake":
    echo "i is cake";
    break;
default:
    echo "i is not equal to 0, 1 or 2";	
}

//declare
/*
declare 结构用来设定一段代码的执行指令。declare 的语法和其它流程控制结构相似： 
declare (directive)
    statement
declare 代码段中的 statement 部分将被执行——怎样执行以及执行中有什么副作用出现取决于 directive 中设定的指令。	
*/
//可以用 encoding 指令来对每段脚本指定其编码方式。 	
declare(encoding='ISO-8859-1');
/*
当和命名空间结合起来时 declare 的唯一合法语法是 declare(encoding='...');，其中 ... 是编码的值。而 declare(encoding='...') {} 将在与命名空间结合时产生解析错误。 
*/


//return
/*
如果在一个函数中调用 return 语句，将立即结束此函数的执行并将它的参数作为函数的值返回。
如果在全局范围中调用，则当前脚本文件中止运行。如果当前脚本文件是被 include 的或者 require 的，则控制交回调用文件。此外，如果当前脚本是被 include 的，则 return 的值会被当作 include 调用的返回值。如果在主脚本文件中调用 return，则脚本中止运行。如果当前脚本文件是在 php.ini 中的配置选项 auto_prepend_file 或者 auto_append_file 所指定的，则此脚本文件中止运行。 
*/

//require
/*
require 和 include 几乎完全一样，除了处理失败的方式不同之外。require 在出错时产生 E_COMPILE_ERROR 级别的错误。换句话说将导致脚本中止而 include 只产生警告（E_WARNING），脚本会继续运行。 
*/

//include
/*
以下文档也适用于 require。 
被包含文件先按参数给出的路径寻找，如果没有给出目录（只有文件名）时则按照 include_path 指定的目录寻找。如果在 include_path 下没找到该文件则 include 最后才在调用脚本文件所在的目录和当前工作目录下寻找。如果最后仍未找到文件则 include 结构会发出一条警告；这一点和 require 不同，后者会发出一个致命错误。 

如果定义了路径——不管是绝对路径（在 Windows 下以盘符或者 \ 开头，在 Unix/Linux 下以 / 开头）还是当前目录的相对路径（以 . 或者 .. 开头）——include_path 都会被完全忽略。例如一个文件以 ../ 开头，则解析器会在当前目录的父目录下寻找该文件。 

有关 PHP 怎样处理包含文件和包含路径的更多信息参见 include_path 部分的文档。 

当一个文件被包含时，其中所包含的代码继承了 include 所在行的变量范围。从该处开始，调用文件在该行处可用的任何变量在被调用的文件中也都可用。不过所有在包含文件中定义的函数和类都具有全局作用域。 

*/

/*
如果"URLfopenwrappers"在PHP中被激活（默认配置），可以用URL（通过HTTP或者其它支持的封装协议——见支持的协议和封装协议）而不是本地文件来指定要被包含的文件。如果目标服务器将目标文件作为 PHP 代码解释，则可以用适用于 HTTP GET 的 URL 请求字符串来向被包括的文件传递变量。严格的说这和包含一个文件并继承父文件的变量空间并不是一回事；该脚本文件实际上已经在远程服务器上运行了，而本地脚本则包括了其结果。 
*/

/*
处理返回值：在失败时 include 返回 FALSE 并且发出警告。成功的包含则返回 1，除非在包含文件中另外给出了返回值。可以在被包括的文件中使用 return 语句来终止该文件中程序的执行并返回调用它的脚本。同样也可以从被包含的文件中返回值。可以像普通函数一样获得 include 调用的返回值。不过这在包含远程文件时却不行，除非远程文件的输出具有合法的 PHP 开始和结束标记（如同任何本地文件一样）。可以在标记内定义所需的变量，该变量在文件被包含的位置之后就可用了。 

因为 include 是一个特殊的语言结构，其参数不需要括号。在比较其返回值时要注意。 
*/

//要在脚本中自动包含文件，参见 php.ini 中的 auto_prepend_file 和 auto_append_file 配置选项。 


//require_once
//require_once 语句和 require 语句完全相同，唯一区别是 PHP 会检查该文件是否已经被包含过，如果是则不会再次包含。 



//include_once //可以用于在脚本执行期间同一个文件有可能被包含超过一次的情况下，想确保它只被包含一次以避免函数重定义，变量重新赋值等///问w题。 


//goto
/*
goto 操作符可以用来跳转到程序中的另一位置。该目标位置可以用目标名称加上冒号来标记，而跳转指令是 goto 之后接上目标位置的标记。PHP 中的 goto 有一定限制，目标位置只能位于同一个文件和作用域，也就是说无法跳出一个函数或类方法，也无法跳入到另一个函数。也无法跳入到任何循环或者 switch 结构中。可以跳出循环或者 switch，通常的用法是用 goto 代替多层的 break。 
*/


