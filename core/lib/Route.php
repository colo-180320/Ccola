<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/5
 * Time: 19:56
 */
namespace core\lib;

//整个路由需要兼容下
use Request;

class Route extends Config
{
    public $modular;
    public $controller;
    public $action;

    public function __construct()
    {
        //配置化加载：
        $config = Config::init();
        //request服务
        $request = new Request();
        /*
         * 1.隐藏index.php  由.htaccess 文件处理
         * 2.获取URL 参数部分 全局变量$_SERVER处理
         * 3.返回对应控制器和方法
         * */
        $path = $request->getPathInfo();
        $path = trim($path, '/');
        $pathArr = explode('/', $path);
        if (count($pathArr) > 2) {
            // /admin/index/view
            $this->modular = $pathArr['0'];
            if (isset($pathArr['0'])) {
                $this->controller = $pathArr['0'];
            } else {
                $this->controller = $config['app_controller'];
            }
            if (isset($pathArr['1'])) {
                $this->action = $pathArr['1'];
            } else {
                $this->action = $config['app_action'];
            }
        } else {

            // /index/view
            // var_dump($pathArr);
            $this->modular = $config['app_module'];
            if (isset($pathArr['0']) && !empty($pathArr['0'])) {
                $this->controller = $pathArr['0'];
            } else {
                $this->controller = $config['app_controller'];
            }
            if (isset($pathArr['1'])&& !empty($pathArr['1'])) {
                $this->action = $pathArr['1'];
            } else {
                $this->action = $config['app_action'];
            }
        }




    }
}