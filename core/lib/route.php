<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/5
 * Time: 19:56
 */
namespace core\lib;
class route
{
    public $controller;
    public $action;
    public function __construct()
    {
        /*
         * 1.隐藏index.php  由.htaccess 文件处理
         * 2.获取URL 参数部分 全局变量$_SERVER处理
         * 3.返回对应控制器和方法
         * */
        if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/'){
            //接收到路径,去掉第一个"/"
            $path = trim($_SERVER['REQUEST_URI'],'/');
            //以"/" 为分隔符切割数组：
            $pathArr = explode('/',$path);
            if(isset($pathArr['0'])){
                $this->controller = $pathArr['0'];
                unset($pathArr['0']);
            }else{
                $this->controller = "index";
            }
            if(isset($pathArr['1'])){
                $this->action = $pathArr['1'];
                unset($pathArr['1']);
            }else{
                $this->action = "index";
            }
            //URL多余部分为参数：(目前只有单斜杠的参数)
            //http://127.0.0.1/index/index/id/1/name/你好
            $count = count($pathArr)+2;
            $i = 2;
            while ($i<$count){
                if(isset($pathArr[$i + 1])){
                    $_GET[$pathArr[$i]] = $pathArr[$i+1];
                }
                $i = $i+2;
            }
            var_dump($_GET);
        }else{
            $this->controller = "index";
            $this->action = "index";
        }

    }
    public function index()
    {
        echo "index";
    }
}