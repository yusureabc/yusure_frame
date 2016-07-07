<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<link href="<?php echo ADMIN_TEMPLATES_URL;?>/css/point_seller_center.css" rel="stylesheet" />
<link href="<?php echo ADMIN_TEMPLATES_URL;?>/css/font/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/dialog/dialog.js" id="dialog_js" charset="utf-8"></script> 
<div class="page">
<div class="fixed-bar">
    <div class="item-title">
      <h3 style="font-size:15px;font-weight: bold;"><?php echo $lang['point_transport_manage'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=point_transport&op=point_transport_list&type=<?php echo $_GET['type'];?>" ><span><?php echo $lang['transport_manage'];?></span></a></li>
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['add_transport'];?></span></a></li>
      </ul>
    </div>
  </div>
   <div class="fixed-empty"></div>
  <form method="post" id="tpl_form" name="tpl_form" action="index.php?act=point_transport&op=save">
    <input type="hidden" name="transport_id" value="<?php echo $output['transport']['id'];?>" />
    <input type="hidden" name="form_submit" value="ok" />
    <input type="hidden" name="type" value="<?php echo $_GET['type'];?>">
    <table class="table tb-type2 nobdb">
    <tbody>
    <tr>
      <td width="60">
        <label for="J_TemplateTitle" class="label-like"><?php echo $lang['transport_title'].$lang['nc_colon'];?></label>
      </td>
      <td>
        <input type="text"  class="txt" autocomplete="off"  value="<?php echo $output['transport']['title'];?>" name="title" id="ptitle">
        <p class="J_Message" style="display:none" error_type="title"><i class="icon-exclamation-sign"></i><?php echo $lang['transport_tpl_name_note'];?></p>
      </td>
    </tr>
</tbody>
<tbody>
    <tr>
      <td><?php echo $lang['transport_type'].$lang['nc_colon'];?></td>
      <td><?php echo $lang['transport_info']?></td>
    </tr>
    <!--  ---------------------POST begin-------------------------------------  -->
    <tr>
      <dt></dt>
      <td class="trans-line" colspan="2">
      </td>
    </tr>
</tbody>
<tfoot>
<tr class="tfoot">
     <td> <label><input type="submit" id="submit_tpl" class="btn" value="<?php echo $lang['transport_tpl_save'];?>" /></label></td>
  </tr>
    </div>
</tfoot>
</table>
  </form>
  <div class="ks-ext-mask" style="position: fixed; left: 0px; top: 0px; width: 100%; height: 100%; z-index: 999; display:none"></div>
  <div id="dialog_areas" class="dialog-areas" style="display:none">
    <div class="ks-contentbox">
      <div class="title"><?php echo $lang['transport_tpl_select_area'];?><a class="ks-ext-close" href="javascript:void(0)">X</a></div>
      <form method="post" >
        <ul id="J_CityList">
          <?php require(template('point_transport_area_'.(strtolower(CHARSET)=='utf-8'?'utf-8':'gbk')));?>
        </ul>
        <div class="bottom"> <a href="javascript:void(0);" class="J_Submit ncsc-btn ncsc-btn-green"><?php echo $lang['transport_tpl_ok'];?></a> <a href="javascript:void(0);" class="J_Cancel ncsc-btn"><?php echo $lang['transport_tpl_cancel'];?></a> </div>
      </form>
    </div>
  </div>
  <div id="dialog_batch" class="dialog-batch" style="z-index: 9999; display:none">
    <div class="ks-contentbox">
      <div class="title"><?php echo $lang['transport_tpl_pl_op'];?><a class="ks-ext-close" href="javascript:void(0)">X</a></div>
      <form method="post" style="padding:20px 20px 10px 20px;">
        <div class="batch"><?php echo $lang['transport_note_1'].$lang['nc_colon'];?>
        <input class="w60 mr5 text" type="text" maxlength="4" autocomplete="off" data-field="start" value="1" name="express_start">
        <?php echo $lang['transport_note_2'];?>
        <input class="w60 text" type="text" maxlength="6" autocomplete="off" value="0.00" name="express_postage" data-field="postage"><em class="add-on"> <i class="icon-renminbi"></i> </em><?php echo $lang['transport_note_3'];?>
        <input class="w60 mr5 text" type="text" maxlength="4" autocomplete="off" value="1" data-field="plus" name="express_plus">
        <?php echo $lang['transport_note_4'];?>
        <input class="w60 text" type="text" maxlength="6" autocomplete="off" value="0.00" data-field="postageplus" name="express_postageplus"><em class="add-on"> <i class="icon-renminbi"></i> </em></div>
        <div class="J_DefaultMessage"></div>
        <div class="bottom"> <a href="javascript:void(0);" class="J_SubmitPL ncsc-btn ncsc-btn-green"><?php echo $lang['transport_tpl_ok'];?></a> <a href="javascript:void(0);" class="J_Cancel ncsc-btn"><?php echo $lang['transport_tpl_cancel'];?></a> </div>
      </form>
    </div>
  </div>
</div>
<script src="<?php echo RESOURCE_SITE_URL;?>/js/point_transport.js"></script> 
<script>
$(function(){
	$('.trans-line').append(TransTpl.replace(/TRANSTYPE/g,'kd'));
	$('.tbl-except').append(RuleHead);
	<?php if (is_array($output['extend'])){?>
	<?php foreach ($output['extend'] as $value){?>

		<?php if ($value['is_default']==1){?>
			var cur_tr = $('.tbl-except').prev();
			$(cur_tr).find('input[data-field="start"]').val('<?php echo $value['snum'];?>');
			$(cur_tr).find('input[data-field="postage"]').val('<?php echo $value['sprice'];?>');
			$(cur_tr).find('input[data-field="plus"]').val('<?php echo $value['xnum'];?>');
			$(cur_tr).find('input[data-field="postageplus"]').val('<?php echo $value['xprice'];?>');							

		<?php }else{?>
			StartNum +=1;
			cell = RuleCell.replace(/CurNum/g,StartNum); 
			cell = cell.replace(/TRANSTYPE/g,'kd');
			$('.tbl-except').find('table').append(cell);
			$('.tbl-attach').find('.J_ToggleBatch').css('display','').html('<?php echo $lang['transport_tpl_pl_op'];?>');

			var cur_tr = $('.tbl-except').find('table').find('tr:last');
			$(cur_tr).find('.area-group>p').html('<?php echo $value['area_name'];?>');
			$(cur_tr).find('input[type="hidden"]').val('<?php echo trim($value['area_id'],',');?>|||<?php echo $value['area_name'];?>');
			$(cur_tr).find('input[data-field="start"]').val('<?php echo $value['snum'];?>');
			$(cur_tr).find('input[data-field="postage"]').val('<?php echo $value['sprice'];?>');
			$(cur_tr).find('input[data-field="plus"]').val('<?php echo $value['xnum'];?>');
			$(cur_tr).find('input[data-field="postageplus"]').val('<?php echo $value['xprice'];?>');

		<?php }?>
	<?php }?>
	<?php }?>
});
</script>
