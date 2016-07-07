<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<script type="text/javascript">
function submit_delete(id){
    if(confirm('<?php echo $lang['nc_ensure_del'];?>')) {
        $('#small_banner_form').attr('method','post');
        $('#small_banner_form').attr('action','index.php?act=home_ad&op=small_banner_del');
        $('#adv_id').val(id);
        $('#small_banner_form').submit();
    }
}
function submit_update(id)
{
  $('#small_banner_form').attr('method','post');
  $('#small_banner_form').attr('action','index.php?act=home_ad&op=small_banner_edit');
  $('#adv_id').val(id);
  $('#small_banner_form').submit();
}
</script>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['small_banner_manage'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=home_ad&op=ad_manage&ap_id=<?php echo $output['ap_id'];?>" ><span><?php echo $lang['class_title'];?></span></a></li>
          <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['nc_manage'];?></span></a></li>
          <li><a href="index.php?act=home_ad&op=small_banner_add&ap_id=<?php echo $output['ap_id'];?>&type=<?php echo $output['type'];?>" ><span><?php echo $lang['banner_add'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <!-- 操作说明 -->
  <table class="table tb-type2" id="prompt">
    <tbody>
      <tr class="space odd">
        <th colspan="12" class="nobg"> <div class="title">
            <h5><?php echo $lang['nc_prompts'];?></h5>
            <span class="arrow"></span> </div>
        </th>
      </tr>
      <tr>
        <td>
          <ul>
            <li><?php echo $lang['small_banner_notice'];?></li>
          </ul>
        </td>
      </tr>
    </tbody>
  </table>
  <form id="small_banner_form" method='post'>
    <input id="ap_id" name="ap_id" value="<?php echo $output['ap_id'];?>" type="hidden" />
    <input type="hidden" name="adv_id" value="" id="adv_id">
    <input type="hidden" name="type" value="<?php echo $output['type'];?>">
    <table class="table tb-type2">
      <thead>
        <tr class="thead">
          <th class="align-left"><?php echo $lang['small_banner_sort'];?></th>
          <th class="align-left"><?php echo $lang['small_banner_title'];?></th>
          <th class="align-left"><?php echo $lang['small_banner_linkurl'];?></th>
          <th class="align-left"><?php echo $lang['small_banner_pic'];?></th>
          <th class="align-center"><?php echo $lang['small_banner_handle'];?></th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($output['ad_list']) && is_array($output['ad_list'])){ ?>
        <?php foreach($output['ad_list'] as $val){ ?>
        <tr class="hover edit">
          <td class="w48 sort"><span nc_type="small_banner_sort"><?php echo $val['adv_content']['small_banner_sort'];?></span></td>
          <td class="name"><span nc_type="small_banner_title"><?php echo $val['adv_content']['small_banner_title'];?></span></td>
            <td class="name"><span nc_type="small_banner_linkurl"><?php echo $val['adv_content']['small_banner_linkurl'];?></span></td>
            <td class="name"><span nc_type="small_banner_pic"><img width="30" height="31" src="<?php echo UPLOAD_SITE_URL.DS.'home/';?><?php echo $val['adv_content']['small_banner_pic'];?>"></span></td>
          <td class="w72 align-center">
            <a href="javascript:submit_update(<?php echo $val['adv_id'];?>)"><?php echo $lang['small_banner_edit'];?></a> | 
            <a href="javascript:submit_delete(<?php echo $val['adv_id'];?>)"><?php echo $lang['small_banner_del'];?></a>
          </td>
        </tr>
        <?php } ?>
        <?php }else { ?>
        <tr class="no_data">
          <td colspan="10"><?php echo $lang['nc_no_record'];?></td>
        </tr>
        <?php } ?>
      </tbody>
      <?php if(!empty($output['ad_list'])) {?>
       <tfoot>
         <tr class="tfoot">
          <td id="batchAction" colspan="15">
            <div class="pagination"> <?php echo $output['show_page'];?> 
            </div>
          </td>
        </tr>
      </tfoot>
      <?php }?>
    </table>
  </form>
</div>
