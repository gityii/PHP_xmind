<?php
    header("Content-type: text/html; charset=utf-8"); 

    //数据库连接操作
    $conn = mysqli_connect("localhost","root","") or die("Can not connect to database.Fatal error handle by ". __FILE__);
mysqli_select_db($conn, "test");            //数据库名为 test
    mysqli_query($conn, "SET NAMES utf8");
    
    //获取父级id
    $pid = (int)$_POST['pid'];
    
    //查询子级
    $sql = "SELECT id,text FROM `wuxianjilian` WHERE pid={$pid}";
    $result = mysqli_query($conn, $sql);
    
    //组装子级下拉菜单
    $html = '';
    while($row = mysqli_fetch_assoc($result)){
        $html .= '<option value="'.$row['id'].'">'.$row['text'].'</option>';
    }

    if(!empty($html)) $html = '<select class="selection"><option value="">请选择</option>' . $html . '</select>';
    
    //输出下拉菜单
    echo json_encode($html);
//End_php