<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['fxad_index'];?></h3>
      <ul class="tab-base">
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['ap_manage'];?></span></a></li>
        <li><a href="index.php?act=adv&op=fxarea_adadd" ><span><?php echo $lang['fxad_add'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form method="post" id="store_form">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2">
      <thead>
        <tr class="thead">
          <th calss="w24"><input type="checkbox" class="checkall"/></th>
          <th class="align-center"><?php echo $lang['fxad_goodsid'];?></th>
          <th class="align-center"><?php echo $lang['fxad_title'];?></th>
          <th class="align-center"><?php echo $lang['fxad_price'];?></th>
          <th class="align-center"><?php echo $lang['fxad_zhsj'];?></th>
          <th class="align-center"><?php echo $lang['fxad_cz'];?></th>
        </tr>
      </thead>
      <tbody>
      <?php if(!empty($output['list'])){?>
		<?php foreach($output['list'] as $k=>$v){?>
		<tr class="hover">
			<td class="w24"><input type="checkbox" class="checkitem" name="del_id[]" value="<?php echo $v['id']; ?>" /></td>
			<td class="align-center"><?php echo $v['goods_id']?></td>
			<td class="align-center"><?php echo $v['title']?></td>
			<td class="align-center"><?php echo $v['price']?></td>
			<td class="align-center"><?php echo date("Y-m-d H:i:s",$v['edittime']);?></td>
			<td class="align-center">
			<a href="<?php echo urlAdmin("adv","fxarea_adedit",array("id"=>$v['id']))?>"><?php echo $lang['fxad_edit']?></a>
			<a href="<?php echo urlAdmin("adv","fxarea_addele",array("id"=>$v['id']))?>"><?php echo $lang['fxad_dele']?></a>
			</td>
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
          <td><input type="checkbox" class="checkall" id="checkall"/></td>
          <td id="batchAction" colspan="15"><span class="all_checkbox">
            <label for="checkall"><?php echo $lang['nc_select_all'];?></label>
            </span>&nbsp;&nbsp;<a href="JavaScript:void(0);" class="btn" onclick="if(confirm('<?php echo $lang['ap_del_sure'];?>')){$('#store_form').submit();}"><span><?php echo $lang['nc_del'];?></span></a>
            <div class="pagination"> <?php echo $output['page'];?> </div></td>
        </tr>
      </tfoot>
    </table>
  </form>





</div>
