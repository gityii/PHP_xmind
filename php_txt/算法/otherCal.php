<?php

//ִ������� 

//�������ݼ������ 
/*
PHP ֧�� C ����ǰ���������ݼ�������� 
�������ݼ��������Ӱ�첼��ֵ���ݼ� NULL ֵҲû��Ч�������ǵ��� NULL �Ľ���� 1�� 
*/

/*
�ڴ����ַ���������������ʱ��PHP ��Ϯ�� Perl ��ϰ�ߣ����� C �ġ����磬�� Perl �� $a = 'Z'; $a++; ���� $a ���'AA'������ C �У�a = 'Z'; a++; ���� a ��� '['��'Z' �� ASCII ֵ�� 90��'[' �� ASCII ֵ�� 91����ע���ַ�����ֻ�ܵ��������ܵݼ�������ֻ֧�ִ���ĸ��a-z �� A-Z�����������ݼ������ַ���������Ч��ԭ�ַ���û�б仯�� 
*/


//�ַ�������� 

/*�������ַ�����string�����������һ���������������"."���������������Ҳ������Ӻ���ַ������ڶ��������Ӹ�ֵ�������".="���������ұ߲������ӵ���ߵĲ���֮��*/
$a = "Hello ";
$b = $a . "World!"; // now $b contains "Hello World!"

$a = "Hello ";
$a .= "World!";     // now $a contains "Hello World!"

//���������
//instanceof ����ȷ��һ�� PHP �����Ƿ�����ĳһ�� class ��ʵ��
class MyClass
{
}

class NotMyClass
{
}
$a = new MyClass;

var_dump($a instanceof MyClass);
var_dump($a instanceof NotMyClass);





class ParentClass
{
}

class MyClass extends ParentClass
{
}

$b = new MyClass;

var_dump($b instanceof MyClass);
var_dump($b instanceof ParentClass);



/*
{}�������ô�ã�
*/





