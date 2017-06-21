<?php
/*
PHP所提供的"重载"（overloading）是指动态地"创建"类属性和方法。我们是通过魔术方法（magic methods）来实现的。 
当调用当前环境下未定义或不可见的类属性或方法时，重载方法会被调用。本节后面将使用"不可访问属性（inaccessible properties）"和"不可访问方法（inaccessible methods）"来称呼这些未定义或不可见的类属性或方法。 
所有的重载方法都必须被声明为 public。 
魔术方法的参数都不能通过引用传递。 
*/

/*
属性重载 

public void __set ( string $name , mixed $value )

public mixed __get ( string $name )

public bool __isset ( string $name )

public void __unset ( string $name )

在给不可访问属性赋值时，__set() 会被调用。 

读取不可访问属性的值时，__get() 会被调用。 

当对不可访问属性调用 isset() 或 empty() 时，__isset() 会被调用。 

当对不可访问属性调用 unset() 时，__unset() 会被调用。 

参数 $name 是指要操作的变量名称。__set() 方法的 $value 参数指定了 $name 变量的值。 

属性重载只能在对象中进行。在静态方法中，这些魔术方法将不会被调用。所以这些方法都不能被 声明为 static。从 PHP 5.3.0 起, 将这些魔术方法定义为 static 会产生一个警告。 

*/




/*
方法重载 

public mixed __call ( string $name , array $arguments )

public static mixed __callStatic ( string $name , array $arguments )

在对象中调用一个不可访问方法时，__call() 会被调用。 

用静态方式中调用一个不可访问方法时，__callStatic() 会被调用。 

$name 参数是要调用的方法名称。$arguments 参数是一个枚举数组，包含着要传递给方法 $name 的参数。 
*/


/*魔术方法

__construct()， __destruct()， __call()， __callStatic()， __get()， __set()， __isset()， __unset()， __sleep()， __wakeup()， __toString()， __invoke()， __set_state()， __clone() 和 __debugInfo() 等方法在 PHP 中被称为"魔术方法"（Magic methods）。在命名自己的类方法时不能使用这些方法名，除非是想使用其魔术功能。 
*/






