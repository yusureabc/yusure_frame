<?php
/**
 * 店铺
 *
 */
defined('IN_B2B2C') or exit('Access Invalid!');

class storeControl extends mobileHomeControl {
	var $store_id;
	public function __construct(){
		parent::__construct();
		if(!$_GET['store_id']) {
            		output_error('请求错误');
		} else {
			$this->store_id = intval($_GET['store_id']);
		}
	}
	/*
	*最新产品
	*/
	public function goods_newOp() {
		$goods_class = Model('goods');
	       $condition = array();
            	$condition['store_id'] = $this->store_id;
	        $model_goods = Model('goods'); // 字段
	        $fieldstr = "goods_id,goods_commonid,goods_name,goods_jingle,store_id,store_name,goods_price,goods_marketprice,goods_storage,goods_image,goods_freight,goods_salenum,color_id,evaluation_good_star,evaluation_count";
		//得到最新12个商品列表
		//$condition['store_id'] = ;
	        $arr = $model_goods->getGoodsListByColorDistinct($condition, $fieldstr, 'goods_id desc', 12);
	        if(!$arr) {
            		output_error('暂无数据');
		} else {
			$new_goods_list = array();
			foreach($arr as $k=>$v) {
				 $v['goods_image_url'] = cthumb($v['goods_image'], 360);
				$new_goods_list[] = $v;
			}
		}
	       output_data(array('new_goods_list' => $new_goods_list));
	}
	/*
	*推荐产品
	*/
	public function goods_recommendedOp() {
		$goods_class = Model('goods');
	       $condition = array();
            	$condition['store_id'] = $this->store_id;
            	$condition['goods_commend'] = 1;
		//得到12个推荐商品列表
        
	        $model_goods = Model('goods'); // 字段
	        $fieldstr = "goods_id,goods_commonid,goods_name,goods_jingle,store_id,store_name,goods_price,goods_marketprice,goods_storage,goods_image,goods_freight,goods_salenum,color_id,evaluation_good_star,evaluation_count";
		//得到最新12个商品列表
		//$condition['store_id'] = ;
	        $arr = $model_goods->getGoodsListByColorDistinct($condition, $fieldstr, 'goods_id desc', 12);
	        if(!$arr) {
            		output_error('暂无数据');
		} else {
			$recommended_goods_list = array();
			foreach($arr as $k=>$v) {
				 $v['goods_image_url'] = cthumb($v['goods_image'], 360);
				$recommended_goods_list[] = $v;
			}
		}
	       output_data(array('recommended_goods_list' => $recommended_goods_list));
	}
	/*
	*全部产品
	*/
	public function goods_allOp() {
		$condition = array();
	        $condition['store_id'] = $this->store_id;
	        if (trim($_GET['keyword']) != '') {
	            $condition['goods_name'] = array('like', '%'.trim($_GET['keyword']).'%');
	        }

			// 排序
	        $order = $_GET['order'] == 1 ? 'asc' : 'desc';
		switch (trim($_GET['key'])){
			case '1':
				$order = 'goods_id '.$order;
				break;
			case '2':
				$order = 'goods_price '.$order;
				break;
			case '3':
				$order = 'goods_salenum '.$order;
				break;
			case '4':
				$order = 'goods_collect '.$order;
				break;
			case '5':
				$order = 'goods_click '.$order;
				break;
			default:
				$order = 'goods_id desc';
				break;
		}

		//查询分类下的子分类
		if (intval($_GET['stc_id']) > 0){
		    $condition['goods_stcids'] = array('like', '%,' . intval($_GET['stc_id']) . ',%');
		}

		$goods_class = Model('goods');
		$fieldstr = "goods_id,goods_commonid,goods_name,goods_jingle,store_id,store_name,goods_price,goods_marketprice,goods_storage,goods_image,goods_freight,goods_salenum,color_id,evaluation_good_star,evaluation_count";
		
        $all_goods_list = $goods_class->getGoodsListByColorDistinct($condition, $fieldstr, $order, $this->page);
        $page_count = $goods_class->gettotalpage();

        //处理商品列表(团购、限时折扣、商品图片)
        $arr = $this->_goods_list_extend($all_goods_list);
	if(!$arr) {
        	output_error('暂无数据');
	} else {
		$all_goods_list = array();
		foreach($arr as $k=>$v) {
			 $v['goods_image_url'] = cthumb($v['goods_image'], 360);
			$all_goods_list[] = $v;
		}
	}
        output_data(array('all_goods_list' => $all_goods_list), mobile_page($page_count));
	
	}
	/*
	*商铺信息
	*/
	public function store_infoOp() {
		$model_store = Model('store');
		 $store_info = $model_store->getStoreInfoByID($this->store_id);
		 $store_info['store_label'] = empty($store_info['store_label']) ? UPLOAD_SITE_URL.DS.ATTACH_COMMON.DS.$GLOBALS['setting_config']['default_store_logo'] : UPLOAD_SITE_URL.DS.ATTACH_STORE.DS.$store_info['store_label'];
		 /*处理图片开始*/
		 $arr = explode(',',$store_info['store_slide']);
		 $drr = explode(',',$store_info['store_slide_url']);
		 $brr=$crr=array();
		 //echo cthumb('1_04418207207476705.jpg', 240);
	 	foreach($arr as $k=>$v) {
		 	 if($v) {
		 	 	$brr[] = UPLOAD_SITE_URL."/".ATTACH_SLIDE.DS.$v;
		 	 	 $crr[] = $drr[$k];
		 	}
		}
		if(empty($brr)){
			$brr[0]=UPLOAD_SITE_URL."/".ATTACH_SLIDE.DS."f01.jpg";
			$brr[1]=UPLOAD_SITE_URL."/".ATTACH_SLIDE.DS."f02.jpg";
			$brr[2]=UPLOAD_SITE_URL."/".ATTACH_SLIDE.DS."f03.jpg";
			$brr[3]=UPLOAD_SITE_URL."/".ATTACH_SLIDE.DS."f04.jpg";
		}
		 $store_info['store_slide'] = implode(',',$brr);
		 $store_info['store_slide_url'] = implode(',',$crr);
		 /*处理图片结束*/
		 output_data(array('store_info' => $store_info));
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
    /*
    *商品分类
    */
    public function store_catOp() {
    	$model_class	= Model('my_goods_class');
	$goods_class	= $model_class->getTreeClassList(array('store_id'=>$this->store_id),2);
	output_data(array('goods_class' => $goods_class));
    }
}
