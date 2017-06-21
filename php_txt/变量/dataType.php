<?php
/*
	PHP 支持 8 种原始数据类型。 
	四种标量类型： 
	boolean（布尔型）  
	integer（整型）  
	float（浮点型，也称作 double)  
	string（字符串）  

	两种复合类型： 
	array（数组）  
	object（对象）  

	最后是两种特殊类型： 
	resource（资源）  
	NULL（无类型）  

	为了确保代码的易读性，本手册还介绍了一些伪类型： 
	mixed（混合类型）  
	number（数字类型）  
	callback（回调类型）  

	以及伪变量 $...。 

	变量的类型通常不是由程序员设定的，确切地说，是由 PHP 根据该变量使用的上下文在运行时决定的。
*/
/*如果想查看某个表达式的值和类型，用 var_dump() 函数。 */
/*如果要将一个变量强制转换为某类型，可以对其使用强制转换或者 settype() 函数*/


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