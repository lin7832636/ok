<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="/ok/servers/Public/js/jquery-1.9.1.min.js"></script>
</head>
<body>
	<form action="" method="post">
		<center>

			<table>
		
				<tr>
					<td>属性值名称</td>
					<td><input type="text" name="name"></td>
				</tr>
				<tr>
					<td>属性值排序</td>
					<td><input type="text" name="sort"></td>
				</tr>
				<tr>
					<td>所属商品类型</td>
					<td><select name="goods_type_id">
				<?php foreach ($arr as $k => $v){ ?>
						<option  <?php  if($goods_type_id ==$v['goods_type_id']){ echo 'selected';}?>  value="<?= $v['goods_type_id']?>">
						<?= $v['type_name']?>
						</option>
					<?php } ?>
					</select></td>
				</tr>
				<tr>
					<td>属性是否可选</td>
						<td><input type="radio" name="attr_index" value="0">参数
							<input type="radio" name="attr_index" value="1">规格</br>
							<p>选择"参数",属性是展示,选择规格是,参与购买</p>
					</td>
				</tr>
				<tr>
					<td>是否为必填项</td>
						<td><input type="radio" name="required" value="0">否
							<input type="radio" name="required" value="1">是</br>
					</td>
				</tr>
				<tr>
					<td>该属性值的录入方式</td>
					<td><input type="radio" name='put_type'  value="0" class="shou">手工录入
						<input type="radio" name="put_type"  value="1" class="xia">从下面的列表中选择
					</td>
				</tr>
				<tr>
					<td>可选值列表</td>
					<td>
						<textarea cols="20" rows="10" disabled="disabled" class="lie" name="value_name"></textarea>
					</td>
				</tr>
				<tr>
					<td><input type="submit" value="确定"></td>
					<td><input type="reset" value="重置"></td>
				</tr>
			</table>
		</center>
	</form>
</body>
</html>
<script>
$(function(){
	$('.xia').click(function(){
		$('.lie').removeAttr("disabled");
	});
})
</script>