<?php
/**
 * 订单评价
 *
 */
defined('IN_B2B2C') or exit('Access Invalid!');

class member_evaluateControl extends mobileMemberControl {

	public function __construct() {
		parent::__construct();
	}
    /*
    *用户商品所有评价列表
    */
    public function evaluate_listOp() {
    	$model_evaluate_goods = Model('evaluate_goods');
		$condition = array();
    	$condition['geval_frommemberid'] = $this->member_info['member_id'];
        $arr = $model_evaluate_goods->getEvaluateGoodsList($condition, $this->page, 'geval_id desc');
        $goodsevallist = array();
        foreach($arr as $k=>$v) {
        	unset($v['geval_image']);
        	$goodsevallist[] =$v;
        }
        //$goods_evaluate_info = Model('evaluate_goods')->getEvaluateGoodsInfoByGoodsID($goods_id);
        //处理评价图片
        //list($sns_image) = explode(',', $geval_image);
        //snsThumb($sns_image, 240)
        $page_count = $model_evaluate_goods->gettotalpage();
	    output_data(array('goodsevallist' => $goodsevallist), mobile_page($page_count));
    }
    /**
     * 订单添加评价
     */
    public function evaluate_addOp() {
  		$order_id = intval($_GET['order_id']);
        if (!$order_id){
            output_error($lang['wrong_argument']);
        }

        $model_order = Model('order');
        $model_store = Model('store');
        $model_evaluate_goods = Model('evaluate_goods');
        $model_evaluate_store = Model('evaluate_store');

        //获取订单信息
        //订单为'已收货'状态，并且未评论
        $order_info = $model_order->getOrderInfo(array('order_id' => $order_id));
        $order_info['evaluate_able'] = $model_order->getOrderOperateState('evaluation',$order_info);
        if (empty($order_info) || !$order_info['evaluate_able']){
            output_error(Language::get('member_evaluation_order_notexists'));
        }
        //查询店铺信息
        $store_info = $model_store->getStoreInfoByID($order_info['store_id']);
        if(empty($store_info)){
            output_error(Language::get('member_evaluation_store_notexists'));
        }

        //获取订单商品
        $order_goods = $model_order->getOrderGoodsList(array('order_id'=>$order_id));
        if(empty($order_goods)){
            output_error(Language::get('member_evaluation_order_notexists'));
        }
        for ($i = 0, $j = count($order_goods); $i < $j; $i++) {
            $order_goods[$i]['goods_image_url'] = cthumb($order_goods[$i]['goods_image'], 60, $store_info['store_id']);
        }
        output_data(array('order_info' => $order_info,'order_goods' => $order_goods,'store_info' => $store_info));
       	
    }
    /**
     * 订单添加评价
     */
    public function evaluate_saveOp() {
    	$arr = str_replace("&quot;",'"',$_POST['evaluateData']);
  		$evaluateData = json_decode($arr,true);
  		
  		if(empty($evaluateData)) {
  			output_error($lang['wrong_argument']);
  		}
  		$order_id = intval($evaluateData['order_id']);
        if (!$evaluateData['order_id']){
            output_error($lang['wrong_argument']);
        }

        $model_order = Model('order');
        $model_store = Model('store');
        $model_evaluate_goods = Model('evaluate_goods');
        $model_evaluate_store = Model('evaluate_store');

        //获取订单信息
        //订单为'已收货'状态，并且未评论
        $order_info = $model_order->getOrderInfo(array('order_id' => $order_id));
        $order_info['evaluate_able'] = $model_order->getOrderOperateState('evaluation',$order_info);
        if (empty($order_info) || !$order_info['evaluate_able']){
            output_error(Language::get('member_evaluation_order_notexists'));
        }
        //查询店铺信息
        $store_info = $model_store->getStoreInfoByID($order_info['store_id']);
        if(empty($store_info)){
            output_error(Language::get('member_evaluation_store_notexists'));
        }

        //获取订单商品
        $order_goods = $model_order->getOrderGoodsList(array('order_id'=>$order_id));
        if(empty($order_goods)){
            output_error(Language::get('member_evaluation_order_notexists'));
        }
        $evaluate_goods_array = array();
        foreach ($order_goods as $value){
            //如果未评分，默认为5分
            $evaluate_score = intval($evaluateData['goods'][$value['goods_id']]['score']);
            if($evaluate_score <= 0 || $evaluate_score > 5) {
                $evaluate_score = 5;
            }
            //默认评语
            $evaluate_comment = $evaluateData['goods'][$value['goods_id']]['comment'];
            if(empty($evaluate_comment)) {
                $evaluate_comment = '不错哦';
            }

            $evaluate_goods_info = array();
            $evaluate_goods_info['geval_orderid'] = $order_id;
            $evaluate_goods_info['geval_orderno'] = $order_info['order_sn'];
            $evaluate_goods_info['geval_ordergoodsid'] = $value['rec_id'];
            $evaluate_goods_info['geval_goodsid'] = $value['goods_id'];
            $evaluate_goods_info['geval_goodsname'] = $value['goods_name'];
            $evaluate_goods_info['geval_goodsprice'] = $value['goods_price'];
            $evaluate_goods_info['geval_scores'] = $evaluate_score;
            $evaluate_goods_info['geval_content'] = $evaluate_comment;
            $evaluate_goods_info['geval_isanonymous'] = $evaluateData['anony']?1:0;
            $evaluate_goods_info['geval_addtime'] = TIMESTAMP;
            $evaluate_goods_info['geval_storeid'] = $store_info['store_id'];
            $evaluate_goods_info['geval_storename'] = $store_info['store_name'];
            $evaluate_goods_info['geval_frommemberid'] = $this->member_info['member_id'];
            $evaluate_goods_info['geval_frommembername'] = $this->member_info['member_name'];

            $evaluate_goods_array[] = $evaluate_goods_info;
        }
        $model_evaluate_goods->addEvaluateGoodsArray($evaluate_goods_array);

        $store_desccredit = intval($evaluateData['store_desccredit']);
        if($store_desccredit <= 0 || $store_desccredit > 5) {
            $store_desccredit= 5;
        }
        $store_servicecredit = intval($evaluateData['store_servicecredit']);
        if($store_servicecredit <= 0 || $store_servicecredit > 5) {
            $store_servicecredit = 5;
        }
        $store_deliverycredit = intval($evaluateData['store_deliverycredit']);
        if($store_deliverycredit <= 0 || $store_deliverycredit > 5) {
            $store_deliverycredit = 5;
        }
        //添加店铺评价
        $evaluate_store_info = array();
        $evaluate_store_info['seval_orderid'] = $order_id;
        $evaluate_store_info['seval_orderno'] = $order_info['order_sn'];
        $evaluate_store_info['seval_addtime'] = time();
        $evaluate_store_info['seval_storeid'] = $store_info['store_id'];
        $evaluate_store_info['seval_storename'] = $store_info['store_name'];
        $evaluate_store_info['seval_memberid'] = $this->member_info['member_id'];
        $evaluate_store_info['seval_membername'] = $this->member_info['member_name'];
        $evaluate_store_info['seval_desccredit'] = $store_desccredit;
        $evaluate_store_info['seval_servicecredit'] = $store_servicecredit;
        $evaluate_store_info['seval_deliverycredit'] = $store_deliverycredit;
        $model_evaluate_store->addEvaluateStore($evaluate_store_info);

        //更新订单信息并记录订单日志
        $state = $model_order->editOrder(array('evaluation_state'=>1), array('order_id' => $order_id));
        $model_order->editOrderCommon(array('evaluation_time'=>TIMESTAMP), array('order_id' => $order_id));
        if ($state){
            $data = array();
            $data['order_id'] = $order_id;
            $data['log_role'] = 'buyer';
            $data['log_msg'] = L('order_log_eval');
            $model_order->addOrderLog($data);
        }

        //添加会员金币
        if ($GLOBALS['setting_config']['points_isuse'] == 1){
            $points_model = Model('points');
            $points_model->savePointsLog('comments',array('pl_memberid'=>$this->member_info['member_id'],'pl_membername'=>$this->member_info['member_name']));
        }
        output_data('1');	
    }
}
