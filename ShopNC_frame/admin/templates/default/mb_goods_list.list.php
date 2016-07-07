<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['app_goods_home_title'];?></h3>
      <ul class="tab-base">
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['nc_manage'];?></span></a></li>
        <li><a href="index.php?act=mb_goods&op=mb_goods_add" ><span><?php echo $lang['nc_new'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form method="get" name="formSearch" id="formSearch">
  <input type="hidden" value="mb_goods" name="act">
  <input type="hidden" value="mb_goods_list" name="op">
  <table class="tb-type1 noborder search">
  <tbody>
    <tr>
      <th><label>广告名称</label></th>
      <td><input type="text" value="<?php echo $output['goods_title'];?>" name="goods_title" id="goods_title" class="txt"></td>
        <td><a href="javascript:void(0);" id="ncsubmit" class="btn-search " title="<?php echo $lang['nc_query'];?>">&nbsp;</a>
        <?php if($output['goods_title'] != ''){?>
        <a href="index.php?act=mb_goods&op=mb_goods_list" class="btns " title="<?php echo $lang['nc_cancel_search'];?>"><span><?php echo $lang['nc_cancel_search'];?></span></a>
        <?php }?></td>
    </tr></tbody>
  </table>
  </form>
  <table class="table tb-type2" id="prompt">
    <tbody>
      <tr class="space odd">
        <th colspan="12"><div class="title">
            <h5><?php echo $lang['nc_prompts'];?></h5>
            <span class="arrow"></span></div></th>
      </tr>
      <tr>
        <td><ul>
            <li><?php echo $lang['link_help2'];?></li>
          </ul></td>
      </tr>
    </tbody>
  </table>
    <table class="table tb-type2 nobdb">
      <thead>
        <tr class="thead">
          <th>&nbsp;</th>
          <th><?php echo $lang['nc_sort'];?></th>
          <th><?php echo $lang['link_index_title'];?></th>
          <th><?php echo $lang['link_index_pic_sign'];?></th>
          <th><?php echo $lang['app_goods_index'];?></th>
          <th>简介</th>
          <th class="align-center"><?php echo $lang['nc_handle'];?></th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($output['mb_goods_list']) && is_array($output['mb_goods_list'])){ ?>
        <?php foreach($output['mb_goods_list'] as $k => $v){ ?>
        <tr class="hover edit">
          <td class="w24"></td>
          <td class="w48 sort"><span class="tooltip editable" title="<?php echo $lang['nc_editable'];?>" ajax_branch='goods_sort' datatype="number" fieldid="<?php echo $v['goods_sort'];?>" fieldname="goods_sort" nc_type="inline_edit"><?php echo $v['goods_sort'];?></span></td>
          <td><?php echo $v['goods_title'];?></td>
          <td class="picture"><?php 
        if($v['goods_thumb'] != ''){
          echo "<div class='size-88x31'><span class='thumb size-88x31'><i></i><img width=\"88\" height=\"31\" src='".$v['goods_thumb']."' onload='javascript:DrawImage(this,88,31);' /></span></div>";
        }
        ?></td>
          <td>
            <?php if ( $v['goods_index'] == 0 ) { ?>
            <?php echo '热销新品'; ?>
            <?php } ?>
            
            <?php if ( $v['goods_index'] == 1 ) { ?>
            <?php echo '抢购专区'; ?>
            <?php } ?>
            
            <?php if ( $v['goods_index'] == 2 ) { ?>
            <?php echo '掌上特惠'; ?>
            <?php } ?>
            
            <?php if ( $v['goods_index'] == 3 ) { ?>
            <?php echo '热门商品'; ?>
            <?php } ?>
            
            <?php if ( $v['goods_index'] == 4 ) { ?>
            <?php echo '高一品自营'; ?>
            <?php } ?>
            
            <?php if ( $v['goods_index'] == 5 ) { ?>
            <?php echo '横幅logo'; ?>
            <?php } ?>
            <?php if ( $v['goods_index'] == 7 ) { ?>
            <?php echo '潮.青春'; ?>
            <?php } ?>
            <?php if ( $v['goods_index'] == 8 ) { ?>
            <?php echo '享.美味'; ?>
            <?php } ?>
            <?php if ( $v['goods_index'] == 9 ) { ?>
            <?php echo '品.人生'; ?>
            <?php } ?>
            <?php if ( $v['goods_index'] == 10 ) { ?>
            <?php echo '智.生活'; ?>
            <?php } ?>
            <?php if ( $v['goods_index'] == 11 ) { ?>
            <?php echo '童心肆起'; ?>
            <?php } ?>	
          </td>
          <td><?php echo $v['goods_produce'];?></td>
          <td class="w96 align-center"><a href="index.php?act=mb_goods&op=mb_goods_edit&id=<?php echo $v['id'];?>"><?php echo $lang['nc_edit'];?></a> | <a href="javascript:if(confirm('<?php echo $lang['nc_ensure_del'];?>'))window.location = 'index.php?act=mb_goods&op=mb_goods_delete&id=<?php echo $v['id'];?>';"><?php echo $lang['nc_del'];?></a></td>
        </tr>
        <?php } ?>
        <?php }else { ?>
        <tr class="no_data">
          <td colspan="10"><?php echo $lang['nc_no_record'];?></td>
        </tr>
        <?php } ?>
      </tbody>
      <tfoot>
        <?php if(!empty($output['mb_goods_list']) && is_array($output['mb_goods_list'])){ ?>
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
<script>
$(function(){
    $('#ncsubmit').click(function(){
    	$('input[name="op"]').val('mb_goods_list');$('#formSearch').submit();
    });
});
</script>
