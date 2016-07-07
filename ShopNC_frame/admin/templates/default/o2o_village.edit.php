<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['village'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=o2o_village&op=village_list"><span><?php echo $lang['nc_manage'];?></span></a></li>
		    <li><a href="index.php?act=o2o_village&op=village_add"><span><?php echo $lang['nc_add'];?></span></a></li>
        <li><a href="javascript:void(0);" class='current'><span><?php echo $lang['nc_edit'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <!-- 地区三级联动选择 -->
    <table class="tb-type1 noborder search">
      <tbody>
        <tr>
          <th><label><?php echo $lang['nc_admin_area_choose']; ?></label></th>
          <td id="o2o_area_change">
            <?php if($output['parent_city']) {?>
            <select name='first_letter' >
              <option value=""><?php echo $lang['nc_please_choose'];?>...</option>
              <?php foreach($output['area_list'] as $l){?>
              <option value='<?php echo $l['area_id'];?>' <?php if($l['area_id']==$output['parent_city']['area_id']) { ?>selected<?php } ?>><?php echo $l['area_name'];?></option>
              <?php }?>
            </select>
             <select id='area' class="class-select" onchange="change(this.options[this.options.selectedIndex].value)">
              <option value=""><?php echo $lang['nc_please_choose'];?>...</option>
              <?php foreach($output['child_city'] as $v){?>
              <option value="<?php echo $v['area_id'];?>" <?php if($v['area_id']==$output['city']['area_id']) { ?>selected<?php } ?>><?php echo $v['area_name'];?></option>
              <?php }?>
            </select>
            <?php } else {?>
              <select name='first_letter' >
              <option value=""><?php echo $lang['nc_please_choose'];?>...</option> 
              <?php foreach($output['area_list'] as $l){?>
              <option value="<?php echo $l['area_id'];?>" <?php if($l['area_id']==$output['city']['area_id']){?>selected<?php }?>><?php echo $l['area_name'];?></option>
              <?php }?>
            </select>
            <?php } ?>
          </td>
        </tr>
      </tbody>
    </table>
  <form id="add_form" method="post" enctype="multipart/form-data" action="index.php?act=o2o_village&op=village_edit">
	<input type='hidden' name='area_id' value="<?php echo $output['area_info']['area_id'];?>">
    <table class="table tb-type2">
      <tbody>

      <!-- 小区名称 -->
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="area_name"><?php echo $lang['nc_admin_village_name'].$lang['nc_colon'];?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" onchange="query();" onmouseout="query();" value="<?php echo $output['village_info']['village_name'] ?>" name="village[area_name]" id="area_name" class="txt" ></td>
          <td class="vatop tips"><?php echo $lang['offline_area_name_error'];?></td>
        </tr>

      <!-- 小区坐标 -->
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="txtPoint"><?php echo $lang['nc_admin_village_longitude'].$lang['nc_colon'];?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['village_info']['longitude'] ?>" name="village[txtPoint]" id="txtPoint" class="txt" readonly="readonly" ></td>
          <td class="vatop tips"><?php echo $lang['offline_area_name_error'];?></td>
        </tr>
      
      <!-- 小区首字母 -->
      <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="first_letter"><?php echo $lang['nc_admin_first_letter'].$lang['nc_colon'];?></label></td>
      </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <input type="text" value="<?php echo $output['village_info']['first_letter']; ?>" name="village[first_letter]" id="first_letter" class="txt" />
            <!-- <td class="vatop tips"><?php echo $lang['offline_area_name_error'];?></td> -->
            <td id="szm" >
              
            </td>
          </td>          
        </tr>

<!-- 百度地图 -->
    <?php include template('o2o_map'); ?>


  <!-- 小区面积
    <tr class="noborder">
          <td colspan="2" class="required"><label for="proportion"><?php echo $lang['nc_admin_village_proportion'].$lang['nc_colon'];?></label></td>
        </tr>
    <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['village_info']['proportion']; ?>" name="village[proportion]" id="proportion" class="txt"></td>
        </tr>
  <!-- 小区人口数 -->
    <tr class="noborder">
          <td colspan="2" class="required"><label for="number"><?php echo $lang['nc_admin_village_number'].$lang['nc_colon'];?></label></td>
        </tr>
    <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['village_info']['number']; ?>" name="village[number]" id="number" class="txt"></td>
        </tr>
  <!-- 小区联系人 -->
    <tr class="noborder">
          <td colspan="2" class="required"><label for="contacts"><?php echo $lang['nc_admin_village_contacts'].$lang['nc_colon'];?></label></td>
        </tr>
    <tr class="noborder">
          <td class="vatop rowform"><input type="text" name="village[contacts]" id="contacts" class="txt" value="<?php echo $output['village_info']['contacts']; ?>"></td>
        </tr>
  <!-- 联系电话 -->
    <tr class="noborder">
          <td colspan="2" class="required"><label for="phone"><?php echo $lang['nc_admin_village_phone'].$lang['nc_colon'];?></label></td>
        </tr>
    <tr class="noborder">
          <td class="vatop rowform"><input type="text" name="village[phone]" id="phone" class="txt" value="<?php echo $output['village_info']['phone']; ?>"></td>
        </tr>

  <!-- 小区状态 -->
    <tr class="noborder">
          <td colspan="2" class="required"><label for="phone"><?php echo $lang['nc_admin_village_status'].$lang['nc_colon'];?></label></td>
        </tr>
    <tr class="noborder">
          <td class="vatop rowform">
          <select name="village[status]" id="village_status">
            <?php foreach ($output['village_status'] as $k => $status) {?>
              <option value="<?php echo $k; ?>" <?php if ( $output['village_info']['village_status'] == $k ) { echo 'selected'; } ?>><?php echo $status; ?></option>
            <?php }?>
          </select>
          </td>
        </tr>

    <!-- 小区备注 -->
    <tr class="noborder">
          <td colspan="2" class="required"><label for="remarks"><?php echo $lang['nc_admin_village_remarks'].$lang['nc_colon'];?></label></td>
        </tr>
    <tr class="noborder">
          <td class="vatop rowform">
          <textarea name="village[remarks]" id="remarks" ><?php echo $output['village_info']['village_remarks']; ?></textarea>
          </td>
        </tr>

    <!-- 小区详细地址 -->
    <tr class="noborder">
          <td colspan="2" class="required"><label for="remarks"><?php echo $lang['nc_admin_village_address_info'].$lang['nc_colon'];?></label></td>
        </tr>
    <tr class="noborder">
          <td class="vatop rowform"><input type="text" name="village[address_info]" id="address_info" value="<?php echo $output['village_info']['address_info']; ?>" class="txt"></td>
        </tr>


  <!-- 上级区域 -->
    <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="area_class"><?php echo $lang['nc_admin_up_area'].$lang['nc_colon'];?></label></td>
        </tr>
    <tr class="noborder">
        <td class="vatop rowform">
          <input type="hidden" id="o2o_area_id" name="o2o_area_id" value="<?php echo $output['village_info']['city_id']; ?>" />
          <input type="hidden" id="o2o_area_arr" name="o2o_area_arr" value=""  />　
          <span id="o2o_area_name"><?php echo $output['area_name']; ?></span>
          <input type="hidden" id="village_id" name="village_id" value="<?php echo $output['village_info']['village_id']; ?>" />
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
              <?php if(is_array($output['fullpic_arr'])){?>
                <?php foreach($output['fullpic_arr'] as $k => $v){ ?>
                <li name="<?php echo $output['pic_arr'][$k];?>" class="picture" >
                  <div class="size-64x64"><span class="thumb"><i></i><img src="<?php echo $v;?>" alt="" onload="javascript:DrawImage(this,64,64);"/></span></div>
                  <p>　<span><a href="javascript:del_file_upload('<?php echo $output['pic_arr'][$k];?>');"><?php echo $lang['nc_del'];?></a></span></p>
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
            url: 'index.php?act=o2o_village&op=edit_village_pic_upload&village_id=<?php echo $output['village_info']['village_id']; ?>',
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
    var newImg = '<li id="' + file_data.file_name + '" class="picture"><input type="hidden" name="file_id[]" value="' + file_data.file_id + '" /><div class="size-64x64"><span class="thumb"><i></i><img onload="javascript:DrawImage(this,64,64);" src="<?php echo UPLOAD_SITE_URL.'/'.O2O_VILLAGE.'/'.$output['village_info']['village_id'].'/'; ?>' + file_data.file_name + '" alt="' + file_data.file_name + '" width="64px" height="64px"/></span></div><p>　<span><a href="javascript:del_file_upload(' + file_data.file_name + ');"><?php echo $lang['nc_del'];?></a></span></p></li>';
    $('#thumbnails').prepend(newImg);
}
// 删除图片
function del_file_upload(file_id)
{
    if(!window.confirm('<?php echo $lang['nc_ensure_del'];?>')){
        return;
    }
    $.getJSON('index.php?act=o2o_village&op=ajax&branch=edit_del_file_upload&village_id=<?php echo $output['village_info']['village_id']; ?>&file_id=' + file_id, function(result){
        if(result){
            $("li[name='"+ file_id +"']").remove();
        }else{
            alert('<?php echo $lang['article_add_del_fail'];?>');
        }
    });
}

</script> 




<script type="text/javascript">

  var longitude  = $("#txtPoint").val().split( ',' );

  var map = new BMap.Map("allmap");
  map.centerAndZoom(new BMap.Point(116.331398,39.897445), 12);
  // 鼠标缩放
  map.enableScrollWheelZoom(true);

  // 用经纬度设置地图中心点  
  map.clearOverlays(); 
  var new_point = new BMap.Point( longitude[0], longitude[1] );
  var marker = new BMap.Marker(new_point);  // 创建标注
  map.addOverlay(marker);              // 将标注添加到地图中
  map.panTo(new_point); 

  // 点击获取经纬度
  map.addEventListener("click",function(e){
    document.getElementById("txtPoint").value = e.point.lng + "," + e.point.lat;
  });

  // 根据城市名定位
  function theLocation(){
    var city = document.getElementById("o2o_area_arr").value;
    if(city != ""){
      map.centerAndZoom(city,11);      // 用城市名设置地图中心点
    }
  }

</script>
<script type="text/javascript">
function change(value) {
    $("#o2o_area_id").val(value);
}
</script>

