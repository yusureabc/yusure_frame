<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['nc_admin_cloudpush'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=mb_cloudpush&op=mb_cloudpush_push" ><span><?php echo $lang['nc_admin_push'];?></span></a>
        </li>
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['nc_admin_push_set'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form method="post" enctype="multipart/form-data" name="form1" id="link_form">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2">
      <tbody>
        <tr class="space">
          <th colspan="2"><?php echo $lang['nc_admin_push_pz'];?></th>
        </tr>
         <!-- API Key -->
        <tr class="noborder">
          <td colspan="2" class="required">
            <label for="apikey" class="validation"><?php echo $lang['nc_admin_push_apikey'];?>:</label>
          </td>
        </tr>       
        <tr class="noborder">
          <td class="vatop rowform"><input id="apikey" name="apikey" class="txt" type="text" value="<?php echo $output['apikey'];?>"/></td>
          <td class="vatop tips"><span class="vatop rowform"><?php echo '';?></span></td>
        </tr>
        <!-- Secret Key -->
        <tr class="noborder">
          <td colspan="2" class="required"><label for="secretkey" class="validation"><?php echo $lang['nc_admin_push_secretkey'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input id="secretkey" name="secretkey" class="txt" type="text" value="<?php echo $output['secretkey'];?>"/></td>
          <td class="vatop tips"><span class="vatop rowform"><?php echo '';?></span></td>
        </tr>
      </tbody>
      <tfoot id="submit-holder">
        <tr class="tfoot">
          <td colspan="2" ><a href="JavaScript:void(0);" class="btn" id="submitBtn"><span><?php echo $lang['nc_submit'];?></span></a></td>
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
  } else {
    alert( '没通过！' );
  }
  });
});
//
$(document).ready(function(){
  $('#link_form').validate({
        errorPlacement: function(error, element){
           error.appendTo(element.parentsUntil('tr').parent().prev().find('td:first'))   ;
        },
        rules : {
          apikey : {
                required : true,
                maxlength : 40
            },
            secretkey  : {
                required : true,
                number   : false,
                checkPrice  : false
            }
        },
        messages : {
          apikey : {
                required : '<?php echo $lang['app_home_add_null'];?>',
                maxlength : '<?php echo $lang['app_home_add_maxlength'];?>'
            },
            secretkey  : {
                required : '<?php echo $lang['app_home_add_null'];?>',
                number   : '<?php echo $lang['app_home_add_price_int'];?>',
                //min : '最小值不可小于0.01',
                //max  : '最大值不可大于9999999',
            }, 
        }
    });
});
</script> 
<script type="text/javascript">
$(function(){
  $("#goods_thumb").change(function(){
  $("#textfield2").val($("#goods_thumb").val());
});
});
</script>
