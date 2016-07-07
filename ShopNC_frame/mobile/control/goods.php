<?php
/**
 * 商品
 */
defined('IN_B2B2C') or exit('Access Invalid!');
class goodsControl extends mobileHomeControl{

	public function __construct() {
        parent::__construct();
    }

    /**
     * 商品列表
     */
    public function goods_listOp() {
        $model_goods = Model('goods');

        //查询条件
        $condition = array();
        if(!empty($_GET['gc_id']) && intval($_GET['gc_id']) > 0) {
            $condition['gc_id'] = $_GET['gc_id'];
        } 
        if (!empty($_GET['keyword'])) { 
            $condition['goods_name|goods_jingle'] = array('like', '%' . $_GET['keyword'] . '%');
        } 
        if(!empty($_GET['store_id'])) {
        	$condition['store_id'] = $_GET['store_id'];
        }
        //所需字段
        $fieldstr = "goods_id,goods_commonid,store_id,goods_name,goods_price,goods_marketprice,goods_image,goods_salenum,evaluation_good_star,evaluation_count,store_name";

        //排序方式
        $order = $this->_goods_list_order($_GET['key'], $_GET['order']);

        $goods_list = $model_goods->getGoodsListByColorDistinct($condition, $fieldstr, $order, $this->page);
        
        
        	
        if(!empty($_GET['keyword']) && !$goods_list) {
        	unset($condition['goods_name|goods_jingle']);
        	$model_goods_class = Model('goods_class');
	    	$gc_name = $_GET['keyword'];
	    	
	    	$arr['gc_name'] = array('like', '%' . $gc_name . '%');
	    	$gcArr = $model_goods_class->getGoodsClassInfo($arr, $field = 'gc_id');
	    	
	    	$class_list = $model_goods_class->getClassList(array('gc_parent_id' => $gcArr['gc_id']), 'gc_id,gc_name');
	    	$gcidArr = "";
	    	foreach($class_list as $key => $value){
	    		$gcidArr.= $value['gc_id'].",";
	    	}
	    	$gcidArr = rtrim($gcidArr,",");
	    	$gcidArr = "'".$gcidArr."'";
	    	$condition['gc_id'] = array('in',$gcidArr);
        	
        	$goods_list = $model_goods->getGoodsListByColorDistinct($condition, $fieldstr, $order, $this->page);
        	if(!$goods_list){
        		unset($condition['gc_id']);
        		$goods_list = $model_goods->getGoodsListByColorDistinct($condition, $fieldstr, $order, $this->page);
        	}
        	
        }
        $page_count = $model_goods->gettotalpage();

        //处理商品列表(团购、限时折扣、商品图片)
        $goods_list = $this->_goods_list_extend($goods_list);
	if(!$goods_list) {
		output_error('暂无产品');
	} else {
		output_data(array('goods_list' => $goods_list), mobile_page($page_count));
    }
}
        

    /**
     * 商品列表排序方式
     */
    private function _goods_list_order($key, $order) {
        $result = 'goods_id desc';
        if (!empty($key)) {

            $sequence = 'desc';
            if($order == 1) {
                $sequence = 'asc';
            }

            switch ($key) {
                //销量
                case '1' :
                    $result = 'goods_salenum' . ' ' . $sequence;
                    break;
                //浏览量
                case '2' : 
                    $result = 'goods_click' . ' ' . $sequence;
                    break;
                //价格
                case '3' :
                    $result = 'goods_price' . ' ' . $sequence;
                    break;
            }
        }
        return $result;
    }

    /**
     * 处理商品列表(团购、限时折扣、商品图片)
     */
    private function _goods_list_extend($goods_list) {
        //获取商品列表编号数组
        $commonid_array = array();
        $goodsid_array = array();
        foreach($goods_list as $key => $value) {
            $commonid_array[] = $value['goods_commonid'];
            $goodsid_array[] = $value['goods_id'];
        }

        //促销
        $groupbuy_list = Model('groupbuy')->getGroupbuyListByGoodsCommonIDString(implode(',', $commonid_array));
        $xianshi_list = Model('p_xianshi_goods')->getXianshiGoodsListByGoodsString(implode(',', $goodsid_array));
        foreach ($goods_list as $key => $value) {
            //团购
            if (isset($groupbuy_list[$value['goods_commonid']])) {
                $goods_list[$key]['goods_price'] = $groupbuy_list[$value['goods_commonid']]['groupbuy_price'];
                $goods_list[$key]['group_flag'] = true;
            } else {
                $goods_list[$key]['group_flag'] = false;
            }

            //限时折扣
            if (isset($xianshi_list[$value['goods_id']]) && !$goods_list[$key]['group_flag']) {
                $goods_list[$key]['goods_price'] = $xianshi_list[$value['goods_id']]['xianshi_price'];
                $goods_list[$key]['xianshi_flag'] = true;
            } else {
                $goods_list[$key]['xianshi_flag'] = false;
            }

            //商品图片url
            $goods_list[$key]['goods_image_url'] = cthumb($value['goods_image'], 360, $value['store_id']); 

            //unset($goods_list[$key]['store_id']);
            unset($goods_list[$key]['goods_commonid']);
            unset($goods_list[$key]['nc_distinct']);
        }

        return $goods_list;
    }

