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
    }  
    else {
        alert('<?php echo $lang['nc_please_select_item'];?>');
    }
}
function submit_delete(id){
    if(confirm('<?php echo $lang['nc_ensure_del'];?>')) {
        $('#list_form').attr('method','post');
        $('#list_form').attr('action','index.php?act=sea_warehouse&op=delete');
        $('#house_id').val(id);
        $('#list_form').submit();
    }
}
	function ajax_set_recommend(stat,house_id){
	$.getJSON('index.php?act=sea_warehouse&op=ajax_recommend&house_id='+house_id+'&stat='+stat, function(result){
		if(result.done){
			if(stat == 1){
				var stat_show = '是';
				var rechange_tip = '取消推荐';
				var new_rcstat = 0;
			}else{
				var stat_show = '否';
				var rechange_tip = '设为推荐';
				var new_rcstat = 1;
			}
			$('#re_stat_'+house_id).html(stat_show);
			$('a[re_change="'+house_id+'"]').html("["+rechange_tip+"]").attr("href","javascript:ajax_set_recommend("+new_rcstat+","+house_id+");");
        }else{
            alert('分类推荐状态修改失败');
        }
	});
}
</script>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['nc_admin_warehouse_manage'];?></h3>
      <ul class="tab-base">
        <li><a href="javascript:void(0);" class="current"><span><?php echo $lang['nc_manage'];?></span></a></li>
		<li><a href="index.php?act=sea_warehouse&op=warehouse_add"><span><?php echo $lang['nc_add'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="list_form" method='post'>
    <input id="house_id" name="house_id" type="hidden" />
    <table class="table tb-type2">
      <thead>
        <tr class="space">
          <th colspan="15" class="nobg"><?php echo $lang['nc_list'];?></th>
        </tr>
        <tr class="thead">
          <th class="w48"></th>
          <th class="w48"><?php echo $lang['nc_sort'];?></th>
          <th><?php echo $lang['nc_admin_store_name'];?></th>
          <th>首页推荐</th>
          <th class="w200 align-center"><?php echo $lang['nc_handle'];?></th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($output['list']) && is_array($output['list'])){ ?>
        <?php foreach($output['list'] as $val){ ?>
        <tr class="hover edit">
          <td><input type="checkbox" value="<?php echo $val['house_id'];?>" class="checkitem">
</td>
          <td class="w48 sort">
          	<input type="text" edit_type="house_sort" value="<?php echo $val['house_sort'];?>" oldvalue="<?php echo $val['house_sort'];?>" class="inline_edit" house_id="<?php echo $val['house_id']; ?>" />
          </td>
          <td class="name">
          <input type="text" edit_type="house_name" value="<?php echo $val['house_name'];?>" oldvalue="<?php echo $val['house_name'];?>" class="inline_edit" house_id="<?php echo $val['house_id']; ?>" /> </td>
          <td><span id="re_stat_<?php echo $val['house_id'];?>"><?php echo $val['house_recommend']==0?'否':'是'; ?></span><a re_change="<?php echo $val['house_id'];?>" class="marginleft" href="javascript:ajax_set_recommend(<?php echo $val['house_recommend']==0?1:0; ?>,<?php echo $val['house_id'];?>);">[<?php echo $val['house_recommend']==0?'设为推荐':'取消推荐'; ?>]</a></td>
          <td class="align-center"><a href="index.php?act=sea_warehouse&op=edit&house_id=<?php echo $val['house_id'];?>"><?php echo $lang['nc_edit'];?></a> | <a href="javascript:submit_delete(<?php echo $val['house_id'];?>)"><?php echo $lang['nc_del'];?></a></td>
        </tr>
        <?php } ?>
        <?php }else { ?>
        <tr class="no_data">
          <td colspan="10"><?php echo $lang['nc_no_record'];?></td>
        </tr>
        <?php } ?>
      </tbody>
      <?php if(!empty($output['list']) && is_array($output['list'])){ ?>
      <tfoot>
        <tr class="tfoot">
          <td><input type="checkbox" class="checkall" id="checkall_1"></td>
          <td id="batchAction" colspan="15"><span class="all_checkbox">
            <label for="checkall_1"><?php echo $lang['nc_select_all'];?></label>
            </span>&nbsp;&nbsp; <a href="javascript:void(0)" class="btn" onclick="submit_delete_batch();"><span><?php echo $lang['nc_del'];?></span></a>
            <div class="pagination"><?php echo $output['show_page'];?></div>
        </tr>
      </tfoot>
      <?php } ?>
    </table>
  </form>
</div>