<!-- "livesearch.php" 中的源代码会搜索 XML 文件中匹配搜索字符串的标题，并返回结果 -->

<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("links.xml");

$x=$xmlDoc->getElementsByTagName('link');

// 从 URL 中获取参数 q 的值
$q=$_GET["q"];

// 如果 q 参数存在则从 xml 文件中查找数据
if (strlen($q)>0)
{
	$hint="";
	for($i=0; $i<($x->length); $i++)
	{
		$y=$x->item($i)->getElementsByTagName('title');
		$z=$x->item($i)->getElementsByTagName('url');
		if ($y->item(0)->nodeType==1)
		{
			// 找到匹配搜索的链接
			if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q))
			{
				if ($hint=="")
				{
					$hint="<a href='" . 
					$z->item(0)->childNodes->item(0)->nodeValue . 
					"' target='_blank'>" . 
					$y->item(0)->childNodes->item(0)->nodeValue . "</a>";
				}
				else
				{
					$hint=$hint . "<br /><a href='" . 
					$z->item(0)->childNodes->item(0)->nodeValue . 
					"' target='_blank'>" . 
					$y->item(0)->childNodes->item(0)->nodeValue . "</a>";
				}
			}
		}
	}
}

// 如果没找到则返回 "no suggestion"
if ($hint=="")
{
	$response="no suggestion";
}
else
{
	$response=$hint;
}

// 输出结果
echo $response;

/*
如果 JavaScript 发送了任何文本（即 strlen($q) > 0），则会发生：

    加载 XML 文件到新的 XML DOM 对象
    遍历所有的 <title> 元素，以便找到匹配 JavaScript 所传文本
    在 "$response" 变量中设置正确的 URL 和标题。如果找到多于一个匹配，所有的匹配都会添加到变量。
    如果没有找到匹配，则把 $response 变量设置为 "no suggestion"。

*/	