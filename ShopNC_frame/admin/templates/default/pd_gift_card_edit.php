<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/jquery.ui.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/i18n/zh-CN.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/themes/ui-lightness/jquery.ui.css"/>
<style type="text/css">
.content{width:1000px; margin:5px 25px;}
.card{font-size:14px; font-family:"微软雅黑"; padding-left:20px;}
.card ul li{margin:10px;}
.card ul li span{height:30px; line-height:30px;}
.card ul li.submit{padding:0 123px;}
.card ul li.notice input{border:none; background:#FCF8E3; width:400px; height:10px; line-height:10px;color:red;}
.card ul li span.notice_tit{font-size:12px; color:#888888;}
.money{color:red; font-size:13px; }
</style>

<div class="content">
   <div class="item-title">
	   <h3>礼品卡管理</h3>
	   <ul class="tab-base">
		 <li><a href="index.php?act=pd_gift_card&op=index"><span>礼品卡管理</span></a></li>
		 <li><a href="JavaScript:void(0);" class="current"><span>修改礼品卡</span></a></li>
	   </ul>
	</div>


	<form method="post" action="index.php?act=pd_gift_card&op=update_gift_card">
		<div class="card">
		  <ul>
			 <li><span>礼品卡的面值：</span><input type="text" name="value" id="value" size="10" value="<?php echo $output['card_info']['card_value']; ?>" onkeyup="value=value.replace(/[^\d]/g,'');" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" onblur="check_value();" /> 元<span class="notice_tit"> (面值必须为整数)</span></li>
			 <li><span>&nbsp;&nbsp;&nbsp;&nbsp;绑定手机号：</span><input type="text"  name="phone" id="phone" size="20" value="<?php echo $output['card_info']['phone']; ?>" onblur="check_phone();">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="notice_tit">(请正确填写手机号)</span></li>
			<input type="hidden" name="card_id" value="<?php echo $output['card_id']; ?>">
			 <li class="submit"><input type="submit" value="修改礼品卡" /></li>
		  </ul>
		</div>
	</form>
</div>

<script type="text/javascript">
function check_value(){
	var value = document.getElementById('value').value;
	if(value=='' || value==0){
		alert("您输入的礼品卡面值有误");
		document.getElementById('value').focus();
		return false;
	}
}
function check_phone(){
	var phone_No = document.getElementById('phone').value;
	var regs = /^1[345678]{1}\d{9}$/;
	if(phone_No && !regs.test(phone_No)){
	    alert("手机号码格式不正确");
	    document.getElementById('phone').focus();
		return false;
	}
}
</script>