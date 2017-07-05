<?php

/*
substr — 返回字符串的子串
string substr ( string $string , int $start [, int $length ] )
返回字符串 string 由 start 和 length 参数指定的子字符串。  返回提取的子字符串， 或者在失败时返回 FALSE。 

参数；
string   输入字符串。必须至少有一个字符。 

start    如果 start 是非负数，返回的字符串将从 string 的 start 位置开始，从 0 开始计算。
         如果 start 是负数，返回的字符串将从 string 结尾处向前数第 start 个字符开始。 
		 如果 string 的长度小于 start，将返回 FALSE。 
		 
length   如果提供了正数的 length，返回的字符串将从 start 处开始最多包括 length 个字符（取决于 string 的长度）。
         如果提供了负数的 length，那么 string 末尾处的许多字符将会被漏掉（若 start 是负数则从字符串尾部算起）。如果 start 不在这段文本中，那么将返回一个空字符串。 		 
         如果提供了值为 0，FALSE 或 NULL 的 length，那么将返回一个空字符串。
         如果没有提供 length，返回的子字符串将从 start 位置开始直到字符串结尾。 		 

*/



    $rest = substr("abcdef", 0, -1);  // 返回 "abcde"
    $rest = substr("abcdef", 2, -1);  // 返回 "cde"
    $rest = substr("abcdef", 4, -4);  // 返回 ""
    $rest = substr("abcdef", -3, -1); // 返回 "de"
    
    
    echo substr('abcdef', 1);     // bcdef
    echo substr('abcdef', 1, 3);  // bcd
    echo substr('abcdef', 0, 4);  // abcd
    echo substr('abcdef', 0, 8);  // abcdef
    echo substr('abcdef', -1, 1); // f
	
	
