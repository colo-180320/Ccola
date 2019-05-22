<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/22
 * Time: 9:47
 */
namespace app\Index\Controller;

use core\Cola;
use app\Index\Model\WechatModel;

class WechatController extends Cola
{
    protected $model;
    protected $controllerName = '公众号';
    protected $actionPermissions = [
        'index' => '列表',
        'new,create' => '添加',
        'update' => '编辑',
        'show' => '查看详情',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->model = new WechatModel();
    }
    public function accountAction()
    {
        $this->display();
    }
}