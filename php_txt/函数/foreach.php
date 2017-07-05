<?php
/*
foreach�﷨�ṹ�ṩ�˱�������ļ򵥷�ʽ��foreach���ܹ�Ӧ��������Ͷ����������Ӧ���������������͵ı���������δ��ʼ���ı���������������Ϣ��
*/
/*
�������﷨�� 
foreach (array_expression as $value)
    statement
foreach (array_expression as $key => $value)
    statement

��һ�ָ�ʽ���������� array_expression ���顣ÿ��ѭ���У���ǰ��Ԫ��ֵ������ $value ���������ڲ���ָ����ǰ��һ���������һ��ѭ���н���õ���һ����Ԫ���� 
�ڶ��ָ�ʽ��ͬ�����£�ֻ���˵�ǰ��Ԫ�ļ���Ҳ����ÿ��ѭ���б��������� $key�� 
���ܹ��Զ���������� 
���� foreach �����ڲ�����ָ�룬��ѭ�����޸���ֵ�����ܵ����������Ϊ��
*/
/*���Ժ����׵�ͨ���� $value ֮ǰ���� & ���޸������Ԫ�ء��˷����������ø�ֵ�����ǿ���һ��ֵ*/

/*
foreach�����ʱ��ָ�������ָ��ģ�list()/each()/while()ѭ�������ʱ��ָ�����ָ����أ�
��foreach��ʼִ�е�ʱ�������ڲ���ָ����Զ�ָ���һ����Ԫ����Ϊforeach����������ָ������Ŀ����������Ǹ����鱾��
��each()һ�����������ָ�뽫ͣ���������е���һ����Ԫ�������������βʱͣ�������һ����Ԫ�����Ҫ�ٴ�ʹ��each()�������飬����Ҫʹ��reset().
reset()��������ڲ�ָ�뵹�ص���һ����Ԫ�����ص�һ�����鵥Ԫ��ֵ��
	
*/	

$arr = array(1, 2, 3, 4);
foreach ($arr as &$value) {
    $value = $value * 2;
	echo  var_dump($value)."<br/>";
}
// $arr is now array(2, 4, 6, 8)
echo var_dump($arr)."<br/>";
echo var_dump($value)."<br/>";
//�������һ��Ԫ�ص� $value ������ foreach ѭ��֮���Իᱣ��������ʹ�� unset() ���������١� 
unset($value); // ���ȡ��������
var_dump($arr);

echo "<br />";	
foreach (array(1, 2, 3, 4, 5) as $v) {
    echo "$v\n";
}


/*
foreach�ṩ��һ�ֶ������ķ���ʹ�����ͨ����Ԫ�б���������
Ĭ������£����пɼ����Զ��������ڱ����� 
*/
class MyClass
{
    public $var1 = 'value 1';
    public $var2 = 'value 2';
    public $var3 = 'value 3';

    protected $protected = 'protected var';
    private   $private   = 'private var';

    function iterateVisible() {
       echo "MyClass::iterateVisible:\n";
       foreach($this as $key => $value) {
           print "$key => $value\n";
       }
    }
}

$class = new MyClass();

foreach($class as $key => $value) {
    print "$key => $value\n";
}
echo "\n";


$class->iterateVisible();

/*�����
var1 => value 1
var2 => value 2
var3 => value 3

MyClass::iterateVisible:
var1 => value 1
var2 => value 2
var3 => value 3
protected => protected var
private => private var
*/

/*ʵ�� Iterator �ӿ�
�����ö������о�����α����Լ�ÿ�α���ʱ��Щֵ���á� 
*/



//�������һ��Ԫ�ص� $value ������ foreach ѭ��֮���Իᱣ��������ʹ�� unset() ���������١�
//foreach ��֧����"@"�����ƴ�����Ϣ�������� 

$a = array();
$a[0][0] = "a";
$a[0][1] = "b";
$a[1][0] = "y";
$a[1][1] = "z";

foreach ($a as $v1) {
    foreach ($v1 as $v2) {
        echo "$v2\n";
    }
}


/* 
foreach example: key and value 
�Լ�ֵ�Եķ�ʽ���д�ӡ
*/

$a = array(
    "one" => 1,
    "two" => 2,
    "three" => 3,
    "seventeen" => 17
);

foreach ($a as $k => $v) {
    echo "\$a[$k] => $v.\n";
}
