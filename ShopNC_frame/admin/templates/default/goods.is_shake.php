<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<div class="page">
  <form method="post" name="form1" id="form1" action="<?php echo urlAdmin('goods', 'is_shake');?>">
    <input type="hidden" name="form_submit" value="ok" />
    <input type="hidden" value="<?php echo $output["goods_id"];?>" name="goods_id">
    <input type="hidden" value="<?php echo $output["commonid"];?>" name="commonid">
    <table class="table tb-type2 nobdb">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label for="close_reason">摇一摇状态:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <input type="radio" name="is_shake" id="on_shake" value='1' <?php if ( $output['goods_shake'][0]['is_shake'] == 1 ) echo "checked"; ?> /> 开启
            <input type="radio" name="is_shake" id="off_shake" value='0' <?php if ( $output['goods_shake'][0]['is_shake'] != 1 ) echo "checked"; ?>/> 关闭
          </td>
        </tr>
        <tr class="noborder">
          <td colspan="2" class="required"><label for="close_reason">摇一摇价格:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <input type="text" name="shake_price" id="shake_price" value="<?php echo $output['goods_shake'][0]['shake_price']; ?>" />　元
          </td>
        </tr>
      </tbody>
      <tfoot>
        <tr class="tfoot">
          <td colspan="2"><a href="javascript:void(0);" class="btn" nctype="btn_submit"><span><?php echo $lang['nc_submit'];?></span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<script>
$(function(){
    $('a[nctype="btn_submit"]').click(function(){
        $list = ajaxpost('form1', '', '', 'onerror');
        console.log( $list );
    });
});
</script>