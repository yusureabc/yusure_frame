<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<script type="text/javascript">
function submit_delete(id){
    if(confirm('<?php echo $lang['nc_ensure_del'];?>')) {
        $('#cate_form').attr('method','post');
        $('#cate_form').attr('action','index.php?act=home_ad&op=class_del');
        $('#adv_id').val(id);
        $('#cate_form').submit();
    }
}
function submit_update(id)
{
  $('#cate_form').attr('method','post');
  $('#cate_form').attr('action','index.php?act=home_ad&op=class_edit');
  $('#adv_id').val(id);
  $('#cate_form').submit();
}
</script>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['cate_manage'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=home_ad&op=ad_manage&ap_id=<?php echo $output['ap_id'];?>" ><span><?php echo $lang['class_title'];?></span></a></li>
          <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['nc_manage'];?></span></a></li>
          <li><a href="index.php?act=home_ad&op=class_add&ap_id=<?php echo $output['ap_id'];?>&type=<?php echo $output['type'];?>" ><span><?php echo $lang['nc_new'];?></span></a></li>
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
            <li><?php echo $lang['cate_notice'];?></li>
          </ul>
        </td>
      </tr>
    </tbody>
  </table>
  <form id="cate_form" method='post'>
    <input id="ap_id" name="ap_id" value="<?php echo $output['ap_id'];?>" type="hidden" />
    <input id="type" name="type" value="<?php echo $output['type'];?>" type="hidden" />
    <input type="hidden" name="adv_id" value="" id="adv_id">
    <table class="table tb-type2">
      <thead>
        <tr class="thead">
          <th class="align-left w144"><?php echo $lang['nc_sort'];?></th>
          <th class="align-center"><?php echo $lang['cate_title'];?></th>
          <th class="align-center"><?php echo $lang['nc_handle'];?></th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($output['ad_list']) && is_array($output['ad_list'])){ ?>
        <?php foreach($output['ad_list'] as $val){ ?>
        <tr class="hover edit">
          <td class="w144 sort"><span><?php echo $val['adv_sort'];?></span></td>
          <td class="name align-center"><span><?php echo $val['adv_content']['class_title'];?></span></td>
          <td class="w144 align-center">
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
