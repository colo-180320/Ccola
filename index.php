<?php
//框架的运行流程：
//入口文件->定义常量->引入函数库->自动加载类->启动框架->路由解析->加载控制器->返回结果
/**
 * 入口文件
 * 1.定义全局的常量
 * 2.加载函数库
 * 3.启动框架
 */
//当前框架所在的目录：
define('ROOT_PATH',realpath(dirname(__FILE__)));
//框架的核心文件的目录：
define('CORE',ROOT_PATH.'/core');
//框架的项目目录：
define('APP',ROOT_PATH.'/app');
//debug是否开启：
define('DEBUG',true);
//加载配置：
include ROOT_PATH.'/config/config.php';
if(DEBUG){
    ini_set('display_errors','On');
}else {
    ini_set('display_errors','Off');
}
include CORE.'/cola.php';

//当new一个不存在的类，触发某个方法：
spl_autoload_register('\core\lib\cola::load');
\core\lib\cola::run();
?>



































