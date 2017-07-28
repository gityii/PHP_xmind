<?php

//在 PHP 中，变量总是以一个美元符开头
/*strpos() 是 PHP 的一个内置函数，其功能是在一个字符串中搜索另外一个字符串。例如我们现在需要在 $_SERVER['HTTP_USER_AGENT']（即所谓的haystack）变量中寻找'MSIE'。如果在这个haystack中该字符串（即所谓的needle）被找到，则函数返回 needle 在 haystack 中相对于开头的位置；如果没有，则返回 FALSE。如果该函数没有返回 FALSE，*/
    if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE) {
        echo '正在使用 Firefox<br />';
       }


?>