<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['nc_member_predepositmanage'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=currency&op=pb_cash_list"><span><?php echo $lang['currency_deposit']?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form method="post" id="pdform" action="index.php">
  	<input type="hidden" name="act" value="currency">
  	<input type="hidden" name="op" value="pb_cash_refuse" >
  	<input type="hidden" name="flags" value="<?php echo $output['info']['pb_id'];?>">
    <table class="table tb-type2 nobdb">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label><?php echo $lang['admin_predeposit_sn'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><?php echo $output['info']['pb_sn']; ?></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label><?php echo $lang['admin_predeposit_membername'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><?php echo $output['info']['pb_member_name']; ?></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label><?php echo $lang['admin_predeposit_cash_price'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><?php echo $output['info']['pb_money']; ?>&nbsp;<?php echo $lang['currency_zh'];?></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label><?php echo $lang['admin_predeposit_cash_shoukuanbank']; ?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><?php echo $output['info']['pb_bank_name']; ?></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label><?php echo $lang['admin_predeposit_cash_shoukuanaccount'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><?php echo $output['info']['pb_bank_no']; ?></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label><?php echo $lang['admin_predeposit_cash_shoukuanname']?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><?php echo $output['info']['pb_bank_user']; ?></td>
          <td class="vatop tips"></td>
        </tr>
        <?php if (intval($output['info']['pb_payment_time'])) {?>
        <tr>
          <td colspan="2" class="required"><label><?php echo $lang['admin_predeposit_paytime']; ?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><?php echo @date('Y-m-d',$output['info']['pdc_payment_time']); ?> 
          ( <?php echo $lang['admin_predeposit_adminname'];?>: <?php echo $output['info']['pdc_payment_admin'];?> ) </td>
          <td class="vatop tips"></td>
        </tr>
        <?php } ?>

         <tr>
          <td colspan="2" class="required"><label><?php echo $lang['pd_memo']?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><textarea id="contents" name="contents"><?php echo $output['info']['memo'];?></textarea></td>
          <td class="vatop tips"><font color="red"><?php echo $lang['pd_tip']?></font></td>
        </tr>
      </tbody>
      <?php if (!intval($output['info']['pb_payment_state'])) {?>
        <tfoot id="submit-holder">
        <tr class="tfoot">
        <td colspan="2">
	        <a class="btn" href="javascript:if (confirm('<?php echo $lang['admin_predeposit_cash_confirm'];?>')){window.location.href='index.php?act=currency&op=pb_cash_pay&id=<?php echo $output['info']['pb_id']; ?>';}else{}"><span><?php echo $lang['recharge_pass'];?></span></a>
	        <a class="btn" href="javascript:void(0)" onclick="checkinfo();"><span><?php echo $lang['recharge_refuse'];?></span></a>
        </td>
        </tr>
        </tfoot>
     <?php } ?>
    </table>
    </form>
</div>
<script>
	function checkinfo(){
		var memo=$("#contents").val();
		if(memo==""){
				alert("对不起，请在'备注'处填写拒绝原因");
				return false;
		}else{
			if(confirm("您确定要拒绝提现申请吗？")){
				$("#pdform").submit();
			}else{
				return false;
			}
			
		}
	}

</script>