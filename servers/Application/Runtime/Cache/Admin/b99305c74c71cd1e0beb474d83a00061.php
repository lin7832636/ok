<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="">
		<center>
		<a href="/ok/servers/index.php/Admin/Attr/attr_index">新增商品类型</a>
			<table border="1">
				<tr>
					<td>id</td>
					<td>属性名称</td>
					<td>操作</td>
				</tr>
				<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
					<td><?php echo ($v["attr_id"]); ?></td>
					<td><?php echo ($v["attr_name"]); ?></td>
					<td><a href="<?=U('Attr/attr_values') ?>/attr_id/<?php echo ($v["attr_id"]); ?>">编辑属性值</a>
						<a href="<?=U('Attr/attr_uplate') ?>/attr_id/<?php echo ($v["attr_id"]); ?>">修改</a>
						<a href="<?=U('Attr/attr_delete') ?>/attr_id/<?php echo ($v["attr_id"]); ?>">删除</a>
						
					</td>
				</tr><?php endforeach; endif; ?>
			</table>
		</center>
	</form>
</body>
</html>