<?php
//void __construct ([ mixed $args [, $... ]] )
/*
PHP5允行开发者在一个类中定义一个方法作为构造函数。具有构造函数的类会在每次创建新对象时先调用此方法，所以非常适合在使用对象之前做一些初始化工作。
*/
/*
如果子类要执行父类的构造函数，需要在子类的构造函数中调用parent::__construct()。如果子类没有定义构造函数则会如同一个普通的类方法一样从父类继承（假如没有被定义为 private 的话）。	
*/
class BaseClass {
   function __construct() {
       print "In BaseClass constructor\n";
   }
}

class SubClass extends BaseClass {
   function __construct() {
       parent::__construct();
       print "In SubClass constructor\n";
   }
}

class OtherSubClass extends BaseClass {
    // inherits BaseClass's constructor
}

// In BaseClass constructor
$obj = new BaseClass();

// In BaseClass constructor
// In SubClass constructor
$obj = new SubClass();

// In BaseClass constructor
$obj = new OtherSubClass();


/*
一个类可以同时有两种形式的构造方法
__construct()和类名()，当两个同时存在的时候，优先调用__construct()
构造方法没有返回值
主要作用是完成对新对象的初始化，并不是创建对象本身
在创建新对象后，系统自动的调用该类的构造方法
一个类有且只有一个构造方法
构造方法的默认访问修饰符是public
*/








	