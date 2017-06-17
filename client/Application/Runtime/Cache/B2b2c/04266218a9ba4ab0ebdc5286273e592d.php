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



<link rel="stylesheet" type="text/css" href="/ok/client/Application/B2b2c/Public/plug/dropload/css/dropload.css" />
<script type="text/javascript" src="/ok/client/Application/B2b2c/Public/plug/dropload/js/dropload.js"></script>

<div class="b2b2c_layout">
    <!--头部start-->
    <header class="b2b2c_public_header_two">订单管理</header>
        <a href="<?php echo U('User/home');?>" class="b2b2c_public_back"></a>
    <!--头部end-->

    <!--导航start-->
    <nav class="b2b2c_mage_order">
        <ul class="b2b2c_p16">
            <li class="active" data-status="0" onclick="b2b2cf.order_manage_switch_order_status(this)">全部</li>
            <li data-status="1" onclick="b2b2cf.order_manage_switch_order_status(this)">待付款</li>
            <li data-status="2" onclick="b2b2cf.order_manage_switch_order_status(this)">待发货</li>
            <li data-status="3" onclick="b2b2cf.order_manage_switch_order_status(this)">待收货</li>
            <li data-status="4" onclick="b2b2cf.order_manage_switch_order_status(this)">待评价</li>
            <li data-status="5" onclick="b2b2cf.order_manage_switch_order_status(this)">已关闭</li>
        </ul>
    </nav>
    <!--导航end-->

    <!--主内容区域start-->
    <div class="dropload_content">
        <main class="b2b2c_mage_order_con">
            <!--订单一start-->
            <?php $order_id_index = 0;?>
            <?php if(is_array($list)): foreach($list as $key=>$vo): $sum = 0;?>
                <?php $order_id_index++;?>
                <section class="b2b2c_mage_order_inner" data-index="<?php echo ($order_id_index); ?>">
                    <div class="b2b2c_order_inner_t bgcf b2b2c_p16 clearfix">
                        <span class="b2b2c_shop_state fr tr">
                            <?php if($vo['order_status'] == 3 && $vo['is_pay']==1):?>
                                已取消
                            <?php elseif($vo['order_status'] == 4):?>
                                交易关闭
                            <?php elseif($vo['order_status'] == 5 && $vo['is_pay']==1):?>
                                已完成
                            <?php elseif($vo['order_status'] == 6 && $vo['is_pay']==1):?>
                                正在退款
                            <?php elseif($vo['is_pay']==0):?>
                                待付款
                            <?php elseif($vo['is_pay']==1):?>
                                已付款
                            <?php endif;?>
                        </span>
                    </div>
                    <?php $sum += $vo['order_shipping_fee']; ?>
                    <div class="b2b2c_order_inner_c">
                        <div class="b2b2c_product bgcf">
                            <ul>
                                <!-- 商品内容一start-->
                                <?php if(is_array($vo["title"])): foreach($vo["title"] as $key=>$pvo): ?><li class="clearfix">
                                        <div class="b2b2c_div clearfix" onclick='window.location.href="<?php echo U('User/orderdetailbuyers',array('order_id'=>$vo['id']));?>"'>
                                            <div class="b2b2c_imgbox fl">
                                                <a href="javascript:void(0);">
                                                    <img src="<?php echo ($pvo["goods_img"]); ?>" alt="">
                                                </a>
                                            </div>
                                            <div class="b2b2c_product_txt fl">
                                                <h3><?php echo ($pvo["goods_name"]); ?></h3>
                                                <p class="clearfix">
                                                <span class="fl">
                                                    <i>&yen</i>
                                                    <i><?php echo ($pvo["amount"]); ?></i>
                                                    <i>&times;</i>
                                                    <i><?php echo ($pvo["goods_num"]); ?></i>
                                                </span>
                                                <span class="fr">
                                                     <i>&yen</i>
                                                    <i><?php echo $pvo['amount']*$pvo['goods_num'] ?></i>
                                                </span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="b2b2c_succeed_after_box clearfix">
                                            <?php if($pvo['has_comment_button']):?>
                                                <a class="fr" href="<?php echo U('User/buyermakeorderrated', array('order_id'=>$pvo['id'], 'product_id'=>$pvo['product_id']));?>">评价</a>
                                            <?php endif;?>

                                            <?php if($pvo['has_aftersale_apply_button']):?>
                                                <a class="fr" href="javascript:void(0);" onclick="b2b2cf.order_manage_aftersale_apply()">申请售后</a>
                                            <?php endif;?>
                                        </div>                                                      
                                    </li>
                  
                                    <?php $sum += $pvo['amount']*$pvo['goods_num']; endforeach; endif; ?>

                                <!--商品内容一end-->
                            </ul>
                        </div>
                        <div class="b2b2c_payment_box bgcf b2b2c_p16 clearfix">
                            <div class="b2b2c_payment fr">
                                <span>实付:&yen</span>
                                <span class="b2b2c_price"><?php echo ($vo["sum"]); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="b2b2c_order_inner_b bgcf clearfix">

                        <?php if($vo['is_pay']==0):?>
                            <a href="<?php echo U('Pay/applypay',array('sn'=>$vo['order_sn']));?>" class="fr">立即付款</a>
                        <?php endif;?>

                        <?php if($vo['is_pay']==1 && $vo['order_status']>=2):?>
                            <a href="javascript:void(0)" class="fr" onclick="b2b2cf.apply_order_refund(<?php echo ($vo["id"]); ?>)">申请退单</a>
                        <?php endif;?>

                        <?php if($vo['is_pay']==1 && $vo['is_delivery']==1):?>
                            <a href="javascript:void(0)" class="fl" onclick="b2b2cf.get_order_logistics_detail(<?php echo ($vo["id"]); ?>)">物流信息</a>
                        <?php endif;?>

                        <?php if($vo['is_pay']==1 && $vo['is_delivery']==1 && $v['is_stauts']!=3 && $v['is_stauts']!=6 && $v['is_stauts']!=7 && $v['is_stauts']!=4):?>
                            <a href="javascript:void(0);" class="fr" onclick="b2b2cf.make_order_sure(<?php echo ($vo["id"]); ?>)">点击收货</a>
                        <?php endif;?>

                        <?php if($vo['order_status'] == 1):?>
                            <!-- 待付款 -->
                            
                        <?php elseif($vo['order_status'] == 2):?>
                            <!-- 交易关闭 -->
                        <?php elseif($vo['order_status'] == 3):?>
                            <!-- 退单申请中 -->
                        <?php elseif($vo['order_status'] == 4):?>
                            <!-- 交易关闭 -->
                        <?php elseif($vo['order_status'] == 6):?>
                            <!-- 待发货 -->

                        <?php elseif($vo['order_status'] == 7):?>
                            <!-- 交易关闭 -->
                        <?php elseif($vo['order_status'] == 8 || $vo['order_status'] == 9 || $vo['order_status'] == 10):?>
                            <!-- 交易成功 -->

                            <?php if($vo['order_status'] == 8):?>

                            <?php endif;?>
                        <?php endif;?>
                    </div>
                </section><?php endforeach; endif; ?>

            <!--订单一end-->


        </main>
        <!--主内容区域end-->
    </div>

