<?php
/**
 * Created by PhpStorm.
 * User: v_ransu
 * Date: 2017/12/28
 * Time: 10:02
 */
namespace app\record\controllers;

use base\controllers\db;
use base\controllers\web;
use base\controllers\page;
use base\controllers\file;


class record
{

    public static function pcrecord()
    {
        $ruleid = web::get('id');
        $where = '';
        if ($ruleid != '') {
            $where = ' where `ruleid`=\'' . $ruleid . '\'';
        }
        $per = 20;
        $countdata = db::first('select count(*) from `t_rule`' . $where);
        $recordcount = $countdata['count(*)'];
        page::init(0, $recordcount, $per);
//        $list = db::query_get('select * from `t_rule`'.$where);
//        $rules = db::query_get('select `ruleid`,`name` from `t_family` where `name`!=\'\' order by `id` asc');
        web::layout('admin/views/layout/admin');
        web::render('record/views/pcrecord', array(
//            'list'=>$list,
//            'rules'=>$rules,
//            'ruleid'=>$ruleid
        ));
    }


    public static function group()
    {
//        $ruleid = web::get('id');
//        $where = '';
//        if ($ruleid!='')
//        {
//            $where = ' where `ruleid`=\''.$ruleid.'\'';
//        }
//        $per = 20;
//        $countdata = db::first('select count(*) from `t_group`'.$where);
//        $recordcount = $countdata['count(*)'];
//        page::init(0,$recordcount,$per);
        $list = db::query_get('select * from `t_group` order by `date` asc');
        web::layout('admin/views/layout/admin');
        web::render('record/views/group',array(
            'list'=>$list
        ));

    }
    public static function groupaddroute()
    {
        $msg = array();
        $success = false;
        $error = '';

        web::render('/record/views/groupaddtest', array(
            'success' => $success,
            'error' => $error,
            'msg' => $msg,
            'data' => array(
//                'grade' => $postgrade,

            ),
//            'grades' => $grades,
//            'familys' => $familys,
//            'classes' => $postclass,
        ));
    }


    public static function groupaddtest()
    {
        $msg = array();
        $success = false;
        $error = '';
        $project = '';
        $family = '';
        $objects = '';
        $postgrade = '';
      //  $postclass = '';
        $postfamily = '';
        $val = '';
        $comments = '';
        $types = array();
        $ftypes = array();
        $grades = array();
        $familys = array();
        $chtml = '';
        $ghtml = '';
//        $family = db::query_get('select `id`,`name` from `t_family` where `id`!=\'\'');
//        foreach ($family as $v) {
//            $familys[$v['id']] = $v['name'];
//        }
//        if (!empty($_POST))
//        {

//            $postclass = web::post('class', '');


            $grade = db::query_get('select `grade` from `t_school`');

            foreach ($grade as $v) {
                $ghtml .= '<option value="' . $v['grade'] . '">' . $v['grade'] . '</option>';
            }

            if(!empty($_POST['grade']))
            {
                $postgrade = web::post('grade', '');

               $postclass = db::query_get('select `class` from `t_school` where `grade`='.$postgrade.'');
                //$postclass = db::query_get('select `grade` from `t_school`');

                foreach ($postclass as $v) {
                    $chtml .= '<option value="' . $v['class'] . '">' . $v['class'] . '</option>';
                }
            }


//            $row = mysqli_fetch_assoc($class);

//            //组装子级下拉菜单
//            $html = '';
//            while ($row = mysqli_fetch_assoc($class)) {
//            $html .= '<option value="' . $row['id'] . '">' . $row['class'] . '</option>';
//        }


                if(($postgrade==0)){
                    $html = '父类： <select id="fulei" class=""><option value="">请选择</option>' . $ghtml . '</select>';

                }else{
                    $html = '<div class="zilei">子类： <select id="" ><option value="">请选择</option>' . $chtml . '</select>
                    </div>';
                }


            //输出下拉菜单
//        }
        echo($html);
//                exit();
//        echo json_encode($html);


//       // web::layout('/admin/views/layout/admin');
//        web::render('/record/views/groupaddtest', array(
//            'success' => $success,
//            'error' => $error,
//            'msg' => $msg,
//            'data' => array(
//                'grade' => $postgrade,
//
//            ),
//            'grades' => $grades,
//            'familys' => $familys,
//            'classes' => $postclass,
//        ));

    }





