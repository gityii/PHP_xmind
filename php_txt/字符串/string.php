	<?php
/*һ���ַ��� string ������һϵ�е��ַ���ɣ�����ÿ���ַ���ͬ��һ���ֽڡ�����ζ�� PHP ֻ��֧�� 256 ���ַ�������˲�֧�� Unicode */
/*string �����Դﵽ 2GB*/

/*
һ���ַ��������� 4 �ַ�ʽ�� 
������  
˫����  
heredoc �﷨�ṹ  
nowdoc �﷨�ṹ���� PHP 5.3.0 �� 

Ҫ���һ��������������������ǰ��Ӹ���б�ߣ�\����ת�塣Ҫ���һ����б����������������б�ߣ�\\����

�����κη�ʽ�ķ�б�߶��ᱻ���ɷ�б�߱���Ҳ����˵�����ʹ������ת���������� \r ���� \n�����������κ����⺬�壬�͵������������ַ�����
*/

/*����˫���ź� heredoc �﷨�ṹ���ڵ������ַ����еı����������ַ���ת�����н����ᱻ�滻�� */

/*����ַ����ǰ�Χ��˫���ţ�"���У� PHP ����һЩ������ַ����н���*/

/*
                   ת���ַ�
\n                 ���У�ASCII �ַ����е� LF �� 0x0A (10)�� 
\r                 �س���ASCII �ַ����е� CR �� 0x0D (13)�� 
\t                 ˮƽ�Ʊ����ASCII �ַ����е� HT �� 0x09 (9)�� 
\v                 ��ֱ�Ʊ����ASCII �ַ����е� VT �� 0x0B (11)������ PHP 5.2.5 �� 
\e                 Escape��ASCII �ַ����е� ESC �� 0x1B (27)������ PHP 5.4.0 �� 
\f                 ��ҳ��ASCII �ַ����е� FF �� 0x0C (12)������ PHP 5.2.5 �� 
\\                 ��б�� 
\$                 ��Ԫ��� 
\"                 ˫���� 
\[0-7]{1,3}        ���ϸ�������ʽ���е���һ���԰˽��Ʒ�ʽ�������ַ�  
\x[0-9A-Fa-f]{1,2} ���ϸ�������ʽ���е���һ����ʮ�����Ʒ�ʽ�������ַ�  

*/

echo 'this is a simple string'."<br/>";

// ����¼�����
echo 'You can also have embedded newlines in 
strings this way as it is
okay to do'."<br/>";

// ����� Arnold once said: "I'll be back"
echo 'Arnold once said: "I\'ll be back"'."<br/>";

// ����� You deleted C:\*.*?
echo 'You deleted C:\\*.*?'."<br/>";

// ����� You deleted C:\*.*?
echo 'You deleted C:\*.*?'."<br/>";

// ����� This will not expand: \n a newline
echo 'This will not expand: \n a newline'."<br/>";

//�Ƚ������
echo "This will not expand: \n a newline"."<br/>";


// ����� Variables do not $expand $either
echo 'Variables do not $expand $either'."<br/>";

$juice = "apple";
echo "He drank some juice made of $juice."."<br/>";
/*
�� PHP ����������һ����Ԫ���ţ�$��ʱ������������ܶ������һ����ȥ��Ͼ�����ı�ʶ���γ�һ���Ϸ��ı������������û���������ȷ�������Ľ��ߡ� 
*/

/*�������ţ��﷨*/
// ��ʾ���д���
error_reporting(E_ALL);

$great = 'fantastic';

// ��Ч�����: This is { fantastic}
echo "This is { $great}"."<br/>";

// ��Ч������� This is fantastic
echo "This is {$great}"."<br/>";
echo "This is ${great}"."<br/>";


// ��Ч
echo "This square is {$square->width}00 centimeters broad."; 

// ��Ч��ֻ��ͨ���������﷨������ȷ���������ŵļ���
echo "This works: {$arr['key']}";

// ��Ч
echo "This works: {$arr[4][3]}";

/*
��ȡ���޸��ַ����е��ַ�

string �е��ַ�����ͨ��һ���� 0 ��ʼ���±꣬������ array �ṹ�еķ����Ű�����Ӧ�����������ʺ��޸ģ����� $str[42]�����԰� string �����ַ���ɵ� array������ substr() �� substr_replace() �����ڲ�������һ���ַ�������� 

*/

/*�ַ����±����Ϊ�������ת��Ϊ�������ַ���������ᷢ������*/

/*�ַ��������� '.'���㣩���������������ע�� '+'���Ӻţ������û��������ܡ�*/






?> 



