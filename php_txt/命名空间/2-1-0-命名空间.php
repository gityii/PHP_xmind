<?php

/*
һ��
�����ռ仮���˷���·��

Ҫ��������⣺
1���û���д�Ĵ�����PHP�ڲ�����/����/�������������/����/����֮������ֳ�ͻ��
2��Ϊ�ܳ��ı�ʶ������(ͨ����Ϊ�˻����һ������������)����һ�����������̣������ƣ����Դ����Ŀɶ���

PHP �����ռ��ṩ��һ�ֽ���ص��ࡢ�����ͳ�����ϵ�һ���;����
�����ռ�ĵ��ù�ϵ��

�����ռ��������Ϊһ������Ŀռ䣿����

����
���������ռ䣺
��Ȼ����Ϸ���PHP���붼���԰����������ռ��У���ֻ���������͵Ĵ����������ռ��Ӱ�죬�����ǣ��ࣨ�����������traits�����ӿڡ������ͳ����� 
�����ռ�ͨ���ؼ���namespace �����������һ���ļ��а��������ռ䣬���������������д���֮ǰ���������ռ䣬����һ�����⣺declare�ؼ��֡� ���з� PHP ��������հ׷������ܳ����������ռ������֮ǰ��
��PHP����������������ͬ��ͬһ�������ռ���Զ����ڶ���ļ��У�������ͬһ�������ռ�����ݷָ����ڲ�ͬ���ļ��С� 

��Ŀ¼���ļ��Ĺ�ϵ����PHP �����ռ�Ҳ����ָ����λ��������ռ�����ơ���ˣ������ռ�����ֿ���ʹ�÷ֲ�εķ�ʽ���塣
Ҳ������ͬһ���ļ��ж����������ռ䡣��ͬһ���ļ��ж����������ռ��������﷨��ʽ�� �Ƽ��ڶ��֡�

����(����)һ�������ռ���Ҫʹ��namespace�ؼ��֣���ǰ�ű��ļ��ĵ�һ�������ռ�ǰ�治�����κδ���
��ȫ�ֵķ������ռ��еĴ����������ռ��еĴ��������һ��ֻ��ʹ�ô�������ʽ���﷨��ȫ�ִ��������һ���������Ƶ� namespace �����ϴ�����������
��һ�������ռ�����������ű����ű����Ԫ�ز����������������ռ䡣�������ű���û�ж������������ռ䣬����Ԫ�ؾ�ʼ�մ��ڹ����ռ���

"use" statements are required to be placed after the "namespace my\space" but before the "{". 

�����ռ�һ���涨�����Լ��Ŀռ䣬�����������ã���һ������������������á�
�����ռ佫���뻮�ֳ���ͬ�Ŀռ䣨���򣩣�ÿ���ռ�ĳ������������ࣨ�±߶������ǳ�ΪԪ�أ������ֻ���Ӱ�죬 ����е��������ǳ����ᵽ�ġ���װ'�ĸ��

��������ͨ�����ַ�ʽ���ã�
    ���޶����ƣ��򲻰���ǰ׺�������ƣ����� $a=new foo(); �� foo::staticmethod();�������ǰ�����ռ��� currentnamespace��foo ��������Ϊ currentnamespace\foo�����ʹ�� foo �Ĵ�����ȫ�ֵģ����������κ������ռ��еĴ��룬�� foo �ᱻ����Ϊfoo�� ���棺��������ռ��еĺ�������δ���壬��÷��޶��ĺ������ƻ������ƻᱻ����Ϊȫ�ֺ������ƻ������ơ�
	
	�޶�����,�����ǰ׺�����ƣ����� $a = new subnamespace\foo(); �� subnamespace\foo::staticmethod();�������ǰ�������ռ��� currentnamespace���� foo �ᱻ����Ϊ currentnamespace\subnamespace\foo�����ʹ�� foo �Ĵ�����ȫ�ֵģ����������κ������ռ��еĴ��룬foo �ᱻ����Ϊsubnamespace\foo�� 	
	
	 ��ȫ�޶����ƣ��������ȫ��ǰ׺�����������ƣ����磬 $a = new \currentnamespace\foo(); �� \currentnamespace\foo::staticmethod();������������£�foo ���Ǳ�����Ϊ�����е�������(literal name)currentnamespace\foo�� 
	 ע���������ȫ���ࡢ����������������ʹ����ȫ�޶����ƣ����� \strlen() �� \Exception �� \INI_ALL�� 
	 
*/