    public static function groupadd()
    {
        $msg = array();
        $success = false;
        $error = '';
        $project = '';
        $family = '';
        $objects = '';
        $postgrade = '';
        $postclass = '';
        $postfamily = '';
        $val = '';
        $comments = '';
        $types = array();
        $ftypes = array();
        $grades = array();
        $familys = array();
        $ftypes[0] = '个人';
        $ftypes[1] = '集体';

        $grade = db::query_get('select `id`,`grade` from `t_grade` where `id`!=\'\'');
        foreach ($grade as $v) {
            $grades[$v['id']] = $v['grade'];
        }

        $family = db::query_get('select `id`,`name` from `t_family` where `id`!=\'\'');
        foreach ($family as $v) {
            $familys[$v['id']] = $v['name'];
        }

        if (!empty($_POST)) {
            $project = web::post('project', '');
            $postfamily = web::post('family', '');
            $objects = web::post('objects', '');
            $val = web::post('val', '');
            $comments = web::post('comments', '');
            $postgrade = web::post('grade', '');
            $postclass = web::post('class', '');

            $class = db::query_get('select `id`,`class` from `t_shool` where `grade`=\''.$postgrade.'\'');


            foreach ($class as $v) {
                $types[$v['id']] = $v['class'];
            }

            $isin = in_array($postclass, $types);
            if($isin){
            } else{
                $msg['class'] = "输入的班级号超出范围";
            }


            if ($project == '') {
                $msg['project'] = '请输入项目名称';
            } else if (web::strlen($project) > 240) {
                $msg['project'] = '项目名称不能超过100个汉字';

            }

            $val = db::first('select `val` from `t_rule` where `project`=\'' . $project.'\' and `family`=\''.$postfamily.'\'');


            if (web::strlen($comments) > 1000) {
                $msg['content'] = '备注内容太长';
            }

            $getid = db::first('select `ruleid` from `t_family` where `name`=\'' . $family . '\'');

            if (empty($msg)) {
                $data = array(
                    'project' => $project,
                    'family' => $family,
                    'ruleid' => $getid['ruleid'],
                    'objects' => $objects,
                    'val' => $val,
                    'comments' => $comments,
                );

                if (db::insert('t_rule', $data)) {
                    $success = true;
                } else {
                    $error = '提交失败';
                }
            }

        }

        web::layout('/admin/views/layout/admin');
        web::render('/record/views/groupadd', array(
            'success' => $success,
            'error' => $error,
            'msg' => $msg,
            'data' => array(
                'grade' => $postgrade,
                'class' => $postclass,
                'project' => $project,
                'family' => $postfamily,
                'comments' => stripslashes($comments),
                'objects' => $objects,
                'val' => $val
            ),
            'grades' => $grades,
            'familys' => $familys,
            'ftypes' => $ftypes
        ));

    }





    public static function pcadd()
    {
        $msg = array();
        $success = false;
        $error = '';
        $project = '';
        $family = '';
        $objects = '';
        $val = '';
        $comments = '';
        $types = array();

        $types_data = db::query_get('select `ruleid`,`name` from `t_family` where `name`!=\'\'');
        foreach ($types_data as $v) {
            $types[$v['ruleid']] = $v['name'];
        }

        if (!empty($_POST)) {
            $project = web::post('project', '');
            $family = web::post('family', '');
            $objects = web::post('objects', '');
            $val = web::post('val', '');
            $comments = web::post('comments', '');

            if ($project == '') {
                $msg['project'] = '请输入项目名称';
            } else if (web::strlen($project) > 240) {
                $msg['project'] = '项目名称不能超过100个汉字';

            }

            if ($objects != '集体' && $objects != '个人') {
                $msg['objects'] = '请输入集体或个人';
            }

            if (web::strlen($comments) > 1000) {
                $msg['content'] = '备注内容太长';
            }

            $getid = db::first('select `ruleid` from `t_family` where `name`=\'' . $family . '\'');

            if (empty($msg)) {
                $data = array(
                    'project' => $project,
                    'family' => $family,
                    'ruleid' => $getid['ruleid'],
                    'objects' => $objects,
                    'val' => $val,
                    'comments' => $comments,
                );

                if (db::insert('t_rule', $data)) {
                    $success = true;
                } else {
                    $error = '提交失败';
                }
            }

        }

        web::layout('/admin/views/layout/admin');
        web::render('/guiding/views/ruleadd', array(
            'success' => $success,
            'error' => $error,
            'msg' => $msg,
            'data' => array(
                'project' => $project,
                'family' => $family,
                'comments' => stripslashes($comments),
                'objects' => $objects,
                'val' => $val
            ),
            'types' => $types
        ));

    }


