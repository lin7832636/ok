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
	<div style="position:fixed;top:0;left:0;z-index:10;width:100%;">
    <header class="b2b2c_public_header_two b2b2c_public_header_revamp">
        <span>购物车</span>
        <span>(<i class="b2b2c_cart_shop_num"><?php echo ($count); ?></i>)</span>
		<input readonly="" value="编辑" type="button" onclick="b2b2cc.refresh('User/get_cart_list_edit', '', true);">
		<a href="<?php echo U('Index/index');?>" class="b2b2c_public_back"></a>
    </header>
	</div>
    <!--头部end-->

    <!--主内容区域start-->
    <main class="b2b2c_index_cart">
        <!--店铺二的商品start-->

			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><section class="b2b2c_index_cart_box bgcf">
			<div class="b2b2c_shop_name b2b2c_p16 clearfix">
                <input class="fl" id="<?php echo ($vo["shop_id"]); ?>" type="checkbox" onclick="b2b2cf.get_cart_list_checkbox(this);">
                <a class="toe fl" href="#"><?php echo ($vo["shop_name"]); ?></a>
            </div>
				<div class="b2b2c_index_cart_inner_box">
				<?php if(is_array($vo["list"])): $i = 0; $__LIST__ = $vo["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$volist): $mod = ($i % 2 );++$i;?><!--商品一start-->
				<div class="b2b2c_index_cart_inner">
					<div class="b2b2c_product_mid clearfix" onclick="b2b2cf.cart_jump_to_goods_info(<?php echo ($volist["goods_id"]); ?>)">
						<div class="input_box fl">
							<input 
							<?php if($volist['product_store'] <= 0)echo 'disabled'; ?>
							class="b2b2c_checkbox_<?php echo ($vo["shop_id"]); ?>" name="goodsinput" value="<?php echo ($volist["id"]); ?>" data-product-sum="<?php echo ($volist["product_price_sum"]); ?>" type="checkbox" onclick="b2b2cf.get_cart_list_checkbox(this,event);">
						</div>
						<a href="#" class="fl"><img src="<?php echo ($volist['product_image'][0]); ?>" alt=""></a>
						<div class="b2b2c_box fl">
							<p class="toe"><?php echo ($volist["goods_name"]); ?></p>
							<div class="b2b2c_price clearfix">
								<span class="fl">
									<i>&yen;</i>
									<i><?php echo ($volist["product_price"]); ?></i>
									<i>&times;</i>
									<i><?php echo ($volist["count"]); ?></i>
								</span>
								<span class="fr">
									<i>&yen;</i>
									<i><?php echo ($volist["product_price_sum"]); ?></i>
								</span>
							</div>
							<div class="b2b2c_size toe clearfix" onclick="">
								<i>规格:</i>
								<i><?php echo ($volist["product_name"]); ?></i>
							</div>
							<div class="b2b2c_size toe clearfix">
								<i>库存:</i>
								<i><?php echo ($volist["product_store"]); ?></i>
							</div>
						</div>
					</div>
				</div>
				<!--商品一end--><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				 </section><?php endforeach; endif; else: echo "" ;endif; ?>
        <!--店铺二的商品end-->
    </main>
    <!--主内容区域end-->
    <!--底部结算区域start-->
    <footer class="b2b2c_cart_footer bgcf">
        <ul>
            <li>
                <input type="checkbox" id="quanxuan" onclick="b2b2cf.get_cart_list_checkbox(this);">
                <label for="quanxuan">全选</label>
            </li>
            <li>
                <span>合计:</span>
                <span class="b2b2c_cart_allprice"><i>&yen;</i><i id="b2b2c_product_money_sum">0.0</i></span>
                <span class="b2b2c_cart_carriage">不含运费</span>
            </li>
            <li class="b2b2c_clearing tc" onclick="b2b2cc.actions('User/order_confirm/b2b2c_cart_id/'+$('input[name=\'goodsinput\']:checked').map(function() { return $(this).val(); }).get().join(','));"">
                <span>去结算:</span>
                <span>
                   (<i id="b2b2c_product_sum">0</i>)
                </span>
            </li>
        </ul>
    </footer>
    <!--底部结算区域end-->
</div>

</body>
</html>