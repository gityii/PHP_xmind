<?php
/*
在面向对象编程中，类是一个结构，这个结构定义属性和方法的集合。它可以被看作是一个模板。例如：

*/

class Item {
  public $itemType; /* e.g. this could be "Book" or "CD" */
  public $price;
  public function printPrice() { 
    echo "The price of this {$this->itemType} is {$this->price} dollars."; 
  }
}
$catch22 = new Item();
$catch22->itemType = "Book";
$catch22->price = 25;
$catch22->printPrice(); /* outputs The price of this Book is 25 dollars. */
$americanPrayer = new Item();
$americanPrayer->itemType = "CD";
$americanPrayer->price = 22;
$americanPrayer->printPrice(); /* outputs The price of this CD is 22 dollars */

/*
注意在这个例子中，$catch22 和 $americanPrayer 是两个对象。对象是一个类的实例。他们共享类定义的公共结构。公共结构由属性（上述例子中的 $itemType 和 $price）和方法（上述例子中的函数 printPrice() ）组成。然而，不同对象的熟悉可能不同。

在上述例子中，同一类的两个对象的 price 和 itemType 是不同的，但是两个对象都有一个 printPrice() 方法，一个  price 和一个 itemType 属性被使用。



比较表
							类 															对象
定义 						类是一个单个单元中绑定数据成员和相关方法的结构。 			类的实例或变量
存在 						它是一个逻辑存在 											它是一个物理存在
内存分配 					当它创建时，内存空间未分配 									当它创建时，要分配内存空间
声明/定义 					定义创建一次 												当你需要时可以创建很多次

理解类和对象之间的区别的另一种方法是把类作为模具，而对象是作为使用模具产生的物品。
*/


