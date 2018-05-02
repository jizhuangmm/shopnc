<?php defined('InShopNC') or exit('Access Invalid!');?>

<input type="hidden" id="rtype" value="<?php echo $_GET['type'];?>"/>
<div class="snsgoods-info">
  <div class="gcontainer">
    <div class="title">
      <div class="downmenu" id="recordone_<?php echo $output['sharegoods_info']['share_id'];?>">
        <?php if ($output['relation'] == 3){//主人自己?>
        <div nc_type="privacydiv" class="privacy-module"> <span class="privacybtn w40" nc_type="privacybtn"><i></i><?php echo $lang['sns_setting'];?></span>
          <div class="privacytab" nc_type="privacytab" style="display:none;">
            <ul class="menu-bd">
              <li nc_type="privacyoption" data-param='{"sid":"<?php echo $output['sharegoods_info']['share_id'];?>","v":"0"}'><span class="<?php echo $output['sharegoods_info']['share_privacy']==0?'selected':'';?>"><?php echo $lang['sns_weiboprivacy_all'];?></span></li>
              <li nc_type="privacyoption" data-param='{"sid":"<?php echo $output['sharegoods_info']['share_id'];?>","v":"1"}'><span class="<?php echo $output['sharegoods_info']['share_privacy']==1?'selected':'';?>"><?php echo $lang['sns_weiboprivacy_friend'];?></span></li>
              <li nc_type="privacyoption" data-param='{"sid":"<?php echo $output['sharegoods_info']['share_id'];?>","v":"2"}'><span class="<?php echo $output['sharegoods_info']['share_privacy']==2?'selected':'';?>"><?php echo $lang['sns_weiboprivacy_self'];?></span></li>
            </ul>
          </div>
        </div>
        <?php } ?>
      </div>
      <div class="goback">
        <?php if ($_GET['type'] == 'like'){?>
        <a href="index.php?act=member_snshome&op=shareglist&type=like&mid=<?php echo $output['sharegoods_info']['share_memberid'];?>">&#8249;&nbsp;<?php echo $lang['sns_goback'];?></a>
        <?php }else { ?>
        <a href="index.php?act=member_snshome&op=shareglist&type=share&mid=<?php echo $output['sharegoods_info']['share_memberid'];?>">&#8249;&nbsp;<?php echo $lang['sns_goback'];?></a>
        <?php } ?>
      </div>
      <h3><?php echo $output['sharegoods_info']['snsgoods_goodsname'];?></h3>
    </div>
    <div class="pic-module" style="position: relative;">
      <div class="gimg">
      	<img src="<?php echo cthumb($output['sharegoods_info']['snsgoods_goodsimage'],'max',$output['sharegoods_info']['snsgoods_storeid']);?>" onload="javascript:DrawImage(this,500,500);"/>
        <?php if($output['sharegoods_info']['snsgoods_isfirst'] == false){?>
        <div class="prev <?php echo $output['sharegoods_info']['snsgoods_islast']==true?'whole':'';?>" nc_type="imgflipover" data-param='{"id":"<?php echo $output['sharegoods_info']['snsgoods_previd'];?>"}'></div>
        <?php }?>
        <?php if($output['sharegoods_info']['snsgoods_islast'] == false){?>
        <div class="next <?php echo $output['sharegoods_info']['snsgoods_isfirst']==true?'whole':'';?>" nc_type="imgflipover" data-param='{"id":"<?php echo $output['sharegoods_info']['snsgoods_nextid'];?>"}'></div>
        <?php }?>
      </div>
      <div class="price-module"> <span class="price"><em><?php echo $lang['currency'];?></em><?php echo $output['sharegoods_info']['snsgoods_goodsprice'];?></span> <a target="_blank" href="<?php echo $output['sharegoods_info']['snsgoods_goodsurl'];?>" class="orangebtn"><?php echo $lang['sns_viewdetails'];?></a> </div>
    </div>
  </div>
  <div class="operate-module"> <span class="ops-like" id="likestat_<?php echo $output['sharegoods_info']['share_goodsid'];?>">
    <?php if($output['sharegoods_info']['snsgoods_havelike'] == 1){echo $lang['sns_like'];} else{?>
    <a href="javascript:void(0);" nc_type="likebtn" data-param='{"gid":"<?php echo $output['sharegoods_info']['share_goodsid'];?>"}' class="<?php echo $output['sharegoods_info']['snsgoods_havelike']==1?'noaction':''; ?>"><?php echo $lang['sns_like'];?></a>
    <?php }?>
    <span><?php echo $output['sharegoods_info']['snsgoods_likenum'];?></span> </span> </div>
</div>

<!-- 商品评论 -->
<div class="comment-module"> 
  <!-- <div class="user">
			<img width="60" height="60" src="<?php if ($v['comment_memberavatar']!='') { echo ATTACH_AVATAR.DS.$v['comment_memberavatar']; } else {  echo ATTACH_COMMON.DS.C('default_user_portrait'); } ?>" onload="javascript:DrawImage(this,30,30);">
		</div> -->
  <div id="tracereply_<?php echo $output['sharegoods_info']['share_id'];?>" class="load-module"></div>
  <!-- 表情弹出层 -->
  <div id="smilies_div" class="smilies-module"></div>
  <div style="clear: both;"></div>
</div>
</div>
<script type="text/javascript" src="<?php echo RESOURCE_PATH;?>/js/smilies/smilies_data.js" charset="utf-8"></script> 
<script type="text/javascript" src="<?php echo RESOURCE_PATH;?>/js/jquery.caretInsert.js" charset="utf-8"></script> 
<script type="text/javascript">
document.onclick = function(){ $("#smilies_div").html(''); $("#smilies_div").hide();};
$(function(){
	//图片翻页
	$("[nc_type='imgflipover']").bind('click',function(){
	    var data = $(this).attr('data-param');
	    eval( "data = "+data);
	    var type = $("#rtype").val();
	    window.location.href="index.php?act=member_snshome&op=goodsinfo&type="+type+"&mid=<?php echo $output['sharegoods_info']['share_memberid'];?>&id="+data.id;
	});
	//评论加载
	$("#tracereply_<?php echo $output['sharegoods_info']['share_id'];?>").load('index.php?act=member_snshome&op=commentlist&type=1&mid=<?php echo $output['sharegoods_info']['share_memberid'];?>&id=<?php echo $output['sharegoods_info']['share_id'];?>');
});
</script>