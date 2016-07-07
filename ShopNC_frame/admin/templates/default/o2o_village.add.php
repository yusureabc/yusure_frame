<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['village'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=o2o_village&op=village_list"><span><?php echo $lang['nc_manage'];?></span></a></li>
		    <li><a href="javascript:void(0);" class='current'><span><?php echo $lang['nc_add'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>

    <table class="tb-type1 noborder search">
      <tbody>
        <tr>
          <th><label><?php echo $lang['nc_admin_area_choose']; ?></label></th>
          <td id="o2o_area_change">
            <select id="city" name='first_letter' >
              <option value=""><?php echo $lang['nc_please_choose'];?>...</option>
              <?php foreach($output['area_list'] as $l){?>
              <option value='<?php echo $l['area_id'];?>' ><?php echo $l['area_name'];?></option>
              <?php }?>
            </select>
          </td>
        </tr>
      </tbody>
    </table>

  <form id="add_form" method="post" enctype="multipart/form-data" action="index.php?act=o2o_village&op=village_add">
    <table class="table tb-type2">
      <tbody>
      <!-- 小区名称 -->
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="area_name"><?php echo $lang['nc_admin_village_name'].$lang['nc_colon'];?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="" onchange="query(); local_search(this.value);" onmouseout="query(); local_search(this.value);" name="village[area_name]" id="area_name" class="txt" ></td>
          <td class="vatop tips"><?php echo $lang['offline_area_name_error'];?></td>
        </tr>

      <!-- 小区坐标 -->
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="txtPoint"><?php echo $lang['nc_admin_village_longitude'].$lang['nc_colon'];?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="" name="village[txtPoint]" id="txtPoint" class="txt" readonly="readonly" ></td>
          <td class="vatop tips"><?php echo $lang['offline_area_name_error'];?></td>
        </tr>
      
      <!-- 小区首字母 -->
      <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="first_letter"><?php echo $lang['nc_admin_first_letter'].$lang['nc_colon'];?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <input type="text" value="" name="village[first_letter]" id="first_letter" class="txt" />
            <!-- <td class="vatop tips"><?php echo $lang['offline_area_name_error'];?></td> -->
            <td id="szm" >
              
            </td>
          </td>          
        </tr>

    <!-- 百度地图 -->
    <?php include template('o2o_map'); ?>

  <!-- 小区面积 -->
		<tr class="noborder">
          <td colspan="2" class="required"><label for="proportion"><?php echo $lang['nc_admin_village_proportion'].$lang['nc_colon'];?></label></td>
        </tr>
		<tr class="noborder">
          <td class="vatop rowform"><input type="text" value="" name="village[proportion]" id="proportion" class="txt"></td>
        </tr>
  <!-- 小区人口数 -->
		<tr class="noborder">
          <td colspan="2" class="required"><label for="number"><?php echo $lang['nc_admin_village_number'].$lang['nc_colon'];?></label></td>
        </tr>
		<tr class="noborder">
          <td class="vatop rowform"><input type="text" value="" name="village[number]" id="number" class="txt"></td>
        </tr>
  <!-- 小区联系人 -->
		<tr class="noborder">
          <td colspan="2" class="required"><label for="contacts"><?php echo $lang['nc_admin_village_contacts'].$lang['nc_colon'];?></label></td>
        </tr>
		<tr class="noborder">
          <td class="vatop rowform"><input type="text" name="village[contacts]" id="contacts" class="txt"></td>
        </tr>
  <!-- 联系电话 -->
    <tr class="noborder">
          <td colspan="2" class="required"><label for="phone"><?php echo $lang['nc_admin_village_phone'].$lang['nc_colon'];?></label></td>
        </tr>
    <tr class="noborder">
          <td class="vatop rowform"><input type="text" name="village[phone]" id="phone" class="txt"></td>
        </tr>
    <!-- 小区备注 -->
    <tr class="noborder">
          <td colspan="2" class="required"><label for="remarks"><?php echo $lang['nc_admin_village_remarks'].$lang['nc_colon'];?></label></td>
        </tr>
    <tr class="noborder">
          <td class="vatop rowform"><input type="text" name="village[remarks]" id="remarks" class="txt"></td>
        </tr>
    <!-- 小区详细地址 -->
    <tr class="noborder">
          <td colspan="2" class="required"><label for="remarks"><?php echo $lang['nc_admin_village_address_info'].$lang['nc_colon'];?></label></td>
        </tr>
    <tr class="noborder">
          <td class="vatop rowform"><input type="text" name="village[address_info]" id="address_info" class="txt"></td>
        </tr>

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
      
      <!-- 多图上传 -->
      <tr>
          <td colspan="2" class="required"><?php echo $lang['article_add_upload'];?>:</td>
        </tr>
        <tr class="noborder">
          <td colspan="3" id="divComUploadContainer"><input type="file" multiple="multiple" id="fileupload" name="fileupload" /></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><?php echo $lang['article_add_uploaded'];?>:</td>
        <tr>
          <td colspan="2"><ul id="thumbnails" class="thumblists">
              <?php if(is_array($output['file_upload'])){?>
              <?php foreach($output['file_upload'] as $k => $v){ ?>
              <li id="<?php echo $v['upload_id'];?>" class="picture" >
                <input type="hidden" name="file_id[]" value="<?php echo $v['upload_id'];?>" />
                <div class="size-64x64"><span class="thumb"><i></i><img src="<?php echo $v['upload_path'];?>" alt="<?php echo $v['file_name'];?>" onload="javascript:DrawImage(this,64,64);"/></span></div>
                <p>　<span><a href="javascript:del_file_upload('<?php echo $v['upload_id'];?>');"><?php echo $lang['nc_del'];?></a></span></p>
              </li>
              <?php } ?>
              <?php } ?>
            </ul><div class="tdare">
              
          </div></td>
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
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/fileupload/jquery.iframe-transport.js" charset="utf-8"></script> 
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/fileupload/jquery.ui.widget.js" charset="utf-8"></script> 
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/fileupload/jquery.fileupload.js" charset="utf-8"></script> 
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/first_letter.js" charset="utf-8"></script>
<script type="text/javascript">
var ADMIN_SITEURL = "<?php echo ADMIN_SITE_URL; ?>";

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

    // 图片上传
    $('#fileupload').each(function(){
        $(this).fileupload({
            dataType: 'json',
            url: 'index.php?act=o2o_village&op=village_pic_upload',
            done: function (e,data) {
                if(data != 'error'){
                  add_uploadedfile(data.result);
                }
            }
        });
    });
});
// 添加图片
function add_uploadedfile(file_data)
{
    var newImg = '<li id="' + file_data.file_id + '" class="picture"><input type="hidden" name="file_id[]" value="' + file_data.file_id + '" /><div class="size-64x64"><span class="thumb"><i></i><img src="<?php echo UPLOAD_SITE_URL.'/'.O2O_VILLAGE.'/';?>' + file_data.file_name + '" alt="' + file_data.file_name + '" width="64px" height="64px"/></span></div><p>　<span><a href="javascript:del_file_upload(' + file_data.file_id + ');"><?php echo $lang['nc_del'];?></a></span></p></li>';
    $('#thumbnails').prepend(newImg);
}
// 删除图片
function del_file_upload(file_id)
{
    if(!window.confirm('<?php echo $lang['nc_ensure_del'];?>')){
        return;
    }
    $.getJSON('index.php?act=o2o_village&op=ajax&branch=del_file_upload&file_id=' + file_id, function(result){
        if(result){
            $('#' + file_id).remove();
        }else{
            alert('<?php echo $lang['article_add_del_fail'];?>');
        }
    });
}

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

