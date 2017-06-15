<?php
/**
 * 商城登录控制器
 * ============================================================================
 * 版权所有 (C)
 * 网站地址:
 * ============================================================================
 * $Version: v1.0.0 Beta $
 * $Author: LWX <liwenxuan@pokpets.com> $
 * $Date: 2017/7/6 18:35 $
 * $Id: LoginController.class.php 18:35 2016/7/6 $
 **/
namespace B2b2c\Controller;
use Think\Controller;
class  LoginController extends Controller {

    public function __construct() {
        parent::__construct();
    }
    public function Login(){
        if(IS_POST) {
            $data = array();
            $data['telno'] ='777';         //I('post.telno', '', 'trim');
            $data['password'] ='111';             //I('post.password', '', 'trim');
            $data['login_type'] = "wc";
            $info = curls(C('APIURL').'User/Login', 'post', $data, true);

            if($info['status']) {
                $user_token = $info['data']['user_token'];
                set_user_token($user_token);

                $user_info = array();
                $user_info_data = curls(C('APIURL').'User/GetUserInfo','get',array('user_token'=>$user_token),true);
                $user_info_data = $user_info_data['data'];

                $user_info['telno'] = $user_info_data['telno'];
                $user_info['nickname'] = $user_info_data['nickname'];
                $user_info['user_id'] = $user_info_data['user_id'];
                $user_info['user_type'] = $user_info_data['user_type'];
                set_user_info($user_info);

                $info['data'] = array();
                echo json_encode($info);
            } else {
                echo json_encode($info);
            }
        } else {
            $this->display();
        }
    }
}