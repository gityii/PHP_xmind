<?php

/*
运算符优先级
结合方向  运算符   附加信息
无 clone new clone 和 new 
左 [ array() 
右 ** 算术运算符 
右 ++ -- ~ (int) (float) (string) (array) (object) (bool) @  类型和递增／递减  
无 instanceof 类型  
右 ! 逻辑运算符  
左 * / %  算术运算符  
左 + - .  算术运算符和字符串运算符 
左 << >>  位运算符  
无 < <= > >=  比较运算符  
无 == != === !== <> <=>  比较运算符  
左 & 位运算符和引用 
左 ^ 位运算符  
左 | 位运算符  
左 && 逻辑运算符  
左 || 逻辑运算符  
左 ?? 比较运算符  
左 ? : ternary  
right = += -= *= **= /= .= %= &= |= ^= <<= >>=  赋值运算符  
左 and 逻辑运算符  
左 xor 逻辑运算符  
左 or 逻辑运算符  

*/

/*
算术运算符

例子  名称   结果
-$a 取反 $a 的负值。 
$a + $b 加法 $a 和 $b 的和。 
$a - $b 减法 $a 和 $b 的差。 
$a * $b 乘法 $a 和 $b 的积。 
$a / $b 除法 $a 除以 $b 的商。 
$a % $b 取模 $a 除以 $b 的余数。 
$a ** $b Exponentiation Result of raising $a to the $b'th power. Introduced in PHP 5.6. 
*/

/*
除法运算符总是返回浮点数。只有在下列情况例外：两个操作数都是整数（或字符串转换成的整数）并且正好能整除，这时它返回一个整数。 
取模运算符的操作数在运算之前都会转换成整数（除去小数部分）。 
取模运算符 % 的结果和被除数的符号（正负号）相同。即 $a % $b 的结果和 $a 的符号相同。
*/

echo (5 % 3)."\n";           // prints 2
echo (5 % -3)."\n";          // prints 2
echo (-5 % 3)."\n";          // prints -2
echo (-5 % -3)."\n";         // prints -2


/*赋值运算符 
赋值运算将原变量的值拷贝到新变量中（传值赋值），所以改变其中一个并不影响另一个。这也适合于在密集循环中拷贝一些值例如大数组。 
在 PHP 中普通的传值赋值行为有个例外就是碰到对象 object 时，在 PHP 5 中是以引用赋值的，除非明确使用了 clone 关键字来拷贝。 
PHP 支持引用赋值，使用"$var = &$othervar;"语法。引用赋值意味着两个变量指向了同一个数据，没有拷贝任何东西。
自 PHP 5 起，new 运算符自动返回一个引用，因此再对 new 的结果进行引用赋值在 PHP 5.3 以及以后版本中会发出一条 E_DEPRECATED 错误信息，在之前版本会发出一条 E_STRICT 错误信息。 

	
*/

/*
位运算符 
位运算符允许对整型数中指定的位进行求值和操作。
位运算符


例子  名称  结果
$a & $b And（按位与） 将把 $a 和 $b 中都为 1 的位设为 1。 
$a | $b Or（按位或） 将把 $a 和 $b 中任何一个为 1 的位设为 1。 
$a ^ $b Xor（按位异或） 将把 $a 和 $b 中一个为 1 另一个为 0 的位设为 1。 
~ $a Not（按位取反） 将 $a 中为 0 的位设为 1，反之亦然。 
$a << $b Shift left（左移） 将 $a 中的位向左移动 $b 次（每一次移动都表示"乘以 2"）。 
$a >> $b Shift right（右移） 将 $a 中的位向右移动 $b 次（每一次移动都表示"除以 2"）。 
*/

/*比较运算符*/
/*如果比较一个数字和字符串或者比较涉及到数字内容的字符串，则字符串会被转换为数值并且比较按照数值来进行。此规则也适用于 switch 语句。当用 === 或 !== 进行比较时则不进行类型转换，因为此时类型和数值都要比对。 */
//字符串转换成字符？	

/*
比较多种类型
运算数 1 类型     运算数 2 类型       结果

null 或 string string 将 NULL 转换为 ""，进行数字或词汇比较 
bool 或 null 任何其它类型 转换为 bool，FALSE < TRUE 
object object 内置类可以定义自己的比较，不同类不能比较，相同类和数组同样方式比较属性（PHP 4 中），PHP 5 有其自己的说明  
string，resource 或 number string，resource 或 number 将字符串和资源转换成数字，按普通数学比较 
array array 具有较少成员的数组较小，如果运算数 1 中的键不存在于运算数 2 中则数组无法比较，否则挨个值比较（见下例）  
object 任何其它类型 object 总是更大 
array 任何其它类型 array 总是更大 
*/
//标准数组比较代码

// 数组是用标准比较运算符这样比较的
function standard_array_compare($op1, $op2)
{
    if (count($op1) < count($op2)) {
        return -1; // $op1 < $op2
    } elseif (count($op1) > count($op2)) {
        return 1; // $op1 > $op2
    }
    foreach ($op1 as $key => $val) {
        if (!array_key_exists($key, $op2)) {
            return null; // uncomparable
        } elseif ($val < $op2[$key]) {
            return -1;
        } elseif ($val > $op2[$key]) {
            return 1;
        }
    }
    return 0; // $op1 == $op2
}

//错误控制
//PHP 支持一个错误控制运算符：@。当将其放置在一个 PHP 表达式之前，该表达式可能产生的任何错误信息都被忽略掉。 






















