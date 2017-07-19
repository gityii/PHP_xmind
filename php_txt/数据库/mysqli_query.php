<?php

/*
mysqli::query -- mysqli_query
对数据库执行一次查询，query为查询数据库的命令字符串
mixed mysqli_query ( mysqli $link , string $query [, int $resultmode = MYSQLI_STORE_RESULT ] )

参数
link :  仅以过程化样式：由mysqli_connect() 或 mysqli_init() 返回的链接标识。
query:  The query string. Data inside the query should be properly escaped. 

 
返回值：函数执行某个针对数据库的查询，针对成功的 SELECT、SHOW、DESCRIBE 或 EXPLAIN 查询，将返回一个 mysqli_result 对象。针对其他成功的查询，将返回 TRUE。如果失败，则返回 FALSE。
*/