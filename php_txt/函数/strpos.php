<?php

//�� PHP �У�����������һ����Ԫ����ͷ
/*strpos() �� PHP ��һ�����ú������书������һ���ַ�������������һ���ַ�������������������Ҫ�� $_SERVER['HTTP_USER_AGENT']������ν��haystack��������Ѱ��'MSIE'����������haystack�и��ַ���������ν��needle�����ҵ����������� needle �� haystack ������ڿ�ͷ��λ�ã����û�У��򷵻� FALSE������ú���û�з��� FALSE��*/
    if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE) {
        echo '����ʹ�� Firefox<br />';
       }


?>