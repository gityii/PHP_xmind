<?php

/*
mysqli_fetch_row
mysqli_result::fetch_row -- mysqli_fetch_row — Get a result row as an enumerated array

面向对象风格
mixed mysqli_result::fetch_row ( void )

过程化风格
mixed mysqli_fetch_row ( mysqli_result $result )

 Fetches one row of data from the result set and returns it as an enumerated array, where each column is stored in an array offset starting from 0 (zero). Each subsequent call to this function will return the next row within the result set, or NULL if there are no more rows.

 
参数 
result 
仅以过程化样式：由 mysqli_query()，mysqli_store_result() 或 mysqli_use_result()返回的结果集标识。

返回值
mysqli_fetch_row() returns an array of strings that corresponds to the fetched row or NULL if there are no more rows in result set. 


同mysql_result()一样，mysql_fetch_row()也可以用来获取查询结果集，其区别在于函数的返回值不是一个字符串，而是一个数组。

参数说明如下。
result：由函数mysql_query()或mysql_db_query()返回的结果标识，用来指定所要获取的数据的SQL语句类型。
函数返回值如下。
成功：一个数组，该数组包含了查询结果集中当前行数据信息，数组下标范围0～记录属性数−1，数组中的第i个元素值为该记录第i个属性上的值。
*/

//这个需要实际试一试

$link = mysqli_connect("localhost", "my_user", "my_password", "world");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query = "SELECT Name, CountryCode FROM City ORDER by ID DESC LIMIT 50,5";

if ($result = mysqli_query($link, $query)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        printf ("%s (%s)\n", $row[0], $row[1]);
    }

    /* free result set */
    mysqli_free_result($result);
}

/* close connection */
mysqli_close($link);


