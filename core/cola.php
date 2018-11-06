<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/5
 * Time: 19:52
 */
namespace core;
class cola
{
    public static $classMap = array();

    static public function run()
    {
        echo "Hello World";
        //只是new \core\route() 却没有include这个文件会报错
        $route = new \core\lib\route();
        var_dump($route);
    }

    /*
     * $class object 需要new的对象
     * */
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
            $file = ROOT_PATH .'/'. $_COOKIE[$class] . '.php';
            include $file;
        } else {
            $file = ROOT_PATH .'/'. $class . '.php';
            //文件是否存在：
            if (is_file($file)) {
                include $file;
                //存入classMap中：
                setcookie($class,$class,time()+3600);
            } else {
                return false;
            }
        }

    }
}