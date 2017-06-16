<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0"/>
        <title>博宠商城</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta content="telephone=no" name="format-detection"/>
        <script type="text/javascript">var GV = {DIMAUB: "/ok/client/", MODULE_URL: "/ok/client/index.php/B2b2c/"};</script>
    <link rel="stylesheet" type="text/css" href="/ok/client/Application/B2b2c/Public/plug/swiper/css/swiper.min.css" />
    <link rel="stylesheet" type="text/css" href="/ok/client/Application/B2b2c/Public/plug/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/ok/client/Application/B2b2c/Public/plug/upload/style.css" />
    <link rel="stylesheet" type="text/css" href="/ok/client/Application/B2b2c/Public/plug/artDialog/css/ui-dialog.css" />
    <link rel="stylesheet" type="text/css" href="/ok/client/Application/B2b2c/Public/css/b2b2c.css" />
    <script type="text/javascript" src="/ok/client/Application/B2b2c/Public/js/jquery.js"></script>
    <script type="text/javascript" src="/ok/client/Application/B2b2c/Public/plug/swiper/js/swiper.min.js"></script>
    <script type="text/javascript" src="/ok/client/Application/B2b2c/Public/plug/artDialog/dist/dialog.js"></script>
    <script type="text/javascript" src="/ok/client/Application/B2b2c/Public/plug/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/ok/client/Application/B2b2c/Public/js/b2b2cc.js"></script>
    <script type="text/javascript" src="/ok/client/Application/B2b2c/Public/js/b2b2cf.js"></script>
    <script type="text/javascript" src="/ok/client/Application/B2b2c/Public/js/b2b2cj.js"></script>
    <script type="text/javascript" src="/ok/client/Application/B2b2c/Public/js/b2b2c.js"></script>
    <script type="text/javascript" src="/ok/client/Application/B2b2c/Public/plug/effect/js/jquery.ui.widget.js"></script>
    <script type="text/javascript" src="/ok/client/Application/B2b2c/Public/plug/effect/js/jquery.iframe-transport.js"></script>
    <script type="text/javascript" src="/ok/client/Application/B2b2c/Public/plug/effect/js/jquery.fileupload.js"></script>

    <script type="text/javascript" src="/ok/client/Application/B2b2c/Public/plug/bootstrap/js/bootstrap-datetimepicker.js"></script>
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
    <!--头部start-->
    <header class="b2b2c_public_header_two">管理收货地址</header>
        <a href="<?php echo U('user/home');?>" class="b2b2c_public_back"></a>
    <!--头部end-->
    <!--主内容区域start-->
    <main style="margin-bottom:4.8rem;">
        <!--默认地址start-->
        <?php if(is_array($user_address)): foreach($user_address as $key=>$vo): ?><section class="b2b2c_edit_address_box b2b2c_user_edit_address">
                <div class="b2b2c_address_show bgcf">
                    <div class="b2b2c_show_top clearfix">
                        <span class="fl"><?php echo ($vo["names"]); ?></span>
                        <span  class="fr"><?php echo ($vo["tel"]); ?></span>
                    </div>
                    <p class="b2b2c_show_btm"><?php echo (areaToName($vo["area"])); ?> <?php echo ($vo["address"]); ?></p>
                </div>
                <div class="b2b2c_edit_address bgcf clearfix">
                    <?php if($vo["is_default"] == 1): ?><a href="javascript:void(0);" class="active fl">默认地址</a>
                    <?php else: ?>
                        <a href="javascript:void(0);" class="fl" onclick="b2b2cf.set_default_address(<?php echo ($vo["id"]); ?>)">设为默认</a>
                        <a href="javascript:void(0);" class="fr" onclick="b2b2cf.address_buyers_delete(<?php echo ($vo["id"]); ?>)">删除</a><?php endif; ?>
                </div>
            </section><?php endforeach; endif; ?>

        <!--默认地址end-->
    </main>
    <!--主内容区域end-->
    <footer class="b2b2c_add_address">
        <a href="<?php echo U('user/add_address');?>">添加新地址</a>
    </footer>
</div>
</body>
</html>