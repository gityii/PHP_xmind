<?php
/*
foreach语法结构提供了遍历数组的简单方式。foreach仅能够应用于数组和对象，如果尝试应用于其他数据类型的变量，或者未初始化的变量将发出错误信息。
*/
/*
有两种语法： 
foreach (array_expression as $value)
    statement
foreach (array_expression as $key => $value)
    statement

第一种格式遍历给定的 array_expression 数组。每次循环中，当前单元的值被赋给 $value 并且数组内部的指针向前移一步（因此下一次循环中将会得到下一个单元）。 
第二种格式做同样的事，只除了当前单元的键名也会在每次循环中被赋给变量 $key。 
还能够自定义遍历对象。 
*/
/*可以很容易地通过在 $value 之前加上 & 来修改数组的元素。此方法将以引用赋值而不是拷贝一个值*/
$arr = array(1, 2, 3, 4);
foreach ($arr as &$value) {
    $value = $value * 2;
	echo  var_dump($value)."<br/>";
}
// $arr is now array(2, 4, 6, 8)
echo var_dump($arr)."<br/>";
echo var_dump($value)."<br/>";
//数组最后一个元素的 $value 引用在 foreach 循环之后仍会保留。建议使用 unset() 来将其销毁。 
unset($value); // 最后取消掉引用
var_dump($arr);

echo "<br />";	
foreach (array(1, 2, 3, 4, 5) as $v) {
    echo "$v\n";
}

//用 list() 给嵌套的数组解包 
//遍历一个数组的数组的功能并且把嵌套的数组解包到循环变量中，只需将 list() 作为值提供。
echo "<br />";	
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
//如果 list() 中列出的单元多于嵌套数组则会发出一条消息级别的错误信息



/*
foreach提供了一种定义对象的方法使其可以通过单元列表来遍历。
默认情况下，所有可见属性都将被用于遍历。 
*/
class MyClass
{
    public $var1 = 'value 1';
    public $var2 = 'value 2';
    public $var3 = 'value 3';

    protected $protected = 'protected var';
    private   $private   = 'private var';

    function iterateVisible() {
       echo "MyClass::iterateVisible:\n";
       foreach($this as $key => $value) {
           print "$key => $value\n";
       }
    }
}

$class = new MyClass();

foreach($class as $key => $value) {
    print "$key => $value\n";
}
echo "\n";


$class->iterateVisible();

/*结果：
var1 => value 1
var2 => value 2
var3 => value 3

MyClass::iterateVisible:
var1 => value 1
var2 => value 2
var3 => value 3
protected => protected var
private => private var
*/

/*实现 Iterator 接口
可以让对象自行决定如何遍历以及每次遍历时那些值可用。 
*/






