<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['nc_admin_cloudpush'];?></h3>
      <ul class="tab-base">
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['nc_admin_push'];?></span></a></li>
        <li><a href="index.php?act=mb_cloudpush&op=mb_cloudpush_add" ><span><?php echo $lang['nc_admin_push_set'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <table class="table tb-type2" id="prompt">
    <tbody>
      <tr class="space odd">
        <th colspan="12"><div class="title">
            <h5><?php echo $lang['nc_prompts'];?></h5><!--操作提示-->
            <span class="arrow"></span></div></th>
      </tr>
      <tr>
        <td><ul>
            <li><?php echo $lang['link_cloudpush_help1'];?></li><!--操作提示下内容-->
          </ul></td>
      </tr>
    </tbody>
  </table>
  <form id="form" method="post" enctype="multipart/form-data" name="settingForm">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label for="ad_search"  class="validation"><?php echo $lang['nc_admin_push_title'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input id="ad_search" name="ad_search" value="" class="txt" type="text"></td>
          <td class="vatop tips"><span class="vatop rowform"><?php echo $lang['nc_admin_push_title_ti'];?></span></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="content" class="validation"><?php echo $lang['nc_admin_push_conten'];?>:</label></td>
        </tr>
        <!--编辑选项单选框-->
        <!--tr class="noborder">
          <td colspan="2" class="required">
            <label for="danxuan" class="validation"><?php echo $lang['nc_admin_push_edit'];?>:</label>
          </td>
        </tr-->
        <tr class="noborder">
          <td colspan="2" class="required">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="danxuan"><?php echo $lang['nc_admin_push_editpt'];?></label><input type="radio" name="t_id" value="0" checked="checked" id="pt"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $lang['nc_admin_push_editgj'];?></label></label><input type="radio" name="t_id" value="1" id="gj"/>
          </td>
        </tr>
        <tr class="noborder"id="general_editing">
          <td class="vatop rowform"><textarea name="content" rows="6" class="tarea" id="content"></textarea></td>
          <td class="vatop tips"><span class="vatop rowform"><?php echo $lang['nc_admin_push_ptjs'];?></span></td>
        </tr> 
        <!--编辑器处-->
        <tr class="noborder" id="senior_editor">
          <td colspan="2" class="vatop rowform"><?php showEditor('article_content');?></td>
          <td class="vatop tips"><span class="vatop rowform"><?php echo $lang['nc_admin_push_gjjs'];?></span></td>
        </tr>

      </tbody>
      <tfoot>
        <tr class="tfoot">
          <td colspan="2" ><a href="JavaScript:void(0);" class="btn" onclick="document.settingForm.submit()"><span><?php echo $lang['nc_admin_push_push'];?></span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.edit.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/zepto.min.js" charset="utf-8"></script>
<script type="text/javascript">
$("#senior_editor").hide();
 $(document).ready(function(){
     $("#pt").on("click", function(){
        $("#senior_editor").hide();
        $("#general_editing").show();
        
     });
     $("#gj").on("click", function(){
        $("#general_editing").hide();
        $("#senior_editor").show();
    });
});
</script>