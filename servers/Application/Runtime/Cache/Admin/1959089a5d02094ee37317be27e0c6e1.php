<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<table align="right">
	<tr><td><a  href="/ok/servers/index.php/Admin/Attr/attr_values_add/goods_type_id/<?= $goods_type['goods_type_id']?>"><?= $goods_type['type_name']?>属性值添加</a></td></tr>
</table>

<center>
<h3><?= $goods_type['type_name']?>属性值列表</h3>
<table>
	<tr><td> <input type="hidden" name="goods_type_id" value="<?= $goods_type['goods_type_id']?>" >	</td></tr>
	<tr>
		<td>ID</td>
		<td>属性名称</td>
		<td>是否为必填项</td>
		<td>参数规格</td>
		<td>输入方式</td>
		<td>排序</td>
		<td>创建时间</td>
		<td>操作</td>
	</tr>
	<?php foreach($arr['date'] as $k=>$v){?>
	<tr>
		<td><?= $v['attr_id']?></td>
		<td><?= $v['attr_name']?></td>
		<td><?php if($v['required']==0){echo 否;}else{echo 是;}?></td>
		<td><?php if($v['attr_index']==0){echo 参数;}else{echo 规格;}?></td>
		<td><?php if($v['input_type']==0){echo 文本框;}else{echo 下拉框;}?></td>
		<td><?= $v['sort']?></td>
		<td><?php echo (date("y-m-d",$v['addtime'])); ?>
		</td>
		<td><?php if($v['input_type']==1){echo "<a href='/ok/servers/index.php/Admin/Attr/attr_optional_value/attr_id/".$v['attr_id']."'>查看值</a>丨";}else{ echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;丨";}?><a href="/ok/servers/index.php/Admin/Attr/value_update?attr_id=<?php echo $v['attr_id']?>">修改</a></td>
	</tr>
	<?php  }?>
</table>
	</center>
</body>
</html>