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
          <td colspan="2" class="required"><label class="validation" for="goods_name"><?php echo $lang['goods_name'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" name="goods_name" id="goods_name" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
      </tbody>
        <tbody>
         <tr class="noborder">
          <td colspan="2" class="required"><label for="goods_slogan_one"><?php echo $lang['goods_slogan_one'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" name="goods_slogan_one" id="goods_slogan_one" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
      </tbody>
        <tbody>
         <tr class="noborder">
          <td colspan="2" class="required"><label for="goods_slogan_two"><?php echo $lang['goods_slogan_two'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" name="goods_slogan_two" id="goods_slogan_two" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
      </tbody>
       <tbody>
         <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="goods_price"><?php echo $lang['goods_price'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" name="goods_price" id="goods_price" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
      </tbody>
      <tbody>
         <tr>
          <td colspan="2" class="required"><label class="validation" for="goods_pic"><?php echo $lang['goods_pic'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
          <span class="type-file-box">
            <input type="file" name="goods_pic" id="goods_pic" class="type-file-file" size="30" >
          </span>  
            </td>
          <td class="vatop tips"><?php echo $lang['link_add_sign'];?></td>
        </tr>
      </tbody>
      <tbody id="product_url">
        <tr>
          <td colspan="2" class="required"><label class="validation" for="goods_url"><?php echo $lang['goods_url'];?>: </label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" name="goods_url" class="txt" id="goods_url"></td>
        </tr>
      </tbody>
      <tbody>
         <tr class="noborder">
          <td colspan="2" class="required"><label for="goods_introduce"><?php echo $lang['goods_introduce'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><textarea name="goods_introduce" id="goods_introduce" class="tarea"></textarea></td>
          <td class="vatop tips"></td>
        </tr>
      </tbody>
      <tbody id="product_sort">
        <tr>
          <td colspan="2" class="required"><label class="validation" for="goods_sort"><?php echo $lang['goods_sort'];?>: </label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" name="goods_sort" class="txt" id="goods_sort"></td>
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
        	goods_name : {
                required : true
            },
            goods_price : {
                required : true,
                number   : true,
                min : 0.01,
                max : 9999999,
                checkPrice  : false
            },
            goods_pic  : {
                required : true,
            },
            goods_url : {
              required : true,
            },
            goods_sort : {
              required : true,
              number : true, 
            },
            goods_introduce : {
              maxlength : 100
            }
        },
        messages : {
        	goods_name : {
                required : '<?php echo $lang['goods_name_not_null'];?>'
            },
            goods_price : {
                required : '<?php echo $lang['goods_price_not_null'];?>',
               number:'<?php echo $lang['goods_price_double'];?>',
               min:'<?php echo $lang['min'];?>',
               max:'<?php echo $lang['max'];?>',
            },
            goods_pic  : {
                required : '<?php echo $lang['goods_pic_not_null']; ?>'
            },
             goods_url : {
              required : '<?php echo $lang['goods_linkurl_not_null']; ?>',
            },
            goods_sort : {
               required : '<?php echo $lang['goods_sort_not_null']; ?>',
               number : '<?php echo $lang['goods_sort_number'];?>',
            },
            goods_introduce :{
               maxlength : '<?php echo $lang['goods_introduce_max'];?>'
            }
        }
    });
});
</script>
<script type="text/javascript">
$(function(){
    var textButton="<input type='text' name='textfield' id='textfield1' class='type-file-text' /><input type='button' name='button' id='button1' value='' class='type-file-button' />"
  $(textButton).insertBefore("#goods_pic");
  $("#goods_pic").change(function(){
  $("#textfield1").val($("#goods_pic").val());
});
});
</script>
