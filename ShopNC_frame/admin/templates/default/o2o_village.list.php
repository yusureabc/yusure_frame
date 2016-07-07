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
    	$.ajax({
			type: "POST",
			url: "index.php?act=o2o_village&op=village_del",
			data: {village_id:id},
			dataType: "json",
			success:function(result){
				if( result == 1 ){
					location.reload();
				}else{
					alert(result);
					//location.reload();
				}
			}
    	})
    }
}

function submit_examine(id)
{
    if ( confirm('<?php echo $lang['village_confirm_examine'] ?>') )
    {
        window.location = "index.php?act=o2o_village&op=village_examine&village_id="+id;
    }
}

</script>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['village'];?></h3>
      <ul class="tab-base">
        <li><a href="javascript:void(0);" class="current"><span><?php echo $lang['nc_manage'];?></span></a></li>
		<li><a href="index.php?act=o2o_village&op=village_add"><span><?php echo $lang['nc_add'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form method="get" name="formSearch">
    <input type="hidden" name="act" value="o2o_village" />
    <input type="hidden" name="op" value="village_list" />
    <table class="tb-type1 noborder search">
      <tbody>
      <!-- 小区名称 -->
        <tr>
          <th><label for="village_name"><?php echo $lang['nc_admin_village_name'];?></label></th>
          <td><input type="text" name="village_name" id="village_name" class="txt" value="<?php if(isset($output['village_name'])){ echo $output['village_name'];}?>"></td>
      <!-- 首字母 -->
      <th><label for="first_letter"><?php echo $lang['nc_admin_first_letter'];?></label></th>
		  <td>
			  <select name='first_letter'>
			    <option value=""><?php echo $lang['nc_please_choose'];?>...</option>
				<?php foreach($output['letter'] as $l){?>
				<option value='<?php echo $l;?>' <?php if($l==$output['first_letter']){ echo 'selected';}?>><?php echo $l;?></option>
				<?php }?>
			  </select>
		  </td>
      <!-- 小区状态 -->
      <th><label for="village_status"><?php echo $lang['nc_admin_village_status'];?></label></th>
      <td>
        <select name='village_status'>
          <option value=""><?php echo $lang['nc_please_choose'];?>...</option>
        <?php foreach($output['village_status'] as $k => $l){?>
        <option value='<?php echo $k;?>' <?php if($k==$output['village_status_select']){ echo 'selected';}?>><?php echo $l;?></option>
        <?php }?>
        </select>
      </td>
          <td>
            <a href="javascript:document.formSearch.submit();" class="btn-search tooltip" title="<?php echo $lang['nc_query']; ?>">&nbsp;</a>
            <?php if($output['village_name'] != '' or $output['first_letter'] != '' or $output['village_status_select']){?>
            <a class="btns " href="index.php?act=o2o_village&op=village_list" title="<?php echo $lang['nc_cancel_search'];?>"><span><?php echo $lang['nc_cancel_search'];?></span></a>
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
        <th colspan="12" class="nobg">
			<div class="title">
            <h5><?php echo $lang['nc_prompts'];?></h5>
            <span class="arrow"></span></div>
		</th>
      </tr>
      <tr>
        <td>
		  <ul>
            <li><?php echo $lang['nc_admin_area_help2'];?></li>
          </ul>
		</td>
      </tr>
    </tbody>
  </table>
  <form id="list_form" method='post'>
    <input id="area_id" name="area_id" type="hidden" />
    <table class="table tb-type2">
      <thead>
        <tr class="space">
          <th colspan="15" class="nobg"><?php echo $lang['nc_list'];?></th>
        </tr>
        <tr class="thead">
          <th class="w48"></th>
          <th><?php echo $lang['nc_admin_village_name'];?></th>
          <th><?php echo $lang['nc_admin_village_longitude'];?></th>
    		  <th><?php echo $lang['nc_admin_first_letter'];?></th>
    		  <th><?php echo $lang['nc_admin_village_proportion'];?></th>
          <th><?php echo $lang['nc_admin_village_number'];?></th>
          <th><?php echo $lang['nc_admin_village_contacts'];?></th>
          <th><?php echo $lang['nc_admin_village_phone'];?></th>
          <th><?php echo $lang['nc_admin_village_address_info']; ?></th>
          <th><?php echo $lang['nc_admin_village_status'];?></th>
          
          <th class="w200 align-center"><?php echo $lang['nc_handle'];?></th>
        </tr>
      </thead>
      <tbody>

        <?php if(!empty($output['village_list']) && is_array($output['village_list'])){ ?>
        <?php foreach($output['village_list'] as $val){ ?>

        <tr class="hover edit">
          <td></td>
		  <td><?php echo $val['village_name'];?></td>
		  <td><?php echo $val['longitude'];?></td>
		  <td><?php echo $val['first_letter'];?></td>
      <td><?php echo $val['proportion'];?></td>
      <td><?php echo $val['number'];?></td>
      <td><?php echo $val['contacts'];?></td>
      <td><?php echo $val['phone'];?></td>
      <td><?php echo $val['address_info']; ?></td>
      <td>
        <?php
            switch ( $val['village_status'] )
            {
                case '1':   // 启用
                  echo $lang['village_status_on'];
                break;
                case '2':   // 审核中
                  echo $lang['village_status_check'];
                break;
                case '3':   // 驳回
                  echo $lang['village_status_reject'];
                break;
                case '4':   // 关闭
                  echo $lang['village_status_off'];
                break;
            }
        ?>
      </td>

		  <td class='align-center'>
        <!-- 审核 -->
        <?php if ( $val['village_status'] == 2 ) { ?>
        <a href="javascript:submit_examine(<?php echo $val['village_id'];?>)"><?php echo $lang['village_examine'];?></a> | 
        <?php } ?>
        <!-- 编辑 -->
		  	<a href="index.php?act=o2o_village&op=village_edit&village_id=<?php echo $val['village_id'];?>"><?php echo $lang['nc_edit'];?></a> |
		  	<a href="javascript:submit_delete(<?php echo $val['village_id'];?>)"><?php echo $lang['nc_del'];?></a>
      </td>
    </tr>

        <?php } ?>
        <?php }else { ?>
        <tr class="no_data">
          <td colspan="10"><?php echo $lang['nc_no_record'];?></td>
        </tr>
        <?php } ?>
      </tbody>
      <?php if(!empty($output['village_list']) && is_array($output['village_list'])){ ?>
      <tfoot>
        <tr class="tfoot">
          <td></td>
          <td id="batchAction" colspan="15">
            <div class="pagination"><?php echo $output['show_page'];?></div>
          </td>
        </tr>
      </tfoot>
      <?php } ?>
    </table>
  </form>
</div>
