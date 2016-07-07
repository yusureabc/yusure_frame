<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['nc_admin_manage'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=o2o_area&op=arealist"><span><?php echo $lang['nc_manage'];?></span></a></li>
		<li><a href="javascript:void(0);" class='current'><span><?php echo $lang['nc_add'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
    
    <!--地区选择-->
    <table class="tb-type1 noborder search">
      <tbody>
        <tr>
          <th><label><?php echo $lang['nc_admin_area_choose']; ?></label></th>
          <td id="o2o_area_change">
            <select id="city" name='first_letter' >
              <option value=""><?php echo $lang['nc_please_choose'];?>...</option>
              <?php foreach($output['area_lists'] as $l){?>
              <option value='<?php echo $l['area_id'];?>' ><?php echo $l['area_name'];?></option>
              <?php }?>
            </select>
          </td>
        </tr>
      </tbody>
    </table>
    
  <form id="add_form" method="post" enctype="multipart/form-data" action="index.php?act=o2o_area&op=area_add">
    <table class="table tb-type2">
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="area_name"><?php echo $lang['nc_admin_area_name'].$lang['nc_colon'];?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="" name="area_name" id="area_name" onchange="query();" onmouseout="query();" class="txt"></td>
          <td class="vatop tips"><?php echo $lang['offline_area_name_error'];?></td>
        </tr>
		<tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="first_letter"><?php echo $lang['nc_admin_first_letter'].$lang['nc_colon'];?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
			<select name='first_letter'>
				<?php foreach($output['letter'] as $lk=>$lv){?>
				<option value='<?php echo $lv;?>'><?php echo $lv;?></option>
				<?php }?>
			</select>
		  </td>
        </tr>
    
    
    <!-- 区域坐标 -->
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="txtPoint"><?php echo $lang['nc_admin_area_longitude'].$lang['nc_colon'];?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="" name="txtPoint" id="txtPoint" class="txt" readonly="readonly" ></td>
          <td class="vatop tips"><?php echo $lang['offline_area_name_error'];?></td>
        </tr>
      

    <!-- 完整首字母 -->
    <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="full_first_letter"><?php echo $lang['nc_admin_fullfirst_letter'].$lang['nc_colon'];?></label></td>
        </tr>
    <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="" name="full_first_letter" id="full_first_letter" class="txt"></td>
          <td id="szm" >
              
            </td>
        </tr>
	<!-- 百度地图 -->
    <?php include template('o2o_map'); ?>
    
    <!-- 上级区域 -->
		<tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="area_class"><?php echo $lang['nc_admin_up_area'].$lang['nc_colon'];?></label></td>
        </tr>
		<tr class="noborder">
        <td class="vatop rowform">
          <input type="hidden" id="o2o_area_id" name="o2o_area_id" value="" />
          <input type="hidden" id="o2o_area_arr" name="o2o_area_arr" value=""  />　
    			<span id="o2o_area_name"></span>
  		  </td>
      </tr>
    
    <!-- 区号 -->
		<tr class="noborder">
          <td colspan="2" class="required"><label for="area_number"><?php echo $lang['nc_admin_area_number'].$lang['nc_colon'];?></label></td>
        </tr>
		<tr class="noborder">
          <td class="vatop rowform"><input type="text" value="" name="area_number" id="area_number" class="txt"></td>
        </tr>

		<tr class="noborder">
          <td colspan="2" class="required"><label for="post"><?php echo $lang['nc_admin_post'].$lang['nc_colon'];?></label></td>
        </tr>
		<tr class="noborder">
          <td class="vatop rowform"><input type="text" value="" name="post" id="post" class="txt"></td>
        </tr>

		<tr class="noborder">
          <td colspan="2" class="required"><label for="post">排序<?php echo $lang['nc_colon'];?></label></td>
        </tr>
		<tr class="noborder">
          <td class="vatop rowform"><input type="text" name="area_sort" id="area_sort" class="txt"></td>
        </tr>

		<tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="area_class"><?php echo $lang['nc_admin_up_area'].$lang['nc_colon'];?></label></td>
        </tr>
		<tr class="noborder">
          <td class="vatop rowform">
			<?php echo $output['area_name'];?><input type='hidden' name='parent_area_id' value="<?php echo $output['area_id'];?>">
		  </td>
        </tr>
        
        <?php if($output['area_id'] == '0'){?>
  		<tr class="noborder">
          <td colspan="2" class="required"><label for="area_class"><?php echo $lang['nc_admin_area_is_hot'].$lang['nc_colon'];?></label></td>
        </tr>    
        <tr class="noborder">
          <td class="vatop rowform onoff">
          	<label for="hot1" class="cb-enable" ><span><?php echo $lang['open'];?></span></label>
            <label for="hot0" class="cb-disable selected" ><span><?php echo $lang['close'];?></span></label>
            <input id="hot1" name="is_hot"  value="1" type="radio">
            <input id="hot0" name="is_hot"  checked="checked" value="0" type="radio">
          </td>
        </tr>  
        <?php }?> 
        	
  		<tr class="noborder">
          <td colspan="2" class="required"><label for="area_class"><?php echo $lang['nc_admin_area_is_state'].$lang['nc_colon'];?></label></td>
        </tr>    
        <tr class="noborder">
          <td class="vatop rowform onoff">
          	<label for="state1" class="cb-enable selected" ><span><?php echo $lang['open'];?></span></label>
            <label for="state0" class="cb-disable " ><span><?php echo $lang['close'];?></span></label>
            <input id="state1" name="is_state"  checked="checked" value="1" type="radio">
            <input id="state0" name="is_state"   value="0" type="radio">
          </td>
        </tr>  
        	
      </tbody>
      <tfoot>
        <tr>
          <td colspan="2"><a id="submit" href="javascript:void(0)" class="btn"><span><?php echo $lang['nc_save'];?></span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/o2o_common_select.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/area_first_letter.js" charset="utf-8"></script>
<script type="text/javascript">
$(document).ready(function(){
	o2o_areaInit("o2o_area_change");
	
    $("#submit").click(function(){
        $("#add_form").submit();
    });

    $('#add_form').validate({
        errorPlacement: function(error, element){
            error.appendTo(element.parent().parent().prev().find('td:first'));
        },
        success: function(label){
            label.addClass('valid');
        },
        rules : {
            area_name: {
                required : true
            },
			area_number:{
				number: true	
			},
			post:{
				number: true	
			},
			area_sort:{
				required:true,
				number:true
			}
        },
        messages : {
            area_name: {
                required : '区域名称不能为空'
            },
			area_number:{
				number:'区域编号必须为数字'
			},
			post:{
				number:'邮编必须为数字'
			},
			area_sort:{
				required:'区域排序不能为空',
				number:'区域排序必须是数字'
			}
        }
    });
});
</script> 
<script type="text/javascript">
  
  var map = new BMap.Map("allmap");
  map.centerAndZoom("青岛即墨",12);
  
  // 滚轮缩放
  // map.enableScrollWheelZoom(true);  
  map.addControl(new BMap.NavigationControl());               // 添加平移缩放控件
  map.addControl(new BMap.ScaleControl());                    // 添加比例尺控件
  map.addControl(new BMap.OverviewMapControl());//添加缩略地图控件
  

  // 通过名称搜索
  function local_search( value )
  {
    var local = new BMap.LocalSearch(map, {
      renderOptions:{map: map}
    });

    var city_name = $("#city").find('option:selected').html() ;
    var area_name = $("#area").find('option:selected').html() ;
    local.search( city_name + area_name + value );
  }
  
  var geoc = new BMap.Geocoder(); 

  // 点击获取经纬度  逆地址解析
  map.addEventListener("click",function(e){
    document.getElementById("txtPoint").value = e.point.lng + "," + e.point.lat;
    var pt = e.point;
    geoc.getLocation(pt, function(rs){
      var addComp = rs.addressComponents;
      var address = addComp.province + addComp.city + addComp.district + addComp.street + addComp.streetNumber;
      $("#address_info").val( address );
    });    
  });

  // 根据城市名定位
  function theLocation(){
    var city = document.getElementById("o2o_area_arr").value;
    if(city != ""){
      map.centerAndZoom(city,11);      // 用城市名设置地图中心点
    }
  }
</script>