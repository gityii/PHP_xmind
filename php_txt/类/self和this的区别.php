<?php
/*
在一个类的方法（函数）的上下文中，静态变量和函数被访问使用self::，
在一个类的对象（实例）的上下文中使用其他方法和变量时用this。（非静态）
self和this的区别首先是静态上的区别
比较表
							self 			this
能在静态函数里使用 			是 				否
可访问的类变量和方法由 		self:: 			$this-> (注意：PHP > 5.3 允许由 $this 使用静态变量，用 $this::$foo。 $this->foo 将仍然没有被定义，如果 $foo 是一个静态变量.)
需要一个实例对象 			否 				是

*/

class exampleClass
{
    public static $foo;
    public $bar;
	
    public function regularFunction() 
	{ 
	    echo $this->bar; 
	}
    public static function staticFunction() 
	{ 
	    echo self::$foo; 
	}
	
    public static function anotherStatFn() 
	{ 
	    self::staticFunction(); 
	}
	
    public function regularFnUsingStaticVar() 
	{ 
	    echo self::$foo; 
	}
    
    // 注: PHP 5.3 使用 $this::$bar 代替 self::$bar 是允许的
}
exampleClass::$foo = "Hello";
$obj = new exampleClass();
$obj->bar = "World!";
exampleClass::staticFunction(); /* 打印 Hello */
$obj->regularFunction(); /* 打印 World! */

/*
静态函数只能使用静态变量，静态函数和变量的引用是通过 self::函数名() 和 self::变量名。
上述实例中，静态变量的引用是由类名(exampleClass::$foo)，或者 self:: (self::$foo)，当在这个类的静态方法[称为 静态函数()]里使用时。

类的正则函数和变量需要一个对象上下文来引用，他们不能脱离对象上下文而存在。对象上下文由 $this 提供。在上述函数中，$bar 是一个正则变量，所以它被 $obj->bar(上下文使用变量obj) 来引用，或者使用 $this->bar(再次在一个对象的方法里在一个对象上下文中) 来引用。

self 不使用前面的 $，因为 self 不意味着是一个变量而是类结构本身。而 $this 引用一个特定的变量，所以有前面的 $ 。
 
*/
 
 /*
声明类属性或方法为静态，就可以不实例化类而直接访问。静态属性不能通过一个类已实例化的对象来访问（但静态方法可以）。
由于静态方法不需要通过对象即可调用，所以伪变量 $this 在静态方法中不可用。静态属性不可以由对象通过 -> 操作符来访问。
 
就像其它所有的 PHP 静态变量一样，静态属性只能被初始化为文字或常量，不能使用表达式。所以可以把静态属性初始化为整数或数组，但不能初始化为另一个变量或函数返回值，也不能指向一个对象。

self被用来作为当前类的一个引用。

 */
 
 
 
 
 
 
 
 
 

 
 
 
 
 
 
 
 
 
 
