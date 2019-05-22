<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/8
 * Time: 16:58
 */
namespace core\lib;

use core\lib\Route;

class view extends Route
{

    // 模板变量
    protected $data = [];
    protected $controller_file;
    protected $action_view;

    public function assign($name, $value = '')
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
        extract($this->data);
        $route = new Route();
        $path = $route->route;
        if (empty($file)) {

            if (isset($path['controller'])) {
                $this->controller_file = ucfirst($route->modular);
            } else {
                    $this->controller_file = "Index";
            }
            if (isset($path['action'])) {
                $this->action_view = $path['action'];
            } else {
                $this->action_view = "index";
            }

            $file = APP . '/Views/' .$this->controller_file . '/'.$this->controller_file .'/' . $this->action_view . ".php";
            if (is_file($file)) {
                include $file;
            } else {
                throw new \ErrorException($file);

            }
        } else {
            $file = explode('.', $file);
            if (count($file) > 1) {
                //加载其他视图文件夹
                $this->controller_file = $file['0'];
                $this->action_view = $file['1'];
                $file = APP . '/Views/' . $this->controller_file . '/'. $this->controller_file . '/' . $this->action_view . ".php";

                if (is_file($file)) {
                    include $file;
                } else {
                    throw new \ErrorException("视图不存在，请检查");
                }
            } else {
                if (isset($file['0'])) {
                    $this->action_view = $file['0'];
                }
                $file = APP . '/Views/' . ucfirst($route->modular) . '/' . $this->action_view . ".php";
                if (is_file($file)) {
                    include $file;
                } else {
                    throw new \ErrorException("视图不存在，请检查");
                }
            }

        }
    }
    //加载公共的文件：
    public function layout()
    {

    }
}