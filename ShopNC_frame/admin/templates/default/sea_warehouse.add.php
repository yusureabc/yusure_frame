<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['nc_admin_warehouse_manage'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=sea_warehouse&op=warehouse"><span><?php echo $lang['nc_manage'];?></span></a></li>
		<li><a href="javascript:void(0);" class='current'><span><?php echo $lang['nc_add'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
    <form id="add_form" method="post" enctype="multipart/form-data" action="index.php?act=sea_warehouse&op=<?php echo $output['op'];?>">
    	<table class="table tb-type2">
      	  <tbody>
        	<tr class="noborder">
          	  <td colspan="2" class="required"><label class="validation" for="house_name"><?php echo $lang['nc_admin_warehouse_name'].$lang['nc_colon'];?></label></td>
        	</tr>
    		<tr class="noborder">
          	  <td class="vatop rowform"><input type="text"  name="house_name" id="house_name" class="txt"></td>
          	  <td class="vatop tips"><?php echo $lang['class_name_error'];?></td>
        	</tr>
    		<tr>
          	  <td colspan="2" class="required"><label for="house_sort" class="validation"><?php echo $lang['nc_sort'].$lang['nc_colon'];?></label></td>
        	</tr>
        	<tr class="noborder">
          	  <td class="vatop rowform"><input id="house_sort" name="house_sort" type="text" class="txt" value="255" /></td>
          	  <td class="vatop tips"><?php echo $lang['class_sort_explain'];?></td>
          	  <td class="vatop tips"></td>
        	</tr>
        	<tr>
          	  <td colspan="2" class="required"><label for="house_sort" ><?php echo '首页推荐'.$lang['nc_colon']; ?></label></td>
        	</tr>
        	<tr class="noborder">
          	  <td class="vatop rowform onoff">
          		<label for="is_audit1" class="cb-enable"><span>是</span></label>
            	<label for="is_audit2" class="cb-disable selected" ><span>否</span></label>
            	<input id="is_audit1" name="is_recommend"  value="1" type="radio">
            	<input id="is_audit2" name="is_recommend"  value="0" type="radio">
          	  </td>
          	  <td class="vatop tips">
          		<span class="vatop rowform"><?php echo $lang['nc_site_open_and_close'];?></span>
          	  </td>
        	</tr>
          </tbody>
          <tfoot>
        	<tr>
          	  <td colspan="2"><a id="submit" href="javascript:void(0)" class="btn"><span><?php echo $lang['nc_save'];?></span></a></td>
        	</tr>
      	  </tfoot>
    </form>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$("#submit").click(function(){
        $("#add_form").submit();
    });
    $('#add_form').validate({
        errorPlacement: function(error, element){
            error.appendTo(element.parent().parent().prev().find('td:first'));
        },
        success: function(label){
            label.addClass('valid');
        },
        rules : {
            house_name: {
                required : true,
                maxlength : 10
            },
            house_sort: {
                required : true,
                digits: true,
                max: 255,
                min: 0
            }
        },
        messages : {
            house_name: {
                required : "<?php echo $lang['nc_warehouse_name_length'];?>",
                maxlength : jQuery.validator.format("<?php echo $lang['nc_warehouse_name_length'];?>")
            },
            house_sort: {
                required : "<?php echo $lang['nc_warehouse_sort_is_not_null'];?>",
                digits: "<?php echo $lang['nc_warehouse_sort_range'];?>",
                max : jQuery.validator.format("<?php echo $lang['nc_warehouse_sort_range'];?>"),
                min : jQuery.validator.format("<?php echo $lang['nc_warehouse_sort_range'];?>")
            }
        }
    });
});
</script>