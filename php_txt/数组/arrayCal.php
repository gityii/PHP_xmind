<?php

/*

����  ����   ���
$a+ $b ���� $a �� $b �����ϡ� 
$a == $b ��� ��� $a �� $b ������ͬ�ļ���ֵ����Ϊ TRUE�� 
$a === $b ȫ�� ��� $a �� $b ������ͬ�ļ���ֵ�Բ���˳������Ͷ���ͬ��Ϊ TRUE�� 
$a != $b ���� ��� $a ������ $b ��Ϊ TRUE�� 
$a <> $b ���� ��� $a ������ $b ��Ϊ TRUE�� 
$a !== $b ��ȫ�� ��� $a ��ȫ���� $b ��Ϊ TRUE�� 

*/

//+ ��������ұߵ�����Ԫ�ظ��ӵ���ߵ�������棬���������ж��еļ�������ֻ����������еģ��ұߵı����ԡ� 
$a = array("a" => "apple", "b" => "banana");
$b = array("a" => "pear", "b" => "strawberry", "c" => "cherry");

$c = $a + $b; // Union of $a and $b
echo "Union of \$a and \$b: \n";
var_dump($c);

$c = $b + $a; // Union of $b and $a
echo "Union of \$b and \$a: \n";
var_dump($c);

$a += $b; // Union of $a += $b is $a and $b
echo "Union of \$a += \$b: \n";
var_dump($a);


/*��ֵ����*/



