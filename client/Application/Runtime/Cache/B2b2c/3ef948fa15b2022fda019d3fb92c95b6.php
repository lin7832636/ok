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


    <header class="header user_header_top b2b2c_public_header_two b2b2c_public_header_revamp">
        <a href="javascript:history.back(-1);" class="user_back b2b2c_public_back"></a>
        修改头像<!--<a href="" class="user_hold">保存</a>-->
    </header>
    <div class="wrap_page padlr55">
        <!--加载资源-->
        <div class="lazy_tip" id="lazy_tip"><span>1%</span><br> 载入中......</div>
        <div class="lazy_cover"></div>
        <div class="resource_lazy hide"></div>
        <div class="pic_edit">
            <div id="clipArea" class="b2b2c_revamp_imginner"></div>
            <button id="upload2">选择图片</button>
            <button id="clipBtn">预览</button>
            <input type="file" id="file" style="opacity: 0;position: fixed;bottom: -100px">
            <!--缩略图预览-->
            <div id="plan" style="display:none">
                <div class="pointer_canvas">
                    <canvas id="myCanvas"></canvas>
                </div>
                <h2 onClick="Close();" class="user_pointer_sure" style="cursor:pointer; display:inline-block">重新选择</h2>
                <h2 onClick="Submit();" class="user_pointer_sure" style="cursor:pointer; display:inline-block">上传头像</h2>
                <form action="<?php echo U('User/edit_portrait');?>" method="post" id="submit">
                    <input type="hidden" name="image" value="" id="image">
                </form> 
            </div>
        </div>
        <img src="" fileName="" id="hit" style="display:none;z-index: 9">
        <div id="cover"></div>
    </div>
</body>
</html>
<script src="/ok/client/Application/B2b2c/Public/js/jquery.js"></script>
<script src="/ok/client/Application/B2b2c/Public/plug/upload/sonic.js"></script>
<script src="/ok/client/Application/B2b2c/Public/plug/upload/comm.js"></script>
<script src="/ok/client/Application/B2b2c/Public/plug/upload/hammer.js"></script>
<script src="/ok/client/Application/B2b2c/Public/plug/upload/iscroll-zoom.js"></script>
<script src="/ok/client/Application/B2b2c/Public/plug/upload/jquery.photoClip.js?v=1"></script>
<script>
var hammer = '';
var currentIndex = 0;
var body_width = $('body').width();
var body_height = $('body').height();

$('body').bind("touchmove",function(e){
    e.preventDefault();
});

$("#clipArea").photoClip({
    width: body_width *0.9,
    height: body_width *0.9,
    file: "#file",
    view: "#hit",
    ok: "#clipBtn",
    loadStart: function () {
        $('.lazy_tip span').text('');
        $('.lazy_cover,.lazy_tip').show();
    },
    loadComplete: function () {
        $('.lazy_cover,.lazy_tip').hide();
    },
    clipFinish: function (dataURL) {
        $('#hit').attr('src', dataURL);
        saveImageInfo();
    }
});

//图片上传
function saveImageInfo() {
    var filename = $('#hit').attr('fileName');
    var img_data = $('#hit').attr('src');
    if(img_data==""){alert('null');}
    $("#image").val(img_data);
    render(img_data); 
}

/*获取文件拓展名*/
function getFileExt(str) {
    var d = /\.[^\.]+$/.exec(str);
    return d;
}

//图片上传结束
$(function () {
    $('#upload2').on('click', function () {
        //图片上传按钮
        $('#file').click();
    });
})


function Close(){$('#plan').hide();}

// 渲染 Image 缩放尺寸  
function render(src){  
     var MAX_HEIGHT = 256;  //Image 缩放尺寸 
    // 创建一个 Image 对象  
    var image = new Image();  
    
    // 绑定 load 事件处理器，加载完成后执行  
    image.onload = function(){  
        // 获取 canvas DOM 对象  
        var canvas = document.getElementById("myCanvas"); 
        // 如果高度超标  
        if(image.height > MAX_HEIGHT) {  
            // 宽度等比例缩放 *=  
            image.width *= MAX_HEIGHT / image.height;  
            image.height = MAX_HEIGHT;  
        }  
        // 获取 canvas的 2d 环境对象,  
        // 可以理解Context是管理员，canvas是房子  
        var ctx = canvas.getContext("2d");  
        // canvas清屏  
        ctx.clearRect(0, 0, canvas.width, canvas.height); 
        canvas.width = image.width;        // 重置canvas宽高  
        canvas.height = image.height;  
        // 将图像绘制到canvas上  
        ctx.drawImage(image, 0, 0, image.width, image.height);  
        // !!! 注意，image 没有加入到 dom之中  
        
     var dataurl = canvas.toDataURL("image/jpeg");  
     var imagedata =  encodeURIComponent(dataurl); 
        $('#plan').attr('data-src',dataurl); 
      $('#plan').show();
    };  
    // 设置src属性，浏览器会自动加载。  
    // 记住必须先绑定render()事件，才能设置src属性，否则会出同步问题。  
    image.src = src;    
};  

function Submit(){
    $("#submit").submit();
}
</script>