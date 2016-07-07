<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['notice_manage'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=home_ad&op=ad_list&type=<?php echo $output['type'];?>&ap_id=<?php echo $output['ap_id'];?>" ><span><?php echo $lang['notice_manage'];?></span></a></li>
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['notice_edit'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="notice_edit_form" enctype="multipart/form-data" method="post">
    <input type="hidden" name="form_submit" value="ok" />
      <input type="hidden" name="ap_id" value="<?php echo $output['ap_id'];?>" />
      <input type="hidden" name="adv_id" value="<?php echo $output['adv_id'];?>" />
      <input type="hidden" name="type" value="<?php echo $output['type'];?>" />
    <table class="table tb-type2 nobdb">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="notice_title"> <?php echo $lang['notice_title'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['cate_info']['adv_content']['notice_title']?>" name="notice_title" id="notice_title" class="txt"></td>
        </tr>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="notice_linkurl"> <?php echo $lang['notice_linkurl'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
          <input id="notice_linkurl" name="notice_linkurl" type="text" class="txt" value="<?php echo $output['cate_info']['adv_content']['notice_linkurl'];?>">
          </td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label class="validation" for="notice_sort"><?php echo $lang['notice_sort'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" name="notice_sort" id="notice_sort" class="txt" value="<?php echo $output['cate_info']['adv_content']['notice_sort'];?>"></td>
          <td class="vatop tips"><?php echo $lang['link_add_sort_tip'];?></td>
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
    if($("#notice_edit_form").valid()){
     $("#notice_edit_form").submit();
	}
	});
});
//
$(document).ready(function(){
  $('#notice_edit_form').validate({
        errorPlacement: function(error, element){
      error.appendTo(element.parentsUntil('tr').parent().prev().find('td:first'));
        },
        rules : {
            notice_title : {
                required : true
            },
            notice_linkurl : {
               required : true
            },
            notice_sort : {
                required : true,
                number:true
            }
        },
        messages : {
            notice_title : {
                required : '<?php echo $lang['notice_title_null'];?>'
            },
            notice_linkurl : {
               required : '<?php echo $lang['notice_linkurl_null'];?>'
            },
            notice_sort : {
                required : '<?php echo $lang['notice_sort_null'];?>',
                number : '<?php echo $lang['notice_sort_number'];?>'
            },
        }
    });
});
</script> 
