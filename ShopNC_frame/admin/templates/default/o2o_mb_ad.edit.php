<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['link_index_mb_ad'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=o2o_mb_ad&op=mb_ad_list" ><span><?php echo $lang['nc_manage'];?></span></a></li>
        <li><a href="index.php?act=o2o_mb_ad&op=mb_ad_add" ><span><?php echo $lang['nc_new'];?></span></a></li>
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['nc_edit'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="link_form" enctype="multipart/form-data" method="post">
    <input type="hidden" name="form_submit" value="ok" />
    <input type="hidden" name="link_id" value="<?php echo $output['link_array']['link_id'];?>" />
    <table class="table tb-type2">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="link_title"><?php echo $lang['link_index_title'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['link_array']['link_title'];?>" name="link_title" id="link_title" class="txt"></td>
          <td class="vatop tips"><?php echo $lang['link_add_name'];?></td>
        </tr>

         <tr class="noborder">
          <td colspan="2" class="required"><label class="" for="link_title_info">标题简介:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['link_array']['link_title_info'];?>" name="link_title_info" id="link_title_info" class="txt"></td>
          <td class="vatop tips">标题下方显示的简介</td>
        </tr>

        <tr>
          <td colspan="2" class="required"><label class="validation" for="link_keyword">关键词:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <input type="text" name="link_keyword" id="link_keyword" value="<?php echo $output['link_array']['link_keyword'];?>" class="txt" >
          </td>
          <td class="vatop tips"><?php echo $lang['link_add_href'];?></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label class="validation" for="link_access_mode"> 访问方式:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <select name="link_access_mode" id="link_access_mode">
                <option value="1" <?php if($output['link_array']['link_access_mode']==1){?>selected<?php }?>>商铺</option>
                <option value="2" <?php if($output['link_array']['link_access_mode']==2){?>selected<?php }?>>商品</option>
                <option value="3" <?php if($output['link_array']['link_access_mode']==3){?>selected<?php }?>>分类</option>
                <option value="4" <?php if($output['link_array']['link_access_mode']==4){?>selected<?php }?>>关键词</option>
                <option value="5" <?php if($output['link_array']['link_access_mode']==5){?>selected<?php }?>>网址</option>
                <option value="6" <?php if($output['link_array']['link_access_mode']==6){?>selected<?php }?>>专题</option>
                <option value="7" <?php if($output['link_array']['link_access_mode']==7){?>selected<?php }?>>链接社区ID</option>
            </select>
          </td>
          <td class="vatop tips"><?php echo $lang['link_add_category'];?></td>
        </tr>

        <tr>
          <td colspan="2" class="required"><label class="" for="link_area"> 关联城市:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <select name="link_area" id="link_area">
            <option value="">---请选择---</option>
              <?php foreach($output['area_list'] as $k=>$v) {?>
                <option value="<?php echo $v['area_id'];?>" <?php if($output['link_array']['link_area']==$v['area_id']) { ?>selected<?php }?>><?php echo $v['area_name'];?></option>
                <?php } ?>
            </select>
          </td>
          <td class="vatop tips">关联城市 — 代表属于城市广告位  (若此项和“关联小区”均不填，则视为 小区默认广告位)</td>
        </tr>

        <tr>
          <td colspan="2" class="required"><label class="" for="link_village"> 关联小区:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <select name="link_village" id="link_village">
            <option value="">---请选择---</option>
              <?php foreach($output['village'] as $k=>$v) {?>
                <option value="<?php echo $v['village_id'];?>" <?php if($output['link_array']['link_village']==$v['village_id']) { ?>selected<?php }?>><?php echo $v['village_name'];?></option>
                <?php } ?>
            </select>
          </td>
          <td class="vatop tips"><?php echo $lang['link_village'];?> — 代表属于小区广告位  (若此项和“关联城市”均不填，则视为 小区默认广告位)</td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label class="validation" for="link_access_content"> 访问内容:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <input type="text" name="link_access_content" id="link_access_content" class="txt" value="<?php echo $output['link_array']['link_access_content'];?>">
          </td>
          <td class="vatop tips"><?php echo $lang['link_add_content'];?></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for=""><?php echo $lang['link_index_pic_sign'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><span class="type-file-show"><img class="show_image" src="<?php echo ADMIN_TEMPLATES_URL;?>/images/preview.png">
            <div class="type-file-preview"><img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_MOBILE.'/ad/'.$output['link_array']['link_pic'];?>"></div>
            </span> <span class="type-file-box">
            <input name="link_pic" type="file" class="type-file-file" id="link_pic" size="30">
            </span></td>
          <td class="vatop tips">根据广告位类型 制定大小；城市广告位为：214*140；小区广告位 大图为：640*140；小图为320*140</td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="link_pic_size">图片尺寸类型:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <select name="link_pic_size" id="link_pic_size">
              <option value="1" <?php if($output['link_array']['link_pic_size']==1){?>selected<?php }?>>大图</option>
              <option value="2" <?php if($output['link_array']['link_pic_size']==2){?>selected<?php }?>>小图</option>
            </select>
          </td>
          <td class="vatop tips">小区广告位中：大图、代表是第一张横图广告位；小图、代表下方块元素广告位</td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="link_sort"><?php echo $lang['nc_sort'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['link_array']['link_sort'];?>" name="link_sort" id="link_sort" class="txt"></td>
          <td class="vatop tips"><?php echo $lang['link_add_sort_tip'];?></td>
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
			error.appendTo(element.parent().parent().prev().find('td:first'));
        },
        rules : {
            link_title : {
                required : true
            },
            link_url  : {
                required : true,
                url      : true
            },
            link_sort : {
                number   : true
            },
            link_keyword : {
                required : true,
            },
            link_access_mode : {
                required : true,
            },
            link_access_content : {
                required : true,
            },
        },
        messages : {
            link_title : {
                required : '<?php echo $lang['link_add_title_null'];?>'
            },
            link_url  : {
                required : '<?php echo $lang['link_add_url_null'];?>',
                url      : '<?php echo $lang['link_add_url_wrong'];?>'
            },
            link_sort  : {
                number   : '<?php echo $lang['link_add_sort_int'];?>'
            },
            link_keyword : {
              required : '<?php echo $lang['link_keyword_null'];?>',
            },
            link_access_mode : {
                required : '<?php echo $lang['link_add_mode_null'];?>',
            },
            link_access_content : {
                required : '<?php echo $lang['link_add_content_null'];?>',
            },
        }
    });
});
</script> 
<script type="text/javascript">
$(function(){
    var textButton="<input type='text' name='textfield' id='textfield1' class='type-file-text' /><input type='button' name='button' id='button1' value='' class='type-file-button' />"
	$(textButton).insertBefore("#link_pic");
	$("#link_pic").change(function(){
	$("#textfield1").val($("#link_pic").val());
});
});
</script>
