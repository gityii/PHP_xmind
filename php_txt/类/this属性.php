<?php
/**方法体内想访问调用者的属性,必须用$this 如果不加,则理解为方法内部的一个局部变量./

/*在类的成员方法里面，可以用 ->（对象运算符）：$this->property（其中 property 是该属性名）这种方式来访问非静态属性。
静态属性则是用 ::（双冒号）：self::$property 来访问。
一个类中的$this变量总是指向该类的当前实例，在一个方法中，我们可以使用语法$this->attributeName来访问类的实例及其属性。

*/


/*this 伪变量
当一个方法在类定义内部被调用时，有一个可用的伪变量 $this。$this 是一个到主叫对象的引用 	
this 本质可以理解就是这个对象的地址
哪个对象使用到this，就是哪个对象的地址
this不能在类外部使用
方法之间可以互相调用，但需要使用$this引用
如果要访问protected变量或者private变量，通常的做法是提供public函数去访问，形式如下：
public function setXXX($val){

}
public function getXXX($val){

}
*/

class Rectangle{
	public $width = 0;
	public $height = 0;
	
    
	function setSize($w=0, $h=0){
		$this->width = $w;
		$this->height = $h;
	}
	
	/*创建一个方法用了计算和返回矩形的面积,这个方法不需要带任何参数，因为它可以通过$this来访问类的属性*/
	function getArea(){
		return ($this->width * $this->height);
	}
}

/*在类的名称中使用get_和set_前缀是一种通用的规范，以set开始的方法用于向类的属性赋值，以get开始的方法用于返回值: 属性的值或者计算的结果*/


/**************下面的例子表示了this的真实含义******单独的一个$this*********/

<?php

class  ServiceLocator
{
    public $controllerNamespace;

    public function init()
    {
        $class = get_class($this);
        echo 'classname is'.$class."</br>";

    }

}


class Module extends ServiceLocator
{

    public $controllerNamespace = 'app\modules\screen\controllers';

    public function init()
    {
        parent::init();
    }
}

$echoname = new Module();

$echoname->init();
echo '.....'."<br/>";
echo "Its name is " , get_class($echoname) , "\n";     //打印的类名字结果跟上面的一样


/**************************************************************/




get_class — 返回对象的类名
string get_class ([ object $obj ] )
返回对象实例 obj 所属类的名字。如果 obj 不是一个对象则返回 FALSE。 

<?php
class foo {
    function name()
    {
        echo "My name is " , get_class($this) , "\n";
    }
}

// create an object
$bar = new foo();

// external call
echo "Its name is " , get_class($bar) , "\n";

// internal call
$bar->name();
?> 



