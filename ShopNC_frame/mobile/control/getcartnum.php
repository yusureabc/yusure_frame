<?php
/**
 * 我的购物车数量
 *
 */
defined('IN_B2B2C') or exit('Access Invalid!');

class getcartnumControl extends mobileMemberControl {

	public function __construct(){
		parent::__construct();
	}

    /**
     * 订单列表
     */
    public function cart_listOp() {
		$model_cart = Model('cart');
		//if(!$_POST['buyer_id']) {
		//	output_data('');
		//}
        $condition = array();
        $condition['buyer_id'] = $this->member_info['member_id'];	
        $cart_list_num = $model_cart->getCartNum("db",$condition);
        output_data(array('cart_list' => $cart_list_num), mobile_page($page_count));
    }


}
