<?php

/*
gmdate — 格式化一个 GMT/UTC 日期／时间
同 date()函数完全一样，只除了返回的时间是格林威治标准时（GMT）。

string gmdate ( string $format [, int $timestamp ] )


*/
echo date("M d Y H:i:s", mktime (0,0,0,1,1,2000));
echo gmdate("M d Y H:i:s", mktime (0,0,0,1,1,2000));
