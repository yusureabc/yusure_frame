<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<script type="text/javascript">
function submit_delete(id){
    if(confirm('<?php echo $lang['nc_ensure_del'];?>')) {
        $('#class_form').attr('method','post');
        $('#class_form').attr('action','index.php?act=home_ad&op=small_class_del');
        $('#adv_id').val(id);
        $('#class_form').submit();
    }
}
function submit_update(id)
{
  $('#class_form').attr('method','post');
  $('#class_form').attr('action','index.php?act=home_ad&op=small_class_edit');
  $('#adv_id').val(id);
  $('#class_form').submit();
}
</script>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['cate_manage'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=home_ad&op=ad_manage&ap_id=<?php echo $output['ap_id'];?>" ><span><?php echo $lang['class_title'];?></span></a></li>
          <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['nc_manage'];?></span></a></li>
          <li><a href="index.php?act=home_ad&op=small_class_add&ap_id=<?php echo $output['ap_id'];?>&type=<?php echo $output['type'];?>" ><span><?php echo $lang['nc_new'];?></span></a></li>
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
            <li><?php echo $lang['small_class_notice'];?></li>
          </ul>
        </td>
      </tr>
    </tbody>
  </table>
  <form id="class_form" method='post'>
    <input id="ap_id" name="ap_id" value="<?php echo $output['ap_id'];?>" type="hidden" />
    <input type="hidden" name="adv_id" value="" id="adv_id">
     <input type="hidden" name="ap_id" value="<?php echo $output['ap_id'];?>" id="ap_id">
      <input type="hidden" name="type" value="<?php echo $output['type'];?>" id="type">
    <table class="table tb-type2">
      <thead>
        <tr class="thead">
          <th class="align-left"><?php echo $lang['small_nc_sort'];?></th>
          <th class="align-center"><?php echo $lang['small_cate_title'];?></th>
          <th class="align-center"><?php echo $lang['small_nc_handle'];?></th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($output['ad_list']) && is_array($output['ad_list'])){ ?>
        <?php foreach($output['ad_list'] as $val){ ?>
        <tr class="hover edit">
          <td class="w144 sort"><span><?php echo $val['adv_sort'];?></span></td>
          <td class="name align-center"><span><?php echo $val['adv_content']['small_class_title'];?></span></td>
          <td class="w72 align-center">
            <a href="javascript:submit_update(<?php echo $val['adv_id'];?>)"><?php echo $lang['nc_edit'];?></a> | 
            <a href="javascript:submit_delete(<?php echo $val['adv_id'];?>)"><?php echo $lang['nc_del'];?></a>
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
