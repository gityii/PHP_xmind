<?php

/*
一、
命名空间划分了访问路径

要解决的问题：
1、用户编写的代码与PHP内部的类/函数/常量或第三方类/函数/常量之间的名字冲突。
2、为很长的标识符名称(通常是为了缓解第一类问题而定义的)创建一个别名（或简短）的名称，提高源代码的可读性

PHP 命名空间提供了一种将相关的类、函数和常量组合到一起的途径。
命名空间的调用关系：

命名空间可以想象为一个虚拟的空间？？？

二、
定义命名空间：
虽然任意合法的PHP代码都可以包含在命名空间中，但只有以下类型的代码受命名空间的影响，它们是：类（包括抽象类和traits）、接口、函数和常量。 
命名空间通过关键字namespace 来声明。如果一个文件中包含命名空间，它必须在其它所有代码之前声明命名空间，除了一个以外：declare关键字。 所有非 PHP 代码包括空白符都不能出现在命名空间的声明之前。
与PHP其它的语言特征不同，同一个命名空间可以定义在多个文件中，即允许将同一个命名空间的内容分割存放在不同的文件中。 

与目录和文件的关系很象，PHP 命名空间也允许指定层次化的命名空间的名称。因此，命名空间的名字可以使用分层次的方式定义。
也可以在同一个文件中定义多个命名空间。在同一个文件中定义多个命名空间有两种语法形式。 推荐第二种。

创建(声明)一个命名空间需要使用namespace关键字，当前脚本文件的第一个命名空间前面不能有任何代码
将全局的非命名空间中的代码与命名空间中的代码组合在一起，只能使用大括号形式的语法。全局代码必须用一个不带名称的 namespace 语句加上大括号括起来
在一个命名空间里引入这个脚本，脚本里的元素不会归属到这个命名空间。如果这个脚本里没有定义其它命名空间，它的元素就始终处于公共空间中

"use" statements are required to be placed after the "namespace my\space" but before the "{". 

命名空间一方面定义了自己的空间，方便其他调用，另一方面对其他进行了引用。
命名空间将代码划分出不同的空间（区域），每个空间的常量、函数、类（下边都将它们称为元素）的名字互不影响， 这个有点类似我们常常提到的‘封装'的概念。

类名可以通过三种方式引用：
    非限定名称，或不包含前缀的类名称，例如 $a=new foo(); 或 foo::staticmethod();。如果当前命名空间是 currentnamespace，foo 将被解析为 currentnamespace\foo。如果使用 foo 的代码是全局的，不包含在任何命名空间中的代码，则 foo 会被解析为foo。 警告：如果命名空间中的函数或常量未定义，则该非限定的函数名称或常量名称会被解析为全局函数名称或常量名称。
	
	限定名称,或包含前缀的名称，例如 $a = new subnamespace\foo(); 或 subnamespace\foo::staticmethod();。如果当前的命名空间是 currentnamespace，则 foo 会被解析为 currentnamespace\subnamespace\foo。如果使用 foo 的代码是全局的，不包含在任何命名空间中的代码，foo 会被解析为subnamespace\foo。 	
	
	 完全限定名称，或包含了全局前缀操作符的名称，例如， $a = new \currentnamespace\foo(); 或 \currentnamespace\foo::staticmethod();。在这种情况下，foo 总是被解析为代码中的文字名(literal name)currentnamespace\foo。 
	 注意访问任意全局类、函数或常量，都可以使用完全限定名称，例如 \strlen() 或 \Exception 或 \INI_ALL。 
	 
*/

/*	 
	 
PHP支持两种抽象的访问当前命名空间内部元素的方法，__NAMESPACE__ 魔术常量和namespace关键字。 
常量__NAMESPACE__的值是当前命名空间名称的字符串。在全局的，不包括在任何命名空间中的代码，它包含一个空的字符串。 

关键字 namespace 可用来显式访问当前命名空间或子命名空间中的元素。它等价于类中的 self 操作符。 
 */
 
 
 /*
别名和导入：
允许通过别名引用或导入外部的完全限定名称
 所有支持命名空间的PHP版本支持三种别名或导入方式：为类名称使用别名、为接口使用别名或为命名空间名称使用别名。
 PHP 5.6开始允许导入函数或常量或者为它们设置别名。
 在PHP中，别名是通过操作符 use 来实现的. 	 
 */
 
 
 /*
 
 名称解析规则
 

 在一个命名空间中放置什么东西是有限制的，只对以下这些内容可以：类/接口/函数/常量
 为了定义一个命名空间，将会创建一个新的文件，用于保存命名空间内的代码。这不但是PHP事实上的要求，也是一个很好的设计实践。在这个文件中，使用关键字namespace来创建一个命名空间，后面跟着标识符：
 namespace SomeNamespace;这可能是一个文件中的第一行代码，并且这个文件甚至不能再这段php代码之前有任何其他的HTML代码，但是可以在这行代码之前加一些PHP注释。
 任何放在这行代码之后的代码将会被自动放到这个命名空间内：
 namespace SomeNamespace;
 class SomeClass{}
 
 命名空间还可有子命名空间，这正如在计算机上建立子文件夹一样。要实现这个功能，需要在这个子命名空间前面使用一个反斜杠（‘\’）。
 namespace MyUtilities\UserManagent;
 Class Login{}
 一旦我们定义了一个命名空间，就可以再次使用反斜杠来引用它。首先还是得把定义命名空间的文件包含进来：require('SomeNamespace.php');
 然后使用反斜杠来标示正在使用的一个命名空间: $obj = new \SomeNamespace\SomeClass{};
 */
 
 
 
 
