<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['store_service'];?></h3>
      <ul class="tab-base">
         <li><a href="index.php?act=o2o_store_service&op=service_list"><span><?php echo $lang['manage'];?></span></a></li>
        <li><a href="index.php?act=o2o_store_service&op=service_add"><span><?php echo $lang['nc_admin_srevice_add'];?></span></a></li>
        <li><a href="index.php?act=o2o_store_service&op=reason_list"><span><?php echo $lang['nc_admin_reason_list'];?></span></a></li>
        <li><a href="index.php?act=o2o_store_service&op=reason_add" ><span><?php echo $lang['nc_admin_add_reason'];?></span></a></li>
        <li><a href="javascript:void(0);" class="current"><span><?php echo $lang['nc_admin_reason_edit'];?></span></a></li>

      </ul>
    </div>
  </div>
  <?php $reason_type = array( '1' => '拒绝订单', '2' => '拒绝预约' ); ?>
  <div class="fixed-empty"></div>
  <form id="add_form" method="post" enctype="multipart/form-data">
    <input type="hidden" name="reason_id" value="<?php echo $output['reason_info']['reason_id']; ?>" />
    <table class="table tb-type2">
      <tbody>
      <!-- 原因类型 -->
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="reason_type"><?php echo $lang['nc_admin_reason_method'].$lang['nc_colon'];?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <select name="reason_type">
              <option>请选择</option>
              <?php foreach ( $reason_type as $k => $v ) { ?>
              <option value="<?php echo $k; ?>"  <?php if ( $output['reason_info']['reason_type'] == $k ) { echo 'selected'; } ?> > <?php echo $v; ?> </option>
              <?php }?>
            </select>
          </td>
          <td class="vatop tips"><?php echo $lang['class_name_error'];?></td>
        </tr>
      <!-- 原因内容 -->
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="reason_content"><?php echo $lang['nc_admin_quick_reason'].$lang['nc_colon'];?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text"  name="reason_content" id="reason_content" value="<?php echo $output['reason_info']['reason_content']; ?>" class="txt"></td>
          <td class="vatop tips"><?php echo $lang['class_name_error'];?></td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="2"><a id="submit" href="javascript:void(0)" class="btn"><span><?php echo $lang['nc_save'];?></span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<script type="text/javascript">
$(document).ready(function(){



    $("#submit").click(function(){
        $("#add_form").submit();
    });



    $('#add_form').validate({
        errorPlacement: function(error, element){
            error.appendTo(element.parent().parent().prev().find('td:first'));
        },
        success: function(label){
            label.addClass('valid');
        },
        rules : {
            reason_type: {
                required : true,
                number : true,
            },
            reason_content: {
                required : true,
            }
        },
        messages : {
            reason_type: {
                required : '请选择原因类型',
                number : '请选择原因类型',
            },
            reason_content: {
                required : '请填写原因内容',
            }
        }
    });
});
</script> 
