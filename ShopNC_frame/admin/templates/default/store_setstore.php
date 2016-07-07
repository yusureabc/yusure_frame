<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<div class="page">
   <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['store'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=store&op=store" ><span><?php echo $lang['store_mng'];?></span></a></li>
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['store_set_store']?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form method="post" enctype="multipart/form-data" name="form1" id="link_form" >
  	<input type="hidden" name="act" value="store">
  	<input type="hidden" name="op" value="add_distribute_store">
  	<input type="hidden" name="flag_store_id" value="<?php echo $output['store_info']['store_id']?>">
    <table class="table tb-type2">
      <tbody>
      	<tr class="noborder">
      		<td colspan="2" class="required">
      			<label for="for_store_name" class="validation"><?php echo $lang['store_name'];?>:</label>
      		</td>
      	</tr>
      	 <tr class="noborder">
          <td class="vatop rowform"><input id="store_name" name="store_name" class="txt" type="text"  value="<?php echo $output['store_s']['store_name'];?>" readonly="readonly"/></td>
          <td class="vatop tips"><span class="vatop rowform"></span></td>
        </tr>
        <tr class="noborder">
      		<td colspan="2" class="required">
      			<label for="for_member_name" class="validation"><?php echo $lang['store_member_name'];?>:</label>
      		</td>
      	</tr>
      	 <tr class="noborder">
          <td class="vatop rowform"><input id="member_name" name="member_name" class="txt" type="text"  value="<?php echo $output['mem_info']['member_name']?>" readonly="readonly"/></td>
          <td class="vatop tips"><span class="vatop rowform"></span></td>
        </tr>
         <tr class="noborder">
      		<td colspan="2" class="required">
      			<label for="for_store_baozhrmb" class="validation"><?php echo $lang['store_baozhj'];?>:</label>
      		</td>
      	</tr>
      	 <tr class="noborder">
          <td class="vatop rowform"><input id="store_mdbaozhrmb" name="store_mdbaozhrmb" class="txt" type="text"  value="<?php echo $output['store_s']['store_mdbaozhrmb'];?>" /></td>
          <td class="vatop tips"><span class="vatop rowform"></span></td>
        </tr>
         <tr class="noborder">
      		<td colspan="2" class="required">
      			<label for="for_store_pb_amount" class="validation"><?php echo $lang['store_pb_amount'];?>:</label>
      		</td>
      	</tr>
      	 <tr class="noborder">
          <td class="vatop rowform"><input id="store_pb_amount" name="store_pb_amount" class="txt" type="text"  value="<?php echo $output['mem_info']['pb_amount']?>" /></td>
          <td class="vatop tips"><span class="vatop rowform"></span></td>
        </tr>
         <tr class="noborder">
      		<td colspan="2" class="required">
      			<label for="for_store_baozhrmb" class="validation"><?php echo $lang['store_level'];?>:</label>
      		</td>
      	</tr>
      	 <tr class="noborder">
          <td class="vatop rowform">
          	<select name="mem_level">
          		<?php foreach ($output['level_arr'] as $key =>$val){?>
          			<option value=<?php echo $val['level_id']?> <?php if($val['level_id']==$output['mem_level']) echo "selected"?>><?php echo $val['level_name']."-第".$val['grade']."级-"."--".$val['distribute_rate']."%"?></option>
          		<?php }?>
          	</select>
          </td>
          <td class="vatop tips"><span class="vatop rowform"></span></td>
        </tr>
         <tr class="noborder">
      		<td colspan="2" class="required">
      			<label for="for_store_baozhrmb" class="validation"><?php echo $lang['is_open_storesys'];?>:</label>
      		</td>
      	</tr>
      	 <tr class="noborder">
          <td class="vatop rowform">
          	<input type="radio" name="is_open_store_sys"  value="1" <?php if($output['store_info']['the_store']=="1") echo "checked" ;?>/><?php echo $lang['open_storesys'];?>&nbsp;&nbsp;
          	<input type="radio" name="is_open_store_sys"  value="0" <?php if($output['store_info']['the_store']=="0") echo "checked" ;?>/><?php echo $lang['close_storesys'];?>
          </td>
          <td class="vatop tips"><span class="vatop rowform"></span></td>
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
        	store_mdbaozhrmb:{
            	 required : true,
            	 min:0,
            	 number:true
             },
             store_pb_amount:{
            	 required : true,
            	 min:0,
            	 number:true
             }
        },
        messages : {
        	store_mdbaozhrmb : {
                required : '<?php echo $lang['store_baozhj_isreq'];?>',
                min:'<?php echo $lang['store_baozhj_isreq']  ?>' ,
                number:'<?php echo $lang['store_baozhj_isreq']?>'
            },
            store_pb_amount : {
                required : '<?php echo $lang['store_pb_isreq'];?>',
                number: '<?php echo $lang['store_pb_isreq']?>',
                min:'<?php echo $lang['store_pb_isreq']?>'
                
            }
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
