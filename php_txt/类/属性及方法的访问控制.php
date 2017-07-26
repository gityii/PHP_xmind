<?php

//访问控制
/*
对类的属性或方法的访问控制，是通过在前面添加关键字public（公有），protected（受保护）或private（私有）来实现的。
类的受保护的（protected）成员只能在类本身以及子类中访问，这意味着即便在Pet中将$name属性的可见性设置为protected，依然可以在Dog或者Cat类中访问到这个方法，但是不能通过这些类的一个实例对象直接访问。
私有（private）的限制是最严格的，这些成员只能在声明它们的类中进行访问，私有的类成员不能被子类或者这些类的一个对象实例访问到。如果在Pet类中设置$name属性的可见性为私有的，我们就只能在Pet类定义中引用它，也就是
在类的某一个方法中使用。

private   --> 仅该类
portected --> 该类和派生类
public    --> 任何类或者PHP代码
 
被定义为公有的类成员可以在任何地方被访问。被定义为受保护的类成员则可以被其自身以及其子类和父类访问。被定义为私有的类成员则只能被其定义所在的类访问。 
*/
//类属性必须定义为公有，受保护，私有之一。如果用 var 定义，则被视为公有。 

/**
 * Define MyClass
 */
class Test{
	public $public = 'public';
	protected $protected = 'protected';
	private $_private = 'private'; //私有的变量名通常以一个下划线开始。
}
 /*********************************************************************/
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

