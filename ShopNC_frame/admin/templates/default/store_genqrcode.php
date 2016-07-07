<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<div class="page">
   <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['store'];?></h3>
      <ul class="tab-base">
        <li><a href="JavaScript:void(0);" ><span><?php echo $lang['store_genqrcode'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form method="post" enctype="multipart/form-data" name="form1" id="link_form" >
    <table class="table tb-type2">
      <tbody>
      	<tr class="noborder">
      		<td colspan="2" class="required">
      			<label for="for_store_name" class="validation"><?php echo $lang['store_name'];?>:</label>
      		</td>
      	</tr>
      	 <tr class="noborder">
          <td class="vatop rowform"><input id="store_name" name="store_name" class="txt" type="text"  value="<?php echo $output['store_info']['store_name'];?>" readonly="readonly" disabled="disabled"/></td>
          <td class="vatop tips"><span class="vatop rowform"></span></td>
        </tr>
        <tr class="noborder">
      		<td colspan="2" class="required">
      			<label for="for_store_name" class="validation"><?php echo $lang['store_dis_path'];?>:</label>
      		</td>
      	</tr>
      	 <tr class="noborder">
          <td class="vatop rowform"><?php echo $output['dis_path']?></td>
          <td class="vatop tips"><span class="vatop rowform"></span></td>
        </tr>
        <tr class="noborder">
      		<td colspan="2" class="required">
      			<label for="for_store_name" class="validation"><?php echo $lang['store_dis_qrcode'];?>:</label>
      		</td>
      	</tr>
      	 <tr class="noborder">
          <td class="vatop rowform"><div  id="qrcode"></div></td>
          <td class="vatop tips"><span class="vatop rowform"></span></td>
        </tr>
      </tbody>
      <tfoot id="submit-holder">
        <tr class="tfoot">
          <td colspan="2" ><a href="JavaScript:void(0);" class="btn" id="submitBtn"><span>返回</span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<script src="<?php echo RESOURCE_SITE_URL;?>/js/qrcode/jquery.qrcode.min.js"></script>
<script type="text/javascript">
//裁剪图片后返回接收函数
jQuery('#qrcode').qrcode({width:150,height: 150,text:"<?php echo $output['dis_path']?>"} );
$(function(){
	$("#submitBtn").click(function(){
			 window.history.go(-1);
	})
})
</script> 
