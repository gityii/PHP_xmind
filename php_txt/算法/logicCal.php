<?php
/*

����  ����   ���

$a and $b And���߼��룩 TRUE����� $a �� $b ��Ϊ TRUE�� 
$a or $b Or���߼��� TRUE����� $a �� $b ��һΪ TRUE�� 
$a xor $b Xor���߼���� TRUE����� $a �� $b ��һΪ TRUE������ͬʱ�ǡ� 
! $a Not���߼��ǣ� TRUE����� $a ��Ϊ TRUE�� 
$a && $b And���߼��룩 TRUE����� $a �� $b ��Ϊ TRUE�� 
$a || $b Or���߼��� TRUE����� $a �� $b ��һΪ TRUE�� 

*/
// foo() ����û���ᱻ���ã��������"��·"��

$a = (false && foo());
$b = (true  || foo());
$c = (false and foo());
$d = (true  or  foo());

// --------------------
// "||" �� "or" �����ȼ���

// ���ʽ (false || true) �Ľ�������� $e
// ��ͬ�ڣ�($e = (false || true))
$e = false || true;

// ���� false ������ $f��true ������
// ��ͬ�ڣ�(($f = false) or true)
$f = false or true;

var_dump($e, $f);

// --------------------
// "&&" �� "and" �����ȼ���

// ���ʽ (true && false) �Ľ�������� $g
// ��ͬ�ڣ�($g = (true && false))
$g = true && false;

// ���� true ������ $h��false ������
// ��ͬ�ڣ�(($h = true) and false)
$h = true and false;

var_dump($g, $h);