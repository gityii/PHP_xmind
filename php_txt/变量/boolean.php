<?php

/*
����ֵ FALSE ����  
����ֵ 0���㣩  
������ֵ 0.0���㣩  
���ַ������Լ��ַ��� "0"  
�������κ�Ԫ�ص�����  
�������κγ�Ա�����Ķ��󣨽� PHP 4.0 ���ã�  
�������� NULL��������δ��ֵ�ı�����  
�ӿձ�����ɵ� SimpleXML ����  

��������ֵ������Ϊ�� TRUE�������κ���Դ���� 

*/

var_dump((bool) "");        // bool(false)
var_dump((bool) 1);         // bool(true)
var_dump((bool) -2);        // bool(true)
var_dump((bool) "foo");     // bool(true)
var_dump((bool) 2.3e5);     // bool(true)
var_dump((bool) array(12)); // bool(true)
var_dump((bool) array());   // bool(false)
var_dump((bool) "false");   // bool(true)


?>