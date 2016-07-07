<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<style>
.zy{
	color:red;
	font-size:14px;
	font-weight:600;
}
.zhy p{
	line-height:26px;
	color:#C09853;
}
.zhy{
	padding:10px;
	margin-top:10px;
	background:#fbfbfb;

}

</style>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['reg_front_title'];?></h3>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form method="post" enctype="multipart/form-data" name="form1" id="link_form" >
    <table class="table tb-type2">
      <tbody>
         <!-- 有效时间 -->
        <tr class="noborder">
          <td colspan="2" class="required">
            <label for="goods_title" class="validation"><?php echo $lang['reg_valid_time'];?></label>
          </td>
        </tr>       
        <tr class="noborder">
          <td class="vatop rowform"><input id="recommend_reg_time" name="recommend_reg_time" class="txt" type="text"  value="<?php echo $output['recommend_reg_time']?>"/><font style="color:red"><?php echo $lang['time_unit']?></font></td>
          <td class="vatop tips"><span class="vatop rowform"><?php echo $lang['reg_time_ts'];?></span></td>
        </tr>
        <!-- 【普通的推荐注册】被推荐人获取的积分 -->
        <tr class="noborder">
          <td colspan="2" class="required"><label for="goods_price" class="validation"><?php echo $lang['reg_goods'];?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input id="recommend_reg_points" name="recommend_reg_points" class="txt" type="text"  value="<?php echo $output['recommend_reg_points']?>"/></td>
          <td class="vatop tips"><span class="vatop rowform"><?php echo $lang['reg_goods_ts'];?></span></td>
        </tr>
        <!-- 【普通的推荐注册】推荐人获取的积分 -->
        <tr class="noborder">
          <td colspan="2" class="required"><label for="goods_price" class="validation"><?php echo $lang['rec_goods'];?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input id="recommend_rec_points" name="recommend_rec_points" class="txt" type="text"  value="<?php echo $output['recommend_rec_points']?>"/></td>
          <td class="vatop tips"><span class="vatop rowform"><?php echo $lang['rec_goods_ts'];?></span></td>
        </tr>
        
        
        <!-- 【推荐注册分销商】被推荐人获取的积分 -->
        <tr class="noborder">
          <td colspan="2" class="required"><label for="goods_price" class="validation"><?php echo $lang['distribute_reg_goods'];?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input id="recommend_distribute_reg_points" name="recommend_distribute_reg_points" class="txt" type="text"  value="<?php echo $output['recommend_distribute_reg_points']?>"/></td>
          <td class="vatop tips"><span class="vatop rowform"><?php echo $lang['distribute_reg_goods_ts'];?></span></td>
        </tr>
        <!-- 【推荐注册分销商】推荐人获取的积分 -->
        <tr class="noborder">
          <td colspan="2" class="required"><label for="goods_price" class="validation"><?php echo $lang['distribute_rec_goods'];?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input id="recommend_distribute_rec_points" name="recommend_distribute_rec_points" class="txt" type="text"  value="<?php echo $output['recommend_distribute_rec_points']?>"/></td>
          <td class="vatop tips"><span class="vatop rowform"><?php echo $lang['distribute_rec_goods_ts'];?></span></td>
        </tr>
        
        
          <!-- 【店铺推荐注册分销商】被推荐人获取的积分 -->
        <tr class="noborder">
          <td colspan="2" class="required"><label for="goods_price" class="validation"><?php echo $lang['distribute_reg_store_goods'];?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input id="recommend_store_reg_points" name="recommend_store_reg_points" class="txt" type="text"  value="<?php echo $output['recommend_store_reg_points']?>"/></td>
          <td class="vatop tips"><span class="vatop rowform"><?php echo $lang['distribute_store_reg_goods_ts'];?></span></td>
        </tr>
      </tbody>
      <tfoot id="submit-holder">
        <tr class="tfoot">
          <td colspan="2" ><a href="JavaScript:void(0);" class="btn" id="submitBtn"><span><?php echo $lang['nc_submit'];?></span></a></td>
        </tr>
      </tfoot>
    </table>
    <div class="zhy">
    	<p class="zy" style="color:red">注意：</p>
    	<p>1. A推荐B,那么A就是“推荐”者而B就是“被推荐”者。</p>
    	<p>2. 推荐注册--单纯的在高一品注册一个账号；<br />
    		 &nbsp;&nbsp; 推荐注册分销商--与“推荐注册”的不同的是，此功能可使用户成为“分销商”，从而享有分销权限；<br/>
    		 &nbsp;&nbsp; 推荐注册为店铺分销商--与“推荐注册分销商”不同的是，活动只能由“店铺主”发起。<br/>
    	</p>
    	
    </div>
  </form>
</div>
<script>
	$(function(){
		$("#submitBtn").click(function(){
				$obj = $("input[type='text']");
				var count = 0;
				$obj.each(function(){
					var temp_str = $(this).val();
					$temp_node = $(this).parents("tr").prev().find("label");
					var temp_title = $temp_node.html();
					if(temp_str==""){
						var tips = "请填写'"+temp_title+"'的内容，若不需要请填0。";
						alert(tips);
						return false;
					}else{
						count++;
					}
				});
				if($obj.size()==count){
					$("#link_form").submit();
				}else{
					return false;
				}
		});
	})
</script>
