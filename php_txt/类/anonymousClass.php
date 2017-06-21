<?php

//PHP 7 开始支持匿名类。 匿名类很有用，可以创建一次性的简单对象。 // PHP 7 之前的代码
class Logger
{
    public function log($msg)
    {
        echo $msg;
    }
}

$util->setLogger(new Logger());

// 使用了 PHP 7+ 后的代码
$util->setLogger(new class {
    public function log($msg)
    {
        echo $msg;
    }
}); 

