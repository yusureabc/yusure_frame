<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['adv_index_manage'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=nc_ad&op=home_ad"><span><?php echo $lang['ap_manage'];?></span></a></li>
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['ap_change'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="link_form" enctype="multipart/form-data" method="post" name="form1">
    <input type="hidden" name="ref_url" value="<?php echo $output['ref_url'];?>" />
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2 nobdb">
      <?php foreach($output['ap_list'] as $k => $v){ ?>
      <input type="hidden" name="ap_class" value="<?php echo $v['ap_class']; ?>" />
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="ap_name"><?php echo $lang['ap_name'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" name="ap_name" id="ap_name" class="txt" value="<?php echo $v['ap_name'];?>"></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label><?php echo $lang['ap_is_use'];?>:</label></td>
        </tr>
         <tr class="noborder">
          <td class="vatop rowform"><ul>
              <li>
                <input type="radio" id="is_use_1" name="is_use" value="1" <?php if($v['is_use'] == '1'){echo "checked";}?>>
                <label for="is_use_1"><?php echo $lang['ap_use_s'];?></label>
              </li>
              <li>
                <input type="radio" id="is_use_0" name="is_use" value="0" <?php if($v['is_use'] == '0'){echo "checked";}?>>
                <label for="is_use_0"><?php echo $lang['ap_not_use_s'];?></label>
              </li>
            </ul></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label class="validation"><?php echo $lang['ap_sort'];?>:</label></td>
        </tr>
         <tr class="noborder">
          <td class="vatop rowform">
          	<input type="text" value="<?php echo $v['ap_sort'];?>" name="ap_sort" id="ap_sort">
          </td>
          <td class="vatop tips"></td>
        </tr>
      </tbody>
      <?php }?>
      <tfoot>
        <tr class="tfoot">
          <td colspan="15">
          <a href="JavaScript:void(0);" class="btn" id="submitBtn"><span><?php echo $lang['adv_change'];?></span></a>
          </td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<script>
//按钮先执行验证再提交表单
$(function(){$("#submitBtn").click(function(){
	    if($("#link_form").valid()){
	     $("#link_form").submit();
	}
	});
});
//
$(document).ready(function(){

	$('#link_form').validate({
        errorPlacement: function(error, element){
			error.appendTo(element.parent().parent().prev().find('td:first'));
        },
        rules : {
        	ap_name : {
                required : true
            },
	ap_sort : {
              required : true,
              number   : true
            }
        },
        messages : {
        	ap_name : {
                required : '<?php echo $lang['ap_can_not_null']; ?>'
            },
            ap_sort : {
              required : '<?php echo $lang['ap_sort_not_null'];?>',
               number   : '<?php echo $lang['ap_sort_int'];?>'
            }
           
        }
    });
});
</script>