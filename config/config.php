<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/6
 * Time: 11:33
 */
return [
    //默认配置部分
    'is_bug' => 'true',             //是否开启debug:
    //控制器部分：
    'app_file' => 'app',            //自定义应用目录
    'app_module' => 'admin',        //自定义访问模块
    'app_controller' => "Index",    //自定义访问控制器
    'app_action' => "index",        //自定义访问方法
    'work_environment' => "Home",   //自定义工作环境 Home,Work

    //日志部分
    'log' => [
        // 日志记录方式，内置 file socket 支持扩展
        'type'  => 'File',
        // 日志保存目录
        'path'  => ROOT_PATH.'/data/log/',
    ],
];