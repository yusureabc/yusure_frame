<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<script type="text/javascript">
function submit_delete_batch(type){
    /* 获取选中的项 */
    var items = '';
    $('.checkitem:checked').each(function(){
        items += this.value + ',';
    });
    if(items != '') {
        items = items.substr(0, (items.length - 1));
        submit_delete(items,type);
    }  
    else {
        alert('<?php echo $lang['nc_please_select_item'];?>');
    }
}

function submit_delete(id,type){
    if(confirm('<?php echo $lang['nc_admin_comment_operation'];?>')) {
        $('#list_form').attr('method','post');
        if(type == 'del'){
       		$('#list_form').attr('action','index.php?act=comment&op=del_evaluation');
        }else if(type == 'recommend'){
        	$('#list_form').attr('action','index.php?act=comment&op=recommend&type=1');
        }else{
        	$('#list_form').attr('action','index.php?act=comment&op=recommend');
        }
       
        $('#comment_id').val(id);
        $('#list_form').submit();
    }
}

</script>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['nc_admin_comment_manage'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=comment&op=comment_list"><span><?php echo $lang['nc_manage'];?></span></a></li>
        <li><a href="javascript:void(0);" class="current"><span><?php echo $lang['nc_distribution_evaluation'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form method="post" name="formSearch">
    <table class="tb-type1 noborder search">
      <tbody>
        <tr>
          <td>
			  <select name='s_type'>
				<option value="dismember_name" <?php if($output['s_type']=='dismember_name'){ ?>selected<?php } ?>><?php echo $lang['nc_admin_member_username'];?></option>
				<option value="member_name" <?php if($output['s_type']=='member_name'){ ?>selected<?php } ?>><?php echo $lang['nc_admin_comment_member_name'];?></option>
			  </select>
          </td>
          <td><input type="text" value="<?php echo $output['s_content'];?>" name="s_content" class="txt" ></td>
          <td><a href="javascript:document.formSearch.submit();" class="btn-search tooltip" title="<?php echo $lang['nc_query'];?>">&nbsp;</a></td>
          <?php if ( $output['s_content'] != '' ) {?>
          <td><a class="btns " href="index.php?act=comment&op=evaluation_list" title="<?php echo $lang['nc_cancel_search'];?>"><span><?php echo $lang['nc_cancel_search'];?></span></a></td>
          <?php }?>
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
	            <li><?php echo $lang['nc_admin_comment_help1'];?></li>
	            <li><?php echo $lang['nc_admin_comment_help2'];?></li>
          	</ul>
        </td>
      </tr>
    </tbody>
  </table>
  <form id="list_form" method='post'>
    <input id="comment_id" name="id" type="hidden" />
    <table class="table tb-type2">
      <thead>
        <tr class="space">
          <th colspan="15" class="nobg"><?php echo $lang['nc_list'];?></th>
        </tr>
        <tr class="thead">
          <th class="w48"></th>
          <th><?php echo $lang['nc_admin_member_name'];?></th>
          <th><?php echo $lang['nc_admin_member_username'];?></th>
    		  <th><?php echo $lang['nc_admin_comment_member_name'];?></th>
    		  <th style="width:40%"><?php echo $lang['nc_admin_comment_comment'];?></th>
    		  <th><?php echo $lang['nc_admin_comment_amount_score'];?></th>
    		  <th><?php echo $lang['nc_admin_comment_time'];?></th>
          <th class="w200 align-center"><?php echo $lang['nc_handle'];?></th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($output['eva_res']) && is_array($output['eva_res'])){ ?>
        <?php foreach($output['eva_res'] as $val){ ?>
        <tr class="hover edit">
		  <td><input type="checkbox" value="<?php echo $val['id'];?>" class="checkitem"></td>
		  <td><?php echo $val['dismember_truename'] ? $val['dismember_truename'] : '无'; ?></td>
      <td><?php echo $val['dismember_name']; ?></td>
		  <td><?php echo $val['member_name'];?></td>
      <td><?php echo $val['content']; ?></td>
      <td><?php echo $val['amount_score']; ?></td>
      <td><?php echo date( 'Y-m-d H:i:s', $val['add_time']); ?></td>
		  <td class='align-center'><a href="javascript:if(confirm('<?php echo $lang['nc_admin_confirm_delete'];?>'))window.location = 'index.php?act=comment&op=del_evaluation&id=<?php echo $val['id'];?>';"><?php echo $lang['nc_del'];?></a></td>
        </tr>
        <?php } ?>
        <?php }else { ?>
        <tr class="no_data">
          <td colspan="10"><?php echo $lang['nc_no_record'];?></td>
        </tr>
        <?php } ?>
      </tbody>
      <?php if(!empty($output['eva_res']) && is_array($output['eva_res'])){ ?>
      <tfoot>
        <tr class="tfoot">
          <td><input type="checkbox" class="checkall" id="checkall_1"></td>
          <td id="batchAction" colspan="15"><span class="all_checkbox">
            <label for="checkall_1"><?php echo $lang['nc_select_all'];?></label>
            </span>&nbsp;&nbsp; <a href="javascript:void(0)" class="btn" onclick="submit_delete_batch('del');"><span><?php echo $lang['nc_del'];?></span></a>
          <!--
           	&nbsp;<a href="javascript:void(0)" class="btn" onclick="submit_delete_batch('recommend');"><span><?php echo $lang['nc_recommend'];?></span></a>
           	&nbsp;<a href="javascript:void(0)" class="btn" onclick="submit_delete_batch('not_recommend');"><span><?php echo $lang['nc_not_recommend'];?></span></a>-->
            <div class="pagination"><?php echo $output['show_page'];?></div>
        </tr>
      </tfoot>
      <?php } ?>
    </table>
  </form>
</div>
