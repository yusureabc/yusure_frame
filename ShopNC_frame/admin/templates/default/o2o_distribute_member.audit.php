<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <table class="table tb-type2 order">
  <form id="distribute" method="post" />
  <input type="hidden" name="act" value="distribute_member" />
  <input type="hidden" name="op" value="audit" />
  <input type="hidden" name="distribute_id" value="<?php echo $output['member_list']['distribute_id']; ?>" />
    <tbody>
      <tr class="space">
        <th colspan="15"><?php echo '配送人员详细信息';?></th>
      </tr>
      <tr>
        <td colspan="2"><ul>
        <!-- 配送员用户名 -->
            <li>
            <strong><?php echo 配送员用户名;?>:</strong><?php echo $output['member_list']['member_name'];?>　　
            ( 真实姓名 <?php echo $lang['nc_colon'];?> <?php echo $output['member_list']['member_truename'];?> )
            </li>
        <!-- 手机号 -->
            <li><strong><?php echo '手机号';?>:</strong><?php echo $output['member_list']['member_mobile'];?></li>
        <!-- 身份证号码 -->
            <li><strong><?php echo '身份证号码';?>:</strong>
            <span class="red_common"><?php echo $output['member_list']['card_id'];?> </span>
            </li>
        <!-- 配送员地址 -->
            <li><strong><?php echo '配送员地址';?>:</strong>
            <span class="red_common"><?php echo $output['member_list']['address'];?></span>
            </li>
        <!-- 审核状态 -->
            <?php $status = array( '1'=>'待审核', '2'=>'审核通过', '3'=>'未通过' ); ?>
            <li><strong><?php echo '审核状态';?>:</strong>
            <span class="red_common"><?php echo $status[$output['member_list']['audit_status']];?></span>
            </li>
          </ul>
          </td>
      </tr>
      <tr class="space">
        <th colspan="2"><?php echo '身份证照片';?></th>
      </tr>

      <tr>
        <td><ul>
        <!-- 身份证照片 -->
            <li>
            <?php if ( $output['member_list']['card_id_img'] ) {?>
              <img src=<?php echo UPLOAD_SITE_URL.DS.O2O_DISTRIBUTION_CARDID.DS.$output['member_list']['card_id_img']; ?> >
            <?php }else{?>
              <?php echo '无'; ?>
            <?php }?>
            </li>
          </ul></td>
      </tr>
      <tr>
      <!-- 保证金 -->
        <td><table class="table tb-type2 goods ">
            <tbody>
              <li>
                <strong><?php echo '保证金';?>:</strong>
                <input type="text" class="txt-short" name="bond" id="bond" value="<?php echo $output['member_list']['bond']; ?>" />元
              </li>
            </tbody>
          </table></td>
      </tr>
    </tbody>
  </form>

    <tfoot>
      <tr class="tfoot">
        <td>
        <a href="JavaScript:void(0);" class="btn" onclick="history.go(-1)"><span><?php echo $lang['nc_back'];?></span></a>
        <?php if ( $output['member_list']['audit_status'] != 2 ) {?>
        <a href="JavaScript:void(0);" class="btn" onclick="submit();" ><span><?php echo '通过';?></span></a>
        <a href="index.php?act=distribute_member&op=refused_audit&distribute_id=<?php echo $output['member_list']['distribute_id'] ?>" class="btn" ><span><?php echo '拒绝';?></span></a>
        <?php }?>
        </td>
      </tr>
    </tfoot>
  </table>
</div>
<script>
  function submit()
  {
      $("#distribute").submit();
  }
</script>
