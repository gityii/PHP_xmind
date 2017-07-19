<?php
/*
ÿ����Ķ��嶼�Թؼ��� class ��ͷ����������������������һ�Ի����ţ������������������뷽���Ķ��塣 
�����������κη�PHP�����ֵĺϷ���ǩ��һ���Ϸ���������ĸ���»��߿�ͷ���������������ĸ�����ֻ��»��ߡ���������ʽ��ʾΪ��[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*��
һ������԰����������Լ��ĳ�������������Ϊ"����"���Լ���������Ϊ"����"���� 
*/

class SimpleClass
{
    // property declaration
    public $var = 'a default value';

    // method declaration
    public function displayVar() {
        echo $this->var;
    }
}

/*��Ա���Կ����ǻ����������ͣ��������ַ�����������Ҳ���Ǹ����������ͣ����顢����
�����һ����������һ������ʵ���ϴ��ݵ���һ����ַ
*/



/*new  =================================================
Ҫ����һ�����ʵ��������ʹ��new�ؼ��֡��������¶���ʱ�ö������Ǳ���ֵ�����Ǹö������˹��캯�������ڳ���ʱ�׳���һ���쳣����Ӧ�ڱ�ʵ����֮ǰ���壨ĳЩ������������������ 
����� new֮����ŵ���һ���������������ַ�����������һ��ʵ���������������������һ�����ֿռ䣬�����ʹ�����������ơ� 
*/
/*
$instance = new SimpleClass();

// Ҳ������������
$className = 'Foo';
$instance = new $className(); // Foo()
*/
/*
����һ�������Ѿ�������ʵ������һ���±���ʱ���±��������ͬһ��ʵ�����ͺ��øö���ֵһ��������Ϊ�͸�����������ʵ��ʱһ����
*/

class Test
{
    static public function getNew()
    {
        return new static;
    }
}

class Child extends Test
{}

$obj1 = new Test();
$obj2 = new $obj1;
var_dump($obj1 !== $obj2);

$obj3 = Test::getNew();
var_dump($obj3 instanceof Test);

$obj4 = Child::getNew();
var_dump($obj4 instanceof Child);


/*extends ================================================
һ����������������� extends �ؼ��ּ̳���һ����ķ��������ԡ�PHP��֧�ֶ��ؼ̳У�һ����ֻ�ܼ̳�һ�����ࡣ
���̳еķ��������Կ���ͨ����ͬ���������������������ǡ�����������ඨ�巽��ʱʹ���� final����÷������ɱ����ǡ�����ͨ�� parent:: �����ʱ����ǵķ��������ԡ� 
*/

class ExtendClass extends SimpleClass
{
    // Redefine the parent method
    function displayVar()
    {
        echo "Extending class\n";
        parent::displayVar();
    }
}

$extended = new ExtendClass();
$extended->displayVar();


/* ::class  =======================================================
�ؼ��� class Ҳ�����������Ľ�����ʹ�� ClassName::class ����Ի�ȡһ���ַ������������� ClassName ����ȫ�޶����ơ����ʹ���� �����ռ� �����������á� 
*/
/*
namespace NS {
    class ClassName {
    }
    
    echo ClassName::class;
}
*/
// �������̻���� NS\ClassName



/*����     ========================================================
��ı�����Ա����"����"�������������ɹؼ��� public��protected ���� private ��ͷ��Ȼ���һ����ͨ�ı�����������ɡ�
�����еı������Գ�ʼ�������ǳ�ʼ����ֵ�����ǳ���
*/

/*����ĳ�Ա�������棬������ ->���������������$this->property������ property �Ǹ������������ַ�ʽ�����ʷǾ�̬���ԡ���̬���������� ::��˫ð�ţ���self::$property �����ʡ�*/


/*this α����
��һ���������ඨ���ڲ�������ʱ����һ�����õ�α���� $this��$this ��һ�������ж�������� 	
this ���ʿ����������������ĵ�ַ
�ĸ�����ʹ�õ�this�������ĸ�����ĵ�ַ
this���������ⲿʹ��
����֮����Ի�����ã�����Ҫʹ��$this����
���Ҫ����protected��������private������ͨ�����������ṩpublic����ȥ���ʣ���ʽ���£�
public function setXXX($val){

}
public function getXXX($val){

}


*/

