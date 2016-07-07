<?php
/**
 * 店铺
 *
 */
defined('IN_B2B2C') or exit('Access Invalid!');

class store_memberControl extends mobileMemberControl {
	public function __construct(){
		parent::__construct();
	}
    /*
    *收藏店铺
    */
    public function favoritesstoreOp() {
    		if(!$_GET['store_id']) {
            		output_error('请求错误');
		} else {
			$store_id = intval($_GET['store_id']);
		}
		if ($store_id <= 0){
			output_error('2');
		}
		$favorites_model = Model('favorites');
		//判断是否已经收藏
		$favorites_info = $favorites_model->getOneFavorites(array('fav_id'=>"$store_id",'fav_type'=>'store','member_id'=>$this->member_info['member_id']));
		if(!empty($favorites_info)){
			output_error('3');
		}
		//判断店铺是否为当前会员所有

		if ($this->member_info['store_id']== $store_id){
			output_error('4');
		}
		//添加收藏
		$insert_arr = array();
		$insert_arr['member_id'] = $this->member_info['member_id'];
		$insert_arr['fav_id'] = $store_id;
		$insert_arr['fav_type'] = 'store';
		$insert_arr['fav_time'] = time();
		$result = $favorites_model->addFavorites($insert_arr);
		if ($result){
			//增加收藏数量
			$store_model = Model('store');
            		$store_model->editStore(array('store_collect'=>array('exp', 'store_collect+1')), array('store_id' => $store_id));
			output_error('1');
		}else{
			output_error('5');
		}
    }
    /*收藏列表*/
    public function favoritesstore_listOp() {
    	$favorites_model = Model('favorites');
		$favorites_list = $favorites_model->getStoreFavoritesList(array('member_id'=>$this->member_info['member_id']), '*', 10);
		if (!empty($favorites_list) && is_array($favorites_list)){
			$favorites_id = array();//收藏的店铺编号
			foreach ($favorites_list as $key=>$favorites){
				$fav_id = $favorites['fav_id'];
				$favorites_id[] = $favorites['fav_id'];
				$favorites_key[$fav_id] = $key;
			}
			$store_model = Model('store');
			$field = "store_name,store_id,store_label,area_info,store_qq,store_collect";
			$store_list = $store_model->getStoreList(array('store_id'=>array('in', $favorites_id)),null,'',$field);
			if (!empty($store_list) && is_array($store_list)){
				foreach ($store_list as $key=>$fav){
					$fav_id = $fav['store_id'];
					$key = $favorites_key[$fav_id];
					$fav['store_label'] = empty($fav['store_label']) ? UPLOAD_SITE_URL.DS.ATTACH_COMMON.DS.$GLOBALS['setting_config']['default_store_logo'] : UPLOAD_SITE_URL.DS.ATTACH_STORE.DS.$fav['store_label'];
					$favorites_list[$key]['store'] = $fav;
				}
			}
		}
		if(!$favorites_list) {
			output_error('没有收藏信息');
		} else {
			output_data(array('favorites_list' => $favorites_list));
		}
		
    }
    /**
     * 删除收藏
     */
    public function favoritesstore_delOp() {
		$fav_id = intval($_POST['fav_id']);
		if ($fav_id <= 0){
            output_error('参数错误');
		}
		$favorites_model = Model('favorites');

        $condition = array();
        $condition['fav_id'] = $fav_id;
        $condition['member_id'] = $this->member_info['member_id'];
        $result = $favorites_model->delFavorites($condition);
        if ($result){
			//减去收藏数量
			$store_model = Model('store');
            $store_model->editStore(array('store_collect'=>array('exp', 'store_collect-1')), array('store_id' => $fav_id));
			output_data('1');
		}else{
			output_error('5');
		}
        
    }
    
}
