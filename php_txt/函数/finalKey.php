<?php

/*
如果父类中的方法被声明为 final，则子类无法覆盖该方法。如果一个类被声明为 final，则不能被继承。
*/


class BaseClass {
   public function test() {
       echo "BaseClass::test() called\n";
   }
   
   final public function moreTesting() {
       echo "BaseClass::moreTesting() called\n";
   }
}

class ChildClass extends BaseClass {
   public function moreTesting() {
       echo "ChildClass::moreTesting() called\n";
   }
}
// Results in Fatal error: Cannot override final method BaseClass::moreTesting()


final class BaseClass1 {
   public function test() {
       echo "BaseClass1::test() called\n";
   }
   
   // 这里无论你是否将方法声明为final，都没有关系
   final public function moreTesting() {
       echo "BaseClass1::moreTesting() called\n";
   }
}

class ChildClass extends BaseClass1 {
}
// 产生 Fatal error: Class ChildClass may not inherit from final class (BaseClass1)

//属性不能被定义为 final，只有类和方法才能被定义为 final。 