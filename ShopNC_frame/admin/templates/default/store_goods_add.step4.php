<link href="<?php echo ADMIN_TEMPLATES_URL;?>/css/sea_addgoods.css" rel="stylesheet" type="text/css">

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['overseas_add_goods'];?></h3>
      <ul class="tab-base">
        <li><a href="JavaScript:void(0);" class="current"><span> <?php echo $lang['overseas_add_goods']; ?> </span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
</div>

<ul class="add-goods-step">
  <li><i class="icon icon-list-alt"></i>
    <h6>STIP.1</h6>
    <h2>选择商品分类</h2>
    <i class="arrow icon-angle-right"></i> </li>
  <li><i class="icon icon-edit"></i>
    <h6>STIP.2</h6>
    <h2>填写商品详情</h2>
    <i class="arrow icon-angle-right"></i> </li>
  <li><i class="icon icon-camera-retro "></i>
    <h6>STIP.3</h6>
    <h2>上传商品图片</h2>
    <i class="arrow icon-angle-right"></i> </li>
  <li class="current"><i class="icon icon-ok-circle"></i>
    <h6>STIP.4</h6>
    <h2>商品发布成功</h2>
  </li>
</ul>
<div class="alert alert-block hr32">
  <h2><i class="icon-ok-circle mr10"></i><?php echo $lang['store_goods_step3_goods_release_success'];?>&nbsp;&nbsp;<?php if (C('goods_verify')) {?>等待管理员审核商品！<?php }?></h2>
  <div class="hr16"></div>
  <strong>
    <a class="ml30 mr30" href="<?php echo urlOverseas('overseas_goods_detail', 'goods_detail_info', array('goods_id'=>$output['goods_id']));?>"><?php echo $lang['sea_goods_viewed_product'];?>&gt;&gt;</a>
    <a href="<?php echo urlAdmin('sea_goods_online', 'edit_goods', array('commonid' => $_GET['commonid'], 'ref_url' => urlShop('store_goods_online', 'index')));?>"><?php echo $lang['store_goods_step3_edit_product'];?>&gt;&gt;</a>
  </strong>
  <div class="hr16"></div>
  <h4 class="ml10"><?php echo $lang['store_goods_step3_more_actions'];?></h4>
  <ul class="ml30">
    <li>1. <?php echo $lang['store_goods_step3_continue'];?> &quot; <a href="<?php echo urlAdmin('sea_goods_add', 'add_goods');?>"><?php echo $lang['store_goods_step3_release_new_goods'];?></a>&quot;</li>
  </ul>
</div>
