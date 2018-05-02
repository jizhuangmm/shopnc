<?php defined('InShopNC') or exit('Access Invalid!');?>
<!-- 动态列表 -->
<div id="friendtrace"></div>
<!-- 表情弹出层 -->
<div id="smilies_div" class="smilies-module"></div>
<script type="text/javascript" src="<?php echo RESOURCE_PATH;?>/js/smilies/smilies_data.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo RESOURCE_PATH;?>/js/jquery.caretInsert.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo RESOURCE_PATH;?>/js/jquery.ajaxdatalazy.js" charset="utf-8"></script>
<script type="text/javascript">
document.onclick = function(){ $("#smilies_div").html(''); $("#smilies_div").hide();};
$(function(){
	//加载好友动态分页
	$('#friendtrace').lazyinit();
	$('#friendtrace').lazyshow({url:"index.php?act=member_snshome&op=tracelist&mid=<?php echo $output['member_info']['member_id'];?>&page=1",'iIntervalId':true});
});
</script>