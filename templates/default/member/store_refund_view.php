<div class="eject_con">
  <div id="warning"></div>
  <dl>
    <dt><?php echo $lang['refund_order_refundsn'].$lang['nc_colon'];?></dt>
    <dd class="goods-num"><?php echo $output['refund']['refund_sn'];?></dd>
  </dl>
  <dl>
    <dt><?php echo $lang['refund_order_add_time'].$lang['nc_colon'];?></dt>
    <dd class="goods-time"><?php echo date("Y-m-d H:i:s",$output['refund']['add_time']);?></dd>
  </dl>
  <dl>
    <dt><?php echo $lang['refund_order_buyer'].$lang['nc_colon'];?></dt>
    <dd><?php echo $output['refund']['buyer_name']; ?></dd>
  </dl>
  <dl>
    <dt><?php echo $lang['refund_order_refund'].$lang['nc_colon'];?></dt>
    <dd class="goods-price"><?php echo $output['refund']['order_refund']; ?></dd>
  </dl>
  <dl>
    <dt><?php echo $lang['refund_payment'].$lang['nc_colon'];?></dt>
    <dd> <?php echo $output['refund']['refund_paymentname']; ?> </dd>
  </dl>
  <dl>
    <dt><?php echo $lang['refund_message'].$lang['nc_colon'];?></dt>
    <dd> <?php echo $output['refund']['refund_message']; ?> </dd>
  </dl>
  <dl>
    <dt></dt>
    <dd></dd>
  </dl> 
</div>
