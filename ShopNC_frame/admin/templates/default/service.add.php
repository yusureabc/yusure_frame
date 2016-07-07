<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['store_service'];?></h3>
      <ul class="tab-base">
         <li><a href="index.php?act=o2o_store_service&op=service_list" ><span><?php echo $lang['manage'];?></span></a></li>
         <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['nc_admin_srevice_add'];?></span></a></li>
         <li><a href="index.php?act=o2o_store_service&op=reason_list"><span><?php echo '原因列表';?></span></a></li>
        <li><a href="index.php?act=o2o_store_service&op=reason_add"><span><?php echo $lang['nc_admin_add_reason'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="add_form" method="post" enctype="multipart/form-data">
  <input type="hidden" name="act" value="o2o_store_service" />
  <input type="hidden" name="op" value="service_add" />
    <table class="table tb-type2">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="service_name"><?php echo $lang['nc_admin_service_name'].$lang['nc_colon'];?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text"  name="service_name" id="service_name" class="txt"></td>
          <td class="vatop tips"><?php echo $lang['class_name_error'];?></td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="2"><a id="submit" href="javascript:void(0)" class="btn"><span><?php echo $lang['nc_save'];?></span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<script type="text/javascript">
$(document).ready(function(){



    $("#submit").click(function(){
        $("#add_form").submit();
    });

    $("input[nc_type='microshop_goods_class_image']").live("change", function(){
		var src = getFullPath($(this)[0]);
		$(this).parent().prev().find('.low_source').attr('src',src);
		$(this).parent().find('input[class="type-file-text"]').val($(this).val());
	});


    $('#add_form').validate({
        errorPlacement: function(error, element){
            error.appendTo(element.parent().parent().prev().find('td:first'));
        },
        success: function(label){
            label.addClass('valid');
        },
        rules : {
            class_name: {
                required : true,
                maxlength : 10
            },
            class_sort: {
                required : true,
                digits: true,
                max: 255,
                min: 0
            }
        },
        messages : {
            class_name: {
                required : "<?php echo $lang['nc_store_class_name_length'];?>",
                maxlength : jQuery.validator.format("<?php echo $lang['nc_store_class_name_length'];?>")
            },
            class_sort: {
                required : "<?php echo $lang['nc_store_class_sort_is_not_null'];?>",
                digits: "<?php echo $lang['nc_store_class_sort_range'];?>",
                max : jQuery.validator.format("<?php echo $lang['nc_store_class_sort_range'];?>"),
                min : jQuery.validator.format("<?php echo $lang['nc_store_class_sort_range'];?>")
            }
        }
    });
});
</script> 
