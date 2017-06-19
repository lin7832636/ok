<?php 
namespace Admin\Controller;
use Think\Controller;
set_time_limit(0);
class AttrController extends PrivateController
{

	//商品属性
	public function attr_show()
	{	
		/*$id  = I('get.goods_type_id');
		$list=M('goods_attr')->where(array('goods_type_id' =>$id ))->select();*/
		$list=M('goods_attr')->select();
		$this->assign('list',$list);
		$this->display('attr_show');
	}

	//添加商品属性
	public function attr_add()
	{
		$attr_name=I('post.attr_name');
		$data=array('attr_name'=>$attr_name);
		$goods_attr=M('goods_attr');
		$arr=$goods_attr->add($data);
		if($arr)
		{
			$this->success('商品属性添加成功',U('attr/attr_show'));
		}
	}
	public function attr_index()
	{
		$this->display('attr_index');
	}
	//商品修改
	public function attr_uplate(){
		$id  = I('get.attr_id');
		$data = M('goods_attr')->where(array('attr_id'=>$id))->find();
		$this->assign('data',$data);
		$this->display();

	}
	//商品属性删除
	public function attr_delete(){
		$id  = I('get.attr_id');
		$res = M('goods_attr')->delete($id);
		if($res){
			$this->success('商品属性删除成功',U('attr/attr_show'));
		}else{
			$this->success('商品属性删除失败',U('attr/attr_show'));
		}

	}

	//类型属性值列表
	public function attr_values()
	{
		
		$goods_type=array();
		$goods_type_id=I('goods_type_id');
		$arr['date']=M('goods_attr')->where(array('goods_type_id'=>$goods_type_id))->select();
		$goods_type=M('goods_type')->where(array('goods_type_id'=>$goods_type_id))->find();
		foreach ($arr as $key => $value) {
		$arr['data']=$goods_attr_value = M('goods_attr_value')->where(array('attr_id'=>$value['attr_id']))->select();
		}
		$this->assign('arr',$arr);
		$this->assign('goods_type',$goods_type);
		$this->display();
	}
	//类型属性添加
	public function attr_values_add()
	{
		if(IS_POST){
		 $name=I('post.name');
		 $sort=I('post.sort');
		 $required=I('post.required');
		 $goods_type_id=I('post.goods_type_id');
		 $input_type=I('post.put_type');
		 $attr_index=I('post.attr_index');
		 $value_name=I('post.value_name');
		 $addtime = time();

		 $goods_attr= M('goods_attr');
		 $data=array('attr_name'=>$name,'sort'=>$sort,'required'=>$required,'goods_type_id'=>$goods_type_id,'input_type'=>$input_type,'addtime'=>$addtime);
		 $attr_id=$goods_attr->add($data);

		 $arr =array('attr_id'=>$attr_id,'value_name'=>$value_name,'attr_index'=>$attr_index);
		 $goods_attr_value=M('goods_attr_value');
		 $res = $goods_attr_value->add($arr);
		if($attr_id && $res)
		{
			$this->success('商品属性添加成功',U("attr/attr_values?goods_type_id=$goods_type_id"));
		}
		}else{
			$goods_type_id = $_GET['goods_type_id'];
			$arr=M('goods_type')->select();

			$this->assign('goods_type_id',$goods_type_id);
			$this->assign('arr',$arr);
			$this->display();
		}
		
	}

	public function attr_values_show()
	{
		$goods_type_id=I('goods_type_id');
		print_r($goods_type_id);die;
		$list=M('goods_attr_value')->select();
		foreach($list as $key=>$value)
		{
			$list[$key]=explode(',',$value['value_name']);		
		}
		print_r($list);exit;
	}
	public function attr_optional_value(){
		$attr_id = $_GET['attr_id'];
		$arr = M('goods_attr_value')->where(array('attr_id'=>$attr_id))->select();
		$data= M('goods_attr')->where(array('attr_id'=>$attr_id))->find();
		$abc= M('goods_type')->where(array('goods_type_id'=>$data['goods_type_id']))->find();
		$this->assign('arr',$arr);
		$this->assign('abc',$abc);
		$this->display();
	}
	public function value_delete()
	{
		$attrval_id=I('attrval_id');
		$res = M('goods_attr_value')->delete($attrval_id);
		if($res){
			$this->success('可选值删除成功',U('attr/attr_values_show'));
		}else{
			$this->success('可选值删除失败',U('attr/attr_values_show'));
		}
	}
	public function value_update()
	{
		$attr_id=I('attr_id');
		$attr=M('goods_attr')->where(array('attr_id'=>$attr_id))->find();
		$arr=M('goods_type')->select();
		$this->assign('attr',$attr);
		$this->assign('arr',$arr);
		$this->display('value_update');
	}
	public function update_update()
	{
		$attr_id=I('attr_id');
		$goods_type_id=I('goods_type_id');
		$name=I('name');
		$sort=I('sort');
		$data = array('name'=>$name,'sort'=>$sort,'goods_type_id'=>$goods_type_id );    
		$arr=M('goods_attr')->where(array('attr_id'=>$attr_id))->save($data);
		if($arr)
		{
			$this->success('可选值修改成功',U('attr/attr_values'));
		}
		else{
			$this->success('可选值修改失败',U('attr/attr_values'));
		}
	}

}             	
?>