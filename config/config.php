<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/6
 * Time: 11:33
 */
return [
    'default' =>[
        //默认配置部分
        'is_bug' => 'true',             //是否开启debug:
        //控制器部分：
        'app_file' => 'app',            //自定义应用目录
        'app_module' => 'index',        //自定义访问模块
        'app_controller' => "index",    //自定义访问控制器
        'app_action' => "index",        //自定义访问方法
        'work_environment' => "Home",   //自定义工作环境 Home,Work
    ],
    //日志部分
    'log' => [
        // 日志记录方式
        'type'  => 'File',
        // 日志保存目录
        'path'  => ROOT_PATH.'/data/log/',
        // 日志文件存储最大值
        'size'  => '2097152'
    ],
    // 各项目的数据库
    'db' => [
        'host' => 'localhost',
        'port' => 3313,
        'user' => 'root',
        'dbname' => 'app', // 数据库名为项目名称,在service\App类中指定
        'charset' => 'utf8mb4',
        'password' => 'H3zhw.2017_zhw.ADmin8,Q69',
        'recordClass' => 'miaoxing\plugin\BaseModel',
        'beforeQuery' => ['Miaoxing\App\Callback\Db', 'beforeQuery'],
        'providers' => [
            'cache' => 'nearCache',
        ],
    ],
    // 产品核心的数据库
    'app.db' => [
        'host' => 'localhost',
        'port' => 3313,
        'user' => 'root',
        'dbname' => 'app',
        'charset' => 'utf8mb4',
        'password' => 'H3zhw.2017_zhw.ADmin8,Q69',
        'recordClass' => 'miaoxing\plugin\BaseModel',
        'beforeQuery' => ['Miaoxing\App\Callback\Db', 'beforeQuery'],
        'providers' => [
            'cache' => 'nearCache',
        ],

    ],
];