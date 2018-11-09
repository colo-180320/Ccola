<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/7
 * Time: 19:55
 */
namespace core\lib;
//数据库部分：
class model extends \PDO
{
    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=dbtest';
        $username = 'root';
        $passwd = 'root';
        try{
            parent::__construct($dsn, $username, $passwd);
        }catch (\PDOException $e){
            throw new \ErrorException("数据库连接错误");
        }
    }
}