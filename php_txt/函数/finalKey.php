<?php

/*
��������еķ���������Ϊ final���������޷����Ǹ÷��������һ���౻����Ϊ final�����ܱ��̳С�
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
   
   // �����������Ƿ񽫷�������Ϊfinal����û�й�ϵ
   final public function moreTesting() {
       echo "BaseClass1::moreTesting() called\n";
   }
}

class ChildClass extends BaseClass1 {
}
// ���� Fatal error: Class ChildClass may not inherit from final class (BaseClass1)

//���Բ��ܱ�����Ϊ final��ֻ����ͷ������ܱ�����Ϊ final�� 