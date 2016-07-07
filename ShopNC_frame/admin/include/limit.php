<?php
/**
 * 载入权限
 *
 */
defined('IN_B2B2C') or exit('Access Invalid!');
$_limit =  array(
	array('name'=>$lang['nc_config'], 'child'=>array(
		array('name'=>$lang['nc_web_set'], 'op'=>null, 'act'=>'setting'),
		array('name'=>$lang['nc_web_account_syn'], 'op'=>null, 'act'=>'account'),
		array('name'=>$lang['nc_upload_set'], 'op'=>null, 'act'=>'upload'),
		array('name'=>$lang['nc_seo_set'], 'op'=>'seo', 'act'=>'setting'),
		array('name'=>$lang['nc_pay_method'], 'op'=>null, 'act'=>'payment'),
		array('name'=>$lang['nc_message_set'], 'op'=>null, 'act'=>'message'),
		array('name'=>$lang['nc_admin_express_set'], 'op'=>null, 'act'=>'express'),
	    array('name'=>$lang['nc_admin_offpay_area_set'], 'op'=>null, 'act'=>'offpay_area'),
	    array('name'=>$lang['nc_admin_clear_cache'], 'op'=>null, 'act'=>'cache'),
	    array('name'=>$lang['nc_admin_perform_opt'], 'op'=>null, 'act'=>'perform'),
	    array('name'=>$lang['nc_admin_search_set'], 'op'=>null, 'act'=>'search'),
	    array('name'=>$lang['nc_admin_log'], 'op'=>null, 'act'=>'admin_log'),
		)),
	array('name'=>$lang['nc_goods'], 'child'=>array(
		array('name'=>$lang['nc_goods_manage'], 'op'=>null, 'act'=>'goods'),
		array('name'=>$lang['nc_class_manage'], 'op'=>null, 'act'=>'goods_class'),
		array('name'=>$lang['nc_brand_manage'], 'op'=>null, 'act'=>'brand'),
		array('name'=>$lang['nc_type_manage'], 'op'=>null, 'act'=>'type'),
		array('name'=>$lang['nc_spec_manage'], 'op'=>null, 'act'=>'spec'),
		array('name'=>$lang['nc_album_manage'], 'op'=>null, 'act'=>'goods_album'),
		array('name'=>'增加评论', 'op'=>null, 'act'=>'comment_collect'),
		)),
	array('name'=>$lang['nc_store'], 'child'=>array(
		array('name'=>$lang['nc_store_manage'], 'op'=>null, 'act'=>'store'),
		array('name'=>$lang['nc_store_grade'], 'op'=>null, 'act'=>'store_grade'),
		array('name'=>$lang['nc_store_class'], 'op'=>null, 'act'=>'store_class'),
		array('name'=>$lang['nc_domain_manage'], 'op'=>null, 'act'=>'domain'),
		array('name'=>$lang['nc_s_snstrace'], 'op'=>null, 'act'=>'sns_strace'),
		)),
	array('name'=>$lang['nc_member'], 'child'=>array(
		array('name'=>$lang['nc_member_manage'], 'op'=>null, 'act'=>'member'),
		array('name'=>$lang['nc_member_notice'], 'op'=>null, 'act'=>'notice'),
		array('name'=>$lang['nc_member_pointsmanage'], 'op'=>null, 'act'=>'points'),
		array('name'=>$lang['nc_binding_manage'], 'op'=>null, 'act'=>'sns_sharesetting'),
		array('name'=>$lang['nc_member_album_manage'], 'op'=>null, 'act'=>'sns_malbum'),
	    array('name'=>$lang['nc_snstrace'], 'op'=>null, 'act'=>'snstrace'),
		array('name'=>$lang['nc_member_tag'], 'op'=>null, 'act'=>'sns_member'),
		array('name'=>$lang['nc_member_predepositmanage'], 'op'=>null, 'act'=>'predeposit'),
		)),
	array('name'=>$lang['nc_trade'], 'child'=>array(
		array('name'=>$lang['nc_order_manage'], 'op'=>null, 'act'=>'order'),
		array('name'=>'退款管理', 'op'=>null, 'act'=>'refund'),
		array('name'=>'退货管理', 'op'=>null, 'act'=>'return'),
		array('name'=>$lang['nc_consult_manage'], 'op'=>null, 'act'=>'consulting'),
		array('name'=>$lang['nc_inform_config'], 'op'=>null, 'act'=>'inform'),
		array('name'=>$lang['nc_goods_evaluate'], 'op'=>null, 'act'=>'evaluate'),
		array('name'=>$lang['nc_complain_config'], 'op'=>null, 'act'=>'complain'),
		)),
	array('name'=>$lang['nc_website'], 'child'=>array(
		array('name'=>$lang['nc_article_class'], 'op'=>null, 'act'=>'article_class'),
		array('name'=>$lang['nc_article_manage'], 'op'=>null, 'act'=>'article'),
		array('name'=>$lang['nc_document'], 'op'=>null, 'act'=>'document'),
		array('name'=>$lang['nc_navigation'], 'op'=>null, 'act'=>'navigation'),
		array('name'=>$lang['nc_adv_manage'], 'op'=>null, 'act'=>'adv'),
		array('name'=>$lang['nc_web_index'], 'op'=>null, 'act'=>'web_config|web_api'),
		array('name'=>$lang['nc_channel_index'], 'op'=>null, 'act'=>'channel_column|web_config|channel_config|channel_api'),
		array('name'=>$lang['nc_admin_res_position'], 'op'=>null, 'act'=>'rec_position'),
		array('name'=>$lang['nc_cms_special_manage'], 'op'=>null, 'act'=>'web_special'),
		array('name'=>'新首页管理', 'op'=>null, 'act'=>'home_ad'),
		array('name'=>'友情链接', 'op'=>null, 'act'=>'link'),
		)),
	array('name'=>$lang['nc_operation'], 'child'=>array(
		array('name'=>$lang['nc_operation_set'], 'op'=>null, 'act'=>'operation'),
		array('name'=>$lang['nc_groupbuy_manage'], 'op'=>null, 'act'=>'groupbuy'),
		array('name'=>$lang['nc_activity_manage'], 'op'=>null, 'act'=>'activity'),
		array('name'=>$lang['nc_promotion_xianshi'], 'op'=>null, 'act'=>'promotion_xianshi'),
		array('name'=>$lang['nc_promotion_mansong'], 	'op'=>null, 'act'=>'promotion_mansong'),
		array('name'=>$lang['nc_promotion_bundling'], 'op'=>null, 'act'=>'promotion_bundling'),
		array('name'=>'推荐展位', 'op'=>null, 'act'=>'promotion_bundling'),
		array('name'=>$lang['nc_pointprod'], 'op'=>null, 'act'=>'pointprod|pointorder'),
		array('name'=>$lang['nc_voucher_price_manage'], 	'op'=>null, 'act'=>'voucher'),
	    array('name'=>$lang['nc_bill_manage'], 'op'=>null, 'act'=>'bill'),
		array('name'=>'礼品卡管理', 'op'=>null, 'act'=>'pd_gift_card'), 
		)),
	array('name'=>$lang['nc_stat'], 'child'=>array(
		array('name'=>$lang['nc_statmember'], 'op'=>null, 'act'=>'stat_member'),
		array('name'=>$lang['nc_statstore'], 'op'=>null, 'act'=>'stat_store'),
		array('name'=>$lang['nc_stattrade'], 'op'=>null, 'act'=>'stat_trade'),
		array('name'=>$lang['nc_statmarketing'], 'op'=>null, 'act'=>'stat_marketing'),
		array('name'=>$lang['nc_stataftersale'], 	'op'=>null, 'act'=>'stat_aftersale'),
		)),
	array('name'=>$lang['community_o2o'], 'child'=>array(
	array('name'=>$lang['area_list'], 'op'=>NULL, 'act'=>'o2o_area'),
	array('name'=>$lang['village'], 'op'=>NULL, 'act'=>'o2o_village'),
	array('name'=>$lang['merchant'], 'op'=>NULL, 'act'=>'merchant'),
	array('name'=>$lang['merchant_type'], 'op'=>NULL, 'act'=>'merchant'),
	array('name'=>$lang['o2o_goods'], 'op'=>NULL, 'act'=>'o2o_goods'),
	array('name'=>$lang['o2o_goods_class'], 'op'=>NULL, 'act'=>'o2o_goods_class'),
	array('name'=>$lang['nc_order_manage'], 'op'=>NULL, 'act'=>'o2o_order'),
	array('name'=>$lang['store_service'], 'op'=>NULL, 'act'=>'o2o_store_service'),
	array('name'=>$lang['comment'], 'op'=>NULL, 'act'=>'comment'),
	array('name'=>$lang['distribute_member'], 'op'=>NULL, 'act'=>'distribute_member'),
	array('name'=>$lang['mb_o2o_ad'], 'op'=>NULL, 'act'=>'o2o_mb_ad'),
	array('name'=>$lang['mb_ad'], 'op'=>NULL, 'act'=>'o2o_mb_ad'),
	
	)),
		
	array('name'=>$lang['overseas_model'], 'child'=>array(
	array('name'=>$lang['overseas_member'], 'op'=>NULL, 'act'=>'overseas_member'),
	array('name'=>$lang['overseas_article_category'], 'op'=>NULL, 'act'=>'sea_article_class'),
	array('name'=>$lang['overseas_article'], 'op'=>NULL, 'act'=>'sea_article'),
	array('name'=>$lang['overseas_goods_category'], 'op'=>NULL, 'act'=>'sea_goods_class'),
	array('name'=>$lang['overseas_add_goods'], 'op'=>NULL, 'act'=>'sea_goods_add'),
	array('name'=>$lang['overseas_goods'], 'op'=>NULL, 'act'=>'sea_goods'),
	array('name'=>$lang['overseas_brand'], 'op'=>NULL, 'act'=>'overseas_brand'),
	array('name'=>$lang['overseas_specify'], 'op'=>NULL, 'act'=>'sea_spec'),
	array('name'=>$lang['overseas_warehouse'], 'op'=>NULL, 'act'=>'sea_warehouse'),
	array('name'=>$lang['overseas_order'], 'op'=>NULL, 'act'=>'sea_order'),
	array('name'=>$lang['overseas_service'], 'op'=>NULL, 'act'=>'sea_service'),
	
	)),
);