    /**
     * 商品详细页
     */
    public function goods_detailOp() {
        $goods_id = intval($_GET ['goods_id']);
        
        // 商品详细信息
        $model_goods = Model('goods');
        $goods_detail = $model_goods->getGoodsDetail($goods_id, '*');
        if (empty($goods_detail)) {
            output_error('商品不存在');
        }

        //推荐商品
        $model_store = Model('store');
        $hot_sales = $model_store->getHotSalesList($goods_detail['goods_info']['store_id'], 6);
        $goods_commend_list = array();
        foreach($hot_sales as $value) {
            $goods_commend = array();
            $goods_commend['goods_id'] = $value['goods_id'];
            $goods_commend['goods_name'] = $value['goods_name'];
            $goods_commend['goods_price'] = $value['goods_price'];
            $goods_commend['goods_image_url'] = cthumb($value['goods_image'], 240);
            $goods_commend_list[] = $goods_commend;
        }
        $goods_detail['goods_commend_list'] = $goods_commend_list;

        //商品详细信息处理
        $goods_detail = $this->_goods_detail_extend($goods_detail);

        output_data($goods_detail);
    }

    /**
     * 商品详细信息处理
     */
    private function _goods_detail_extend($goods_detail) {
        //整理商品规格
        unset($goods_detail['spec_list']);
        $goods_detail['spec_list'] = $goods_detail['spec_list_mobile'];
        unset($goods_detail['spec_list_mobile']);

        //整理商品图片
        unset($goods_detail['goods_image']);
        $goods_detail['goods_image'] = implode(',', $goods_detail['goods_image_mobile']);
        unset($goods_detail['goods_image_mobile']);

        //整理数据
        unset($goods_detail['goods_info']['goods_commonid']);
        unset($goods_detail['goods_info']['gc_id']);
        unset($goods_detail['goods_info']['gc_name']);
        //unset($goods_detail['goods_info']['store_id']);
        //unset($goods_detail['goods_info']['store_name']);
        unset($goods_detail['goods_info']['brand_id']);
        unset($goods_detail['goods_info']['brand_name']);
        unset($goods_detail['goods_info']['type_id']);
        unset($goods_detail['goods_info']['goods_image']);
        unset($goods_detail['goods_info']['goods_body']);
        unset($goods_detail['goods_info']['goods_state']);
        unset($goods_detail['goods_info']['goods_stateremark']);
        unset($goods_detail['goods_info']['goods_verify']);
        unset($goods_detail['goods_info']['goods_verifyremark']);
        unset($goods_detail['goods_info']['goods_lock']);
        unset($goods_detail['goods_info']['goods_addtime']);
        unset($goods_detail['goods_info']['goods_edittime']);
        unset($goods_detail['goods_info']['goods_selltime']);
        unset($goods_detail['goods_info']['goods_show']);
        unset($goods_detail['goods_info']['goods_commend']);
        unset($goods_detail['groupbuy_info']);
        unset($goods_detail['xianshi_info']);

        return $goods_detail;
    }

    /**
     * 商品详细页
     */
    public function goods_bodyOp() {
        $goods_id = intval($_GET ['goods_id']);

        $model_goods = Model('goods');

        $goods_info = $model_goods->getGoodsInfo(array('goods_id' => $goods_id));
        $goods_common_info = $model_goods->getGoodeCommonInfo(array('goods_commonid' => $goods_info['goods_commonid']));

        Tpl::output('goods_common_info', $goods_common_info);
        Tpl::showpage('goods_body');
    }
    /*
    * 商品评价信息
    */
    public function evaluate_infoOp() {
    	$goods_id = intval($_GET['goods_id']);
    	if(!$goods_id) {
    		output_error('请求错误');
    	}
    	$model_evaluate_goods = Model('evaluate_goods');
	//$condition = array();
        //$condition['geval_goodsid'] = $goods_id;
        //$goodsevallist = $model_evaluate_goods->getEvaluateGoodsList($condition, 10, 'geval_id desc');
        $goods_evaluate_info = Model('evaluate_goods')->getEvaluateGoodsInfoByGoodsID($goods_id);
    	output_data(array('goods_evaluate_info' => $goods_evaluate_info));
    }
        /*
    *商品评价列表
    */
    public function evaluate_listOp() {
    	$goods_id = intval($_GET['goods_id']);
    	if (!$goods_id){
            output_error($lang['wrong_argument']);
        }
    	$model_evaluate_goods = Model('evaluate_goods');
		$condition = array();
    	$condition['geval_goodsid'] = $goods_id;
        
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
}
