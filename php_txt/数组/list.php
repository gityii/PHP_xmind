<?php
/*
list — 把数组中的值赋给一些变量 
array list ( mixed $varname [, mixed $... ] )
像 array() 一样，这不是真正的函数，而是语言结构。list()用一步操作给一组变量进行赋值。 


参数:    varname         一个变量。 
返回值:  返回指定的数组。 

*/

$info = array('coffee', 'brown', 'caffeine');

// 列出所有变量
list($drink, $color, $power) = $info;
echo "$drink is $color and $power makes it special.\n";

// 列出他们的其中一个
list($drink, , $power) = $info;
echo "$drink has $power.\n";

// 或者让我们跳到仅第三个
list( , , $power) = $info;
echo "I need $power!\n";

// list() 不能对字符串起作用
list($bar) = "abcde";
var_dump($bar); // NULL


list($a, list($b, $c)) = array(1, array(2, 3));

var_dump($a, $b, $c);

/*
Warning:
list() 从最右边一个参数开始赋值。如果你用单纯的变量，不用担心这一点。 但是如果你用了具有索引的数组，通常你期望得到的结果和在 list() 中写的一样是从左到右的，但实际上不是。 它是以相反顺序赋值的。
*/
$info = array('coffee', 'brown', 'caffeine');

list($a[0], $a[1], $a[2]) = $info;

var_dump($a);

/*
array(3) {
  [2]=>
  string(8) "caffeine"
  [1]=>
  string(5) "brown"
  [0]=>
  string(6) "coffee"
}
*/

