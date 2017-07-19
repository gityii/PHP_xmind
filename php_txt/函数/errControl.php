<?php
//PHP ֧��һ����������������@�������������һ�� PHP ���ʽ֮ǰ���ñ��ʽ���ܲ������κδ�����Ϣ�������Ե��� 
/*
�� set_error_handler() �趨���Զ���Ĵ�����������Ȼ�ᱻ���ã����Ǵ˴����������ԣ�����ҲӦ�ã����� error_reporting()�����ú����ڳ������ǰ�� @ ʱ������ 0�� 	
mixed set_error_handler ( callable $error_handler [, int $error_types = E_ALL | E_STRICT ] )
����һ���û��ĺ���(error_handler)������ű��г��ֵĴ���

*/
/*
��������� track_errors  ���ԣ����ʽ���������κδ�����Ϣ��������ڱ��� $php_errormsg �С��˱�����ÿ�γ���ʱ���ᱻ���ǣ���������������Ļ���Ҫ�����顣 
*/
/* Intentional file error */
$my_file = @file ('non_existent_file') or
    die ("Failed opening file: error was '$php_errormsg'");

// this works for any expression, not just functions:
$value = @$cache[$key];
// will not issue a notice if the index $key doesn't exist.

/*
@ �����ֻ�Ա��ʽ��Ч����������˵һ���򵥵Ĺ�����ǣ�����ܴ�ĳ���õ�ֵ����������ǰ����� @ ����������磬���԰������ڱ�����������include���ã��������ȵ�֮ǰ�����ܰ������ں�������Ķ���֮ǰ��Ҳ�������������ṹ���� if �� foreach �ȡ� 
*/

//error_reporting �� ����Ӧ�ñ������ PHP ����
/*
error_reporting() �����ܹ�������ʱ���� error_reporting ָ� PHP �������󼶱�ʹ�øú������������ڽű�����ʱ�ļ��� ���û�����ÿ�ѡ���� level�� error_reporting() ���᷵�ص�ǰ�Ĵ��󱨸漶�� 
*/

// �ر�����PHP���󱨸�
error_reporting(0);

// Report simple running errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// ���� E_NOTICEҲͦ�� (����δ��ʼ���ı���
// ���߲���������Ĵ���ƴд)
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

// ���� E_NOTICE�������������д���
// ������ php.ini ���Ĭ������
error_reporting(E_ALL ^ E_NOTICE);

// �������� PHP ���� (�μ� changelog)
error_reporting(E_ALL);

// �������� PHP ����
error_reporting(-1);

// �� error_reporting(E_ALL); һ��
ini_set('error_reporting', E_ALL);
















