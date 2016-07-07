<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['channel_column_index_nav'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=channel_column&op=channel_column" ><span><?php echo $lang['nc_manage'];?></span></a></li>
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['nc_new'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="channel_column_form" method="post">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2">
      <tbody>

        <tr>
          <td colspan="2" class="required"><label class="validation" for="channel_name"><?php echo $lang['channel_column_index_title'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="" name="channel_name" id="" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="channel_url"><?php echo $lang['channel_column_index_url'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="http://" name="channel_url" id="" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="channel_remark"><?php echo $lang['channel_column_index_remark'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><textarea name="channel_remark" id=""></textarea></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="channel_sort"><?php echo $lang['nc_sort'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="255" name="channel_sort" id="" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
      </tbody>
      <tfoot>
        <tr class="tfoot">
          <td colspan="15"><a href="JavaScript:void(0);" class="btn" id="submitBtn"><span><?php echo $lang['nc_submit'];?></span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<script>
//按钮先执行验证再提交表单
$(function(){$("#submitBtn").click(function(){
    if($("#channel_column_form").valid()){
     $("#channel_column_form").submit();
	}
	});
});
//
$(document).ready(function(){
	$('#channel_column_form').validate({
        errorPlacement: function(error, element){
			error.appendTo(element.parent().parent().prev().find('td:first'));
        },
        rules : {
            channel_name : {
                required : true
            },
            channel_sort:{
               number   : true
            }
        },
        messages : {
            channel_name : {
                required : '<?php echo $lang['channel_column_add_partner_null'];?>'
            },
            channel_sort  : {
                number   : '<?php echo $lang['channel_column_add_sort_int'];?>'
            }
        }
    });
});



</script>