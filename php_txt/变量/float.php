<?php

/*
浮点数的形式表示： 

LNUM          [0-9]+
DNUM          ([0-9]*[\.]{LNUM}) | ({LNUM}[\.][0-9]*)
EXPONENT_DNUM [+-]?(({LNUM} | {DNUM}) [eE][+-]? {LNUM})

*/

$a = 1.234; 
$b = 1.2e3; 
$c = 7E-10;
?> 