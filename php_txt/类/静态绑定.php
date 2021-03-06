﻿<?php

/*
后期静态绑定的功能，用于在继承范围内引用静态调用的类。 
========================================================================================
从这个名字的定义提取出两个关键点，第一点静态，也就是说这个功能只适用于静态属性或静态方法。
第二点延迟绑定，这个根据下面代码就可以很好的理解
*/
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

/*
我在printName函数里面使用了self关键字，self是指向当前类的"指针"，
所以很多人会理想的认为输出结果会是这样：

// Join
// B Class

是这样的，在定义A类的是时候，在函数printName里面使用self关键字调用了静态方法或属性，
但是这个函数一旦定义好，A类的静态方法和属性就被绑定到函数了，不要去追究为什么，php就是这么实现的，
但是我们现在要实现这样的效果，就是函数定义好后里面使用到的静态方法和属性不要立即绑定死，
而是根据最终继承的类来确定绑定。
所以php在5.5以后使用了static关键字来解决这个问题，解决后的代码例子如下：
*/
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
/*
====================================================================================

static:: 


static 关键字，这里作为作用域引用。类似于parent, self等关键字。与parent和self不同的是，parent 引用的是父类作用域，self引用的是当前类的作用域，而static引用的是全部静态作用域，子类会覆盖父类，考虑下面的例子：
*/
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










