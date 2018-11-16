<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/5
 * Time: 19:56
 */
namespace core\lib;
class route extends config
{
    public $modular;
    public $controller;
    public $action;

    public function __construct()
    {
        //配置化加载：
        $config = config::init();
        /*
         * 1.隐藏index.php  由.htaccess 文件处理
         * 2.获取URL 参数部分 全局变量$_SERVER处理
         * 3.返回对应控制器和方法
         * */
        if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/'){

            //接收到路径,去掉第一个"/"
            $path = trim($_SERVER['REQUEST_URI'],'/');
            //以"/" 为分隔符切割数组：
            $path = explode('?',$path);
            //数组1：路径
            //数组2：全部的参数
            $pathArr = explode('/',$path['0']);
//            $pathArrPase = explode('/',$path['1']);  //这块后续优化下，目前还没有到处理参数的部分
            if(count($pathArr) > 2){
                // /admin/index/view
                $this->modular = $pathArr['0'];
                if(isset($pathArr['1'])){
                    $this->controller = $pathArr['1'];
                }else{
                    $this->controller = $config['app_controller'];
                }
                if(isset($pathArr['2'])){
                    $this->action = $pathArr['2'];
                }else{
                    $this->action = $config['app_action'];
                }
            }else{
                // /index/view
                $this->modular = $config['app_module'];
                if(isset($pathArr['0'])){
                    $this->controller = $pathArr['0'];
                }else{
                    $this->controller = $config['app_controller'];
                }
                if(isset($pathArr['1'])){
                    $this->action = $pathArr['1'];
                }else{
                    $this->action = $config['app_action'];
                }
            }

        }else{
            $this->modular = $config['app_module'];
            $this->controller = $config['app_controller'];
            $this->action = $config['app_action'];
        }

    }
}