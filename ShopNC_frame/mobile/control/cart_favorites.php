<?php
/**
 * 判断产品是否在购物车和收藏
 *
 */
defined('IN_B2B2C') or exit('Access Invalid!');

class cart_favoritesControl extends mobileMemberControl {

	public function __construct() {
		parent::__construct();
	}
    /*
    * 判断
    */
    public function checkOp() {
    	//判断是否在购物车
    	$a = $b = '';
    	$model_cart = Model('cart');
	if(!$_POST['goods_id']) {
		output_data('1');
	}
	$condition = array();
	$condition['buyer_id'] = $this->member_info['member_id'];
	$condition['goods_id'] = $_POST['goods_id'];
        $cart_list	= $model_cart->listCart('db', $condition);
        if($cart_list) {
        	$a = 1;//在购物车
        } else {
        	$a = 2;//不在购物车
        }
        //判断是否收藏
        $model_favorites = Model('favorites');
	$condition = array();
	$condition['member_id'] = $this->member_info['member_id'];
	$condition['fav_id'] = $_POST['goods_id'];
	
        $favorites_list = $model_favorites->getGoodsFavoritesList($condition, '*');
        if($favorites_list) {
        	$b = 1;//在收藏
        } else {
        	$b = 2;//不在收藏
        }
        if($a=='1' && $b=='1') {
        	output_data("2");//在购物车，在收藏
        } else if ($a=='1' && $b == '2') {
        	output_data("3");//在购物车，不在收藏
        } else if ($a == '2' && $b == '1') {
        	output_data("4");//不在购物车，在收藏
        } else {
        	output_data("5");//不在购物车，不在收藏
        }
    }
    public function is_favOp() {
	if(!$_POST['store_id']) {
		output_data('1');
	}
        //判断是否收藏
        $model_favorites = Model('favorites');
	$condition = array();
	$condition['member_id'] = $this->member_info['member_id'];
	$condition['fav_id'] = $_POST['store_id'];
	
        $favorites_list = $model_favorites->getStoreFavoritesList($condition, '*');
        if($favorites_list) {
        	output_data("2");//在收藏
        } else {
        	output_data("3");//不在收藏
        }
    }

}
