<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['member_index_manage']?></h3>
      <ul class="tab-base">
             <li><a href="JavaScript:void(0);" class="current"><span>二维码生成</span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="user_form" enctype="multipart/form-data" method="post">
      <table class="table tb-type2">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label><?php echo $lang['member_index_name']?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><?php echo $output['mem_info']['member_name'];?></td>
          <td class="vatop tips"></td>
        </tr>
      <tr class="noborder">
          <td colspan="2" class="required"><label><?php echo $lang['dis_path']?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><?php echo $output['dis_path'];?></td>
          <td class="vatop tips"  style="color:red"><?php if($output['tip_msg']) echo $output['tip_msg']?></td>
        </tr>
       <tr class="noborder">
          <td colspan="2" class="required"><label><?php echo $lang['dis_path_qrcode']?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
          	<div  id="qrcode"></div>
          </td>
          <td class="vatop tips" style="color:red"><?php if($output['tip_msg']) echo $output['tip_msg']?></td>
        </tr>
      <tfoot>
        <tr class="tfoot">
          <td colspan="15"><a href="JavaScript:void(0);" class="btn" id="submitBtn"><span>返回</span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<script src="<?php echo RESOURCE_SITE_URL;?>/js/qrcode/jquery.qrcode.min.js"></script>
<link href="<?php echo RESOURCE_SITE_URL;?>/js/jquery.Jcrop/jquery.Jcrop.min.css" rel="stylesheet" type="text/css" id="cssfile2" />
<script type="text/javascript">
//裁剪图片后返回接收函数
jQuery('#qrcode').qrcode({width:150,height: 150,text:"<?php echo $output['dis_path']?>"} );
$(function(){
	$("#submitBtn").click(function(){
			 window.history.go(-1);
	})
})
</script> 
