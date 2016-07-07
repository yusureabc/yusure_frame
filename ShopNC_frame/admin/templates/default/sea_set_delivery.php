<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<script>
$(function(){
  //$('img[nctype="goods_image"]').attr('src',DEFAULT_GOODS_IMAGE);
  if($('img[nctype="goods_image"]').attr('src')==''){
    $('img[nctype="goods_image"]').attr('src',"<?php echo UPLOAD_SITE_URL.DS.ATTACH_COMMON.DS.'default_goods_image_60.gif';?>");
  }
});
</script>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['order_manage'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=sea_order&op=index" ><span><?php echo $lang['manage'];?></span></a></li>
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['set_delivery'];?></span></a></li>
      </ul>
    </div>
  </div>

  <div class="fixed-empty"></div>
<form method="get"  name="order_single" id="order_single">
  <table class="table tb-type2 nobdb">
  <?php if(count($output['order_info']) <= 0){ ?>
      <tbody>
      <tr class="no_data">
        <td colspan="15"><?php echo $lang['nc_no_record'];?></td>
      </tr>
      </tbody>
      <?php }else{?>
    <tbody>
      <tr class="thead">
        <td colspan="2"><div style="float:left;"><?php echo $lang['order_sn'].':'.$output['order_info']['order_sn'];?></div><div style="float:left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><div style="float:left;position:relative"><?php 
        $add_time = $output['order_info']['add_time'];
        echo $lang['order_time'].':'.date('Y-m-d H:i:s',$add_time);
        ?></div></td>
      </tr> 
    <?php foreach($output['goods_info'] as $key => $val){?>
      <tr class="hover">
        <td width="100px;"><img nctype="goods_image" src="<?php if($val['goods_image']==''){echo UPLOAD_SITE_URL.DS.ATTACH_COMMON.DS.'default_goods_image_60.gif';}else{echo UPLOAD_SITE_URL.'/'.SEA_GOODS.'/'.$val['goods_image'];}?><?php //echo sea_thumb($val,80); ?>"  width="100px" height="100px" alt="商品图片"/></td>
        <td><div><?php echo $val['goods_name'];?></div><div><?php echo $lang['RMB'].$val['goods_price'].' '.$lang['sign'].' '.$val['goods_num'].$lang['unit'];?></div></td>
      </tr> 
      <?php }?>
      <tr>
          <td colspan="2" class="tl bdl bdr" style="padding:8px" id="address"><strong class="fl"><?php echo $lang['store_deliver_buyer_adress'].$lang['nc_colon'];?></strong><span id="buyer_address_span"><?php echo $output['order_info']['extend_order_common']['reciver_name'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $output['order_info']['extend_order_common']['reciver_info']['phone'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $output['order_info']['extend_order_common']['reciver_info']['address'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $output['order_info']['extend_order_common']['reciver_info']['idcard'];?></span></td>
        </tr>
    </tbody>
    <?php }?>
   <tfoot>
        <tr class="tfoot">
          <td colspan="2">
            <div class="pagination"> </div></td>
        </tr>
      </tfoot>
  </table>
</form>
  <form id="set_delivery" method="post">
    <input type="hidden" name="form_submit" value="ok" />
    <input type="hidden" name="order_id" value="<?php echo $output['order_id'];?>" />
    <table class="table tb-type2 nobdb">
      <tbody>
      <tr class="noborder">
          <td colspan="2" ><label ><h3><?php echo $lang['shipping_set'];?></h3></label></td>
        </tr>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="gc_name"><?php echo $lang['logistics_company'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="" name="shipping_company" id="logic_company" maxlength="20" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="gc_name"><?php echo $lang['logistics_sn'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="" name="shipping_sn" id="logic_sn" maxlength="20" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="2"><a href="JavaScript:void(0);" class="btn" id="submitBtn"><span><?php echo $lang['nc_submit'];?></span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>
  
</div>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/jquery.ui.js"></script> 
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/i18n/zh-CN.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/themes/ui-lightness/jquery.ui.css"  />
<script type="text/javascript">
$(function(){
  $('#submitBtn').bind('click',function(){
    if($("#set_delivery").valid()){
      $('#set_delivery').submit();
    }
  })
});
$(document).ready(function(){
  $('#set_delivery').validate({
        errorPlacement: function(error, element){
      error.appendTo(element.parent().parent().prev().find('td:first'));
        },
        rules : {
            shipping_company : {
                required : true,
            },
            shipping_sn : {
              required : true
              //number   : true
            }
        },
        messages : {
            shipping_company : {
                required : '<?php echo $lang['shipping_null'];?>'
                //remote   : '<?php echo $lang['article_class_add_name_exists'];?>'
            },
            shipping_sn  : {
                required : '<?php echo $lang['shipping_sn_null'];?>'
               // number   : '<?php echo $lang['shipping_sn_null'];?>'
            }
        }
    });
});
</script> 