if (C('mobile_isuse') !== NULL){
	$_limit[] = array('name'=>$lang['nc_mobile'], 'child'=>array(
		array('name'=>$lang['nc_mobile_adset'], 'op'=>NULL, 'act'=>'mb_ad'),
		array('name'=>$lang['nc_mobile_catepic'], 'op'=>NULL, 'act'=>'mb_category'),
		array('name'=>$lang['nc_mobile_feedback'], 'op'=>NULL, 'act'=>'feedback'),
		array('name'=>$lang['nc_mobile_update_cache'], 'op'=>NULL, 'act'=>'mb_cache'),
		array('name'=>'专题设置', 'op'=>NULL, 'act'=>'mb_special'),
		array('name'=>'商品广告', 'op'=>NULL, 'act'=>'mb_goods')
		));
}

if (C('microshop_isuse') !== NULL){
	$_limit[] = array('name'=>$lang['nc_microshop'], 'child'=>array(
		array('name'=>$lang['nc_microshop_manage'], 'op'=>'manage', 'act'=>'microshop'),
		array('name'=>$lang['nc_microshop_goods_manage'], 'op'=>'goods|goods_manage', 'act'=>'microshop'),//op值重复(goods_manage,goodsclass_list,personal_manage...)是为了无权时，隐藏该菜单
		array('name'=>$lang['nc_microshop_goods_class'], 'op'=>'goodsclass|goodsclass_list', 'act'=>'microshop'),
		array('name'=>$lang['nc_microshop_personal_manage'], 'op'=>'personal|personal_manage', 'act'=>'microshop'),
		array('name'=>$lang['nc_microshop_personal_class'], 'op'=>'personalclass|personalclass_list', 'act'=>'microshop'),
		array('name'=>$lang['nc_microshop_store_manage'], 'op'=>'store|store_manage', 'act'=>'microshop'),
		array('name'=>$lang['nc_microshop_comment_manage'], 'op'=>'comment|comment_manage', 'act'=>'microshop'),
		array('name'=>$lang['nc_microshop_adv_manage'], 'op'=>'adv|adv_manage', 'act'=>'microshop')
		));
}

