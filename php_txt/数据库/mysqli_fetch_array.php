<?php

/*
mysqli_result::fetch_array -- mysqli_fetch_array — Fetch a result row as an associative, a numeric array, or both

面向对象风格
mixed mysqli_result::fetch_array ([ int $resulttype = MYSQLI_BOTH ] )

过程化风格
mixed mysqli_fetch_array ( mysqli_result $result [, int $resulttype = MYSQLI_BOTH ] )


参数: 
result 
仅以过程化样式：由 mysqli_query()，mysqli_store_result() 或 mysqli_use_result()返回的结果集标识。
resulttype
 This optional parameter is a constant indicating what type of array should be produced from the current row data. The possible values for this parameter are the constants MYSQLI_ASSOC, MYSQLI_NUM, or MYSQLI_BOTH.
 
By using the MYSQLI_ASSOC constant this function will behave identically to the mysqli_fetch_assoc(),
 while MYSQLI_NUM will behave identically to the mysqli_fetch_row() function. 
 The final option MYSQLI_BOTH will create a single array with the attributes of both.
 
 返回值:
 Returns an array of strings that corresponds to the fetched row or NULL if there are no more rows in resultset. 
 
*/

