<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<style>
	.chen{
		line-height:40px;
		font-weight:bolder;
	}
</style>
<div class="page">
   <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['goods_index_goods'];?></h3>
      <ul class="tab-base">
      	<li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['goods_info_setting'];?></span></a></li>
        <li><a href="<?php echo urlAdmin('goods', 'goods');?>"><span><?php echo $lang['goods_index_all_goods'];?></span></a></li>
 	  </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="info_form" enctype="multipart/form-data" method="post">
    <input type="hidden" name="form_submit" value="ok" />
    <input type="hidden" name="goods_common" value="<?php echo $output['common_info']['goods_commonid'];?>">
    <table>
      <tbody>
        <tr>
          <td colspan="2" class="chen"><label for="goods_name"><?php echo $lang['goods_name']?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="rowform"><input type="text" id="goods_name" name="goods_name" class="txt" value="<?php echo $output['common_info']['goods_name']?>" readonly = "readonly"></td>
          <td class="tips">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" class="chen"><label for="store_name"><?php echo $lang['goods_store']?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="rowform"><input type="text" id="store_name" name="store_name" class="txt" value="<?php echo $output['common_info']['store_name']?>" readonly = "readonly"></td>
          <td class="tips">&nbsp;</td>
        </tr>
        
        <tr>
          <td colspan="2" class="chen"><label for="goods_base_salenum"><font color="red"><?php echo $lang['goods_base_salenum']?>:</font></label></td>
        </tr>
        <tr class="noborder">
          <td class="rowform"><input type="text" id="goods_base_salenum" name="goods_base_salenum" class="txt" value="<?php echo $output['common_info']['goods_base_salenum']?>" ></td>
          <td class="tips">若销量基数设置有效，那么"商品最终的销量"="原销量"+"销量基数"</td>
        </tr>
      </tbody>
      <tfoot>
        <tr class="tfoot">
          <td colspan="2" ><a href="JavaScript:void(0);" class="btn" id="submitBtn" style="margin-top:10px;"><span><?php echo $lang['nc_submit'];?></span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<script>
	$(function(){
		$("#submitBtn").click(function(){
				if(confirm("您确定要提交吗？")){
					$("#info_form").submit();
				}else{
					return false;
				}
		})
		
	})
</script>
