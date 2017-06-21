<?php

/*void __destruct ( void )
析构函数会在到某个对象的所有引用都被删除或者当对象被显式销毁时执行。
和构造函数一样，父类的析构函数不会被引擎暗中调用。要执行父类的析构函数，必须在子类的析构函数体中显式调用 parent::__destruct()。此外也和构造函数一样，子类如果自己没有定义析构函数则会继承父类的。
析构方法的作用主要用于，释放资源（比如释放数据库的链接，图片资源、销毁某个对象）
*/



class MyDestructableClass {
   function __construct() {
       print "In constructor\n";
       $this->name = "MyDestructableClass";
   }

   function __destruct() {
       print "Destroying " . $this->name . "\n";
   }
}

$obj = new MyDestructableClass();

/*
析构方法会自动调用
析构方法主要用于销毁资源
析构方法调用的顺序是，先创建的对象后被销毁
当程序（进程结束）退出时
当一个对象称为垃圾对象的时候，该对象的析构方法也会被调用
所谓垃圾对象，就是指没有任何变量再引用它
一旦一个对象称为垃圾对象，析构方法就会立即调用
一个类最多只有一个析构方法
*/


