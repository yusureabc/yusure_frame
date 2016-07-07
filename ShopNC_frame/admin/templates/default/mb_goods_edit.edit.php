<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['app_goods_home_title'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=mb_goods&op=mb_goods_list" ><span><?php echo $lang['nc_manage'];?></span></a></li>
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['nc_edit'];?></span></a></li>
    	<li><a href="index.php?act=mb_goods&op=mb_goods_add"><span><?php echo $lang['nc_add'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="link_form" enctype="multipart/form-data" method="post">
    <input type="hidden" name="act" value="mb_goods"/>
    <input type="hidden" name="op" value="mb_goods_edit"/>
    <input type="hidden" name="form_submit" value="ok" />
    <input type="hidden" name="id" value="<?php echo $output['home_array']['id'];?>" />
    <table class="table tb-type2">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="goods_title"><?php echo $lang['app_goods_title'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['home_array']['goods_title'];?>" name="goods_title" id="goods_title" class="txt"></td>
          <td class="vatop tips"><?php echo $lang['goods_name_notice'];?></td>
        </tr>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="goods_price"><?php echo $lang['app_goods_price'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['home_array']['goods_price'];?>" name="goods_price" id="goods_price" class="txt"></td>
          <td class="vatop tips"><?php echo $lang['goods_price_notice'];?></td>
        </tr>
    	<!--折扣-->
    	<tr class="noborder">
          <td colspan="2" class="required"><label  for="goods_rebate"><?php echo $lang['app_goods_rebate'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['home_array']['goods_rebate'];?>" name="goods_rebate" id="goods_rebate" class="txt"></td>
          <td class="vatop tips"><?php echo $lang['goods_rebate_notice'];?></td>
        </tr>
    	<!--end-->
        <tr class="noborder">
          <td colspan="2" class="required"><label for="goods_sort"><?php echo $lang['app_goods_sort'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['home_array']['goods_sort'];?>" name="goods_sort" id="goods_sort" class="txt"></td>
          <td class="vatop tips"><?php echo $lang['goods_sort_notice'];?></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><?php echo $lang['cms_goods_background'];?></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input class="txt" name="goods_color" type="color" value="<?php if(!empty($output['home_array'])) echo $output['home_array']['goods_color'];?>" /></td>
          <td class="vatop tips"><span class="vatop rowform"><?php echo $lang['cms_goods_color_explain'];?></span></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="goods_thumb" class="validation"><?php echo $lang['app_goods_image'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><span class="type-file-show"><img class="show_image" src="<?php echo ADMIN_TEMPLATES_URL;?>/images/preview.png">
            <div class="type-file-preview"><img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_MOBILE.'/app/'.$output['home_array']['goods_thumb'];?>"></div>
            </span> <span class="type-file-box">
            <input name="goods_thumb" type="file" class="type-file-file" id="goods_thumb" size="30">
            </span></td>
          <td class="vatop tips"><?php echo $lang['goods_thumb_notice']; ?></td>
        </tr>
    	<!--图片位置标记-->
        <tr class="noborder">
          <td colspan="2" class="required"><label for="goods_position"><?php echo $lang['app_goods_position'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <!-- <input id="goods_index" name="goods_index" class="txt" type="checkbox" value="0" onclick='change()'/> -->
            <select id="goods_position" name="goods_position" >
              <option value="0" <?php if($output['home_array']['goods_position'] == 0) {?>selected<?php }?>>小</option>
              <option value="1" <?php if($output['home_array']['goods_position'] == 1) {?>selected<?php }?>>大</option>
            </select>
          </td>
          <td class="vatop tips">
            <span class="vatop rowform">
              <?php echo $lang['goods_position_notice'];?>
            </span>
          </td>
        </tr>
        <!--类型end-->
        <tr class="noborder">
          <td colspan="2" class="required"><label for="goods_link" class="validation"><?php echo $lang['app_goods_link'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input id="goods_link" name="goods_link" value="<?php echo $output['home_array']['goods_id'];?>" class="txt" type="text" /></td>
          <td class="vatop tips"><span class="vatop rowform"><?php echo $lang['goods_link_notice'];?></span></td>
        </tr>
        <tr class="noborder">
          <td colspan="2" class="required"><label for="goods_index"><?php echo $lang['app_goods_index'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <!-- <input id="goods_index" name="goods_index" value="<?php echo $output['home_array']['goods_index'];?>" <?php if($output['home_array']['goods_index']) {?>checked<?php }?> class="txt" type="checkbox" onclick="change()"/> -->
            <select id="goods_index" name="goods_index" >
              <option value="0" <?php if($output['home_array']['goods_index'] == 0) {?>selected<?php }?>>热销新品</option>
              <option value="1" <?php if($output['home_array']['goods_index'] == 1) {?>selected<?php }?>>抢购专区</option>
              <option value="2" <?php if($output['home_array']['goods_index'] == 2) {?>selected<?php }?>>掌上特惠</option>
              <option value="3" <?php if($output['home_array']['goods_index'] == 3) {?>selected<?php }?>>热门商品</option>
              <option value="4" <?php if($output['home_array']['goods_index'] == 4) {?>selected<?php }?>>高一品自营</option>
              <option value="5" <?php if($output['home_array']['goods_index'] == 5) {?>selected<?php }?>>横幅logo</option>
              <option value="7" <?php if($output['home_array']['goods_index'] == 7) {?>selected<?php }?>>潮.青春</option>
              <option value="8" <?php if($output['home_array']['goods_index'] == 8) {?>selected<?php }?>>享.美味</option>
              <option value="9" <?php if($output['home_array']['goods_index'] == 9) {?>selected<?php }?>>品.人生</option>
	          <option value="10" <?php if($output['home_array']['goods_index'] == 10) {?>selected<?php }?>>智.生活</option>
	          <option value="11" <?php if($output['home_array']['goods_index'] == 11) {?>selected<?php }?>>童心肆起</option>
            </select>
          </td>
          <td class="vatop tips"><span class="vatop rowform"><?php echo $lang['goods_index_notice'];?></span></td>
        </tr>
        <!--访问方式-->
        <tr>
          <td colspan="2" class="required"><label class="validation" for="goods_link_access_mode"> 访问方式:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <select name="goods_link_access_mode" id="goods_link_access_mode">
                <option value="1" <?php if($output['home_array']['goods_link_access_mode']==1){?>selected<?php }?>>商铺</option>
                <option value="2" <?php if($output['home_array']['goods_link_access_mode']==2){?>selected<?php }?>>商品</option>
                <option value="3" <?php if($output['home_array']['goods_link_access_mode']==3){?>selected<?php }?>>分类</option>
                <option value="4" <?php if($output['home_array']['goods_link_access_mode']==4){?>selected<?php }?>>关键词</option>
                <option value="5" <?php if($output['home_array']['goods_link_access_mode']==5){?>selected<?php }?>>网址</option>
                <option value="6" <?php if($output['home_array']['goods_link_access_mode']==6){?>selected<?php }?>>专题</option>
            </select>
          </td>
          <td class="vatop tips"><?php echo $lang['link_add_category'];?></td>
        </tr>
        <!--end-->		
        		
        <tr>
          <td colspan="2" class="required"><label for="goods_introduce" class="validation"><?php echo $lang['app_goods_introduce'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><textarea name="goods_introduce" rows="6" class="tarea" id="goods_introduce"><?php echo $output['home_array']['goods_produce'];?></textarea></td>
          <td class="vatop tips"><span class="vatop rowform"><?php echo $lang['goods_introduce_notice'];?></span></td>
        </tr> 
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
    if($("#link_form").valid()){
     $("#link_form").submit();
  }
	});
});
//

$(document).ready(function(){
	$('#link_form').validate({
        errorPlacement: function(error, element){
          error.appendTo(element.parentsUntil('tr').parent().prev().find('td:first'));
			//error.appendTo(element.parent().parent().prev().find('td:first'));
        },
        rules : {
          goods_title : {
                required : true,
                maxlength : 20
            },
            goods_price  : {
                required : true,
                number   : true,
                min : 0.01,
                max : 9999999
            },
            goods_link  : {
                required : true,
                number   : true
            },
            goods_introduce  : {
                required : true,
                maxlength : 100
            },
            goods_sort : {
                number   : true,
            }
        },
        messages : {
          goods_title : {
                required : '<?php echo $lang['app_home_add_null'];?>',
                maxlength : '<?php echo $lang['app_home_add_maxlength'];?>'
            },
            goods_price  : {
                required : '<?php echo $lang['app_home_add_null'];?>',
                number   : '<?php echo $lang['app_home_add_price_int'];?>',
                min : '最小值不可小于0.01',
                max : '最大值不可大于9999999'
            },
            goods_link  : {
                required : '<?php echo $lang['app_home_add_null'];?>',
                number : '<?php echo $lang['app_home_add_link_int'];?>'
            },
            goods_introduce  : {
                required : '<?php echo $lang['app_home_add_null'];?>',
                maxlength : '<?php echo $lang['goods_introduce_alert'];?>'
            },
            goods_sort  : {
                number   : '<?php echo $lang['app_home_add_sort_int'];?>',
            }
        }
    });
});
</script> 
<script type="text/javascript">
$(function(){
    var textButton="<input type='text' name='textfield' id='textfield1' class='type-file-text' /><input type='button' name='button' id='button1' value='' class='type-file-button' />"
	$(textButton).insertBefore("#goods_thumb");
	$("#goods_thumb").change(function(){
	$("#textfield1").val($("#goods_thumb").val());
});
});
</script>
<script type="text/javascript">
function change() {
  var status=$("#goods_index").attr("checked");
  if(status=="checked") {
    document.getElementById("goods_index").value=1;
  } else {
    document.getElementById("goods_index").value=0;
  }
}
</script>
