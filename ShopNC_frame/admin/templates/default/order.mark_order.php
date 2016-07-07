<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<link href="<?php echo ADMIN_TEMPLATES_URL;?>/css/font/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
<style>
.dark { color: #333333 !important;}
.white { color: #FFFFFF !important;}
.red { color: #DD5A43 !important;}
.light-red { color: #FF7777 !important;}
.blue { color: #e4393c !important;}
.light-blue { color: #93CBF9 !important;}
.green { color: #69AA46 !important;}
.light-green { color: #B6E07F !important;}
.orange { color: #FF892A !important;}
.purple { color: #A069C3 !important;}
.pink { color: #C6699F !important;}
.pink2 { color: #D6487E !important;}
.brown { color: #A52A2A !important;}
.grey { color: #777777 !important;}
</style>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['order_manage'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=order&op=index"><span><?php echo $lang['manage'];?></span></a></li>
        <li><a href="JavaScript:void(0);" class="current"><span>标注订单</span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form method="post" name="form1" id="form1" action="index.php?act=order&op=change_state&state_type=mark_order&order_id=<?php echo intval($_GET['order_id']);?>">
    <input type="hidden" name="form_submit" value="ok" />
    <input type="hidden" value="<?php echo getReferer();?>" name="ref_url">
    <table class="table tb-type2">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label for="site_name">标记<?php echo $lang['nc_colon'];?> </label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
    			<input type="radio"   class="radio" name="mark_type" value="1" <?php if($output['order_info']['mark_type']==1) { ?>checked="checked"<?php }?> /><i class="icon-flag brown"></i>
		      	<input type="radio"   class="radio" name="mark_type" value="2" <?php if($output['order_info']['mark_type']==2) { ?>checked="checked"<?php }?> /><i class="icon-flag orange"></i>
		      	<input type="radio"   class="radio" name="mark_type" value="3" <?php if($output['order_info']['mark_type']==3) { ?>checked="checked"<?php }?> /><i class="icon-flag green"></i>
		      	<input type="radio"   class="radio" name="mark_type" value="4" <?php if($output['order_info']['mark_type']==4) { ?>checked="checked"<?php }?> /><i class="icon-flag light-blue"></i>
		      	<input type="radio"   class="radio" name="mark_type" value="5" <?php if($output['order_info']['mark_type']==5) { ?>checked="checked"<?php }?> /><i class="icon-flag purple"></i>
    	  </td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="closed_reason">标记信息<?php echo $lang['nc_colon'];?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform" colspan="2" ><textarea type="text" class="tarea" name="mark_content" id="mark_content" maxlength="300"><?php echo $output['order_info']['mark_content'];?></textarea></td>
        </tr>
      </tbody>
      <tfoot id="submit-holder">
        <tr class="tfoot">
          <td colspan="2" ><a href="JavaScript:void(0);" id="ncsubmit" class="btn"><span><?php echo $lang['nc_submit'];?></span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/jquery.ui.js"></script> 
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/i18n/zh-CN.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/themes/ui-lightness/jquery.ui.css"  />
<script type="text/javascript">
$(function(){
    $('#ncsubmit').click(function(){
    	if($("#form1").valid()){
        	$('#form1').submit();
    	}
    });
});
</script> 