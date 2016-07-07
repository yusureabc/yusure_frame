<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['goods'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=home_ad&op=ad_list&ap_id=<?php echo $output['ap_id'];?>&type=<?php echo $output['type'];?>"><span><?php echo $lang['goods_manage'];?></span></a></li>
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['goods_add'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
    <!---产品开始-->
    <form id="goods" enctype="multipart/form-data" method="post" class="goods">
    <input type="hidden" name="form_submit" value="ok" />
    <input type="hidden" name="ap_id" value="<?php echo $output['ap_id'];?>" />
    <input type="hidden" name="type" value="<?php echo $output['type'];?>">
    <table class="table tb-type2" id="main_table">
      <tbody>
         <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="promotion_name"><?php echo $lang['promotion_name'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" name="promotion_name" id="promotion_name" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
      </tbody>
        <tbody>
         <tr class="noborder">
          <td colspan="2" class="required"><label for="promotion_slogan_one"><?php echo $lang['promotion_slogan_one'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" name="promotion_slogan_one" id="promotion_slogan_one" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
      </tbody>
        <tbody>
         <tr class="noborder">
          <td colspan="2" class="required"><label for="promotion_slogan_two"><?php echo $lang['promotion_slogan_two'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" name="promotion_slogan_two" id="promotion_slogan_two" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
      </tbody>
       <tbody>
         <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="old_price"><?php echo $lang['old_price'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" name="old_price" id="old_price" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
      </tbody>
      <tbody>
         <tr class="noborder">
          <td colspan="2" class="required"><label for="promotion_price"><?php echo $lang['promotion_price'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" name="promotion_price" id="promotion_price" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
      </tbody>
      <tbody>
         <tr>
          <td colspan="2" class="required"><label class="validation" for="promotion_pic"><?php echo $lang['promotion_pic'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
          <span class="type-file-box">
            <input type="file" name="promotion_pic" id="promotion_pic" class="type-file-file" size="30" >
          </span>  
            </td>
          <td class="vatop tips"><?php echo $lang['link_add_sign'];?></td>
        </tr>
      </tbody>
      <tbody id="product_url">
        <tr>
          <td colspan="2" class="required"><label class="validation" for="promotion_url"><?php echo $lang['promotion_url'];?>: </label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" name="promotion_url" class="txt" id="promotion_url"></td>
        </tr>
      </tbody>
      <tbody>
          <tr>
          <td colspan="2" class="required"><label for="promotion_start_time"><?php echo $lang['promotion_start_time'];?>:</label></td>
        </tr>
        <tr class="noborder">
              <td class="vatop rowform"><input id="promotion_start_time" name="promotion_start_time" type="text" class="txt w150" /><em class="add-on"><i class="icon-calendar"></i></em><span></span></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="promotion_end_time"><?php echo $lang['promotion_end_time'];?>:</label></td>
        </tr>
        <tr class="noborder">
            <td class="vatop rowform"><input id="promotion_end_time" name="promotion_end_time" type="text" class="txt w150" /><em class="add-on"><i class="icon-calendar"></i></em><span></span></td>
        </tr>
      </tbody>
      <tbody>
         <tr class="noborder">
          <td colspan="2" class="required"><label for="promotion_introduce"><?php echo $lang['promotion_introduce'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><textarea name="promotion_introduce" id="promotion_introduce" class="tarea"></textarea></td>
          <td class="vatop tips"></td>
        </tr>
      </tbody>
      <tbody id="product_sort">
        <tr>
          <td colspan="2" class="required"><label class="validation" for="promotion_sort"><?php echo $lang['promotion_sort'];?>: </label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" name="promotion_sort" class="txt" id="promotion_sort"></td>
        </tr>
      </tbody>
      <tfoot>
        <tr class="tfoot">
          <td colspan="15" ><a href="JavaScript:void(0);" class="btn" id="submitBtn"><span><?php echo $lang['nc_submit'];?></span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>
  <!--商铺-->
</div>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/jquery.ui.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/i18n/zh-CN.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/themes/ui-lightness/jquery.ui.css"  />
<link rel="stylesheet" type="text/css" href="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui-timepicker-addon/jquery-ui-timepicker-addon.min.css"  />
<script src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui-timepicker-addon/jquery-ui-timepicker-addon.min.js"></script>
<script>
//按钮先执行验证再提交表单
$(function(){$("#submitBtn").click(function(){
    if($("#goods").valid()){
        $("#goods").submit();
	}
	});
});
$(document).ready(function(){
	$('#goods').validate({
        errorPlacement: function(error, element){
                   error.appendTo(element.parentsUntil('tr').parent().prev().find('td:first'));
        },
        rules : {
        	promotion_name : {
                required : true
            },
            old_price : {
                required : true,
                number   : true,
                min : 0.01,
                max : 9999999,
                checkPrice  : false
            },
            promotion_price : {
              number : true,
              min : 0.01,
              max : 9999999,
               checkPrice  : false
            },
            promotion_pic  : {
                required : true,
            },
            promotion_url : {
              required : true,
            },
            promotion_sort : {
              required : true,
              number : true, 
            },
            promotion_introduce : {
              maxlength : 100
            }
        },
        messages : {
        	promotion_name : {
                required : '<?php echo $lang['goods_name_not_null'];?>'
            },
            old_price : {
                required : '<?php echo $lang['goods_price_not_null'];?>',
               number:'<?php echo $lang['goods_price_double'];?>',
               min:'<?php echo $lang['min'];?>',
               max:'<?php echo $lang['max'];?>',
            },
            promotion_price : {
               number:'<?php echo $lang['goods_price_double'];?>',
               min:'<?php echo $lang['min'];?>',
               max:'<?php echo $lang['max'];?>',
            },
            promotion_pic  : {
                required : '<?php echo $lang['goods_pic_not_null']; ?>'
            },
             promotion_url : {
              required : '<?php echo $lang['goods_linkurl_not_null']; ?>',
            },
            promotion_sort : {
               required : '<?php echo $lang['goods_sort_not_null']; ?>',
               number : '<?php echo $lang['goods_sort_number'];?>',
            },
            promotion_introduce :{
               maxlength : '<?php echo $lang['goods_introduce_max'];?>'
            }
        }
    });
});
</script>
<script type="text/javascript">
$(function(){
    var textButton="<input type='text' name='textfield' id='textfield1' class='type-file-text' /><input type='button' name='button' id='button1' value='' class='type-file-button' />"
  $(textButton).insertBefore("#promotion_pic");
  $("#promotion_pic").change(function(){
  $("#textfield1").val($("#promotion_pic").val());
});
});
</script>
<script type="text/javascript">
$(function(){
    $('#promotion_start_time').datetimepicker({
        controlType: 'select'
    });
    $('#promotion_end_time').datetimepicker({
        controlType: 'select'
    });

    // $('#promotion_start_time').datepicker({dateFormat: 'yy-mm-dd'});
    // $('#promotion_end_time').datepicker({dateFormat: 'yy-mm-dd'});
    });
</script>
