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
    <!--头部start-->
    <header class="b2b2c_public_header">我的博宠</header>
    <!--头部end-->
  <!--主内容区域start-->
    <main class="b2b2c_user_box">
        <!--头像等资料start-->
        <section class="b2b2c_user_box_top bgcf">
            <div class="b2b2c_user_data">
                <img src="<?php echo ($user_info["portrait_url"]); ?>" alt="">
                <p class="toe">
                    <?php if(!empty($user_info["nickname"])): echo ($user_info["nickname"]); ?>
                    <?php else: ?>
                        <?php echo ($user_info["telno"]); endif; ?>                    
                </p>
            </div>
            <div class="b2b2c_user_data_settings">
                <a href="<?php echo U('user/index');?>">账户管理、个人资料</a>
            </div>
        </section>
        <!--头像等资料end-->

        <section class="b2b2c_go_collect_box bgcf">
            <a href="<?php echo U('user/collect');?>" class="clearfix">
                <span>收藏夹</span>
                <span>查看收藏</span>
            </a>
        </section>

        <section class="b2b2c_go_order_box bgcf">
            <a href="<?php echo U('user/order_manage');?>" class="clearfix">
                <span>订单管理</span>
                <span>查看订单</span>
            </a>
        </section>

        <section class="b2b2c_go_address_box bgcf">
            <a href="<?php echo U('user/address');?>" class="clearfix">
                <span>收货地址管理</span>
                <span>查看/修改地址</span>
            </a>
        </section>
    </main>
    <!--主内容区域end-->

    <!--悬浮底部start-->
    <footer class="b2b2c_index_footer">
        <div class="b2b2c_index_footer_box">
            <ul>
                <li>
                    <!--谁是当前页给谁的a加上active这个类名，即可变换图标和文字的颜色-->
                    <a href="<?php echo U('Index/index');?>">
                        <div class="b2b2c_index_icon"></div>
                        <p>首页</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('User/get_cart_list');?>">
                        <div class="b2b2c_cart_icon"></div>
                        <p>购物车</p>
                    </a>
                </li>
                <li>
                    <a href="#" class="active">
                        <div class="b2b2c_user_icon"></div>
                        <p>我的博宠</p>
                    </a>
                </li>
            </ul>
        </div>
    </footer>
</div>
</body>
</html>