/*
heredoc�ṹ
*/

//��Χ���������� ��::��====================================== 
/*
��Χ������������Ҳ�ɳ���PaamayimNekudotayim�����߸��򵥵�˵��һ��ð�ţ��������ڷ��ʾ�̬��Ա���ೣ�������������ڸ������е����Ժͷ�����
��û�����κ�ʵ��������·������еĺ������߻����еĺ����ͱ������ô����� :: ����������ڴ������
�����ඨ��֮�����õ���Щ��Ŀʱ��Ҫʹ�������� 
����ͨ�������������࣬�ñ�����ֵ�����ǹؼ��֣��� self��parent �� static���� 
*/
echo '<br/>';
//������ⲿʹ�� :: ������
class MyClass {
    const CONST_VALUE = 'A constant value';
}

$classname = 'MyClass';
echo $classname::CONST_VALUE; // �� PHP 5.3.0 �𣬷��ʾ�̬��Ա

echo MyClass::CONST_VALUE;


/*��Ҫ�ô����л��������ϵ����֣�Ӧ������������� parent����ָ�ľ����������� extends ��������ָ�Ļ�������֡����������Ա����ڶ���ط�ʹ�û�������֡�����̳�����ʵ�ֵĹ�����Ҫ�޸ģ�ֻҪ�򵥵��޸����� extends �����Ĳ��֡�
*/ 

class A {
function example() {
echo "I am A::example() and provide basic functionality.<br />\n";
}
}

class B extends A {
function example() {
echo "I am B::example() and provide additional functionality.<br />\n";
parent::example();
}
}

$b = new B;

// �⽫���� B::example()��������ȥ���� A::example()��
$b->example();

//self��parent �� static ����������Ĺؼ������������ඨ����ڲ��������Ի򷽷����з��ʵġ� 

//���ඨ���ڲ�ʹ�� ::
class OtherClass extends MyClass
{
    public static $my_static = 'static var';

    public static function doubleColon() {
        echo parent::CONST_VALUE . "\n";
        echo self::$my_static . "\n";
    }
}

$classname = 'OtherClass';
echo $classname::doubleColon(); // �� PHP 5.3.0 ��

OtherClass::doubleColon();

/*
��һ�����า���丸���еķ���ʱ��PHP������ø������ѱ����ǵķ������Ƿ���ø���ķ���ȡ�������ࡣ���ֻ���Ҳ�����ڹ��캯�������������������Լ�ħ�������� 
*/
echo '<br/>';
class MyClass1
{
    protected function myFunc() {
        echo "MyClass1::myFunc()\n";
    }
}

class OtherClass1 extends MyClass1
{
    // �����˸���Ķ���
    public function myFunc()
    {
        // �����ǿ��Ե��ø����б����ǵķ���
        parent::myFunc();
        echo "OtherClass1::myFunc()\n";
    }
}

$class = new OtherClass1();
$class->myFunc();

//���ʿ���
/*
�����Ի򷽷��ķ��ʿ��ƣ���ͨ����ǰ����ӹؼ��� public�����У���protected���ܱ������� private��˽�У���ʵ�ֵġ�������Ϊ���е����Ա�������κεط������ʡ�������Ϊ�ܱ��������Ա����Ա��������Լ�������͸�����ʡ�������Ϊ˽�е����Ա��ֻ�ܱ��䶨�����ڵ�����ʡ� 
*/
//�����Ա��붨��Ϊ���У��ܱ�����˽��֮һ������� var ���壬����Ϊ���С� 

/**
 * Define MyClass
 */
class MyClass_1
{
    public $public = 'Public';
    protected $protected = 'Protected';
    private $private = 'Private';

    function printHello()
    {
        echo $this->public;
        echo $this->protected;
        echo $this->private;
    }
}

$obj = new MyClass_1();
echo $obj->public; // �����ܱ�����ִ��
//echo $obj->protected; // ���л����һ����������
//echo $obj->private; // ����Ҳ�����һ����������
$obj->printHello(); // ��� Public��Protected �� Private

class MyClass2 extends MyClass_1
{
    // ���Զ� public �� protected �����ض��壬�� private ������
    protected $protected = 'Protected2';

