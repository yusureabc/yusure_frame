<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['store_service'];?></h3>
      <ul class="tab-base">
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['manage'];?></span></a></li>
        <li><a href="index.php?act=o2o_store_service&op=service_add"><span><?php echo $lang['nc_admin_srevice_add'];?></span></a></li>
        <li><a href="index.php?act=o2o_store_service&op=reason_list"><span><?php echo '原因列表';?></span></a></li>
        <li><a href="index.php?act=o2o_store_service&op=reason_add"><span><?php echo $lang['nc_admin_add_reason'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form method="get" action="index.php" name="formSearch" id="formSearch">
    <input type="hidden" name="act" value="o2o_store_service" />
    <input type="hidden" name="op" value="service_list" />
    <table class="tb-type1 noborder search">
      <tbody>        
        <tr>
         <th><?php echo $lang['nc_admin_service_name'];?></th>
         <td><input class="txt-short" type="text" name="service_name" value="<?php echo $output['service_name'];?>" /></td> 
          <td>
            <a href="javascript:viod(0);" id="ncsubmit" class="btn-search " title="<?php echo $lang['nc_query'];?>">&nbsp;</a>
            <?php if ( $output['service_name'] != '' ) { ?>
            <a class="btns " href="index.php?act=o2o_store_service&op=service_list" title="<?php echo $lang['nc_cancel_search'];?>"><span><?php echo $lang['nc_cancel_search'];?></span></a>
            <?php } ?>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
  <table class="table tb-type2" id="prompt">
    <tbody>
      <tr class="space odd">
        <th colspan="12"><div class="title"><h5><?php echo $lang['nc_prompts'];?></h5><span class="arrow"></span></div></th>
      </tr>
      <tr>
        <td>
        <ul>
            <li><?php echo $lang['service_help1'];?></li>
          </ul></td>
      </tr>
    </tbody>
  </table>

  <table class="table tb-type2 nobdb">
    <thead>
      <tr class="thead">
        <th><?php echo $lang['nc_admin_service_name'];?></th>
        <th><?php echo $lang['nc_admin_area_add_time'];?></th>
        <th class="align-center"><?php echo $lang['nc_handle'];?></th>
      </tr>
    </thead>
    <tbody>
      <?php if(count($output['service_list'])>0){?>
      <?php foreach($output['service_list'] as $val){?>
      <tr class="hover">
        <td><?php echo $val['name'];?></td>
        <td><?php echo date('Y-m-d H:i:s',$val['add_time']);?></td>
        <td class="align-center">
          <a href="index.php?act=o2o_store_service&op=service_edit&id=<?php echo $val['id'];?>&name=<?php echo $val['name'] ?>"><?php echo $lang['nc_edit'];?></a>
        </td>
      </tr>
      <?php }?>
      <?php }else{?>
      <tr class="no_data">
        <td colspan="15"><?php echo $lang['nc_no_record'];?></td>
      </tr>
      <?php }?>
    </tbody>
    <tfoot>
      <tr class="tfoot">
        <td colspan="15" id="dataFuncs"><div class="pagination"> <?php echo $output['show_page'];?> </div></td>
      </tr>
    </tfoot>
  </table>
</div>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/jquery.ui.js"></script> 
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/i18n/zh-CN.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/themes/ui-lightness/jquery.ui.css"  />
<script type="text/javascript">
$(function(){

    $('#ncsubmit').click(function(){
    	$('input[name="op"]').val('service_list');$('#formSearch').submit();
    });
});
</script> 
