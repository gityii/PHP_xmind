<?php
$vote = htmlspecialchars($_REQUEST['vote']);

// 获取文件中存储的数据
$filename = "poll_result.txt";
$content = file($filename);

// 将数据分割到数组中
$array = explode("||", $content[0]);
$yes = $array[0];
$no = $array[1];

if ($vote == 0)
{
  $yes = $yes + 1;
}

if ($vote == 1)
{
  $no = $no + 1;
}

// 插入投票数据
$insertvote = $yes."||".$no;
$fp = fopen($filename,"w");
fputs($fp,$insertvote);
fclose($fp);

/*
当所选的值从 JavaScript 发送到 PHP 文件时，将发生：

    获取 "poll_result.txt" 文件的内容
    把文件内容放入变量，并向被选变量累加 1
    把结果写入 "poll_result.txt" 文件
    输出图形化的投票结果

	
文本文件（poll_result.txt）中存储来自投票程序的数据。

它存储的数据如下所示：

3||4

第一个数字表示 "Yes" 的投票数，第二个数字表示 "No" 的投票数。

注释：请记得只允许您的 Web 服务器来编辑该文本文件。不要让其他人获得访问权，除了 Web 服务器 (PHP)。

*/

?>

<h2>结果:</h2>
<table>
  <tr>
  <td>是:</td>
  <td>
  <span style="display: inline-block; background-color:green;
      width:<?php echo(100*round($yes/($no+$yes),2)); ?>px;
      height:20px;" ></span>
  <?php echo(100*round($yes/($no+$yes),2)); ?>%
  </td>
  </tr>
  <tr>
  <td>否:</td>
  <td>
  <span style="display: inline-block; background-color:red;
      width:<?php echo(100*round($no/($no+$yes),2)); ?>px;
      height:20px;"></span>
  <?php echo(100*round($no/($no+$yes),2)); ?>%
  </td>
  </tr>
</table>

