<?php
/*
PHP���ṩ��"����"��overloading����ָ��̬��"����"�����Ժͷ�����������ͨ��ħ��������magic methods����ʵ�ֵġ� 
�����õ�ǰ������δ����򲻿ɼ��������Ի򷽷�ʱ�����ط����ᱻ���á����ں��潫ʹ��"���ɷ������ԣ�inaccessible properties��"��"���ɷ��ʷ�����inaccessible methods��"���ƺ���Щδ����򲻿ɼ��������Ի򷽷��� 
���е����ط��������뱻����Ϊ public�� 
ħ�������Ĳ���������ͨ�����ô��ݡ� 
*/

/*
�������� 

public void __set ( string $name , mixed $value )

public mixed __get ( string $name )

public bool __isset ( string $name )

public void __unset ( string $name )

�ڸ����ɷ������Ը�ֵʱ��__set() �ᱻ���á� 

��ȡ���ɷ������Ե�ֵʱ��__get() �ᱻ���á� 

���Բ��ɷ������Ե��� isset() �� empty() ʱ��__isset() �ᱻ���á� 

���Բ��ɷ������Ե��� unset() ʱ��__unset() �ᱻ���á� 

���� $name ��ָҪ�����ı������ơ�__set() ������ $value ����ָ���� $name ������ֵ�� 

��������ֻ���ڶ����н��С��ھ�̬�����У���Щħ�����������ᱻ���á�������Щ���������ܱ� ����Ϊ static���� PHP 5.3.0 ��, ����Щħ����������Ϊ static �����һ�����档 

*/




/*
�������� 

public mixed __call ( string $name , array $arguments )

public static mixed __callStatic ( string $name , array $arguments )

�ڶ����е���һ�����ɷ��ʷ���ʱ��__call() �ᱻ���á� 

�þ�̬��ʽ�е���һ�����ɷ��ʷ���ʱ��__callStatic() �ᱻ���á� 

$name ������Ҫ���õķ������ơ�$arguments ������һ��ö�����飬������Ҫ���ݸ����� $name �Ĳ����� 
*/


/*ħ������

__construct()�� __destruct()�� __call()�� __callStatic()�� __get()�� __set()�� __isset()�� __unset()�� __sleep()�� __wakeup()�� __toString()�� __invoke()�� __set_state()�� __clone() �� __debugInfo() �ȷ����� PHP �б���Ϊ"ħ������"��Magic methods�����������Լ����෽��ʱ����ʹ����Щ����������������ʹ����ħ�����ܡ� 
*/






