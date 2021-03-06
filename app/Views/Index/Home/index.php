<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理后台</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">
    <link href="/public/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/public/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <!-- Morris -->
    <link href="/public/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="/public/css/animate.min.css" rel="stylesheet">
    <link href="/public/css/style.min.css?v=4.0.0" rel="stylesheet"><base target="_blank">

</head>

<body class="gray-bg">
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>项目进度</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="index.html#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href=<?php __DIR__?>"/index/home/edit" target="_self">编辑</a>
                            </li>
                            <li><a href=<?php __DIR__?>"/index/home/add" target="_self">新增</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="ibox-content ibox-heading">
                    <h3>还有约0个Bug需要修复</h3>
                    <small><i class="fa fa-map-marker"></i> 地点当然是在办公室</small>
                </div>
                <div class="ibox-content timeline">

                    <div class="timeline-item">
                        <div class="row">
                            <div class="col-xs-3 date">
                                <i class="fa fa-briefcase"></i> 6:00
                                <br/>
                                <small class="text-navy">2 小时前</small>
                            </div>
                            <div class="col-xs-7 content no-top-border">
                                <p class="m-b-xs"><strong>服务器已彻底崩溃</strong>
                                </p>

                                <p>还未检查出错误</p>

                                <p><span data-diameter="40" class="updating-chart">5,3,9,6,5,9,7,3,5,2,5,3,9,6,5,9,4,7,3,2,9,8,7,4,5,1,2,9,5,4,7,2,7,7,3,5,2</span>
                                </p>
                                <a href=<?php __DIR__?>"/index/home/edit" target="_self">编辑</a>
                                <a href=<?php __DIR__?>"/index/home/delete">删除</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script src="/public/js/jquery.min.js?v=2.1.4"></script>
<script src="/public/js/bootstrap.min.js?v=3.3.5"></script>
<script src="/public/js/plugins/flot/jquery.flot.js"></script>
<script src="/public/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="/public/js/plugins/flot/jquery.flot.spline.js"></script>
<script src="/public/js/plugins/flot/jquery.flot.resize.js"></script>
<script src="/public/js/plugins/flot/jquery.flot.pie.js"></script>
<script src="/public/js/plugins/peity/jquery.peity.min.js"></script>
<script src="/public/js/demo/peity-demo.min.js"></script>
<script src="/public/js/content.min.js?v=1.0.0"></script>
<script src="/public/js/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="/public/js/plugins/gritter/jquery.gritter.min.js"></script>
<script src="/public/js/plugins/easypiechart/jquery.easypiechart.js"></script>
<script src="/public/js/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="/public/js/demo/sparkline-demo.min.js"></script>

<script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script>
</body>

</html>