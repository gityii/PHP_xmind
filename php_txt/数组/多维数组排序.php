<?php
/*
1、bool usort ( array &$array , callable $cmp_function )
使用用户自定义的比较函数对数组中的值进行逆序和正序的排序，这取决于自定义的函数的返回值 
usort函数根据数值进行排序，但它不保存关键字，排序完后的数组$array，键值对的关系发生变化
本函数将用用户自定义的比较函数对一个数组中的值进行排序。如果要排序的数组需要用一种不寻常的标准进行排序，那么应该使用此函数。 
此函数为 array 中的元素赋与新的键名。这将删除原有的键名，而不是仅仅将键名重新排序。

参数: 
array           输入的数组 
cmp_function    为自定义排序函数，在第一个参数小于，等于或大于第二个参数时，该比较函数必须相应地返回一个小于，等于或大于 0的整数。  
*/
/*自定义排序函数（正序）可以写成：
$x为第一个参数，$y为第二个参数，这里的参数指的就是数组的元素，下面的元素下标默认从0开始*/
function cmp_function($x, $y){
   if($x > $y){
      return true;//正数或者true则表示第二个参数应该排在前面
   }
   else if ($x < $y){
      return false;//负数或者false意味着第一个参数应该排在第二个参数前面
   }else {
      return 0;
   }
}

/*当下标元素不为0时，自定义函数也可以特殊的根据下标来实现*/
function cmp_function($x, $y){
   if($x['key1'] > $y['key1']){
      return true;
   }
   else if ($x['key1'] < $y['key1']){
      return false;
   }else {
      return 0;
   }
}

usort($a, 'cmp_function');//函数名用单引号包裹

/*
2、bool uasort ( array &$array , callable $cmp_function )
uasort — 使用用户自定义的比较函数对数组中的值进行排序并保持索引关联 
这主要是针对元素下标不是从0开始的数组，用法跟usort类似
*/


