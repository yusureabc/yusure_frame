<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['banner_add'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=home_ad&op=ad_list&type=<?php echo $output['type'];?>&ap_id=<?php echo $output['ap_id'];?>" ><span><?php echo $lang['banner_manage'];?></span></a></li>
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['nc_new'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="banner_add_form" enctype="multipart/form-data" method="post">
      <input type="hidden" name="form_submit" value="ok" />
      <input type="hidden" name="ap_id" value="<?php echo $output['ap_id'];?>" />
       <input type="hidden" name="type" value="<?php echo $output['type'];?>" />
    <table class="table tb-type2 nobdb">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="banner_title"> <?php echo $lang['banner_title'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="" name="banner_title" id="banner_title" class="txt"></td>
        </tr>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="banner_linkurl"> <?php echo $lang['banner_linkurl'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
          <input id="banner_linkurl" name="banner_linkurl" type="text" class="txt">
          </td>
           <tr>
          <td colspan="2" class="required"><label class="validation" for="banner_pic"><?php echo $lang['banner_pic'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
          <span class="type-file-box">
            <input type="file" name="banner_pic" id="banner_pic" class="type-file-file" size="30" >
          </span>  
            </td>
          <td class="vatop tips"><?php echo $lang['link_add_sign'];?></td>
        </tr>
        </tr>
        <tr>
          <td colspan="2" class="required"><label class="validation" for="banner_sort"><?php echo $lang['banner_sort'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="255" name="banner_sort" id="banner_sort" class="txt"></td>
          <td class="vatop tips"><?php echo $lang['link_add_sort_tip'];?></td>
        </tr>
      </tbody>
      <tfoot>
        <tr class="tfoot">
          <td colspan="15"><a href="JavaScript:void(0);" class="btn" id="submitBtn"><span><?php echo $lang['banner_submit'];?></span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<script>
//按钮先执行验证再提交表单
$(function(){$("#submitBtn").click(function(){
    if($("#banner_add_form").valid()){
     $("#banner_add_form").submit();
	}
	});
});
//
$(document).ready(function(){
	$('#banner_add_form').validate({
        errorPlacement: function(error, element){
			error.appendTo(element.parentsUntil('tr').parent().prev().find('td:first'));
        },
        rules : {
            banner_title : {
                required : true
            },
            banner_linkurl : {
              required : true
            },
            banner_pic : {
               required : true
            },
            banner_sort : {
                required : true,
                number:true
            },
        },
        messages : {
            banner_title : {
                required : '<?php echo $lang['banner_title_null'];?>'
            },
            banner_linkurl : {
              required : '<?php echo $lang['banner_linkurl_null'];?>'
            },
            banner_pic : {
              required : '<?php echo $lang['banner_pic_null'];?>'
            },
            banner_sort : {
                required : '<?php echo $lang['banner_sort_null'];?>',
                number : '<?php echo $lang['banner_sort_number'];?>'
            },
        }
    });
});
</script> 
<script type="text/javascript">
$(function(){
    var textButton="<input type='text' name='textfield' id='textfield1' class='type-file-text' /><input type='button' name='button' id='button1' value='' class='type-file-button' />"
	$(textButton).insertBefore("#banner_pic");
	$("#banner_pic").change(function(){
	$("#textfield1").val($("#banner_pic").val());
});
});
</script>
