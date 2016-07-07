<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['adv_index_manage'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=home_ad&op=home_ad"><span><?php echo $lang['ap_manage'];?></span></a></li>
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['ap_cate'];?></span></a><em></em></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="link_form" enctype="multipart/form-data" method="post">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2">
      <thead>
        <tr class="thead">
          <th><?php echo $lang['ap_cate_id'];?></th>
          <th><?php echo $lang['ap_cate_name'];?></th>
          <th class="align-right"><?php echo $lang['nc_handle'];?></th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($output['cate_array']) && is_array($output['cate_array'])){ ?>
        <?php foreach($output['cate_array'] as $k => $v){ ?>
        <tr class="hover">
          <td><span><?php echo $k ?></span></td>
          <td><span title="<?php echo $v['name']; ?>"><?php echo $v['name'] ?></span></td>
          <td class="w72 align-right"><a href="index.php?act=home_ad&op=ad_list&ap_id=<?php echo $output['ap_id'];?>&type=<?php echo $v['type'];?>"><?php echo $lang['adv_manage'];?></a></td>
        </tr>
        <?php } ?>
        <?php }else { ?>
        <tr class="no_data">
          <td colspan="15"><?php echo $output['ap_name'].' '.$lang['nc_no_record'];?></td>
        </tr>
        <?php } ?>
      </tbody>
      <tfoot>
         <tr class="tfoot">
          <td id="batchAction" colspan="15">
            <div class="pagination"> <?php echo $output['page'];?> 
            </div>
          </td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
