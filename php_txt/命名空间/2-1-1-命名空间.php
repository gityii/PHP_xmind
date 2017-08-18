<?php

/*
一、（创建）声明一个命名空间

子空间： 命名空间的调用语法像文件路径一样是有道理的，它允许我们自定义子空间来描述各个空间之间的关系。
公共空间：在一个命名空间里引入一脚本，脚本里的元素不会归属到这个命名空间。如果这个脚本里没有定义其它命名空间，它的元素就始终处于公共空间中
二、引用一个命名空间
要以当前空间为基点。

三、别名和导入
空间的三种名称；1.非限定名称  2.限定名称  3.完全限定名称
其实可以把这三种名称类比为文件名（例如 comment.php）、相对路径名（例如 ./article/comment.php）、绝对路径名（例如 /blog/article/comment.php）

三、示例
*/



//创建空间Blog，当前脚本文件的第一个命名空间前面不能有任何代码
namespace Blog;

class Comment { }

//非限定名称，表示当前Blog空间
//这个调用将被解析成 Blog\Comment();
$blog_comment = new Comment();//函数和常量的用法跟类是一样的

//限定名称，表示相对于Blog空间
//这个调用将被解析成 Blog\Article\Comment();
$article_comment = new Article\Comment(); //类前面没有反斜杆\

//完全限定名称，表示绝对于Blog空间
//这个调用将被解析成 Blog\Comment();
$article_comment = new \Blog\Comment(); //类前面有反斜杆\

//完全限定名称，表示绝对于Blog空间
//这个调用将被解析成 Blog\Article\Comment();
$article_comment = new \Blog\Article\Comment(); //类前面有反斜杆\


//创建Blog的子空间Article
namespace Blog\Article;

class Comment { }
?>



<?php
namespace Blog\Article;

class Comment { }

//创建一个BBS空间（我有打算开个论坛）
namespace BBS;

//导入一个命名空间
use Blog\Article;
//导入命名空间后可使用限定名称调用元素
$article_comment = new Article\Comment();

//为命名空间使用别名
use Blog\Article as Arte;
//使用别名代替空间名
$article_comment = new Arte\Comment();

//导入一个类
use Blog\Article\Comment;
//导入类后可使用非限定名称调用元素
$article_comment = new Comment();

//为类使用别名
use Blog\Article\Comment as Comt;
//使用别名代替空间名
$article_comment = new Comt();

?>


<?php
其他例子：

文件之间的关系和命名空间之间的关系
//lib1.php

    < ?php  
    // application library 1  
    namespace App\Lib1;  
    const MYCONST = 'App\Lib1\MYCONST';  
    function MyFunction() {  
     return __FUNCTION__;  
    }  
    class MyClass {  
     static function WhoAmI() {  
    return __METHOD__;  
     }  
    }  
 ?>
	

//lib2.php

<?php  
	// application library 2  
	namespace App\Lib2;  
	 
	const MYCONST = 'App\Lib2\MYCONST';  
	 
	function MyFunction() {  
	 return __FUNCTION__;  
	}  
	 
	class MyClass {  
	 static function WhoAmI() {  
	 return __METHOD__;  
	}  
    }   	

//在相同的命名空间内工作
/*即使我们同时包括了lib1.php和lib2.php，MYCONST，MyFunction和MyClass标识符只能在lib1.php中引用，这是因为myapp1.php的代码在相同的App\Lib1命名空间内。*/
//myapp1.php
	< ?php  
	namespace App\Lib1;  
	 
	require_once('lib1.php');  
	require_once('lib2.php');  
	 
	header('Content-type: text/plain');  
	echo MYCONST . "\n";  
	echo MyFunction() . "\n";  
	echo MyClass::WhoAmI() . "\n";  


/*执行结果：

    App\Lib1\MYCONST  
    App\Lib1\MyFunction  
    App\Lib1\MyClass::WhoAmI  
*/

	?> 
//命名空间导入
/*可以使用use操作符导入命名空间，如：*/
//myapp2.php

 <?php  
    use App\Lib2;    
    require_once('lib1.php');  
    require_once('lib2.php');  
     
    header('Content-type: text/plain');  
    echo Lib2\MYCONST . "\n";  
    echo Lib2\MyFunction() . "\n";  
    echo Lib2\MyClass::WhoAmI() . "\n";  
	
  ?>  

可以定义任意数量的use语句，或使用逗号分隔成独立的命名空间，在这个例子中我们导入了App\Lib2命名空间，但我们仍然不能直接引用 MYCONST，MyFunction和MyClass，因为我们的代码还在全局空间中，但如果我们添加了“Lib2\”前缀，它们就变成限定名称 了，PHP将会搜索导入的命名空间，直到找到匹配项。

