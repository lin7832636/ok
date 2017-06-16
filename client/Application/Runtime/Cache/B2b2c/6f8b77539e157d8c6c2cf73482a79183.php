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
<script type="text/javascript" src="/ok/client/Application/B2b2c/Public/plug/dropload/js/dropload.min.js"></script>

<div class="b2b2c_layout">
    <!--头部start-->
    <header class="b2b2c_list_header">
        <a href="<?php echo U('index/index');?>" class="b2b2c_public_back b2b2c_public_back_tstyle"></a>
    	<input type="hidden" id="b2b2c_goods_list_type_level_1" value="<?php echo ($type); ?>">
    	<input type="hidden" id="b2b2c_goods_list_type_level_2" value="<?php echo ($type_level_2); ?>">
    	<input type="hidden" id="b2b2c_goods_list_type_level_3" value="<?php echo ($type_level_3); ?>">
    	<input type="hidden" id="b2b2c_goods_list_sort" value="<?php echo ($sort); ?>">
        <div class="b2b2c_search bgcf clearfix">
            <div class="fl b2b2c_searching_list" id="b2b2c_list_searbtn" onclick="b2b2cf.goods_list_type_level_1_menu()">
                <?php if(empty($type)): ?><img src="/ok/client/Application/B2b2c/Public/images/icons/038.png" />
                	全部
                <?php else: ?>
                <img src="<?php echo ($type_image); ?>" />
               		<?php echo ($type_name); endif; ?>
            </div>
            <ul id="b2b2c_list_searlist" style="display: none;">
                <li>
                    <a href="<?php echo U('index/goods_list');?>">
                        <img src="/ok/client/Application/B2b2c/Public/images/icons/038.png" alt="">
                        <p>全部</p>
                    </a>
                </li>
                <?php if(is_array($goods_type_level_1)): foreach($goods_type_level_1 as $key=>$vo): ?><li>
	                    <a href="<?php echo U('index/goods_list', array('type'=>$vo['id']));?>">
	                        <img src="<?php echo ($vo["image"]["0"]); ?>" alt="">
	                        <p><?php echo ($vo["name"]); ?></p>
	                    </a>
	                </li><?php endforeach; endif; ?>
            </ul>
            <input class="fl b2b2c_search_in" type="text" id="b2b2c_goods_list_keyword" placeholder="<?php echo ($goods_keyword); ?>" value="<?php echo ($goods_keyword); ?>">
            <span onclick="b2b2cf.goods_list_search()"></span>
        </div>
        <input class="b2b2c_search_btn" type="button" readonly value="筛选" onclick="b2b2cf.goods_list_filter_show()">
    </header>
    <!--头部end-->
    <!--导航条开始-->
    <nav class="b2b2c_pro_list_nav bgcf">
        <ul>
        	<?php if(!empty($type)): ?><li class="b2b2c_list_nav_f" onclick="b2b2cf.goods_list_type_level_2_menu()">分类</li><?php endif; ?>
            <li class="<?php if($sort==1){echo 'active';}?>" onclick="b2b2cf.goods_list_sort(1)">销量</li>
            <li class="<?php if($sort==2){echo 'active';}?>" onclick="b2b2cf.goods_list_sort(2)">人气</li>
            <?php if($sort == 3): ?><li class="price active" onclick="b2b2cf.goods_list_sort(4)">价格</li>
            <?php elseif($sort == 4): ?>
            	<li class="price active go_h" onclick="b2b2cf.goods_list_sort(3)">价格</li>
            <?php else: ?>
            	<li class="price" onclick="b2b2cf.goods_list_sort(3)">价格</li><?php endif; ?>
            
            <li class="<?php if($sort==5){echo 'active';}?>" onclick="b2b2cf.goods_list_sort(5)">新品</li>
            <li class="<?php if($sort==6){echo 'active';}?>" onclick="b2b2cf.goods_list_sort(6)">评论</li>
        </ul>
    </nav>
    <!--导航条结束-->

    <!--二级导航开始-->
    <section id="b2b2c_goods_list_type_level_2_section" style="display:none;">
        <nav class="b2b2c_pro_list_twonav">
            <ul class="clearfix" id="b2b2c_goods_list_type_level_2_ul" data-loaded='0'>
            </ul>
        </nav>
        <nav class="b2b2c_pro_list_twonav b2b2c_list_lin_nav" id="b2b2c_goods_list_type_level_3_nav" style="display:none;">
            <ul class="clearfix" id="b2b2c_goods_list_type_level_3_ul">

            </ul>
        </nav>
    </section>
    <!--二级导航结束-->
    <!--主内容区域start-->
    <div class="dropload_content">
        <section class="b2b2c_pro_list_content">
        	<?php $goods_index = 0;?>
        	<?php if(is_array($goods_list)): foreach($goods_list as $key=>$vo): $goods_index++;?>
	            <div class="b2b2c_pro_list_mid bgcf clearfix" data-index="<?php echo ($goods_index); ?>" onclick="window.location.href = '<?php echo U('Index/goodspointinfo', array('goods_id'=>$vo['id']));?>'">
	                <div class="img_box fl">
	                    <img src="<?php echo ($vo["images"]["0"]); ?>" alt=""/>
	                </div>
	                <div class="b2b2c_info_box fl">
	                    <p class="toe"><?php echo ($vo["name"]); ?></p>
	                    <div class="b2b2c_info_box_b clearfix">
	                        <div class="fl b2b2c_info_box_l">
	                            <span>&yen;<i><?php echo ($vo["product_mktprice"]); ?></i></span>
	                            <span>&yen;<i><?php echo ($vo["product_price"]); ?></i></span>
	                        </div>
	                        <div class="fr b2b2c_info_box_r">
	                            <div class="clearfix">
	                                <img class="fr" src="<?php echo ($vo["brand_logo"]["0"]); ?>" alt=""/>
	                            </div>
	                            <span>已售 <i><?php echo ($vo["sold_count"]); ?></i></span>
	                            <span>评论 <i><?php echo ($vo["comments_count"]); ?></i></span>
	                        </div>
	                    </div>
	                </div>
	            </div><?php endforeach; endif; ?>
        </section>
    </div>
    <!--主内容区域end-->
