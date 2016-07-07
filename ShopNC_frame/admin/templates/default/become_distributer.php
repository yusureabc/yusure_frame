<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['be_distributer_title'];?></h3>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form method="post" enctype="multipart/form-data" name="form1" id="dis_member_level" >
  	<input type="hidden" name="act" value="member">
  	<input type="hidden" name="op" value="distributermng">
  	<input type="hidden" name="member" value="<?php echo $output['meminfo']['member_id'];?>" >
    <table class="table tb-type2">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required">
            <label for="goods_title" class="validation"><?php echo $lang['be_distributer_member_name']?>:</label>
          </td>
        </tr>       
        <tr class="noborder">
          <td class="vatop rowform"><input id="member_name" name="member_name" class="txt" type="text"  value="<?php echo $output['meminfo']['member_name']?>" disabled = 'true'/></td>
          <td class="vatop tips"><span class="vatop rowform"></span></td>
        </tr>
        <tr class="noborder">
          <td colspan="2" class="required"><label  class="validation"><?php echo $lang['be_distributer_member_level'];?>:</label></td>
        </tr>
        <tr class="vatop rowform">
        <td>
        	<select id="dis_levels" name="dis_levels" >
        		<?php foreach ($output['level'] as $lv){?>
        			<option value="<?php echo $lv['level_id'];?>" <?php if ($output['extlevel']==$lv['level_id']){ echo "selected" ;}?>><?php echo $lv['level_name'];?></option>
        		<?php }?>
            </select>   
         </td>       
        <td class="vatop tips"><span class="vatop rowform"></span></td>
        </tr>
          <tr class="noborder">
          <td colspan="2" class="required"><label  class="validation"><?php echo $lang['be_distributer_isvalid'];?>:</label></td>
        </tr>
        <tr class="vatop rowform">
        <td>	
        	<input type="radio" name="is_valid" value="1" <?php if($output['isvalid']=="yes") echo "checked" ;?>><?php echo $lang['be_distributer_isvalid_yes'];?>
        	<input type="radio" name="is_valid" value="0" <?php if($output['isvalid']=="no") echo "checked" ;?>><?php echo $lang['be_distributer_isvalid_no'];?>
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
	$(function(){
		$("#submitBtn").click(function(){
			$("#dis_member_level").submit();
		});
});
</script>
