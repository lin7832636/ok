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
<body>
<table border="1">
    <tr>
        <td>订单ID</td>
        <td>订单号</td>
        <td>用户</td>
        <td>支付金额</td>
        <td>支付方式</td>
        <td>支付时间</td>
        <td>支付状态</td>
        <td>订单状态</td>
    </tr>
    <?php if(is_array($order)): foreach($order as $key=>$aa): ?><tr>
            <td><?php echo ($aa["id"]); ?></td>
            <td><?php echo ($aa["order_no"]); ?></td>
            <td><?php echo ($aa["usertelno"]); ?></td>
            <td><?php echo ($aa["sum"]); ?></td>
            <td><?php echo ($aa["pay_type"]); ?></td>
            <td><?php echo ($aa["pay_time"]); ?></td>
            <td><?php echo ($aa["order_status"]); ?></td>
            <td><?php echo ($aa["is_delflag"]); ?></td>
        </tr><?php endforeach; endif; ?>
</table>
</body>
</html>