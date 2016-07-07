<?php
/**
 * cms首页
 */
defined('IN_B2B2C') or exit('Access Invalid!');
class indexControl extends mobileHomeControl{

	public function __construct() {
        parent::__construct();
    }

	public function indexOp(){
        $model_mb_ad = Model('mb_ad');
        $model_mb_home = Model('mb_home');
        $model_mb_app_home = Model('mb_app_home');//首页设置
        $datas = array();

        //广告
        $adv_list = array();
        $adv_str = "";
        $mb_ad_list = $model_mb_ad->getMbAdList(array(), null, 'link_sort asc');
        foreach ($mb_ad_list as $value) {
            $adv = array();
            $adv['image'] = $value['link_pic_url'];
            $adv['keyword'] = $value['link_keyword'];
            $adv_str.=$value['link_pic_url'].",";
            $adv_list[] = $adv;
        }
        $adv_str = rtrim($adv_str,",");
        $datas['adv_list'] = $adv_list;
        $datas['adv_str'] = $adv_str;

        //首页
        $home_type1_list = array();
        $home_type2_list = array();
        $mb_home_list = $model_mb_home->getMbHomeList(array(), null, 'h_sort asc');
        foreach ($mb_home_list as $value) {
            $home = array();
            $home['image'] = $value['h_img_url'];
            $home['title'] = $value['h_title'];
            $home['desc'] = $value['h_desc'];
            $home['keyword'] = $value['h_keyword'];
            if($value['h_type'] == 'type1') {
                $home['keyword1'] = $value['h_multi_keyword'];
                $home_type1_list[] = $home;
            } else {
                $home_type2_list[] = $home;
            }
        }
        $datas['home1'] = $home_type1_list;
        $datas['home2'] = $home_type2_list;
		
		
		$mb_app_home_list = $model_mb_app_home->getMbAppHomeList(array(), null, 'h_id asc');
		$app_home = array();
		$edition = array();
        foreach ($mb_app_home_list as $key=>$value) {
            $app_home[$value['h_type']][]=array('h_desc'=>$value['h_desc'],'h_id'=>$value['h_id'],'h_img'=>$value['h_img'],'h_img_url'=>$value['h_img_url'],'h_keyword'=>$value['h_keyword'],'h_title'=>$value['h_title'],'h_type'=>$value['h_type']);
            $edition[$key] = $value['h_id'];
        }
        array_multisort($edition, SORT_ASC, $app_home);
        $datas['goods_list'] = $app_home;
        /*首页添加食品馆、饰品馆、服装馆开始*/
        $model_goods = Model('goods');
        $app_type = array("食品馆","饰品馆","服装馆");
        $app_type_id = array(array(7652,7633,7654,7662),array(5371,5367,5358,5357),array(5312,5140,1938,1861));
        foreach($app_type as $k=>$v) {
        	//查询条件
		$condition = array();
		$str = '';
		$str = implode(",",$app_type_id[$k]);
		$condition['goods_id']=array('in',$str);
		//所需字段
		$fieldstr = "goods_id,goods_commonid,store_id,goods_name,goods_price,goods_marketprice,goods_image,goods_salenum,evaluation_good_star,evaluation_count,store_name";
		$goods_list = $model_goods->getGoodsListByColorDistinct($condition, $fieldstr);
		//处理商品列表(团购、限时折扣、商品图片)
		$goods_list = $this->_goods_list_extend($goods_list);
        	$app_type_goods[$v] = $goods_list;
        }
        $datas['app_type_goods'] = $app_type_goods;
        /*首页添加食品馆、饰品馆、服装馆结束*/
        output_data($datas);
	}
    public function listOp(){
        $model_goods = Model('goods');

        //查询条件
        $condition = array();
       $condition['goods_id']=array('in','6639,6634,7514,7050');
        //所需字段
        $fieldstr = "goods_id,goods_commonid,store_id,goods_name,goods_price,goods_marketprice,goods_image,goods_salenum,evaluation_good_star,evaluation_count,store_name";
        $goods_list = $model_goods->getGoodsListByColorDistinct($condition, $fieldstr);

        //处理商品列表(团购、限时折扣、商品图片)
        $goods_list = $this->_goods_list_extend($goods_list);
        if(!$goods_list) {
            output_error('暂无产品');
        } else {
            output_data(array('goods_list' => $goods_list), mobile_page($page_count));
        }
    }

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
}
