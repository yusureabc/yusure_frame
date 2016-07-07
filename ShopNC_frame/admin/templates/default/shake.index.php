<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['shake'];?></h3>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form method="get" name="form" id="form">
    <input type="hidden" value="shake" name="act">
    <input type="hidden" value="index" name="op">
    <input type="hidden" value="1" name="sublimt">
    <table class="tb-type1 noborder search">
        <tr><!--每日最多摇次数-->
          <td><label class="validation" for="shake_max"><?php echo $lang['shake_max'];?></label></td>
          <td><input style="width:60px" type="text" value="<?php echo $output['list']['shake_max'];?>" name="shake_max" id="shake_max" class="txt">
            <span style="color:#AEA49A"><?php echo $lang['shake_max_bz'];?></span></td>
        </tr>
         <tr><!--最初每日可摇次数-->
          <td><label class="validation" for="shake_number"><?php echo $lang['shake_number'];?></label></td>
          <td><input style="width:60px" type="text" value="<?php echo $output['list']['shake_number'];?>" name="shake_number" id="shake_number" class="txt">
            <span style="color:#AEA49A"><?php echo $lang['shake_number_bz'];?></span></td>
        </tr>
        <tr><!--连续摇几天增加摇一摇次数-->
          <td><label class="validation" for="shake_day"><?php echo $lang['shake_day'];?></label></td>
          <td><input style="width:60px" type="text" value="<?php echo $output['list']['shake_day'];?>" name="shake_day" id="shake_day" class="txt">
          <span style="color:#AEA49A"><?php echo $lang['shake_day_bz'];?></span></td>
        </tr>
        <tr><!--连续摇之后增加几次摇一摇-->
          <td><label class="validation" for="shake_step"><?php echo $lang['shake_step'];?></label></td>
          <td><input style="width:60px" type="text" value="<?php echo $output['list']['shake_step'];?>" name="shake_step" id="shake_step" class="txt">
            <span style="color:#AEA49A"><?php echo $lang['shake_step_bz'];?></span></td>
        </tr>
        <tr><!--设置摇一摇积分大小段-->
          <td><label class="validation" for="integral_start"><?php echo $lang['integral'];?></label></td>
          <td><input style="width:60px" type="text" value="<?php echo $output['list']['integral_start'];?>" name="integral_start" id="integral_start" class="txt">
            ~<input style="width:60px" type="text" value="<?php echo $output['list']['integral_end'];?>" name="integral_end" id="integral_end" class="txt">
            <span style="color:#AEA49A"><?php echo $lang['integral_bz'];?></span></td>
        </tr>
        <tr><!-- 设置摇一摇奖品概率  Add  Yusure  2015.3.5 -->
          <td><label class="validation" for="prize_probability"><?php echo $lang['prize_pro'];?></label></td>
          <td>
            <label class="validation" >商品</label> 
              <input style="width:30px" type="text" value="<?php echo $output['list']['goods_probability'];?>" name="goods_probability" id="goods_probability" class="txt">%　　
            <label class="validation" >积分</label>
              <input style="width:30px" type="text" value="<?php echo $output['list']['integral_probability'];?>" name="integral_probability" id="integral_probability" class="txt">%　　
            <label class="validation" >笑话</label>
              <input style="width:30px" type="text" value="<?php echo $output['list']['joke_probability'];?>" name="joke_probability" id="joke_probability" class="txt">%　　
            <span style="color:#AEA49A"><?php echo $lang['prize_set_pro'];?></span></td>
        </tr>
        <tr class="tfoot"><!--提交按钮-->
          <td colspan="2"><a href="JavaScript:void(0);" class="btn" onclick="submit()"><span><?php echo $lang['submit'];?></span></a></td>
        </tr>
    </table>
  </form>
</div>
<script>
  function submit(){
     $('#form').submit();
  }
</script>