</div>
<script>
var dropload;
var switching_order_status = false;
$(function(){
    // dropload
    // dropload = $('.dropload_content').dropload({
    //     scrollArea : window,
    //     domUp : {
    //         domClass   : 'dropload-up',
    //         domRefresh : '<div class="dropload-refresh">↓下拉刷新</div>',
    //         domUpdate  : '<div class="dropload-update">↑释放更新</div>',
    //         domLoad    : '<div class="dropload-load"><span class="loading"></span>加载中...</div>'
    //     },
    //     domDown : {
    //         domClass   : 'dropload-down',
    //         domRefresh : '<div class="dropload-refresh">↑上拉加载更多</div>',
    //         domLoad    : '<div class="dropload-load"><span class="loading"></span>加载中...</div>',
    //         domNoData  : '<div class="dropload-noData">暂无更多数据</div>'
    //     },
    //     loadUpFn : function(me){
    //         var get_data = {};
    //         get_data.terminal_type = 2;
    //         var last_order_index = 0;
    //         get_data.last_order_index = last_order_index;
    //         get_data.status = $('.b2b2c_mage_order li.active').eq(0).data('status');

    //         b2b2cc.curls('B2b2cPrivate/GetOrderList', get_data, function(data) {
    //             if(data.status){
    //                 var data = data.data.list;
    //                 var html = "";
    //                 if(data.length > 0){
    //                     html = b2b2cf.order_manage_make_list_html(data, last_order_index);
    //                 }

    //                 $('.b2b2c_mage_order_con').html(html);
    //                 me.resetload();
    //                 me.unlock();
    //                 me.noData(false);
    //             }

    //         }, 'get');
    //     },
    //     loadDownFn : function(me){
    //         var get_data = {};
    //         get_data.terminal_type = 2;

    //         var last_order_index = $('.b2b2c_mage_order_inner:last').data('index');
    //         get_data.last_order_index = last_order_index;
    //         get_data.status = $('.b2b2c_mage_order li.active').eq(0).data('status');

    //         b2b2cc.curls('B2b2cPrivate/GetOrderList', get_data, function(data) {
    //             if(data.status){
    //                 var data = data.data.list;
    //                 var html = "";
    //                 if(data.length > 0){
    //                     html = b2b2cf.order_manage_make_list_html(data, last_order_index);
    //                 }else{
    //                     // 锁定
    //                     me.lock();
    //                     // 无数据
    //                     me.noData();
    //                 }

    //                 $('.b2b2c_mage_order_con').append(html);
    //                 me.resetload();
                
    //             }

    //         }, 'get');
    //     },
    //     threshold : 50
    // });
});


</script>
</body>
</html>