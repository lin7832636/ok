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
    <!--此页面是 密码找回 和 注册页 通用页面只是头部不一样-->
    <!--头部start-->
    <header class="b2b2c_login_header">新用户注册
        <a href="javascript:history.back(-1);" class="b2b2c_public_back"></a>
    </header>
    <!--头部end-->
    <!--表单区域start-->
    <section class="b2b2c_login_box">
        <form action="#">
            <div class="b2b2c_login_mobile b2b2c_login_mib">
                <label for="b2b2c_telno">
                  <i class="" title="手机号">手机号码</i>
                </label>
                <input type="text" name="" id="b2b2c_telno" onblur="b2b2cf.user_register_telno($('#b2b2c_telno').val());" class="" value="" maxlength="" tabindex="1" aria-label=""placeholder="请输入手机号">
            </div>
            <div class="b2b2c_login_verify b2b2c_login_mib clearfix">
                <input type="text" name="" id="b2b2c_user_sms_code" onblur="b2b2cf.user_sms_is($('#b2b2c_hidden_user_sms_token').val(), $('#b2b2c_telno').val(), this.value);" class="fl" value="" maxlength="" tabindex="2" aria-label=""placeholder="输入验证码">
                <label for="b2b2c_user_sms_code"  class="fr tc">
                    <i title="验证码" id="b2b2c_button_user_sms" onclick="b2b2cf.user_sms($('#b2b2c_telno').val());">获取验证码</i>
                    <input type="hidden" id="b2b2c_hidden_user_sms_token" value="">
                </label>
            </div>
            <div class="b2b2c_login_mobile b2b2c_login_mib">
                <label for="password">
                    <i class="" title="密码" id="">输入密码</i>
                </label>
                <input type="password" name="" id="b2b2c_password_one" onblur="b2b2cf.register_passwords_is($('#b2b2c_password_one').val(), $('#b2b2c_password_two').val())" class="" value="" maxlength="" tabindex="3" aria-label=""placeholder="请您输入密码">
            </div>
            <div class="b2b2c_login_mobile">
                <label for="passwordtwo">
                    <i class="" title="密码">确认密码</i>
                </label>
                <input type="password" name="" id="b2b2c_password_two" onblur="b2b2cf.register_passwords_is($('#b2b2c_password_one').val(), $('#b2b2c_password_two').val())" class="" value="" maxlength="" tabindex="4" aria-label=""placeholder="确认密码">
            </div>
            <div id="b2b2c_div_register_error_message"></div>
            <div class="b2b2c_login_confirm">
                <input type="button" id="button_register_submit" value="请点击校验" onclick="b2b2cf.register_submit();">
            </div>
            <div class="b2b2c_login_readtxt">
                <input type="checkbox" id="" checked="checked" disabled="false">
                <label for="">我已阅读服务协议</label>
            </div>
            
        </form>
    </section>
    <!--表单区域end-->
</div>
</body>
</html>