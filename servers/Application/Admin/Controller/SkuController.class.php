<?php 
namespace Admin\Controller;
use Think\Controller;
set_time_limit(0);
class SkuController extends PrivateController
{
	//货品组合界面
	public function sku_index()
	{
		$goods_type=M("goods_type")->select();
		$this->assign('goods_type',$goods_type);
		$this->display('sku_index');
	}
	//根据商品类型查找他的属性
	public function sku_selete()
	{
		$goods_type_id=I('goods_type_id');  // 接值
		$sku=M('goods_attr');   // 实例化Model
		//如果 input=1的话就查出所有的input=1的值
		$arrSelect = $sku->where(array('input_type'=>1,'goods_type_id'=>$goods_type_id))->select();
		//如果 input=0的话就查出所有的input=0的值
		$arrText = $sku->where(array('input_type'=>0,'goods_type_id'=>$goods_type_id))->select();
		//如果 input=1的话就查出他的个数
		$arrSelectcount = $sku->where(array('input_type'=>1,'goods_type_id'=>$goods_type_id))->count();
		//循环arrSelectcount 变量的个数
		for($i=0;$i<$arrSelectcount;$i++){
			//通过arrSelectcount 来获取他的id并赋值
			$k = $arrSelect[$i]['attr_id'];
			//通过$k来查他的属性值
			$arrSelectdata[$i] = M('goods_attr_value')->where(array('attr_id'=>$k))->select();
			//分割数组
			$arrdata[$k] = 	explode(',', $arrSelectdata[$i][0]['value_name']);
		}
		//统计个数
		$num = count($arrdata[$k]);

		$this->assign('arrSelect',$arrSelect);
		$this->assign('arrText',$arrText);
		$this->assign('arrdata',$arrdata);
		$this->assign('num',$num);
		$this->display('toby');

	}
	public function sku_add()
	{
		$data['attr_id'] = I('attr_id');
		$data['attr_name']=I('attr_name');
		$data['attr_value']=I('attr_value');
		$data['goods_id'] = 0;
		$goods_type_id = I('goods_type_id');
		$res = M('goods_attr_rel')->add($data);
		if($res)
		{
			$this->success('添加成功',U('sku/sku_index'));
		}
		else{
			$this->success('添加失败',U('sku/sku_index'));
		}

	}
}