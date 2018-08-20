<?php
/**
 * Created by PhpStorm.
 * User: xfd
 * Date: 2018/8/17
 * Time: 00:17
 */

defined('IN_TS') or die('Access Denied.');

class citys extends tsApp{

    public function __construct($db){
    	// $db 是默认传入的一个mysql对象 所有的app都用的这个$db对象
        $tsAppDb = array();
        include 'app/citys/config.php';
        //判断APP是否采用独立数据库
        if($tsAppDb){
            $db = new MySql($tsAppDb);
        }

        parent::__construct($db);
    }

    public function __destruct(){
        
    }
}