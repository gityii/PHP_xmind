<?php
/*
PHP 中的数组实际上是一个有序映射。映射是一种把 values 关联到 keys 的类型。此类型在很多方面做了优化，因此可以把它当成真正的数组，或列表（向量），散列表（是映射的一种实现），字典，集合，栈，队列以及更多可能性。由于数组元素的值也可以是另一个数组，树形结构和多维数组也是允许的。 
*/
/*
array(  key =>  value
     , ...
     )
*/	 
// 键（key）可是是一个整数 integer 或字符串 string
// 值（value）可以是任意类型的值
	
//key 可以是 integer 或者 string。value 可以是任意类型。 

/*
此外 key 会有如下的强制转换： 
包含有合法整型值的字符串会被转换为整型。例如键名"8"实际会被储存为8。但是"08"则不会强制转换，因为其不是一个合法的十进制数值。  
浮点数也会被转换为整型，意味着其小数部分会被舍去。例如键名 8.7 实际会被储存为 8。  
布尔值也会被转换成整型。即键名 true 实际会被储存为 1 而键名 false 会被储存为 0。  
Null 会被转换为空字符串，即键名 null 实际会被储存为 ""。  
数组和对象不能被用为键名。坚持这么做会导致警告：Illegal offset type。  

如果在数组定义中多个单元都使用了同一个键名，则只使用了最后一个，之前的都被覆盖了。 
*/

$array = array(
    1    => "a",
    "1"  => "b",
    1.5  => "c",
    true => "d",
	 100   => -100,
    -100  => 100,
	     "a",
         "b",
    10 => "c",
         "d",
    "foo" => "barq"
);
var_dump($array);

/*
PHP 数组可以同时含有 integer 和 string 类型的键名，因为 PHP 实际并不区分索引数组和关联数组。 
如果对给出的值没有指定键名，则取当前最大的整数索引值，而新的键名将是该值加一。如果指定的键名已经有了值，则该值会被覆盖。 
*/
/*
key 为可选项。如果未指定，PHP 将自动使用之前用过的最大 integer 键名加上 1 作为新的键名
数组单元可以通过 array[key] 语法来访问。 
*/

/*方括号和花括号可以互换使用来访问数组单元（例如 $array[42] 和 $array{42} 在上例中效果相同）*/

/*试图访问一个未定义的数组键名与访问任何未定义变量一样：会导致 E_NOTICE 级别错误信息，其结果为 NULL*/

/*
这是通过在方括号内指定键名来给数组赋值实现的。也可以省略键名，在这种情况下给变量名加上一对空的方括号（[]）。 
$arr[key] = value;
$arr[] = value;
// key 可以是 integer 或 string
// value 可以是任意类型的值

如果 $arr 还不存在，将会新建一个，这也是另一种新建数组的方法。不过并不鼓励这样做，因为如果 $arr 已经包含有值（例如来自请求变量的 string）则此值会保留而 [] 实际上代表着字符串访问运算符。初始化变量的最好方式是直接给其赋值。。 
*/

/*要修改某个值，通过其键名给该单元赋一个新值。要删除某键值对，对其调用 unset() 函数*/

$arr = array(5 => 1, 12 => 2);

$arr[] = 56;    // This is the same as $arr[13] = 56;
                // at this point of the script
$arr["x"] = 42; // This adds a new element to
                // the array with key "x"      
echo var_dump($arr)."<br/>";				
unset($arr[5]); // This removes the element from the array
var_dump($arr);	
unset($arr);    // This deletes the whole array

/*
如果给出方括号但没有指定键名，则取当前最大整数索引值，新的键名将是该值加上1（但是最小为0）。如果当前还没有整数索引，则键名将为 0。 

注意这里所使用的最大整数键名不一定当前就在数组中。它只要在上次数组重新生成索引后曾经存在过就行了。以下面的例子来说明：
*/

echo "-----"."<br/>";
// 创建一个简单的数组
$array1 = array(1, 2, 3, 4, 5);
print_r($array1);

// 现在删除其中的所有元素，但保持数组本身不变:
foreach ($array1 as $i => $value) {
    unset($array1[$i]);
}
print_r($array1);

// 添加一个单元（注意新的键名是 5，而不是你可能以为的 0）
$array1[] = 6;
print_r($array1);

// 重新索引：
$array1 = array_values($array1);
$array1[] = 7;
print_r($array1);

//unset() 函数允许删除数组中的某个键。但要注意数组将不会重建索引。如果需要删除后重建索引，可以用 array_values() 函数。 
$a = array(1 => 'one', 2 => 'two', 3 => 'three');
unset($a[2]);
/* will produce an array that would have been defined as
   $a = array(1 => 'one', 3 => 'three');
   and NOT
   $a = array(1 => 'one', 2 =>'three');
*/

$b = array_values($a);
// Now $b is array(0 => 'one', 1 =>'three')

//foreach 控制结构是专门用于数组的。它提供了一个简单的方法来遍历数组。 
//$foo[bar] 错了,应该始终在用字符串表示的数组索引上加上引号。例如用 $foo['bar'] 而不是 $foo[bar]。
//用不着给键名为常量或变量的加上引号，否则会使 PHP 不能解析它们。 

echo "-----"."<br/>";
error_reporting(E_ALL);
$array = array(1, 2);
$count = count($array);
for ($i = 0; $i < $count; $i++) {
    echo "\nChecking $i: \n";
    echo "Bad: " . $array['$i'] . "\n";
	echo "Good: " . $array["$i"] . "\n";//单引号和双引号是不同的
    echo "Good: " . $array[$i] . "\n";
    echo "Bad: {$array['$i']}\n";
    echo "Good: {$array[$i]}\n";
}

//当打开 error_reporting 来显示 E_NOTICE 级别的错误（将其设为 E_ALL）时将看到这些错误。默认情况下 error_reporting 被关闭不显示这些。 
	
/*
对于任意 integer，float，string，boolean 和 resource 类型，如果将一个值转换为数组，将得到一个仅有一个元素的数组，其下标为 0，该元素即为此标量的值。换句话说，(array)$scalarValue 与 array($scalarValue) 完全一样。 
*/
	
//可以用 array_diff() 和数组运算符来比较数组。 
//数组(Array) 的赋值总是会涉及到值的拷贝。使用引用运算符通过引用来拷贝数组。 


?>


