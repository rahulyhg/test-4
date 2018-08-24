<?php 
defined('IN_TS') or die('Access Denied.');

$cityid = intval($_GET['cityid']);

$city = $new['user']->findAll('area',array(
	'fatherid'=>$cityid,
));

// var_dump($city);die; 'SELECT * FROM ts_area WHERE `fatherid` = 2 ', 没有ts_area这个表
// 估计是开发中的功能

echo '<select id="area" name="area">
			<option value="0">请选则区</option>';
				foreach($city as $k=>$v){
echo '<option value="'.$v['areaid'].'">'.$v['area'].'</option>';
		}
echo '</select>';