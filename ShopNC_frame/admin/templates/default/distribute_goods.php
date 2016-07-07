<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['dis_goods_setting'];?></h3>
    </div>
  </div>
  <div class="fixed-empty"></div>
   <form method="post" enctype="multipart/form-data" name="form1" id="link_form" action="index.php?act=distribute&op=dis_goodsmng">
  	<input type="hidden" name="commons" value="<?php echo $output['common_info']['goods_commonid']?>">
  	<input type="hidden" name="act" value="distribute">
  	<input type="hidden" name="op" value="dis_goodsmng">
  	<b style="color:red">直接分成比+父级分成比+祖父级分成比=100</b>
  	<?php if(!$output['hastype']){?>
  	<table class="table tb-type2" >
  		<thead>
  			<tr>
  				<th nowrap><?php echo $lang['goods_name']?></th>
  				<th nowrap><?php echo $lang['gyp_price']?></th>	
  				<?php foreach($output['level'] as $key=>$val){?>
  					<th nowrap><?php echo $val['level_name']?><?php echo $lang['goods_price']?></th>
  				<?php } ?>
  				<th nowrap><?php echo $lang['my_distribute_rate']?>(%)</th>
  				<th nowrap><?php echo $lang['parent_distribute_rate']?>(%)</th>
  				<th nowrap><?php echo $lang['grand_distribute_rate']?>(%)</th>
  			</tr>
  		</thead>
  		<tbody>
  			<tr>
  				<td><?php echo $output['common_info']['goods_name']?></td>
  				<td nowrap>￥<?php echo $output['goods_list'][0]['goods_price']?></td>
  				<?php foreach($output['level'] as $key=>$val){?>
  					<td nowrap>￥<input type="text" name="level_<?php echo $output['goods_list'][0]['goods_id']."_".$val['level_id'];?>" value="<?php echo $output['goods_list'][0]['goods_price']*$val['distribute_rate']/100?>"  size="9"></td>
  				<?php }?>
  				<td nowrap><input type="text" name="my_rate_<?php echo $output['goods_list'][0]['goods_id'] ?>"  size="9"></td>
  				<td nowrap><input type="text" name="parent_rate_<?php echo $output['goods_list'][0]['goods_id'] ?>"  size="9"></td>
  				<td nowrap><input type="text" name="grand_rate_<?php echo $output['goods_list'][0]['goods_id'] ?>"  size="9"></td>
  				 <input type="hidden" name="onlyflag[]" value="<?php echo $output['goods_list'][0]['goods_id']?>"> 
  			</tr>
  		</tbody>
  		<tfoot>
  				<tr>
  					<td colspan="<?php echo $output['colspan']?>">
  					<b><?php echo $lang['is_open_distribute']?>:&nbsp;&nbsp;</b>
  						<input type="radio" name="is_open" value="1" <?php if($output['common_info']['is_distribute'] == 1) echo "checked"?>><?php echo $lang['open']?> &nbsp;
  						<input type="radio" name="is_open" value="2" <?php if($output['common_info']['is_distribute'] == 2) echo "checked"?>><?php echo $lang['off']?>
  					</td>
  				</tr>
  				<!--
 				<tr>
 					  <td colspan=4> <a href="JavaScript:void(0);" class="btn subbtn" id="submitBtn"><span><?php echo $lang['nc_submit'];?></span></a></td>
 					 <td colspan="<?php echo $output['colspan']?>"> <a href="JavaScript:void(0);" class="btn subbtn" id="submitBtn"><span><?php echo $lang['nc_submit'];?></span></a></td>
 				</tr>
 				 -->
 			</tfoot>
  	</table>
  	<?php }else {?>
 		<table class="table tb-type2">
 			<thead>
 				<tr>
 					<?php foreach ($output['typearr'] as $key=>$val){?>
 						<th nowrap><?php echo $val?></th>
 					<?php }?>
 					<th nowrap><?php echo $lang['gyp_price']?></th>
 					<?php foreach($output['level'] as $key=>$val){?>
  						<th nowrap><?php echo $val['level_name']?><?php echo $lang['goods_price']?></th>
  					<?php } ?>
  					<th nowrap><?php echo $lang['my_distribute_rate']?>(%)</th>
	  				<th nowrap><?php echo $lang['parent_distribute_rate']?>(%)</th>
	  				<th nowrap><?php echo $lang['grand_distribute_rate']?>(%)</th>
 				</tr>
 			</thead>
 			
 			<tbody>
 				<?php foreach ($output['goods_list']as $key=>$val){?>
 				<tr>
 							<?php foreach ($val['type'] as $k=>$v) {?>
 									<td nowrap><?php echo $v;?></td>
 							<?php }?>
 							<td nowrap>￥<?php echo $val['goods_price']?></td>
 							<?php foreach($output['level'] as $lk=>$lval){?>
			  					<td nowrap>￥<input type="text" name="level_<?php echo $val['goods_id']."_".$lval['level_id'];?>" value="<?php echo  $val['goods_price']*$lval['distribute_rate']/100?>"></td>
			  				<?php }?>
			  				<td nowrap><input type="text" name="my_rate_<?php echo $val['goods_id']?>"></td>
					  		<td nowrap><input type="text" name="parent_rate_<?php echo $val['goods_id']?>"></td>
					  		<td nowrap><input type="text" name="grand_rate_<?php echo $val['goods_id']?>"></td>
					  		 <input type="hidden" name="onlyflag[]" value="<?php echo $val['goods_id']?>">
					  		
 							
 				</tr>
 				<?php }?>
 			</tbody>
 			<tfoot>
 				<tr>
  					<td colspan="<?php echo $output['colspan']?>">
  					<b><?php echo $lang['is_open_distribute']?>:&nbsp;&nbsp;</b>
  						<input type="radio" name="is_open" value="1" <?php if($output['common_info']['is_distribute'] == 1) echo "checked"?>><?php echo $lang['open']?> &nbsp;
  						<input type="radio" name="is_open" value="2" <?php if($output['common_info']['is_distribute'] == 2) echo "checked"?>><?php echo $lang['off']?>
  					</td>
  				</tr>
  				<!--  
 				<tr>
 					 <td colspan="<?php echo $output['colspan']?>"> <a href="JavaScript:void(0);" class="btn subbtn" id="submitBtn"><span><?php echo $lang['nc_submit'];?></span></a></td>
 				</tr>
 				-->
 			</tfoot>
 		</table>
  	<?php }?>
  		<table class="table tb-type2">
  			<tr>
  				<td colspan="4"><h3><?php echo $lang['postage_setting']?></h3></td>
  			</tr>
  			<tr>
  				<td>
  					<?php echo $lang['goods_weight'];?>&nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="goods_weight" >&nbsp;&nbsp;(千克)&nbsp;&nbsp;
  					<?php echo $lang['goods_volume']?>&nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="goods_volume">&nbsp;&nbsp;(立方米)
  				</td>
  			</tr>
  			<tr>
  				<td>
  					 <B><?php echo $lang['dis_postage']?></B>&nbsp;:&nbsp;
  					<input type="radio" name="postage_charging_type" value="1">按件计费&nbsp;&nbsp;
  					<input type="radio" name="postage_charging_type" value="2">按重量计费&nbsp;&nbsp;
  					<input type="radio" name="postage_charging_type" value="3">按体积计费&nbsp;&nbsp;
  					<input type="radio" name="postage_charging_type" value="4">免运费&nbsp;&nbsp;
  				</td>
  			</tr>
  			<tr>
  				<td>
  					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $lang['default']?>:
  					<input type="text" name="postage_default_num">&nbsp;&nbsp;<span class="p_goods_unit">件</span>&nbsp;内,&nbsp;<input type="text" name="postage_default_money">&nbsp;(元)
  				</td>
  			</tr>
  			<tr>
  				<td>
  					 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $lang['per_add']?>:
  					<input type="text" name="postage_add_num">&nbsp;&nbsp;<span class="p_goods_unit">件</span>&nbsp;,&nbsp;增加运费&nbsp;<input type="text" name="postage_add_money">&nbsp;(元)
  				</td>
  			</tr>
  			<tr>
  				<td>
  					<?php echo $lang['for_free']?>:
  					<input type="text" name="free_postage">&nbsp;(元)
  				</td>
  			</tr>

  			<tr>
  				<td>
  					 <B><?php echo $lang['dis_wrap']?></B>&nbsp;:&nbsp;
  					<input type="radio" name="wrap_charging_type" value="1">按件计费&nbsp;&nbsp;
  					<input type="radio" name="wrap_charging_type" value="2">按重量计费&nbsp;&nbsp;
  					<input type="radio" name="wrap_charging_type" value="3">按体积计费&nbsp;&nbsp;
  					<input type="radio" name="wrap_charging_type" value="4">免包装费&nbsp;&nbsp;
  				</td>
  			</tr>
  			<tr>
  				<td>
  					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $lang['default']?>:
  					<input type="text" name="wrap_default_num">&nbsp;&nbsp;<span class="w_goods_unit">件</span>&nbsp;内,&nbsp;<input type="text" name="wrap_default_money">&nbsp;(元)
  				</td>
  			</tr>
  			<tr>
  				<td>
  					 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $lang['per_add']?>:
  					<input type="text" name="wrap_add_num">&nbsp;&nbsp;<span class="w_goods_unit">件</span>&nbsp;,&nbsp;增加包装费&nbsp;<input type="text" name="wrap_add_money">&nbsp;(元)
  				</td>
  			</tr>
  			<tr>
  				<td>
  					<?php echo $lang['for_wrap_free']?>:
  					<input type="text" name="free_wrap">&nbsp;(元)
  				</td>
  			</tr>
  		</table>
  		<table class="table tb-type2">
  			<tr>
  				<td colspan="4"><h3>分销说明</h3></td>
  			</tr>
			<?php if(!$output['goods_desc']){?>
			<tr class="noborder">
          		<td colspan="2" class="vatop rowform"><?php showEditor('desc');?></td>
        	</tr>
			<?php }else{ ?>
  			<tr class="noborder">
          		<td colspan="2" class="vatop rowform"><?php showEditor('desc',$output['goods_desc']);?></td>
        	</tr>
        	<?php } ?>
  			<tr>
  				<td>
  					<a href="JavaScript:void(0);" class="btn subbtn" id="submitBtn"><span><?php echo $lang['nc_submit'];?></span></a>
  				</td>
  			</tr>
  		</table>
  </form>
