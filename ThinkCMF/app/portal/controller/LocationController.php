<?php
namespace app\portal\controller;
use cmf\controller\HomeBaseController;
use tree\Tree;
use think\Db;

/**
 * 
 */
class LocationController extends HomeBaseController
{
	private $allCity = [];
	
	public function _empty($name) {
		return $this->success('true');
	}

	public function _initialize() {
		$allCity = Db::name('admin_location')->where(['status' => 1])->select();
		$this->allCity = $allCity;
	}

	// 获取下一级城市列表
	public function getChildCity($pid = 1) {
		$pid = input('get.pid/d');
		$data = Db::name('admin_location')->where(['parent_id'=> $pid, 'status' => 1])->select();
		// return isset($data);
		// if (isset($data)) {
		// 	$data = $this->getBrotherCity($pid);
		// }
		return $data;
	}

	// 通过城市id获取该城市的详细信息
	private function getCity($id) {
		$self = Db::name('admin_location')->where(['id' => $id,'status' => 1])->find();
		return $self;
	}

	// 给定子分类id，查找到所有的祖分类，返回一个数组
	public function getParentCity($id) {
		$id = intval($id);
		static $tree;
		$self = $this->getCity($id);
		// var_dump($self);
		$tree[] = $self;

		$pid = $self['parent_id'];

		if ($pid > 0) {
			$this->getParentCity($pid);
		}
		// var_dump($tree);
		return $tree;
	}

	public function getBrotherCity($id) {

		$id = intval($id) ? intval($id) : input('get.id/d');
		$self = $this->getCity($id);
		$brothers = Db::name('admin_location')->where(['parent_id' => $self['parent_id'],'status' => 1])->select();
		return $brothers;
	}

	public function saveCity() {
		$id = input('post.id/d');
		$user = cmf_get_current_user();
		$uid = $user['id'];
		$db = db('user_location');
		if ($db->where('user_id',$uid)->find()) {
			$r = $db->where('user_id', $uid)->update(['location_id' => $id]);
		} else {
			$r = $db->insert(['user_id' => $uid, 'location_id' => $id]);
		}
		$this->success('添加成功',url('article/index'));
		return '保存成功';
		$this->error('保存成功');
	}






}


?>