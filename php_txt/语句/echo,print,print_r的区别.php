<?php
/*
echo是PHP语句, print和print_r是函数,语句没有返回值,函数可以有返回值(即便没有用) 
print只能打印出简单类型变量的值(如int,string)
print_r可以打印出复杂类型变量的值(如数组,对象) 
echo 输出一个或者多个字符串

5、echo 输出语句，可以输出多个变量，没有返回值
Print 打印字符串函数，可以有返回值
print_r 打印函数，可以打印变量，数组等。	


echo是语言结构，没有返回值；而print是函数，有返回值；
而print_r是函数 ，是递归调用，用于输出数组对象


(1)echo 是语法，Output one or more strings，没有返回值；echo函数实际不是一个函数，echo() 函数比 print() 速度稍快。
(2)print 是函数，不能输出数组和对象，Output a string，print有返回值；
(3)print_r 是函数，可以输出数组。print_r是个比较有意思的函数，可以输出stirng、int、float、
array、object等，输出array时会用结构表示，print_r输出成功时返回true；而且print_r可以通过print_r($str,true)来，使print_r不输出而返回print_r处理后的值。此外，对于echo和print，基本以使用echo居多，因为其效率比print要高。


print_r显示关于一个变量的易于理解的信息。如果给出的是 string、integer 或 float，将打印变量值本身。如果给出的是 array，将会按照一定格式显示键和元素。object 与数组类似。 

print_r将把数组的指针移到最后边。使用 reset() 可让指针回到开始处。
bool print_r ( mixed $expression [, bool $return ] ) 
如果想捕捉 print_r() 的输出，可使用 return 参数。若此参数设为 TRUE，print_r将不打印结果（此为默认动作），而是返回其输出。 
 实测return 参数为1时，按一定的结构打印，不为1时，按数组方式打印
*/

//在echo中使用逗号做字符串连接符，比使用点号代码更美观。

define('__ROOT__',dirname(__FILE__));

echo __ROOT__."<br/>";;


echo "Hello World"."<br/>";

echo "This spans
multiple lines. The newlines will be
output as well"."<br/>";

echo "This spans\nmultiple lines. The newlines will be\noutput as well."."<br/>";

echo "Escaping characters is done \"Like this\"."."<br/>";

// You can use variables inside of an echo statement
$foo = "foobar";
$bar = "barbaz";

echo "foo is $foo"."<br/>"; // foo is foobar

// You can also use arrays
$baz = array("value" => "foo");

echo "this is {$baz['value']} !"."<br/>"; // this is foo !

// Using single quotes will print the variable name, not the value
echo 'foo is $foo'."<br/>"; // foo is $foo

// If you are not using any other characters, you can just echo variables
echo $foo."<br/>";          // foobar
echo $foo,$bar,"<br/>";     // foobarbarbaz

// Strings can either be passed individually as multiple arguments or
// concatenated together and passed as a single argument
echo 'This ', 'string ', 'was ', 'made ', 'with multiple parameters.', "<br/>"; //逗号分隔
echo 'This ' . 'string ' . 'was ' . 'made ' . 'with concatenation.' . "\n";


//Notice: Undefined variable: variable
echo <<<END
This uses the "here document" syntax to output
multiple lines with $variable interpolation. Note
that the here document terminator must appear on a
line with just a semicolon. no extra whitespace!
END;

// Because echo does not behave like a function, the following code is invalid.
//($some_var) ? echo 'true' : echo 'false'; //执行下面的语句会出错

// However, the following examples will work:
($some_var) ? print 'true' : print 'false'; // print is also a construct, but
                                            // it behaves like a function, so
                                            // it may be used in this context.
echo $some_var ? 'true': 'false'; // changing the statement around


