<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
    <meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1">
	<meta content="always" name="referrer">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" type="text/css" href="/ok/servers/Application/Admin/Public/css/theme.min.css" />
	<link rel="stylesheet" type="text/css" href="/ok/servers/Application/Admin/Public/css/simplebootadmin.css" />
	<link rel="stylesheet" type="text/css" href="/ok/servers/Application/Admin/Public/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/ok/servers/Application/Admin/Public/js/artDialog/skins/default.css" />
	
    <style>
		.length_3{width: 180px;}
		/*==================Global Reset====================*/
		body, h1, h2, h3, h4, h5, h6, hr, p, blockquote, dl, dt, dd, ul, ol, li, pre, form, fieldset, legend, button, input, textarea, th, td { margin: 0; padding: 0; }
		body, button, input, select, textarea { font: 12px/1.5 tahoma, arial, \5b8b\4f53, sans-serif; }
		h1, h2, h3, h4, h5, h6 { font-size: 100%; }
		ul, ol { list-style: none; }
		a { text-decoration: none; }
		a:hover { text-decoration: underline; }
		img { border: 0; }
		button, input, select, textarea { font-size: 100%; }
		.clearfix:before,
		.clearfix:after {
		    content: "";
		    display: table;
		}
		.clearfix:after {
		    clear: both;
		    overflow:hidden;
		}
		.clearfix {
		    clear: both;
		    zoom: 1;
		}
	</style>

	<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="/ok/servers/Application/Admin/Public/css/font-awesome-ie7.min.css" />
	<![endif]-->

<script type="text/javascript">
//全局变量
var GV = {
	HOST:"<?php echo ($_SERVER['HTTP_HOST']); ?>",
    DIMAUB: "/ok/servers/",
    JS_ROOT: "Application/Admin/Public/js/",
    MODULE_URL:"/ok/servers/index.php/Admin/",
    TOKEN: ""
};
</script>

<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script type="text/javascript" src="/ok/servers/Application/Admin/Public/js/jquery.js"></script>
	<script type="text/javascript" src="/ok/servers/Application/Admin/Public/js/wind.js"></script>
	<script type="text/javascript" src="/ok/servers/Application/Admin/Public/js/jquery.smooth-scroll.min.js"></script>
	<script type="text/javascript" src="/ok/servers/Application/Admin/Public/js/bootstrap.min.js"></script>

<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
<body class="J_scroll_fixed">
<div class="wrap jj">
    <ul class="nav nav-tabs">
        <!--<?php if(is_role('user','index')) { ?><li><a href="<?php echo U('brand/add');?>">管理员</a></li><?php } ?>-->
       <!--<?php if(is_role('user','add')) { ?><li class="active"><a href="<?php echo U('Brand/show');?>">品牌列表</a></li><?php } ?>-->
        <li class="active"><a href="<?php echo U('Brand/add');?>">品牌添加</a></li>
    </ul>
    <div class="common-form">
        <form method="post" action="<?php echo U('Brand/do_add');?>" enctype="multipart/form-data">
            <div class="table_list">
                <table cellpadding="2" cellspacing="2" class="table_form" width="100%" border="1">
       <th>品牌名称</th>
       <th>品牌logo</th>
       <th>品牌描述</th>
       <th>品牌的官网</th>
       <th>排序</th>
       <th>状态</th>
       <th>添加时间</th>
       <th>操作</th>
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr align="center">
                            <td><?php echo ($v["brand_name"]); ?></td>
                            <td>
                                <img src="/ok/servers/<?php echo ($v["brand_logo"]); ?>" alt="" height="60px" width="60px">
                            </td>
                            <td><?php echo ($v["brand_summary"]); ?></td>
                            <td><?php echo ($v["brand_url"]); ?></td>
                            <td><?php echo ($v["brand_sort"]); ?></td>
                            <td>
                                <?php if( strtoupper($v['brand_status']) == 1 ): ?>下架
                                    <?php elseif( strtoupper($v['brand_status']) == 2): ?>
                                   上架<?php endif; ?>
                            </td>
                            <td> <?php echo (date("Y-m-d H:i:s",$v['brand_time'])); ?> </td>
                            <td><a href="/ok/servers/index.php/Admin/Brand/del?id=<?php echo ($v["brand_id"]); ?>" >删除</a>||<a href="/ok/servers/index.php/Admin/Brand/upda?id=<?php echo ($v["brand_id"]); ?>">修改</a></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
                总数 ： <?php echo ($count); ?> 条 <br>
                页数 ： <?php echo ($page); ?>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" src="/ok/servers/Application/Admin/Public/js/common.js"></script>
<script type="text/javascript">

    function org_list($this) {

        art.dialog({
            id:'div_org_list',
            lock : true,
            ok : true ,
            cancel : true,
            title : '选择机构',
            background : '#cccccc',
            opacity : 0.80,
            width : 700,
            height : 500

        });

        $.get('/ok/servers/index.php/Admin/Train/id_list', {}, function(e) {
            art.dialog({id: 'div_org_list'}).content(e);
        }, 'html');

    }
</script>

</body>
</html>