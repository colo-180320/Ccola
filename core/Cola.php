<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/5
 * Time: 19:52
 */

namespace core;
include "Base.php";
include "Request.php";
use core\lib\Route;
use core\lib\View;
use core\lib\Config;

use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

class Cola extends Base
{
    protected $view;
    protected $base;
    static public $classMap = array();
    public function __construct()
    {
        //这里后续做中间件！
        parent::__construct();
        $this->view = new View();
        $this->base = new Base();
    }

    /*
     * 项目初始化：
     * */
    static public function run()
    {
        //当new一个不存在的类，触发某个方法：
        spl_autoload_register('\core\Base::autoLoad');
        //只是new \core\route() 却没有include这个文件会报错
        $route = new Route();
        //配置文件加载
        $config = new Config();
        $config = $config::init();
        if($config['is_bug']){
            $whoops = new Run();
            $whoops->pushHandler(new PrettyPageHandler());
            $whoops->register();
            ini_set('display_errors','On');
        }else {
            ini_set('display_errors','Off');
        }
        //获取模块，控制器名跟方法名：
        $modular = ucfirst($route->modular);
        $controller = ucfirst($route->controller . "Controller");
        $action = $route->action."Action";
        $controllerFile = APP . '/' . $modular . '/' . 'Controller/' . $controller . '.php';
        if (is_file($controllerFile)) {
            include $controllerFile;
            $controllerClass = $config['app_file'].'\\'.$modular.'\\'."Controller".'\\'.$controller;
            //实例化控制器：
            $ctrl =new $controllerClass();
            if(!method_exists($ctrl,$action)){
                throw new \ErrorException("找不到该方法" . $action);
            }else{
                //action:
                $ctrl->$action();
            }
        } else {
            throw new \ErrorException("找不到该控制器" . $controller);
        }
    }


    /**
     * 模板变量赋值
     * @access protected
     * @param  mixed $name  要显示的模板变量
     * @param  mixed $value 变量的值
     * @return $this
     */
    protected function assign($name,$value='')
    {
        $this->view->assign($name, $value);
        return $this;
    }
    /**
     * 模板渲染
     * @access protected
     * @param  mixed $file  文件模板路径
     * @return $file
     */
    protected function display($file= '')
    {
        $this->view->display($file);
    }
    //变量以及模板渲染同时：
    protected function fetch()
    {
        //这里后续更新
    }
}