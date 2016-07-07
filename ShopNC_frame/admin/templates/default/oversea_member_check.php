<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['overseas_member_control']?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=overseas_member&op=member_list"><span><?php echo $lang['overseas_member_control']?></span></a></li>
         <li><a href="index.php?act=overseas_member&op=check&mem_id=<?php echo $output['mem_info']['member_id']?>" class="current"><span><?php echo $lang['check_mem']?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="user_form" enctype="multipart/form-data" method="post">
    <input type="hidden" name="form_submit" value="ok" />
   
    <table class="table tb-type2">
      <tbody>
        	<!--  用户昵称  -->
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="member_name"><?php echo $lang['member_name']?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
          	<input type="text" name="member_name" id="member_name" class="txt" value="<?php echo $output['mem_info']['member_name'];?>">
          <td class="vatop tips"></td>
        </tr>
        
        
        <!--  用户名   -->
        <tr>
          <td colspan="2" class="required"><label class="validation" for="member_truename"><?php echo $lang['member_truename']?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" id="member_truename" name="member_truename" class="txt" value="<?php echo $output['mem_info']['member_truename'];?>"></td>
          <td class="vatop tips"></td>
        </tr>
        
        
       <!-- 手机号  -->
        <tr>
          <td colspan="2" class="required"><label class="validation" for="member_mobile"><?php echo $lang['member_mobile']?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['mem_info']['member_mobile'];?>" id="member_mobile" name="member_mobile" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
        
        <!--  身份证号  -->
        <tr>
          <td colspan="2" class="required"><label class="validation" for="member_idcard"><?php echo $lang['member_idcard']?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['mem_info']['member_idcard'];?>" id="member_idcard" name="member_idcard" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
        
         <!-- 店铺名称 -->
         <tr>
          <td colspan="2" class="required"><label class="validation" for="store_name"><?php echo $lang['store_name']?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" id="store_name" name="store_name" class="txt" value="<?php echo $output['mem_info']['store_name']?>"></td>
          <td class="vatop tips"></td>
        </tr>
        
        <!-- 店铺类型 -->
        <tr>
          <td colspan="2" class="required"><label class="validation" for="store_type"><?php echo $lang['store_type']?>:</label></td>
        </tr>
        <tr class="noborder">
          <td>
	          <select name="store_type" id="store_type" style="width:45%">
	          	<option value="1" <?php if($output['mem_info']['store_type']==1) echo "selected" ;?>><?php echo $lang['store_online'];?></option>
	          	<option value="2"  <?php if($output['mem_info']['store_type']==1) echo "selected" ;?>><?php echo $lang['store_exists'];?></option>
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
	          <select name="online_store" id="online_store" style="width:45%">
	          <?php foreach ($output['online_type'] as $k=>$v){?>
	          	<option value="<?php echo $k;?>" <?php if($output['mem_info']['online_store']== $k) echo "selected"; ?>><?php echo $v?></option>
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
          	<?php foreach($output['pro_list'] as $k=>$v){?>
          		<option value="<?php echo $v['area_id'];?>" <?php if($output['mem_info']['member_provinceid'] ==  $v['area_id']) echo "selected"?> >
          				<?php echo $v['area_name']?>
          		</option>
          	<?php }?>
          	</select>
          	<br />
          	市:&nbsp;<select name="member_city" id="member_city" style="width:50%;margin-top:5px;">
          	<?php foreach($output['city_list'] as $k=>$v){?>
          		<option value="<?php echo $v['area_id'];?>" <?php if($output['mem_info']['member_cityid'] ==  $v['area_id']) echo "selected"?> >
          				<?php echo $v['area_name']?>
          		</option>
          	<?php }?>
          	</select>
          	<br />
          	区:&nbsp;<select name="member_area" id="member_area" style="width:50%;50%;margin-top:5px;" >
          		<?php foreach($output['area_list'] as $k=>$v){?>
          		<option value="<?php echo $v['area_id'];?>" <?php if($output['mem_info']['member_areaid'] ==  $v['area_id']) echo "selected"?> >
          				<?php echo $v['area_name']?>
          		</option>
          	<?php }?>
          	</select>
          <td class="vatop tips"></td>
        </tr>
        
        <!--  详细地址  -->
         <tr>
          <td colspan="2" class="required"><label class="validation" for="member_area_detail"><?php echo $lang['address_detail']?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform" >
         	<textarea id="member_area_detail" name="member_area_detail"><?php echo $output['mem_info']['member_area_detail']?></textarea>
          <td class="vatop tips"></td>
        </tr>
        <?php if ( $output['mem_info']['store_type'] == 1 ) { ?>
        <tr>
          <td colspan="2" class="required">
            <label class="validation" for="store_url">店铺验证链接:</label>
          </td>
          <tr class="noborder">
            <td class="vatop rowform">
              <a href="<?php echo $output['mem_info']['store_url']; ?>" target='_blank' ><?php echo $output['mem_info']['store_url']; ?></a>
            </td>
          </tr>
          <td class="vatop tips">店铺验证标识码:　<font color="red">GYP<?php echo $output['mem_info']['member_id']; ?></font></td>
        </tr>
        <?php } else { ?>
        <tr>
          <td colspan="2" class="required"><label class="validation" for="store_license"><?php echo $lang['store_license'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
          	<img src="<?php echo $output['imgs']?>"  style="width:600px;height:400px;"/>
          </td>
        </tr>
        <?php } ?>
      </tbody>
     
    </table>
    <input type="hidden" name="h_province" id= "h_province" value="">
    <input type="hidden" name="h_city" id="h_city" value="">
    <input type="hidden" name="h_area" id="h_area" value="">
  </form>
  <form method="post" id="check_mem" name="check_mem">
  	 <input type="hidden" name="act" value="overseas_member">
     <input type="hidden" name="op" value="check">
     <input type="hidden" name="temps" value="<?php echo $output['mem_info']['member_id'];?>">
  	  <table class="table tb-type2">
  	  	<tbody>
  	  		<tr>
	          <td colspan="2" class="required"><label class="validation" for="member_idcard"><?php echo $lang['operation_sh']?>:</label></td>
	        </tr>
	        <tr class="noborder">
	          <td class="vatop rowform">
	          	<input type="radio" name="sh" value="1" <?php if($output['mem_info']['member_status']==1) echo "checked" ;?>><?php echo $lang['sh_status_1']?>
	          	<input type="radio" name="sh" value="2" <?php if($output['mem_info']['member_status']==2) echo "checked" ;?>><?php echo $lang['sh_status_2']?>
	          </td>
	          <td class="vatop tips"></td>
       	    </tr>
       	    <tr>
	          <td colspan="2" class="required"><label class="validation" for="refuse_reson"><?php echo $lang['refuse_reason']?>:</label></td>
	        </tr>
	        <tr class="noborder">
	          <td class="vatop rowform"><textarea name="refuse_reason" id="refuse_reson"><?php echo $output['mem_info']['refuse_reason'];?></textarea></td>
	          <td class="vatop tips"></td>
       	    </tr>
  	  	</tbody>
  		 <tfoot>
	        <tr class="tfoot">
	          <td colspan="15"><a href="JavaScript:void(0);" class="btn" id="submitBtn"><span><?php echo $lang['nc_submit'];?></span></a></td>
	        </tr>
      	</tfoot>
      </table>
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
		var s = $("input[name=sh]:checked").val();
		var reason = $("#refuse_reson").val()
		if(s<1||s>2){
				alert("请选择审核状态");
				return false;
		}else{
			if(s==2 && (reason==""|| reason=="undefined")){
				alert("请输入拒绝原因");
				return false;
			}else{
				$("#check_mem").submit();
			}
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
                        member_id : ''
                    }
                }
			},
			member_truename: {
				required:true,
            },
            member_mobile: {
				required:true,
            },
            member_idcard: {
            	required:true,
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
});
</script>