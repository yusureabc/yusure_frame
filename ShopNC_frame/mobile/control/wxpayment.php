<?php
/**
 * 支付回调
 *
 */
defined('IN_B2B2C') or exit('Access Invalid!');

class wxpaymentControl extends mobileHomeControl{

	public function __construct() {
		parent::__construct();
	}

    /**
     * 支付回调
     */
    public function returnOp() {
        $verify_result = $this->_verify_result('return');

        if($verify_result) {
            //商户订单号
            $out_trade_no = $_GET['out_trade_no'];
            //支付宝交易号
            $trade_no = $_GET['trade_no'];
            //支付接口代码
            $payment_code = 'wxpay';
			//交易状态
			$trade_status = $_GET['trade_status'];
            //验证成功		
            $model_order = Model('order');
            $model_payment = Model('payment');

    		$order_list = $model_order->getOrderList(array('pay_sn'=>$out_trade_no,'order_state'=>ORDER_STATE_NEW));

            $result = $model_payment->updateProductBuy($out_trade_no, $payment_code, $order_list, $trade_no);
            if(empty($result['error'])) {
                Tpl::output('result', 'success');
                Tpl::output('message', '支付成功');
			}else{
                Tpl::output('result', 'fail');
                Tpl::output('message', '支付失败');
			}
		}
		else {
			//验证失败
			//如要调试，请看alipay_notify.php页面的verifyReturn函数
            Tpl::output('result', 'fail');
            Tpl::output('message', '支付失败');
		}
        Tpl::showpage('payment_message');

    }

    /**
     * 支付提醒
     */
    public function notifyOp() {
        $verify_result = $this->_verify_result('notify');

		if($verify_result) {//验证成功
			//商户订单号
            $out_trade_no = $_GET['out_trade_no'];
            //支付宝交易号
            $trade_no = $_GET['trade_no'];
            //支付接口代码
            $payment_code = 'wxpay';
			//交易状态
			$trade_status = $_GET['trade_status'];
            $model_order = Model('order');
            $model_payment = Model('payment');
			
			if($trade_status == 0) {
                $order_list = $model_order->getOrderList(array('pay_sn'=>$out_trade_no,'order_state'=>ORDER_STATE_NEW));

                //获取微信支付返回XML数据并入库
	            $postStr = file_get_contents("php://input");
				if (!empty($postStr)) {
					$orderxml = (array)simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
					//保存
		            $insert_arr = array(
						'openid'=>trim($orderxml['OpenId']),
						'transid'=>$trade_no,
						'out_trade_no'=>$out_trade_no,
						'status'=>1,
						'msg'=>'ok',
						'orderid'=>$order_list[0]['order_id'],
					);
					$model = Model();
		            $model->table('wxpay_deliver')->insert($insert_arr);
				}
                $result = $model_payment->updateProductBuy($out_trade_no, $payment_code, $order_list, $trade_no);
                if(empty($result['error'])) {
					echo "success";		//请不要修改或删除
				}else{
					echo "fail";
				}
			}
		}
		else {
		    //验证失败
		    echo "fail";
		}

    }

    private function _verify_result($type) {
		unset($_GET['act']);	//将系统的控制参数置空，防止因为加密验证出错
		unset($_GET['op']);	//将系统的控制参数置空，防止因为加密验证出错
        $model_payment = Model('payment');
        //读取接口配置信息
        $condition = array();
        $condition['payment_code'] = 'wxpay';
        $payment_info = $model_payment->getPaymentOpenInfo($condition);
    	$wxpay_config = unserialize($payment_info['payment_config']);
		$options = array(
			'partnerid'  => $wxpay_config['wxpay_partnerid'],
			'partnerkey' => $wxpay_config['wxpay_partnerkey'],
			'appid'      =>$wxpay_config['wxpay_appid'],
			'paysignkey' => $wxpay_config['wxpay_paysignkey'],
			'appsecret'  => $wxpay_config['wxpay_appsecret'],
			'token'      => $wxpay_config['wxpay_token'],
		);
		import('wechat.wechat#class');
		$weChat = new Wechat($options);
		return $weChat->checkOrderSignature();
    }
}
