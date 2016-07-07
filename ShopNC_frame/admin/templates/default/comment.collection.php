<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['nc_admin_comment_collection'];?></h3>
      <ul class="tab-base">
         <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['nc_admin_comment_setting'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="add_form" method="post" enctype="multipart/form-data">
  <input type="hidden" name="act" value="merchant" />
  <input type="hidden" name="op" value="comment_collection" />
    <table class="table tb-type2">
      <tbody>
        <!-- 采集URL -->
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="collection_url"><?php echo $lang['nc_admin_collection_url'].$lang['nc_colon'];?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text"  name="collection_url" id="collection_url" class="txt"></td>
          <td class="vatop tips"><?php echo $lang['nc_admin_collection_meituan_help'].'　'.$lang['nc_admin_collection_dianping_help'];?></td>
        </tr>
        <!-- 采集网站 -->
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="collection_web"><?php echo $lang['nc_admin_collection_web'].$lang['nc_colon'];?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <input type="radio"  name="collection_web" value="1" >美团
            <input type="radio"  name="collection_web" value="2" >大众点评
          </td>
          <td class="vatop tips"><?php echo $lang['class_name_error'];?></td>
        </tr>
        <!-- 采集页数 -->
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="collection_page"><?php echo $lang['nc_admin_collection_page'].$lang['nc_colon'];?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text"  name="collection_page" id="collection_page" class="txt"></td>
          <td class="vatop tips"> 多页支持格式 1,2,3   (每页10条) </td>
        </tr>
        <!-- 评论生成日期 -->
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="collection_page"><?php echo $lang['nc_admin_collection_date'].$lang['nc_colon'];?></label></td>
        </tr>
        <td>
            <input class="txt date" type="text" id="query_start_time" name="query_start_time">
            <label for="query_start_time">~</label>
            <input class="txt date" type="text" id="query_end_time" name="query_end_time"/>
        </td>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="2"><a id="ncsubmit" href="javascript:void(0)" class="btn"><span>开始采集</span></a></td>
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
    $('#query_start_time').datepicker({dateFormat: 'yy-mm-dd'});
    $('#query_end_time').datepicker({dateFormat: 'yy-mm-dd'});
    $('#ncsubmit').click(function(){      
      $('#add_form').submit();
    });
});
</script> 