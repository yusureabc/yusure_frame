<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['overseas_member_control']?></h3>
      <ul class="tab-base">
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['overseas_member_control']?></span></a></li>
        <li><a href="index.php?act=overseas_member&op=add_member" ><span><?php echo $lang['add_member'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form method="post" name="formSearch" id="formSearch">
    <input type="hidden" value="overseas_member" name="act">
    <input type="hidden" value="member_list" name="op">
    <table class="tb-type1 noborder search">
      <tbody>
        <tr>
        	<td><label><?php echo $lang['nickname']?>&nbsp;&nbsp;</label></td>
        	<td><input type="text" class="txt" name="nickname" value="<?php echo $output['nickname'];?> "> &nbsp;&nbsp; </td>
        	<td><label><?php echo $lang['truename']?>&nbsp;&nbsp;</label></td>
        	<td><input type="text" class="txt" name="truename" value="<?php echo $output['truename'];?> "> &nbsp;&nbsp; </td>
        	<td><label><?php echo $lang['store_type']?>&nbsp;&nbsp;</label></td>
        	<td>
        		<select name="store_type">
        			<option value="0" >不限</option>
        			<option value="1" <?php if($output['store_type']==1) echo "selected"?>>网店</option>
        			<option value="2" <?php if($output['store_type']==2) echo "selected"?>>实体店</option>
        		</select>
        	</td>
        	<td>
        		<a href="javascript:void(0);" id="ncsubmit" class="btn-search " title="<?php echo $lang['nc_query'];?>">&nbsp;</a>
        	</td>
        </tr>
      </tbody>
    </table>
  </form>
  <table class="table tb-type2" id="prompt">
    <tbody>
      <tr class="space odd">
        <th colspan="12"></th>
      </tr>
    </tbody>
  </table>
  <form method="post" id="form_member">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2 nobdb">
      <thead>
        <tr class="thead">
          <th>&nbsp;&nbsp;</th>
          <th class="align-center"><?php echo $lang['member_name']?></th>
          <th class="align-center"><?php echo $lang['member_true_name']?></th>
          <th class="align-center"><?php echo $lang['member_mobile']?></th>
          <th class="align-center"><?php echo $lang['member_areainfo']?></th>
          <th class="align-center"><?php echo $lang['store_type']?></th>
          <th class="align-center"><?php echo $lang['store_name']?></th>
          <th class="align-center"><?php echo $lang['member_status']?></th>
          <th class="align-center"><?php echo $lang['operation']?></th>
        </tr>
       </thead>
      <tbody>
        <?php if(!empty($output['mem_list']) && is_array($output['mem_list'])){ ?>
       
        <?php foreach($output['mem_list'] as $k => $v){ ?>
        <tr class="hover member">
          <td class="w24">&nbsp;&nbsp;</td>
          <td class="align-center"> <?php echo $v['member_name'];?></td>
          <td class="align-center"> <?php echo $v['member_true_name'];?></td>
          <td class="align-center"> <?php echo $v['member_mobile'];?></td>
          <td class="align-center"> <?php echo $v['member_areainfo'];?></td>
          <td class="align-center"> <?php if($v['store_type'] == "1") echo $lang['store_online']; else  echo $lang['store_exists'];?></td>
          <td class="align-center"> <?php echo $v['store_name'];?></td>
          <td class="align-center"> 
          	<?php 
          		switch ($v['member_status']){ 
          			case "0": 
          				echo "<font  style='font-weight:bold'>".$lang['sh_status_0']."</font>"; break;
          			case "1":
          				echo "<font color='green' style='font-weight:bold'>".$lang['sh_status_1']."</font>"; break;
          			case "2":
          				echo "<font color='red' style='font-weight:bold'>".$lang['sh_status_2']."</font>"; break;
          		}
          	?>
          </td>
          <td class="align-center">
          	<a href='index.php?act=overseas_member&op=check&mem_id=<?php echo $v['member_id']?>'><?php echo $lang['operation_sh']; ?></a>&nbsp;|&nbsp;
          	<a href='index.php?act=overseas_member&op=modify&mem_id=<?php echo $v['member_id']?>'><?php echo $lang['operation_mod']; ?></a>
          </td>
        </tr>
       
        <?php } ?><!-- for循环的结束标签 -->
         <tfoot>
        	<tr>
        		<td colspan="9"><div class="pagination"> <?php echo $output['pages'];?> </div></td>
        	</tr>
        </tfoot>
        
        <?php }else { ?> <!--  if条件的标签 -->
        <tr class="no_data">
          <td colspan="10"><?php echo $lang['nc_no_record']?></td>
        </tr>
        <?php } ?>
      </tbody>
      </tfoot>
    </table>
  </form>
</div>
<script>
$(function(){
    $('#ncsubmit').click(function(){
    	$("#formSearch").submit();
    });	
});

</script>
