<?php defined('IN_B2B2C') or exit('Access Invalid!');?>

<div class="page">
  <table class="table tb-type2 order">
    <tbody>
      <tr class="space">
        <th colspan="15"><?php echo $lang['admin_pointorder_info_ordersimple'];?></th>
      </tr>
      <tr>
        <td><ul>
            <li><strong><?php echo $lang['admin_pointorder_ordersn'];?>:</strong><?php echo $output['order_info']['point_ordersn'];?></li>
            <li><strong><?php echo $lang['admin_pointorder_orderstate'];?>:</strong><?php echo $output['order_info']['point_orderstatetext']['order_state']; ?><?php echo $output['order_info']['point_orderstatetext']['change_state'] == ''?'':','.$output['order_info']['point_orderstatetext']['change_state'];?></li>
            <li><strong><?php echo $lang['admin_pointorder_exchangepoints'];?>:</strong><span class="red_common"><?php echo $output['order_info']['point_allpoint'];?></span></li>
            <?php if ($output['order_info']['point_shippingcharge'] == 1){ ?>
            <li><strong><?php echo $lang['admin_pointorder_shippingfee'];?>:</strong><?php echo $output['order_info']['point_shippingfee'];?></li>
            <?php } ?>
            <li><strong><?php echo $lang['admin_pointorder_addtime'];?>:</strong><span class="red_common"><?php echo @date('Y-m-d H:i:s',$output['order_info']['point_addtime']);?></span></li>
            <li><strong><?php echo '运费';?>:</strong><span class="red_common"><?php echo $output['order_info']['point_shippingfee'];?></span></li>

          </ul></td>
      </tr>
      <tr class="space">
        <th colspan="2"><?php echo $lang['admin_pointorder_info_orderdetail'];?></th>
      </tr>
      <tr>
        <th><?php echo $lang['admin_pointorder_info_memberinfo'];?></th>
      </tr>
      <tr>
        <td><ul>
            <li><strong><?php echo $lang['admin_pointorder_membername'];?>:</strong><?php echo $output['order_info']['point_buyername'];?></li>
            <li><strong><?php echo $lang['admin_pointorder_info_memberemail']; ?>:</strong><?php echo $output['order_info']['point_buyeremail'];?></li>
            <li><strong><?php echo $lang['admin_pointorder_info_ordermessage']; ?>:</strong><?php echo $output['order_info']['point_ordermessage'];?></li>
          </ul></td>
      </tr>
      <?php if ( $output['order_info']['point_paymentcode'] ){ ?>
      <tr>
        <td><ul>
            <li><strong><?php echo $lang['admin_pointorder_payment'];?>:</strong><?php echo $output['order_info']['point_paymentname'];?></li>
            <li><strong><?php echo $lang['admin_pointorder_info_paymenttime'];?>:</strong><?php echo @date('Y-m-d H:i:s',$output['order_info']['point_paymenttime']);?></li>
            <li><strong><?php echo $lang['admin_pointorder_info_paymentmessage'];?>:</strong>
	        <?php $tmp = @unserialize($output['order_info']['point_paymessage']); ?>
	        <?php if (is_array($tmp) && count($tmp)>0){ ?>
		      	<?php if ($tmp['user']) echo $lang['pay_bank_user'].' '.stripslashes($tmp['user']);?>
		      	<?php if ($tmp['bank']) echo $lang['pay_bank_bank'].' '.stripslashes($tmp['bank']);?>
		      	<?php if ($tmp['account']) echo $lang['pay_bank_account'].' '.stripslashes($tmp['account']);?>
		      	<?php if ($tmp['num']) echo $lang['pay_bank_num'].' '.stripslashes($tmp['num']);?>
		      	<?php if ($tmp['date']) echo $lang['pay_bank_date'].' '.stripslashes($tmp['date']);?>
		      	<?php if ($tmp['order']) echo $lang['pay_bank_order'].' '.stripslashes($tmp['order']);?>
		      	<?php if ($tmp['extend']) echo $lang['pay_bank_extend'].' '.stripslashes($tmp['extend']);?>
		    <?php }else{?>
	        	<?php echo $output['order_info']['point_paymessage']; ?>
	        <?php } ?>            
            </li>
          </ul></td>
      </tr>
      <?php } ?>
      <tr>
        <th><?php echo $lang['admin_pointorder_info_shipinfo'];?></th>
      </tr>
      <tr>
        <td><ul>
            <li><strong><?php echo $lang['admin_pointorder_info_shipinfo_truename'];?>:</strong><?php echo $output['order_info']['point_truename'];?></li>
            <li><strong><?php echo $lang['admin_pointorder_info_shipinfo_areainfo'];?>:</strong><?php echo $output['order_info']['point_areainfo'];?></li>
            <li><strong><?php echo $lang['admin_pointorder_info_shipinfo_telphone'];?>:</strong><?php echo $output['order_info']['point_telphone'];?></li>
            <li><strong><?php echo $lang['admin_pointorder_info_shipinfo_mobphone'];?>:</strong><?php echo $output['order_info']['point_mobphone'];?></li>
            <li><strong><?php echo $lang['admin_pointorder_info_shipinfo_address'];?>:</strong><?php echo $output['order_info']['point_address'];?></li>
            <?php if ($output['order_info']['point_shippingcode'] != ''){?>
            <li><strong><?php echo $lang['admin_pointorder_shipping_code'];?>:</strong><?php echo $output['order_info']['point_shippingcode'];?></li>
            <?php }?>
            <?php if ($output['order_info']['point_shippingtime'] != ''){?>
            <li><strong><?php echo $lang['admin_pointorder_shipping_time'];?>:</strong><?php echo @date('Y-m-d',$output['order_info']['point_shippingtime']);?></li>
            <?php }?>
            <?php if ($output['order_info']['point_shippingdesc'] != ''){?>
            <li style="width:60%;"><strong><?php echo $lang['admin_pointorder_info_shipinfo_description'];?>:</strong><?php echo $output['order_info']['point_shippingdesc'];?></li>
            <?php }?>
          </ul></td>
      </tr>
      <tr>
        <th><?php echo $lang['admin_pointorder_info_prodinfo'];?></th>
      </tr>
      <tr>
        <td><table class="table tb-type2 goods ">
            <tbody>
              <tr>
                <th></th>
                <th></th>
                <th><?php echo $lang['admin_pointorder_exchangepoints'];?></th>
                <th><?php echo $lang['admin_pointorder_info_prodinfo_exnum'];?></th>
              </tr>
              <?php foreach($output['prod_list'] as $v){?>
              <tr>
                <td class="w60 picture"><div class="size-56x56"><span class="thumb size-56x56"><i></i><a href="<?php echo urlShop('pointprod', 'pinfo', array('id' => $v['point_goodsid']));?>" target="_blank" class="order_info_pic"> <img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_POINTPROD.DS.str_ireplace('.', '_small.', $v['point_goodsimage']);?>" onload="javascript:DrawImage(this,56,56);" /></a></span></div></td>
                <td class="w50pre"><a href="<?php echo urlShop('pointprod', 'pinfo', array('id' => $v['point_goodsid']));?>" target="_blank"><?php echo $v['point_goodsname'];?></a></td>
                <td><?php echo $v['point_goodspoints'];?></td>
                <td><?php echo $v['point_goodsnum'];?></td>
              </tr><?php }?>
            </tbody>
          </table></td>
      </tr>
    </tbody>
    <tfoot>
      <tr class="tfoot">
        <td><a href="index.php?act=pointorder&op=pointorder_list" class="btn"><span><?php echo $lang['admin_pointorder_gobacklist'];?></span></a></td>
      </tr>
    </tfoot>
  </table>
</div>