</div>
<script>
$(function(){
	$(".subbtn").click(function(){
		 $("#link_form").submit();
	});
	/*
	$("input[name='postage_charging_type']").change(function(
		var unit =  $("input[name='postage_charging_type']:checked").val();
		var temp_content = "";
		switch(unit){
			case 1 : 
				temp_content = "件";
				break;
			case 2 : 
				temp_content = "千克";
				break;
			case 3 : 
				temp_content = "立方米";
				break;
			case 4 : 
				temp_content = "件";
				break;
		}
	));
	*/
	$("input[name='postage_charging_type']").change(function(){
			var unit = $("input[name='postage_charging_type']:checked").val();
			var temp_content = "";
			unit= parseInt(unit);
			switch(unit){
				case 1 : 
					temp_content = "件";
					break;
				case 2 : 
					temp_content = "千克";
					break;
				case 3 : 
					temp_content = "立方米";
					break;
				case 4 : 
					temp_content = "件";
					break;
			}
			$(".p_goods_unit").text(temp_content);
		});
	$("input[name='wrap_charging_type']").change(function(){
		var unit = $("input[name='wrap_charging_type']:checked").val();
		var temp_content = "";
		unit= parseInt(unit);
		switch(unit){
			case 1 : 
				temp_content = "件";
				break;
			case 2 : 
				temp_content = "千克";
				break;
			case 3 : 
				temp_content = "立方米";
				break;
			case 4 : 
				temp_content = "件";
				break;
		}
		$(".w_goods_unit").text(temp_content);
	});
});
</script>
