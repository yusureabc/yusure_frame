<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['link_index_mb_ad'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=mb_ad&op=mb_ad_list" ><span><?php echo $lang['nc_manage'];?></span></a></li>
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['nc_new'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="link_form" enctype="multipart/form-data" method="post">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2 nobdb">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="link_title"> <?php echo $lang['link_index_title'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="" name="link_title" id="link_title" class="txt"></td>
          <td class="vatop tips"><?php echo $lang['link_add_name'];?></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label class="validation" for="link_keyword"> 关键词:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <input type="text" name="link_keyword" id="link_keyword" class="txt" >
          </td>
          <td class="vatop tips"><?php echo $lang['link_add_href'];?></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label class="validation" for="link_access_mode"> 访问方式:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <select name="link_access_mode" id="link_access_mode">
                <option value="1">商铺</option>
                <option value="2">商品</option>
                <option value="3">分类</option>
                <option value="4">关键词</option>
                <option value="5">网址</option>
    			<option value="6">专题</option>
            </select>
          </td>
          <td class="vatop tips"><?php echo $lang['link_add_category'];?></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label class="validation" for="link_access_content"> 访问内容:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <input type="text" name="link_access_content" id="link_access_content" class="txt" >
          </td>
          <td class="vatop tips"><?php echo $lang['link_add_content'];?></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label class="validation" for="link_pic"><?php echo $lang['link_index_pic_sign'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
          <span class="type-file-box">
            <input type="file" name="link_pic" id="link_pic" class="type-file-file" size="30" >
          </span>  
            </td>
          <td class="vatop tips"><?php echo $lang['link_add_sign'];?></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="link_sort"><?php echo $lang['nc_sort'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="255" name="link_sort" id="link_sort" class="txt"></td>
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
        },
        rules : {
            link_title : {
                required : true
            },
            link_pic  : {
                required : true,
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
            link_pic  : {
                required : '<?php echo $lang['link_add_pic_null'];?>',
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
