<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['msg_setting']?></h3>
      <ul class="tab-base">
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['msg_setting']; ?></span></a></li>
        <li><a href="index.php?act=store_msg&op=msg_list"><span><?php echo $lang['msg_recharge_log']?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="msg_form" method="post" name="form1" onsubmit="checkform();">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2 nobdb">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation"><?php echo $lang['msg_unit_price']; ?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class=""><input type="text" name="unit_price" id="unit_price" class="txt" value="<?php echo $output['msg_price']; ?>" >元　／　条
        </tr>       
      </tbody>
      <tfoot>
        <tr class="tfoot">
          <td colspan="2" ><a href="JavaScript:void(0);" class="btn" onclick="document.form1.submit()"><span><?php echo $lang['nc_submit'];?></span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<script type="text/javascript">
  $(document).ready( function() {
    /*$("#unit_price").blur( function() {
      var unit_price = $.trim( $("#unit_price").val() );
      if ( unit_price == '' )
      {
          alert
      }
    });*/


  });

  function checkform()
  {
    alert( 'check' );
  }

</script>