<?php
// +----------------------------------------------------------------------
// | 花语，听花之耳语
// +----------------------------------------------------------------------
// | Copyright (c) 
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: summerTree!
// +----------------------------------------------------------------------
// 关于app的公共函数

use think\Db;
// use think\Url;
// use think\Config;
// use think\Route;
// use think\Loader;
// use think\Request;
// use dir\Dir;
// use cmf\lib\Storage;

// 得到所有艺术家角色
function ls_get_art_role() {
	$roles = Db::name('art_role')->field('id,name')->order('order', 'asc')->select();
	return $roles;
}

// 得到所有版权信息
function ls_get_copyright() {
	$crs = db('copyright')->field('id,content')->select();
	return $crs;
}

// 通过团队id得到某个团队详细信息
function ls_get_a_team($id) {

}

// 通过用户id找到他的好友
function ls_get_users_friends($id) {
	// $friends = 
}



