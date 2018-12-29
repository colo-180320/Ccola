<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/6
 * Time: 15:22
 */
namespace app\Admin\Controller;

use core\Cola;
use app\Admin\Model\IndexModel;

class IndexController extends Cola
{
    protected $model;
    protected $controllerName = '企业信息展示';
    protected $actionPermissions = [
        'index' => '列表',
        'new,create' => '添加',
        'update' => '编辑',
        'show' => '查看详情',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->model = new IndexModel();
    }

    public function indexAction()
    {
        dump($this->model->getList());
    }

    public function viewAction()
    {
        //参数部分：
        $this->assign([
            'name' => 'jiang',
            'pass' => '123456'
        ]);

        //调用那个视图(默认为当前控制器的方法的视图)：
        $this->display('index');

    }

}
