

<?php
//PHP 脚本加载 XML 文档，"cd_catalog.xml"，运行针对 XML 文件的查询，并以 HTML 返回结果
$q=$_GET["q"];

$xmlDoc = new DOMDocument();
$xmlDoc->load("cd_catalog.xml");

$x=$xmlDoc->getElementsByTagName('ARTIST');

for ($i=0; $i<=$x->length-1; $i++)
{
	// 处理元素节点
	if ($x->item($i)->nodeType==1)
	{
		if ($x->item($i)->childNodes->item(0)->nodeValue == $q)
		{
			$y=($x->item($i)->parentNode);
		}
	}
}

$cd=($y->childNodes);

for ($i=0;$i<$cd->length;$i++)
{ 
	// 处理元素节点
	if ($cd->item($i)->nodeType==1)
	{
		echo("<b>" . $cd->item($i)->nodeName . ":</b> ");
		echo($cd->item($i)->childNodes->item(0)->nodeValue);
		echo("<br>");
	}
}

/*
当 CD 查询从 JavaScript 发送到 PHP 页面时，将发生：

    PHP 创建 XML DOM 对象
    查找所有 <artist> 元素中与 JavaScript 所传数据相匹配的名字
    输出 album 的信息，并发送回 "txtHint" 占位符

*/