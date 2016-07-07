<?php
/**
 * cms首页
 */
defined('IN_B2B2C') or exit('Access Invalid!');
class shopControl extends mobileHomeControl{

	public function __construct() {
        parent::__construct();
    }
    public function indexOp(){
    	$app_home=array(array("id"=>5,"name"=>"青北"),array("id"=>6,"name"=>"济南"),array("id"=>8,"name"=>"青岛"));
    	$datas['shop_list'] = $app_home;
        output_data($datas);
    }
}