/*	 
三、
代码示例：
The following code will define two constants in the "test" namespace.
*/

<?php
namespace test;//命名空间前面不能有空白行
define('test\HELLO', 'Hello world!');
define(__NAMESPACE__ . '\GOODBYE', 'Goodbye cruel world!');
?>


<?php
namespace test;
define('MESSAGE', 'Hello world!');

    define(__NAMESPACE__ .'\foo','111');
    define('foo','222');

    echo foo."<br/>";  // 111.默认是在当前目录下
	//var_dump(foo)."<br/>";
    echo \foo."<br/>";  // 222.根目录下，全局性的
    echo \test\foo."<br/>";  // 111.
    echo test\foo;  // fatal error. assumes \test\test\foo
?>


/*下面的例子创建了常量MyProject\Sub\Level\CONNECT_OK，类 MyProject\Sub\Level\Connection和函数 MyProject\Sub\Level\connect。*/
<?php
namespace MyProject\Sub\Level;
const CONNECT_OK = 1;
class Connection { /* ... */ }
function connect() { /* ... */}
?>


/*定义多个命名空间和不包含在命名空间中的代码,除了开始的declare语句外，命名空间的括号外不得有任何PHP代码。 */
/*注意这是定义*/
<?php
declare(encoding='UTF-8');
namespace MyProject {
const CONNECT_OK = 1;
class Connection { /* ... */ }
function connect() { /* ... */  }
}

namespace { // global code
session_start();
$a = MyProject\connect();
echo MyProject\Connection::start();
}
?>


/*命名空间一方面定义了自己的空间，方便其他调用，另一方面对其他进行了引用。*/
//food.php
<?php
namespace Food;

require ('Apple.php');
require('Orange.php');

use Apples;
use Oranges;

  Apples\eat();
  Oranges\eat();
?>

//Apple.php
<?php
namespace Apples;

function eat()
{
  echo "eat apple";
}
?>

//Orange.php
<?php
namespace Oranges;

function eat()
{
  echo "eat Orange";
}
?>


/*类名引用flie1.php  */
<?php
namespace Foo\Bar\subnamespace;

const FOO = 1;
function foo() {}
class foo
{
    static function staticmethod() {}
}
?>

<?php
namespace Foo\Bar;
include 'file1.php';

const FOO = 2;
function foo() {}
class foo
{
    static function staticmethod() {}
}

/* 非限定名称 */
foo(); // 解析为 Foo\Bar\foo 
foo::staticmethod(); // 解析为类 Foo\Bar\foo的静态方法staticmethod。
echo FOO."<br/>"; // resolves to constant Foo\Bar\FOO

/* 限定名称 */
subnamespace\foo(); // 解析为函数 Foo\Bar\subnamespace\foo
subnamespace\foo::staticmethod(); // 解析为类 Foo\Bar\subnamespace\foo,
                                  // 以及类的方法 staticmethod
echo subnamespace\FOO."<br/>"; // 解析为常量 Foo\Bar\subnamespace\FOO
                                  
/* 完全限定名称 */
\Foo\Bar\foo(); // 解析为函数 Foo\Bar\foo
\Foo\Bar\foo::staticmethod(); // 解析为类 Foo\Bar\foo, 以及类的方法 staticmethod
echo \Foo\Bar\FOO; // 解析为常量 Foo\Bar\FOO
?>



/*在命名空间内部访问全局类、函数和常量*/
<?php
namespace Foo;

function strlen() {}
const INI_ALL = 3;
class Exception {}

$a = \strlen('hi'); // 调用全局函数strlen
$b = \INI_ALL; // 访问全局常量 INI_ALL
$c = new \Exception('error'); // 实例化全局类 Exception
?>


/*关键字 namespace 可用来显式访问当前命名空间或子命名空间中的元素。它等价于类中的 self 操作符。*/ 
<?php
namespace MyProject;
use blah\blah as mine; // see "Using namespaces: importing/aliasing"
blah\mine(); // calls function MyProject\blah\mine()
namespace\blah\mine(); // calls function MyProject\blah\mine()
namespace\func(); // calls function MyProject\func()
namespace\sub\func(); // calls function MyProject\sub\func()
namespace\cname::method(); // calls static method "method" of class MyProject\cname
$a = new namespace\sub\cname(); // instantiates object of class MyProject\sub\cname
$b = namespace\CONSTANT; // assigns value of constant MyProject\CONSTANT to $b
?>


/*全局代码*/
<?php
namespace\func(); // calls function func()
namespace\sub\func(); // calls function sub\func()
namespace\cname::method(); // calls static method "method" of class cname
$a = new namespace\sub\cname(); // instantiates object of class sub\cname
$b = namespace\CONSTANT; // assigns value of constant CONSTANT to $b
?>



/*

四、
函数：

define()
在运行时定义一个常量。 成功时返回 TRUE， 或者在失败时返回 FALSE。 


<br> 可插入一个简单的换行符。
<br> 标签是空标签（意味着它没有结束标签，因此这是错误的：<br></br>）。在 XHTML 中，把结束标签放在开始标签中，也就是 <br />。
php常用的是."<br />"

PHP5.3开始const关键字可以用在类的外部。const和define都是用来声明常量的（它们的区别不详述），但是在命名空间里，define的作用是全局的，而const则作用于当前空间。我在文中提到的常量是指使用const声明的常量。
*/





