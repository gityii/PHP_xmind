<?php

/*
һ��������������һ�������ռ�

�ӿռ䣺 �����ռ�ĵ����﷨���ļ�·��һ�����е���ģ������������Զ����ӿռ������������ռ�֮��Ĺ�ϵ��
�����ռ䣺��һ�������ռ�������һ�ű����ű����Ԫ�ز����������������ռ䡣�������ű���û�ж������������ռ䣬����Ԫ�ؾ�ʼ�մ��ڹ����ռ���
��������һ�������ռ�
Ҫ�Ե�ǰ�ռ�Ϊ���㡣

���������͵���
�ռ���������ƣ�1.���޶�����  2.�޶�����  3.��ȫ�޶�����
��ʵ���԰��������������Ϊ�ļ��������� comment.php�������·���������� ./article/comment.php��������·���������� /blog/article/comment.php��

����ʾ��
*/



//�����ռ�Blog����ǰ�ű��ļ��ĵ�һ�������ռ�ǰ�治�����κδ���
namespace Blog;

class Comment { }

//���޶����ƣ���ʾ��ǰBlog�ռ�
//������ý��������� Blog\Comment();
$blog_comment = new Comment();//�����ͳ������÷�������һ����

//�޶����ƣ���ʾ�����Blog�ռ�
//������ý��������� Blog\Article\Comment();
$article_comment = new Article\Comment(); //��ǰ��û�з�б��\

//��ȫ�޶����ƣ���ʾ������Blog�ռ�
//������ý��������� Blog\Comment();
$article_comment = new \Blog\Comment(); //��ǰ���з�б��\

//��ȫ�޶����ƣ���ʾ������Blog�ռ�
//������ý��������� Blog\Article\Comment();
$article_comment = new \Blog\Article\Comment(); //��ǰ���з�б��\


//����Blog���ӿռ�Article
namespace Blog\Article;

class Comment { }
?>



<?php
namespace Blog\Article;

class Comment { }

//����һ��BBS�ռ䣨���д��㿪����̳��
namespace BBS;

//����һ�������ռ�
use Blog\Article;
//���������ռ���ʹ���޶����Ƶ���Ԫ��
$article_comment = new Article\Comment();

//Ϊ�����ռ�ʹ�ñ���
use Blog\Article as Arte;
//ʹ�ñ�������ռ���
$article_comment = new Arte\Comment();

//����һ����
use Blog\Article\Comment;
//��������ʹ�÷��޶����Ƶ���Ԫ��
$article_comment = new Comment();

//Ϊ��ʹ�ñ���
use Blog\Article\Comment as Comt;
//ʹ�ñ�������ռ���
$article_comment = new Comt();

?>


<?php
�������ӣ�

�ļ�֮��Ĺ�ϵ�������ռ�֮��Ĺ�ϵ
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

//����ͬ�������ռ��ڹ���
/*��ʹ����ͬʱ������lib1.php��lib2.php��MYCONST��MyFunction��MyClass��ʶ��ֻ����lib1.php�����ã�������Ϊmyapp1.php�Ĵ�������ͬ��App\Lib1�����ռ��ڡ�*/
//myapp1.php
	< ?php  
	namespace App\Lib1;  
	 
	require_once('lib1.php');  
	require_once('lib2.php');  
	 
	header('Content-type: text/plain');  
	echo MYCONST . "\n";  
	echo MyFunction() . "\n";  
	echo MyClass::WhoAmI() . "\n";  


/*ִ�н����

    App\Lib1\MYCONST  
    App\Lib1\MyFunction  
    App\Lib1\MyClass::WhoAmI  
*/

	?> 
//�����ռ䵼��
/*����ʹ��use���������������ռ䣬�磺*/
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

