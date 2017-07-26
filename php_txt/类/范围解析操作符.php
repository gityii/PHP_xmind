<?php

//范围解析操作符 （::）
/*
->，这个符号用来在对象中访问它们自己的成员。（注意和this上使用的区别）
::，这个符号用于在类中（而不是对象）访问成员。
使用方式如下：
ClassName::methodName();
ClassName::propertyName;

这种结构在两个地方可能被用到：
1、在使用类的时候，在父类和子类具有相同名称的属性和方法时，利用它可以避免混淆。
2、在类外的时候，在没有创建对象的情况下使用该操作符访问类的成员。

在类外，需要指定类名，如上面的ClassName；
在类中，需要使用一个特别关键字，正如可以在一个类中使用$this来引用当前对象的实例，关键字self被用来作为当前类的一个引用。

要引用父类中的一个成员，可以使用关键字parent和范围解析操作符来引用。

范围解析操作符（也可称作PaamayimNekudotayim）或者更简单地说是一对冒号，可以用于访问静态成员，类常量，还可以用于覆盖类中的属性和方法。
在没声明任何实例的情况下访问类中的函数或者基类中的函数和变量很用处。而 :: 运算符即用于此情况。
当在类定义之外引用到这些项目时，要使用类名。 
可以通过变量来引用类，该变量的值不能是关键字（如 self，parent 和 static）。 
*/

class SomeClass{
	function __construct{
		self::doThis();
	}
	
	protected function doThis(){
		echo 'done!';
	}
}

class SomeOtherClass extends someClass{
	function __construct{
	    parent::doThis()
    }		
}

/*在多数情况下，我们使用范围解析操作符是为了访问被重写的方法，也可以用其访问静态和常数成员*/




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
