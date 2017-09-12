<?php

/*一个变量的值作为另一个变量的变量名。
一个变量的变量名可以动态的设置和使用。
一个可变变量获取了一个普通变量的值作为这个可变变量的变量名。例如：
 
<?php
$a = 'hello';
$$a = 'world';
?> 

这时，两个变量都被定义了：$a 的内容是"hello"并且 $hello 的内容是"world"。因此，以下语句：

<?php
echo "$a ${$a}";
?> 

与以下语句输出完全相同的结果： 

<?php
echo "$a $hello";
?> 


要将可变变量用于数组，必须解决一个模棱两可的问题。这就是当写下 $$a[1]时，解析器需要知道是想要 $a[1]作为一个变量呢，还是想要 $$a作为一个变量并取出该变量中索引为 [1] 的值。解决此问题的语法是，对第一种情况用 ${$a[1]}，对第二种情况用 ${$a}[1]。 


