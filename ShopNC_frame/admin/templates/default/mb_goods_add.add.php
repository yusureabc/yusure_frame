<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['app_goods_home_title'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=mb_goods&op=mb_goods_list" ><span><?php echo $lang['nc_manage'];?></span></a>
        </li>
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['nc_new'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form method="post" enctype="multipart/form-data" name="form1" id="link_form">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2">
      <tbody>
         <!-- 标题 -->
        <tr class="noborder">
          <td colspan="2" class="required">
            <label for="goods_title" class="validation"><?php echo $lang['app_goods_title'];?>:</label>
          </td>
        </tr>       
        <tr class="noborder">
          <td class="vatop rowform"><input id="goods_title" name="goods_title" class="txt" type="text" /></td>
          <td class="vatop tips"><span class="vatop rowform"><?php echo $lang['goods_name_notice'];?></span></td>
        </tr>
        <!-- 价格 -->
        <tr class="noborder">
          <td colspan="2" class="required"><label for="goods_price" class="validation"><?php echo $lang['app_goods_price'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input id="goods_price" name="goods_price" class="txt" type="text" /></td>
          <td class="vatop tips"><span class="vatop rowform"><?php echo $lang['goods_price_notice'];?></span></td>
        </tr>
    	<!-- 折扣 -->
        <tr class="noborder">
          <td colspan="2" class="required"><label for="goods_rebate" ><?php echo $lang['app_goods_rebate'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input id="goods_rebate" name="goods_rebate" class="txt" type="text" /></td>
          <td class="vatop tips"><span class="vatop rowform"><?php echo $lang['goods_rebate_notice'];?></span></td>
        </tr>
        <!-- 排序 -->
        <tr class="noborder">
          <td colspan="2" class="required"><label for="goods_sort"><?php echo $lang['app_goods_sort'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input id="goods_sort" name="goods_sort" class="txt" type="text" value="255"/></td>
          <td class="vatop tips"><span class="vatop rowform"><?php echo $lang['goods_sort_notice'];?></span></td>
        </tr>
        <!-- 背景颜色 -->
        <tr class="space">
          <th colspan="2"><?php echo $lang['cms_goods_background'];?></th>
        </tr>
        <tr>
          <td colspan="2" class="required"><?php echo $lang['cms_goods_background'];?></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input class="txt" name="goods_color" type="color" /></td>
          <td class="vatop tips"><span class="vatop rowform"><?php echo $lang['cms_goods_color_explain'];?></span></td>
        </tr>
         <!-- 图片地址 -->
        <tr>
          <td colspan="2" class="required"><label for="goods_thumb" class="validation"><?php echo $lang['app_goods_image'];?>:</label></td>
        </tr>
        <tr class="noborder">
              <td class="vatop rowform">

            <span class="type-file-box">
                <input type='text' name='textfield2' id='textfield2' class='type-file-text' />
                <input type='button' name='button2' id='button2' value='' class='type-file-button' />
              <input name="goods_thumb" type="file" class="type-file-file" id="goods_thumb" size="30" />
            </span>
          </td>
          <td class="vatop tips"><span class="vatop rowform"><?php echo $lang['goods_thumb_notice'];?></span></td>
        </tr>
		<!--图片位置标记-->
        <tr class="noborder">
          <td colspan="2" class="required"><label for="goods_position"><?php echo $lang['app_goods_position'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <!-- <input id="goods_index" name="goods_index" class="txt" type="checkbox" value="0" onclick='change()'/> -->
            <select id="goods_position" name="goods_position" >
              <option value="0" selected="selected">小</option>
              <option value="1" >大</option>
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
          <!-- 关联产品id -->
          <td class="vatop rowform"><input id="goods_link" name="goods_link" class="txt" type="text" /></td>
          <td class="vatop tips">
            <span class="vatop rowform">
              <?php echo $lang['goods_link_notice'];?>
            </span>
          </td>
        </tr>
        <!--广告类型-->
        <tr class="noborder">
          <td colspan="2" class="required"><label for="goods_index"><?php echo $lang['app_goods_index'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <!-- <input id="goods_index" name="goods_index" class="txt" type="checkbox" value="0" onclick='change()'/> -->
            <select id="goods_index" name="goods_index" >
              <option value="0" selected="selected">热销新品</option>
              <option value="1" >抢购专区</option>
	            <option value="2" >掌上特惠</option>
	            <option value="3" >热门商品</option>
	            <option value="4" >高一品自营</option>
	            <option value="5" >横幅logo</option>
	            <option value="7" >潮.青春</option>
	            <option value="8" >享.美味</option>
	            <option value="9" >品.人生</option>
	            <option value="10" >智.生活</option>
	            <option value="11" >童心肆起</option>
            </select>
          </td>
          <td class="vatop tips">
            <span class="vatop rowform">
              <?php echo $lang['goods_index_notice'];?>
            </span>
          </td>
        </tr>
        <!--类型end-->
        
        <!-- 访问方式 -->
        <tr>
          <td colspan="2" class="required"><label class="validation" for="goods_link_access_mode"> 访问方式:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <select name="goods_link_access_mode" id="goods_link_access_mode">
                <option value="1">商铺</option>
                <option value="2">商品</option>
                <option value="3">分类</option>
                <option value="4">关键词</option>
                <option value="5">网址</option>
            	<option value="6" >专题</option>
            </select>
          </td>
          <td class="vatop tips"><?php echo $lang['link_add_category'];?></td>
        </tr>
        <!--end-->
        <tr>
          <td colspan="2" class="required"><label for="goods_introduce" class="validation"><?php echo $lang['app_goods_introduce'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><textarea name="goods_introduce" rows="6" class="tarea" id="goods_introduce"></textarea></td>
          <td class="vatop tips"><span class="vatop rowform"><?php echo $lang['goods_introduce_notice'];?></span></td>
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
    //alert( '没通过！' );
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
          goods_title : {
                required : true,
                maxlength : 20
            },
            goods_price  : {
                required : true,
                number   : true,
                min : 0.01,
                max : 9999999,
                checkPrice  : false
            },
            goods_thumb : {
                required : true
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
                number   : true
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
                max  : '最大值不可大于9999999',
            },
            goods_thumb  : {
                required  :  '<?php echo $lang['app_home_add_null'];?>'
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
                number   : '<?php echo $lang['app_home_add_sort_int'];?>'
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
