<?php
/**
 * 商城公共控制器，非需要登录的控制器使用。
 * ============================================================================
 * 版权所有 (C) 
 * 网站地址:
 * ============================================================================
 * $Version: v1.0.0 Beta $
 * $Author: LWX <liwenxuan@pokpets.com> $
 * $Date: 2016/7/6 18:35 $
 * $Id: PublicController.class.php 18:35 2016/7/6 $
**/
namespace B2b2c\Controller;
use Think\Controller;
class PublicController extends Controller {
	/**
	 *+--------------------------------------------------------------------------------------------------------------------
	 * 商城初始化控制器
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @Author LWX  Date:2016/7/12
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @access public
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @type GET
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame 
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @return void
	 *+--------------------------------------------------------------------------------------------------------------------
	**/
	public function __construct() {
		parent::__construct();
		$this->assign('user_info', get_user_info());
	}	
	
	/**
     *+--------------------------------------------------------------------------------------------------------------------
     * 前段接口调用
     *+--------------------------------------------------------------------------------------------------------------------
     * @Author liwenxuan   Date:2016/7/11
     *+--------------------------------------------------------------------------------------------------------------------
     * @access public
     * +--------------------------------------------------------------------------------------------------------------------
     * @type   
     * +--------------------------------------------------------------------------------------------------------------------
     * @parame String 必填 url 接口地址
     * +--------------------------------------------------------------------------------------------------------------------
     * @parame json 选填 data 接口参数
     * +--------------------------------------------------------------------------------------------------------------------
	 * @parame String 必填 type 接口调用方式(get/post)
     * +--------------------------------------------------------------------------------------------------------------------
     * @return json
     * +--------------------------------------------------------------------------------------------------------------------
     **/
	public function curls() {
		$url = I('request.url', '', 'trim');
		$type = I('request.type', 'get', 'trim');
		$data = I('request.data', array());
		
		if(get_user_token()) {
			$data['user_token'] = get_user_token();
		}
		
		// if(empty($data['shop_id']) && b2b2c_user_selected_shop_id_get()) {
		// 	$data['shop_id'] = b2b2c_user_selected_shop_id_get();
		// }
		
		// error_log(C('APIURL').''.$url);
		// error_log($type);
		// error_log(print_r($data,1));

		echo curls(C('APIURL').''.$url, $type, $data);
	}

  /**
   *+--------------------------------------------------------------------------------------------------------------------
   * 图片预览
   *+--------------------------------------------------------------------------------------------------------------------
   * @Author zhangnan  Date:2016/7/12
   *+--------------------------------------------------------------------------------------------------------------------
   * @access public
   *+--------------------------------------------------------------------------------------------------------------------
   * @type GET
   *+--------------------------------------------------------------------------------------------------------------------
   * @param
   *+--------------------------------------------------------------------------------------------------------------------
   * @return JSON
   *+--------------------------------------------------------------------------------------------------------------------
  **/
  public function upload_previews() {
  	error_log('public upload_previews');
    echo upload_preview();
  }
  
}