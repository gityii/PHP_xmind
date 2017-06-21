<?php
/*
在 PHP中引用意味着用不同的名字访问同一个变量内容。这并不像C的指针：例如你不能对他们做指针运算，他们并不是实际的内存地址
 替代的是，引用是符号表别名。
*/


//PHP 的引用允许用两个变量来指向同一个内容。这意味着 $a 和 $b 指向了同一个变量。 
//$a 和 $b 在这里是完全相同的，这并不是 $a 指向了 $b 或者相反，而是 $a 和 $b 指向了同一个地方。 
$a =& $b;

//如果对一个未定义的变量进行引用赋值、引用参数传递或引用返回，则会自动创建该变量。
function foo(&$var) { }

foo($a); // $a is "created" and assigned to null

$b = array();
foo($b['b']);
var_dump(array_key_exists('b', $b)); // bool(true)

$c = new StdClass;
foo($c->d);
var_dump(property_exists($c, 'd')); // bool(true)

//同样的语法可以用在函数中，它返回引用，以及用在 new 运算符中

$bar =& new fooclass();//new 自动返回引用，因此在此使用 =& 已经过时了并且会产生 E_STRICT 级别的消息。 
$foo =& find_var($bar);

/*
不用 & 运算符导致对象生成了一个拷贝。如果在类中用 $this，它将作用于该类当前的实例。没有用 & 的赋值将拷贝这个实例（例如对象）并且 $this 将作用于这个拷贝上，这并不总是想要的结果。由于性能和内存消耗的问题，通常只想工作在一个实例上面。 

*/

//如果在一个函数内部给一个声明为 global 的变量赋于一个引用，该引用只在函数内部可见。可以通过使用 $GLOBALS //数组避免这一点。 

$var1 = "Example variable";
$var2 = "";

function global_references($use_globals)
{
    global $var1, $var2;
    if (!$use_globals) {
        $var2 =& $var1; // visible only inside the function
    } else {
        $GLOBALS["var2"] =& $var1; // visible also in global context
    }
}

global_references(false);
echo "var2 is set to '$var2'\n"; // var2 is set to ''
global_references(true);
echo "var2 is set to '$var2'\n"; // var2 is set to 'Example variable'

//把 global $var; 当成是 $var =& $GLOBALS['var']; 的简写。从而将其它引用赋给 $var 只改变了本地变量的引用。
//如果在 foreach 语句中给一个具有引用的变量赋值，被引用的对象也被改变。 
$ref = 0;
$row =& $ref;
foreach (array(1, 2, 3) as $row) {
    // do something
}
echo $ref; // 3 - last element of the iterated array


function foo(&$var)//在函数调用时没有引用符号——只有函数定义中有。光是函数定义就足够使参数通过引用来正确传递了
{
    $var++;
}

$a=5;
foo($a);//可以将一个变量通过引用传递给函数，这样该函数就可以修改其参数的值。
 
//将使 $a 变成 6。这是因为在 foo 函数中变量 $var 指向了和 $a 指向的同一个内容。

/*
引用不是指针。这意味着下面的结构不会产生预期的效果： 


<?php
function foo(&$var)
{
    $var =& $GLOBALS["baz"];
}
foo($bar);
?>  

这将使 foo 函数中的 $var 变量在函数调用时和 $bar 绑定在一起，但接着又被重新绑定到了 $GLOBALS["baz"] 上面。不可能通过引用机制将 $bar 在函数调用范围内绑定到别的变量上面，因为在函数 foo 中并没有变量 $bar（它被表示为 $var，但是 $var 只有变量内容而没有调用符号表中的名字到值的绑定）。可以使用引用返回来引用被函数选择的变量。
*/


//任何其它表达式都不能通过引用传递，结果未定义 	


//引用返回


//取消引用，当 unset 一个引用，只是断开了变量名和变量内容之间的绑定。这并不意味着变量内容被销毁了

$a = 1;
$b =& $a;
unset($a);
  
//不会 unset $b，只是 $a。 


//引用定位 
//global 引用 :当用 global $var 声明一个变量时实际上建立了一个到全局变量的引用。也就是说和这样做是相同的： 
$var =& $GLOBALS["var"];


//unset $var 不会 unset 全局变量。 


/*$this 
在一个对象的方法中，$this 永远是调用它的对象的引用。 
*/

