<?php
/**
 * 商城相关接口API
 * ============================================================================
 * 版权所有 (C) 
 * 网站地址:
 * ============================================================================
 * $Version: v1.0.0 Beta $
 * $Author: zhangnan <zhangnan@pokpets.com> $
 * $Date: 2016/06/13 $
 * $Id: B2b2cPrivateController.class.php 2016/06/13  $
**/
namespace Api\Controller;
use Think\Controller;
class B2b2cPrivateController extends PrivateController {
	
    public function __construct() {
        parent::__construct();
    }
	
     /**
     * +--------------------------------------------------------------------------------------------------------------------
     * 个人资料--用户信息
     * +--------------------------------------------------------------------------------------------------------------------
     * @Author  zhangnan  Date:2016/12/9
     * +--------------------------------------------------------------------------------------------------------------------
     * @access  public
     * +--------------------------------------------------------------------------------------------------------------------
    **/

    public function GetUserInfo()
    {
        $userinfo = M('user_info');
        $user_id = $this->guid();
        $data=array();
        $img = M('files')->where(array('uid'=>$user_id))->find();
        $info = D('Commons')->FilesGetUrl(array('key'),$img);
        $data =$userinfo->field('info_id,user_id,info_nickname,info_realname,info_birthday,info_gender,info_portrait,info_tel')->where("user_id ='$user_id'")->find();
        $data['img']=$info['key'][0];
        if(empty($data))
        {
            output(20004);//用户信息获取失败
        }
        else
        {
            output(0,$data);///用户信息获取成功
        }

    }
    /**
     * +--------------------------------------------------------------------------------------------------------------------
     * 个人资料--用户表
     * +--------------------------------------------------------------------------------------------------------------------
     * @Author  zhangnan  Date:2016/12/9
     * +--------------------------------------------------------------------------------------------------------------------
     * @access  public
     * +--------------------------------------------------------------------------------------------------------------------
    **/
    public function GetUser()
    {
        $userinfo = M('user');
        $user_id = $this->guid();
        $data=array();
        $data =$userinfo->where(array('user_id'=>$user_id))->find();
        if(empty($data))
        {
            output(20004);//用户信息获取失败
        }
        else
        {
            output(0,$data);///用户信息获取成功
        }
    }  

     /**
     * +--------------------------------------------------------------------------------------------------------------------
     * 个人资料--真实姓名
     * +--------------------------------------------------------------------------------------------------------------------
     * @Author  zhangnan  Date:2016/12/9
     * +--------------------------------------------------------------------------------------------------------------------
     * @access  public
     * +--------------------------------------------------------------------------------------------------------------------
    **/
    public function edit_realname() 
    {
        $userinfo = M('user_info');
        $username = I('post.realname', '', 'trim');
        $user_id = $this->guid();

        $info['info_realname']=$username;
        $data =$userinfo->where("user_id ='$user_id'")->data($info)->save();
        if(empty($data))
        {
                output(20001);//密码修改错误
        }
        else
        {
            output(0);//密码修成功
        }
        
    }

     /**
     * +--------------------------------------------------------------------------------------------------------------------
     * 个人资料--修改昵称
     * +--------------------------------------------------------------------------------------------------------------------
     * @Author  zhangnan  Date:2016/12/9
     * +--------------------------------------------------------------------------------------------------------------------
     * @access  public
     * +--------------------------------------------------------------------------------------------------------------------
    **/

    public function edit_nickname() 
    {
        $userinfo = M('user_info');
        $username = I('post.nickname', '', 'trim');
        $user_id = $this->guid();

        $info['info_nickname']=$username;
        $data =$userinfo->where("user_id ='$user_id'")->data($info)->save();
        if(empty($data))
        {
                output(20002);//昵称修改错误
        }
        else
        {
            output(0);//昵称修成功
        }
        
    }

