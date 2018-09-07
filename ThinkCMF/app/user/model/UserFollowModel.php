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
namespace app\user\model;

use think\Db;
use think\Model;

class UserFollowModel extends Model
{

    public function user_follow() 
    {
        return $this->hasOne('UserFollow','uid');
    }

    public function friends()
    {
        $userId        = cmf_get_current_user_id();
        $userQuery     = Db::name("UserFollow");
        $friends       = $userQuery::hasWhere('UserFollow', ['uid'=>$userId])->select();
        return $friends;
    }

    public function favorites()
    {
        // $userId        = cmf_get_current_user_id();
        // $userQuery     = Db::name("UserFavorite");
        // $favorites     = $userQuery->where(['user_id' => $userId])->order('id desc')->paginate(10);
        // $data['page']  = $favorites->render();
        // $data['lists'] = $favorites->items();
        // return $data;
    }

    public function deleteFavorite($id)
    {
        // $userId           = cmf_get_current_user_id();
        // $userQuery        = Db::name("UserFavorite");
        // $where['id']      = $id;
        // $where['user_id'] = $userId;
        // $data             = $userQuery->where($where)->delete();
        // return $data;
    }

}