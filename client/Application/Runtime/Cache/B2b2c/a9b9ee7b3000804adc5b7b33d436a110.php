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
    <header class="b2b2c_public_header_two">订单提交
        <a href="<?php echo U('Index/goodspointinfo', array('goods_id'=>$info['goods_id']));?>" class="b2b2c_public_back"></a>
    </header>
    <!--头部end-->
    <!--内容区域start-->
    <main class="b2b2c_order_submit_lay">
        <section class="b2b2c_order_title bgcf b2b2c_p16" id="b2b2c_address_selected" data-id="<?php echo ($selected_address["id"]); ?>" onclick="b2b2cf.order_confirm_change_address()">
            <?php if(!empty($selected_address)): ?><div class="b2b2c_t address_div">
                    <span class="b2b2c_f address_name"><?php echo ($selected_address["names"]); ?></span>
                    <span class="address_tel"><?php echo ($selected_address["tel"]); ?></span>
                    <?php if($selected_address["is_default"] == 1): ?><span class="tc b2b2c_default address_default">默认</span><?php endif; ?>
                </div>
                <p class="address_area b2b2c_ov2"><?php echo (areaToName($selected_address["area"])); ?> <?php echo ($selected_address["address"]); ?></p>
                <span class="b2b2c_more"></span><?php endif; ?>
        </section>
        <!--循环的店铺start-->
        <section class="b2b2c_order_content bgcf">
            <div class="b2b2c_t clearfix b2b2c_p16">
                <div class="b2b2c_l fl"><?php echo ($info["shop_name"]); ?></div>
                <?php if(!$is_invoices):?>
                <div class="b2b2c_r fr">不可开发票</div>
                <input type="hidden" value='0' name="b2b2c_suport_invoice" />
                <?php else:?>
                <div class="b2b2c_r fr">可开发票</div>
                <input type="hidden" value='1' name="b2b2c_suport_invoice" />
                <?php endif;?>
            </div>
            <!--循环的商品start-->
            <div class="b2b2c_c b2b2c_p16 bgc_c">
                <div class="b2b2c_public_procuct_info">
                    <div class="clearfix">
                        <img class="fl" src="<?php echo ($info["product_image"]["0"]); ?>" alt="">
                        <div class="fl b2b2c_con_box">
                            <p class="b2b2c_ov2"><?php echo ($info["goods_name"]); ?></p>
                            <div class="b2b2c_l">
                                <span>商品规格:</span>
                                <span><?php echo ($info["product_name"]); ?></span>
                            </div>
                            <div class="b2b2c_r clearfix">
                                <span class="fl">&yen;<?php echo ($info["product_price"]); ?>&times;<?php echo ($info["count"]); ?></span>
                                <span class="fr b2b2c_fs_r">&yen;<?php
 echo number_format($info['product_price'] * $info['count'],1,'.',''); ?></span>
                            </div>
                        </div>
                    </div>
                    <span class="b2b2c_delivery">
                        <?php if($is_peisong['free_post'] == 0):?>
                            不在配送区
                        <?php elseif($is_peisong['free_post'] == 1):?>
                            可配送
                        <?php endif;?>
                    </span>
                </div>
            </div>
            <!--循环的商品end-->
            <div class="b2b2c_b clearfix b2b2c_p16">
                <?php if($is_peisong['free_post'] == 0):?>
                    <div class="b2b2c_l fl"><span>不在配送区</span></div>
                <?php else:?>
                    <div class="b2b2c_l fl">
                        <span>运费:</span>
                        <span><i>&yen;</i><i><?=number_format($sum_cost['sum_cost'],1,'.','');?></i></span>
                    </div>
                    <div class="b2b2c_r fr">
                        <span>实付(含运费):</span>
                        <span><i>&yen;</i><i><?php echo number_format($info['product_price'] * $info['count'] + $sum_cost['sum_cost'],1,'.','');?></i></span>
                    </div>
                <?php endif;?>

            </div>
        </section>
        <!--循环的店铺end-->
        <input type="hidden" name="b2b2c_invoice_input" value="0">
        <section class="bgcf b2b2c_p16 b2b2c_invoice clearfix">
            <label for="" class="fl">不要发票</label>
            <input type="image" src="/ok/client/Application/B2b2c/Public/images/icons/030.png" class="fr" value="0" onclick="b2b2cf.order_confirm_switch_invoice(this)">
            <!--点击以后input的image 换成 src="../images/icons/059.png"-->
        </section>
        <section class="bgcf b2b2c_invoice tc" style="display:none;">
            <div class="b2b2c_p16 b2b2c_border_b clearfix">
                <label for="" class="fl">需要发票</label>
                <input type="image" src="/ok/client/Application/B2b2c/Public/images/icons/059.png" class="fr" value="1" onclick="b2b2cf.order_confirm_switch_invoice(this)">
            </div>
            <input type="hidden" name="b2b2c_invoice_status" value="0">
            <div class="b2b2c_invoice_type_c">
                <input type="button" readonly data-val="1" value="个人" onclick="b2b2cf.order_confirm_invoice_type(this)">
                <input type="button" readonly data-val="2" value="公司" onclick="b2b2cf.order_confirm_invoice_type(this)">
            </div>
            <input style="margin-bottom: 6rem;" class="b2b2c_invoice_name" type="text" name="invoicemarks" placeholder="填写发票抬头">
            <?php if(!$is_invoices):?>
                <span class="b2b2c_invoice_hint b2b2c_p16">存在不可开发票的店铺!</span>
            <?php endif;?>
        </section>
    </main>
    <!--内容区域end-->

    <footer class="b2b2c_order_submit_f bgcf">
        <ul>
            <li>
                <span>实付款:</span>
                <span>&yen;<span><?php echo number_format($info['product_price'] * $info['count'] + $sum_cost['sum_cost'],1,'.','');?></span>
            </li>
            <li class="tc">
                <a href="javascript:void(0);" class="bgcr b2b2c_fs_16" <?php if($has_address == 1): if($is_peisong['free_post'] == 1):?> onclick="b2b2cf.submit_order({product_id:'<?php echo ($info["product_id"]); ?>',product_count:'<?php echo ($product_count); ?>'},'<?php echo ($logis_model_id); ?>');" <?php else:?>onclick="b2b2cc.popupdialog('该地址不在配送区，请重新选择收货地址')"<?php endif; else:?>onclick="b2b2cf.no_default_address()"<?php endif;?>>提交订单</a>
            </li>
        </ul>
        <input type="hidden" id="b2b2c_order_confirm_product_id" value="<?php echo ($info["product_id"]); ?>">
        <input type="hidden" id="b2b2c_order_confirm_product_count" value="<?php echo ($product_count); ?>">
    </footer>

    <!--主内容区域start-->
    <main id="b2b2c_order_confirm_address_list" style="display:none;">
        <!--默认地址start-->
        <?php if(is_array($add_list)): foreach($add_list as $key=>$vo): ?><section class="b2b2c_edit_address_box" data-id='<?php echo ($vo["id"]); ?>' data-area="<?php echo ($vo["area"]); ?>" data-default="<?php echo ($vo["is_default"]); ?>" onclick="b2b2cf.order_confirm_address_selected(this)">
                <div class="b2b2c_address_show bgcf">
                    <div class="b2b2c_show_top clearfix">
                        <span class="fl address_name"><?php echo ($vo["names"]); ?></span>
                        <span  class="fr address_tel"><?php echo ($vo["tel"]); ?></span>
                    </div>
                    <p class="b2b2c_show_btm address_area"><?php echo (areaToName($vo["area"])); ?> <?php echo ($vo["address"]); ?></p>
                </div>
                <div class="b2b2c_edit_address bgcf clearfix">
                    <?php if($vo["is_default"] == 1): ?><a href="javascript:void(0);" class="active fl">默认地址</a>
                    <?php else: endif; ?>
                </div>
            </section><?php endforeach; endif; ?>

        <!--默认地址end-->
    </main>
    <!--主内容区域end-->

    <footer class="b2b2c_add_address" style="display:none;">
        <a href="javascript:void(0);" onclick="b2b2cf.order_confirm_add_address()">添加新地址</a>
    </footer>

    <!--表单区域start-->
    <section class="b2b2c_add_new_address" style="display:none;">
        <div class="b2b2c_newadd_inner bgcf">
            <label for="">收货人</label>
            <input type="text" autofocus name="names" value="">
        </div>
        <div class="b2b2c_newadd_inner bgcf">
            <label for="">联系电话</label>
            <input type="text" name="tel" value="">
        </div>
        <div class="b2b2c_newadd_inner bgcf">
            <label for="">所在地区</label>
            <input type="button" class="bgcf tl" name="area" id="area" value="">
            <input type="hidden" name="area_id">
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
            <input type="image" name="is_default" src="/ok/client/Application/B2b2c/Public/images/icons/030.png" class="fr" value="0" onclick="b2b2cf.add_address_is_default();">
            <!--点击以后input的image 换成 src="../images/icons/031.png"-->
        </div>
    </section>
    <!--表单区域end-->

    <footer class="b2b2c_add_new_address_submit" style="display:none;">
        <a href="javascript:void(0);" onclick="b2b2cf.order_confirm_add_address_submit('User/order_confirm_goodsdetail?product_id=<?php echo ($info["product_id"]); ?>&product_count=<?php echo ($product_count); ?>')">提交</a>
    </footer>

</div>
<script type="text/javascript" src="/ok/client/Application/B2b2c/Public/plug/area/areas.js"></script>
<script type="text/javascript">
    $("#area").click(function (e) {
        b2b2cf.SelCity_add(this,e, function(area_id){
            $('input[name="area_id"]').val(area_id);
        });
    });
</script>
</body>
</html>