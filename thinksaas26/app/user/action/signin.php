<?php 
defined('IN_TS') or die('Access Denied.');

// 啥意思？签到？用户签到？
// 需要改一下，总管理员和各区域管理员可以看看所负责的会员的情况
// 一键签到(连续签到)是付费版才有的功能，所以数据表相关的都没有

switch($ts){

    case "":
        if($new['user']->signin()){
            echo 1;exit;
        }else{
            echo 0;exit;
        }
        break;


    case "ajax":

        $userid = intval($_SESSION['tsuser']['userid']);
        var_dump($new['user']);
        $strSign = $new['user']->find('sign',array(
            'userid'=>$userid,
            'addtime'=>date('Y-m-d'),
        ));

        include template('signin_ajax');
        break;

}