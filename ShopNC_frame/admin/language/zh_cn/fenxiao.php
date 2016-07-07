<?php
defined('IN_B2B2C') or exit('Access Invalid!');
/**
 *分销商管理语言包
 * **/
$lang['fenxiao'] = "分销商管理";
$lang['fenxiao_store_name'] = "分销商用户名";
$lang['fenxiao_fenxiaoer_name'] = "分销商用户名";
$lang['fenxiao_fxstore_name'] = "店铺名称";
$lang['fenxiao_fxstore_zh'] = "店铺账号";
$lang['fexiao_level'] = "分销商等级";
$lang['fenxiao_zk'] = "折扣率";
$lang['fenxiao_allorder'] = "订单总金额";
$lang['fenxiao_allpay'] = "付款总金额";

$lang['dis_index'] = "分销";
$lang['dis_level_manage'] = "等级管理";
$lang['dis_level_add'] = "等级添加";

$lang['dis_level_name'] = "等级名称";
$lang['dis_num'] = "可分销商品数量";
$lang['dis_rate'] = "分销折扣率";
$lang['dis_deposit'] = "预存款";
$lang['dis_memo'] = "备注";
$lang['dis_grade'] = "级别";
$lang['dis_operate'] = "操作";
$lang['dis_eidt'] = "修 改";
$lang['dis_delete'] = "删 除";

/*添加提示信息*/
$lang['dis_name_required_ts'] = "请输入等级名称";
$lang['dis_name_exists_ts'] = "等级名称已存在";
$lang['dis_name_max_ts'] = "等级名称不能超过20个字符串";
$lang['dis_num_required_ts'] = "请输入可分销商品数量";
$lang['dis_num_error'] = "请输入大于零的数字";
$lang['dis_rate_required_ts'] = "请输入折扣率";
$lang['dis_rate_max'] = "请输入小于100且大于0的数字";
$lang['dis_deposit_required_ts'] = "请输入预存款标准";
$lang['level_add_success'] = "等级添加成功";
$lang['level_add_error'] = "等级添加失败";
$lang['level_add_up_condition'] = "升级条件";
$lang['dis_has_member_num'] = "分销商数";
$lang['dis_fx_cash'] = "分销金额";
$lang['dis_up_member_required'] = "所需发展分销商数";
$lang['dis_up_consume_required'] = "所需分销金额";
$lang['dis_level_member_require'] = "请输入发展分销商数" ;
$lang['dis_level_member_consume'] = "请输入分销金额" ;
$lang['dis_goods_num_error'] = "可分销商品数量不能为空，且必须输入大于0的整数";
$lang['dis_goods_rate_error'] = "折扣率不能为空，且必须输入大于0小于100的数字";
$lang['dis_goods_deposit_error'] = "预存款的数量不能为空，且预存款数值必须大于0";
$lang['dis_num_consume_error'] = "分销数量和分销金额不能同时为空或小于等于0";
$lang['dis_delete_succ'] = "数据删除成功";
$lang['dis_delete_error'] = "数据删除失败";
$lang['dis_canshu_error'] = "参数错误，请确认";
/*等级修改提示信息*/
$lang['dis_edit_level'] = "等级修改";
$lang['dis_edit_succ'] = "数据修改成功";
$lang['dis_edit_error'] = "数据修改失败";
//商品设置
$lang['dis_flag_error'] = "对不起，数据有误请确认";
$lang['dis_goods_setting'] = "分销商品设置";
$lang['goods_name'] = "商品名称";
$lang['gyp_price'] = "商城价格";
$lang['goods_price'] = "分销商价格";
$lang['my_distribute_rate'] = "直接分成比";
$lang['parent_distribute_rate'] = "父级分成比";
$lang['grand_distribute_rate'] = "祖父级分成比";
$lang['is_open_distribute'] = "是否开启分销设置";
$lang['open'] = "开启分销设置";
$lang['off'] = "关闭分销设置";
$lang['operate_succ'] = "数据操作成功";
$lang['operate_error'] = "数据修改失败";
$lang['postage_setting'] = "附加费用设置";
$lang['goods_weight'] = "单个商品的重量";
$lang['goods_volume'] = "单个商品的体积";
$lang['dis_postage'] = "邮费";
$lang['dis_wrap'] = "包装费";
$lang['default'] = "默认";
$lang['per_add'] = "每增加";
$lang['for_free'] = "免运费额度";
$lang['for_wrap_free'] = "免包装费额度";
$lang['has_member'] = "对不起，已有用户获得此等级，此等级不能被删除";
$lang['grade_gt_zero'] = "对不起，级别必须大于0";
$lang['grade_require'] = "级别必填且是大于0的整数";
$lang['free_condition_error'] = "不想免除附加费用时，请填写免运费额度和免包装费额度";
$lang['postage_unenought'] = "邮费信息填写不完整，请重新填写";
$lang['grade_isexists'] = "对不起，等级已经存在请确认";
//门店系统
$lang['store_mng'] = "商铺管理";
$lang['store_set_store'] = "开启门店系统";
$lang['store_name'] = "店铺名称";
$lang['store_member_name'] = "店主会员名";
$lang['store_baozhj'] = "开启门店系统保证金";
$lang['store_pb_amount'] = "门店品币数量";
$lang['is_open_storesys'] = "是否开启门店系统";
$lang['open_storesys'] = "开启";
$lang['close_storesys'] = "关闭";
$lang['store_baozhj_isreq'] = "开启门店系统保证金是必填项， 且金额是大于零的数字";
$lang['store_pb_isreq'] = "门店品币数量是必填项， 且数量是大于零的数字";
$lang['store_edit_store'] = "修改门店系统信息";
$lang['store_level'] = "门店主等级";