<?php
/**
 * Created by PhpStorm.
 * User: xfd
 * Date: 2018/8/17
 * Time: 00:23
 */
defined('IN_TS') or die('Access Denied.');
// 后台管理

if($TS_USER['isadmin']==1 && is_file('app/'.$app.'/action/admin/'.$mg.'.php')){
    include_once 'app/'.$app.'/action/admin/'.$mg.'.php';
}else{
    qiMsg('sorry:no index!');
}
