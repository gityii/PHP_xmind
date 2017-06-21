<?php
/*������ 
�����ƿ���ͨ�� clone �ؼ�������ɣ�������ܣ��⽫���ö���� __clone() �������������е� __clone() �������ܱ�ֱ�ӵ��á�
$copy_of_object = clone $object;
�����󱻸��ƺ�PHP 5 ��Զ������������ִ��һ��ǳ���ƣ�shallow copy�������е��������� ��Ȼ����һ��ָ��ԭ���ı���������
void __clone ( void )
���������ʱ����������� __clone() ���������´����Ķ��󣨸������ɵĶ����е� __clone() �����ᱻ���ã��������޸����Ե�ֵ������б�Ҫ�Ļ�����  
*/

class SubObject
{
    static $instances = 0;
    public $instance;

    public function __construct() {
        $this->instance = ++self::$instances;
    }

    public function __clone() {
        $this->instance = ++self::$instances;
    }
}

class MyCloneable
{
    public $object1;
    public $object2;

    function __clone()
    {
      
        // ǿ�Ƹ���һ��this->object�� ������Ȼָ��ͬһ������
        $this->object1 = clone $this->object1;
    }
}

$obj = new MyCloneable();

$obj->object1 = new SubObject();
$obj->object2 = new SubObject();

$obj2 = clone $obj;


print("Original Object:\n");
print_r($obj);

print("Cloned Object:\n");
print_r($obj2);


echo '<br/>';

/*����Ƚ� 
��ʹ�ñȽ��������==���Ƚ������������ʱ���Ƚϵ�ԭ���ǣ����������������Ժ�����ֵ ����ȣ���������������ͬһ�����ʵ������ô���������������ȡ� 
�����ʹ��ȫ���������===�����������������һ��Ҫָ��ĳ�����ͬһ��ʵ������ͬһ�����󣩡� 

*/
function bool2str($bool)
{
    if ($bool === false) {
        return 'FALSE';
    } else {
        return 'TRUE';
    }
}

function compareObjects(&$o1, &$o2)
{
    echo 'o1 == o2 : ' . bool2str($o1 == $o2) . "\n";
    echo 'o1 != o2 : ' . bool2str($o1 != $o2) . "\n";
    echo 'o1 === o2 : ' . bool2str($o1 === $o2) . "\n";
    echo 'o1 !== o2 : ' . bool2str($o1 !== $o2) . "\n";
}

class Flag
{
    public $flag;

    function Flag($flag = true) {
        $this->flag = $flag;
    }
}

class OtherFlag
{
    public $flag;

    function OtherFlag($flag = true) {
        $this->flag = $flag;
    }
}

$o = new Flag();
$p = new Flag();
$q = $o;
$r = new OtherFlag();

echo "Two instances of the same class\n";
compareObjects($o, $p);

echo "\nTwo references to the same instance\n";
compareObjects($o, $q);

echo "\nInstances of two different classes\n";
compareObjects($o, $r);

/*���������
php�������Ǳ���������������ͬ�ı�������ָ����ͬ�����ݡ���php5��һ����������Ѿ����ٱ������������ֵ��ֻ�Ǳ���һ����ʶ�������������Ķ������ݡ� ��������Ϊ�������ݣ���Ϊ������أ����߸�ֵ������һ������������һ��������ԭ���Ĳ������õĹ�ϵ��ֻ�����Ƕ�������ͬһ����ʶ���Ŀ����������ʶ��ָ��ͬһ��������������ݡ� 
*/
class A {
    public $foo = 1;
}  

$a = new A;
$b = $a;     // $a ,$b����ͬһ����ʶ���Ŀ���
             // ($a) = ($b) = <id>
$b->foo = 2;
echo $a->foo."\n";


$c = new A;
$d = &$c;    // $c ,$d������
             // ($c,$d) = <id>

$d->foo = 2;
echo $c->foo."\n";


$e = new A;

function foo($obj) {
    // ($obj) = ($e) = <id>
    $obj->foo = 2;
}

foo($e);
echo $e->foo."\n";


/*���л����� - �ڻỰ�д�Ŷ��� 
����php�����ֵ������ʹ�ú���serialize()������һ�������ֽ������ַ�������ʾ��unserialize()�����ܹ����°��ַ������phpԭ����ֵ�� ���л�һ�����󽫻ᱣ���������б��������ǲ��ᱣ�����ķ�����ֻ�ᱣ��������֡� 
Ϊ���ܹ�unserialize()һ��������������������Ѿ��������	
������л���A��һ�����󣬽��᷵��һ������A��أ����Ұ����˶������б���ֵ���ַ����� ���Ҫ��������һ���ļ��н����л�һ��������������������ڽ����л�֮ǰ���壬����ͨ������һ�����������ļ���ʹ�ú���spl_autoload_register()��ʵ�֡� 
*/


// classa.inc:һ����һ����Ķ����ļ���
  
  class A {
      public $one = 1;
    
      public function show_one() {
          echo $this->one;
      }
  }
  
// page1.php:

  include("classa.inc");
  
  $a = new A;
  $s = serialize($a);
  // �ѱ���$s���������Ա��ļ�page2.php�ܹ�����
  file_put_contents('store', $s);

// page2.php:
  
  // Ҫ��ȷ�˽����л��������������һ���ļ�
  include("classa.inc");

  $s = file_get_contents('store');
  $a = unserialize($s);

  // ���ڿ���ʹ�ö���$a����ĺ��� show_one()
  $a->show_one();

/*��Ӧ�ó��������л������Ա���֮��ʹ�ã�ǿ���Ƽ�������Ӧ�ó��򶼰����������Ķ��塣
������������У�������session_register("a")���ѱ���$a���ڻỰ��֮����Ҫ��ÿ��ҳ�涼�����ļ�classa.inc��������ֻ���ļ�page1.php��page2.php�� 
*/