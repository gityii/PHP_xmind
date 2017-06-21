<?php
/*
PHP5֧�ֳ�����ͳ��󷽷�������Ϊ������಻�ܱ�ʵ�������κ�һ���࣬���������������һ�������Ǳ�����Ϊ����ģ���ô�����ͱ��뱻����Ϊ����ġ�������Ϊ����ķ���ֻ������������÷�ʽ�������������ܶ��������Ĺ���ʵ�֡� 
�̳�һ���������ʱ��������붨�常���е����г��󷽷������⣬��Щ�����ķ��ʿ��Ʊ���͸�����һ�������߸�Ϊ���ɣ�������ĳ�����󷽷�������Ϊ�ܱ����ģ���ô������ʵ�ֵķ�����Ӧ������Ϊ�ܱ����Ļ��߹��еģ������ܶ���Ϊ˽�еġ����ⷽ���ĵ��÷�ʽ����ƥ�䣬�����ͺ����������������һ�¡�
*/
abstract class AbstractClass
{
 // ǿ��Ҫ�����ඨ����Щ������û�з����壬��Ҫ����ȥʵ��
    abstract protected function getValue();
    abstract protected function prefixValue($prefix);

    // ��ͨ�������ǳ��󷽷���
    public function printOut() {
        print $this->getValue() . "\n";
    }
}

class ConcreteClass1 extends AbstractClass
{
    protected function getValue() {
        return "ConcreteClass1";
    }

    public function prefixValue($prefix) {
        return "{$prefix}ConcreteClass1";
    }
}

class ConcreteClass2 extends AbstractClass
{
    public function getValue() {
        return "ConcreteClass2";
    }

    public function prefixValue($prefix) {
        return "{$prefix}ConcreteClass2";
    }
}

$class1 = new ConcreteClass1;
$class1->printOut();
echo $class1->prefixValue('FOO_') ."\n";

$class2 = new ConcreteClass2;
$class2->printOut();
echo $class2->prefixValue('FOO_') ."\n";

/*
���һ����ʹ��abstract�����Σ��������ǳ����࣬���һ��������abstract���Σ���÷������ǳ��󷽷������󷽷������з����塿
���������û�г��󷽷���ͬʱ��������ʵ���˵ķ�����
���һ�����У�ֻҪ�г��󷽷���������������Ϊabstract.
*/


abstract class AbstractClass1
{
    // ���ǵĳ��󷽷�����Ҫ������Ҫ�Ĳ���
    abstract protected function prefixName($name);

}

class ConcreteClass extends AbstractClass1
{

    // ���ǵ�������Զ��常��ǩ���в����ڵĿ�ѡ����
    public function prefixName($name, $separator = ".") {
        if ($name == "Pacman") {
            $prefix = "Mr";
        } elseif ($name == "Pacwoman") {
            $prefix = "Mrs";
        } else {
            $prefix = "";
        }
        return "{$prefix}{$separator} {$name}";
    }
}

$class = new ConcreteClass;
echo $class->prefixName("Pacman"), "\n";
echo $class->prefixName("Pacwoman"), "\n";