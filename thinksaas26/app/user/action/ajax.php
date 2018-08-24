<?php 
defined('IN_TS') or die('Access Denied.');
switch($ts){
	case "login":
	
		$jump = $_SERVER['HTTP_REFERER'];

		
		include template("ajax_login");
		// 好像项目中没有 ajax_login 这个模板？
		
		break;
}