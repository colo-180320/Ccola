<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/6
 * Time: 15:22
 */
namespace app\Index\Controller;
use core\Cola;
use core\lib\Model;
class IndexController extends Cola
{
    public function indexAction()
    {
        $model = new Model();
        $sql ="select * from Cola_user";
        $result = $model->query($sql);
        print_r($result->fetch());
    }
    public function viewAction()
    {
        //参数部分：
        $this->assign([
            'name' => 'jiang',
            'pass' => '123456'
        ]);
        //调用那个视图(默认为当前控制器的方法的视图)：
        $this->display('index.index');

    }
}
