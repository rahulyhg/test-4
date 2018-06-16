<?php
namespace plugins\reminder;
use cmf\lib\Plugin;

Class ReminderPlugin extends Plugin {
    public $info = [
        'name'        => 'Reminder',
        'title'       => '简单的提示插件',
        'description' => '简单的提示插件，插件入门学习用',
        'status'      => 1,
        'author'      => 'SummerTree!',
        'version'     => '1.0',
        'demo_url'    => '/',
        'author_url'  => 'http://www.ListenFlower.cc'
    ];

    public $hasAdmin = 1;   //插件是否有后台管理界面

    //实现的reminder_show钩子方法
    public function reminderShow($param) {
        $config = $this->getConfig();
        $this->assign($config);
        echo $this->fetch('widget');
    }

    public function install() {
        return true;
    }

    Public function uninstall() {
        return true;
    }
}