if (C('cms_isuse') !== NULL){
	$_limit[] = array('name'=>$lang['nc_cms'], 'child'=>array(
		array('name'=>$lang['nc_cms_manage'], 'op'=>null, 'act'=>'cms_manage'),
		array('name'=>$lang['nc_cms_index_manage'], 'op'=>null, 'act'=>'cms_index'),
		array('name'=>$lang['nc_cms_article_manage'], 'op'=>null, 'act'=>'cms_article|cms_article_class'),
		array('name'=>$lang['nc_cms_picture_manage'], 'op'=>null, 'act'=>'cms_picture|cms_picture_class'),
		array('name'=>$lang['nc_cms_special_manage'], 'op'=>null, 'act'=>'cms_special'),
		array('name'=>$lang['nc_cms_navigation_manage'], 'op'=>null, 'act'=>'cms_navigation'),
		array('name'=>$lang['nc_cms_tag_manage'], 'op'=>null, 'act'=>'cms_tag'),
		array('name'=>$lang['nc_cms_comment_manage'], 'op'=>null, 'act'=>'cms_comment')
		));
}

if (C('circle_isuse') !== NULL){
	$_limit[] = array('name'=>$lang['nc_circle'], 'child'=>array(
		array('name'=>$lang['nc_circle_setting'], 'op'=>'index', 'act'=>'circle_setting'),
		array('name'=>'成员头衔设置', 'op'=>'index', 'act'=>'circle_memberlevel'),
		array('name'=>$lang['nc_circle_classmanage'], 'op'=>null, 'act'=>'circle_class'),
		array('name'=>$lang['nc_circle_manage'], 'op'=>null, 'act'=>'circle_manage'),
		array('name'=>$lang['nc_circle_thememanage'], 'op'=>null, 'act'=>'circle_theme'),
		array('name'=>$lang['nc_circle_membermanage'], 'op'=>null, 'act'=>'circle_member'),
		array('name'=>'圈子举报管理', 'op'=>null, 'act'=>'circle_inform'),
		array('name'=>$lang['nc_circle_advmanage'],'op'=>'adv_manage', 'act'=>'circle_setting')
		));
}
return $_limit;
?>
