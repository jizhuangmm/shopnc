<?php defined('InShopNC') or exit('Access Invalid!');?>

<div class="sharelist-g">
<div class="tabmenu">
  <ul class="tab">
    <li class="normal"><a href="index.php?act=member_snshome&op=shareglist&type=share&mid=<?php echo $output['member_info']['member_id'];?>"><span><?php echo $lang['sns_shareofgoods'];?></span></a></li>
    <li class="active"><a href="index.php?act=member_snshome&op=shareglist&type=like&mid=<?php echo $output['member_info']['member_id'];?>"><span><?php echo $lang['sns_likeofgoods'];?></span></a></li>
  </ul>
</div>
<div id="div_lazyload_like">
<textarea class="text-lazyload" style="display: none;">
	<?php if (!empty($output['goodslist'])){?>
    <ul class="nc-sns-pinterest" id="snsPinterest">
	<?php foreach ($output['goodslist'] as $k=>$v){ ?>
		<li id="recordone_<?php echo $v['share_id'];?>" class="item">
<dl>
	      <dt class="goodspic"><span class="thumb size160"><i></i>
	      	<a href="index.php?act=member_snshome&op=goodsinfo&type=like&mid=<?php echo $v['share_memberid'];?>&id=<?php echo $v['share_id'];?>" title="<?php echo $v['snsgoods_goodsname']?>">
	      		<img src="<?php echo cthumb($v['snsgoods_goodsimage'],'small',$v['snsgoods_storeid']);?>" onload="javascript:DrawImage(this,160,160);"/>
	      	</a></span>
	      </dt>
				<dd class="pinterest-addtime goods-time"><?php echo @date('Y-m-d H:i',$v['share_likeaddtime']);?><?php if ($output['relation'] == 3){//主人自己?>
				<div nc_type="privacydiv" class="privacy-module fr"><span class="privacybtn" style="width:40px;" nc_type="formprivacybtn"><?php echo $lang['sns_setting'];?><i></i></span>
                 <div class="privacytab" nc_type="privacytab" style="display:none;">
	            <ul class="menu-bd"> <li nc_type="delbtn" data-param='{"sid":"<?php echo $v['share_id'];?>","tabtype":"like"}'><span><a href="javascript:void(0);"><?php echo $lang['nc_delete'];?></a></span></li>
	            </ul>
	          </div>
               
				<?php } ?></dd>
				<dd class="pinterest-ops">
					<span class="ops-like" id="likestat_<?php echo $v['share_goodsid'];?>">				
						<i class="<?php echo $v['snsgoods_havelike']==1?'noaction':''; ?>"></i>
						<a href="javascript:void(0);" nc_type="likebtn" data-param='{"gid":"<?php echo $v['share_goodsid'];?>"}' class="<?php echo $v['snsgoods_havelike']==1?'noaction':''; ?>"><?php echo $lang['sns_like'];?></a>
						<em><?php echo $v['snsgoods_likenum'];?></em>
					</span>
					<span class="ops-comment"><i></i><a href="index.php?act=member_snshome&op=goodsinfo&type=like&mid=<?php echo $v['share_memberid'];?>&id=<?php echo $v['share_id'];?>"><?php echo $lang['sns_comment'];?></a>
						<em><?php echo $v['share_commentcount'];?></em>
					</span>
				</dd><div class="clear"></div>
			</dl>
		</li>
	<?php }?></ul><div class="clear"></div>
		<div class="pagination mb30"><?php echo $output['show_page']; ?></div><div class="clear"></div>
	<?php }else {?>
		<?php if ($output['relation'] == 3){?>
		<div class="sns-norecord"><?php echo $lang['sns_likegoods_nothave_self'];?></div>
		<?php }else {?>
		<div class="sns-norecord"><?php echo $lang['sns_likegoods_nothave_1'];?><br><a href="index.php?act=member_snsfriend&op=follow"><?php echo $lang['sns_likegoods_nothave_2'];?></a></div>
		<?php }?>		
	<?php }?>
	</textarea>
</div>
</div>
<script src="<?php echo RESOURCE_PATH;?>/js/jquery.masonry.js" type="text/javascript"></script> 
<script src="<?php echo RESOURCE_PATH;?>/js/jquery.datalazyload.js" type="text/javascript"></script> 
<script type="text/javascript">
  $(function(){
    $('#snsPinterest').masonry({
      // options 设置选项
      itemSelector : '.item',//class 选择器
      columnWidth : 184 ,//一列的宽度 Integer
          isAnimated:true,//使用jquery的布局变化  Boolean
          animationOptions:{queue: false, duration: 500 
            //jquery animate属性 渐变效果  Object { queue: false, duration: 500 }
          },
          gutterWidth:0,//列的间隙 Integer
          isFitWidth:true,// 适应宽度   Boolean
          isResizableL:true,// 是否可调整大小 Boolean
          isRTL:false//使用从右到左的布局 Boolean
  });
});
</script> 
<script type="text/javascript">
$(function(){
	//列表延时加载
    $('#div_lazyload_like').datalazyload({dataItem: '.item', loadType: 'item', effect: 'fadeIn', effectTime: 1000 });
});
</script>
