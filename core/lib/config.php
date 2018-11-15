<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/12
 * Time: 12:13
 */
namespace core\lib;
class config
{
    static public $conf = array();
    static public function init($name ='')
    {
        /*
         * 1.判断配置文件是否存在
         * 2.判断配置是否存在
         * 3.缓存配置数据
         * */
        $path = ROOT_PATH.'/config/'."config.php";
        if(is_file($path)){
            $conf = include $path;
            //加载对于的文件：
            if(empty($name)){
                //直接加载对应的配置
                return $conf;
            }else{
                //多一级别寻找：
                return $conf[$name];
            }
        }else{
            throw new \ErrorException("配置文件不存在");
        }
    }
}