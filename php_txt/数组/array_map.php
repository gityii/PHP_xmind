<?php

/*
array_map — 将回调函数作用到给定数组的单元上 
array array_map ( callable $callback , array $arr1 [, array $... ] )
array_map() 返回一个数组，该数组包含了 arr1 中的所有单元经过 callback 作用过之后的单元。callback接受的参数数目应该和传递给 array_map() 函数的数组数目一致。 

参数: 
callback   对每个数组的每个元素作用的回调函数。 
arr1       将被回调函数（callback）执行的数组。 
array      将被回调函数（callback）执行的数组列表。

返回值:    返回一个数组，该数组的每个元素都数组（arr1）里面的每个元素经过回调函数（callback）处理了的

*/

function cube($n)
{
    return($n * $n * $n);
}

$a = array(1, 2, 3, 4, 5);
$b = array_map("cube", $a);
print_r($b,1);

/*
Array
(
    [0] => 1
    [1] => 8
    [2] => 27
    [3] => 64
    [4] => 125
)
*/
/*如果不需要一个可以重用的函数，可以在函数参数内定义一个匿名函数，上面可改写如下*/

$c = array_map(function($d){
          return($d * $d * $d);
      }, $a);

print_r($c,1);	  