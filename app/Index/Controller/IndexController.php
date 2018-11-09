<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/6
 * Time: 15:22
 */
namespace app\Index\Controller;
class IndexController extends \core\lib\cola
{
    public function indexAction()
    {
        $model = new \core\lib\model();
        $sql ="select * from Cola_user";
        $result = $model->query($sql);
        print_r($result->fetch());
    }
    public function viewAction()
    {
        $data = "Hello Worlds";
        //参数部分：
        $this->assign([
            'name' => 'jiang',
            'pass' => '123456'
        ]);
        var_dump($this);
     //   $this->display('index');
        //调用那个视图(默认为当前控制器的方法的视图)：
        $this->display();
    }
}
