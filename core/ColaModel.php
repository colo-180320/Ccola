<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/26
 * Time: 16:21
 */
namespace core;
use Medoo\Medoo;
use core\lib\Config;

class ColaModel extends Medoo
{
    protected $config;
    public function __construct($options = '')
    {
        if (empty($options)){
            $options = "db";
        }
        $this->config = Config::init($options);
        parent::__construct($this->config);
    }

}