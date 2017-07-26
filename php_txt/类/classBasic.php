<?php
/*
ÿ����Ķ��嶼�Թؼ��� class ��ͷ����������������������һ�Ի����ţ������������������뷽���Ķ��塣 
�����������κη�PHP�����ֵĺϷ���ǩ��һ���Ϸ���������ĸ���»��߿�ͷ���������������ĸ�����ֻ��»��ߡ���������ʽ��ʾΪ��[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*��
һ������԰����������Լ��ĳ�������������Ϊ"����"���Լ���������Ϊ"����"���� 
�����ǲ����ִ�Сд�ģ�����������һ���������������ִ�Сд�ġ�
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





/*
heredoc�ṹ
*/

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




