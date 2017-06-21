<?php
/*
每个类的定义都以关键字 class 开头，后面跟着类名，后面跟着一对花括号，里面包含有类的属性与方法的定义。 
类名可以是任何非PHP保留字的合法标签。一个合法类名以字母或下划线开头，后面跟着若干字母，数字或下划线。以正则表达式表示为：[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*。
一个类可以包含有属于自己的常量，变量（称为"属性"）以及函数（称为"方法"）。 
*/

class SimpleClass
{
    // property declaration
    public $var = 'a default value';

    // method declaration
    public function displayVar() {
        echo $this->var;
    }
}

/*成员属性可以是基本数据类型（整数、字符、布尔），也可是复合数据类型（数组、对象）
如果给一个函数传递一个对象，实际上传递的是一个地址
*/



/*new  =================================================
要创建一个类的实例，必须使用new关键字。当创建新对象时该对象总是被赋值，除非该对象定义了构造函数并且在出错时抛出了一个异常。类应在被实例化之前定义（某些情况下则必须这样）。 
如果在 new之后跟着的是一个包含有类名的字符串，则该类的一个实例被创建。如果该类属于一个名字空间，则必须使用其完整名称。 
*/
/*
$instance = new SimpleClass();

// 也可以这样做：
$className = 'Foo';
$instance = new $className(); // Foo()
*/
/*
当把一个对象已经创建的实例赋给一个新变量时，新变量会访问同一个实例，就和用该对象赋值一样。此行为和给函数传递入实例时一样。
*/

class Test
{
    static public function getNew()
    {
        return new static;
    }
}

class Child extends Test
{}

$obj1 = new Test();
$obj2 = new $obj1;
var_dump($obj1 !== $obj2);

$obj3 = Test::getNew();
var_dump($obj3 instanceof Test);

$obj4 = Child::getNew();
var_dump($obj4 instanceof Child);


/*extends ================================================
一个类可以在声明中用 extends 关键字继承另一个类的方法和属性。PHP不支持多重继承，一个类只能继承一个基类。
被继承的方法和属性可以通过用同样的名字重新声明被覆盖。但是如果父类定义方法时使用了 final，则该方法不可被覆盖。可以通过 parent:: 来访问被覆盖的方法或属性。 
*/

class ExtendClass extends SimpleClass
{
    // Redefine the parent method
    function displayVar()
    {
        echo "Extending class\n";
        parent::displayVar();
    }
}

$extended = new ExtendClass();
$extended->displayVar();


/* ::class  =======================================================
关键词 class 也可用于类名的解析。使用 ClassName::class 你可以获取一个字符串，包含了类 ClassName 的完全限定名称。这对使用了 命名空间 的类尤其有用。 
*/
/*
namespace NS {
    class ClassName {
    }
    
    echo ClassName::class;
}
*/
// 以上例程会输出 NS\ClassName



/*属性     ========================================================
类的变量成员叫做"属性"，属性声明是由关键字 public，protected 或者 private 开头，然后跟一个普通的变量声明来组成。
属性中的变量可以初始化，但是初始化的值必须是常数
*/

/*在类的成员方法里面，可以用 ->（对象运算符）：$this->property（其中 property 是该属性名）这种方式来访问非静态属性。静态属性则是用 ::（双冒号）：self::$property 来访问。*/


/*this 伪变量
当一个方法在类定义内部被调用时，有一个可用的伪变量 $this。$this 是一个到主叫对象的引用 	
this 本质可以理解就是这个对象的地址
哪个对象使用到this，就是哪个对象的地址
this不能在类外部使用
方法之间可以互相调用，但需要使用$this引用
如果要访问protected变量或者private变量，通常的做法是提供public函数去访问，形式如下：
public function setXXX($val){

}
public function getXXX($val){

}


*/

/*
heredoc结构
*/

//范围解析操作符 （::）====================================== 
/*
范围解析操作符（也可称作PaamayimNekudotayim）或者更简单地说是一对冒号，可以用于访问静态成员，类常量，还可以用于覆盖类中的属性和方法。
在没声明任何实例的情况下访问类中的函数或者基类中的函数和变量很用处。而 :: 运算符即用于此情况。
当在类定义之外引用到这些项目时，要使用类名。 
可以通过变量来引用类，该变量的值不能是关键字（如 self，parent 和 static）。 
*/
echo '<br/>';
//在类的外部使用 :: 操作符
class MyClass {
    const CONST_VALUE = 'A constant value';
}

$classname = 'MyClass';
echo $classname::CONST_VALUE; // 自 PHP 5.3.0 起，访问静态成员

echo MyClass::CONST_VALUE;


/*不要用代码中基类文字上的名字，应该用特殊的名字 parent，它指的就是派生类在 extends 声明中所指的基类的名字。这样做可以避免在多个地方使用基类的名字。如果继承树在实现的过程中要修改，只要简单地修改类中 extends 声明的部分。
*/ 

class A {
function example() {
echo "I am A::example() and provide basic functionality.<br />\n";
}
}

class B extends A {
function example() {
echo "I am B::example() and provide additional functionality.<br />\n";
parent::example();
}
}

$b = new B;

// 这将调用 B::example()，而它会去调用 A::example()。
$b->example();

//self，parent 和 static 这三个特殊的关键字是用于在类定义的内部对其属性或方法进行访问的。 

//在类定义内部使用 ::
class OtherClass extends MyClass
{
    public static $my_static = 'static var';

    public static function doubleColon() {
        echo parent::CONST_VALUE . "\n";
        echo self::$my_static . "\n";
    }
}

$classname = 'OtherClass';
echo $classname::doubleColon(); // 自 PHP 5.3.0 起

