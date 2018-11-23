<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/19
 * Time: 14:43
 */
namespace core\lib\log\driver;
use core\lib\config;

class file extends config
{
    //日志最大存储：
    protected $config = array(
        'size' => '2097152'
    );
    //文件日志：
    /*
     * 1.加载配置
     * 2.日志位置
     * 3.日志方式
     * 4.同名处理
     * 5.写入日志
     * */
    public function __construct()
    {
        $config = config::init('log');

        if($config['type'] == 'File'){

        }else{
            //数据库的方式
        }

    }
}