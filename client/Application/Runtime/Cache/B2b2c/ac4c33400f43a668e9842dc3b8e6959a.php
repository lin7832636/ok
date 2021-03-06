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


<script src="/ok/client/Application/B2b2c/Public/plug/date/mobiscroll_002.js" type="text/javascript"></script>
<script src="/ok/client/Application/B2b2c/Public/plug/date/mobiscroll.js" type="text/javascript"></script>
<link href="/ok/client/Application/B2b2c/Public/plug/date/mobiscroll.css" rel="stylesheet" type="text/css">

<div class="b2b2c_layout">
    <!--头部start-->
    <header class="b2b2c_public_header_two">个人资料</header>
        <a href="<?php echo U('User/home');?>" class="b2b2c_public_back"></a>
    <!--头部end-->
    <!--主内容区域start-->
    <main class="b2b2c_userdata_show">
        <!--头像等资料start-->
        <section class="b2b2c_userdata_pic bgcf">
            <a class="clearfix" href="<?php echo U('user/edit_portrait', array('current'=>$user_info['portrait']));?>">
                <span class="fl">头像设置</span>
                <span class="b2b2c_img_box fr">
                    <img src="<?php echo ($user_info["img"]); ?>" alt="">
                </span>
            </a>
        </section>
        <!--头像等资料end-->

        <section class="b2b2c_nickname bgcf">
            <a class="b2b2c_public_h56 clearfix" href="<?php echo U('user/edit_nickname', array('current'=>$user_info['nickname']));?>">
                <span class="fl">昵称</span>
                <span class="fr"><?php echo $user_info['info_nickname']?></span>
            </a>
        </section>

        <section class="bgcf">
            <a class="b2b2c_public_h56 clearfix" href="javascript:void(0);" onclick="b2b2cf.edit_gender();">
                <span class="fl">性别</span>
                <?php if($user_info["info_gender"] == 1): ?><span class="fr" id="b2b2c_span_gender">男</span>
                <?php else: ?>
                    <span class="fr" id="b2b2c_span_gender">女</span><?php endif; ?>
            </a>
        </section>

        <section class="bgcf">
            <a class="b2b2c_public_h56 clearfix" href="<?php echo U('user/edit_realname', array('realname'=>$user_info['realname']));?>">
                <span class="fl">真实姓名</span>    
                <span class="fr"><?php echo ($user_info["info_realname"]); ?></span>
            </a>
        </section>

        <section class="bgcf b2b2c_birthday_box">
            <form action="<?php echo U('User/edit_birthday');?>" method="get" id="birthday_form">
                <input value="" name="birthday" type="hidden">
                <input value="B2b2c/user/index" name="redirect_url" type="hidden">
            </form>
            <input class="b2b2c_public_h56 b2b2c_birthday_input" id="user_input_hold"/>
                <span class="b2b2c_br_before">生日</span>
                <span class=" b2b2c_br_after"><?php echo date("Y-m-d",$user_info['info_birthday'])?></span>
        </section>

        <section class="b2b2c_user_number_show">
            <p class="b2b2c_public_h56 clearfix">
                <span class="fl">手机号码</span>
                <span class="fr"><?php echo ($user_info["info_tel"]); ?></span>
            </p>
        </section>
    </main>
    <!--主内容区域end-->

    <!--底部按钮-->
    <section class="b2b2c_public_click_btnbox">
        <input class="b2b2c_public_click_btn" type="button" value="退出当前账号" onclick="b2b2cf.logout();">
    </section>


    <!--修改性别start-->
    <div class="b2b2c_revamp_sexindex" id="b2b2c_div_gender" style="display:none;">
        <div class="b2b2c_revamp_choice">
            <input type="button" readonly value="男" onclick="b2b2cf.edit_gender_post(1)">
            <input type="button" readonly value="女" onclick="b2b2cf.edit_gender_post(0)">
        </div>
        <div><input type="button" class="b2b2c_sexindex_cancel" readonly value="取消" onclick="b2b2cf.hide_shade();"></div>
    </div>
    <!--修改性别end-->

    <!--修改生日start-->
    <!--修改生日end-->


</div>
<!--遮罩层start-->
<!--需要用遮罩时，开启遮罩层的同时给body加“b2b2c_noslide”这个类名 用来防止屏幕下方拖动，关闭遮罩时再remove掉这个类名-->
<div class="b2b2c_public_shade" id="b2b2c_public_shade" style="display:none;"></div>
<!--遮罩层end-->
</body>
</html>
<script type="text/javascript">
    $(function () {
        var currYear = (new Date()).getFullYear();  
        var opt={};
        opt.date = {preset : 'date'};
        opt.datetime = {preset : 'datetime'};
        opt.time = {preset : 'time'};
        opt.default = {
            theme: 'android-ics light', //皮肤样式
            display: 'bottom', //显示方式 
            mode: 'scroller', //日期选择模式
            dateFormat: 'yyyy-mm-dd',
            lang: 'zh',
            setText: '确定',
            cancelText: '取消',
            startYear: currYear - 100, //开始年份
            endYear: currYear + 100, //结束年份
            onSelect: b2b2cf.mobiscroll_select,
        };

        $("#user_input_hold").mobiscroll($.extend(opt['date'], opt['default']));
        var optDateTime = $.extend(opt['datetime'], opt['default']);
        var optTime = $.extend(opt['time'], opt['default']);
        $("#user_input_holdTime").mobiscroll(optDateTime).datetime(optDateTime);
        $("#appTime").mobiscroll(optTime).time(optTime);
    });


</script>