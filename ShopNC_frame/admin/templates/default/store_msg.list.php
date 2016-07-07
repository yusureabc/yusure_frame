<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['msg_setting'];?></h3>
      <ul class="tab-base">
      <li><a href="index.php?act=store_msg&op=msg_setting"><span><?php echo $lang['msg_setting']?></span></a></li>
      <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['msg_recharge_log'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form method="get" name="formSearch" id="formSearch">
    <input type="hidden" value="store_msg" name="act">
    <input type="hidden" value="msg_list" name="op">
    <table class="tb-type1 noborder search">
      <tbody>
        <tr>
          <th><label><?php echo $lang['msg_store_name']; ?></label></th>
          <td><input type="text" name="store_name" class="txt" value='<?php echo $_GET['store_name'];?>'></td><th><?php echo $lang['recharge_time']; ?></th>
          <td><input type="text" id="stime" name="stime" class="txt date" value="<?php echo $_GET['stime'];?>" >
            <label>~</label>
            <input type="text" id="etime" name="etime" class="txt date" value="<?php echo $_GET['etime'];?>" ></td><td></td>
          </tr><tr>
          <th><label><?php echo $lang['msg_member_name']; ?></label></th><td><input type="text" name="member_name" class="txt" value='<?php echo $_GET['member_name'];?>'></td>　　
          <td><a href="javascript:void(0);" id="ncsubmit" class="btn-search " title="<?php echo $lang['nc_query'];?>">&nbsp;</a>
              <?php if( $_GET['store_name'] || $_GET['stime'] || $_GET['etime'] || $_GET['member_name'] ){?>
              <a href="index.php?act=store_msg&op=msg_list" class="btns "><span><?php echo $lang['nc_cancel_search']?></span></a>
              <?php }?>
            </td>
        </tr>
      </tbody>
    </table>
  </form>
  <table class="table tb-type2" id="prompt">
    <tbody>
      <tr class="space odd">
        <th colspan="12"><div class="title"><h5><?php echo $lang['nc_prompts'];?></h5><span class="arrow"></span></div></th>
      </tr>
      <tr>
        <td>
        <ul>
            <li><?php echo $lang['msg_show_rechargelog']; ?></li>
          </ul></td>
      </tr>
    </tbody>
  </table>
  <table class="table tb-type2">
    <thead>
      <tr class="thead">
        <th><?php echo $lang['msg_store_name']; ?></th>
        <th><?php echo $lang['msg_member_name']; ?></th>
        <th class="align-center"><?php echo $lang['msg_recharge_money']; ?></th>
        <th class="align-center"><?php echo $lang['recharge_num']; ?></th>
        <th class="align-center"><?php echo $lang['recharge_time']; ?></th>
        <th><?php echo $lang['recharge_type']; ?></th>
        <th><?php echo $lang['recharge_result']; ?></th>
      </tr>
    </thead>
    <tbody>
      <?php if(!empty($output['msg_log']) && is_array($output['msg_log'])){ ?>
      <?php foreach($output['msg_log'] as $k => $v){?>
      <tr class="hover">
        <td><?php echo $v['store_name'];?></td>
        <td><?php echo $v['member_name'];?></td>
        <td class="align-center"><?php echo $v['recharge_money'];?></td>
        <td class="align-center"><?php echo $v['recharge_num'];?></td>
        
        <td class="nowrap align-center"><?php echo @date('Y-m-d H:i:s',$v['recharge_time']);?></td>
        <td>
          <?php 
          $recharge_type_arr = array( 
            'predeposit' => '预付款', 
            'alipay' => '支付宝', 
            'chinabank' => '网银在线',
            'allinpay' => '通联支付',
            'wxpay' => '微信支付'
              ); 
          echo $recharge_type_arr[$v['recharge_type']];
          ?>
          </td>
          <td>
            <?php 
              $recharge_res = array( 0 => '未支付', 10=>'已支付' ); 
              echo $recharge_res[$v['recharge_result']];
            ?>
          </td>
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
<script>
  $(function() {
    $('#stime').datepicker({dateFormat: 'yy-mm-dd'});
    $('#etime').datepicker({dateFormat: 'yy-mm-dd'});
    $("#ncsubmit").click( function(){
        $("#formSearch").submit();
    });
  });
</script>
