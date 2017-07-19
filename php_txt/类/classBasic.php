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




