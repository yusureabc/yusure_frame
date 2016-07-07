<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<div class="page">
   <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['dis_index'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=distribute&op=levellist" ><span><?php echo $lang['dis_level_manage'];?></span></a></li>
       	   <li><a href="index.php?act=distribute&op=addlevel" ><span><?php echo $lang['dis_level_add'];?></span></a></li>
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['dis_edit_level'];?></span></a></li>
      </ul>
    </div>
  </div>
  
  
  
  <div class="fixed-empty"></div>
  <form method="post" enctype="multipart/form-data" name="form1" id="link_form" >
  	<input type="hidden" name="act" value="distribute">
  	<input type="hidden" name="op" value="editlevel">
  	<input type="hidden" id="level_flag" name="level_flag" value="<?php echo $output['content']['level_id']?>">
    <table class="table tb-type2">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required">
            <label for="goods_title" class="validation"><?php echo $lang['dis_level_name']?>:</label>
          </td>
        </tr>       
        <tr class="noborder">
          <td class="vatop rowform"><input id="level_name" name="level_name" class="txt" type="text"  value="<?php echo $output['content']['level_name']?>"/><font style="color:red"><?php echo $lang['time_unit']?></font></td>
          <td class="vatop tips"><span class="vatop rowform"></span></td>
        </tr>
        <tr class="noborder">
          <td colspan="2" class="required"><label  class="validation"><?php echo $lang['dis_num'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input id="distribute_num" name="distribute_num" class="txt" type="text"  value="<?php echo $output['content']['distribute_num']?>"/></td>
          <td class="vatop tips"><span class="vatop rowform"></span></td>
        </tr>
         <tr class="noborder">
          <td colspan="2" class="required"><label  class="validation"><?php echo $lang['dis_rate'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input id="distribute_rate" name="distribute_rate" class="txt" type="text"  value="<?php echo $output['content']['distribute_rate']?>"/></td>
          <td class="vatop tips"><span class="vatop rowform"></span></td>
        </tr>
         <tr class="noborder">
          <td colspan="2" class="required"><label class="validation"><?php echo $lang['dis_deposit'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input id="deposit" name="deposit" class="txt" type="text"  value="<?php echo $output['content']['deposit']?>"/></td>
          <td class="vatop tips"><span class="vatop rowform"></span></td>
        </tr>
         <tr class="noborder">
          <td colspan="2" class="required"><label class="validation"><?php echo $lang['level_add_up_condition'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
          	<?php echo $lang['dis_has_member_num']?>:<input id="level_up_member" name="level_up_member" class="txt-short" style="width:80px;" type="text"  value="<?php echo $output['content']['level_up_member']?>" />&nbsp;或&nbsp;
            <?php echo $lang['dis_fx_cash']?>:<input id="level_up_consume" name="level_up_consume" class="txt-short" style="width:80px;" type="text" value="<?php echo $output['content']['level_up_consume']?>" />
          </td>
          <td class="vatop tips"><span class="vatop rowform"></span></td>
        </tr>
         <tr class="noborder">
          <td colspan="2" class="required"><label class="validation"><?php echo $lang['dis_grade'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform "><input id="grade" name="grade" class="txt" type="text"  value="<?php echo $output['content']['grade']?>"/></td>
          <td class="vatop tips"><span class="vatop rowform">数值越大，等级越高</span></td>
        </tr>
         <tr class="noborder">
          <td colspan="2" class="required"><label >&nbsp;&nbsp;<?php echo$lang['dis_memo'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><textarea name="memo" id="memo"><?php echo $output['content']['memo']?></textarea></td>
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
           error.appendTo(element.parentsUntil('tr').parent().prev().find('td:first'));
        },
        rules : {
        	level_name : {
                required : true,
                maxlength:20,
                remote:{
            		type:"get",
            		url:"index.php",
            		dataType:"json",
            		data:{
    					act:"distribute",
    					op:"checkexists",
    					level_name:function(){
								return $("#level_name").val();
    					},
    					level_flag:function(){
								return $("#level_flag").val();
        				}
					}
            	}
            },
            distribute_num:{
            	 required : true,
            	 min:0,
            	 number:true
             },
             distribute_rate:{
            	 required : true,
            	 min:0,
            	 number:true,
            	 max:100
             },
             deposit:{
            	 required : true,
            	 min:0,
            	 number:true
             },
             level_up_member:{
            	 required : true,
            	 min:0,
            	 number:true
             },
             level_up_consume:{
            	 required : true,
            	 min:0,
            	 number:true
             },
             grade:{
            	 required : true,
            	 min:1,	
            	 number:true,
            	 remote:{
             		type:"get",
             		url:"index.php",
             		dataType:"json",
             		data:{
     					act:"distribute",
     					op:"lev_is_exists",
     					level_grade:function(){
 								return $("#grade").val();
     					},
    					level_flag:function(){
							return $("#level_flag").val();
    					}
 					}
             	}
             }
             

        },
        messages : {
        	level_name : {
                required : '<?php echo $lang['dis_name_required_ts'];?>',
                maxlength:'<?php echo $lang['dis_name_max_ts']  ?>' ,
                remote:'<?php echo $lang['dis_name_exists_ts']?>'
            },
            distribute_num : {
                required : '<?php echo $lang['dis_num_required_ts'];?>',
                number: '<?php echo $lang['dis_num_error']?>',
                min:'<?php echo $lang['dis_num_error']?>'
                
            },
            distribute_rate : {
                required : '<?php echo $lang['dis_rate_required_ts'];?>',
                number: '<?php echo $lang['dis_num_error']?>',
                min:'<?php echo $lang['dis_num_error']?>',
                max:'<?php echo $lang['dis_rate_max']?>' 
            },
            deposit : {
                required : '<?php echo $lang['dis_deposit_required_ts'];?>',
                number: '<?php echo $lang['dis_num_error']?>',
                min:'<?php echo $lang['dis_num_error']?>',
            },
            level_up_member:{
              	 required : '<?php echo $lang['dis_level_member_require']?>',
              	 min:'<?php echo $lang['dis_num_error']?>',
              	 number:'<?php echo $lang['dis_num_error']?>'
               },
               level_up_consume:{
              	 required : '<?php echo $lang['dis_level_member_consume']?>',
              	 min:'<?php echo $lang['dis_num_error']?>',
              	 number:'<?php echo $lang['dis_num_error']?>'
               },
               grade:{
                 	 required : '<?php echo $lang['grade_require']?>',
                      min:'<?php echo $lang['grade_require']?>',
                      number:'<?php echo $lang['grade_require']?>',
                      remote:'<?php echo $lang['grade_isexists']?>'
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
