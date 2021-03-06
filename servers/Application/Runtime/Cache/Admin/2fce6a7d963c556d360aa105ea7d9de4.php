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
        <!--&lt;!&ndash;<?php if(is_role('user','index')) { ?><li><a href="<?php echo U('brand/add');?>">管理员</a></li><?php } ?>&ndash;&gt;-->
        <!--<?php if(is_role('user','add')) { ?><li class="active"><a href="<?php echo U('Brand/add');?>">添加品牌</a></li><?php } ?>-->
        <li class="active"><a href="<?php echo U('Brand/show');?>">品牌列表</a></li>

    </ul>
    <div class="common-form">
        <form method="post" action="<?php echo U('Brand/do_add');?>" enctype="multipart/form-data">
            <div class="table_list">
                <table cellpadding="2" cellspacing="2" class="table_form" width="100%">
                    <tbody>
                    <tr>
                        <td width="180">品牌名称:</td>
                        <td><input type="text" class="input" name="brand_name" value=""><span class="must_red">*</span></td>
                    </tr>
                    <tr>
                        <td>:品牌logo</td>
                        <td><input type="file" class="input" name="brand_logo" value="" ><span class="must_red">*</span></td>
                    </tr>
                    <!--<tr>-->
                        <!--<td>品牌logo</td>-->
                        <!--<td>-->
                            <!--<form id="uploadForm"  method= "post" enctype ="multipart/form-data">-->
                                <!--<input type ="file" id="logo" name="img" size="38" onchange="readURL(this);" />-->
                                <!--<img id="img_prev" src="#" alt="预览" />-->
                            <!--</form>-->
                            <!--<button id="uploadLogo" type="button">上传<button>-->
                        <!--</td>-->
                    <!--</tr>-->
                    <tr>
                        <td>品牌描述:</td>
                        <td><textarea name="brand_summary"></textarea></td>
                    </tr>
                    <tr>
                        <td>官方网站:</td>
                        <td>
                            <input type="text"  name="brand_url" >*</td>
                        </td>
                    </tr>
                    <tr>
                        <td>排序:</td>
                        <td>
                            <input type="text" name="brand_sort">
                        </td>
                    </tr>
                    <tr>
                        <td>状态:</td>
                        <td>
                            <select  name="brand_status">
                                <option value="0">刪除</option>
                                <option value="1">下架</option>
                                <option value="2" selected>上架</option>
                            </select>
                           
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary btn_submit J_ajax_submit_btn">添加</button>
                <!--<a class="btn" href="/ok/servers/index.php/Admin/Brand">返回</a>-->
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
    <script  src="/ok/servers/Public/js/jquery-2.1.1.min.js"></script>
    <script>
        //图片预览
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#img_prev')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        //图片上传
        $(function(){

            var ajax_url="/ok/servers/index.php/Admin/Brand/add_img";
            $('#uploadLogo').click(function(){
                //点击上传时，AJAX上传图片
                var formData = new FormData();//把所要传输的文件放进FormData对象，通过AJAX传输对象把文件传输过去。
                // console.log($('#logo').get(0).files[0]);
                formData.append('img',$('#logo').get(0).files[0]);
                $.ajax({
                    url: ajax_url,
                    type: 'POST',
                    data: formData,//这里传输这个对象
                    dataType:"json",
                    async: false,//异步，关闭
                    cache: false,//缓存,关闭
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        alert(data.msg)
                    },
                    // error: function () {
                    //     alert('上传失败，请联系管理员');
                    // }
                });
            })
        })
    </script>