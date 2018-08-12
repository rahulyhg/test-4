<?php
defined('IN_TS') or die('Access Denied.');  

class home extends tsApp{
	
	//构造函数
	public function __construct($db){
		$tsAppDb = array();
		include 'app/home/config.php';

		//判断APP是否采用独立数据库
		if($tsAppDb){
			// $tsAppDb 内配置了数据库连接参数，则使用此参数创建连接对象
			$db = new MySql($tsAppDb);
		}
	
		parent::__construct($db);
	}
	
}
