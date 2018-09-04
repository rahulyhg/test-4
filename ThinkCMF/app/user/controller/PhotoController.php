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

use think\Image;
use think\Db;
use cmf\lib\Storage;
use cmf\controller\UserBaseController;
use app\user\model\UserModel;

class PhotoController extends UserBaseController
{

    /**
     * 用户发表照片作品视图
     */
    public function addView()
    {
        return $this->fetch("");
    }

    /**
     * 上传照片的操作
     */
    public function photoUpload()
    {
        $file   = $this->request->file('photo');
        

        // $res = $file->validate(['ext'  => 'jpg,jpeg,png,bmp'])->move('.' . DS . 'upload' . DS . 'opus_img' . DS);
        $res = $file->move('.' . DS . 'upload' . DS . 'opus_img' . DS);
        
        if ($res) {

            $savename = $res->getSaveName();
            $pathName = './upload/opus_img/' . $savename;
            $Img      = Image::open($pathName);
            // $Img->text('添加个人网址');
            // 无损缩放分辨率过高的照片
            $maxPix   = 2000;
            $Img->thumb($maxPix, $maxPix)->save($pathName, null, 100, false);
            $this->success("照片上传成功！");
            // return json_encode([
            //     'code' => 1,
            //     "msg"  => "上传成功",
            //     "data" => ['file' => $avatar],
            //     "url"  => ''
            // ]);
        }


    }





    

}
