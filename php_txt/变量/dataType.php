<?php
/*
	PHP ֧�� 8 ��ԭʼ�������͡� 
	���ֱ������ͣ� 
	boolean�������ͣ�  
	integer�����ͣ�  
	float�������ͣ�Ҳ���� double)  
	string���ַ�����  

	���ָ������ͣ� 
	array�����飩  
	object������  

	����������������ͣ� 
	resource����Դ��  
	NULL�������ͣ�  

	Ϊ��ȷ��������׶��ԣ����ֲỹ������һЩα���ͣ� 
	mixed��������ͣ�  
	number���������ͣ�  
	callback���ص����ͣ�  

	�Լ�α���� $...�� 

	����������ͨ�������ɳ���Ա�趨�ģ�ȷ�е�˵������ PHP ���ݸñ���ʹ�õ�������������ʱ�����ġ�
*/
/*�����鿴ĳ�����ʽ��ֵ�����ͣ��� var_dump() ������ */
/*���Ҫ��һ������ǿ��ת��Ϊĳ���ͣ����Զ���ʹ��ǿ��ת������ settype() ����*/


	$a_bool = TRUE;   // a boolean
	$a_str  = "foo";  // a string
	$a_str2 = 'foo';  // a string
	$an_int = 12;     // an integer

	echo gettype($a_bool)."<br/>"; // prints out:  boolean
	echo gettype($a_str)."<br/>"; 	 // prints out:  string


	// If this is an integer, increment it by four
	if (is_int($an_int)) {
		$an_int += 4;
	}
	echo var_dump($an_int)."<br/>";
	// If $bool is a string, print it out
	// (does not print out anything)
	if (is_string($a_bool)) {
		echo "String: $a_bool"."<br/>";
	}












?>