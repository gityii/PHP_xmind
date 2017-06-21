<?php

//执行运算符 

//递增／递减运算符 
/*
PHP 支持 C 风格的前／后递增与递减运算符。 
递增／递减运算符不影响布尔值。递减 NULL 值也没有效果，但是递增 NULL 的结果是 1。 
*/

/*
在处理字符变量的算数运算时，PHP 沿袭了 Perl 的习惯，而非 C 的。例如，在 Perl 中 $a = 'Z'; $a++; 将把 $a 变成'AA'，而在 C 中，a = 'Z'; a++; 将把 a 变成 '['（'Z' 的 ASCII 值是 90，'[' 的 ASCII 值是 91）。注意字符变量只能递增，不能递减，并且只支持纯字母（a-z 和 A-Z）。递增／递减其他字符变量则无效，原字符串没有变化。 
*/


//字符串运算符 

/*有两个字符串（string）运算符。第一个是连接运算符（"."），它返回其左右参数连接后的字符串。第二个是连接赋值运算符（".="），它将右边参数附加到左边的参数之后。*/
$a = "Hello ";
$b = $a . "World!"; // now $b contains "Hello World!"

$a = "Hello ";
$a .= "World!";     // now $a contains "Hello World!"

//类型运算符
//instanceof 用于确定一个 PHP 变量是否属于某一类 class 的实例
class MyClass
{
}

class NotMyClass
{
}
$a = new MyClass;

var_dump($a instanceof MyClass);
var_dump($a instanceof NotMyClass);





class ParentClass
{
}

class MyClass extends ParentClass
{
}

$b = new MyClass;

var_dump($b instanceof MyClass);
var_dump($b instanceof ParentClass);



/*
{}运算符怎么用？
*/





