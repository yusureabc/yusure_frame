<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['account_syn'];?></h3>
      <?php echo $output['top_link'];?>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <?php if ($output['is_exist']){?>
  <form method="post" name="settingForm">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><?php echo $lang['parent_isuse'];?>:</td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform onoff"><label for="parent_isuse_1" class="cb-enable <?php if($output['list_setting']['parent_isuse'] == '1'){ ?>selected<?php } ?>" title="<?php echo $lang['parent_isuse_open'];?>"><span><?php echo $lang['parent_isuse_open'];?></span></label>
            <label for="parent_isuse_0" class="cb-disable <?php if($output['list_setting']['parent_isuse'] == '0'){ ?>selected<?php } ?>" title="<?php echo $lang['parent_isuse_close'];?>"><span><?php echo $lang['parent_isuse_close'];?></span></label>
            <input type="radio" id="parent_isuse_1" name="parent_isuse" value="1" <?php echo $output['list_setting']['parent_isuse']==1?'checked=checked':''; ?>>
            <input type="radio" id="parent_isuse_0" name="parent_isuse" value="0" <?php echo $output['list_setting']['parent_isuse']==0?'checked=checked':''; ?>></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="parent_appkey" class="validation"><?php echo $lang['parent_appkey'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input id="parent_appkey" name="parent_appkey" value="<?php echo $output['list_setting']['parent_appkey'];?>" class="txt" type="text"></td>
          <td class="vatop tips">&nbsp;</td>
      </tbody>
      <tfoot>
        <tr class="tfoot">
          <td colspan="2" ><a href="JavaScript:void(0);" class="btn" onclick="document.settingForm.submit()"><span><?php echo $lang['nc_submit'];?></span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>
  <?php }else{ ?>
  <table class="table tb-type2">
    <tbody>
      <tr class="noborder">
        <td colspan="2" class="no_data"><?php echo $lang['parent_function_fail_tip']; ?></td>
      </tr>
    </tbody>
  </table>
  <?php }?>
</div>
