<?php

//匿名函数 
/*
匿名函数（Anonymousfunctions），也叫闭包函数（closures），允许临时创建一个没有指定名称的函数。最经常用作回调函数（callback）参数的值。当然，也有其它应用的情况。 
*/

//闭包函数也可以作为变量的值来使用。
//为了引用这个函数，这个匿名函数的定义需要赋值给一个变量，为了调用匿名函数，在该变量名字后增加括号就可以了，括号里面是这个函数的参数
$greet = function($name)
{
    printf("Hello %s\r\n", $name);
};

$greet('World');
$greet('PHP');

/*如果不需要一个可以重用的函数，可以在函数参数内定义一个匿名函数，上面可改写如下*/
$a = array(1, 2, 3, 4, 5);

$c = array_map(function($d){
          return($d * $d * $d);
      }, $a);

print_r($c);

/*有什么好处？？？
还有一种场景需要使用匿名函数：对多维数组进行排序，如下：
*/
$students = array(
	256 => array('name' => 'Jon', 'grade' => 98.5),
	2 => array('name' => 'Vance', 'grade' => 85.1),
	9 => array('name' => 'Stephen', 'grade' => 94.0),
	364 => array('name' => 'Steve', 'grade' => 85.1),
	68 => array('name' => 'Rob', 'grade' => 74.6)
);

// Sort by name:
uasort($students, function($x, $y) {
    return strcasecmp($x['name'], $y['name']);
});
echo '<h2>Array Sorted By Name</h2><pre>' . print_r($students, 1) . '</pre>';

// Sort by grade:
uasort($students, function ($x, $y) {
    return ($x['grade'] < $y['grade']);
});
echo '<h2>Array Sorted By Grade</h2><pre>' . print_r($students, 1) . '</pre>';


/*匿名函数可以用作闭包，闭包在PHP中并不常使用，但是在JS中却很常见*/


