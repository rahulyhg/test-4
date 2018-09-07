<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2018 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: Powerless < wzxaini9@gmail.com>
// +----------------------------------------------------------------------
namespace app\user\controller;

use think\Validate;
use think\Image;
use think\Db;
use cmf\lib\Storage;
use cmf\controller\UserBaseController;
use app\user\model\UserModel;

class PhotoController extends UserBaseController
{
    function _initialize()
    {
        parent::_initialize();
    }

    /**
     * 用户发表照片作品视图
     */
    public function addView()
    {
        $roles = ls_get_art_role();
        $copyrights = ls_get_copyright();

        $this->assign('roles', $roles);
        $this->assign('copyrights', $copyrights);
        return $this->fetch("");
    }

    /**
     * 上传照片的操作
     */
    public function photoUpload()
    {
        if (!$this->request->isPost()) {
            $this->error("非法操作！", '/', '', '2');
        }

        // 图片处理
        if (!$this->request->file('photo')) {
            $this->error("请确认您是否选择了要上传的图片！");
        }

        $file   = $this->request->file('photo');

        $res = $file->validate(['ext'  => 'jpg,jpeg,png,bmp'])->move('.' . DS . 'upload' . DS . 'opus_img' . DS);
        if ($res) {
            $savename = $res->getSaveName();
            $pathName = './upload/opus_img/' . $savename;
            $Img      = Image::open($pathName);
            // $Img->text('添加个人网址');
            // 无损缩放分辨率过高的照片
            $maxPix   = 2000;
            $Img->thumb($maxPix, $maxPix)->save($pathName, null, 100, false);
            // return true;
        }

        print_r(input(''));die;
        $validate = new Validate([
            'title'     => 'require',
            'sheying'   => 'require',
            'madou'     => 'require',
            'copyright' => 'require',
        ]);
        $validate->message([
            'title.require'     => '作品标题必须填写',
            'sheying.require'   => '摄影师必须选择',
            'madou.require'     => '麻豆必须选择',
            'copyright.require' => '版权必须声明',
        ]);

        $data = $this->request->post();
        if (!$validate->check($data)) {
            $this->error($validate->getError());
        }

        
    }





    

}
