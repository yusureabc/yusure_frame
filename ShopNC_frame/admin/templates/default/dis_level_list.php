<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['dis_index'];?></h3>
      <ul class="tab-base">
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['dis_level_manage'];?></span></a></li>
        <li><a href="index.php?act=distribute&op=addlevel" ><span><?php echo $lang['dis_level_add'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form method="get" name="formSearch" id="formSearch" action="index.php">
  <input type="hidden" value="distribute" name="act">
  <input type="hidden" value="levellist" name="op">
  <table class="tb-type1 noborder search">
  <tbody>
  	<tr>
  		<td>
  			<label><?php echo $lang['dis_level_name']?></label>
  		</td>
  		<td>
  			<input type="text" value="<?php echo $output['dis_level_name']?>" name="level_name" id="level_name" class="txt">
  		</td>
  		<td>
  			<label><?php echo $lang['dis_num']?></label>
  		</td>
  		<td>
  			<input type="text" value="<?php echo $output['dis_num']?>" name="distribute_num" id="distribute_num" class="txt">
  		</td>
  		<td>
  			<label><?php echo $lang['dis_rate']?></label>
  		</td>
  		<td>
  			<input type="text" value="<?php echo $output['dis_rate']?>" name="distribute_rate" id="distribute_rate" class="txt">
  		</td>
  		<td>
  			 <a href="javascript:void(0);" id="searches" class="btn-search " title="<?php echo $lang['nc_query'];?>">&nbsp;</a>
  		</td>
  	</tr>
   </tbody>
  </table>
  </form>
   <table class="table tb-type2" id="prompt">
    <tbody>
      <tr class="space odd">
        <th colspan="12"><div class="title">
            <h5><?php echo $lang['nc_prompts'];?></h5>
            <span class="arrow"></span></div></th>
      </tr>
      <tr>
        <td><ul>
            <li><?php echo $lang['store_help1'];?></li>
          </ul></td>
      </tr>
    </tbody>
  </table>
  <form method="post" id="store_form">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2">
      <thead>
      	<tr class="thead">
      		<th>&nbsp;</th>
      		<th ><?php echo $lang['dis_level_name']?></th>
      		<th ><?php echo $lang['dis_num']?></th>
      		<th ><?php echo $lang['dis_rate']?></th>
      		<th ><?php echo $lang['dis_deposit']?></th>
      		<th><?php echo $lang['dis_up_member_required']?></th>
      		<th><?php echo $lang['dis_up_consume_required']?></th>
      		<th><?php echo $lang['fexiao_level'];?></th>
      		<th ><?php echo $lang['dis_memo']?></th>
      		<th ><?php echo $lang['dis_operate']?></th>
      	</tr>
      	</thead>
      	<tbody>
      		<?php foreach($output['levellist'] as $val){?>
      			<tr>
      				<td>&nbsp;</td>
      				<td><?php echo $val['level_name'];?></td>
      				<td><?php echo $val['distribute_num'];?></td>
      				<td><?php echo $val['distribute_rate'];?>%</td>
      				<td>&nbsp;<?php echo $val['deposit'];?></td>
      				<td><?php echo $val['level_up_member'];?></td>
      				<td><?php echo $val['level_up_consume'];?></td>
      				<td><?php echo $val['grade']?></td>
      				<td>&nbsp;<?php echo $val['memo'];?></td>
      				<td><a  href="index.php?act=distribute&op=editlevel&level_id=<?php echo $val['level_id']?>" ><?php echo $lang['dis_eidt'];?></a> | 
      				<a class="del" href="index.php?act=distribute&op=deletelevel&level_id=<?php echo $val['level_id']?>"><?php echo $lang['dis_delete'];?></a></td>
      			</tr>
      		<?php }?>
      	</tbody>
     	<tfoot>
     		<tr>
     			<td colspan="9"><div class="pagination"><?php echo $output['pages'];?></div></td>
     		</tr>
     	</tfoot>
    </table>
  </form>
</div>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.edit.js" charset="utf-8"></script>
<script>
$(function(){
	$("#searches").click(function(){
		$('input[name="op"]').val('levellist');
		$("#formSearch").submit();
	});
	$(".del").click(function(){
		if(confirm("您确定要删除数据吗？")){
			return true;
		}else{
			return false;
		}
	});
})
</script>
