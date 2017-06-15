<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0"/>
        <title>博宠商城</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta content="telephone=no" name="format-detection"/>
        <script type="text/javascript">var GV = {DIMAUB: "/client/", MODULE_URL: "/client/index.php/B2b2c/"};</script>
    <link rel="stylesheet" type="text/css" href="/client/Application/B2b2c/Public/plug/swiper/css/swiper.min.css" />
    <link rel="stylesheet" type="text/css" href="/client/Application/B2b2c/Public/plug/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/client/Application/B2b2c/Public/plug/upload/style.css" />
    <link rel="stylesheet" type="text/css" href="/client/Application/B2b2c/Public/plug/artDialog/css/ui-dialog.css" />
    <link rel="stylesheet" type="text/css" href="/client/Application/B2b2c/Public/css/b2b2c.css" />
    <script type="text/javascript" src="/client/Application/B2b2c/Public/js/jquery.js"></script>
    <script type="text/javascript" src="/client/Application/B2b2c/Public/plug/swiper/js/swiper.min.js"></script>
    <script type="text/javascript" src="/client/Application/B2b2c/Public/plug/artDialog/dist/dialog.js"></script>
    <script type="text/javascript" src="/client/Application/B2b2c/Public/plug/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/client/Application/B2b2c/Public/js/b2b2cc.js"></script>
    <script type="text/javascript" src="/client/Application/B2b2c/Public/js/b2b2cf.js"></script>
    <script type="text/javascript" src="/client/Application/B2b2c/Public/js/b2b2cj.js"></script>
    <script type="text/javascript" src="/client/Application/B2b2c/Public/js/b2b2c.js"></script>
    <script type="text/javascript" src="/client/Application/B2b2c/Public/plug/effect/js/jquery.ui.widget.js"></script>
    <script type="text/javascript" src="/client/Application/B2b2c/Public/plug/effect/js/jquery.iframe-transport.js"></script>
    <script type="text/javascript" src="/client/Application/B2b2c/Public/plug/effect/js/jquery.fileupload.js"></script>

    <script type="text/javascript" src="/client/Application/B2b2c/Public/plug/bootstrap/js/bootstrap-datetimepicker.js"></script>
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
    <header class="b2b2c_public_header_two b2b2c_public_header_revamp">
        添加新地址
        <input type="button" readonly value="保存" onclick="b2b2cf.add_user_address()">
        <a href="<?php echo U('user/address');?>" class="b2b2c_public_back"></a>
    </header>
    <!--头部end-->
    <!--表单区域start-->
        <section class="b2b2c_add_new_address">
            <div class="b2b2c_newadd_inner bgcf">
                <label for="">收货人</label>
                <input type="text" autofocus name="name" value="">
            </div>
            <div class="b2b2c_newadd_inner bgcf">
                <label for="">联系电话</label>
                <input type="text" name="tel" value="">
            </div>
            <div class="b2b2c_newadd_inner bgcf b2b2c_address_area_box clearfix">
                <label for="" class="fl">所在地区</label>
                <input type="button"class="fl" readonly name="area" id="area" value="">
                <input type="hidden" class="fl" name="area_id">
            </div>
            <div class="b2b2c_newadd_inner bgcf">
               <textarea name="address" placeholder="填写详细地址，不少于5个字"></textarea>
            </div>
            <div class="b2b2c_newadd_inner bgcf">
                <label for="">邮编</label>
                <input type="number" name="zip" value="">
            </div>
            <div class="b2b2c_newadd_inner bgcf clearfix">
                <label for="" class="fl">设为默认</label>
                <input type="image" name="is_default" src="/client/Application/B2b2c/Public/images/icons/030.png" class="fr" value="0" onclick="b2b2cf.add_address_is_default();">
                <!--点击以后input的image 换成 src="../images/icons/031.png"-->
            </div>
        </section>
    <!--表单区域end-->
</div>
<script type="text/javascript" src="/client/Application/B2b2c/Public/plug/area/areas.js"></script>
<!--地区选择插件-->
<script type="text/javascript">
    $("#area").click(function (e) {
        b2b2cf.SelCity_add(this,e, function(area_id){
            $('input[name="area_id"]').val(area_id);
        });
    });
</script>
</body>
</html>