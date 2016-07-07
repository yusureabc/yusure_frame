<?php
/**
 * 支付回调
 *
 */
 //header("Location: jishubutest.huishangbao.com/mobile/index.php?act=allinpayment&op=return"); 
defined('IN_B2B2C') or exit('Access Invalid!');

class allinpaymentappControl extends mobileHomeControl{

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
            $payment_code = 'allinpay';
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
		$out_trade_no = $_POST['orderNo'];
            //$out_trade_no = $_GET['out_trade_no'];
            //支付宝交易号
            $trade_no = $_POST['paymentOrderId'];
            //支付接口代码
            $payment_code = 'allinpay';
			//交易状态
			$trade_status = $_POST['payResult'];
            $model_order = Model('order');
            $model_payment = Model('payment');
			if($trade_status == 1) {
                $order_list = $model_order->getOrderList(array('pay_sn'=>$out_trade_no,'order_state'=>ORDER_STATE_NEW));
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
        $condition['payment_code'] = 'allinpay';
        $payment_info = $model_payment->getPaymentOpenInfo($condition);
    	$allinpay_config = unserialize($payment_info['payment_config']);
		
		$key   = $allinpay_config['alipay_key'];
		$merchantId=$_POST["merchantId"];
		$version=$_POST['version'];
		$language=$_POST['language'];
		$signType=$_POST['signType'];
		$payType=$_POST['payType'];
		$issuerId=$_POST['issuerId'];
		$paymentOrderId=$_POST['paymentOrderId'];
		$orderNo=$_POST['orderNo'];
		$orderDatetime=$_POST['orderDatetime'];
		$orderAmount=$_POST['orderAmount'];
		$payDatetime=$_POST['payDatetime'];
		$payAmount=$_POST['payAmount'];
		$ext1=$_POST['ext1'];
		$ext2=$_POST['ext2'];
		$payResult=$_POST['payResult'];
		$errorCode=$_POST['errorCode'];
		$returnDatetime=$_POST['returnDatetime'];
		$signMsg=$_POST["signMsg"];
		$bufSignSrc="";
		if($merchantId != "")
		$bufSignSrc=$bufSignSrc."merchantId=".$merchantId."&";
		if($version != "")
		$bufSignSrc=$bufSignSrc."version=".$version."&";
		if($language != "")
		$bufSignSrc=$bufSignSrc."language=".$language."&";
		if($signType != "")
		$bufSignSrc=$bufSignSrc."signType=".$signType."&";
		if($payType != "")
		$bufSignSrc=$bufSignSrc."payType=".$payType."&";
		if($issuerId != "")
		$bufSignSrc=$bufSignSrc."issuerId=".$issuerId."&";
		if($paymentOrderId != "")
		$bufSignSrc=$bufSignSrc."paymentOrderId=".$paymentOrderId."&";
		if($orderNo != "")
		$bufSignSrc=$bufSignSrc."orderNo=".$orderNo."&";
		if($orderDatetime != "")
		$bufSignSrc=$bufSignSrc."orderDatetime=".$orderDatetime."&";
		if($orderAmount != "")
		$bufSignSrc=$bufSignSrc."orderAmount=".$orderAmount."&";
		if($payDatetime != "")
		$bufSignSrc=$bufSignSrc."payDatetime=".$payDatetime."&";
		if($payAmount != "")
		$bufSignSrc=$bufSignSrc."payAmount=".$payAmount."&";
		if($ext1 != "")
		$bufSignSrc=$bufSignSrc."ext1=".$ext1."&";
		if($ext2 != "")
		$bufSignSrc=$bufSignSrc."ext2=".$ext2."&";
		if($payResult != "")
		$bufSignSrc=$bufSignSrc."payResult=".$payResult."&";
		if($errorCode != "")
		$bufSignSrc=$bufSignSrc."errorCode=".$errorCode."&";
		if($returnDatetime != "")
		$bufSignSrc=$bufSignSrc."returnDatetime=".$returnDatetime;
		
        //解析publickey.txt文本获取公钥信息
        require_once(BASE_PATH."/api/payment/allinpay/php_rsa.php"); 
		$publickeyfile = BASE_PATH.'/api/payment/allinpay/publickey.txt';
		$publickeycontent = file_get_contents($publickeyfile);
		$publickeyarray = explode(PHP_EOL, $publickeycontent);
		$publickey = explode('=',$publickeyarray[0]);
		$modulus = explode('=',$publickeyarray[1]);
		$keylength = 1024;
		//验签结果
		$verify_result = rsa_verify($bufSignSrc,$signMsg, $publickey[1], $modulus[1], $keylength,"sha1");
		$value = null;
		if($verify_result){
		  	$value = "报文验签成功！";
		 	// echo "1";
		}
		else{
		  	$value = "报文验签失败！";
		 	// echo "2";
		}
		//验签成功，还需要判断订单状态，为"1"表示支付成功。
		$payvalue = null;
		$pay_result = false;
		if($payResult == 1){
		 	$this->order_type = $ext1;
			$this->pay_result = true;
			//支付成功，可进行逻辑处理！
			return true;
		}else{
		  return false;
		}
    }
}
