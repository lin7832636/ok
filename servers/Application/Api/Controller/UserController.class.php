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
     * 用户登录  任明明
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


    /**
     * +---------------------------------------------------------------------------------------------------------
     * 用户注册 密码修改
     * +---------------------------------------------------------------------------------------------------------
     * @Author LWX  Date:2015/12/9
     * +---------------------------------------------------------------------------------------------------------
     * @access public
     * +---------------------------------------------------------------------------------------------------------
     * @type POST
     * +---------------------------------------------------------------------------------------------------------
     * @parame Int      必填 $telno       用户手机号码                  
     * +---------------------------------------------------------------------------------------------------------
     * @parame Int      非必 $openid      第三方登录ID
     * +---------------------------------------------------------------------------------------------------------
     * @parame String   必填 $login_type 登录方式 
     * +---------------------------------------------------------------------------------------------------------
     * @parame String   必填 $password    用户密码 
     * 用户唯一
     */
    public function InTelno()
    {
        $telno = I('get.telno');
//         $token=token($telno,true);
//         $data['user_sms_token']=$token;
        $user = M('user');
        $info = $user->where(array('usertelno' => $telno))->find();

        if (empty($info['usertelno'])) {
            output(0);
        } else {
            output(20601);
        }
    }




    /**
     * 用户验证码
     */
    public function UserSms()
    {
        $token = I('get.token');
        $telno = I("get.telno");
        $code = rand(1000, 9999);
        $redis = S(C("REDIS"));
        $redis->set("user_" . $token, 'telno_' . $code, 300);   //寸
        $redis_val = $redis->get("user_" . $token);     //取
        if (empty($redis_val)) {
            output(20604);
        }
        $data['user_sms_token'] = $token;
        $data['user_sms_telno'] = $telno;
        $data['code']=$redis_val;
        $info = $this->curlPost($telno, $code);
        if ($info) {
            output(0, $data);
        } else {
            output(20604);
        }
    }



    /**
     * 验证码验证
     */
    public function UserSmsIn()
    {
        $code = I("get.user_sms_code");
        $codes = "telno_" . $code;
        $token = I("get.user_sms_token");
        $redis = S(C("REDIS"));
        $r_val = $redis->get('user_' . $token);
        if ($r_val == $codes) {
            output(0,$token);
        } else {
            output(20603,$r_val);
        }

    }



   /**
    * 验证码接口
    */
    public function curlPost($telno, $code)
    {

        $content='你好！,您的验证码：'.$code.'。如非本人操作，可不用理会！【博宠商城】';
        $url='http://api.sms.cn/sms/?ac=send&uid=lalalalal&pwd=2a71f1edd63493414d12c02072f2d855&mobile='.$telno.'&content='.urlencode($content);
        $data=array();
        $method='GET';
        /*curlpost传值*/
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');//模拟浏览器
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER,array('Accept-Encoding:gzip, deflate'));
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
        if($method=="POST")
        {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $tmpInfo = curl_exec($ch);//6.执行
        if(curl_errno($ch))
        {
            return curl_error($ch);
        }
        curl_close($ch);
         return $tmpInfo;

    }



    /**
      * 密码正则判断
     */
    public function PasswordIs(){
        $data=I('');
        if (preg_match('/^[_0-9a-z]{6,16}$/i',$data['password'])){
           output(0);
        }else {
           output(10012);
        }
    }

    /**
     * 数据入库
    */
    public function Register(){
        $data=I('');
        $user=M("user");
        $res=$user->data(array("usertelno"=>$data['telno'],"password"=>token($data['password'])))->add();
        if($res){
            M('user_info')->data(['user_id'=>$res])->add();
            output(0);
        }else{
            output(20605);
        }
        
    }



    /**
     * 修改密码
     */
    public function ForgetUserPassword()
    {
          $data  = I("post.");

         $sql = M("user")->where(array("usertelno"=>$data['telno'],"password"=>token($data['repassword'])))->find();
        if(empty($sql['usertelno']))
        {
           $info= M("user")->where(array("usertelno"=>$data['telno']))->save(array("password"=>token($data['repassword'])));
            if($info){
                output(0);
            }else{
                output(20612);
            }
        }else{
            output(20001);
        }
    }
}
?>