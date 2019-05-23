<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/22
 * Time: 16:18
 */
namespace app\Index\Controller;
use core\Cola;
use app\Index\Model\OwnModel;
class OwnController extends Cola{
    protected $model;
    protected $controllerName = '新页面';
    protected $actionPermissions = [
        'formavatar' => '编辑',
        'profile' => '详情信息',
    ];
    public function __construct()
    {
        parent::__construct();
        $this->model = new OwnModel();
    }
    public function formavatarAction()
    {
        $this->display('Own/formavatar');
    }
    public function editAction()
    {

        //判断上传的文件是否出错,是的话，返回错误
        if($_FILES["file"]["error"])
        {
            echo $_FILES["file"]["error"];
        }
        else
        {
            //没有出错
            //加限制条件
            //判断上传文件类型为png或jpg且大小不超过1024000B
            if(($_FILES["file"]["type"]=="image/png"||$_FILES["file"]["type"]=="image/jpeg")&&$_FILES["file"]["size"]<1024000)
            {
                //防止文件名重复
                $filename ="public/own/".time().$_FILES["file"]["name"];
                //转码，把utf-8转成gb2312,返回转换后的字符串， 或者在失败时返回 FALSE。
                $filename =iconv("UTF-8","gb2312",$filename);
                //检查文件或目录是否存在
                if(file_exists($filename))
                {
                    echo"该文件已存在";
                }
                else
                {
                    //保存文件,   move_uploaded_file 将上传的文件移动到新位置
                    move_uploaded_file($_FILES["file"]["tmp_name"],$filename);//将临时地址移动到指定地址
                    $data = array('nickName'=>$_POST['nickName'],'img'=>$filename);
                    $this->model->insert('own',$data);
                }
            }
            else
            {
                echo"文件类型不对";
                return false;
            }
        }
        $this->profileAction();
    }
    public function profileAction()
    {
        $where = array('id'=>'1');
        $data= $this->model->getList($where);
        var_dump($data);
        exit();
        $this->display('Own/profile');
    }
}