<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['nc_name_set']?></h3>
    </div>
  </div>
  <div class="fixed-empty"></div>
  
  <form method="post" name="form_index" action="index.php?act=setting&op=name_setting">
    <input type="hidden" name="form_submit" value="ok" />
	<span style="display:none" nctype="hide_tag"><a>{sitename}</a></span>
    <table class="table tb-type2">
      <tbody>
        <tr class="noborder">
          <td class="w96"><?php echo $lang['pay_money_name'];?></td><td class="w150"><input id="pay_money_name" name="pay_money_name" value="<?php echo $output['pay_money_name'];?>" type="text"/></td><td class= 'tips'><span><?php echo $lang['pay_money_name_info'];?></span></td>
        </tr>
        <tr class="noborder">
          <td class="w96"><?php echo $lang['trans_money_name'];?></td><td class="w150"><input id="trans_money_name" name="trans_money_name" value="<?php echo $output['trans_money_name'];?>" type="text" maxlength="200" /></td><td class= 'tips'><span><?php echo $lang['trans_money_name_info'];?></span></td>
        </tr>
        <tr class="noborder">
        	<td class="w96"><?php echo $lang['is_addpostage']; ?></td>
            <td class="w150">
        		<select name="postage" class="w150">
        			<option value="0" <?php if($output['is_addpostage']<1)  echo  "selected"; ?>><?php echo $lang['open_no']; ?></option>
        			<option value="1" <?php if($output['is_addpostage']>0)  echo  "selected"; ?>><?php echo $lang['open_yes']; ?></option>
        		</select>
            </td>
        	<td class= 'tips'><span>计算平台收益时，是否将邮费也算入到佣金比例的范畴中</span></td>
        </tr>
        <tr class="noborder">
          <td class="w96"><?php echo $lang['get_cash_condition']?></td>
          <td class="w150">
          	<input id="min_consume" name="min_consume" value="<?php echo $output['min_consume']?>" type="text"/>
          </td>
          <td class= 'tips'><span><?php echo $lang['get_cash_condition_tip'];?></span></td>
        </tr>
      </tbody>
      <tfoot>
        <tr class="tfoot">
          <td colspan="2" ><a href="JavaScript:void(0);" class="btn" onclick="document.form_index.submit()"><span><?php echo $lang['nc_submit'];?></span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>
	<div id="tag_tips">
	<span class="dialog_title"><?php echo $lang['seo_set_insert_tips'];?></span>
	<div style="margin: 0px; padding: 0px;line-height:25px;"></div>
	</div>
</div>
<style>
#tag_tips{
	padding:4px;border-radius: 2px 2px 2px 2px;box-shadow: 0 0 4px rgba(0, 0, 0, 0.75);display:none;padding: 4px;width:300px;z-index:9999;background-color:#FFFFFF;
}
.dialog_title {
    background-color: #F2F2F2;
    border-bottom: 1px solid #EAEAEA;
    color: #666666;
    display: block;
    font-weight: bold;
    line-height: 14px;
    padding: 5px;
}
</style>