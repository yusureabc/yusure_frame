<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['channel_column_index_nav'];?></h3>
      <ul class="tab-base">
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['nc_manage'];?></span></a></li>
        <li><a href="index.php?act=channel_column&op=channel_column_add" ><span><?php echo $lang['nc_new'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>

  <form method='post' id="form_nav">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2">
      <thead>
        <tr class="space">
          <th colspan="15"><?php echo $lang['channel_column_index_nav'];?><?php echo $lang['nc_list'];?></th>
        </tr>
        <tr class="thead">
          <th>&nbsp;</th>
          <th><?php echo $lang['nc_sort'];?></th>
          <th><?php echo $lang['channel_column_index_title'];?></th>
          <th><?php echo $lang['channel_column_index_url'];?></th>
          <th class="align-center"><?php echo $lang['nc_handle'];?></th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($output['channel_column_list']) && is_array($output['channel_column_list'])){ ?>
        <?php foreach($output['channel_column_list'] as $k => $v){ ?>
        <tr class="hover">
          <td class="w24"><input type="checkbox" name="del_id[]" value="<?php echo $v['channel_id'];?>" class="checkitem"></td>
          <td class="w48 sort"><span title="<?php echo $lang['nc_editable'];?>" style="cursor:pointer;"  ajax_branch='channel_sort' datatype="number" fieldid="<?php echo $v['channel_id'];?>" fieldname="channel_sort" nc_type="inline_edit" class="editable"><?php echo $v['channel_sort'];?></span></td>
          <td><?php echo $v['channel_name'];?></td>
          <td><?php echo $v['channel_url'];?></td>
          <td class="w172 align-center"><a href="index.php?act=channel_config&op=web_config&channel_id=<?php echo $v['channel_id'];?>"><?php echo $lang['channel_column_index_nav'];?></a> |<a href="index.php?act=channel_column&op=channel_column_edit&channel_id=<?php echo $v['channel_id'];?>"><?php echo $lang['nc_edit'];?></a> | <a href="javascript:if(confirm('<?php echo $lang['nc_ensure_del'];?>'))window.location = 'index.php?act=channel_column&op=channel_column_del&channel_id=<?php echo $v['channel_id'];?>';"><?php echo $lang['nc_del'];?></a></td>
        </tr>
        <?php } ?>
        <?php }else { ?>
        <tr class="no_data">
          <td colspan="15"><?php echo $lang['nc_no_record'];?></td>
        </tr>
        <?php } ?>
      </tbody>
      <tfoot>
        <?php if(!empty($output['channel_column_list']) && is_array($output['channel_column_list'])){ ?>
        <tr class="tfoot">
          <td><input type="checkbox" class="checkall" id="checkallBottom"></td>
          <td colspan="16"><label for="checkallBottom"><?php echo $lang['nc_select_all']; ?></label>
            &nbsp;&nbsp;<a href="JavaScript:void(0);" class="btn" onclick="if(confirm('<?php echo $lang['nc_ensure_del'];?>')){$('#form_nav').submit();}"><span><?php echo $lang['nc_del'];?></span></a>
            <div class="pagination"> <?php echo $output['page'];?> </div></td>
        </tr>
        <?php } ?>
      </tfoot>
    </table>
  </form>
</div>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.edit.js" charset="utf-8"></script>