<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['currency_admin'];?></h3>
      <ul class="tab-base">
      <li><a href="index.php?act=currency&op=addcurrency"><span><?php echo $lang['nc_manage']?></span></a></li>
      <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['currency_detailed'];?></span></a></li>
      <li><a href="index.php?act=currency&op=pb_cash_list"><span><?php echo $lang['currency_deposit']?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form method="get" name="formSearch" id="formSearch">
    <input type="hidden" name="act" value="currency">
    <input type="hidden" name="op" value="currencylog">
    <table class="tb-type1 noborder search">
      <tbody>
        <tr>
          <th><label><?php echo $lang['admin_points_membername']; ?></label></th>
          <td><input type="text" name="mname" class="txt" value='<?php echo $_GET['mname'];?>'></td><th><?php echo $lang['admin_points_addtime']; ?></th>
          <td><input type="text" id="stime" name="stime" class="txt date" value="<?php echo $_GET['stime'];?>" >
            <label>~</label>
            <input type="text" id="etime" name="etime" class="txt date" value="<?php echo $_GET['etime'];?>" ></td><td></td>

          <td><a href="javascript:void(0);" id="ncsubmit" class="btn-search " title="<?php echo $lang['nc_query'];?>">&nbsp;</a>
          
            <?php if($_GET['mname'] || $_GET['stime'] || $_GET['etime']){?>
            <a href="index.php?act=currency&op=currencylog" class="btns "><span><?php echo $lang['nc_cancel_search']?></span></a>
            <?php }?></td>
        </tr>
      </tbody>
    </table>
  </form><div style="text-align:right;"><a class="btns" href="javascript:void(0);" id="ncexport"><span><?php echo $lang['nc_export'];?>Excel</span></a></div>
  <table class="table tb-type2" id="prompt">
    <tbody>
      <tr class="space odd">
        <th colspan="12"><div class="title"><h5><?php echo $lang['nc_prompts'];?></h5><span class="arrow"></span></div></th>
      </tr>
      <tr>
        <td>
        <ul>
            <li><?php echo $lang['currency_prompt'];?></li>
          </ul></td>
      </tr>
    </tbody>
  </table>
  <table class="table tb-type2">
    <thead>
      <tr class="thead">
        <th><?php echo $lang['admin_points_membername']; ?></th>
        <th><?php echo $lang['admin_points_adminname']; ?></th>
        <th class="align-center"><?php echo $lang['currency_change']; ?></th>
        <th class="align-center"><?php echo $lang['admin_points_addtime']; ?></th>
        <th class="align-center"><?php echo $lang['admin_points_stage']; ?></th>
        <th><?php echo $lang['admin_points_pointsdesc']; ?></th>
      </tr>
    </thead>
    <tbody>
      <?php if(!empty($output['pb_log']) && is_array($output['pb_log'])){ ?>
      <?php foreach($output['pb_log'] as $k => $v){?>
      <tr class="hover">
        <td><?php echo $v['pb_member_name'];?></td>
        <td><?php echo $v['pb_admin_name'];?></td>
        <td class="align-center"><?php echo $v['pb_av_amount'];?></td>
        <td class="nowrap align-center"><?php echo @date('Y-m-d',$v['pb_add_time']);?></td>
        <td class="align-center"><?php 
				switch ($v['pb_type']){
              		case 'admin_change':      // 管理员后台操作
              			echo $lang['admin_change'];
              			break;
                  case 'ideal_order_pay':   // 虚拟货币支付订单
                    echo $lang['ideal_order_pay'] ;
                  break;
                  case 'give_customer':     // 店员送顾客
                    echo $lang['give_customer'];
                  break;
                  case 'pb_apply_cash':     // 品币提现
                    echo $lang['pb_apply_cash'];
                  break;
              		# 后续会增加方式               		
	          }?></td>
        <td><?php echo $v['pb_desc'];?></td>
      </tr>
      <?php } ?>
      <?php }else { ?>
      <tr class="no_data">
        <td colspan="15"><?php echo $lang['nc_no_record'];?></td>
      </tr>
      <?php } ?>
    </tbody>
    <tfoot>
      <tr class="tfoot">
        <td colspan="15"><div class="pagination"> <?php echo $output['show_page'];?> </div></td>
      </tr>
    </tfoot>
  </table>
</div>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/jquery.ui.js"></script> 
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/i18n/zh-CN.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/themes/ui-lightness/jquery.ui.css"  />
<script language="javascript">
$(function(){
	$('#stime').datepicker({dateFormat: 'yy-mm-dd'});
	$('#etime').datepicker({dateFormat: 'yy-mm-dd'});
    $('#ncexport').click(function(){
    	$('input[name="op"]').val('export_step1');
    	$('#formSearch').submit();
    });
    $('#ncsubmit').click(function(){
    	$('input[name="op"]').val('currencylog');$('#formSearch').submit();
    });
});
</script>
