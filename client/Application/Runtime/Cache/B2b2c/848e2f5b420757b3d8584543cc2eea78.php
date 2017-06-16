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
    <header class="b2b2c_public_header_two b2b2c_public_header_revamp">
        <span>购物车</span>
        <span>(<i class="b2b2c_cart_shop_num"><?php echo ($count); ?></i>)</span>
		<input readonly="" value="完成" type="button" onclick="b2b2cc.refresh('User/get_cart_list', '', true);">
    </header>
    <!--头部end-->

    <!--主内容区域start-->
    <main class="b2b2c_index_cart b2b2c_index_cart_delm b2b2c_index_cart_pop">
        <!--店铺二的商品start-->

			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><section class="b2b2c_index_cart_box">
			<div class="b2b2c_shop_name bgcf b2b2c_p16 clearfix">
                <a class="toe fl" href="javascrtip:"><?php echo ($vo["shop_name"]); ?></a>
            </div>
				<?php if(is_array($vo["list"])): $i = 0; $__LIST__ = $vo["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$volist): $mod = ($i % 2 );++$i;?><!--商品一start-->
				<div class="b2b2c_index_cart_inner bgcf">
					<div class="b2b2c_product_mid b2b2c_product_mid_m clearfix">
						<a href="#" class="fl"><img src="<?php echo ($volist['product_image'][0]); ?>" alt=""></a>
						<!--点击编辑后出现的内容statr-->
						<div class="b2b2c_box1 fl">
							<div class="b2b2c_cart_edit_spnum clearfix">
								<a class="minus fl" onclick="b2b2cf.cart_product_count_edit(<?php echo ($volist["product_id"]); ?>, parseFloat($('#b2b2c_count_<?php echo ($volist["product_id"]); ?>').val())-1);"></a>
								<input type="text" value="<?php echo ($volist["count"]); ?>" id="b2b2c_count_<?php echo ($volist["product_id"]); ?>" class="fl"  autocomplete="off" onBlur="b2b2cf.cart_product_count_edit(<?php echo ($volist["product_id"]); ?>, $('#b2b2c_count_<?php echo ($volist["product_id"]); ?>').val());">
								<a class="plus fl tl" onclick="b2b2cf.cart_product_count_edit(<?php echo ($volist["product_id"]); ?>, parseFloat($('#b2b2c_count_<?php echo ($volist["product_id"]); ?>').val())+1);"></a>
							</div>
							<div class="b2b2c_size toe clearfix" onclick="b2b2cc.refresh('Index/product', 'goods_id:<?php echo ($volist["goods_id"]); ?>,product_id:<?php echo ($volist["product_id"]); ?>,rfs:b2b2cf.get_cart_list_edit_product();', true);">
								
								<i>规格:</i>
								<i><?php echo ($volist["product_name"]); ?></i>
							</div>
							<div class="b2b2c_cart_slid_sizebtn"></div>
						</div>
						<!--点击编辑后出现的内容end-->
					</div>
					 <!--删除按钮statr-->
					<div class="b2b2c_cart_delbtn_shop" onclick="b2b2cf.cart_product_delete(<?php echo ($volist["product_id"]); ?>); ">
						<span>删除</span>
					</div>
					<!--删除按钮end-->
				</div>
				<!--商品一end--><?php endforeach; endif; else: echo "" ;endif; ?>
				 </section><?php endforeach; endif; else: echo "" ;endif; ?>
        <!--店铺二的商品end-->
    </main>
    <!--主内容区域end-->
</div>

</body>
</html>