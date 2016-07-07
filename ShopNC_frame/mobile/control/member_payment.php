<?php
/**
 * 支付
 */
defined('IN_B2B2C') or exit('Access Invalid!');

class member_paymentControl extends mobileMemberControl {

	public function __construct() {
		parent::__construct();
	}

    /**
     * 支付
     */
    public function payOp() {
	    $pay_sn = $_GET['pay_sn'];
        $payment_code = in_array($_GET['payment_code'],array('alipay','allinpay','wxpay'))?$_GET['payment_code']:'alipay';
        $model_payment = Model('payment');
        $result = $model_payment->productBuy($pay_sn, $payment_code, $this->member_info['member_id']);
        if(!empty($result['error'])) {
            echo "<div style='margin:auto;width:170px;'><img src='./pay_false01.png'/></div>";die;
            //output_error($result['error']);
        }

        //第三方API支付
        $this->_api_pay($result['order_pay_info'], $result['payment_info']);
    }

	/**
	 * 第三方在线支付接口
	 *
	 */
	private function _api_pay($order_pay_info, $payment_info) {
    	$inc_file = BASE_PATH.DS.'api'.DS.'payment'.DS.$payment_info['payment_code'].DS.$payment_info['payment_code'].'.php';
    	if(!file_exists($inc_file)){
            output_error('支付接口不存在');
    	}
    	require_once($inc_file);
        $param = array();
    	$param = unserialize($payment_info['payment_config']);
        $param['order_sn'] = $order_pay_info['pay_sn'];
        $param['order_amount'] = $order_pay_info['pay_amount'];
        $param['subject'] = $order_pay_info['subject'];
        $param['order_type'] = $order_pay_info['order_type'];
        $param['goods_amount'] = $order_pay_info['goods_amount'];
        $param['shipping_fee'] = $order_pay_info['shipping_fee'];
        $param['sign_type'] = 'MD5';
    	$payment_api = new $payment_info['payment_code']($param);
        $return = $payment_api->submit();
        echo $return;
    	exit;
	}
	/*
	*支付查询
	*订单状态：0(已取消)10(默认):未付款;20:已付款;30:已发货;40:已收货;
	*/
	public function pay_listOp() {
		$pay_sn = $_GET['pay_sn'];
		$model_order = Model('order');
	       $order_pay_info = $model_order->getOrderInfo(array('pay_sn'=>$pay_sn,'buyer_id'=>$this->member_info['member_id']),'','order_state');
	       output_data(array('order_pay_info' => $order_pay_info));
	}
}
