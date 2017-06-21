<?php
/*
函数名和PHP中的其它标识符命名规则相同。有效的函数名以字母或下划线打头，后面跟字母，数字或下划线。可以用正则表达式表示为：[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*。 
*/

/*
函数无需在调用之前被定义，除非是下面两个例子中函数是有条件被定义时。 
当一个函数是有条件被定义时，必须在调用函数之前定义。 
*/

$makefoo = true;

/* 不能在此处调用foo()函数，
   因为它还不存在，但可以调用bar()函数。*/

bar();

if ($makefoo) {
  function foo()
  {
    echo "I don't exist until program execution reaches me.\n";
  }
}

/* 现在可以安全调用函数 foo()了，
   因为 $makefoo 值为真 */

if ($makefoo) foo();

function bar()
{
  echo "I exist immediately upon program start.\n";
}

/*
PHP 中的所有函数和类都具有全局作用域，可以定义在一个函数之内而在之外调用，反之亦然。 
PHP 不支持函数重载，也不可能取消定义或者重定义已声明的函数。 
函数名是大小写无关的，不过在调用函数的时候，使用其在定义时相同的形式是个好习惯。 
*/
//在 PHP 中可以调用递归函数。 


//函数的参数 
/*PHP 支持按值传递参数（默认），通过引用传递参数以及默认参数。也支持可变长度参数列表。*/
//向函数传递数组
function takes_array($input)
{
    echo "$input[0] + $input[1] = ", $input[0]+$input[1];
}
//通过引用传递参数 
function add_some_extra(&$string)
{
    $string .= 'and something extra.';
}
$str = 'This is a string, ';
add_some_extra($str);
echo $str;    // outputs 'This is a string, and something extra.'
 
//在函数中使用默认参数,默认值必须是常量表达式，不能是诸如变量，类成员，或者函数调用等。 
function makecoffee($type = "cappuccino")
{
    return "Making a cup of $type.\n";
}
echo makecoffee();
echo makecoffee(null);
echo makecoffee("espresso");

//注意当使用默认参数时，任何默认参数必须放在任何非默认参数的右侧；否则，函数将不会按照预期的情况工作。
function makeyogurt($flavour, $type = "acidophilus")
{
    return "Making a bowl of $type $flavour.\n";
}
echo makeyogurt("raspberry");   // works as expected



//可变数量的参数列表 
//由 ... 语法实现
function sum(...$numbers) {
    $acc = 0;
    foreach ($numbers as $n) {
        $acc += $n;
    }
    return $acc;
}

echo sum(1, 2, 3, 4);



//返回值 
/*可以返回包括数组和对象的任意类型。返回语句会立即中止函数的运行，并且将控制权交回调用该函数的代码行。更多信息见 return
函数不能返回多个值，但可以通过返回一个数组来得到类似的效果。 

*/

//从函数返回一个引用，必须在函数声明和指派返回值给一个变量时都使用引用运算符 &： 


function &returns_reference()
{
    return $someref;
}

$newref =& returns_reference();
	
//可变函数
/*
PHP 支持可变函数的概念。这意味着如果一个变量名后有圆括号，PHP 将寻找与变量的值同名的函数，并且尝试执行它。可变函数可以用来实现包括回调函数，函数表在内的一些用途。 
可变函数不能用于例如 echo，print，unset()，isset()，empty()，include，require 以及类似的语言结构。需要使用自己的包装函数来将这些结构用作可变函数。 
*/
function foo() {
    echo "In foo()<br />\n";
}

function bar($arg = '') {
    echo "In bar(); argument was '$arg'.<br />\n";
}

// 使用 echo 的包装函数
function echoit($string)
{
    echo $string;
}

$func = 'foo';
$func();        // This calls foo()

$func = 'bar';
$func('test');  // This calls bar()

$func = 'echoit';
$func('test');  // This calls echoit()



//也可以用可变函数的语法来调用一个对象的方法。 

class Foo
{
    function Variable()
    {
        $name = 'Bar';
        $this->$name(); // This calls the Bar() method
    }

    function Bar()
    {
        echo "This is Bar";
    }
}

$foo = new Foo();
$funcname = "Variable";
$foo->$funcname();   // This calls $foo->Variable()

//当调用静态方法时，函数调用要比静态属性优先： 
class Foo
{
    static $variable = 'static property';
    static function Variable()
    {
        echo 'Method Variable called';
    }
}

echo Foo::$variable; // This prints 'static property'. It does need a $variable in this scope.
$variable = "Variable";
Foo::$variable();  // This calls $foo->Variable() reading $variable in this scope.

//内部（内置）函数 
//调用 phpinfo() 或者 get_loaded_extensions() 可以得知 PHP 加载了那些扩展库。
//PHP 手册按照不同的扩展库组织了它们的文档。


//匿名函数 
/*
匿名函数（Anonymousfunctions），也叫闭包函数（closures），允许临时创建一个没有指定名称的函数。最经常用作回调函数（callback）参数的值。当然，也有其它应用的情况。 
*/

//闭包函数也可以作为变量的值来使用。

$greet = function($name)
{
    printf("Hello %s\r\n", $name);
};

$greet('World');
$greet('PHP');






