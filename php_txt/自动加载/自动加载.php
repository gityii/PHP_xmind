<?php
/*
类的自动加载
当使用尚未被定义的类（class）和接口（interface）时自动去加载。通过注册自动加载器，脚本引擎在 PHP 出错失败前有了最后一个机会加载所需的类。 
尽管 __autoload() 函数也能自动加载类和接口，但更建议使用 spl_autoload_register() 函数。 spl_autoload_register() 提供了一种更加灵活的方式来实现类的自动加载（同一个应用中，可以支持任意数量的加载器，比如第三方库中的）。因此，不再建议使用 __autoload() 函数，在以后的版本中它可能被弃用。
*/

/*
bool spl_autoload_register ([ callable $autoload_function [, bool $throw = true [, bool $prepend = false ]]] )

spl_autoload_register — 注册给定的函数作为 __autoload 的实现
将函数注册到SPL __autoload函数队列中。如果该队列中的函数尚未激活，则激活它们。 

参数:
autoload_function     欲注册的自动装载函数。如果没有提供任何参数，则自动注册 autoload 的默认实现函数spl_autoload()。 
throw                 此参数设置了 autoload_function 无法成功注册时， spl_autoload_register()是否抛出异常。 
prepend               如果是 true，spl_autoload_register() 会添加函数到队列之首，而不是队列尾部。


返回值:	
成功时返回 TRUE， 或者在失败时返回 FALSE。 

*/

function my_autoloader($class) {
    include 'classes/' . $class . '.class.php';
}

spl_autoload_register('my_autoloader');

// 或者，自 PHP 5.3.0 起可以使用一个匿名函数
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.class.php';
});

/*
首先定义一个知道如何包含类文件的函数：
*/
function class_loader($class){
	require('classes/' . $class . '.php');
}

/*
以上代码假定所有的类文件都包含在classes这个子目录下面，现在可以这样加载类文件：
*/
class_loader('Rectangle');

/*
要开启“自动加载”功能，需要将加载函数注册到PHP:
*/
spl_autoload_register('class_loader');


/*
spl_autoload
spl_autoload — __autoload()函数的默认实现
void spl_autoload ( string $class_name [, string $file_extensions ] )

本函数提供了__autoload()的一个默认实现。如果不使用任何参数调用 spl_autoload_register() 函数，则以后在进行 __autoload() 调用时会自动使用此函数。 



参数:
class_name
file_extensions
在默认情况下，本函数先将类名转换成小写，再在小写的类名后加上 .inc 或 .php 的扩展名作为文件名，然后在所有的包含路径(include paths)中检查是否存在该文件。 


返回值： 没有返回值


*/


/*
__autoload — 尝试加载未定义的类
void __autoload ( string $class )

参数:     class     待加载的类名。 
返回值:   没有返回值。
*/


/*自动加载的机制，自动加载在哪个阶段*/


/*自动加载机制使用类方法的例子：


* You can use a static method :

<?php

class MyClass {
  public static function autoload($className) {
    // ...
  }
}

spl_autoload_register(array('MyClass', 'autoload'));

?>

* Or you can use an instance :

<?php

class MyClass {
  public function autoload($className) {
    // ...
  }
}

$instance = new MyClass();
spl_autoload_register(array($instance, 'autoload'));

?>




*/



/**-----jsfl--------**/

//创建类自动加载机制
if(function_exists('spl_autoload_register')) {
	spl_autoload_register(array('system','autoload'));
} else {
	function __autoload($class) {    //函数无需在调用之前被定义，除非函数是有条件被定义时。 
		system::autoload($class);
	}
}


	/**
	 * autoload
	 * 类自动加载
	 * @access public
	 * @param $class 类名
	 */
	public static function autoload($class){
		$file = __ROOT__.'/source/class/'.$class.'.php';
		if (is_file($file)){
			include_once $file;
		}
	}
	



























