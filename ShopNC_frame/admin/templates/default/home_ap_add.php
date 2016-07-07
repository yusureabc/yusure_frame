<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['adv_index_manage'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=home_ad&op=home_ad"><span><?php echo $lang['ap_manage'];?></span></a></li>
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['ap_add'];?></span></a><em></em></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="link_form" enctype="multipart/form-data" method="post">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="ap_name"><?php echo $lang['ap_name'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" name="ap_name" id="ap_name" class="txt">
            </td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><?php echo $lang['ap_is_use'];?>:</td>
        </tr>
        <tr class="noborder">
			<td class="vatop rowform"><ul>
              <li>
                <input name="is_use" type="radio" value="1" checked="checked">
                <label><?php echo $lang['ap_use_s'];?></label>
              </li>
              <li>
                <input type="radio" name="is_use" value="0">
                <label><?php echo $lang['ap_not_use_s'];?></label>
              </li>
            </ul></td>
          <td class="vatop tips"></td>
        </tr>
      </tbody>
   
      <tbody id="ap_width_media">
        <tr>
          <td colspan="2" class="required"><label class="validation" for="ap_sort"><?php echo $lang['ap_sort'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="" name="ap_sort"  class="txt" id="ap_sort"></td>
          <td class="vatop tips"><?php echo $lang['adv_pix'];?></td>
        </tr>
      </tbody>
      <tfoot>
        <tr class="tfoot">
          <td colspan="15" ><a href="JavaScript:void(0);" class="btn" id="submitBtn"><span><?php echo $lang['nc_submit'];?></span></a></td>
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