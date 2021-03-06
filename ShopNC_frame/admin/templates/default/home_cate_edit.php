<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['cate_manage'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=home_ad&op=ad_list&type=<?php echo $output['type'];?>&ap_id=<?php echo $output['ap_id'];?>" ><span><?php echo $lang['nc_manage'];?></span></a></li>
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['class_edit'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="class_edit_form" enctype="multipart/form-data" method="post">
    <input type="hidden" name="form_submit" value="ok" />
      <input type="hidden" name="ap_id" value="<?php echo $output['ap_id'];?>" />
      <input type="hidden" name="adv_id" value="<?php echo $output['adv_id'];?>" />
       <input type="hidden" name="type" value="<?php echo $output['type'];?>" />
    <table class="table tb-type2 nobdb">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="cate_title"> <?php echo $lang['cate_title'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['cate_info']['adv_content']['class_title']?>" name="cate_title" id="cate_title" class="txt"></td>
        </tr>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="class_linkurl"> <?php echo $lang['class_linkurl'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
          <input id="class_linkurl" name="class_linkurl" type="text" class="txt" value="<?php echo $output['cate_info']['adv_content']['class_linkurl'];?>">
          </td>
           <tr>
          <td colspan="2" class="required"><label for="class_pic"><?php echo $lang['class_pic'];?>:</label></td>
        </tr>
         <tr class="noborder">
          <td class="vatop rowform"><span class="type-file-show"><img class="show_image" src="<?php echo ADMIN_TEMPLATES_URL;?>/images/preview.png">
            <div class="type-file-preview"><img src="<?php echo UPLOAD_SITE_URL.'/home/'.$output['cate_info']['adv_content']['class_pic'];?>"></div>
            </span> <span class="type-file-box">
            <input name="class_pic" type="file" class="type-file-file" id="class_pic" size="30">
            </span>
          </td>
          <td class="vatop tips"><?php echo $lang['link_add_sign'];?></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label  class="validation" for="class_sort"><?php echo $lang['nc_sort'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" name="class_sort" id="class_sort" class="txt" value="<?php echo $output['cate_info']['adv_content']['class_sort'];?>"></td>
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
    if($("#class_edit_form").valid()){
     $("#class_edit_form").submit();
	}
	});
});
//
$(document).ready(function(){
  $('#class_edit_form').validate({
        errorPlacement: function(error, element){
      error.appendTo(element.parentsUntil('tr').parent().prev().find('td:first'));
        },
        rules : {
            cate_title : {
                required : true
            },
            class_linkurl : {
               required : true
            },
            class_sort : {
                required : true,
                number:true
            },
        },
        messages : {
            cate_title : {
                required : '<?php echo $lang['cate_title_null'];?>'
            },
            class_linkurl : {
               required : '<?php echo $lang['class_linkurl_null']?>'
            },
            class_sort : {
                required : '<?php echo $lang['class_sort_null'];?>',
                number : '<?php echo $lang['class_sort_number'];?>'

            },
        }
    });
});
</script> 
<script type="text/javascript">
$(function(){
    var textButton="<input type='text' name='textfield' id='textfield1' class='type-file-text' /><input type='button' name='button' id='button1' value='' class='type-file-button' />"
	$(textButton).insertBefore("#class_pic");
	$("#class_pic").change(function(){
	$("#textfield1").val($("#class_pic").val());
});
});
</script>
