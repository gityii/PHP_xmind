<?php
/**
 * Created by PhpStorm.
 * User: v_ransu
 * Date: 2017/11/28
 * Time: 10:34
 */
namespace app\test\controllers;

use base\controllers\db;
use base\controllers\web;
use base\controllers\page;
use base\controllers\file;

class test
{

/*从原始数据中提取含A/B照的信息*/
    public static function proxys()
    {
        ini_set('max_execution_time', 0);//设置执行时间
        $count = db::count('proxys');//计算出原始表的条数
        //345690

      //  strpos
        $data = [];

       // $jsz = db::first('select * from `proxys` where `id`=345690');

        for($i=0;$i<$count;$i++)
        {
            $num = $i+345690;
            $jsz = db::first('select * from `proxys` where `id`=\''.$num.'\'');

            $data = array(
                'id'=>$jsz['id'],
                'uid'=>$jsz['uid'],
                'name'=>$jsz['name'],
                'sfznum'=>$jsz['sfznum'],
                'car_plate'=>$jsz['car_plate'],
                'vehicle_permitted_type'=>$jsz['vehicle_permitted_type']
            );


            if((stripos($jsz['vehicle_permitted_type'],'B')!== false)||(stripos($jsz['vehicle_permitted_type'],'A')!==false)){
                if (db::insert('proxysab',$data))//插入到新表中
                {
                    $success = true;
                    usleep(1000);
                }else {
                    $error = '提交失败，请重试';
                    echo $error;
                }
            }else{
//                echo '--'.'</pre>';
//                 var_dump(stripos($jsz['vehicle_permitted_type'],'B'));
//                var_dump(stripos($jsz['vehicle_permitted_type'],'A'));
            }
        }


    }

/*从proxysab表中分别取出A/B照，分别存入proxysa、proxysb表中*/
    public static function proxyab()
    {
        ini_set('max_execution_time', 0);
        $count = db::count('proxysab');
        //345690

        $data = [];

        for($i=0;$i<$count;$i++)
        {
            $j = $i +1;
            $jsz = db::first('select * from `proxysab` where `num`=\''.$j.'\'');

            $data = array(
                'id'=>$jsz['id'],
                'uid'=>$jsz['uid'],
                'name'=>$jsz['name'],
                'sfznum'=>$jsz['sfznum'],
                'car_plate'=>$jsz['car_plate'],
                'vehicle_permitted_type'=>$jsz['vehicle_permitted_type']
            );


            if((stripos($jsz['vehicle_permitted_type'],'B')!== false)){
                if (db::insert('proxysb',$data))
                {
                    $success = true;
                    usleep(100);
                }else {
                    $error = '提交失败，请重试';
                    echo $error;
                }
            }else if((stripos($jsz['vehicle_permitted_type'],'A')!==false)){
                if (db::insert('proxysa',$data))
                {
                    $success = true;
                    usleep(100);
                }else {
                    $error = '提交失败，请重试';
                    echo $error;
                }
            }else{
//                echo '--'.'</pre>';
//                 var_dump(stripos($jsz['vehicle_permitted_type'],'B'));
//                var_dump(stripos($jsz['vehicle_permitted_type'],'A'));
            }
        }

    }


    /*下面是逐行读取文件测试*/
    public static function filetest()
    {
       // $handler = '';
        $m = [];
        $RootDir = $_SERVER['DOCUMENT_ROOT']; //注意路径问题，为啥不能写相对路径
      //  echo($RootDir);
       $file_name = $RootDir.'.\modules\test\controllers\test6.txt';
        //echo "__DIR__: ========> ".__DIR__;
        //$file_name = '.\test6.txt';
        $handler = fopen($file_name,'r'); //打开文件

        while(!feof($handler)){
            $m[] = fgets($handler,4096); //fgets逐行读取，4096最大长度，默认为1024
        }

        fclose($handler); //关闭文件

//输出文件
        echo '<pre>';
        print_r($m);
        echo '</pre>';

        // echo phpinfo();

    }




  /*从文件中读取数据，过滤后写入表中*/
    public static function sqltest()
    {

        $m = [];
        $jsz = '';
        $data = [];
        $RootDir = $_SERVER['DOCUMENT_ROOT'];
        // echo($RootDir);
        $file_name = $RootDir.'.\modules\test\controllers\CLXX_CD2.sql';

        $handler = fopen($file_name,'r'); //打开文件

        $findc1 = '"vehicle_permitted_type":"C1"';
        $finda1 = '"vehicle_permitted_type":"A1"';
        $finda2 = '"vehicle_permitted_type":"A2"';
        $findb1 = '"vehicle_permitted_type":"B1"';
        $findb2 = '"vehicle_permitted_type":"B2"';
       // $newstr=substr($str,$index+7);

        $findcp = 'car_plate';

;        while(!feof($handler)){
            $m = fgets($handler,900000); //fgets逐行读取，4096最大长度，默认为1024
           // echo '<pre>';
            $test = explode(" ",$m);
         //  var_dump($test);
         //   echo '</pre>';
           // print_r($test[4]);
        $index = strpos($test[3],$findcp);

        $newstr= substr($test[3],$index+12,9);


           //// echo $newstr;
            //echo '</pre>';
              //echo $test[4];


            if(strpos($test[4],$findc1)) {
                continue;
                //$jsz = "C1";
            }else if(false != strpos($test[4],$finda1)){
                $jsz = "A1";
            }else if(false != strpos($test[4],$finda2)){
                $jsz = "A2";
            }else if(false != strpos($test[4],$findb1)){
                $jsz = "B1";
            }else if(false != strpos($test[4],$findb2)){
                $jsz = "B2";
            }else{
                echo '没有找到相关行驶证信息';
                continue;
            }

        $data = array(
            'ID'=>substr($test[0],2,-2),
            'XM'=>substr($test[1],1,-2),
            'GMSFHM' => substr($test[2],1,-2),
            'CPSFXX' => $newstr,
            'XSSFXX' => $jsz
        );

        //var_dump($data);

        if (db::insert('clxx_ab',$data))
        {
            $success = true;
        }else {
            $error = '提交失败，请重试';
            echo $error;
        }
            //print_r($test[4]['vehicle_permitted_type']);
           // echo '</pre>';
        }
        fclose($handler); //关闭文件


    }
}