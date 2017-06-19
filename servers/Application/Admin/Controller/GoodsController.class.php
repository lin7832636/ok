<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends Controller 
{

	protected $Goods_type;
    function __construct() {
        parent::__construct();
        $this->Goods_type = D("Goods_type");
    }
	
	// 商品管理
	public function index()
	{
		$data = $this->Goods_type->select();
		// var_dump($data);die;
		$this->assign("data",$data);
		$this->display();
	}

	// 商品分类管理
	public function sort()
	{
		// $tree = new \Org\Util\Tree;
		// 查询内容
		$data = $this->Goods_type->order('type_pid')->getField('goods_type_id,type_name,type_pid,type_path');
		// echo 1;die;
		$this->assign('data',$data);
		$this->display();
	}

	// 商品分类添加
	public function sort_add()
	{
		$Goods_type = M('Goods_type');
		$post = I("post.");
		$t_id = $post['type_pid'];
		$type_path = $this->Goods_type->where('goods_type_id='.$t_id)->getField('type_path'); 
		$post['type_path'] = $type_path.'-'.$t_id;
		// var_dump($post);die;
		$add = $Goods_type->add($post);
		if($add)
		{
			$data = $this->Goods_type->select();
			$this->assign("data",$data);
			$this->display('index');
			// $this->success('新增成功','Goods/sort');
		}else{
			echo "false";
		}
	}

	// 商品分类修改
	public function sort_amend()
	{

	}

}