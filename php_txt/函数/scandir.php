<?php

/*
scandir — 列出指定路径中的文件和目录
array scandir ( string $directory [, int $sorting_order [, resource $context ]] )
返回一个 array，包含有 directory 中的文件和目录。 

参数： 
directory       要被浏览的目录 
sorting_order  
默认的排序顺序是按字母升序排列。如果使用了可选参数 sorting_order（设为 1），则排序顺序是按字母降序排列。 
*/


scandir('.');// 以当前目录为起点
/*
is_dir — 判断给定文件名是否是一个目录
如果文件名存在并且为目录则返回 TRUE。如果 filename 是一个相对路径，则按照当前工作目录检查其相对路径。
如果文件名存在，并且是个目录，返回 TRUE，否则返回FALSE。
*/ 
