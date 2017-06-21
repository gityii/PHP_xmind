<?php
//void __construct ([ mixed $args [, $... ]] )
/*
PHP5���п�������һ�����ж���һ��������Ϊ���캯�������й��캯���������ÿ�δ����¶���ʱ�ȵ��ô˷��������Էǳ��ʺ���ʹ�ö���֮ǰ��һЩ��ʼ��������
*/
/*
�������Ҫִ�и���Ĺ��캯������Ҫ������Ĺ��캯���е���parent::__construct()���������û�ж��幹�캯�������ͬһ����ͨ���෽��һ���Ӹ���̳У�����û�б�����Ϊ private �Ļ�����	
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
һ�������ͬʱ��������ʽ�Ĺ��췽��
__construct()������()��������ͬʱ���ڵ�ʱ�����ȵ���__construct()
���췽��û�з���ֵ
��Ҫ��������ɶ��¶���ĳ�ʼ���������Ǵ���������
�ڴ����¶����ϵͳ�Զ��ĵ��ø���Ĺ��췽��
һ��������ֻ��һ�����췽��
���췽����Ĭ�Ϸ������η���public
*/








	