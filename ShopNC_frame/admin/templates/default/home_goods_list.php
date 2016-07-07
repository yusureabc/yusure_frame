<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['goods_list'];?></h3>
      <ul class="tab-base">
         <li><a href="index.php?act=home_ad&op=ad_manage&ap_id=<?php echo $output['ap_id'];?>" ><span><?php echo $lang['class_title'];?></span></a></li>
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['goods_manage'];?></span></a></li>
        <li><a href="index.php?act=home_ad&op=goods_add&ap_id=<?php echo $output['ap_id'];?>&type=<?php echo $output['type'];?>" ><span><?php echo $lang['goods_add'];?></span></a></li>
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
        <td><ul>
            <li><?php echo $lang['goods_tip'];?></li>
          </ul></td>
      </tr>
    </tbody>
  </table>
  <form id="list_form" method='post'>
    <table class="table tb-type2">
      <thead>
        <tr class="thead">
          <th class="align-left"><?php echo $lang['adv_sort'];?></th>
          <th class="align-left"><?php echo $lang['goods_name'];?></th>
          <th class="align-center"><?php echo $lang['goods_price'];?></th>
          <th class="align-center"><?php echo $lang['goods_pic'];?></th>
          <th class="align-center"><?php echo $lang['goods_introduce'];?></th>
          <th class="align-center"><?php echo $lang['goods_handle'];?></th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($output['ad_list']) && is_array($output['ad_list'])){ ?>
        <?php foreach($output['ad_list'] as $val){ ?>
        <tr class="hover edit">
          <td class="w48 sort"><span><?php echo $val['adv_sort'];?></span></td>
           <td><?php echo $val['adv_content']['goods_name'];?></td>
           <td  class="align-center"><?php echo $val['adv_content']['goods_price'];?></td>
           <td  class="align-center picture"><img width="30" height="31" src="<?php echo UPLOAD_SITE_URL;?>/home/<?php echo $val['adv_content']['goods_pic'];?>" onload='javascript:DrawImage(this,88,31);'/></td>
           <td  class="align-center"><?php echo $val['adv_content']['goods_introduce'];?></td>
           <td class="w96 align-center"><a href="index.php?act=home_ad&op=goods_edit&adv_id=<?php echo $val['adv_id'];?>&ap_id=<?php echo $output['ap_id'];?>&type=<?php echo $output['type'];?>"><?php echo $lang['nc_edit'];?></a> | <a href="javascript:if(confirm('<?php echo $lang['nc_ensure_del'];?>'))window.location = 'index.php?act=home_ad&op=goods_del&adv_id=<?php echo $val['adv_id'];?>&ap_id=<?php echo $output['ap_id'];?>&type=<?php echo $output['type'];?>';"><?php echo $lang['nc_del'];?></a></td>
        </tr>
        <?php } ?>
        <?php }else { ?>
        <tr class="no_data">
          <td colspan="10"><?php echo $lang['nc_no_record'];?></td>
        </tr>
        <?php } ?>
      </tbody>
      <?php if(!empty($output['ad_list']) && is_array($output['ad_list'])){ ?>
      <tfoot>
        <tr class="tfoot">
          <td id="batchAction" colspan="15">
            <div class="pagination"><?php echo $output['show_page'];?></div>
        </tr>
      </tfoot>
      <?php } ?>
    </table>
  </form>
</div>
