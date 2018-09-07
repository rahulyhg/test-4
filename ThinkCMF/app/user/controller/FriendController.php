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

use cmf\controller\UserBaseController;
use app\user\model\UserFollowModel;
use think\Db;

class FriendController extends UserBaseController
{

    /**
     * 个人中心？我的关注的人S
     */
    public function index()
    {
        $UserFollowModel = new UserFollowModel();
        $friends = $UserFollowModel->friends();

var_dump($friends);
        // $userFavoriteModel = new UserFavoriteModel();
        // $data              = $userFavoriteModel->favorites();
        // $user              = cmf_get_current_user();
        // $this->assign($user);
        // $this->assign("page", $data['page']);
        // $this->assign("lists", $data['lists']);
        // return $this->fetch();


    }

    /**
     * 个人中心？我的粉丝，关注我的人S
     */
    public function get_fans()
    {


    }

    /**
     * 个人中心？我的好朋友列表(互相关注)
     */
    public function get_friends()
    {
        $uid = cmf_get_current_user_id();

        $userFollowModel = new UserFollowModel();


        // $userFavoriteModel = new UserFavoriteModel();
        // $data              = $userFavoriteModel->favorites();
        // $user              = cmf_get_current_user();
        // $this->assign($user);
        // $this->assign("page", $data['page']);
        // $this->assign("lists", $data['lists']);
        // return $this->fetch();
    }

    /**
     * 用户取消关注
     */
    public function delete()
    {
        // $id                = $this->request->param("id", 0, "intval");
        // $userFavoriteModel = new UserFavoriteModel();
        // $data              = $userFavoriteModel->deleteFavorite($id);
        // if ($data) {
        //     $this->success("取消收藏成功！");
        // } else {
        //     $this->error("取消收藏失败！");
        // }
    }

    /**
     * 用户添加关注
     */
    public function add()
    {
        $data   = $this->request->param();
        $result = $this->validate($data, 'Favorite');

        if ($result !== true) {
            $this->error($result);
        }

        $id    = $this->request->param('id', 0, 'intval');
        $table = $this->request->param('table');


        $findFavoriteCount = Db::name("user_favorite")->where([
            'object_id'  => $id,
            'table_name' => $table,
            'user_id'    => cmf_get_current_user_id()
        ])->count();

        if ($findFavoriteCount > 0) {
            $this->error("您已收藏过啦");
        }


        $title       = base64_decode($this->request->param('title'));
        $url         = $this->request->param('url');
        $url         = base64_decode($url);
        $description = $this->request->param('description', '', 'base64_decode');
        $description = empty($description) ? $title : $description;
        Db::name("user_favorite")->insert([
            'user_id'     => cmf_get_current_user_id(),
            'title'       => $title,
            'description' => $description,
            'url'         => $url,
            'object_id'   => $id,
            'table_name'  => $table,
            'create_time' => time()
        ]);

        $this->success('收藏成功');

    }
}