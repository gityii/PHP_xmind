<?php
//����Ŀ¼��

function list_dir($start){
    $contents = scandir($start);
	foreach($contents as $item){
		if(is_dir("$start/$item") && (substr($item, 0, 1) != '.')){
			list_dir("$start/$item");
		}else{
			
		}
	}
}

list_dir('.');

/*scandir �� �г�ָ��·���е��ļ���Ŀ¼
array scandir ( string $directory [, int $sorting_order [, resource $context ]] )

����:  
directory        Ҫ�������Ŀ¼ 
sorting_order    Ĭ�ϵ�����˳���ǰ���ĸ�������С����ʹ���˿�ѡ���� sorting_order����Ϊ 1����������˳���ǰ���ĸ�������С� 

����ֵ: 
�ɹ��򷵻ذ������ļ����� array�����ʧ���򷵻� FALSE����� directory���Ǹ�Ŀ¼���򷵻ز���ֵ FALSE ������һ�� E_WARNING ���Ĵ���

*/



/*is_dir �� �жϸ����ļ����Ƿ���һ��Ŀ¼
bool is_dir ( string $filename )

����: 
filename    ����ļ������ڲ���ΪĿ¼�򷵻� TRUE����� filename ��һ�����·�������յ�ǰ����Ŀ¼��������·����

����ֵ: 
����ļ������ڣ������Ǹ�Ŀ¼������ TRUE�����򷵻�FALSE


*/


