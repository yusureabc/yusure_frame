<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['fenxiao'];?></h3>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form method="get" name="formSearch" id="formSearch">
    <input type="hidden" value="fenxiao" name="act">
    <input type="hidden" value="index" name="op">
    <table class="tb-type1 noborder search">
      <tbody>
        <tr>
          <th><label for="member_name"><?php echo $lang['fenxiao_store_name'];?></label></th>
          <td><input type="text" value="<?php echo $output['member_name'];?>" name="member_name" id="member_name" class="txt"></td>
      	   <td><a href="javascript:void(0);" id="ncsubmit" class="btn-search " title="<?php echo $lang['nc_query'];?>">&nbsp;</a>
          <?php if($output['member_name'] != ''){?>
          <a href="index.php?act=fenxiao&op=index" class="btns " title="<?php echo $lang['nc_cancel_search'];?>"><span><?php echo $lang['nc_cancel_search'];?></span></a>
          <?php }?>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
  <form method="post" id="store_form">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2">
      <thead>
        <tr class="thead">
          <th><?php echo $lang['fenxiao_fenxiaoer_name'];?></th>
          <th><?php echo $lang['fenxiao_fxstore_name'];?></th>
          <th><?php echo $lang['fenxiao_fxstore_zh'];?></th>
          <th><?php echo $lang['fexiao_level'];?></th>
          <th><?php echo $lang['fenxiao_zk'];?></th>
          <th><?php echo $lang['fenxiao_allorder'];?></th>
          <th><?php echo $lang['fenxiao_allpay'];?></th>
        </tr>
      </thead>
      <tbody>
      <?php if($output['list']){?>
		<?php foreach($output['list'] as $k=>$v){?>
		  <tr>
		  <td><?php echo $v['member_name'];?></td>
		  <td><?php echo $v['store_name'];?>
		  <td><?php echo $v['store_seller_name'];?></td>
		  <td><?php echo $v['apply_level_name']?></td>
		  <td><?php echo $v['dep_rate']?></td>
		  <td><?php if($v['order_consume']){echo $v['order_consume'];}else{echo "暂无";}?></td>
		  <td><?php if($v['consume']){echo $v['consume'];}else{echo "暂无";}?></td>
		  </tr>
		<?php }?>
	  <?php }else{?>
	  	<tr class="no_data">
          <td colspan="15"><?php echo $lang['nc_no_record'];?></td>
        </tr>
	  <?php }?>	
      </tbody>
      <tfoot>
		<tr class="tfoot">
          <td></td>
          <td colspan="16">
            <div class="pagination"><?php echo $output['showpage'];?></div></td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.edit.js" charset="utf-8"></script>
<script>
$(function(){
    $('#ncsubmit').click(function(){
    	$('input[name="op"]').val('index');
    	$('#formSearch').submit();
    });
});
</script>