执行结果：	
    App\Lib2\MYCONST  
    App\Lib2\MyFunction  
    App\Lib2\MyClass::WhoAmI 

命名空间别名:
别名允许我们使用较短的名称引用很长的命名空间。

myapp3.php

 <?php  
    use App\Lib1 as L;  
    use App\Lib2\MyClass as Obj;  
     
    header('Content-type: text/plain');  
    require_once('lib1.php');  
    require_once('lib2.php');  
     
    echo L\MYCONST . "\n";  
    echo L\MyFunction() . "\n";  
    echo L\MyClass::WhoAmI() . "\n";  
    echo Obj::WhoAmI() . "\n";  
  ?>  

第一个use语句将App\Lib1定义为“L”，任何使用“L”的限定名称在编译时都会被翻译成“App\Lib1”，因此我们就可以引用L\MYCONST和L\MyFunction而不是完全限定名称了。

第二个use语句定义了“obj”作为App\Lib2\命名空间中MyClass类的别名，这种方式只适合于类，不能用于常量和函数，现在我们就可以使用new Obj( )或象上面那样运行静态方法了。

执行结果：

    App\Lib1\MYCONST  
    App\Lib1\MyFunction  
    App\Lib1\MyClass::WhoAmI  
    App\Lib2\MyClass::WhoAmI  


	注：namespace 就是创建或者声明一个空间，即将代码置于何处。
	use用于对空间的导入，它的使用表示空间的相对关系。
	
	

__NAMESPACE__常量：


__NAMESPACE__是一个PHP字符串，它总是返回当前命名空间的名称，在全局空间中它是一个空字符串。

    < ?php  
    namespace App\Lib1;  
    echo __NAMESPACE__; // outputs: App\Lib1  
    ?>  

    这个值在调试时非常有用，它也可由于动态生成一个完全限定类名，如：

    < ?php  
    namespace App\Lib1;  
     
    class MyClass {  
     public function WhoAmI() {  
    return __METHOD__;  
     }  
    }  
     
    $c = __NAMESPACE__ . '\\MyClass';  
    $m = new $c;  
    echo $m->WhoAmI(); // outputs: App\Lib1\MyClass::WhoAmI  
    ?>  	
	

namespace关键字

    namespace关键字可以用于明确引用一个当前命名空间或子命名空间中的项目，它等价于类中的self命名空间：

    < ?php  
    namespace App\Lib1;  
     
    class MyClass {  
     public function WhoAmI() {  
    return __METHOD__;  
     }  
    }  
     
    $m = new namespace\MyClass;  
    echo $m->WhoAmI(); // outputs: App\Lib1\MyClass::WhoAmI  
    ?>  




自动载入命名空间类（这一部分以后再看）

PHP 5中最省时省力的特性是自动载入，在全局（非命名空间）PHP代码中，可以写一个标准自动载入函数：

    < ?php  
    $obj= new MyClass1(); // classes/MyClass1.php is auto-loaded  
    $obj= new MyClass2(); // classes/MyClass2.php is auto-loaded  
     
    // autoload function  
    function __autoload($class_name) {  
     require_once("classes/$class_name.php");  
    }  
    ?>  

在PHP 5.3中，你可以创建一个命名空间类的实例，在这种情况下，完全限定命名空间和类名传递给__autoload函数，例如，$class_name的值可 能是App\Lib1\MyClass。你可以在相同的文件夹下放置所有的PHP类文件，从字符串中提取命名空间，但那样会导致文件名冲突。

另外，你的类文件层次结构会按照命名空间的结构重新组织，例如，MyClass.php文件可以创建在/classes/App/Lib1文件夹下：

/classes/App/Lib1/MyClass.php

    < ?php  
    namespace App\Lib1;  
     
    class MyClass {  
     public function WhoAmI() {  
    return __METHOD__;  
     }  
    }  
    ?>  

在根文件夹下的文件就使用下面的代码了：

myapp.php

    < ?php  
    use App\Lib1\MyClass as MC;  
     
    $obj = new MC();  
    echo $obj->WhoAmI();  
     
    // autoload function  
    function __autoload($class) {  
     // convert namespace to full file path  
     $class = 'classes/' . str_replace('\\', '/', $class) . '.php';  
     require_once($class);  
    }  
    ?>  

解释：

1.类App\Lib1\MyClass的别名是MC；

2. new MC( )在编译时被翻译成new App\Lib1\MyClass( )；

3.字符串App\Lib1\MyClass被传递给__autoload函数，使用文件路径正斜线替换所有命名空间中的反斜线，然后修改字符串，classes\App\Lib1\MyClass.php文件被自动载入；	