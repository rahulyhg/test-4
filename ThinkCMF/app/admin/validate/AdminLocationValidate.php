<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2018 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小夏 < 449134904@qq.com>
// +----------------------------------------------------------------------
namespace app\admin\validate;

use think\Validate;
use think\Db;

class AdminLocationValidate extends Validate
{
    protected $rule = [
        'name'       => 'require|unique:AdminLocation',
        'parent_id'  => 'checkParentId',
    ];

    protected $message = [
        'name.require'       => '名称不能为空',
        'name.unique'      => '相同的地区名称已经存在，请谨慎划分区域!',
        'parent_id'          => '最多划分3级，否则会过分消耗服务器资源',
    ];

    protected $scene = [
        'add'  => ['name', 'parent_id'],
        'edit' => ['name', 'id', 'parent_id'],
    ];

    // 自定义验证规则
    // 最多写到街道划分
    protected function checkParentId($value)
    {
        $find = Db::name('AdminLocation')->where(["id" => $value])->value('parent_id');

        if ($find) {
            $find2 = Db::name('AdminLocation')->where(["id" => $find])->value('parent_id');
            if ($find2) {
                $find3 = Db::name('AdminLocation')->where(["id" => $find2])->value('parent_id');
                if ($find3) {
                    return false;
                    }
                }
            }
        return true;
    }
}