<?php

/*
һЩ������ call_user_func() �� usort() ���Խ����û��Զ���Ļص�������Ϊ�������ص�������ֹ�����Ǽ򵥺������������Ƕ���ķ�����������̬�෽����

PHP�ǽ�������string��ʽ���ݵġ� ����ʹ���κ����û��û��Զ��庯�������������Խṹ���磺array()��echo��empty()��eval()��exit()��isset()��list()��print �� unset()��

��̬�෽��Ҳ�ɲ���ʵ��������Ķ�������ݣ�ֻҪ���±� 0 �а������������Ƕ����� PHP 5.2.3 ��Ҳ���Դ��� 'ClassName::methodName'��

������ͨ���û��Զ��庯���⣬Ҳ�ɴ��� �������� ���ص�������
*/


//call_user_func �� �ѵ�һ��������Ϊ�ص���������,��һ������ callback �Ǳ����õĻص���������������ǻص������Ĳ����� 
//����call_user_func()�Ĳ�������Ϊ���ô���
error_reporting(E_ALL);


function increment(&$var)
{
    $var++;
}

$a = 0;
call_user_func('increment', $a);
echo $a."\n";

call_user_func_array('increment', array(&$a)); // You can use this instead before PHP 5.3
echo $a."\n";


//һ����ʵ�����Ķ���ķ�������Ϊ���鴫�ݣ��±� 0 �����ö����±� 1 ������������ 

//һ����ʵ������ object �ķ�������Ϊ array ���ݣ��±� 0 ������ object���±� 1 ������������ ��ͬһ��������Է��� protected �� private ������



// An example callback function
function my_callback_function() {
    echo 'hello world!';
}

// An example callback method
class MyClass {
    static function myCallbackMethod() {
        echo 'Hello World!';
    }
}

// Type 1: Simple callback
call_user_func('my_callback_function'); 

// Type 2: Static class method call
call_user_func(array('MyClass', 'myCallbackMethod')); 

// Type 3: Object method call
$obj = new MyClass();
call_user_func(array($obj, 'myCallbackMethod'));

// Type 4: Static class method call (As of PHP 5.2.3)
call_user_func('MyClass::myCallbackMethod');

// Type 5: Relative static class method call (As of PHP 5.3.0)
class A {
    public static function who() {
        echo "A\n";
    }
}

class B extends A {
    public static function who() {
        echo "B\n";
    }
}

call_user_func(array('B', 'parent::who')); // A

// Type 6: Objects implementing __invoke can be used as callables (since PHP 5.3)
class C {
    public function __invoke($name) {
        echo 'Hello ', $name, "\n";
    }
}

$c = new C();
call_user_func($c, 'PHP!');
?>