     /**
     * +--------------------------------------------------------------------------------------------------------------------
     * 个人资料--修改性别
     * +--------------------------------------------------------------------------------------------------------------------
     * @Author  zhangnan  Date:2016/12/9
     * +--------------------------------------------------------------------------------------------------------------------
     * @access  public
     * +--------------------------------------------------------------------------------------------------------------------
    **/
    public function edit_gender() 
    {
        $userinfo = M('user_info');
        $sex = I('post.gender', '', 'trim');
        // $data['user_id'] = $this->guid();
        $user_id = $this->guid();

        $info['info_gender']=$sex;
        $data =$userinfo->where("user_id ='$user_id'")->data($info)->save();
        if(empty($data))
        {
                output(20003);//性别修改错误
        }
        else
        {
            output(0);//性别修成功
        }
        
    }
    /**
     * +--------------------------------------------------------------------------------------------------------------------
     * 个人资料--修改年龄
     * +--------------------------------------------------------------------------------------------------------------------
     * @Author  zhangnan  Date:2016/12/9
     * +--------------------------------------------------------------------------------------------------------------------
     * @access  public
     * +--------------------------------------------------------------------------------------------------------------------
    **/ 
    public function edit_birthday()
    {
        $userinfo = M('user_info');
        $birthday = I('post.birthday', '', 'trim');
        $user_id = $this->guid();
        $birthday = strtotime($birthday);
        $info['info_birthday']=$birthday;
        $data =$userinfo->where(array('user_id'=>$user_id))->data($info)->save();
        if(empty($data))
        {
            output(20003);//年龄修改错误
        }
        else
        {
            output(0,$data);//年龄修成功
        }
    }
     /**
     * +--------------------------------------------------------------------------------------------------------------------
     * 个人资料--修改头像
     * +--------------------------------------------------------------------------------------------------------------------
     * @Author  zhangnan  Date:2016/12/9
     * +--------------------------------------------------------------------------------------------------------------------
     * @access  public
     * +--------------------------------------------------------------------------------------------------------------------
    **/

    public function edit_portrait()
    {
        $file = M('files');
        $portrait = I('get.portrait', '', 'trim');
        $user_id = $this->guid();
        $data =$file->where(array('key'=>$portrait,'uid'=>$user_id))->find();
        if(empty($data))
        {
             output(40003);//图片为空
        }
        else
        {
            output(0,$data);
        }
    }

    /**
     * 评论回复API
     * @author 孟祥林
     * @data  2017/6/15
     * @param goods_id 商品ID
     * @param content 评论内容
     * @param point   评分
     * @param type  评论 买家 或 回复平台  1平台 2买家
     * @param  for_id 回复还是评论
     * @return array()  返回添加id
     */
    public function comment_add(){
       $param=array();
       I('get.goods_id') ? $param['goods_id'] = I('get.goods_id') : output(20678,'商品id必须存在');
       I('get.content') ? $param['content'] = I('get.content') : output(20678,'必须有评论内容');
       I('get.point') ? $param['point'] = I('get.point') : output(20678,'必须打分');
       $param['user_id']=1;/*$this->guid()*/
       $param['addtime']=time();
       //检测是平台回复  还是  用户评论
       I('get.type') ? $param['type'] = I('get.type') : $param['type'] = 2;
      //买家 评论
       if($param['type'] == 2){
       //查看买家用户是否购买过商品
           $data=M('order as o')
               ->join('sp_order_goods as g on o.id=g.order_id')
               ->field('g.order_id')
               ->where(['goods_id'=>$param['goods_id'], 'user_id'=> $param['user_id']])
               ->find();
       //is_array($data) == false  没有评论权限
       if(!is_array($data))
           output(20686,'未购买无法进行评论');
       }
       //接值评论id  ？回复 ：评论
       if(I('get.for_id'))
           $param['com_pid'] = I('get.for_id');
       $res=M('comments')
           ->data($param)
           ->add();
       $res ? output(0,['id'=>$res]) : output(20678);
    }
}