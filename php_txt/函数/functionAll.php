<?php
/*
��������PHP�е�������ʶ������������ͬ����Ч�ĺ���������ĸ���»��ߴ�ͷ���������ĸ�����ֻ��»��ߡ�������������ʽ��ʾΪ��[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*�� 
*/

/*
���������ڵ���֮ǰ�����壬�������������������к�����������������ʱ�� 
��һ��������������������ʱ�������ڵ��ú���֮ǰ���塣 
*/

$makefoo = true;

/* �����ڴ˴�����foo()������
   ��Ϊ���������ڣ������Ե���bar()������*/

bar();

if ($makefoo) {
  function foo()
  {
    echo "I don't exist until program execution reaches me.\n";
  }
}

/* ���ڿ��԰�ȫ���ú��� foo()�ˣ�
   ��Ϊ $makefoo ֵΪ�� */

if ($makefoo) foo();

function bar()
{
  echo "I exist immediately upon program start.\n";
}

/*
PHP �е����к������඼����ȫ�������򣬿��Զ�����һ������֮�ڶ���֮����ã���֮��Ȼ�� 
PHP ��֧�ֺ������أ�Ҳ������ȡ����������ض����������ĺ����� 
�������Ǵ�Сд�޹صģ������ڵ��ú�����ʱ��ʹ�����ڶ���ʱ��ͬ����ʽ�Ǹ���ϰ�ߡ� 
*/
//�� PHP �п��Ե��õݹ麯���� 


//�����Ĳ��� 
/*PHP ֧�ְ�ֵ���ݲ�����Ĭ�ϣ���ͨ�����ô��ݲ����Լ�Ĭ�ϲ�����Ҳ֧�ֿɱ䳤�Ȳ����б�*/
//������������
function takes_array($input)
{
    echo "$input[0] + $input[1] = ", $input[0]+$input[1];
}
//ͨ�����ô��ݲ��� 
function add_some_extra(&$string)
{
    $string .= 'and something extra.';
}
$str = 'This is a string, ';
add_some_extra($str);
echo $str;    // outputs 'This is a string, and something extra.'
 
//�ں�����ʹ��Ĭ�ϲ���,Ĭ��ֵ�����ǳ������ʽ��������������������Ա�����ߺ������õȡ� 
function makecoffee($type = "cappuccino")
{
    return "Making a cup of $type.\n";
}
echo makecoffee();
echo makecoffee(null);
echo makecoffee("espresso");

//ע�⵱ʹ��Ĭ�ϲ���ʱ���κ�Ĭ�ϲ�����������κη�Ĭ�ϲ������Ҳࣻ���򣬺��������ᰴ��Ԥ�ڵ����������
function makeyogurt($flavour, $type = "acidophilus")
{
    return "Making a bowl of $type $flavour.\n";
}
echo makeyogurt("raspberry");   // works as expected



//�ɱ������Ĳ����б� 
//�� ... �﷨ʵ��
function sum(...$numbers) {
    $acc = 0;
    foreach ($numbers as $n) {
        $acc += $n;
    }
    return $acc;
}

echo sum(1, 2, 3, 4);



//����ֵ 
/*���Է��ذ�������Ͷ�����������͡���������������ֹ���������У����ҽ�����Ȩ���ص��øú����Ĵ����С�������Ϣ�� return
�������ܷ��ض��ֵ��������ͨ������һ���������õ����Ƶ�Ч���� 

*/

//�Ӻ�������һ�����ã������ں���������ָ�ɷ���ֵ��һ������ʱ��ʹ����������� &�� 


function &returns_reference()
{
    return $someref;
}

$newref =& returns_reference();
	
//�ɱ亯��
/*
PHP ֧�ֿɱ亯���ĸ������ζ�����һ������������Բ���ţ�PHP ��Ѱ���������ֵͬ���ĺ��������ҳ���ִ�������ɱ亯����������ʵ�ְ����ص����������������ڵ�һЩ��;�� 
�ɱ亯�������������� echo��print��unset()��isset()��empty()��include��require �Լ����Ƶ����Խṹ����Ҫʹ���Լ��İ�װ����������Щ�ṹ�����ɱ亯���� 
*/
function foo() {
    echo "In foo()<br />\n";
}

function bar($arg = '') {
    echo "In bar(); argument was '$arg'.<br />\n";
}

// ʹ�� echo �İ�װ����
function echoit($string)
{
    echo $string;
}

$func = 'foo';
$func();        // This calls foo()

$func = 'bar';
$func('test');  // This calls bar()

$func = 'echoit';
$func('test');  // This calls echoit()



//Ҳ�����ÿɱ亯�����﷨������һ������ķ����� 

class Foo
{
    function Variable()
    {
        $name = 'Bar';
        $this->$name(); // This calls the Bar() method
    }

    function Bar()
    {
        echo "This is Bar";
    }
}

$foo = new Foo();
$funcname = "Variable";
$foo->$funcname();   // This calls $foo->Variable()

//�����þ�̬����ʱ����������Ҫ�Ⱦ�̬�������ȣ� 
class Foo
{
    static $variable = 'static property';
    static function Variable()
    {
        echo 'Method Variable called';
    }
}

echo Foo::$variable; // This prints 'static property'. It does need a $variable in this scope.
$variable = "Variable";
Foo::$variable();  // This calls $foo->Variable() reading $variable in this scope.

//�ڲ������ã����� 
//���� phpinfo() ���� get_loaded_extensions() ���Ե�֪ PHP ��������Щ��չ�⡣
//PHP �ֲᰴ�ղ�ͬ����չ����֯�����ǵ��ĵ���


//�������� 
/*
����������Anonymousfunctions����Ҳ�бհ�������closures����������ʱ����һ��û��ָ�����Ƶĺ�������������ص�������callback��������ֵ����Ȼ��Ҳ������Ӧ�õ������ 
*/

//�հ�����Ҳ������Ϊ������ֵ��ʹ�á�

$greet = function($name)
{
    printf("Hello %s\r\n", $name);
};

$greet('World');
$greet('PHP');






