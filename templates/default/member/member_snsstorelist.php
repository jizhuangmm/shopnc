<?php defined('InShopNC') or exit('Access Invalid!');?>
<link href="<?php echo RESOURCE_PATH;?>/js/jcarousel/skins/tango/skin.css" rel="stylesheet" type="text/css">
<style type="text/css">
.jcarousel-skin-tango .jcarousel-clip-horizontal { width: 560px !important; height: 130px !important;}
.jcarousel-skin-tango .jcarousel-item { height: 130px !important;}
.jcarousel-skin-tango .jcarousel-container-horizontal { width: 560px !important;}
</style>
<!-- 店铺列表 -->
<div class="shoplist-module">
  <?php if(!empty($output['storelist'])){?>
  <ul>
    <?php foreach($output['storelist'] as $k=>$v){?>
    <li class="shop-item" id="recordone_<?php echo $v['share_id']; ?>">
      <div class="info">
        <div class="title"><a title="<?php echo $v['store_name'];?>" target="_blank" href="<?php echo ncUrl(array('act'=>'show_store','id'=>$v['store_id']),'store',$v['store_domain']);?>" ><?php echo $v['store_name'];?></a>
          <?php if (empty($v['credit_arr'])){?>
          <span><?php echo $lang['sns_sharestore_sellercredit'].$lang['nc_colon'].$v['store_credit']; ?></span>
          <?php }else {?>
          <span class="seller-<?php echo $v['credit_arr']['grade']; ?> level-<?php echo $v['credit_arr']['songrade']; ?>"></span>
          <?php }?>
          <?php if ($output['relation']){?>
        <div class="privacy-module" nc_type="privacydiv"> <span class="privacybtn w50" nc_type="privacybtn"><i></i><?php echo $lang['sns_setting'];?></span>
          <div class="privacytab" nc_type="privacytab" style="display: none;">
            <ul class="menu-bd">
              <li nc_type="privacyoption" data-param='{"sid":"<?php echo $v['share_id'];?>","v":"0","op":"store"}'><span class="<?php echo $v['share_privacy']==0?'selected':'';?>"><?php echo $lang['sns_weiboprivacy_all'];?></span></li>
              <li nc_type="privacyoption" data-param='{"sid":"<?php echo $v['share_id'];?>","v":"1","op":"store"}'><span class="<?php echo $v['share_privacy']==1?'selected':'';?>"><?php echo $lang['sns_weiboprivacy_friend'];?></span></li>
              <li nc_type="privacyoption" data-param='{"sid":"<?php echo $v['share_id'];?>","v":"2","op":"store"}'><span class="<?php echo $v['share_privacy']==2?'selected':'';?>"><?php echo $lang['sns_weiboprivacy_self'];?></span></li>
              <?php if ($output['relation'] == 3){//主人自己?>
              <li nc_type="storedelbtn" data-param='{"sid":"<?php echo $v['share_id'];?>"}'><span><a href="javascript:void(0);"><?php echo $lang['nc_delete'];?></a></span></li>
                <?php } ?>
            </ul>
          </div>
        </div>
        <?php }?>
        </div>
        
      </div>
      <div class="detail">
        <?php if (!empty($v['goods'])){?>
        <ul nc_type="mycarousel" class="jcarousel-skin-tango">
          <?php foreach((array)$v['goods'] as $g_k=>$g_v){?>
          <li>
          	<a href="<?php echo $g_v['goodsurl'];?>" target="_blank">
          		<span class="thumb size120"><i></i> <img alt="<?php echo $g_v['goods_name'];?>" src="<?php echo thumb($g_v,'small');?>" onload="javascript:DrawImage(this,120,120);"/></span>
          	</a> </li>
          <?php }?>
        </ul>
        <?php }?>
      </div>
      <div class="operate">
        <ul class="status">
          <li>
            <p class="number"><?php echo $v['goods_count'];?></p>
            <p class="kind"><?php echo $lang['sns_sharestore_allgoods'];?></p>
          </li>
          <li>
            <p class="number"><?php echo $v['store_collect'];?></p>
            <p class="kind"><?php echo $lang['sns_sharestore_collectnum'];?></p>
          </li>
        </ul>
      </div>
      <div style="clear: both;"></div>
    </li>
    <?php }?>
  </ul>
  <div style="clear:both;"></div>
  <div class="pagination"><?php echo $output['show_page']; ?></div>
  <?php } else{?>
	  <?php if ($output['relation'] == 3){?>
	  <div class="sns-norecord"><?php echo $lang['sns_sharestore_nohave_self'];?></div>
	  <?php }else {?>
	  <div class="sns-norecord"><?php echo $lang['sns_sharestore_nohave_1'];?><br><a href="index.php?act=member_snsfriend&op=follow"><?php echo $lang['sns_sharestore_nohave_2'];?></a></div>
	  <?php }?>
  <?php }?>
</div>
<script type="text/javascript" src="<?php echo RESOURCE_PATH;?>/js/jcarousel/jquery.jcarousel.min.js"></script> 
<script type="text/javascript">
$(function(){
	//图片轮换
    $('[nc_type="mycarousel"]').jcarousel({visible: 4});
  	//删除分享的店铺
	$("[nc_type='storedelbtn']").live('click',function(){
		var data_str = $(this).attr('data-param');
        eval( "data_str = "+data_str);        
        showDialog('<?php echo $lang['nc_common_op_confirm'];?>','confirm', '', function(){
        	ajax_get_confirm('','index.php?act=member_snsindex&op=delstore&id='+data_str.sid);
			return false;
		});
	});
});
</script>