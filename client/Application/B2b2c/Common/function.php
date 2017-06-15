<?php
/**
 *+--------------------------------------------------------------------------------------------------------------------
 * 设置用户当前选中店铺ID
 *+--------------------------------------------------------------------------------------------------------------------
 * @Author liwenxuan Date:2016/8/19
 *+--------------------------------------------------------------------------------------------------------------------
 * @access public
 *+--------------------------------------------------------------------------------------------------------------------
 * @type 
 *+--------------------------------------------------------------------------------------------------------------------
 * @parame String 必填 shop_id 店铺
 *+--------------------------------------------------------------------------------------------------------------------
 * @return 
 *+--------------------------------------------------------------------------------------------------------------------
**/
function b2b2c_user_selected_shop_id_set($shop_id) {
	$_SESSION['user_info']['b2b2c_shop_id'] = intval($shop_id);
}

/**
 *+--------------------------------------------------------------------------------------------------------------------
 * 获取当前用户选中店铺ID
 *+--------------------------------------------------------------------------------------------------------------------
 * @Author liwenxuan Date:2016/8/19
 *+--------------------------------------------------------------------------------------------------------------------
 * @access public
 *+--------------------------------------------------------------------------------------------------------------------
 * @type 
 *+--------------------------------------------------------------------------------------------------------------------
 * @parame 
 *+--------------------------------------------------------------------------------------------------------------------
 * @return 
 *+--------------------------------------------------------------------------------------------------------------------
**/
function b2b2c_user_selected_shop_id_get() {
	if($_SESSION['user_info']['b2b2c_shop_id']) {	
		return intval($_SESSION['user_info']['b2b2c_shop_id']);
	} else {
		$shop_id = curls(C('APIURL').'B2b2cPrivate/UserShopIdGet', 'get', array('user_token'=>get_user_token()), true);
		if($shop_id = intval($shop_id['data']['shop_id'])) {
			b2b2c_user_selected_shop_id_set($shop_id);
		}
		return $shop_id;
	}
}

/**
 *+----------------------------------------------------------
 * b2b2c商城，生成模拟支付的交易流水号
 *+----------------------------------------------------------
 * @Author zhangnan  Date:2016/09/07
 *+----------------------------------------------------------
 * @access public
 *+----------------------------------------------------------      
 * @return String
 *+----------------------------------------------------------
**/
function fake_query_id(){
	$date_part = date('Ymd', time());
    $rand_part = rand(10000000, 99999999);
    $part3 = substr($rand_part, 0, 4);
    $part4 = substr($rand_part, 4, 4);
    return $date_part.'000000'.$part3.$part4;
}
?>