<?php
/**
 * Created by PhpStorm.
 * User: jiaenchao
 * Date: 2017/6/15
 * Time: 20:27
 * 本控制器为轮播图管理控制器
 */
namespace Admin\Controller;

class CarouselController extends PrivateController {

    protected $brand,$goods;
    function __construct() {
        parent::__construct();
    $this->carousel=M('carousel');
    }
  /*
   * 轮播图添加
   * */
    public function Carousel_add(){
        if(I('post.')){
            if (!$this->carousel->create()){     // 如果创建失败 表示验证没有通过 输出错误提示信息
                exit($this->carousel->getError());
            }else{     // 验证通过 可以进行其他数据操作
                $data=I('post.','');
                $upload = new \Think\Upload();
                $upload->maxSize   =     1204*1204*10 ;
                $upload->exts      =     array('jpg', 'txt', 'png', 'jpeg');
                $upload->savePath  = './Uploads/carousel/';
                $upload->rootPath='./';
                $info   =   $upload->upload();
                $data['carousel_logo']=$info['carousel_logo']['savepath'].$info['carousel_logo']['savename'];
                $data['carousel_time']=time();
                $res=$this->carousel->data($data)->add();
                if($res){
                    $this->success('新增成功', U('Carousel/carousel_show'));
                } else {
                    $this->error('新增失败');
                }
            }
        }else{
            $this->display();
        }
    }
    /*
       * 轮播图展示
       * */
    public function Carousel_show(){
        $map['carousel_status']  = array('gt',0);
        $lis = $this->carousel->where($map)->select();
        $p=isset($_GET['p'])?$_GET['p']:0;
        $list = $this->carousel->where($map)->page($p.',3')->select();
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
        $carousel_id=I('get.id');
        $this->carousel->carousel_status=0;
        $del=$this->carousel->where(array('id'=>$carousel_id))->save();
        if($del){
            $this->success('删除成功', U('Carousel/carousel_show'));
        }else{
            $this->error('删除失败');
        }
    }
    /*
* 展示轮播图页面
*/
    public function upda(){
        $id=I('get.id');
        $list = $this->carousel->where(array('id'=>$id))->find();
        $this->assign('id',$id);
        $this->assign('list',$list);
        $this->display();
    }
    /*
* 将修改的数据添加到数据库
*/
    public function updat(){
        $data=I('post.');
        $id=$data['carousel_id'];
        $res= $this->carousel->where(array('brand_id'=>$id))->setField($data);
        if($res){
            $this->success('修改成功','Carousel_show');
        }else{
            $this->success('你没有修改内容','Carousel_show');
        }
    }
}