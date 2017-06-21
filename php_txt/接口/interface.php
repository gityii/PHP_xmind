<?php
/*
接口的使用基本语法
接口是通过 interface 关键字来定义的，就像定义一个标准的类一样，但其中定义所有的方法都是空的
interface 接口名{
	//属性
	//方法
}

要实现一个接口，使用 implements 操作符，类可以实现多个接口，用逗号来分隔多个接口的名称。 
实现多个接口时，接口中的方法不能有重名。 
接口也可以继承，通过使用 extends 操作符。 
类要实现接口，必须使用和接口中所定义的方法完全一致的方式。否则会导致致命错误。 
接口中也可以定义常量。接口常量和类常量的使用完全相同，但是不能被子类或子接口所覆盖。 
*/

// 声明一个'iTemplate'接口
interface iTemplate
{
    public function setVariable($name, $var);
    public function getHtml($template);
}


// 实现接口
// 下面的写法是正确的
class Template implements iTemplate
{
    private $vars = array();
  
    public function setVariable($name, $var)
    {
        $this->vars[$name] = $var;
    }
  
    public function getHtml($template)
    {
        foreach($this->vars as $name => $value) {
            $template = str_replace('{' . $name . '}', $value, $template);
        }
 
        return $template;
    }
}

//继承多个接口
interface a
{
    public function foo();
}

interface b
{
    public function bar();
}

interface c extends a, b
{
    public function baz();
}

class d implements c
{
    public function foo()
    {
    }

    public function bar()
    {
    }

    public function baz()
    {
    }
}

//使用接口常量
interface aa
{
    const bb = 'Interface constant';
}

// 输出接口常量
echo aa::bb;

// 错误写法，因为常量不能被覆盖。接口常量的概念和类常量是一样的。
class bb implements aa
{
    const bb = 'Class constant';
}

/*
什么情况下可以考虑使用接口
1、定规范
2、定下规范，让程序员来实现
*/

/*
1、不能够实例化一个接口
2、接口中的所有方法，都不能有方法体
3、一个类可以去实现多个接口
4、接口中可以有属性，但是必须是常量，并且是public
5、一个接口可以继承多个其它的接口
6、当一个类去实现了某些接口，则必须把所有接口的方法都实现
*/