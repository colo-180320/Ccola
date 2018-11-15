<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/6
 * Time: 11:33
 */
return [
    //默认的：
    'app_controller' => "Index",
    'app_action' => "index",
    'work_environment' => "Home", //Work

    'log' => [
        // 日志记录方式，内置 file socket 支持扩展
        'type'  => 'File',
        // 日志保存目录
        'path'  => '',
        // 日志记录级别
        'level' => [],
    ],
];