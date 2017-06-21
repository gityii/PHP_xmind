<?php
//call_user_func — 把第一个参数作为回调函数调用,第一个参数 callback 是被调用的回调函数，其余参数是回调函数的参数。 
//传入call_user_func()的参数不能为引用传递
error_reporting(E_ALL);
function increment(&$var)
{
    $var++;
}

$a = 0;
call_user_func('increment', $a);
echo $a."\n";

call_user_func_array('increment', array(&$a)); // You can use this instead before PHP 5.3
echo $a."\n";
//一个已实例化的对象的方法被作为数组传递，下标 0 包含该对象，下标 1 包含方法名。 


