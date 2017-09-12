<?php

/*通过 HTTP POST 方法传递给当前脚本的变量的数组。 

一、$_Get()和$_Post()函数是用来传值的，即对应两种提交表单的方法，get和post

1.php代码：

<a  herf="2.php?id='10'&name='xiaoqiang'">传值</a>  在1.php中单击超链接传值

2.2.php代码：

<?php

echo "$_Get['id']";

echo "$_Post['name']";

?>


(2)$_Get方法动态传值

<a href="newfile.php?page=<?php echo "java";?>&pageone=<?php echo "1";?>">GET方法动态传值</a>



三、$_Post()函数

（1）常规单个传值

<html>

<head>

</head>

<body>

<form action="" method="post">

<input type="text" name="test" />

<?php>

echo "$_Post['test']";  //获取文本框中的值，并且在当前页中显示

?>

</body>

</html>


（2）多个传值（复选框、下拉框等，通过为name设定数据组进行传值）

<html>
<head>
</head>
<body>
<form action="" method="post">  //action为空表示，在当前页面处理
<input type="checkbox" name="sports[]" value="篮球">篮球
<input type="checkbox" name="sports[]" value="足球">足球
<input type="checkbox" name="sports[]" value="乒乓球">兵乓球
<input type="submit" name="sumbit1" value="提交">
</form>
<?php 
if(isset($_POST['sumbit1'])) //issset()函数的作用是：判断提交按钮是否单击，即是否已提交
{
    echo "<br />\n";
    echo "你选择的运动是：<br />\n";
    foreach ($_POST['sports'] as $sports)//
    {
        echo "$sports";
        echo "<br />\n";
    }    
}
?>
</body>
</html>















