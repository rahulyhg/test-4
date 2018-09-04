<?php 
defined('IN_TS') or die('Access Denied.');

// summerTree!
// app:图片作品

class opusphoto extends tsApp{

	//构造函数
	public function __construct($db){
        $tsAppDb = array();
		include 'app/opusphoto/config.php';
		//判断APP是否采用独立数据库
		if($tsAppDb){
			$db = new MySql($tsAppDb);
		}
	
		parent::__construct($db);
	}
	
	// 获取一张照片
	function getPhoto($photoid){
		$photo = $this->find('opus_photo', ['id'=>photoid]);
		return $strPhoto;
	}

	// 获取一张照片的所有信息（关联作者表、exif表、得分表）
	function getPhotoinfo($photoid) {
		
	}

	
	function getSamplePhoto($photoid){
		$strPhoto = $this->db->once_fetch_assoc("select path,photourl from ".dbprefix."photo where photoid='$photoid'");
		return $strPhoto;
	}
	
	//是否存在图片 
	public function isPhoto($photoid){
		$photoNum = $this->findCount('photo',array(
			'photoid'=>$photoid,
		));
		
		if($photoNum > 0){
			return true;
		}else{
			return false;
		}
		
	}
	
	//删除相册
	public function deletePhotoAlbum($albumid){
		
			$this->delete('photo_album',array(
				'albumid'=>$albumid,
			));
			
			$arrPhoto = $this->findAll('photo',array(
				'albumid'=>$albumid,
			));
			
			foreach($arrPhoto as $key=>$item){
				unlink('uploadfile/photo/'.$item['photourl']);
			}
			
			$this->delete('photo',array(
				'albumid'=>$albumid,
			));
		
	}
	

}