OtherClass::doubleColon();

/*
当一个子类覆盖其父类中的方法时，PHP不会调用父类中已被覆盖的方法。是否调用父类的方法取决于子类。这种机制也作用于构造函数和析构函数，重载以及魔术方法。 
*/
echo '<br/>';
class MyClass1
{
    protected function myFunc() {
        echo "MyClass1::myFunc()\n";
    }
}

class OtherClass1 extends MyClass1
{
    // 覆盖了父类的定义
    public function myFunc()
    {
        // 但还是可以调用父类中被覆盖的方法
        parent::myFunc();
        echo "OtherClass1::myFunc()\n";
    }
}

$class = new OtherClass1();
$class->myFunc();

//访问控制
/*
对属性或方法的访问控制，是通过在前面添加关键字 public（公有），protected（受保护）或 private（私有）来实现的。被定义为公有的类成员可以在任何地方被访问。被定义为受保护的类成员则可以被其自身以及其子类和父类访问。被定义为私有的类成员则只能被其定义所在的类访问。 
*/
//类属性必须定义为公有，受保护，私有之一。如果用 var 定义，则被视为公有。 

/**
 * Define MyClass
 */
class MyClass_1
{
    public $public = 'Public';
    protected $protected = 'Protected';
    private $private = 'Private';

    function printHello()
    {
        echo $this->public;
        echo $this->protected;
        echo $this->private;
    }
}

$obj = new MyClass_1();
echo $obj->public; // 这行能被正常执行
//echo $obj->protected; // 这行会产生一个致命错误
//echo $obj->private; // 这行也会产生一个致命错误
$obj->printHello(); // 输出 Public、Protected 和 Private

class MyClass2 extends MyClass_1
{
    // 可以对 public 和 protected 进行重定义，但 private 而不能
    protected $protected = 'Protected2';

    function printHello()
    {
        echo $this->public;
        echo $this->protected;
        //echo $this->private;// 未定义 private
    }
}

$obj2 = new MyClass2();
echo $obj2->public; // 这行能被正常执行
//echo $obj2->private; // 未定义 private
//echo $obj2->protected; // 这行会产生一个致命错误
$obj2->printHello(); // 输出 Public、Protected2 和 Undefined


//方法的访问控制，类中的方法可以被定义为公有，私有或受保护。如果没有设置这些关键字，则该方法默认为公有。
class MyClassFun
{
    // 声明一个公有的构造函数
    public function __construct() { }

    // 声明一个公有的方法
    public function MyPublic() { }

    // 声明一个受保护的方法
    protected function MyProtected() { }

    // 声明一个私有的方法
    private function MyPrivate() { }

    // 此方法为公有
    function Foo()
    {
        $this->MyPublic();
        $this->MyProtected();
        $this->MyPrivate();
    }
}

$myclass = new MyClassFun;
$myclass->MyPublic(); // 这行能被正常执行
//$myclass->MyProtected(); // 这行会产生一个致命错误
//$myclass->MyPrivate(); // 这行会产生一个致命错误
$myclass->Foo(); // 公有，受保护，私有都可以执行


class MyClass_2 extends MyClassFun
{
    // 此方法为公有
    function Foo2()
    {
        $this->MyPublic();
        $this->MyProtected();
        $this->MyPrivate(); // 这行会产生一个致命错误
    }
}

$myclass2 = new MyClass_2;
$myclass2->MyPublic(); // 这行能被正常执行
$myclass2->Foo2(); // 公有的和受保护的都可执行，但私有的不行



//其它对象的访问控制 
//同一个类的对象即使不是同一个实例也可以互相访问对方的私有与受保护成员。这是由于在这些对象的内部具体实现的细节都是已///知的。
class Test
{
    private $foo;

    public function __construct($foo)
    {
        $this->foo = $foo;
    }

    private function bar()
    {
        echo 'Accessed the private method.';
    }

    public function baz(Test $other)
    {
        // We can change the private property:
        $other->foo = 'hello';
        var_dump($other->foo);

        // We can also call the private method:
        $other->bar();
    }
}

$test = new Test('test');

$test->baz(new Test('other'));


/*对象继承 =====================================
当扩展一个类，子类就会继承父类所有公有的和受保护的方法。除非子类覆盖了父类的方法，被继承的方法都会保留其原有功能。 
除非使用了自动加载，否则一个类必须在使用之前被定义。如果一个类扩展了另一个，则父类必须在子类之前被声明。此规则适用于类继承其它类与接口。 
所谓继承就是一个子类通过extend 父类，把父类的（public/protected）属性和（public/protected）方法继承下来
父类的public/protected的属性和方法被继承，private的属性和方法没有被继承
一个类只能继承一个父类，（直接继承），如果你希望继承多个类的属性和方法，则使用多层继承
当创建子类对象的时候，默认情况下，不会自动调用父类的构造方法，如果希望去调用父类的构造方法，或其他的方法（public/protected）,可以这样处理:   类名::方法名()   parent::方法名()
*/
class foo
{
    public function printItem($string) 
    {
        echo 'Foo: ' . $string . PHP_EOL;
    }
    
    public function printPHP()
    {
        echo 'PHP is great.' . PHP_EOL;
    }
}

class bar extends foo
{
    public function printItem($string)
    {
        echo 'Bar: ' . $string . PHP_EOL;
    }
}

$foo = new foo();
$bar = new bar();
$foo->printItem('baz'); // Output: 'Foo: baz'
$foo->printPHP();       // Output: 'PHP is great' 
$bar->printItem('baz'); // Output: 'Bar: baz'
$bar->printPHP();       // Output: 'PHP is great'


/*Static（静态）关键字 ====================================
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




