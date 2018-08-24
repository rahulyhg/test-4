<?php
defined('IN_TS') or die('Access Denied.');

//最多积分用户
$arrScoreUser  = $new['user']->getScoreUser(10);
// 我需要的是：
// 1、按照全国、省、市、区的划分
// 2、摄影作品得分最多的用户
// 3、教程得分最多的用户
// 4、还要划分为摄影师、模特、化妆师、后期制作的分类

//关注最多的用户
$arrFollowUser = $new['user']->getFollowUser(10);

//活跃会员
$arrHotUser    = $new['user']->getHotUser(10);

//最新会员
$arrNewUser    = $new['user']->getNewUser(10);

$title         = '用户';

$sitekey       = $TS_APP['appkey'];
$sitedesc      = $TS_APP['appdesc'];

include template('index');