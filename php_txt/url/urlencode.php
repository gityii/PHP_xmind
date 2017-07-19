<?php

/*
urlencode — 编码 URL 字符串
string urlencode ( string $str )
此函数便于将字符串编码并将其用于 URL 的请求部分，同时它还便于将变量传递给下一页。 

参数: 
str  要编码的字符串。 

返回值:
返回字符串，此字符串中除了 -_.之外的所有非字母数字字符都将被替换成百分号（%）后跟两位十六进制数，空格则编码为加号（+）。此编码与 WWW 表单 POST 数据的编码方式是一样的，同时与 application/x-www-form-urlencoded的媒体类型编码方式一样。由于历史原因，此编码在将空格编码为加号（+）方面与 » RFC3896 编码（参见 rawurlencode()）不同。 
*/