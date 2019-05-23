<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>管理后台</title>

    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">
    <!--[if lt IE 8]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <link href="/public/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/public/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/public/css/animate.min.css" rel="stylesheet">
    <link href="/public/css/style.min.css?v=4.0.0" rel="stylesheet">
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <form id="record-form" class="form-horizontal" action="edit" method="post" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-lg-2 control-label" for="head-img">
                    头像
                </label>
                <div class="col-lg-4">
                    <div class="input-group js-upload-container">
                        <input type="file" id="file" class="js-image-upload" name="file" onchange="imgChange(this)"/>
                        <input type="hidden" id="head-img" class="js-image-url" name="headImg"/>
                        <img id="head-imgs" src="" alt="">
                    </div>
                </div>
                <div class="col-lg-4">
                    <label class="help-text" for="head-img">
                        支持.jpg .jpeg .bmp .gif .png格式照片
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-2 control-label" for="nick-name">
                    <span class="text-warning">*</span>
                    昵称
                </label>

                <div class="col-lg-4">
                    <input type="text" class="form-control" name="nickName" id="nick-name">
                </div>
            </div>

            <div class="clearfix form-actions form-group">
                <div class="col-lg-offset-2">
                    <input type="hidden" id="id" name="id">
                    <button class="btn btn-primary" type="submit">
                        <i class="fa fa-check bigger-110"></i>
                        提交
                        <tton>
                </div>
            </div>
        </form>
    </div>
    <!-- PAGE CONTENT ENDS -->
</div><!-- /.col -->
<script src="/public/js/jquery.min.js?v=2.1.4"></script>
<script src="/public/js/bootstrap.min.js?v=3.3.5"></script>
<script src="/public/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/public/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="/public/js/plugins/layer/layer.min.js"></script>
<script src="/public/js/hplus.min.js?v=4.0.0"></script>
<script type="text/javascript" src="/public/js/contabs.min.js"></script>
<script src="/public/js/plugins/pace/pace.min.js"></script>
<script>
    function imgChange(obj) {
        var file =document.getElementById("file");
        var imgUrl =window.URL.createObjectURL(file.files[0]);
        var img =document.getElementById('head-imgs');
        img.setAttribute('src',imgUrl); // 修改img标签src属性值
    }
</script>
</body>
<!-- /.row -->
