<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/15
 * Time: 16:24
 */
namespace core;
use core\lib\log\driver\file;
class Base{
    public function __construct()
    {

    }
    public function __call($name, $arguments)
    {
        $file = new file();
        $traces = debug_backtrace();
        //日志如何存储内容，后续完善
        $file->log("填写错误日志");
//        var_dump($traces);
    }

}