</div>
<div class="b2b2c_list_choose bgcf" style="display:none;">
    <section class="b2b2c_p16">
        <div class="b2b2c_title">产地</div>
        <ul class="clearfix b2b2c_import_filter_ul">
        	<?php if(is_array($import_filter)): foreach($import_filter as $key=>$vo): ?><li class="<?php if((isset($is_import)) && ($is_import==$vo['is_import'])){echo 'active';}?>" data-import="<?php echo ($vo["is_import"]); ?>" onclick="b2b2cf.goods_list_filter_select_simple(this)"><?php echo ($vo["name"]); ?></li><?php endforeach; endif; ?>
        </ul>
    </section>
    <section class="b2b2c_p16">
        <div class="b2b2c_title">价格(<?php echo ($price_from); ?>元)</div>
        <ul class="clearfix b2b2c_price_filter_ul">
        	<?php if(is_array($price_filter)): foreach($price_filter as $key=>$vo): ?><li class="<?php if((isset($price_from)) && ($price_from==$vo['price_from'])){echo 'active';}?>" data-from="<?php echo ($vo["price_from"]); ?>" data-to="<?php echo ($vo["price_to"]); ?>" onclick="b2b2cf.goods_list_filter_select_simple(this)"><?php echo ($vo["name"]); ?></li><?php endforeach; endif; ?>
        </ul>
    </section>
    <section class="b2b2c_p16">
        <div class="b2b2c_title">品牌</div>
        <ul class="clearfix b2b2c_brand_filter_ul">
        	<?php if(is_array($brand_filter)): foreach($brand_filter as $key=>$vo): ?><li class="<?php if((isset($brand_id)) && ($brand_id==$vo['brand_id'])){echo 'active';}?>" data-id="<?php echo ($vo["brand_id"]); ?>" onclick="b2b2cf.goods_list_filter_select_simple(this)"><?php echo ($vo["brand_name"]); ?></li><?php endforeach; endif; ?>
        </ul>
    </section>
    <footer>
        <div class="b2b2c_confirm_btn" onclick="b2b2cf.goods_list_search()">确定</div>
    </footer>
