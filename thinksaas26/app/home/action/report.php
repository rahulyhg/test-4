<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/3
 * Time: 22:10
 */
defined('IN_TS') or die('Access Denied.');

switch ($ts){
    case "":



        $title = '举报中心';
        include template('report');
        break;

    case "do":

        $url = trim($_POST['url']);
        $content = trim($_POST['content']);

        if($url==''){
            tsNotice('举报链接不能为空');
        }

        $new['home']->create('anti_report',array(
            'url'=>$url,
            'content'=>$content,
            'addtime'=>date('Y-m-d H:i:s')
        ));

        tsNotice('举报提交成功！','点击返回',$url);

        break;
}