    public static function pcdel()
    {
        $id = intval(web::post('id', 0));
        $res = array(
            'status' => 1,
            'msg' => '',
            'id' => 0
        );

        if (db::delete('t_rule', '`id`=\'' . $id . '\'')) {
            $res['status'] = 0;
            $res['id'] = $id;
        } else {
            $res['msg'] = '删除失败';
        }
        echo json_encode($res);
    }


    public static function pcedit()
    {
        $id = web::request('id','');
        $msg = array();
        $success = false;
        $error = '';
        $project = '';
        $family = '';
        $objects = '';
        $val = '';
        $ruleid = '';
        $comments = '';
        $types = array();
        $types_data = db::query_get('select `ruleid`,`name` from `t_family` where `name`!=\'\'');
        foreach ($types_data as $v){
            $types[$v['ruleid']] = $v['name'];
        }

        if ($id>0)
        {
            $info = db::first('select `project`,`family`,`ruleid`,`objects`,`val`,`comments` from `t_rule` where `id`=\''.$id.'\'');

            if (!empty($info))
            {
                $project = $info['project'];
                $family = $info['family'];
                $objects = $info['objects'];
                $ruleid = $info['ruleid'];
                $val = $info['val'];
                $comments= $info['comments'];
            }else {
                $msg['title'] = '查询有误，请核实数据';
            }
        }else{
            $msg['title'] = '请求数据有误';
        }


        if (!empty($_POST))
        {

            $project = web::post('project', '');
            $family = web::post('family', '');
            $objects = web::post('objects', '');
            $val = web::post('val', '');
            $comments = web::post('comments', '');

            if ($project == '')
            {
                $msg['project'] = '请输入项目名称';
            }else if (web::strlen($project) > 240)
            {
                $msg['project'] = '长度太长';

            }

            if ($objects != '集体' && $objects != '个人')
            {
                $msg['objects'] = '请输入集体或个人';
            }


            if (web::strlen($comments) > 1000)
            {
                $msg['content'] = '备注内容太长';
            }

            $getid = db::first('select `ruleid` from `t_family` where `name`=\''.$family.'\'');


            if (empty($msg))
            {
                $data = array(
                    'project' => $project,
                    'family' => $family,
                    'ruleid' => $getid['ruleid'],
                    'objects' => $objects,
                    'val' => $val,
                    'comments' => $comments,
                );


                if ($id == 0 )
                {
                    $error = '参数错误';
                }else if (db::update('t_rule',$data,'`id`=\''.$id.'\'')) {
                    $success = true;
                    $error = '';
                }else {
                    $error = '保存失败，请重试';
                }
            }
        }

        web::layout('/admin/views/layout/admin');
        web::render('/guiding/views/edit', array(
            'id' => $id,
            'success' => $success,
            'error' => $error,
            'msg' => $msg,
            'data' => array(
                'project' => $project,
                'family' => $family,
                'ruleid' => $ruleid,
                'comments' => stripslashes($comments),
                'objects' => $objects,
                'val' => $val
            ),
            'types' => $types
        ));

    }

    public static function mobrecord()
    {

    }

    public static function batchrecord()
    {

    }


    public static function queryrecord()
    {

    }


    public static function punish()
    {

    }



}