</div>
<!--<div class="b2b2c_public_shade" style="display:none;"></div>-->
<script>
var dropload;
$(function(){
    // dropload
    dropload = $('.dropload_content').dropload({
        scrollArea : window,
        domUp : {
            domClass   : 'dropload-up',
            domRefresh : '<div class="dropload-refresh">↓下拉刷新</div>',
            domUpdate  : '<div class="dropload-update">↑释放更新</div>',
            domLoad    : '<div class="dropload-load"><span class="loading"></span>加载中...</div>'
        },
        domDown : {
            domClass   : 'dropload-down',
            domRefresh : '<div class="dropload-refresh">↑上拉加载更多</div>',
            domLoad    : '<div class="dropload-load"><span class="loading"></span>加载中...</div>',
            domNoData  : '<div class="dropload-noData">暂无更多数据</div>'
        },
        loadUpFn : function(me){
            var get_data = {};
            get_data.terminal_type = 2;

            var last_goods_index = 0;
            get_data.last_goods_index = last_goods_index;   

            var type_level_1 = $('#b2b2c_goods_list_type_level_1').val();
            var type_level_2 = $('#b2b2c_goods_list_type_level_2').val();
            var type_level_3 = $('#b2b2c_goods_list_type_level_3').val();
            if(type_level_3 > 0){
            	get_data.type = type_level_3;
            }else if(type_level_2 > 0){
				get_data.type = type_level_2;
            }else{
            	get_data.type = type_level_1;
            }

	        get_data.goods_keyword = $('#b2b2c_goods_list_keyword').val();
	        get_data.sort = $('#b2b2c_goods_list_sort').val();

	        get_data.is_import = $('.b2b2c_import_filter_ul li.active').data('import');
	        get_data.price_from = $('.b2b2c_price_filter_ul li.active').data('from');
	        get_data.price_to = $('.b2b2c_price_filter_ul li.active').data('to');
	        get_data.brand_id = $('.b2b2c_brand_filter_ul li.active').data('id');

            b2b2cc.curls('B2b2cPublic/GetGoodsBySearch', get_data, function(data) {
                if(data.status){
                    var data = data.data.list;
                    var html = "";
                    if(data.length > 0){
                        html = b2b2cf.goods_list_make_list_html(data, last_goods_index);
                    }

                    $('.b2b2c_pro_list_content').html(html);
                    me.resetload();
                    me.unlock();
                    me.noData(false);
                }

            }, 'get');
        },
        loadDownFn : function(me){
            var get_data = {};
            get_data.terminal_type = 2;

            var last_goods_index = $('.b2b2c_pro_list_mid:last').data('index');
            get_data.last_goods_index = last_goods_index;

            var type_level_1 = $('#b2b2c_goods_list_type_level_1').val();
            var type_level_2 = $('#b2b2c_goods_list_type_level_2').val();
            var type_level_3 = $('#b2b2c_goods_list_type_level_3').val();
            if(type_level_3 > 0){
            	get_data.type = type_level_3;
            }else if(type_level_2 > 0){
				get_data.type = type_level_2;
            }else{
            	get_data.type = type_level_1;
            }

	        get_data.goods_keyword = $('#b2b2c_goods_list_keyword').val();
	        get_data.sort = $('#b2b2c_goods_list_sort').val();

	        get_data.is_import = $('.b2b2c_import_filter_ul li.active').data('import');
	        get_data.price_from = $('.b2b2c_price_filter_ul li.active').data('from');
	        get_data.price_to = $('.b2b2c_price_filter_ul li.active').data('to');
	        get_data.brand_id = $('.b2b2c_brand_filter_ul li.active').data('id');

            b2b2cc.curls('B2b2cPublic/GetGoodsBySearch', get_data, function(data) {
                if(data.status){
                    var data = data.data.list;
                    var html = "";
                    if(data.length > 0){
                        html = b2b2cf.goods_list_make_list_html(data, last_goods_index);
                    }else{
                        // 锁定
                        me.lock();
                        // 无数据
                        me.noData();
                    }
                    $('.b2b2c_pro_list_content').append(html);
                    me.resetload();
                }

            }, 'get');
        },
        threshold : 50
    });
});
</script>
</body>
</html>