<?php
/*Static（静态）关键字 ===

递归函数或者只使用在函数内部的变量，考虑使用静态变量
本页说明了用 static 关键字来定义静态方法和属性。static 也可用于定义静态变量以及后期静态绑定
声明类属性或方法为静态，就可以不实例化类而直接访问。静态属性不能通过一个类已实例化的对象来访问（但静态方法可以）。
由于静态方法不需要通过对象即可调用，所以伪变量 $this 在静态方法中不可用。 
静态属性不可以由对象通过 -> 操作符来访问。 
用静态方式调用一个非静态方法会导致一个 E_STRICT 级别的错误。 
*/
/*静态变量 类型说明符是static
1、所有的全局变量都是静态变量，而局部变量只有定义时加上类型修饰符static，才为局部静态变量	
2、函数体内如果在定义静态变量的同时进行了初始化，则以后程序不再进行初始化操作（出现在函数内部的基本类型的的静态变量初始化 语句只有在第一次调用才执行）。而对自动变量赋初值是在函数调用时进行，每调用一次函数重新给一次初值，相当于执行一次赋值语句。
3、静态局部变量的初始化表达式必须是一个常量或者常量表达式。即使局部静态变量定义时没有赋初值，系统会自动赋初值0（对数值型变量）或空字符（对字符变量）；静态变量的初始值为0。而对自动变量auto来说，如果不赋初值则它的值将是个不确定的值。
4、当多次调用一个函数且要求在调用之间保留某些变量的值时，可考虑采用静态局部变量。虽然用全局变量也可以达到上述目的，但全局变量有时会造成意外的副作用（主要是变量的作用域造问题成的），因此仍以采用局部静态变量为宜。
注：局部静态变量占用内存时间较长，并且可读性差，因此，除非必要，尽量避免使用局部静态变量。

静态变量只存在于函数作用域内，也就是说，静态变量只存活在栈中。一般的函数内变量在函数结束后会释放，比如局部变量，但是静态变量却不会。就是说，下次再调用这个函数的时候，该变量的值会保留下来。
::是作用域限定操作符，这里用的是self作用域，而不是$this作用域，$this作用域只表示类的当前实例，self::表示的是类本身。
*/

/*
static global 全局变量============================================================
全局变量(外部变量)的声明之前再冠以static 就构成了静态的全局变量。
全局变量本身就是静态存储方式，静态全局变量当然也是静态存储方式。
这两者在存储方式上并无不同。
这两者的区别虽在于：
1、非静态全局变量的作用域是整个源程序，当一个源程序由多个源文件组成时，非静态的全局变量在各个源文件中都是有效的。
2、静态全局变量则限制了其作用域， 即只在定义该变量的源文件内有效，在同一源程序的其它源文件中不能使用它。


把局部变量改变为静态变量后是改变了它的存储方式，即改变了它的生存期。
把全局变量改变为静态变量后是改变了它的作用域，限制了它的使用范围。static静态变量会被放在程序的全局存储区中（即在程序的全局数据区，而不是在堆栈中分配，所以不会导致堆栈溢出），这样可以在下一次调用的时候还可以保持原来的赋值。这一点是它与堆栈变量和堆变量的区别。

全局静态变量？(很少用)




/*
如果在类中访问静态变量，有两种方法 self::$静态变量名， 类名::$静态变量名
如果在类外访问，有一种方法，类名::$静态变量名
*/


/*
后期静态绑定的功能，用于在继承范围内引用静态调用的类。 
========================================================================================
从这个名字的定义提取出两个关键点，第一点静态，也就是说这个功能只适用于静态属性或静态方法。
第二点延迟绑定，这个根据下面代码就可以很好的理解
class A{
    static $name = "Tom";
    public function printName(){
        echo self::$name."\n";
        self::fun();
    }
    static function fun(){
        echo "A Class\n";
    }
}
class B extends A{
    static $name = "Jon";
    static function fun(){
        echo "B Class\n";
    }
}
$obj = new B();
$obj->printName();
// 输出结果
// Tom
// A Class


我在printName函数里面使用了self关键字，self是指向当前类的"指针"，
所以很多人会理想的认为输出结果会是这样：

// Join
// B Class

是这样的，在定义A类的是时候，在函数printName里面使用self关键字调用了静态方法或属性，
但是这个函数一旦定义好，A类的静态方法和属性就被绑定到函数了，不要去追究为什么，php就是这么实现的，
但是我们现在要实现这样的效果，就是函数定义好后里面使用到的静态方法和属性不要立即绑定死，
而是根据最终继承的类来确定绑定。
所以php在5.5以后使用了static关键字来解决这个问题，解决后的代码例子如下：
class A{
    static $name = "Tom";
    public function printName(){
        echo static::$name."\n";
        static::fun();
    }
    static function fun(){
        echo "A Class\n";
    }
}
class B extends A{
    static $name = "Jon";
    static function fun(){
        echo "B Class\n";
    }
}
$obj = new B();
$obj->printName();
// 输出结果
// Join
// B Class
====================================================================================

static:: 


static 关键字，这里作为作用域引用。类似于parent, self等关键字。与parent和self不同的是，parent 引用的是父类作用域，self引用的是当前类的作用域，而static引用的是全部静态作用域，子类会覆盖父类，考虑下面的例子：
<?php
	class A{
	const C = 'constA';
	const D = 'constC';
	public function m(){
	echo static::C;
	}
    public function n(){
	echo self::D;
	}
}
class B extends A{
	const C = 'constB';
	const D = 'constD';
	}

$b = new B();
$b->m(); //output: constB
$b-n(); //output: constC


*/




//构造函数和析构函数 



/*
类型约束
函数的参数可以指定必须为对象（在函数原型里面指定类的名字），接口，数组（PHP 5.1 起）或者 callable。
如果一个类或接口指定了类型约束，则其所有的子类或实现也都如此。 
类型约束不能用于标量类型如 int 或 string。Traits 也不允许。 
类型约束不只是用在类的成员函数里，也能使用在函数里
*/

//如下面的类
class MyClass2
{
    /**
     * 测试函数
     * 第一个参数必须为 OtherClass 类的一个对象
     */
    public function test(OtherClass $otherclass) {
        echo $otherclass->var;
    }


    /**
     * 另一个测试函数
     * 第一个参数必须为数组 
     */
    public function test_array(array $input_array) {
        print_r($input_array);
    }
}

    /**
     * 第一个参数必须为递归类型
     */
    public function test_interface(Traversable $iterator) {
        echo get_class($iterator);
    }
    
    /**
     * 第一个参数必须为回调类型
     */
    public function test_callable(callable $callback, $data) {
        call_user_func($callback, $data);
    }
}

// OtherClass 类定义
class OtherClass {
    public $var = 'Hello World';
}


/*后期静态绑定 
自 PHP 5.3.0 起，PHP 增加了一个叫做后期静态绑定的功能，用于在继承范围内引用静态调用的类

所谓的"转发调用"（forwarding call）指的是通过以下几种方式进行的静态调用：self::，parent::，static:: 以及 forward_static_call()。可用 get_called_class() 函数来得到被调用的方法所在的类名，static:: 则指出了其范围。 

*/

