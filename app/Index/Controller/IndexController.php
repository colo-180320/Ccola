<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/6
 * Time: 15:22
 */
namespace app\Index\Controller;
use core\Cola;
use app\Index\Model\IndexModel;
class IndexController extends Cola
{
    public function indexAction()
    {
        echo "Hello World";
    }
    public function viewAction()
    {
        //参数部分：
        $this->assign([
            'name' => 'jiang',
            'pass' => '123456'
        ]);

        //调用那个视图(默认为当前控制器的方法的视图)：
        $this->display();

    }
}
