<?php
/**
 * Created by PhpStorm.
 * User: xfd
 * Date: 2018/6/13
 * Time: 23:07
 */

namespace plugins\reminder\controller;
use cmf\controller\PluginBaseController;
use plugins\Reminder\Model\PluginReminderModel;
use think\Db;

class IndexController extends PluginBaseController
{
    function index() {
    	$reminderInfo = Db:table('cmf_plugin')->where('reminder', $name)->field('title, config')->select();
    	$this->assign('reminder', $reminderInfo);
    	return $this->fetch('/index');
    	return true;
    }
}