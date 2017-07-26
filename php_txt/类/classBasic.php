<?php
/*
每个类的定义都以关键字 class 开头，后面跟着类名，后面跟着一对花括号，里面包含有类的属性与方法的定义。 
类名可以是任何非PHP保留字的合法标签。一个合法类名以字母或下划线开头，后面跟着若干字母，数字或下划线。以正则表达式表示为：[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*。
一个类可以包含有属于自己的常量，变量（称为"属性"）以及函数（称为"方法"）。 
类名是不区分大小写的；像其他变量一样，对象名是区分大小写的。
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





/*
heredoc结构
*/

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




