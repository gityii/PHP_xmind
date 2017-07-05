<?php
//搜索目录：

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

/*scandir — 列出指定路径中的文件和目录
array scandir ( string $directory [, int $sorting_order [, resource $context ]] )

参数:  
directory        要被浏览的目录 
sorting_order    默认的排序顺序是按字母升序排列。如果使用了可选参数 sorting_order（设为 1），则排序顺序是按字母降序排列。 

返回值: 
成功则返回包含有文件名的 array，如果失败则返回 FALSE。如果 directory不是个目录，则返回布尔值 FALSE 并生成一条 E_WARNING 级的错误。

*/



/*is_dir — 判断给定文件名是否是一个目录
bool is_dir ( string $filename )

参数: 
filename    如果文件名存在并且为目录则返回 TRUE。如果 filename 是一个相对路径，则按照当前工作目录检查其相对路径。

返回值: 
如果文件名存在，并且是个目录，返回 TRUE，否则返回FALSE


*/


