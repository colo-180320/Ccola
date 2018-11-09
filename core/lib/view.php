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
    protected $controller_file;
    protected $action_view;
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
            if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/'){
                //接收到路径,去掉第一个"/"
                $path = trim($_SERVER['REQUEST_URI'],'/');
                //以"/" 为分隔符切割数组：
                $pathArr = explode('/',$path);
                if(isset($pathArr['0'])){
                    $this->controller_file = $pathArr['0'];
                    unset($pathArr['0']);
                }else{
                    $this->controller_file = "Index";
                }
                if(isset($pathArr['1'])){
                    $this->action_view = $pathArr['1'];
                    unset($pathArr['1']);
                }else{
                    $this->action_view = "index";
                }
            }else{
                $this->controller_file = "Index";
                $this->action_view = "index";
            }
            $file = APP.'/Views/'.$this->controller_file.'/'.$this->action_view.".php";
            if(is_file($file)){
                include $file;
            }else{
                throw new \ErrorException("视图不存在，请检查");
            }
        }else{
            $file = explode('.',$file);
            if(count($file) > 1){
                //加载其他视图文件夹
                $this->controller_file = $file['0'];
                $this->action_view = $file['1'];
                $file = APP.'/Views/'.$this->controller_file.'/'.$this->action_view.".php";
                if(is_file($file)){
                    include $file;
                }else{
                    throw new \ErrorException("视图不存在，请检查");
                }
            }else{
                $path = trim($_SERVER['REQUEST_URI'],'/');
                //以"/" 为分隔符切割数组：
                $pathArr = explode('/',$path);
                if(isset($pathArr['0'])){
                    $this->controller_file = $pathArr['0'];
                }
                $this->action_view = $file['0'];
                $file = APP.'/Views/'.$this->controller_file.'/'.$this->action_view.".php";
                if(is_file($file)){
                    include $file;
                }else{
                    throw new \ErrorException("视图不存在，请检查");
                }
            }

        }
    }
}