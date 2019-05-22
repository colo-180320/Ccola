<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/15
 * Time: 16:24
 */
namespace core;
use core\lib\log\driver\file;
class Base{
    public function __construct()
    {
    }
    public function __call($name, $arguments)
    {

    }
    /**
     * 自动加载
     * @access static
     * @param  mixed $class   要引入的文件的class
     * @return $file
     */
    static public function autoLoad($class)
    {
        //自动加载类库：
        //new \core\route();
        //$class = '\core\Route';
        //ROOT_PATH.'/core/Route.php';
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
    public function error()
    {
        $file = new file();
        $traces = debug_backtrace();
        //日志如何存储内容，后续完善
        $file->log("调用错误的方法");
    }


}
?>