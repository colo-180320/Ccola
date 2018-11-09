<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/8
 * Time: 16:58
 */
namespace core\lib;
class view
{
    // 模板变量
    protected $data = [];
    public function assign($name,$value ='')
    {
        if (is_array($name)) {
            $this->data = array_merge($this->data, $name);
        } else {
            $this->data[$name] = $value;
        }
        return $this;
    }
    public function display($file = '')
    {
        if(empty($file)){
            $file = $_SERVER['REQUEST_URI'];
        }
    }
}