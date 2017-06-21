<?php
/*
�ӿڵ�ʹ�û����﷨
�ӿ���ͨ�� interface �ؼ���������ģ�������һ����׼����һ���������ж������еķ������ǿյ�
interface �ӿ���{
	//����
	//����
}

Ҫʵ��һ���ӿڣ�ʹ�� implements �������������ʵ�ֶ���ӿڣ��ö������ָ�����ӿڵ����ơ� 
ʵ�ֶ���ӿ�ʱ���ӿ��еķ��������������� 
�ӿ�Ҳ���Լ̳У�ͨ��ʹ�� extends �������� 
��Ҫʵ�ֽӿڣ�����ʹ�úͽӿ���������ķ�����ȫһ�µķ�ʽ������ᵼ���������� 
�ӿ���Ҳ���Զ��峣�����ӿڳ������ೣ����ʹ����ȫ��ͬ�����ǲ��ܱ�������ӽӿ������ǡ� 
*/

// ����һ��'iTemplate'�ӿ�
interface iTemplate
{
    public function setVariable($name, $var);
    public function getHtml($template);
}


// ʵ�ֽӿ�
// �����д������ȷ��
class Template implements iTemplate
{
    private $vars = array();
  
    public function setVariable($name, $var)
    {
        $this->vars[$name] = $var;
    }
  
    public function getHtml($template)
    {
        foreach($this->vars as $name => $value) {
            $template = str_replace('{' . $name . '}', $value, $template);
        }
 
        return $template;
    }
}

//�̳ж���ӿ�
interface a
{
    public function foo();
}

interface b
{
    public function bar();
}

interface c extends a, b
{
    public function baz();
}

class d implements c
{
    public function foo()
    {
    }

    public function bar()
    {
    }

    public function baz()
    {
    }
}

//ʹ�ýӿڳ���
interface aa
{
    const bb = 'Interface constant';
}

// ����ӿڳ���
echo aa::bb;

// ����д������Ϊ�������ܱ����ǡ��ӿڳ����ĸ�����ೣ����һ���ġ�
class bb implements aa
{
    const bb = 'Class constant';
}

/*
ʲô����¿��Կ���ʹ�ýӿ�
1�����淶
2�����¹淶���ó���Ա��ʵ��
*/

/*
1�����ܹ�ʵ����һ���ӿ�
2���ӿ��е����з������������з�����
3��һ�������ȥʵ�ֶ���ӿ�
4���ӿ��п��������ԣ����Ǳ����ǳ�����������public
5��һ���ӿڿ��Լ̳ж�������Ľӿ�
6����һ����ȥʵ����ĳЩ�ӿڣ����������нӿڵķ�����ʵ��
*/