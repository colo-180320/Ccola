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
    protected $model;
    protected $controllerName = '新页面';
    protected $actionPermissions = [
        'index' => '列表',
        'new,create' => '添加',
        'update' => '编辑',
        'show' => '查看详情',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->model = new IndexModel();
    }

    public function indexAction()
    {
        $this->assign([
            'name' => 'jiang',
            'pass' => '123456',
        ]);

        $this->display();
    }

    public function viewAction()
    {
        //调用那个视图(默认为当前控制器的方法的视图)：
        //$this->display();
        $str = implode($_POST,"\n");
        echo $str;
    }

    public function httpAction()
    {
        /*
         * telnet 127.0.0.1 80  回车
         * ctrl+ ]
         * 回车
         * */

        /*
         *  get（请求方法） http://127.0.0.1/Cola/index.php（请求url） http/1.1(http协议版本)   ===>请求行
            host:localhost（请求首部）
            回车（空行）

            HTTP/1.1 200（响应结果状态码） OK（状态描述）
            Date: Thu, 03 Jan 2019 07:58:02 GMT
            Server: Apache/2.4.9 (Win32) PHP/5.5.12
            X-Powered-By: PHP/5.5.12
            Set-Cookie: core/lib/Config=core%2Flib%2FConfig; expires=Thu, 03-Jan-2019 08:58:12 GMT; Max-Age=3600
            Set-Cookie: core/lib/Route=core%2Flib%2FRoute; expires=Thu, 03-Jan-2019 08:58:12 GMT; Max-Age=3600
            Set-Cookie: core/lib/View=core%2Flib%2FView; expires=Thu, 03-Jan-2019 08:58:12 GMT; Max-Age=3600
            Set-Cookie: core/ColaModel=core%2FColaModel; expires=Thu, 03-Jan-2019 08:58:12 GMT; Max-Age=3600
            Set-Cookie: app/Index/Model/IndexModel=app%2FIndex%2FModel%2FIndexModel; expires=Thu, 03-Jan-2019 08:58:12 GMT; Max-Age=3600
            Transfer-Encoding: chunked
         *
         *  输出一些数据
         * */

        /*
         * post http://127.0.0.1/Cola/index.php/index/view HTTP/1.1
         * host:localhost
         * Content-type:application/x-www-form-urlencoded
         * content-length:20
         *
         * act=xxx&ghost=xxxx
         *
         * act=query&name=ghost
         *
         * HTTP/1.1 200 OK
           Date: Thu, 03 Jan 2019 08:16:21 GMT
           Server: Apache/2.4.9 (Win32) PHP/5.5.12
           X-Powered-By: PHP/5.5.12
           Set-Cookie: core/lib/Config=core%2Flib%2FConfig; expires=Thu, 03-Jan-2019 09:16:48 GMT; Max-Age=3600
           Set-Cookie: core/lib/Route=core%2Flib%2FRoute; expires=Thu, 03-Jan-2019 09:16:48 GMT; Max-Age=3600
           Set-Cookie: core/lib/View=core%2Flib%2FView; expires=Thu, 03-Jan-2019 09:16:48 GMT; Max-Age=3600
           Set-Cookie: core/ColaModel=core%2FColaModel; expires=Thu, 03-Jan-2019 09:16:48 GMT; Max-Age=3600
           Set-Cookie: app/Index/Model/IndexModel=app%2FIndex%2FModel%2FIndexModel; expires=Thu, 03-Jan-2019 09:16:48 GMT; Max-Age=3600
           Content-Length: 70
           Content-Type: text/html
         * */
    }

    public function file_content()
    {
        $postData = array(
            'name' => 'xxx',
            'password' => 'yyy',
            'title' => 'zzz'
        );
        $postData = http_build_query($postData);
        $opt = array(
            'http' =>array(
                'method' => 'post',
                'header' =>
                            "host:localhost\r\n".
                            "Content-type:application/x-www-form-urlencoded\r\n".
                            "Content-length:".strlen($postData)."\r\n",
                            "content" => $postData,
            )
        );
        $content = stream_context_create($opt);
        file_get_contents("url",false,$content);
    }

}
