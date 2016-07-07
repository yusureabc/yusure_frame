<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['fxad_index'];?></h3>
      <ul class="tab-base">
        <li><a href="<?php echo urlAdmin("adv","fxarea_adlist")?>"><span><?php echo $lang['ap_manage'];?></span></a></li>
        <li><a href="javascript:void(0);"  class="current"><span><?php echo $lang['fxad_add'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="adv_form" enctype="multipart/form-data" method="post" name="advForm">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="fx_name"><?php echo $lang['fxad_title'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" name="fx_name" id="fx_name" class="txt" value=""></td>
          <td class="vatop tips"></td>
        </tr>
        
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="fx_goodsid"><?php echo $lang['fxad_goodsid'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" name="fx_goodsid" id="fx_goodsid" class="txt" value=""></td>
          <td class="vatop tips"><?php echo $lang['fxad_id_prompt'];?></td>
        </tr>
        
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="fx_price"><?php echo $lang['fxad_price'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" name="fx_price" id="fx_price" class="txt" value=""></td>
          <td class="vatop tips"></td>
        </tr>
        
        <tr id="adv_flash_url">
          <td colspan="2" class="required"><label for="fx_url"><?php echo $lang['fxad_url'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" name="fx_url" id="fx_url" class="txt" ></td>
          <td class="vatop tips"><?php echo $lang['adv_url_donotadd'];?></td>
        </tr>
        
        <tr id="adv_pic" >
          <input type="hidden" name="mark" value="0">
          <td colspan="2" class="required"><label for="fx_bthumb"><?php echo $lang['fxad_bupload'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><span class="type-file-show">
            <div class="type-file-preview"><img src="<?php echo UPLOAD_SITE_URL."/".ATTACH_ADV."/".$output['info']['bthumb'];?>" onload="javascript:DrawImage(this,500,500);"></div>
            </span><span class="type-file-box">
            <input type="file" class="type-file-file" id="fx_bthumb" name="fx_bthumb" size="30" />
            </span>
          <td class="vatop tips"><?php echo $lang['adv_edit_support'];?>gif,jpg,jpeg,png <?php echo $lang['fxad_bjtp_prompt'];?></td>
        </tr>
        
        <tr id="adv_pic" >
          <input type="hidden" name="mark" value="0">
          <td colspan="2" class="required"><label for="fx_sthumb"><?php echo $lang['fxad_supload'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><span class="type-file-show">
            <div class="type-file-preview"><img src="<?php echo UPLOAD_SITE_URL."/".ATTACH_ADV."/".$output['info']['sthumb'];?>" onload="javascript:DrawImage(this,500,500);"></div>
            </span><span class="type-file-box">
            <input type="file" class="type-file-file" id="fx_sthumb" name="fx_sthumb" size="30" />
            </span>
          <td class="vatop tips"><?php echo $lang['adv_edit_support'];?>gif,jpg,jpeg,png <?php echo $lang['fxad_sptu_prompt'];?></td>
        </tr>
        
        <tr>
          <td colspan="2" class="required"><?php echo $lang['fxad_bjys'];?></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input class="txt" name="fx_color" type="color" value="#FFFFFF"/></td>
          <td class="vatop tips"><span class="vatop rowform"><?php echo $lang['fxad_bjysyq'];?></span></td>
        </tr>
      </tbody>
      <tfoot>
        <tr class="tfoot">
          <td colspan="15"><a href="JavaScript:void(0);" class="btn" onclick="document.advForm.submit()"><span><?php echo $lang['nc_submit'];?></span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<script type="text/javascript">
$(function(){
	var textButton="<input type='text' name='textfield' id='textfield1' class='type-file-text' /><input type='button' name='button' id='button1' value='' class='type-file-button' />"
    $(textButton).insertBefore("#fx_bthumb");
    $("#fx_bthumb").change(function(){
	$("#textfield1").val($("#fx_bthumb").val());
    });

	var textButton="<input type='text' name='textfield' id='textfield2' class='type-file-text' /><input type='button' name='button' id='button2' value='' class='type-file-button' />"
    $(textButton).insertBefore("#fx_sthumb");
    $("#fx_sthumb").change(function(){
	$("#textfield2").val($("#fx_sthumb").val());
    });

});
</script>