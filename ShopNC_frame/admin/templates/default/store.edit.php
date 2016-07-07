<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<style type="text/css">
.d_inline {
	display:inline;
}
</style>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['store'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=store&op=store"><span><?php echo $lang['manage'];?></span></a></li>
        <li><a href="index.php?act=store&op=store_joinin"><span><?php echo $lang['pending'];?></span></a></li>
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['nc_edit'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="store_form" method="post">
    <input type="hidden" name="form_submit" value="ok" />
    <input type="hidden" name="store_id" value="<?php echo $output['store_array']['store_id'];?>" />
    <input type="hidden" name="seller_name" value="<?php echo $output['store_array']['seller_name'];?>" />
   	<input type="hidden" name="member_id" value="<?php echo $output['store_array']['member_id'];?>" />
    <table class="table tb-type2">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label><?php echo $lang['store_user_name'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><?php echo $output['store_array']['member_name'];?></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label class="validation" for="store_name"> <?php echo $lang['store_name'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['store_array']['store_name'];?>" id="store_name" name="store_name" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
    	<tr>
          <td colspan="2"><label class="validation" for="parent_username"> <?php echo $lang['parent_username'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['seller_array']['parent_username'];?>" id="parent_username" name="parent_username" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label><?php echo $lang['belongs_class'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><select name="sc_id">
              <option value="0"><?php echo $lang['nc_please_choose'];?>...</option>
              <?php if(is_array($output['class_list'])){ ?>
              <?php foreach($output['class_list'] as $k => $v){ ?>
              <option <?php if($output['store_array']['sc_id'] == $v['sc_id']){ ?>selected="selected"<?php } ?> value="<?php echo $v['sc_id']; ?>"><?php echo $v['sc_name']; ?></option>
              <?php } ?>
              <?php } ?>
            </select></td>
          <td class="vatop tips"></td>
        </tr>
      </tbody>
      <tbody>
        <tr>
          <td colspan="2" class="required"><label>
            <label for="grade_id"> <?php echo $lang['belongs_level'];?>: </label>
            </label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><select id="grade_id" name="grade_id">
              <?php if(is_array($output['grade_list'])){ ?>
              <?php foreach($output['grade_list'] as $k => $v){ ?>
              <option <?php if($output['store_array']['grade_id'] == $v['sg_id']){ ?>selected="selected"<?php } ?> value="<?php echo $v['sg_id']; ?>"><?php echo $v['sg_name']; ?></option>
              <?php } ?>
              <?php } ?>
            </select></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label><?php echo $lang['period_to'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['store_array']['store_end_time'];?>" id="end_time" name="end_time" class="txt date"></td>
          <td class="vatop tips"><?php echo $lang['formart'];?></td>
        </tr>
<!--店铺保障开-sxppx QQ:1366800400-->
<td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="store_tq">店铺保障服务开关:</label></td>
        </tr>
        <tr>
			<td width="70%">
				<div class="onoff" style="float:left;margin-right:10px;">
					<label for="store_baozh1" class="cb-enable <?php if($output['store_array']['store_baozh'] == '1'){ ?>selected<?php } ?>" ><span>保障</span></label>
					<label for="store_baozh0" class="cb-disable <?php if($output['store_array']['store_baozh'] == '0'){ ?>selected<?php } ?>" ><span>图标</span></label>
					<input id="store_baozh1" name="store_baozh" <?php if($output['store_array']['store_baozh'] == '1'){ ?>checked="checked"<?php } ?> value="1" type="radio">
					<input id="store_baozh0" name="store_baozh" <?php if($output['store_array']['store_baozh'] == '0'){ ?>checked="checked"<?php } ?> value="0" type="radio">
				</div>
				<div class="onoff" style="float:left;margin-right:10px;">
					<label for="store_baozhopen1" class="cb-enable <?php if($output['store_array']['store_baozhopen'] == '1'){ ?>selected<?php } ?>" ><span>保证金</span></label>
					<label for="store_baozhopen0" class="cb-disable <?php if($output['store_array']['store_baozhopen'] == '0'){ ?>selected<?php } ?>" ><span>图标</span></label>
					<input id="store_baozhopen1" name="store_baozhopen" <?php if($output['store_array']['store_baozhopen'] == '1'){ ?>checked="checked"<?php } ?> value="1" type="radio">
					<input id="store_baozhopen0" name="store_baozhopen" <?php if($output['store_array']['store_baozhopen'] == '0'){ ?>checked="checked"<?php } ?> value="0" type="radio">
					<!--保证金-->
					&nbsp;<input type="text" value="<?php echo $output['store_array']['store_baozhrmb'];?>" id="store_tq" name="store_baozhrmb" class="txt"  style="width: 50px;color:red;font-weight:900;">元
				</div>
			</td>
		</tr>

        <tr>
          <td colspan="2" class="required"><label for="store_tq">保障内容开关:</label></td>
        </tr>		
		<tr>
			<td width="70%">
				<div class="onoff" style="float:left;margin-right:10px;">
					<label for="store_zhping1" class="cb-enable <?php if($output['store_array']['store_zhping'] == '1'){ ?>selected<?php } ?>" ><span>正品</span></label>
					<label for="store_zhping0" class="cb-disable <?php if($output['store_array']['store_zhping'] == '0'){ ?>selected<?php } ?>" ><span>保障</span></label>
					<input id="store_zhping1" name="store_zhping" <?php if($output['store_array']['store_zhping'] == '1'){ ?>checked="checked"<?php } ?> value="1" type="radio">
					<input id="store_zhping0" name="store_zhping" <?php if($output['store_array']['store_zhping'] == '0'){ ?>checked="checked"<?php } ?> value="0" type="radio">
				</div>
				<div class="onoff" style="float:left;margin-right:10px;">
					<label for="store_shiti1" class="cb-enable <?php if($output['store_array']['store_shiti'] == '1'){ ?>selected<?php } ?>" ><span>实体</span></label>
					<label for="store_shiti0" class="cb-disable <?php if($output['store_array']['store_shiti'] == '0'){ ?>selected<?php } ?>" ><span>店铺</span></label>
					<input id="store_shiti1" name="store_shiti" <?php if($output['store_array']['store_shiti'] == '1'){ ?>checked="checked"<?php } ?> value="1" type="radio">
					<input id="store_shiti0" name="store_shiti" <?php if($output['store_array']['store_shiti'] == '0'){ ?>checked="checked"<?php } ?> value="0" type="radio">
				</div>
				<div class="onoff" style="float:left;margin-right:10px;">
					<label for="store_qtian1" class="cb-enable <?php if($output['store_array']['store_qtian'] == '1'){ ?>selected<?php } ?>" ><span>七天</span></label>
					<label for="store_qtian0" class="cb-disable <?php if($output['store_array']['store_qtian'] == '0'){ ?>selected<?php } ?>" ><span>退换</span></label>
					<input id="store_qtian1" name="store_qtian" <?php if($output['store_array']['store_qtian'] == '1'){ ?>checked="checked"<?php } ?> value="1" type="radio">
					<input id="store_qtian0" name="store_qtian" <?php if($output['store_array']['store_qtian'] == '0'){ ?>checked="checked"<?php } ?> value="0" type="radio">
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="onoff" style="float:left;margin-right:10px;">
					<label for="store_tuihuo1" class="cb-enable <?php if($output['store_array']['store_tuihuo'] == '1'){ ?>selected<?php } ?>" ><span>退换</span></label>
					<label for="store_tuihuo0" class="cb-disable <?php if($output['store_array']['store_tuihuo'] == '0'){ ?>selected<?php } ?>" ><span>承诺</span></label>
					<input id="store_tuihuo1" name="store_tuihuo" <?php if($output['store_array']['store_tuihuo'] == '1'){ ?>checked="checked"<?php } ?> value="1" type="radio">
					<input id="store_tuihuo0" name="store_tuihuo" <?php if($output['store_array']['store_tuihuo'] == '0'){ ?>checked="checked"<?php } ?> value="0" type="radio">
				</div>
				<div class="onoff" style="float:left;margin-right:10px;">
					<label for="store_shiyong1" class="cb-enable <?php if($output['store_array']['store_shiyong'] == '1'){ ?>selected<?php } ?>" ><span>试用</span></label>
					<label for="store_shiyong0" class="cb-disable <?php if($output['store_array']['store_shiyong'] == '0'){ ?>selected<?php } ?>" ><span>中心</span></label>
					<input id="store_shiyong1" name="store_shiyong" <?php if($output['store_array']['store_shiyong'] == '1'){ ?>checked="checked"<?php } ?> value="1" type="radio">
					<input id="store_shiyong0" name="store_shiyong" <?php if($output['store_array']['store_shiyong'] == '0'){ ?>checked="checked"<?php } ?> value="0" type="radio">
				</div>
				<div class="onoff" style="float:left;margin-right:10px;">
					<label for="store_erxiaoshi1" class="cb-enable <?php if($output['store_array']['store_erxiaoshi'] == '1'){ ?>selected<?php } ?>" ><span>2H</span></label>
					<label for="store_erxiaoshi0" class="cb-disable <?php if($output['store_array']['store_erxiaoshi'] == '0'){ ?>selected<?php } ?>" ><span>发货</span></label>
					<input id="store_erxiaoshi1" name="store_erxiaoshi" <?php if($output['store_array']['store_erxiaoshi'] == '1'){ ?>checked="checked"<?php } ?> value="1" type="radio">
					<input id="store_erxiaoshi0" name="store_erxiaoshi" <?php if($output['store_array']['store_erxiaoshi'] == '0'){ ?>checked="checked"<?php } ?> value="0" type="radio">
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="onoff" style="float:left;margin-right:10px;">
					<label for="store_huodaofk1" class="cb-enable <?php if($output['store_array']['store_huodaofk'] == '1'){ ?>selected<?php } ?>" ><span>货到</span></label>
					<label for="store_huodaofk0" class="cb-disable <?php if($output['store_array']['store_huodaofk'] == '0'){ ?>selected<?php } ?>" ><span>付款</span></label>
					<input id="store_huodaofk1" name="store_huodaofk" <?php if($output['store_array']['store_huodaofk'] == '1'){ ?>checked="checked"<?php } ?> value="1" type="radio">
					<input id="store_huodaofk0" name="store_huodaofk" <?php if($output['store_array']['store_huodaofk'] == '0'){ ?>checked="checked"<?php } ?> value="0" type="radio">
				</div>
				<div class="onoff" style="float:left;margin-right:10px;">
					<label for="store_xiaoxie1" class="cb-enable <?php if($output['store_array']['store_xiaoxie'] == '1'){ ?>selected<?php } ?>" ><span>消费者</span></label>
					<label for="store_xiaoxie0" class="cb-disable <?php if($output['store_array']['store_xiaoxie'] == '0'){ ?>selected<?php } ?>" ><span>保障</span></label>
					<input id="store_xiaoxie1" name="store_xiaoxie" <?php if($output['store_array']['store_xiaoxie'] == '1'){ ?>checked="checked"<?php } ?> value="1" type="radio">
					<input id="store_xiaoxie0" name="store_xiaoxie" <?php if($output['store_array']['store_xiaoxie'] == '0'){ ?>checked="checked"<?php } ?> value="0" type="radio">
				</div>
			</td>
		</tr>
<!--店铺保障-sxppx QQ:1366800400-->	
        <tr>
          <td colspan="2" class="required"><label>
            <label for="state"><?php echo $lang['state'];?>:</label>
            </label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform onoff"><label for="store_state1" class="cb-enable <?php if($output['store_array']['store_state'] == '1'){ ?>selected<?php } ?>" ><span><?php echo $lang['open'];?></span></label>
            <label for="store_state0" class="cb-disable <?php if($output['store_array']['store_state'] == '0'){ ?>selected<?php } ?>" ><span><?php echo $lang['close'];?></span></label>
            <input id="store_state1" name="store_state" <?php if($output['store_array']['store_state'] == '1'){ ?>checked="checked"<?php } ?> onclick="$('#tr_store_close_info').hide();" value="1" type="radio">
            <input id="store_state0" name="store_state" <?php if($output['store_array']['store_state'] == '0'){ ?>checked="checked"<?php } ?> onclick="$('#tr_store_close_info').show();" value="0" type="radio"></td>
          <td class="vatop tips"></td>
        </tr>
      </tbody>
      <tbody id="tr_store_close_info">
        <tr >
          <td colspan="2" class="required"><label for="store_close_info"><?php echo $lang['close_reason'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><textarea name="store_close_info" rows="6" class="tarea" id="store_close_info"><?php echo $output['store_array']['store_close_info'];?></textarea></td>
          <td class="vatop tips"></td>
        </tr>
      </tbody>
        <tr>
          <td colspan="2" class="required"><label>
            <label for="state"><?php echo $lang['allow_licence'];?>:</label>
            </label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform onoff"><label for="allow_licence1" class="cb-enable <?php if($output['store_array']['allow_licence'] == '1'){ ?>selected<?php } ?>" ><span><?php echo $lang['open'];?></span></label>
            <label for="allow_licence0" class="cb-disable <?php if($output['store_array']['allow_licence'] == '0'){ ?>selected<?php } ?>" ><span><?php echo $lang['close'];?></span></label>
            <input id="allow_licence1" name="allow_licence" <?php if($output['store_array']['allow_licence'] == '1'){ ?>checked="checked"<?php } ?> value="1" type="radio">
            <input id="allow_licence0" name="allow_licence" <?php if($output['store_array']['allow_licence'] == '0'){ ?>checked="checked"<?php } ?> value="0" type="radio"></td>
          <td class="vatop tips"></td>
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
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/common_select.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/jquery.ui.js"></script>
<script src="<?php echo RESOURCE_SITE_URL."/js/jquery-ui/i18n/zh-CN.js";?>" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/themes/ui-lightness/jquery.ui.css"  />


<script type="text/javascript">
var SITEURL = "<?php echo SHOP_SITE_URL; ?>";
function del_auth(key){
var store_id='<?php echo $output['store_array']['store_id'];?>';
	$.get("index.php?act=store&&op=del_auth",{'key':key,'store_id':store_id},function(date){
		if(date){
			$("#"+key).remove();
			$("#"+key+"_del").remove();
			alert('<?php echo $lang['certification_del_success'];?>');
		}
		else{
			alert('<?php echo $lang['certification_del_fail'];?>');
		}
	});
}
$(function(){

	$('#end_time').datepicker();
	$('input[name=store_state][value=<?php echo $output['store_array']['store_state'];?>]').trigger('click');
	regionInit("region");
	$('input[class="edit_region"]').click(function(){
		$(this).css('display','none');
		$(this).parent().children('select').css('display','');
		$(this).parent().children('span').css('display','none');
	});

  $('input[name=allow_licence][value=<?php echo $output['store_array']['allow_licence'];?>]').trigger('click');
  regionInit("region");
  $('input[class="edit_region"]').click(function(){
    $(this).css('display','none');
    $(this).parent().children('select').css('display','');
    $(this).parent().children('span').css('display','none');
  });
//按钮先执行验证再提交表单

	$("#submitBtn").click(function(){
    	if($("#store_form").valid()){
    		$("#store_form").submit();
		}
	});

//
	$('#store_form').validate({
		errorPlacement: function(error, element){
			error.appendTo(element.parentsUntil('tr').parent().prev().find('td:first'));
        },

		rules : {
			store_name: {
				required : true
			}
		},
		messages : {
			store_name: {
				required: '<?php echo $lang['please_input_store_name'];?>'
			}
		}
	});
});
</script>
