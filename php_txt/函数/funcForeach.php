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
*/
/*���Ժ����׵�ͨ���� $value ֮ǰ���� & ���޸������Ԫ�ء��˷����������ø�ֵ�����ǿ���һ��ֵ*/
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

//�� list() ��Ƕ�׵������� 
//����һ�����������Ĺ��ܲ��Ұ�Ƕ�׵���������ѭ�������У�ֻ�轫 list() ��Ϊֵ�ṩ��
echo "<br />";	
$array = [
    [1, 2],
    [3, 4],
];

foreach ($array as list($a, $b)) {
    // $a contains the first element of the nested array,
    // and $b contains the second element.
    echo "A: $a; B: $b\n";
}
//list() �еĵ�Ԫ��������Ƕ������ģ���ʱ����������鵥Ԫ��������
//��� list() ���г��ĵ�Ԫ����Ƕ��������ᷢ��һ����Ϣ����Ĵ�����Ϣ



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






