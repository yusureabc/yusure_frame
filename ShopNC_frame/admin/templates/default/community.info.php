<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['member_index_community'];?></h3>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form method="post" enctype="multipart/form-data" name="form1" id="dis_member_level" >
  	<input type="hidden" name="act" value="member">
  	<input type="hidden" name="op" value="community">
  	<input type="hidden" name="member_id" value="<?php echo $output['member_info']['member_id'];?>" >
    <input type="hidden" name="member_name" value="<?php echo $output['member_info']['member_name'];?>" >

    <table class="table tb-type2">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required">
            <label class="validation"><?php echo $lang['member_index_name']?>:</label>
          </td>
        </tr>       
        
        <tr class="vatop rowform">
        <td>
          <?php echo $output['member_info']['member_name']; ?>	
        </td>       
        <td class="vatop tips"><span class="vatop rowform"></span></td>
        </tr>
          <tr class="noborder">
          <td colspan="2" class="required"><label class="validation"><?php echo $lang['member_index_on_off'];?>:</label></td>
        </tr>
        <tr class="vatop rowform">
        <td>	
        	<input type="radio" name="on_off" value="1" <?php if($output['member_info']['on'] == 1) echo "checked" ;?>><?php echo $lang['member_index_on'];?>
        	<input type="radio" name="on_off" value="3" <?php if($output['member_info']['on'] != 1) echo "checked" ;?>><?php echo $lang['member_index_off'];?>
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
