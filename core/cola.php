<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/5
 * Time: 19:52
 */
namespace core;
use core\lib\log\driver\file;
use core\lib\route;
use core\lib\view;
use core\lib\config;
class cola
{
    protected $view;
    public static $classMap = array();
    public function __construct()
    {
        $this->view = new view();
    }

    /*
     * 项目初始化：
     * */
    static public function run()
    {

        //当new一个不存在的类，触发某个方法：
        spl_autoload_register('\core\cola::load');
        //只是new \core\route() 却没有include这个文件会报错
        $route = new route();
        //配置文件加载
        $config = new config();
        $file = new file();
        $config = $config::init();
        if($config['is_bug']){
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
            //执行action:
            $ctrl->$action();
        } else {
            throw new \ErrorException("找不到该控制器" . $controller);
        }
    }

    /**
     * 自动加载
     * @access static
     * @param  mixed $class   要引入的文件的class
     * @return $file
     */
    static public function load($class)
    {
        //自动加载类库：
        //new \core\route();
        //$class = '\core\route';
        //ROOT_PATH.'/core/route.php';
        //第一步：是否引入过：
        //第二步：反斜线转成正斜线：
        $class = str_replace('\\', '/', $class);
        if (isset($_COOKIE[$class])) {
            $file = ROOT_PATH . '/' . $_COOKIE[$class] . '.php';
            include $file;
            //这里需要后续完善下
        } else {
            $file = ROOT_PATH . '/' . $class . '.php';
            //文件是否存在：
            if (is_file($file)) {
                include $file;
                //存入classMap中：
                setcookie($class, $class, time() + 3600);
            } else {
                return false;
            }
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