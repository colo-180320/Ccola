<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/6
 * Time: 15:22
 */
namespace app\Index\Controller;

use core\Cola;
use app\Index\Model\HomeModel;

class HomeController extends Cola
{
    protected $model;
    protected $controllerName = '新页面';
    protected $actionPermissions = [
        'index' => '列表',
        'new,create' => '添加',
        'update' => '编辑',
        'show' => '查看详情',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->model = new HomeModel();
    }

    public function indexAction()
    {
        $this->display('Home/index');
    }
    public function editAction()
    {
        $this->display('Home/edit');
    }
}
