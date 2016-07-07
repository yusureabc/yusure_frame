<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['festival_setting_name'];?></h3>
      <ul class="tab-base">
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['festival_setting_set'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="link_form" method="post" enctype="multipart/form-data" name="settingForm">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2">
      <tbody>
        <!---节日标志-->
        <tr>
          <td colspan="2" class="required"><label for="festival_sign"><?php echo $lang['festival_sign'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <input type="text" name="festival_sign" id="festival_sign" class="txt" <?php if(!empty($output['festival_setting']['festival_sign'])) {?>value="<?php echo $output["festival_setting"]["festival_sign"];?>"<?php }?>>
          </td>
        </tr>

      <!--展示图片-->
        <tr>
          <td colspan="2" class="required"><label for="festival_image_file"><?php echo $lang['festival_image'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
          	<span class="type-file-show"> <img class="show_image" src="<?php echo ADMIN_TEMPLATES_URL;?>/images/preview.png">
            <div class="type-file-preview"><img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_MOBILE.'/festival/'.$output['festival_setting']['festival_image'];?>"></div>
            </span>
            <span class="type-file-box">
            <input name="festival_image_file" type="file" class="type-file-file" id="festival_image_file" size="30">
        </span>
        </td>
          <td class="vatop tips"><?php echo $lang['festival_notice'];?></td> 
        </tr>
        <!--链接路径-->
        <tr>
          <td colspan="2" class="required"><label for="festival_url"> <?php echo $lang['festival_url']?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <input type="text" name="festival_url" id="festival_url" class="txt" <?php if(!empty($output['festival_setting']['festival_url'])) {?>value="<?php echo $output["festival_setting"]["festival_url"];?>"<?php }?>>
          </td>
        </tr>
        <!--是否是节日-->
        <tr>
          <td colspan="2" class="required"><label class="validation"> <?php echo $lang['is_festival'];?></label></td>
        </tr>
        <tr>
        	<td colspan="2" class="required">
        		<input type="radio" name="is_festival" value="1" <?php if($output['festival_setting']['is_festival']) {?>checked<?php }?>/>是
        		<input type="radio" name="is_festival" value="0" <?php if(!$output['festival_setting']['is_festival']) {?>checked<?php }?>/>否
        	</td>
        </tr>
        <!--节日有效期-->
        <tr>
          <td colspan="2" class="required"><label for="festival_end_time"> <?php echo $lang['festival_end_time'];?></label></td>
        </tr>
        <tr>
        <td>
          <input class="txt date" type="text" value="<?php echo $output['festival_setting']['festival_end_time'];?>" id="festival_end_time" name="festival_end_time">
        </td>
        </tr>
      </tbody>
      <tfoot>
        <tr class="tfoot">
          <td colspan="2" ><a href="JavaScript:void(0);" class="btn" id="submitBtn"><span><?php echo $lang['nc_submit'];?></span></a></td>
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
$(document).ready(function(){
	$('#link_form').validate({
        errorPlacement: function(error, element){
        			error.appendTo(element.parentsUntil('tr').parent().prev().find('td:first'));
        },
        rules : {
             festival_url  : {
                url      : true
            }
        },
        messages : {
            festival_url  : {
                url      : '<?php echo $lang['festival_url_form'];?>'
            }
        }
    });
});
</script>
<style>
/*#festival_end_time{
  background: url(../images/input_date.gif) no-repeat 0 0; padding-left: 25px; width:70px;
}*/
 /* .date , .date:hover { background: url(../images/input_date.gif) no-repeat 0 0; padding-left: 25px; width:70px;}*/
</style>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/jquery.ui.js"></script> 
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/i18n/zh-CN.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/themes/ui-lightness/jquery.ui.css"  />
<script type="text/javascript">
$(function(){
    var textButton="<input type='text' name='festival_image' id='festival_image' class='type-file-text' /><input type='button' name='button' id='button1' value='' class='type-file-button' />"
	$(textButton).insertBefore("#festival_image_file");
	$("#festival_image_file").change(function(){
	$("#festival_image").val($("#festival_image_file").val());
});
  $('#festival_end_time').datepicker({dateFormat: 'yy-mm-dd'});
});
</script>
