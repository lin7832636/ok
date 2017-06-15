<?php
/*
 * 本控制器为品牌管理控制器
 */
namespace Admin\Controller;

class BrandController extends PrivateController {

    protected $brand,$goods;
    function __construct() {
        parent::__construct();
        $this->brand = D("Brand");
        $this->goods = D("Goods");
    }
    /*
 * 展示品牌添加页面
 */
    public function  add() {
     $this->display();
     }
    /*
 * 将品牌添加页面数据添加到数据库
 */
    public function  do_add() {

        if (!$this->brand->create()){     // 如果创建失败 表示验证没有通过 输出错误提示信息
            exit($this->brand->getError());
        }else{     // 验证通过 可以进行其他数据操作
            $data=I('post.');
            //print_r($data);die;
            $upload = new \Think\Upload();
            $upload->maxSize   =     1204*1204*10 ;
            $upload->exts      =     array('jpg', 'txt', 'png', 'jpeg');
            $upload->savePath  = './Uploads/';
            $upload->rootPath='./';
            $info   =   $upload->upload();
            // print_r($info);die;
            $data['brand_logo']=$info['brand_logo']['savepath'].$info['brand_logo']['savename'];
            //  print_r($data);die;
            $data['brand_time']=time();
            $brand = M("brand"); // 实例化User对象
            $res=$brand->data($data)->add();
            if($res){
                $this->success('新增成功', U('Brand/show'));
            } else {
                $this->error('新增失败');
            }
            }
    }
    /*
   * 展示品牌列表页面
   */
    public function show() {
        $brand = M('brand');
        $lis = $brand->where('brand_status > 0')->select();
        $p=isset($_GET['p'])?$_GET['p']:0;
        $list = $brand->where('brand_status > 0')->page($p.',3')->select();
//        echo '<pre>';
//         print_r($list);die;
        $count=count($lis);
        $Page=new \Think\Page($count,3);
        $show=$Page->show();
        $this->assign('list',$list);
        $this->assign('count',$count);
        $this->assign('page',$show);
        $this->display();
    }
    /*
     * 删除一条数据
     */
   public function del(){
        $id=I('get.id');
//        print_r($id);die;
        $brand = M("brand"); // 实例化brand对象
       $brand->brand_status=0;
        $brand->where("brand_id=".$id)->save(); // 删除id为5的用户数据
       // $this->display("show");
       $this->redirect("Brand/show");
    }
    /*
* 展示品牌修改页面
*/
    public function upda(){
        $id=I('get.id');
      // print_r($id);die;
        $brand = M("brand"); // 实例化brand对象
        $list = $brand->where("brand_id=".$id)->find();
        //print_r($list);
        $this->assign('id',$id);
        $this->assign('list',$list);
        $this->display();
    }
    /*
* 将修改的数据添加到数据库
*/
    public function updat(){
//        $id=I('get.brand_id');
        $data=I('post.');
        $id=$data['brand_id'];
       // print_r($id);die;
        $brand = M("brand"); // 实例化User对象// 要修改的数据对象属性赋值
        $res= $brand->where("brand_id=$id")->setField($data);
//        // 更改用户的name和email的值
//        $data = array('name'=>'ThinkPHP','email'=>'ThinkPHP@gmail.com');
//        $User-> where('id=5')->setField($data);
        if($res){
            $this->success('修改成功','show');
        }else{
            $this->success('你没有修改内容','show');
        }
    }
}