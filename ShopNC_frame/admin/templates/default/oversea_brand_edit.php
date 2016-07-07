<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['brand_index_brand'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=overseas_brand&op=brand_list"><span><?php echo $lang['nc_manage'];?></span></a></li>
        <li><a href="index.php?act=overseas_brand&op=brand_add"><span><?php echo $lang['nc_new'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="brand_form" method="post" name="form1" enctype="multipart/form-data">
    <input type="hidden" name="form_submit" value="ok" />
    <input type="hidden" name="old_brand_pic" value="<?php echo $output['brand_array']['brand_pic']?>" />
    <input type="hidden" name="brand_id" value="<?php echo $output['brand_array']['brand_id']?>" />
    <table class="table tb-type2">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation"><?php echo $lang['brand_index_name'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['brand_array']['brand_name']?>" name="brand_name" id="brand_name" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><?php echo $lang['brand_index_class'];?>: </td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform" id="gcategory"><input type="hidden" value="<?php echo $output['brand_array']['class_id']?>" name="class_id" class="mls_id">
            <input type="hidden" value="<?php echo $output['brand_array']['brand_class']?>" name="brand_class" class="mls_name">
            <span class="mr10"><?php echo $output['brand_array']['brand_class']?></span>
            <?php if (!empty($output['brand_array']['class_id'])) {?>
            <input class="edit_gcategory" type="button" value="<?php echo $lang['nc_edit'];?>">
            <?php }?>
            <select <?php if (!empty($output['brand_array']['class_id'])) {?>style="display:none;"<?php }?> class="class-select">
              <option value="0"><?php echo $lang['nc_please_choose'];?>...</option>
              <?php if(!empty($output['gc_list'])){ ?>
              <?php foreach($output['gc_list'] as $k => $v){ ?>
              <?php if ($v['gc_parent_id'] == 0) {?>
              <option value="<?php echo $v['gc_id'];?>"><?php echo $v['gc_name'];?></option>
              <?php } ?>
              <?php } ?>
              <?php } ?>
            </select></td>
          <td class="vatop tips"><?php echo $lang['brand_index_class_tips'];?></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><?php echo $lang['brand_index_pic_sign'];?>: </td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><span class="type-file-show"> <img class="show_image" src="<?php echo ADMIN_TEMPLATES_URL;?>/images/preview.png">
            <div class="type-file-preview" style="display: none;"><img id="view_img" src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_OVERSEA_BRAND.'/'.$output['brand_array']['brand_pic']; ?>"></div>
            </span> <span class="type-file-box">
            <input type='text' name='brand_pic' id='brand_pic' class='type-file-text' />
            <input type='button' name='button' id='button' value='' class='type-file-button' />
            <input name="_pic" type="file" class="type-file-file" id="_pic" size="30" hidefocus="true" />
            </span></td>
          <td class="vatop tips"><?php echo $lang['brand_index_upload_tips'].$lang['brand_add_support_type'];?>gif,jpg,png</td>
        </tr>
        <tr>
          <td colspan="2" class="required"><?php echo $lang['brand_add_if_recommend'];?>: </td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform onoff"><label for="brand_recommend1" class="cb-enable <?php if($output['brand_array']['brand_recommend'] == '1'){ ?>selected<?php } ?>" title="<?php echo $lang['nc_yes'];?>"><span><?php echo $lang['nc_yes'];?></span></label>
            <label for="brand_recommend0" class="cb-disable <?php if($output['brand_array']['brand_recommend'] == '0'){ ?>selected<?php } ?>" title="<?php echo $lang['nc_no'];?>"><span><?php echo $lang['nc_no'];?></span></label>
            <input id="brand_recommend1" name="brand_recommend" <?php if($output['brand_array']['brand_recommend'] == '1'){ ?>checked="checked"<?php } ?>  value="1" type="radio">
            <input id="brand_recommend0" name="brand_recommend" <?php if($output['brand_array']['brand_recommend'] == '0'){ ?>checked="checked"<?php } ?> value="0" type="radio"></td>
          <td class="vatop tips"><?php echo $lang['brand_index_recommend_tips'];?></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><?php echo $lang['nc_sort'];?>: </td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['brand_array']['brand_sort']?>" name="brand_sort" id="brand_sort" class="txt"></td>
          <td class="vatop tips"><?php echo $lang['brand_add_update_sort'];?></td>
        </tr>
      </tbody>
      <tfoot>
        <tr class="tfoot">
          <td colspan="15" ><a href="JavaScript:void(0);" class="btn" id="submitBtn"><span><?php echo $lang['nc_submit'];?></span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/dialog/dialog.js" id="dialog_js" charset="utf-8"></script> 
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/jquery.ui.js"></script> 
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/ajaxfileupload/ajaxfileupload.js"></script> 
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.Jcrop/jquery.Jcrop.js"></script>
<link href="<?php echo RESOURCE_SITE_URL;?>/js/jquery.Jcrop/jquery.Jcrop.min.css" rel="stylesheet" type="text/css" id="cssfile2" />
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/common_select.js" charset="utf-8"></script> 
<script>
function call_back(picname){
	$('#brand_pic').val(picname);
	$('#view_img').attr('src','<?php echo UPLOAD_SITE_URL.'/'.ATTACH_BRAND;?>/'+picname);
}
//按钮先执行验证再提交表单
$(function(){
    // 编辑分类时清除分类信息
    $('.edit_gcategory').click(function(){
        $('input[name="class_id"]').val('');
        $('input[name="brand_class"]').val('');
    });
    
	$("#submitBtn").click(function(){
		if($("#brand_form").valid()){
		 $("#brand_form").submit();
		}
	});
	$('input[class="type-file-file"]').change(uploadChange);
	function uploadChange(){
		var filepatd=$(this).val();
		var extStart=filepatd.lastIndexOf(".");
		var ext=filepatd.substring(extStart,filepatd.lengtd).toUpperCase();		
		if(ext!=".PNG"&&ext!=".GIF"&&ext!=".JPG"&&ext!=".JPEG"){
			alert("file type error");
			$(this).attr('value','');
			return false;
		}
		if ($(this).val() == '') return false;
		ajaxFileUpload();
	}
	function ajaxFileUpload()
	{
		$.ajaxFileUpload
		(
			{
				url:'index.php?act=common&op=pic_upload&form_submit=ok&uploadpath=<?php echo ATTACH_OVERSEA_BRAND;?>',
				secureuri:false,
				fileElementId:'_pic',
				dataType: 'json',
				success: function (data, status)
				{
					if (data.status == 1){
						ajax_form('cutpic','<?php echo $lang['nc_cut'];?>','index.php?act=common&op=pic_cut&type=brand&x=150&y=50&resize=1&ratio=3&url='+data.url,690);
					}else{
						alert(data.msg);
					}
					$('input[class="type-file-file"]').bind('change',uploadChange);
				},
				error: function (data, status, e)
				{
					alert('upload failed');$('input[class="type-file-file"]').bind('change',uploadChange);
				}
			}
		)
	};	
	$("#brand_form").validate({
		errorPlacement: function(error, element){
			error.appendTo(element.parent().parent().prev().find('td:first'));
        },
        rules : {
            brand_name : {
                required : true,
                remote   : {
               	url :'index.php?act=overseas_brand&op=ajax&branch=check_brand_name',
                type:'get',
                data:{
						brand_name : function(){
							return $('#brand_name').val();
							},
						id  : '<?php echo $output['brand_array']['brand_id']?>'
                    }
                }
            },
            brand_sort : {
                number   : true
            }
        },
        messages : {
            brand_name : {
                required : '<?php echo $lang['brand_add_name_null'];?>',
                remote   : '<?php echo $lang['brand_add_name_exists'];?>'
            },
            brand_sort  : {
                number   : '<?php echo $lang['brand_add_sort_int'];?>'
            }
        }
	});
});

gcategoryInit('gcategory');
</script> 
