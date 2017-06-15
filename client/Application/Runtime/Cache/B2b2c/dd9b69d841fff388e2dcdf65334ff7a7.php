<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0"/>
        <title>博宠商城</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta content="telephone=no" name="format-detection"/>
        <script type="text/javascript">var GV = {DIMAUB: "/oks/client/", MODULE_URL: "/oks/client/index.php/B2b2c/"};</script>
    <link rel="stylesheet" type="text/css" href="/oks/client/Application/B2b2c/Public/plug/swiper/css/swiper.min.css" />
    <link rel="stylesheet" type="text/css" href="/oks/client/Application/B2b2c/Public/plug/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/oks/client/Application/B2b2c/Public/plug/upload/style.css" />
    <link rel="stylesheet" type="text/css" href="/oks/client/Application/B2b2c/Public/plug/artDialog/css/ui-dialog.css" />
    <link rel="stylesheet" type="text/css" href="/oks/client/Application/B2b2c/Public/css/b2b2c.css" />
    <script type="text/javascript" src="/oks/client/Application/B2b2c/Public/js/jquery.js"></script>
    <script type="text/javascript" src="/oks/client/Application/B2b2c/Public/plug/swiper/js/swiper.min.js"></script>
    <script type="text/javascript" src="/oks/client/Application/B2b2c/Public/plug/artDialog/dist/dialog.js"></script>
    <script type="text/javascript" src="/oks/client/Application/B2b2c/Public/plug/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/oks/client/Application/B2b2c/Public/js/b2b2cc.js"></script>
    <script type="text/javascript" src="/oks/client/Application/B2b2c/Public/js/b2b2cf.js"></script>
    <script type="text/javascript" src="/oks/client/Application/B2b2c/Public/js/b2b2cj.js"></script>
    <script type="text/javascript" src="/oks/client/Application/B2b2c/Public/js/b2b2c.js"></script>
    <script type="text/javascript" src="/oks/client/Application/B2b2c/Public/plug/effect/js/jquery.ui.widget.js"></script>
    <script type="text/javascript" src="/oks/client/Application/B2b2c/Public/plug/effect/js/jquery.iframe-transport.js"></script>
    <script type="text/javascript" src="/oks/client/Application/B2b2c/Public/plug/effect/js/jquery.fileupload.js"></script>

    <script type="text/javascript" src="/oks/client/Application/B2b2c/Public/plug/bootstrap/js/bootstrap-datetimepicker.js"></script>
    <script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?23f8c2c17dd7a662f57060d862356c09";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

<!-- 百度站长自动推送工具代码 -->
<script>
(function(){
    var bp = document.createElement('script');
    var curProtocol = window.location.protocol.split(':')[0];
    if (curProtocol === 'https') {
        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';        
    }
    else {
        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
    }
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();
</script>

</head>
<body>



<div class="b2b2c_layout">
    <form action="" method="get">
        <!--头部start-->
        <header class="b2b2c_public_header_two b2b2c_public_header_revamp">
            修改昵称
            <input type="submit" readonly value="保存">
            <a href="javascript:history.back(-1);" class="b2b2c_public_back"></a>
        </header>
        <!--头部end-->

        <!--主内容区域start-->
        <main class="b2b2c_revamp_box">
            <section class="b2b2c_revamp_input bgcf">
                <input type="text" name="nickname" value="<?php echo I('get.current','','trim'); ?>">
            </section>
            <p>请点击更改您的昵称</p>
        </main>
        <!--主内容区域end-->
    </form>
</div>
</body>
</html>