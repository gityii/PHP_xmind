<?php

/*
array_map — 将回调函数作用到给定数组的单元上 
array array_map ( callable $callback , array $arr1 [, array $... ] )
array_map() 返回一个数组，该数组包含了 arr1 中的所有单元经过 callback 作用过之后的单元。callback接受的参数数目应该和传递给 array_map() 函数的数组数目一致。 

参数: 
callback   对每个数组的每个元素作用的回调函数。 
arr1       将被回调函数（callback）执行的数组。 
array      将被回调函数（callback）执行的数组列表。

返回值:    返回一个数组，该数组的每个元素都是数组（arr1）里面的每个元素（注意这是数组里面的每一个元素即值），经过回调函数（callback）处理了的，注意返回值是一个数组，注意看内容要细心

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



//array_map() - 使用更多的数组

 
<?php
function show_Spanish($n, $m)
{
    return("The number $n is called $m in Spanish");
}

function map_Spanish($n, $m)
{
    return(array($n => $m));
}

$a = array(1, 2, 3, 4, 5);
$b = array("uno", "dos", "tres", "cuatro", "cinco");

$c = array_map("show_Spanish", $a, $b);
print_r($c);

$d = array_map("map_Spanish", $a , $b);
print_r($d);
?> 


以上例程会输出：

 
// printout of $c
Array
(
    [0] => The number 1 is called uno in Spanish
    [1] => The number 2 is called dos in Spanish
    [2] => The number 3 is called tres in Spanish
    [3] => The number 4 is called cuatro in Spanish
    [4] => The number 5 is called cinco in Spanish
)



/*那么，如果你是在一个PHP类中通过array_map函数回调内部方法又该如何做呢？

同样，我们可以在PHP手册中找到一段用户添加的说明：

If you need to call a static method from array_map, this will NOT work:
（如果你想在array_map函数中回调一个静态方法，那么下面的做法是错误的）

<?php
$a = array(1, 2, 3, 4, 5);
$b = array_map("myclass::myMethoed", $a);
print_r($b);
?> 

Instead, you need to do this:
（你应该做如下调用）

<?php
$a = array(1, 2, 3, 4, 5);
$b = array_map(array("myclass","myMethoed"), $a);
print_r($b);
?> 


一个具体的例子：

﻿<?php 


class Test{ 
     public function __construct(){} 
     
     public function common_filter($arg){ 
         return $this->entities($arg); 
     } 
     
     public function public_static_filter($arg){ 
         return self::_entities($arg); 
     } 
     
     public function private_static_filter($arg){ 
         return self::__entities($arg); 
     } 
     
     public function entities($arg){ 
        $return = null; 
         if(is_array($arg)){ 
            $return = array_map(array($this, 'entities'), $arg); 
         }else{ 
            $return = is_numeric($arg) ? $arg : htmlspecialchars($arg, ENT_QUOTES); 
         } 
         return $return; 
     } 
     
     public static function _entities($arg){ 
        $return = null; 
         if(is_array($arg)){ 
            // this will neithor work under static call nor class instantiate 
             //$return = array_map(array(self, '_entities'), $arg); 
             
             // this will work under both static call and class instantiate 
            $return = array_map(array(__CLASS__, '_entities'), $arg); 
         }else{ 
            $return = is_numeric($arg) ? $arg : htmlspecialchars($arg, ENT_QUOTES); 
         } 
         return $return; 
     } 
     
     private static function __entities($arg){ 
        $return = null; 
         if(is_array($arg)){ 
            $return = array_map(array(__CLASS__, '__entities'), $arg); 
         }else{ 
            $return = is_numeric($arg) ? $arg : htmlspecialchars($arg, ENT_QUOTES); 
         } 
         return $return; 
     } 
} 

$args = array( 
    'name' => 'Mc/'Spring', 
    'age' => 25, 
    'email' => 'Fuck.Spam@gmail.com', 
    'address' => '<a href="http://www.baidu.com/?hi=1983&go=true">Simple Test</a>' 
); 

print_r(Test::_entities($args)); 

echo '<br />'; 

$obj = new Test; 

print_r($obj->entities($args)); 

echo '<br />'; 

print_r($obj->common_filter($args)); 

echo '<br />'; 

print_r($obj->public_static_filter($args)); 

echo '<br />'; 

print_r($obj->private_static_filter($args)); 

// echo hightlight_file(__FILE__);
?>

这里有几点可以参考的：

1，在PHP类中通过array_map函数回调内部方法时，类名称可以使用__CLASS__常量。我们强烈推荐使用此常量，因为不论你类如何修改，这能保证最终结果都是正确的。

2，如果回调的方法是非静态类型，亦可通过$this伪变量指定。

3，在PHP类中的array_map函数总是不能识别self伪变量。




*/



/*------jsfl--------*/

index.php:

<?php
$_magic_quote = get_magic_quotes_gpc();
if(empty($_magic_quote)) {
	$_GET = system::filter($_GET);
	$_POST = system::filter($_POST);
	$_REQUEST = system::filter($_REQUEST);
}

?>


system.php:

<?php
class system{

	public static function filter($data){
		$data=is_array($data)?array_map(array(__CLASS__,'filter'),$data):addslashes($data);
		return $data;
	}
}	
?>




/**----------------------这个函数的使用还不彻底明白----------------------------**/

<?php

class system{

	/**
	 * filter
	 * 请求数据过滤
	 * @access public
	 * @param $data 需要过滤的数据
	 */
	public static function filter($data){
        $data=is_array($data)?array_map(array(__CLASS__,'filter'),$data):addslashes($data);
		return $data;
	}
}	

$str = "Is your name O'reilly?";

echo system::filter($str);












