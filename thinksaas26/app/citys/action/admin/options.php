<?php
defined('IN_TS') or die('Access Denied.');

switch($ts){
	//城市分类
	case "":
		$arrCity = $new['citys']->findAll('citys', ['parent_id'=>'0'], 'spell_order');

		foreach($arrCity as $key=>$item){
			$arrCitys[] = $item;
			$arrCitys[$key]['two'] = $new['citys']->findAll('citys', ['parent_id'=>$item['id']], 'spell_order');
		}


		foreach($arrCitys as $key=>$item){
		
			$arrCityss[] = $item;
			foreach($item['two'] as $tkey=>$titem){
			
				$arrCityss[$key]['two'][$tkey]['three'] = $new['citys']->findAll('citys', ['parent_id'=>$titem['id']], 'spell_order');
			}		
		}

		include template("admin/citys_list");
		break;


		//添加城市视图
		case "add":
			
			$parent_id = intval($_GET['parent_id']);
			$parent_city = $new['citys']->find('citys',array(
				'id'=>$parent_id,
			));

			include template("admin/citys_add");
			break;

		// 添加城市动作
		case "add_do":
			
			$o_citys = $new['citys'];
			$is_already = $o_citys->find('citys', ['name'=>t($_POST['name'])]);

			if ($is_already) {
				qiMsg("此城市名称已经存在，请核实后再录入，或联系管理员！");
			};

			$o_citys->create('citys',array(
			
				'name'=>t($_POST['name']),
				'spell_order'=>t($_POST['spell_order']),
				'status'=>intval($_POST['status']),
				'parent_id'=>intval($_POST['parent_id']),
			
			));
			
			header("Location: ".SITE_URL."index.php?app=citys&ac=admin&mg=options");
			break;

			// 删除城市动作
			case "del":
				
				$id = intval($_GET['id']);
				
				$db->query("delete from ".dbprefix."citys where id='$id'");
				
				qiMsg("删除成功！");
				break;

			// 编辑界面
			case "edit":
			
				$id = intval($_GET['id']);
				$parent_id = intval($_GET['parent_id']);
				
				$city = $db->once_fetch_assoc("select * from ".dbprefix."citys where id='$id'");

				$parent_city = $new['citys']->find('citys',array(
					'id'=>$city['parent_id']
				));

				include template("admin/citys_edit");
				
				break;
			
			//分类修改执行 
			case "edit_do":
				
				$id = intval($_POST['id']);
				$name = t($_POST['name']);
				$spell_order = t($_POST['spell_order']);
				$status = intval($_POST['status']);
				
				$data = ['name'=>$name, 'spell_order'=>$spell_order, 'status'=>$status];
				$conditions = ['id' => $id];

				$r = $new['citys']->update('citys', $conditions, $data);

				qiMsg('数据修改完成', $button = '', $url = SITE_URL."index.php?app=citys&ac=admin&mg=options", $isAutoGo = true);

				header("Location: ".SITE_URL."index.php?app=citys&ac=admin&mg=options");
				
				break;

}