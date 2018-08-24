<?php 
defined('IN_TS') or die('Access Denied.');


// 采集
// echo "collect.php";
// echo "collect2.php";
include 'userinfo.php';
// var_dump($userid);die;
// echo "collect3.php";
// 难道是 include 'userinfo.php' 出现问题了？其中内容执行不下去了

$page = isset($_GET['page']) ? intval($_GET['page']) : '1';

// http://ts/index.php?user=my&ac=collect&id=`userid`&page=`page`
$url = tsUrl('user','collect',array('id'=>$strUser['userid'],'page'=>''));
$lstart = $page*30-30;

// 小组话题(小组帖子)
$arrTopicLists = $new['user']->findAll('group_topic_collect',array(
	'userid'=>$strUser['userid'],
),'addtime desc',null,$lstart.',30');

foreach($arrTopicLists as $key=>$item){
	$arrTopicList[] = aac('group')->getOneTopic($item['topicid']);
}

$topicNum = $new['user']->findCount('group_topic_collect',array(
	'userid'=>$strUser['userid'],
));
$pageUrl = pagination($topicNum, 30, $page, $url);

$title = $strUser['username'].'的喜欢';
include template('collect');