<?php

//PHP 7 ��ʼ֧�������ࡣ ����������ã����Դ���һ���Եļ򵥶��� // PHP 7 ֮ǰ�Ĵ���
class Logger
{
    public function log($msg)
    {
        echo $msg;
    }
}

$util->setLogger(new Logger());

// ʹ���� PHP 7+ ��Ĵ���
$util->setLogger(new class {
    public function log($msg)
    {
        echo $msg;
    }
}); 

