<?php

/*	
unset — 释放给定的变量
void unset ( mixed $var [, mixed $... ] )

unset() 销毁指定的变量。 
unset() 在函数中的行为会依赖于想要销毁的变量的类型而有所不同。 
如果在函数中 unset() 一个全局变量，则只是局部变量被销毁，而在调用环境中的变量将保持调用 unset() 之前一样的值。 

*/

    function destroy_foo() {
        global $foo;
        unset($foo);
    }

    $foo = 'bar';
    destroy_foo();
    echo $foo;

//如果您想在函数中 unset() 一个全局变量，可使用 $GLOBALS 数组来实现： 

	function foo() 
	{
		unset($GLOBALS['bar']);
	}

	$bar = "something";
	foo();
	

//如果在函数中 unset() 一个通过引用传递的变量，则只是局部变量被销毁，而在调用环境中的变量将保持调用 unset() 之前一样的值。	