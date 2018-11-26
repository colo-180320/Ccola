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
    protected $config = array();
    protected $log = array();
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
        //文件大小：
        $this->config['size'] = $config['size'];
        //文件路径：
        $this->config['path'] = $config['path'];
        //存储形式:
        $this->config['type'] = $config['type'];
        if($this->config['type'] == 'File'){
            return true;
        }else{
            //数据库的方式
            return false;
        }
    }
    /*
     * $message 错误信息
     * $tupe 错误类型，默认为info
     * */
    public function log($message,$type = '')
    {
        if(empty($type)){
            $type="info";
        }
        $type = ucfirst($type);
        $now = date('Y-m-d H:i:s');
        //存放位置：
        $destination = $this->config['path'] . date('y-m-d') . '.log';
        // 自动创建日志目录
        $log_dir = dirname($destination);
        if(!is_dir($log_dir)){
            mkdir($log_dir, 0777, true);
        }
        //检测日志文件大小，超过配置大小则备份日志文件重新生成
        if (is_file($destination) && floor($this->config['size']) <= filesize($destination)) {
            rename($destination, dirname($destination) . '/' . time() . '-' . basename($destination));
        }
        error_log("[{$now}] " .$type.' '."-".' '. $_SERVER['REMOTE_ADDR'] . ' ' . $_SERVER['REQUEST_URI'] . "\r\n{$message}\r\n", 3, $destination);
    }
    //数据库日志存储
    public function log_db()
    {
        //后续完善，也可以作为用户在后台操作日志的一个方法类型处理
    }
}