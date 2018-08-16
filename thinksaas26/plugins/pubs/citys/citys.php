<?php
defined('IN_TS') or die('Access Denied.');
//
function citys(){
//    $arrCity = aac('city')->findAll('weibo',null,'addtime desc',null,10);
//    foreach($arrWeibo as $key=>$item){
//        $arrWeibo[$key]['content'] = tsDecode($item['content']);
//        $arrWeibo[$key]['user'] = aac('user')->getOneUser($item['userid']);
//    }


    include template('citys','citys');
}

function citsy_css(){

    echo '<link href="'.SITE_URL.'plugins/home/weibo/style.css" rel="stylesheet" type="text/css" />';

}
function citys_js(){
    echo '<script src="'.SITE_URL.'plugins/home/weibo/weibo.js" type="text/javascript"></script>';
}

addAction('pub_index_right','citys');
addAction('pub_header_top','city_css');
addAction('pub_footer','citys_js');