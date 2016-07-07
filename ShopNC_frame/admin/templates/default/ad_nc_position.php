<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['adv_index_manage'];?></h3>
      <ul class="tab-base">
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['ap_manage'];?></span></a></li>
        <li><a href="index.php?act=nc_ad&op=ap_add" ><span><?php echo $lang['ap_add'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form method="get" action="index.php?act=adv&op=ap_manage" name="formSearch">
    <input type="hidden" name="act" value="nc_ad" />
    <input type="hidden" name="op" value="home_ad" />
    <input type="hidden" name="ref_url" value="<?php echo $output['ref_url'];?>"/>
    <table class="tb-type1 noborder search">
      <tbody>
        <tr>
          <th><label for="search_name"><?php echo $lang['ap_name']; ?></label></th>
          <td><input class="txt" type="text" name="search_name" id="search_name" value="<?php echo $_GET['search_name'];?>" /></td>
          <td><a href="javascript:document.formSearch.submit();" class="btn-search " title="<?php echo $lang['nc_query'];?>">&nbsp;</a>
            <?php if($output['search_title'] != '' or $output['search_ac_id'] != ''){?>
            <a href="JavaScript:void(0);" onclick=window.location.href='index.php?act=nc_ad&op=ad_manage' class="btns " title="<?php echo $lang['adv_all']; ?>"><span><?php echo $lang['adv_all']; ?></span></a>
            <?php }?></td>
        </tr>
      </tbody>
    </table>
  </form>
  <form method="post" id="store_form">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2">
      <thead>
        <tr class="thead">
          <th><input type="checkbox" class="checkall"/></th>
          <th><?php echo $lang['ap_name'];?></th>
          <!--th class="align-center"><?php echo $lang['adv_class'];?></th-->
          <th class="align-center"><?php echo $lang['ap_is_use'];?></th>
          <th class="align-center"><?php echo $lang['ap_sort'];?></th>
          <th class="align-center"><?php echo $lang['nc_handle'];?></th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($output['ap_list']) && is_array($output['ap_list'])){ ?>
        <?php foreach($output['ap_list'] as $k => $v){ ?>
        <tr class="hover">
          <td class="w24"><input type="checkbox" class="checkitem" name="del_id[]" value="<?php echo $v['ap_id']; ?>" /></td>
          <td><span title="<?php echo $v['ap_name'];?>"><?php echo str_cut($v['ap_name'], '40');?></span></td>
          <td class="align-center yes-onoff"><?php if($v['is_use'] == '0'){ ?>
            <a href="JavaScript:void(0);" class=" disabled" ajax_branch="is_use" nc_type="inline_edit" fieldname="is_use" fieldid="<?php echo $v['ap_id']?>" fieldvalue="0" title="<?php echo $lang['nc_editable'];?>"><img src="<?php echo ADMIN_TEMPLATES_URL;?>/images/transparent.gif"></a>
            <?php }else { ?>
            <a href="JavaScript:void(0);" class=" enabled" ajax_branch="is_use" nc_type="inline_edit" fieldname="is_use" fieldid="<?php echo $v['ap_id']?>" fieldvalue="1" title="<?php echo $lang['nc_editable'];?>"><img src="<?php echo ADMIN_TEMPLATES_URL;?>/images/transparent.gif"></a>
            <?php } ?></td>
            <td class="align-center">
            	<?php echo $v['ap_sort'];?>
            </td>
          <td class="align-center">
          <a href="index.php?act=nc_ad&op=nc_ad_goodsadd&ap_id=<?php echo $v['ap_id'];?>">添加产品</a> | <a href='index.php?act=nc_ad&op=ap_edit&ap_id=<?php echo $v['ap_id'];?>'><?php echo $lang['nc_edit'];?></a></td>
        </tr>
        <?php } ?>
        <?php }else { ?>
        <tr class="no_data">
          <td colspan="15"><?php echo $lang['nc_no_record'];?></td>
        </tr>
        <?php } ?>
      </tbody>
      <tfoot>
        <tr class="tfoot">
          <td><input type="checkbox" class="checkall" id="checkall"/></td>
          <td id="batchAction" colspan="15"><span class="all_checkbox">
            <label for="checkall"><?php echo $lang['nc_select_all'];?></label>
            </span>&nbsp;&nbsp;<a href="JavaScript:void(0);" class="btn" onclick="confirm_sub()"><span><?php echo $lang['nc_del'];?></span></a>
            <div class="pagination"> <?php echo $output['page'];?> </div></td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.edit.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/dialog/dialog.js" id="dialog_js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/jquery.ui.js"></script>
<script type="text/javascript">
function confirm_sub() {
  var num=0;
  $(".checkitem").each(function(){
    if($(this)[0].checked) {
      num++;
    }
  });
  if(num<=0) {
    alert("请选择要删除的广告位");
    return false;
  }  
  if(confirm('<?php echo $lang['ap_del_sure'];?>')) {
    $('#store_form').submit();
  }
}
</script>
