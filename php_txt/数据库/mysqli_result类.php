<?php
/*
类摘要 

mysqli_result {

//属性 

int $current_field ;
 
int $field_count;
 
array $lengths;
 
int $num_rows;

//方法 

int mysqli_field_tell ( mysqli_result $result )
 
bool data_seek ( int $offset )
 
mixed fetch_all ([ int $resulttype = MYSQLI_NUM ] )
 
mixed fetch_array ([ int $resulttype = MYSQLI_BOTH ] )
 
array fetch_assoc ( void )
 
object fetch_field_direct ( int $fieldnr )
 
object fetch_field ( void )
 
array fetch_fields ( void )
 
object fetch_object ([ string $class_name = "stdClass" [, array $params ]] )
 
mixed fetch_row ( void )
 
int mysqli_num_fields ( mysqli_result $result )
 
bool field_seek ( int $fieldnr )
 
void free ( void )
 
array mysqli_fetch_lengths ( mysqli_result $result )
 
int mysqli_num_rows ( mysqli_result $result )
 }
 
 */