���Զ�������������use��䣬��ʹ�ö��ŷָ��ɶ����������ռ䣬��������������ǵ�����App\Lib2�����ռ䣬��������Ȼ����ֱ������ MYCONST��MyFunction��MyClass����Ϊ���ǵĴ��뻹��ȫ�ֿռ��У��������������ˡ�Lib2\��ǰ׺�����Ǿͱ���޶����� �ˣ�PHP������������������ռ䣬ֱ���ҵ�ƥ���

ִ�н����	
    App\Lib2\MYCONST  
    App\Lib2\MyFunction  
    App\Lib2\MyClass::WhoAmI 

�����ռ����:
������������ʹ�ý϶̵��������úܳ��������ռ䡣

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

��һ��use��佫App\Lib1����Ϊ��L�����κ�ʹ�á�L�����޶������ڱ���ʱ���ᱻ����ɡ�App\Lib1����������ǾͿ�������L\MYCONST��L\MyFunction��������ȫ�޶������ˡ�

�ڶ���use��䶨���ˡ�obj����ΪApp\Lib2\�����ռ���MyClass��ı��������ַ�ʽֻ�ʺ����࣬�������ڳ����ͺ������������ǾͿ���ʹ��new Obj( )���������������о�̬�����ˡ�

ִ�н����

    App\Lib1\MYCONST  
    App\Lib1\MyFunction  
    App\Lib1\MyClass::WhoAmI  
    App\Lib2\MyClass::WhoAmI  


	ע��namespace ���Ǵ�����������һ���ռ䣬�����������ںδ���
	use���ڶԿռ�ĵ��룬����ʹ�ñ�ʾ�ռ����Թ�ϵ��
	
	

__NAMESPACE__������


__NAMESPACE__��һ��PHP�ַ����������Ƿ��ص�ǰ�����ռ�����ƣ���ȫ�ֿռ�������һ�����ַ�����

    < ?php  
    namespace App\Lib1;  
    echo __NAMESPACE__; // outputs: App\Lib1  
    ?>  

    ���ֵ�ڵ���ʱ�ǳ����ã���Ҳ�����ڶ�̬����һ����ȫ�޶��������磺

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
	

namespace�ؼ���

    namespace�ؼ��ֿ���������ȷ����һ����ǰ�����ռ���������ռ��е���Ŀ�����ȼ������е�self�����ռ䣺

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




�Զ����������ռ��ࣨ��һ�����Ժ��ٿ���

PHP 5����ʡʱʡ�����������Զ����룬��ȫ�֣��������ռ䣩PHP�����У�����дһ����׼�Զ����뺯����

    < ?php  
    $obj= new MyClass1(); // classes/MyClass1.php is auto-loaded  
    $obj= new MyClass2(); // classes/MyClass2.php is auto-loaded  
     
    // autoload function  
    function __autoload($class_name) {  
     require_once("classes/$class_name.php");  
    }  
    ?>  

��PHP 5.3�У�����Դ���һ�������ռ����ʵ��������������£���ȫ�޶������ռ���������ݸ�__autoload���������磬$class_name��ֵ�� ����App\Lib1\MyClass�����������ͬ���ļ����·������е�PHP���ļ������ַ�������ȡ�����ռ䣬�������ᵼ���ļ�����ͻ��

���⣬������ļ���νṹ�ᰴ�������ռ�Ľṹ������֯�����磬MyClass.php�ļ����Դ�����/classes/App/Lib1�ļ����£�

/classes/App/Lib1/MyClass.php

    < ?php  
    namespace App\Lib1;  
     
    class MyClass {  
     public function WhoAmI() {  
    return __METHOD__;  
     }  
    }  
    ?>  

�ڸ��ļ����µ��ļ���ʹ������Ĵ����ˣ�

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

���ͣ�

1.��App\Lib1\MyClass�ı�����MC��

2. new MC( )�ڱ���ʱ�������new App\Lib1\MyClass( )��

3.�ַ���App\Lib1\MyClass�����ݸ�__autoload������ʹ���ļ�·����б���滻���������ռ��еķ�б�ߣ�Ȼ���޸��ַ�����classes\App\Lib1\MyClass.php�ļ����Զ����룻	