/*	 
	 
PHP֧�����ֳ���ķ��ʵ�ǰ�����ռ��ڲ�Ԫ�صķ�����__NAMESPACE__ ħ��������namespace�ؼ��֡� 
����__NAMESPACE__��ֵ�ǵ�ǰ�����ռ����Ƶ��ַ�������ȫ�ֵģ����������κ������ռ��еĴ��룬������һ���յ��ַ����� 

�ؼ��� namespace ��������ʽ���ʵ�ǰ�����ռ���������ռ��е�Ԫ�ء����ȼ������е� self �������� 
 */
 
 
 /*
�����͵��룺
����ͨ���������û����ⲿ����ȫ�޶�����
 ����֧�������ռ��PHP�汾֧�����ֱ������뷽ʽ��Ϊ������ʹ�ñ�����Ϊ�ӿ�ʹ�ñ�����Ϊ�����ռ�����ʹ�ñ�����
 PHP 5.6��ʼ�����뺯����������Ϊ�������ñ�����
 ��PHP�У�������ͨ�������� use ��ʵ�ֵ�. 	 
 */
 
 
 /*
 
 ���ƽ�������
 

 ��һ�������ռ��з���ʲô�����������Ƶģ�ֻ��������Щ���ݿ��ԣ���/�ӿ�/����/����
 Ϊ�˶���һ�������ռ䣬���ᴴ��һ���µ��ļ������ڱ��������ռ��ڵĴ��롣�ⲻ����PHP��ʵ�ϵ�Ҫ��Ҳ��һ���ܺõ����ʵ����������ļ��У�ʹ�ùؼ���namespace������һ�������ռ䣬������ű�ʶ����
 namespace SomeNamespace;�������һ���ļ��еĵ�һ�д��룬��������ļ��������������php����֮ǰ���κ�������HTML���룬���ǿ��������д���֮ǰ��һЩPHPע�͡�
 �κη������д���֮��Ĵ��뽫�ᱻ�Զ��ŵ���������ռ��ڣ�
 namespace SomeNamespace;
 class SomeClass{}
 
 �����ռ仹�����������ռ䣬�������ڼ�����Ͻ������ļ���һ����Ҫʵ��������ܣ���Ҫ������������ռ�ǰ��ʹ��һ����б�ܣ���\������
 namespace MyUtilities\UserManagent;
 Class Login{}
 һ�����Ƕ�����һ�������ռ䣬�Ϳ����ٴ�ʹ�÷�б���������������Ȼ��ǵðѶ��������ռ���ļ�����������require('SomeNamespace.php');
 Ȼ��ʹ�÷�б������ʾ����ʹ�õ�һ�������ռ�: $obj = new \SomeNamespace\SomeClass{};
 */
 
 
 
 
/*	 
����
����ʾ����
The following code will define two constants in the "test" namespace.
*/

<?php
namespace test;//�����ռ�ǰ�治���пհ���
define('test\HELLO', 'Hello world!');
define(__NAMESPACE__ . '\GOODBYE', 'Goodbye cruel world!');
?>


<?php
namespace test;
define('MESSAGE', 'Hello world!');

    define(__NAMESPACE__ .'\foo','111');
    define('foo','222');

    echo foo."<br/>";  // 111.Ĭ�����ڵ�ǰĿ¼��
	//var_dump(foo)."<br/>";
    echo \foo."<br/>";  // 222.��Ŀ¼�£�ȫ���Ե�
    echo \test\foo."<br/>";  // 111.
    echo test\foo;  // fatal error. assumes \test\test\foo
?>


/*��������Ӵ����˳���MyProject\Sub\Level\CONNECT_OK���� MyProject\Sub\Level\Connection�ͺ��� MyProject\Sub\Level\connect��*/
<?php
namespace MyProject\Sub\Level;
const CONNECT_OK = 1;
class Connection { /* ... */ }
function connect() { /* ... */}
?>


/*�����������ռ�Ͳ������������ռ��еĴ���,���˿�ʼ��declare����⣬�����ռ�������ⲻ�����κ�PHP���롣 */
/*ע�����Ƕ���*/
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


/*�����ռ�һ���涨�����Լ��Ŀռ䣬�����������ã���һ������������������á�*/
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


/*��������flie1.php  */
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

/* ���޶����� */
foo(); // ����Ϊ Foo\Bar\foo 
foo::staticmethod(); // ����Ϊ�� Foo\Bar\foo�ľ�̬����staticmethod��
echo FOO."<br/>"; // resolves to constant Foo\Bar\FOO

/* �޶����� */
subnamespace\foo(); // ����Ϊ���� Foo\Bar\subnamespace\foo
subnamespace\foo::staticmethod(); // ����Ϊ�� Foo\Bar\subnamespace\foo,
                                  // �Լ���ķ��� staticmethod
echo subnamespace\FOO."<br/>"; // ����Ϊ���� Foo\Bar\subnamespace\FOO
                                  
/* ��ȫ�޶����� */
\Foo\Bar\foo(); // ����Ϊ���� Foo\Bar\foo
\Foo\Bar\foo::staticmethod(); // ����Ϊ�� Foo\Bar\foo, �Լ���ķ��� staticmethod
echo \Foo\Bar\FOO; // ����Ϊ���� Foo\Bar\FOO
?>



/*�������ռ��ڲ�����ȫ���ࡢ�����ͳ���*/
<?php
namespace Foo;

function strlen() {}
const INI_ALL = 3;
class Exception {}

$a = \strlen('hi'); // ����ȫ�ֺ���strlen
$b = \INI_ALL; // ����ȫ�ֳ��� INI_ALL
$c = new \Exception('error'); // ʵ����ȫ���� Exception
?>


/*�ؼ��� namespace ��������ʽ���ʵ�ǰ�����ռ���������ռ��е�Ԫ�ء����ȼ������е� self ��������*/ 
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


/*ȫ�ִ���*/
<?php
namespace\func(); // calls function func()
namespace\sub\func(); // calls function sub\func()
namespace\cname::method(); // calls static method "method" of class cname
$a = new namespace\sub\cname(); // instantiates object of class sub\cname
$b = namespace\CONSTANT; // assigns value of constant CONSTANT to $b
?>



/*

�ġ�
������

define()
������ʱ����һ�������� �ɹ�ʱ���� TRUE�� ������ʧ��ʱ���� FALSE�� 


<br> �ɲ���һ���򵥵Ļ��з���
<br> ��ǩ�ǿձ�ǩ����ζ����û�н�����ǩ��������Ǵ���ģ�<br></br>������ XHTML �У��ѽ�����ǩ���ڿ�ʼ��ǩ�У�Ҳ���� <br />��
php���õ���."<br />"

PHP5.3��ʼconst�ؼ��ֿ�����������ⲿ��const��define�����������������ģ����ǵ������������������������ռ��define��������ȫ�ֵģ���const�������ڵ�ǰ�ռ䡣���������ᵽ�ĳ�����ָʹ��const�����ĳ�����
*/