    function printHello()
    {
        echo $this->public;
        echo $this->protected;
        //echo $this->private;// δ���� private
    }
}

$obj2 = new MyClass2();
echo $obj2->public; // �����ܱ�����ִ��
//echo $obj2->private; // δ���� private
//echo $obj2->protected; // ���л����һ����������
$obj2->printHello(); // ��� Public��Protected2 �� Undefined


//�����ķ��ʿ��ƣ����еķ������Ա�����Ϊ���У�˽�л��ܱ��������û��������Щ�ؼ��֣���÷���Ĭ��Ϊ���С�
class MyClassFun
{
    // ����һ�����еĹ��캯��
    public function __construct() { }

    // ����һ�����еķ���
    public function MyPublic() { }

    // ����һ���ܱ����ķ���
    protected function MyProtected() { }

    // ����һ��˽�еķ���
    private function MyPrivate() { }

    // �˷���Ϊ����
    function Foo()
    {
        $this->MyPublic();
        $this->MyProtected();
        $this->MyPrivate();
    }
}

$myclass = new MyClassFun;
$myclass->MyPublic(); // �����ܱ�����ִ��
//$myclass->MyProtected(); // ���л����һ����������
//$myclass->MyPrivate(); // ���л����һ����������
$myclass->Foo(); // ���У��ܱ�����˽�ж�����ִ��


class MyClass_2 extends MyClassFun
{
    // �˷���Ϊ����
    function Foo2()
    {
        $this->MyPublic();
        $this->MyProtected();
        $this->MyPrivate(); // ���л����һ����������
    }
}

$myclass2 = new MyClass_2;
$myclass2->MyPublic(); // �����ܱ�����ִ��
$myclass2->Foo2(); // ���еĺ��ܱ����Ķ���ִ�У���˽�еĲ���



//��������ķ��ʿ��� 
//ͬһ����Ķ���ʹ����ͬһ��ʵ��Ҳ���Ի�����ʶԷ���˽�����ܱ�����Ա��������������Щ������ڲ�����ʵ�ֵ�ϸ�ڶ�����///֪�ġ�
class Test
{
    private $foo;

    public function __construct($foo)
    {
        $this->foo = $foo;
    }

    private function bar()
    {
        echo 'Accessed the private method.';
    }

    public function baz(Test $other)
    {
        // We can change the private property:
        $other->foo = 'hello';
        var_dump($other->foo);

        // We can also call the private method:
        $other->bar();
    }
}

$test = new Test('test');

$test->baz(new Test('other'));


/*����̳� =====================================
����չһ���࣬����ͻ�̳и������й��еĺ��ܱ����ķ������������า���˸���ķ��������̳еķ������ᱣ����ԭ�й��ܡ� 
����ʹ�����Զ����أ�����һ���������ʹ��֮ǰ�����塣���һ������չ����һ�����������������֮ǰ���������˹�����������̳���������ӿڡ� 
��ν�̳о���һ������ͨ��extend ���࣬�Ѹ���ģ�public/protected�����Ժͣ�public/protected�������̳�����
�����public/protected�����Ժͷ������̳У�private�����Ժͷ���û�б��̳�
һ����ֻ�ܼ̳�һ�����࣬��ֱ�Ӽ̳У��������ϣ���̳ж��������Ժͷ�������ʹ�ö��̳�
��������������ʱ��Ĭ������£������Զ����ø���Ĺ��췽�������ϣ��ȥ���ø���Ĺ��췽�����������ķ�����public/protected��,������������:   ����::������()   parent::������()
*/
class foo
{
    public function printItem($string) 
    {
        echo 'Foo: ' . $string . PHP_EOL;
    }
    
    public function printPHP()
    {
        echo 'PHP is great.' . PHP_EOL;
    }
}

class bar extends foo
{
    public function printItem($string)
    {
        echo 'Bar: ' . $string . PHP_EOL;
    }
}

$foo = new foo();
$bar = new bar();
$foo->printItem('baz'); // Output: 'Foo: baz'
$foo->printPHP();       // Output: 'PHP is great' 
$bar->printItem('baz'); // Output: 'Bar: baz'
$bar->printPHP();       // Output: 'PHP is great'




