<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<script type="text/javascript">
function submit_delete_batch(){
    /* 获取选中的项 */
    var items = '';
    $('.checkitem:checked').each(function(){
        items += this.value + ',';
    });
    if(items != '') {
        items = items.substr(0, (items.length - 1));
        submit_delete(items);
    } else {
        alert('<?php echo $lang['nc_please_select_item'];?>');
    }
}

function submit_delete(id){
    if(confirm('<?php echo $lang['nc_admin_goods_operation'];?>')) {
        $('#list_form').attr('method','post');
        $('#list_form').attr('action','index.php?act=o2o_goods_class&op=goods_class_del');
        
        $('#class_id').val(id);
        $('#list_form').submit();
    }
}
</script>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['o2o_goods_class'];?></h3>
      <ul class="tab-base">
        <li><a href="javascript:void(0);" class="current"><span><?php echo $lang['nc_manage'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form method="post" name="formSearch">
    <table class="tb-type1 noborder search">
      <tbody>
        <tr>
          <th>分类名称</th>
          <td><input type="text" value="<?php echo $output['class_name'];?>" name="class_name" class="txt" ></td>
          <th>店铺名称</th>
          <td><input type="text" value="<?php echo $output['store_name'];?>" name="store_name" class="txt" ></td>
          <td>
            <a href="javascript:document.formSearch.submit();" class="btn-search tooltip" title="<?php echo $lang['nc_query'];?>">&nbsp;</a>
            <?php if($output['class_name'] != '' or $output['store_name'] != ''){?>
            <a class="btns " href="index.php?act=o2o_goods_class&op=goods_class" title="<?php echo $lang['nc_cancel_search'];?>"><span><?php echo $lang['nc_cancel_search'];?></span></a>
            <?php }?>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
  <!-- 操作说明 -->
  <table class="table tb-type2" id="prompt">
    <tbody>
      <tr class="space odd">
        <th colspan="12" class="nobg"><div class="title">
            <h5><?php echo $lang['nc_prompts'];?></h5>
            <span class="arrow"></span></div></th>
      </tr>
      <tr>
        <td>
          <ul>
              <li><?php echo $lang['nc_admin_class_help'];?></li>
              <li><?php echo $lang['nc_admin_class_help1'];?></li>
            </ul>
        </td>
      </tr>
    </tbody>
  </table>
  <form id="list_form" method='post'>
    <input id="class_id" name="class_id" type="hidden" />
    <table class="table tb-type2">
      <thead>
        <tr class="space">
          <th colspan="15" class="nobg"><?php echo $lang['nc_list'];?></th>
        </tr>
        <tr class="thead">
          <th class="w48"></th>
          <th><?php echo $lang['nc_admin_class_name'];?></th>
          <th><?php echo $lang['nc_admin_store_name'];?></th>
          <th><?php echo $lang['nc_admin_goods_add_time'];?></th>
          <th><?php echo $lang['nc_admin_goods_edit_name'];?></th>      
          <th class="w200 align-center"><?php echo $lang['nc_handle'];?></th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($output['class_list']) && is_array($output['class_list'])){ ?>
        <?php foreach($output['class_list'] as $val){ ?>
        <tr class="hover edit">
          <td><input type="checkbox" value="<?php echo $val['class_id'];?>" class="checkitem"></td>
          <td><?php echo $val['class_name'];?></td>
          <td><?php echo $val['genus_store_name'];?></td>
          <td><?php echo date("Y-m-d H:i:s",$val['add_time']);?></td>
          <td><?php echo date("Y-m-d H:i:s",$val['edit_time']);?></td>
          <td class='align-center'>
            <a href="javascript:if(confirm('<?php echo $lang['nc_admin_confirm_delete'];?>'))window.location = 'index.php?act=o2o_goods_class&op=goods_class_del&class_id=<?php echo $val['class_id'];?>';"><?php echo $lang['nc_del'];?></a>
          </td>
        </tr>
        <?php } ?>
        <?php }else { ?>
        <tr class="no_data">
          <td colspan="10"><?php echo $lang['nc_no_record'];?></td>
        </tr>
        <?php } ?>
      </tbody>
      <?php if(!empty($output['class_list']) && is_array($output['class_list'])){?>
      <tfoot>
        <tr class="tfoot">
          <td><input type="checkbox" class="checkall" id="checkall_1"></td>
          <td id="batchAction" colspan="15">
            <span class="all_checkbox">
              <label for="checkall_1"><?php echo $lang['nc_select_all'];?></label>
              <a href="javascript:void(0)" class="btn" onclick="submit_delete_batch();"><span><?php echo $lang['nc_del'];?></span></a>
            </span>
            <div class="pagination"><?php echo $output['show_page'];?></div>
        </tr>
      </tfoot>
      <?php } ?>
    </table>
  </form>
</div>
