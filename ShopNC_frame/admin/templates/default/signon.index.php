<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['signon'];?></h3>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form method="post" name="form" id="form">
    <input type="hidden" value="signon" name="act">
    <input type="hidden" value="index" name="op">
    <input type="hidden" value="1" name="sublimt">
    <table class="tb-type1 noborder search">
        <tr><!--连续天数上限-->
          <td><label class="validation" for="signon_max"><?php echo $lang['signon_max'];?></label></td>
          <td><input style="width:60px" type="text" value="<?php echo $output['list']['points_continuemaxday'];?>" name="signon_max" id="signon_max" class="txt">
            <span style="color:#AEA49A"><?php echo $lang['signon_max_bz'];?></span></td>
        </tr>
         <tr><!--每次签到所送积分-->
          <td><label class="validation" for="shake_number"><?php echo $lang['signonintegral'];?></label></td>
          <td><input style="width:60px" type="text" value="<?php echo $output['list']['points_registerrate'];?>" name="signonintegral" id="signonintegral" class="txt">
            <span style="color:#AEA49A"><?php echo $lang['signonintegral_bz'];?></span></td>
        </tr>
        <tr><!--连续天数达到上限时所送积分-->
          <td><label class="validation" for="shake_day"><?php echo $lang['signon_max_day'];?></label></td>
          <td><input style="width:60px" type="text" value="<?php echo $output['list']['points_daymaxrate'];?>" name="signon_max_day" id="signon_max_day" class="txt">
          <span style="color:#AEA49A"><?php echo $lang['signon_step_bz'];?></span></td>
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