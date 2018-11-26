<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/12
 * Time: 12:13
 */
namespace core\lib;
class Config
{
    static public $conf = array();
    static public function init($name ='')
    {
        /*
         * 1.判断配置文件是否存在
         * 2.判断配置是否存在
         * 3.缓存配置数据
         * */
        $path = ROOT_PATH.'/config/'."Config.php";
        if(empty($name)){
            $name = "default";
        }
        if(isset(self::$conf[$name])){
            return self::$conf[$name];
        }else{
            if(is_file($path)){
                $conf = include $path;
                //加载对于的文件：
                if(isset($conf[$name])){
                    //缓存：
                    self::$conf[$name] = $conf[$name];
                    //直接加载对应的配置
                    return $conf[$name];
                }else{
                    throw new \ErrorException("没有这项配置");
                }
            }else{
                throw new \ErrorException("配置文件不存在");
            }
        }
    }
}