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
       		$('#list_form').attr('action','index.php?act=distribute_member&op=del');
        }
        /*
        else if(type == 'recommend'){
        	$('#list_form').attr('action','index.php?act=comment&op=recommend&type=1');
        }else{
        	$('#list_form').attr('action','index.php?act=comment&op=recommend');
        }*/
       
        $('#distribute_id').val(id);
        $('#list_form').submit();
    }
}

</script>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['nc_admin_distribute_member'];?></h3>
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
            <th><?php echo '配送员账号';?></th>
            <td><input type="text" value="<?php echo $output['member_name'];?>" name="member_name" class="txt" ></td>
    		<th><?php echo $lang['nc_admin_member_mobile'];?></th>
            <td><input type="text" value="<?php echo $output['mobile'];?>" name="mobile" class="txt" ></td>
           <th><?php echo $lang['nc_admin_member_audit'];?></th>
           <td>
			  <select name='audit'>
			    <option value=""><?php echo $lang['nc_please_choose'];?>...</option>
				<option value="1" <?php if($output['audit'] == 1){ ?>selected<?php } ?>><?php echo $lang['nc_admin_member_audit_wait'];?></option>
				<option value="2" <?php if($output['audit'] == 2){ ?>selected<?php } ?>><?php echo $lang['nc_admin_member_audit_yes'];?></option>
				<option value="3" <?php if($output['audit'] == 3){ ?>selected<?php } ?>><?php echo $lang['nc_admin_member_audit_no'];?></option>
			  </select>
          </td>
            <th><?php echo $lang['nc_admin_member_status'];?></th>
	          <td>
				  <select name='state'>
				    <option value=""><?php echo $lang['nc_please_choose'];?>...</option>
					<option value="1" <?php if($output['state'] == 1){ ?>selected<?php } ?>><?php echo $lang['nc_admin_member_status1'];?></option>
					<option value="2" <?php if($output['state'] == 2){ ?>selected<?php } ?>><?php echo $lang['nc_admin_member_status2'];?></option>
				  </select>
	          </td>
          <td><a href="javascript:document.formSearch.submit();" class="btn-search tooltip" title="<?php echo $lang['nc_query'];?>">&nbsp;</a></td>
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
	            <li><?php echo $lang['nc_admin_member_help1'];?></li>
	            <li><?php echo $lang['nc_admin_member_help2'];?></li>
          	</ul>
        </td>
      </tr>
    </tbody>
  </table>
  <form id="list_form" method='post'>
    <input id="distribute_id" name="distribute_id" type="hidden" />
    <table class="table tb-type2">
      <thead>
        <tr class="space">
          <th colspan="15" class="nobg"><?php echo $lang['nc_list'];?></th>
        </tr>
        <tr class="thead">
          <th class="w48"></th>
          <th><?php echo '配送员账号';?></th>
          <th><?php echo '真实姓名';?></th>
          <th><?php echo $lang['nc_admin_member_mobile'];?></th>
          <th><?php echo $lang['nc_admin_member_status'];?></th>
          <th><?php echo $lang['nc_admin_member_audit_status'];?></th>
          <th><?php echo '申请时间';?></th>
          <th class="w200 align-center"><?php echo $lang['nc_handle'];?></th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($output['list']) && is_array($output['list'])){ ?>
        <?php foreach($output['list'] as $val){ ?>
        <tr class="hover edit">
		  <td><input type="checkbox" value="<?php echo $val['distribute_id'];?>" class="checkitem"></td>
      <td style="font-weight:bold"><?php echo $val['member_name'];?></td>
      <td><?php echo $val['member_truename']; ?></td>
		  <td><?php echo $val['member_mobile'];?></td>
		  <td style="font-weight:bold"><?php if($val['state']==1){echo '<span style="color:green">正常</span>';} else{echo '<span style="color:red">冻结</span>';} ;?></td>
		  <td style="font-weight:bold"><?php if($val['audit_status']==1){echo '<span style="color:#E4DC08">待审核</span>';}elseif($val['audit_status']==2){echo '<span style="color:green">审核成功</span>';}else{echo '<span style="color:red">审核未通过</span>';};?></td>
		  <td><?php echo date( "Y-m-d H:i:s", $val['add_time'] ); ?></td>
      <td class='align-center'>
		  	  <?php if($val['audit_status']==1) { ?>
		  	  <a href="index.php?act=distribute_member&op=audit&distribute_id=<?php echo $val['distribute_id'];?>"><?php echo $lang['nc_admin_member_audit'];?></a> | 
		  	  	<?php } else { ?>
          <a href="index.php?act=distribute_member&op=audit&distribute_id=<?php echo $val['distribute_id'];?>"><?php echo '查看';?></a> | 
            <?php }?>
		  	  <?php if($val['state']==1) { ?>
		  	    <a href="javascript:if(confirm('<?php echo $lang['nc_admin_comment_operation'];?>'))window.location = 'index.php?act=distribute_member&op=freeze&distribute_id=<?php echo $val['distribute_id'];?>';"><?php echo $lang['nc_admin_member_status2'];?></a> |
		  	  <?php } else { ?>
            <a href="javascript:if(confirm('<?php echo $lang['nc_admin_comment_operation'];?>'))window.location = 'index.php?act=distribute_member&op=freeze&distribute_id=<?php echo $val['distribute_id'];?>&thaw=1';"><?php echo '解冻';?></a> |
          <?php }?>
            <a href="javascript:if(confirm('<?php echo $lang['nc_admin_comment_operation'];?>'))window.location = 'index.php?act=distribute_member&op=del&distribute_id=<?php echo $val['distribute_id'];?>';"><?php echo $lang['nc_del'];?></a></td>
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
          <td id="batchAction" colspan="15">
          	<span class="all_checkbox">
            <label for="checkall_1"><?php echo $lang['nc_select_all'];?></label>
            </span>&nbsp;&nbsp; <a href="javascript:void(0)" class="btn" onclick="submit_delete_batch('del');"><span><?php echo $lang['nc_del'];?></span></a> 
          
            <div class="pagination"><?php echo $output['show_page'];?></div>
          </td>
        </tr>
      </tfoot>
      <?php } ?>
    </table>
  </form>
</div>
