<?php
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


