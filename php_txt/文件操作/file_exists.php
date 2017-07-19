<?php

/*
file_exists — 检查文件或目录是否存在

bool file_exists ( string $filename )

检查文件或目录是否存在。

参数: 
filename
文件或目录的路径。 
在 Windows 中要用 //computername/share/filename 或者 \\computername\share\filename 来检查网络中的共享文件。

返回值: 
如果由 filename 指定的文件或目录存在则返回 TRUE，否则返回 FALSE。 

*/

$filename = '/path/to/foo.txt';

if (file_exists($filename)) {
    echo "The file $filename exists";
} else {
    echo "The file $filename does not exist";
}