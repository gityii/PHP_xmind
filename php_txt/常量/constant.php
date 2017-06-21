<?php


/*
常量是一个简单值的标识符（名字）。在脚本执行期间该值不能改变（除了所谓的魔术常量，它们其实不是常量）
常量默认为大小写敏感。
传统上常量标识符总是大写的。 

常量名和其它任何 PHP 标签遵循同样的命名规则。合法的常量名以字母或下划线开始，后面跟着任何字母，数字或下划线。
字母指的是 a-z，A-Z，以及从 127 到 255（0x7f-0xff）的 ASCII 字符。 
用正则表达式是这样表达的：[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*。 
*/

// 合法的常量名
define("FOO",     "something");
var_dump(FOO);
define("FOO2",    "something else");
define("FOO_BAR", "something more");

// 非法的常量名
define("2FOO",    "something");

// 下面的定义是合法的，但应该避免这样做：(自定义常量不要以__开头)
// 也许将来有一天PHP会定义一个__FOO__的魔术常量
// 这样就会与你的代码相冲突
define("__FOO__", "something");

/*
bool define ( string $name , mixed $value [, bool $case_insensitive = false ] )

在运行时定义一个常量。 

参数  name  常量名。 
value  常量的值；仅允许标量和 null。标量的类型是 integer， float，string 或者 boolean。 也能够定义常量值的类型为 resource ，但并不推荐这么做，可能会导致未知状况的发生。 
case_insensitive
如果设置为 TRUE，该常量则大小写不敏感。默认是大小写敏感的。比如， CONSTANT 和 Constant 代表了不同的值。 

*/

define("CONSTANT", "Hello world.");
echo CONSTANT; // outputs "Hello world."
echo Constant; // outputs "Constant" and issues a notice.

define("GREETING", "Hello you.", true);
echo GREETING; // outputs "Hello you."
echo Greeting; // outputs "Hello you."

/*
defined — 检查某个名称的常量是否存在   bool defined ( string $name )
如果你要检查一个变量是否存在，请使用 isset()。 defined() 函数仅对 constants 有效。
如果你要检测一个函数是否存在，使用 function_exists()。 
*/
if(defined("CONSTANT"))//单引号和双引号都可以
{
	  echo "CONSTANT is exist";
}	

/*和 superglobals 一样，常量的范围是全局的。不用管作用区域就可以在脚本的任何地方访问常量。*/

/*用 get_defined_constants() 可以获得所有已定义的常量列表。 */


print_r(get_defined_constants(true));

/*
常量和变量有如下不同： 
常量前面没有美元符号（$）；  
常量只能用 define() 函数定义，而不能通过赋值语句；  
常量可以不用理会变量的作用域而在任何地方定义和访问；  
常量一旦定义就不能被重新定义或者取消定义；  
常量的值只能是标量。 

*/
//使用关键字 const 定义常量

// 以下代码在 PHP 5.3.0 后可以正常工作
const CONSTANT = 'Hello World';

echo CONSTANT;

/*
和使用 define() 来定义常量相反的是，使用 const 关键字定义常量必须处于最顶端的作用区域，因为用此方法是在编译时定义的。这就意味着不能在函数内，循环内以及 if 语句之内用 const 来定义常量。 
*/

/*
PHP 向它运行的任何脚本提供了大量的预定义常量。不过很多常量都是由不同的扩展库定义的，只有在加载了这些扩展库时才会出现，或者动态加载后，或者在编译时已经包括进去了。 


几个 PHP 的"魔术常量"

__LINE__ 文件中的当前行号。  
__FILE__ 文件的完整路径和文件名。如果用在被包含文件中，则返回被包含的文件名。自 PHP 4.0.2 起，__FILE__       总是包含一个绝对路径（如果是符号连接，则是解析后的绝对路径），而在此之前的版本有时会包含一个相对路径。  
__DIR__ 文件所在的目录。如果用在被包括文件中，则返回被包括的文件所在的目录。它等价于 dirname(__FILE__)。除非是根目录，否则目录中名不包括末尾的斜杠。（PHP 5.3.0中新增） =  
__FUNCTION__ 函数名称（PHP 4.3.0 新加）。自 PHP 5 起本常量返回该函数被定义时的名字（区分大小写）。在 PHP 4 中该值总是小写字母的。  
__CLASS__ 类的名称（PHP 4.3.0 新加）。自 PHP 5 起本常量返回该类被定义时的名字（区分大小写）。在 PHP 4 中该值总是小写字母的。类名包括其被声明的作用区域（例如 Foo\Bar）。注意自 PHP 5.4 起 __CLASS__ 对 trait 也起作用。当用在 trait 方法中时，__CLASS__ 是调用 trait 方法的类的名字。  
__TRAIT__ Trait 的名字（PHP 5.4.0 新加）。自 PHP 5.4 起此常量返回 trait 被定义时的名字（区分大小写）。Trait 名包括其被声明的作用区域（例如 Foo\Bar）。  
__METHOD__ 类的方法名（PHP 5.0.0 新加）。返回该方法被定义时的名字（区分大小写）。  
__NAMESPACE__ 当前命名空间的名称（区分大小写）。此常量是在编译时定义的（PHP 5.3.0 新增）。  

*/


