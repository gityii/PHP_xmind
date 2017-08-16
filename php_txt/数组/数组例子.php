<?php

$arr=array(1,2,4);
//赋值
$arr[]='xyz';
//赋值后的数组
print_r($arr);

echo "<br/>";
/*
$nA = [];
$nA[ ] = 0;这个写法是给$nA[0]赋值为0，还是给$nA全部赋值为0？
如果$nA里面没值得话，就应该给键名0赋值为0，如果$nA有值得话，就追加一个值为0的元素
没有值的话，比如只是 $nA = []; $nA[ ] = 0;指的是给键值为0 也就是第一个赋值为0
这种写法通常是用来存储
 */

/*以下为数组的赋值运算*/
$pA = [];
$nA = [];
$cityId = 1;

if($cityId){
    $pA = $pA;
    $nA = $nA;
}else{
    $nA[] = $pA[] = 0;
}
//$nA[] = $pA[] = 0;
$provCount_n = $provCount_p = 0;
$dataArray = array(
    array('normal'=> 4, 'people' => 10),
    array('normal'=> 2, 'people' => 20),
    array('normal'=> 3, 'people' => 30)
);
foreach ((array)$dataArray as $data) {
    $nA[] = $data['normal'];
    $pA[] = $data['people'];
    $provCount_n += $data['normal'];
    $provCount_p += $data['people'];
}
var_dump($nA);
echo "<br/>";
var_dump($provCount_n);
echo "<br/>";
$nA[0] = $provCount_n;
$pA[0] = $provCount_p;
var_dump($nA);
echo "<br/>";
var_dump($pA);



/*

namespace test;
define('test\HELLO', 'Hello world!');
define(__NAMESPACE__ . '\GOODBYE', 'Goodbye cruel world!');
	
*/	