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
        $data =$userinfo->field('info_id,user_id,info_nickname,info_realname,info_birthday,info_gender,info_portrait')->where("user_id ='$user_id'")->find();
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
        $data =$userinfo->where("user_id ='$user_id'")->find();
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
        // $data['user_id'] = $this->guid();
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
        $birthday = strtotime($birthday);
        $user_id = $this->guid();
        $info['info_birthday']=$birthday;
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
}