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

use app\user\model\CommentsModel;
use cmf\controller\UserBaseController;
use app\user\model\UserModel;


class CommentsController extends UserBaseController
{
    /**
     * 个人话题中心主话题列表
     */
    public function index()
    {



    }


    public function addview() {
        $user = cmf_get_current_user();

        $this->assign($user);
        return $this->fetch();
    }


    Public function add() {

        $isAdd = false;
        $isEdit = false;

        if (!$this->request->isPost()) {
            abort(404, '服务异常');
        }

        $data = $this->request->param();
        
        // $validate = new Validate([
        //     '' => '',
        // ]);
        // $validate->message([
        //     ''   => '',
        // ]);


    }


    Private function edit() {

    }

    /**
     * 个人话题中心回复话题列表
     */
    public function delete()
    {

    }
}