<?php

/*
类里的静态属性相当于函数中的静态变量，对于类的静态成员来说，其概念和函数的静态变量基本一致。
*/

/*
class SomeClass{
	const PI = 3.14;
}

类常数和静态属性是一样的，它能够被类（或其子类）的全部实例访问。常数不能通过对象进行访问，但是可以在任何地方使用ClassName::CONSTANT_NAME（即SomeClass::PI）,
也可以在类的方法中使用self::CONSTANT_NAME
*/

/*
静态属性和标准属性的区别在于不能在类里用$this访问它们，而是应该使用self后跟范围解析操作符::，后面是带$符号的变量名
范围解析操作符用来引用类的成员。
静态属性和静态方法有时候也被叫做类属性和类方法，表示它们可以通过引用类本身来访问，而不是通过一个对象访问。
*/
class SomeClass{
    public static $counter = 0;
	
	function __construct(){
		self::$counter;
	}

}	