<?php
/**
 * 商城相关接口API登录接口
 * ============================================================================
 * 版权所有 (C) 
 * 网站地址:
 * ============================================================================
 * $Version: v1.0.0 Beta $
 * $Author: baoxu <baoxu@pokpets.com> $
 * $Date: 2016/05/19 $
 * $Id: B2b2cController.class.php 2016/05/19  $
**/
namespace Api\Controller;
use Think\Controller;
class UserController extends PublicController
{

    // public function __construct() 
    // {
    //     parent::__construct();
    // }  
    /**
     * +---------------------------------------------------------------------------------------------------------
     * 用户登录
     * +---------------------------------------------------------------------------------------------------------
     * @Author LWX  Date:2015/12/9
     * +---------------------------------------------------------------------------------------------------------
     * @access public
     * +---------------------------------------------------------------------------------------------------------
     * @type POST
     * +---------------------------------------------------------------------------------------------------------
     * @parame Int 		必填 $telno		用户手机号码					
     * +---------------------------------------------------------------------------------------------------------
     * @parame Int 		非必 $openid		第三方登录ID
     * +---------------------------------------------------------------------------------------------------------
     * @parame String	必填 $login_type 登录方式 
     * +---------------------------------------------------------------------------------------------------------
     * @parame String  	必填 $password	用户密码 
     * +---------------------------------------------------------------------------------------------------------
     * @return JSON
     * +---------------------------------------------------------------------------------------------------------
     * */
    public function Login() 
    {
        $telno = I('post.telno', '', 'trim');
        $openid = I('post.openid', '', 'trim');
        $login_type = I('post.login_type', '', 'trim');
        $password = I('post.password', '', 'trim');
        $where = array();
        $where['login_type'] = $login_type;
        if ($where['login_type']) {
            if ($login_type == 'wc') {
                $where['telno'] = $telno;
            } else {
                $where['openid'] = $openid;
            }
        } else {
            output(10001);
        }
        if($where) {
            $user=M('user');
            $data = array();
            $data = $user->field('user_id, password, status, usertelno')->where(array('usertelno'=>$telno))->find();
         // print_r($data);die;
            if (empty($data) || $data['usertelno'] != $telno) {
                output(20656);
            }
        } else {
            output(20658);
        }

        if ($data['user_status'] != 0) {
            output(20658);
        }
        if ($data['password'] == token($password)) 
        {
            $redis = S(C('REDIS'));
            if ($token = $redis->get('user_id_' . $data['user_id'])) {
                $redis->rm('user_token_' . $token);
                $redis->rm('user_id_' . $data['user_id']);
            }

            $token = token($data, true);
            $redis->set('user_id_' . $data['user_id'], $token);
            $redis->set('user_token_' . $token, $data['user_id']);
            //判断redis是否成功
            $id = $redis->get('user_token_' . $token);
            // $token = $redis->get('user_id_' . $data['user_id']);
            // print_r($token);die;
            if (empty($id)) {
                output(20654);
            } else {
                output(0, array('user_token' => $token));
            }
        } 
        else 
        {
            output(20001);
        }
    }
}
?>