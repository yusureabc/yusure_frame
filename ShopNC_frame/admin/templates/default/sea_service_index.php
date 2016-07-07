<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['overseas_service'];?></h3>
      <ul class="tab-base">
        <li>
        <a href="JavaScript:void(0);" class="current"><span><?php echo $lang['overseas_service'];?></span></a>
        </li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <table class="table tb-type2" id="prompt">
    <tbody>
      <tr class="space odd">
        <th class="nobg" colspan="12"><div class="title">
            <h5> 海外购客服QQ设置 </h5>
            <span class="arrow"></span></div></th>
      </tr>
      <tr>
        <td>
          <ul>
            <li> 设置QQ账号，方便与客户沟通 </li>
          </ul>
        </td>
      </tr>
    </tbody>
  </table>

<form id="service_form" method="post" name="articleClassForm">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="overseas_qq">客服QQ:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <input type="text" value="<?php echo $output['list_setting']['overseas_qq']; ?>" name="overseas_qq" id="overseas_qq" class="txt">
          </td>
          <td class="vatop tips"><?php echo $lang['article_class_index_name'];?></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label class="validation" for="overseas_vip_qq">VIP客服QQ:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <input type="text" value="<?php echo $output['list_setting']['overseas_vip_qq']; ?>" name="overseas_vip_qq" id="overseas_vip_qq" class="txt">
          </td>
          <td class="vatop tips"><?php echo $lang['article_class_add_update_sort'];?></td>
        </tr>
      </tbody>
      <tfoot>
        <tr class="tfoot">
          <td colspan="15" ><a href="JavaScript:void(0);" class="btn" id="submitBtn"><span><?php echo $lang['nc_submit'];?></span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>
  

</div>

<script type="text/javascript">
  $(function(){$("#submitBtn").click(function(){
       $("#service_form").submit();
    });
  });
</script>