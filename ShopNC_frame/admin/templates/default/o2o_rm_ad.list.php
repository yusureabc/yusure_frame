<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3>热门搜索<?php echo $lang['link_index_mb_ad'];?></h3>
      <ul class="tab-base">
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['nc_manage'];?></span></a></li>
        <li><a href="index.php?act=o2o_mb_ad&op=rm_ad_add" ><span><?php echo $lang['nc_new'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <table class="table tb-type2" id="prompt">
    <tbody>
      <tr class="space odd">
        <th colspan="12"><div class="title">
            <h5><?php echo $lang['nc_prompts'];?></h5>
            <span class="arrow"></span></div></th>
      </tr>
      <tr>
        <td><ul>
            <li>社区o2o热门搜索中的推荐搜索 店铺列表</li>
          </ul></td>
      </tr>
    </tbody>
  </table>
    <table class="table tb-type2 nobdb">
      <thead>
        <tr class="thead">
          <th>&nbsp;</th>
          <th><?php echo $lang['nc_sort'];?></th>
          <th>商铺名称</th>
          <th>所属城市</th>
          <th>链接地址</th>
          <th class="align-center"><?php echo $lang['nc_handle'];?></th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($output['link_list']) && is_array($output['link_list'])){ ?>
        <?php foreach($output['link_list'] as $k => $v){ ?>
        <tr class="hover edit">
          <td class="w24"></td>
          <td class="w48 sort"><span class="tooltip editable" title="<?php echo $lang['nc_editable'];?>" ajax_branch='link_sort' datatype="number" fieldid="<?php echo $v['link_id'];?>" fieldname="link_sort" nc_type="inline_edit"><?php echo $v['link_sort'];?></span></td>
          <td><?php echo $v['link_title'];?></td>
          <td><?php if($v['link_city']){
          	echo $v['link_city'];
          }else{
          	echo '默认广告位';
          }
          ?></td>
          <td><?php echo $v['link_link'];?></td>
          <td class="w96 align-center"><a href="index.php?act=o2o_mb_ad&op=rm_ad_edit&link_id=<?php echo $v['link_id'];?>"><?php echo $lang['nc_edit'];?></a> | <a href="javascript:if(confirm('<?php echo $lang['nc_ensure_del'];?>'))window.location = 'index.php?act=o2o_mb_ad&op=rm_ad_del&link_id=<?php echo $v['link_id'];?>';"><?php echo $lang['nc_del'];?></a></td>
        </tr>
        <?php } ?>
        <?php }else { ?>
        <tr class="no_data">
          <td colspan="10"><?php echo $lang['nc_no_record'];?></td>
        </tr>
        <?php } ?>
      </tbody>
      <tfoot>
        <?php if(!empty($output['link_list']) && is_array($output['link_list'])){ ?>
        <tr class="tfoot" id="dataFuncs">
          <td></td>
          <td colspan="16" id="batchAction">
            <div class="pagination"> <?php echo $output['page'];?> </div></td>
        </tr>
      </tfoot>
      <?php } ?>
    </table>
</div>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.edit.js" charset="utf-8"></script>
