<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['nc_mobile_content'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=mb_cn&op=mb_cn_list" ><span><?php echo $lang['nc_manage'];?></span></a></li>
        <li><a href="index.php?act=mb_cn&op=mb_cn_add" ><span><?php echo $lang['nc_new'];?></span></a></li>
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['nc_edit'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="link_form" enctype="multipart/form-data" method="post">
    <input type="hidden" name="form_submit" value="ok" />
    <input type="hidden" name="link_id" value="<?php echo $output['cn_array']['cn_id'];?>" />
    <table class="table tb-type2">
      <tbody>
        <tbody>

        <!-- 导航标题 -->
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="link_title"> <?php echo $lang['home_index_navtitle'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['cn_array']['cn_navtitle'] ?>" name="link_navtitle" id="link_navtitle" class="txt"></td>
          <td class="vatop tips"><?php echo $lang['mb_cl_nav_title'];?></td>
        </tr>

        <!-- 点击标题 -->
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="link_title"> <?php echo $lang['link_index_title'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['cn_array']['cn_clicktitle'] ?>" name="link_title" id="link_title" class="txt"></td>
          <td class="vatop tips"><?php echo $lang['mb_cl_click_title'];?></td>
        </tr>

        <!-- 显示内容 -->
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="link_content"> <?php echo $lang['mb_cl_content'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <textarea name="link_content" id="link_content" ><?php echo $output['cn_array']['cn_content'] ?></textarea>
          </td>
          <td class="vatop tips"><?php echo $lang['mb_cl_click_content'];?></td>
        </tr>
       
       <!-- 展示图片 -->
        <tr>
          <td colspan="2" class="required"><label class="validation" for="link_pic"><?php echo $lang['link_index_pic_sign'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><span class="type-file-show"><img class="show_image" src="<?php echo ADMIN_TEMPLATES_URL;?>/images/preview.png">
            <div class="type-file-preview"><img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_MOBILE.'/cn/'.$output['cn_array']['cn_pic'];?>"></div>
            </span> <span class="type-file-box">
            <input name="link_pic" type="file" class="type-file-file" id="link_pic" size="30">
            </span></td>
          <td class="vatop tips">
            <?php if($output['cn_array']['cn_pic'] != ''){ ?>
            <?php } else { echo "<span class='red'>".$lang['link_add_tosign']."</span>"; } ?>
          </td>
        </tr>
        <!-- 访问方式 -->
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="link_title"> <?php echo $lang['nc_mobile_openmethods'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <select name="link_methods" id="openmethods">
              <option value="1">商铺</option>
              <option value="2">商品</option>
              <option value="3">分类</option>
              <option value="4">关键词</option>
              <option value="5">网址</option>
            </select>
            <input type="hidden" id="hi_methods" value="<?php echo $output['cn_array']['cn_openmethods'] ?>" />
          </td>
          <td class="vatop tips"><?php echo $lang['mb_cl_click_methods'];?></td>
        </tr>

        <!-- 访问内容 -->
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="link_title"> <?php echo $lang['nc_mobile_openname'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['cn_array']['cn_openurl'] ?>" name="link_openname" id="link_openname" class="txt"></td>
          <td class="vatop tips"><?php echo $lang['mb_cl_click_opencontent'];?></td>
        </tr>


        <!-- 所属分类 -->
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="link_title"> <?php echo $lang['mb_cl_cation'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <select id="classification" name="link_genus">
              <?php
                foreach ( $output['exp_cation'] as $k => $exp_cation )
                {
                  if ( $output['cn_array']['cn_genus'] == $exp_cation['cf_id'] )
                  { // 如果值相等就选中
                    $selected = "selected='selected'"   ;
                  }
                  else
                  {
                    $selected = "";
                  }     
                  echo "<option value=" . "'" . $exp_cation['cf_id'] . "'". $selected . ">" . $exp_cation['cf_name'] . "</option>";
                }
              ?>
            </select>
            
          </td>
          <td class="vatop tips"><?php echo $lang['mb_cl_content_cation'];?></td>
        </tr>
        <!---首页按钮-->
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="link_clickbutton"> <?php echo $lang['mb_cl_button'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <input type="text" name="link_clickbutton" id="link_clickbutton" class="txt" value="<?php echo $output['cn_array']['cn_clickbutton'];?>">
          </td>
          <td class="vatop tips"><?php echo $lang['mb_cn_button_show'];?></td>
        </tr>
        <!-- 是否推荐到首页 -->
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="link_title"> <?php echo $lang['mb_cn_homepage'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <input type="hidden" id="hi_homepage" value="<?php echo $output['cn_array']['cn_homepage']; ?>" />
            <input type="checkbox" value="1" name="link_homepage" id="link_homepage" class="txt">
          </td>
          <td class="vatop tips"><?php echo $lang['mb_cn_homepage_show'];?></td>
        </tr>

        <!-- 排序 -->
        <tr>
          <td colspan="2" class="required"><label for="link_sort"><?php echo $lang['nc_sort'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['cn_array']['cn_sort']; ?>" name="link_sort" id="link_sort" class="txt"></td>
          <td class="vatop tips"><?php echo $lang['link_add_sort_tip'];?></td>
        </tr>
        <!--背景颜色-->
        <tr>
          <td colspan="2" class="required"><?php echo $lang['cms_goods_background'];?></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input class="txt" name="link_color" type="color" value="<?php if(!empty($output['cn_array'])) echo $output['cn_array']['cn_color'];?>" /></td>
          <td class="vatop tips"><span class="vatop rowform"><?php echo $lang['cms_goods_color_explain'];?></span></td>
        </tr>
        <!--字体颜色-->
        <tr>
          <td colspan="2" class="required"><?php echo $lang['cms_font_background'];?></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input class="txt" name="link_font_color" type="color" value="<?php if(!empty($output['cn_array'])) echo $output['cn_array']['cn_font_color'];?>" /></td>
          <td class="vatop tips"><span class="vatop rowform"><?php echo $lang['cms_font_color_explain'];?></span></td>
        </tr>
        <tfoot>
        <tr class="tfoot">
          <td colspan="15"><a href="JavaScript:void(0);" class="btn" id="submitBtn"><span><?php echo $lang['nc_submit'];?></span></a></td>
        </tr>
      </tfoot>
    </tbody>
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
            link_navtitle : {
                required : true
            },
            link_content : {
                required : true
            },
            link_openname : {
                required : true
            },
            link_clickbutton : {
              required : true,
            }
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
            link_navtitle : {
                required : '<?php echo $lang['mb_cl_navtitle'] ?>'
            },
            link_content : {
                required : '<?php echo $lang['mb_cl_showcontent'] ?>'
            },
            link_openname : {
                required : '<?php echo $lang['mb_cl_access_content'] ?>'
            },
            link_clickbutton : {
              required : '<?php echo $lang['mb_cl_access_button'];?>',
            }
        }
    });
});

$(document).ready( function() {
  var hi_methods = $('#hi_methods').val();  // 取到隐藏域的访问方式的值
  $("#openmethods").find("option[value=" + hi_methods  + "]").attr("selected", "selected");  // 赋给选中属性
});

$(document).ready( function() {
  var homepage = $("#hi_homepage").val();   // 取是否推荐到首页的隐藏值
  if ( homepage == '1' )
  { // 如果是1， 就选中
    $("#link_homepage").attr("checked", "checked");
  }
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
