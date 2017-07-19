<?php

/*
原型文档heredoc是一种封装字符串的替代方式，它的工作方式跟双引号一样，将被包裹的内容打印出来
原型文档以<<<开始，后面紧跟着分界符，分界符通常需要是全部大写的单词，他只能有字母、数字以及下划线组成，且不能以下划线开头。
在初始分界符之后，同一行里不能有任何其他内容，甚至，连一个多余的空格都不行
结束分解符必须位于单独一行的最前面（不容许有任何缩进），并且后边只能跟着一个分号
*/

$var = 23;
$that = 'test';
echo <<<EOT
somevar $var
thisvar $that
EOT;
$string = <<<EOD
string with $var \n
EOD;
echo $string;
/*使用EOD和EOT作为分界符是比较常见的方式，使用原型文档语法的结果和使用双引号完全一致*/LI

/*下面使用三种方式的比较，使用原型文档时，一定要注意起始分界符EOT之后就是回车或换行，而终止分界符必须要在一行的开始*/
echo <<<EOT
<li><input type="checkbox" name="tasks[task_id]" value="done"> $todo
EOT;

/*使用双引号的方式，需要太多的转义*/
echo"<li><input type=\"checkbox\" name=\"tasks[task_id]\" value=\"done"\>$todo";

/*使用单引号，不需要多次转义，但是又需要使用连接符*/
echo'<li><input type="checkbox" name="tasks['.$task_id . ']" value="done"> ' . $todo;



