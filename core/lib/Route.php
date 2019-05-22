<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/5
 * Time: 19:56
 */
namespace core\lib;
//整个路由需要兼容下
use core\lib\Request;

class Route extends Config
{
    //前&后
    public $modular;
    //控制器
    public $controller;
    //方法
    public $action;
    //控制器+方法  【后续可以用于权限部分】
    protected $route = array();
    //参数
    protected $param = array();
    public function __construct()
    {
        //request服务
        $request = new Request();
//        var_dump($request);
        //获取路径： $request->getPathInfo()
        //获得方法： $request->getMethod()
        //处理路径：
        $this->mathParamSet($request->getPathInfo(), $request->getMethod());
    }

    public function mathParamSet($path, $method = 'GET')
    {

        $path = trim($path, '/');
        !$path && $path = '/';
        //配置化加载：
        $config = Config::init();
        $pathArr = explode('/', $path);

        if (count($pathArr) > 2) {
            $this->modular = $pathArr['0'];

            if (isset($pathArr['1'])) {
                $this->controller = $pathArr['1'];
                $this->route['controller'] = $pathArr['1'];
            } else {
                $this->controller = $config['app_controller'];
            }
            if (isset($pathArr['2'])) {
                $this->action = $pathArr['2'];
                $this->route['action'] = $pathArr['2'];
            } else {
                $this->action = $config['app_action'];
            }
        } else {
            $this->modular = $config['app_module'];
            if (isset($pathArr['0']) && !empty($pathArr['0'])) {
                $this->controller = $pathArr['0'];
                $this->route['controller'] = $pathArr['0'];
            } else {
                $this->controller = $config['app_controller'];
            }
            if (isset($pathArr['1']) && !empty($pathArr['1'])) {
                $this->action = $pathArr['1'];
                $this->route['action'] = $pathArr['1'];
            } else {
                $this->action = $config['app_action'];
            }
        }
        return true;
    }
}