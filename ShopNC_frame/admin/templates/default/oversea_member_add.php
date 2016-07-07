<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['overseas_member_control']?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=overseas_member&op=member_list"><span><?php echo $lang['overseas_member_control']?></span></a></li>
        <li><a href="index.php?act=overseas_member&op=add_member" class="current"><span><?php echo $lang['add_member'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="user_form" enctype="multipart/form-data" method="post">
    <input type="hidden" name="form_submit" value="ok" />
    <input type="hidden" name="act" value="overseas_member">
    <input type="hidden" name="op" value="add_member">
    <table class="table tb-type2">
      <tbody>
        	<!--  用户昵称  -->
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="member_name"><?php echo $lang['member_name']?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
          	<input type="text" value="" name="member_name" id="member_name" class="txt" ></td>
          <td class="vatop tips"><?php echo $lang['name_tip'];?></td>
        </tr>
        
        
        <!--  用户名   -->
        <tr>
          <td colspan="2" class="required"><label class="validation" for="member_truename"><?php echo $lang['member_truename']?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" id="member_truename" name="member_truename" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
        
        
       <!-- 手机号  -->
        <tr>
          <td colspan="2" class="required"><label class="validation" for="member_mobile"><?php echo $lang['member_mobile']?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="" id="member_mobile" name="member_mobile" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
        
        <!--  身份证号  -->
        <tr>
          <td colspan="2" class="required"><label class="validation" for="member_idcard"><?php echo $lang['member_idcard']?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="" id="member_idcard" name="member_idcard" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
        
         <!-- 店铺名称 -->
         <tr>
          <td colspan="2" class="required"><label class="validation" for="store_name"><?php echo $lang['store_name']?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" id="store_name" name="store_name" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
        
        <!-- 店铺类型 -->
        <tr>
          <td colspan="2" class="required"><label class="validation" for="store_type"><?php echo $lang['store_type']?>:</label></td>
        </tr>
        <tr class="noborder">
          <td>
	          <select name="store_type" id="store_type" style="width:80%">
	          	<option value="1"><?php echo $lang['store_online'];?></option>
	          	<option value="2"><?php echo $lang['store_exists'];?></option>
	          </select>
          </td>
          <td class="vatop tips"></td>
        </tr>
        
        <!-- 网店类型  需要进一步修改 -->
        <tr>
          <td colspan="2" class="required"><label class="validation" for="online_store"><?php echo $lang['online_type'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td>
	          <select name="online_store" id="online_store" style="width:80%">
	           <?php foreach ($output['online_type'] as $k=>$v){?>
	          	<option value="<?php echo $k;?>"><?php echo $v?></option>
	          <?php }?>
	          </select>
          </td>
          <td class="vatop tips"></td>
        </tr>
        
        
       
        
        <!-- 地区 -->
        <tr>
          <td colspan="2" class="required"><label class="validation" for="member_area"><?php echo $lang['member_area']?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform" >
          <span>
          	省:&nbsp;<select name="member_province" id="member_province" style="width:50%">
          	<option value="-1">请选择</option>
          	<?php foreach($output['area_list'] as $k=>$v){?>
          		<option value="<?php echo $v['area_id'];?>"><?php echo $v['area_name']?></option>
          	<?php }?>
          	</select>
          	<br />
          	市:&nbsp;<select name="member_city" id="member_city" style="width:50%;margin-top:5px;">
          	</select>
          	<br />
          	区:&nbsp;<select name="member_area" id="member_area" style="width:50%;50%;margin-top:5px;" >
          	</select>
          <td class="vatop tips"></td>
        </tr>
        
        <!--  详细地址  -->
         <tr>
          <td colspan="2" class="required"><label class="validation" for="member_area_detail"><?php echo $lang['address_detail']?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform" >
         	<textarea id="member_area_detail" name="member_area_detail"></textarea>
          <td class="vatop tips"></td>
        </tr>
        
         <tr>
          <td colspan="2" class="required"><label class="validation" for="store_license"><?php echo $lang['store_license'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
          		<span class="type-file-show">
            <div class="type-file-preview">
            	<img src="<?php echo UPLOAD_SITE_URL.'/'.(ATTACH_COMMON.DS.$output['list_setting']['site_logo']);?>"></div>
            </span><span class="type-file-box"><input type='text' name='textfield' id='textfield1' class='type-file-text' />
            <input type='button' name='button' id='button1' value='' class='type-file-button' />
            <input name="store_license" type="file" class="type-file-file" id="store_license" size="30" hidefocus="true" nc_type="change_site_logo">
            </span></td>
            <td class="vatop tips"><?php echo $lang['img_tip'];?></td>
        </tr>
      </tbody>
      <tfoot>
        <tr class="tfoot">
          <td colspan="15"><a href="JavaScript:void(0);" class="btn" id="submitBtn"><span><?php echo $lang['nc_submit'];?></span></a></td>
        </tr>
      </tfoot>
    </table>
    <input type="hidden" name="h_province" id= "h_province" value="">
    <input type="hidden" name="h_city" id="h_city" value="">
    <input type="hidden" name="h_area" id="h_area" value="">
  </form>
</div>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/dialog/dialog.js" id="dialog_js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/jquery.ui.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/ajaxfileupload/ajaxfileupload.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.Jcrop/jquery.Jcrop.js"></script>
<link href="<?php echo RESOURCE_SITE_URL;?>/js/jquery.Jcrop/jquery.Jcrop.min.css" rel="stylesheet" type="text/css" id="cssfile2" />
<script type="text/javascript">
//裁剪图片后返回接收函数
province = "";
city = "";
area = "";
$(function(){
	$("#store_license").change(function(){
		$("#textfield1").val($(this).val());
	});
	// 上传图片类型
	$('input[class="type-file-file"]').change(function(){
		var filepatd=$(this).val();
		var extStart=filepatd.lastIndexOf(".");
		var ext=filepatd.substring(extStart,filepatd.lengtd).toUpperCase();		
			if(ext!=".PNG"&&ext!=".GIF"&&ext!=".JPG"&&ext!=".JPEG"){
				alert("<?php echo $lang['default_img_wrong'];?>");
					$(this).attr('value','');
				return false;
			}
	});

	$("#member_province").change(function(){
		province = $(this).val();
		city = "";
		area ="";
		$("#member_city").html("");
		$("#member_area").html("");
		$.ajax({
			type:"get",
			url:'index.php?act=overseas_member&op=get_area&parent_id='+province,
			dataType:"json",
			success:function(data){
				console.log(data);
				var city_arr = "<option value='-1'>请选择</option>";
				for(var i=0;i<data.length;i++){
						city_arr += "<option value='"+data[i].area_id+"'>"+data[i].area_name+"</option>"
					}
				$("#member_city").append(city_arr);
			},
			 error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert(XMLHttpRequest.status);
                alert(XMLHttpRequest.readyState);
                alert(textStatus);
            },
		});
	});

	$("#member_city").change(function(){
		city = $(this).val();
		area ="";
		$("#member_area").html("");
		$.ajax({
			type:"get",
			url:'index.php?act=overseas_member&op=get_area&parent_id='+city,
			dataType:"json",
			success:function(data){
				console.log(data);
				var city_arr = "<option value='-1'>请选择</option>";
				for(var i=0;i<data.length;i++){
						city_arr += "<option value='"+data[i].area_id+"'>"+data[i].area_name+"</option>"
					}
				$("#member_area").append(city_arr);
			},
			 error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert(XMLHttpRequest.status);
                alert(XMLHttpRequest.readyState);
                alert(textStatus);
            },
		});
	});

	$("#member_area").change(function(){
		area = $(this).val()
		$("#h_province").val(province)
		$("#h_city").val(city);
		$("#h_area").val(area);
	})
	
});


function call_back(picname){
	$('#store_license').val(picname);
	$('#view_img').attr('src','<?php echo UPLOAD_SITE_URL.'/'.ATTACH_OVERSEA_LICENSE;?>/'+picname);
}
$(function(){
	//按钮先执行验证再提交表单
	$("#submitBtn").click(function(){
	if(province<1 || city<1 || area<1 ){
		alert("请重新获取地区");
		return false;
	}
    if($("#user_form").valid()){
     $("#user_form").submit();
	}
	});
    $('#user_form').validate({
        errorPlacement: function(error, element){
			error.appendTo(element.parent().parent().prev().find('td:first'));
        },
        rules : {
			member_name: {
				required : true,
				remote   : {
                    url :'index.php?act=overseas_member&op=checkname&branch=add',
                    type:'get',
                    data:{
                        user_name : function(){
                            return $('#member_name').val();
                        },
                        flags : 'add_mem',
                    }
                }
			},
			member_truename: {
				required:true,
            },
            member_mobile: {
				required:true,
				isMobile:$("#member_mobile").val(),
				
            },
            member_idcard: {
            	required:true,
            	idCard:$("#member_idcard").val(),
            },
            store_type:{
            	required:true,
			},
			online_store:{
				required:true,
			},
			store_name:{
				required:true,
			},
			member_area_detail:{
				required:true,
			}
        },
        messages : {
			member_name: {
	        	required : '<?php echo $lang['member_name_null']?>',
				remote   : '<?php echo $lang['member_name_exists']?>'
			},
			member_truename : {
				required : '<?php echo $lang['member_truename_null']?>',
            },
            member_mobile: {
            	required : '<?php echo $lang['member_mobile_null']?>',
            },
            member_idcard:{
            	required : '<?php echo $lang['member_idcard_null']?>',
            },
            store_type:{
            	required : '<?php echo $lang['member_store_type_null']?>',
            },
            online_store:{
            	required : '<?php echo $lang['member_online_store_null']?>',
            },
            store_name:{
            	required : '<?php echo $lang['member_store_name_null']?>',	
            },
            member_area_detail:{
            	required : '<?php echo $lang['member_area_detail_null']?>',	
			}
        }
    });

    $.validator.addMethod("isMobile", function(value) {    
    	   var pattern=/^[0-9]{11}$/;
    	   if(pattern.test(value)) { 
               return true; 
         }else{ 
           return false; 
        }
    }, "<?php echo $lang['member_mobile_geshi']?>"); 


    $.validator.addMethod("idCard", function(code) {    
    	   var city={11:"北京",12:"天津",13:"河北",14:"山西",15:"内蒙古",21:"辽宁",22:"吉林",23:"黑龙江 ",31:"上海",32:"江苏",33:"浙江",34:"安徽",35:"福建",36:"江西",37:"山东",41:"河南",42:"湖北 ",43:"湖南",44:"广东",45:"广西",46:"海南",50:"重庆",51:"四川",52:"贵州",53:"云南",54:"西藏 ",61:"陕西",62:"甘肃",63:"青海",64:"宁夏",65:"新疆",71:"台湾",81:"香港",82:"澳门",91:"国外 "};
           var tip = "";
           var pass= true;
           
           if(!code || !/^\d{6}(18|19|20)?\d{2}(0[1-9]|1[12])(0[1-9]|[12]\d|3[01])\d{3}(\d|X)$/i.test(code)){
               tip = "身份证号格式错误";
               pass = false;
           }
           
          else if(!city[code.substr(0,2)]){
               tip = "地址编码错误";
               pass = false;
           }
           else{
               //18位身份证需要验证最后一位校验位
               if(code.length == 18){
                   code = code.split('');
                   //∑(ai×Wi)(mod 11)
                   //加权因子
                   var factor = [ 7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2 ];
                   //校验位
                   var parity = [ 1, 0, 'X', 9, 8, 7, 6, 5, 4, 3, 2 ];
                   var sum = 0;
                   var ai = 0;
                   var wi = 0;
                   for (var i = 0; i < 17; i++)
                   {
                       ai = code[i];
                       wi = factor[i];
                       sum += ai * wi;
                   }
                   var last = parity[sum % 11];
                   if(parity[sum % 11] != code[17]){
                       tip = "校验位错误";
                       pass =false;
                   }
               }
           }
           return pass;
 }, "<?php echo $lang['member_idcard_geshi']?>"); 
       
});
</script>