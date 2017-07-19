<?php

/*nowdoc相对于原型文档正如单引号对于双引号一样，在nowdoc里的任何变量不会被替换为该变量的值*/

$var = 23;
$string = <<<'EOD'
string with $var
EOD;
