<?php defined('InShopNC') or exit('Access Invalid!');?>
<ul class="fd-list">
  <?php if (!empty($output['traceinfo'])){?>
  <li nc_type="tracerow_<?php echo $output['traceinfo']['trace_id']; ?>"> <div class="fd-aside"><span class="thumb size60"><i></i> <a href="index.php?act=member_snshome&mid=<?php echo $v['trace_memberid'];?>" target="_blank"> <img src="<?php if ($output['traceinfo']['trace_memberavatar']!='') { echo ATTACH_AVATAR.DS.$output['traceinfo']['trace_memberavatar']; } else {  echo ATTACH_COMMON.DS.C('default_user_portrait'); } ?>" onload="javascript:DrawImage(this,60,60);"> </a> </span>
        <!--<p class="arrow"></p>-->
      </div>
    <dl class="fd-wrap">
      <dt>
        <h3><a href="index.php?act=member_snshome&mid=<?php echo $output['traceinfo']['trace_memberid'];?>" target="_blank"><?php echo $output['traceinfo']['trace_membername'];?></a><?php echo $lang['nc_colon'];?></h3>
        <h5><?php echo $output['traceinfo']['trace_title'];?></h5>
        
  		<?php if ($_SESSION['member_id'] == $output['traceinfo']['trace_memberid']){?>
        <span class="fd-handle">
        <p class="hover-arrow"><i></i><a href="javascript:void(0);" nc_type="fd_del" data-param='{"txtid":"<?php echo $output['traceinfo']['trace_id'];?>","type":"href"}'><?php echo $lang['nc_delete'];?></a></p>
        </span>
        <?php }?>
        </dt>
      <dd>
        <?php if ($output['traceinfo']['trace_originalid'] > 0){//转帖内容?>
        <div class="fd-forward"><?php echo parsesmiles($output['traceinfo']['trace_content']);?></div>
        <div class="stat">
        	<span><?php echo $lang['sns_forward']; ?><?php echo $output['traceinfo']['trace_orgcopycount']>0?"({$output['traceinfo']['trace_orgcopycount']})":''; ?></span>&nbsp;&nbsp;
        	<span><a href="index.php?act=member_snshome&op=traceinfo&mid=<?php echo $output['traceinfo']['trace_originalmemberid'];?>&id=<?php echo $output['traceinfo']['trace_originalid'];?>" target="_blank"><?php echo $lang['sns_comment']; ?><?php echo $output['traceinfo']['trace_orgcommentcount']>0?"({$output['traceinfo']['trace_orgcommentcount']})":''; ?></a></span>
        </div>
        <?php } else {?>
        <?php echo parsesmiles($output['traceinfo']['trace_content']);?>
        <?php }?>
      </dd>
      <dd> <span class="goods-time fl"><?php echo date('Y-m-d h:i',$output['traceinfo']['trace_addtime']);?></span> <span class="fr"><a href="javascript:void(0);" nc_type="fd_forwardbtn" data-param='{"txtid":"<?php echo $output['traceinfo']['trace_id'];?>"}'><?php echo $lang['sns_forward'];?></a>&nbsp;|&nbsp;<a href="javascript:void(0);" nc_type="fd_commentbtn" data-param='{"txtid":"<?php echo $output['traceinfo']['trace_id'];?>","mid":"<?php echo $output['traceinfo']['trace_memberid'];?>"}'><?php echo $lang['sns_comment'];?><?php echo $output['traceinfo']['trace_commentcount']>0?"({$output['traceinfo']['trace_commentcount']})":'';?></a></span>
        </div>
      </dd>
      <!-- 评论模块start -->
      <div id="tracereply_<?php echo $output['traceinfo']['trace_id'];?>"></div>
      <!-- 评论模块end --> 
      <!-- 转发模块start -->
      <div id="forward_<?php echo $output['traceinfo']['trace_id'];?>" style="display:none;">
      <div class="forward-widget">
        <div class="forward-edit">
          <form id="forwardform_<?php echo $output['traceinfo']['trace_id'];?>" method="post" action="index.php?act=member_snsindex&op=addforward">
            <input type="hidden" name="originaltype" value="0"/>
            <input type="hidden" name="originalid" value="<?php echo $output['traceinfo']['trace_id'];?>"/>
            <div class="forward-add">
              <div class="textarea-b">
                <textarea resize="none" id="content_forward<?php echo $output['traceinfo']['trace_id'];?>" name="forwardcontent"><?php echo $output['traceinfo']['trace_title_forward'];?></textarea>
                <span class="error"></span>
              </div>
              <!-- 验证码 -->
              <div id="forwardseccode<?php echo $output['traceinfo']['trace_id'];?>" class="seccode">				
					<label for="captcha"><?php echo $lang['nc_checkcode'].$lang['nc_colon'];?></label>
	          		<input name="captcha" class="text" type="text" size="4" maxlength="4"/>
	          		<img src="" title="<?php echo $lang['wrong_checkcode_change'];?>" name="codeimage" onclick="this.src='index.php?act=seccode&op=makecode&nchash=<?php echo $output['nchash'];?>&t=' + Math.random()"/>
                    <span><?php echo $lang['wrong_seccode'];?></span>
	          		<input type="hidden" name="nchash" value="<?php echo $output['nchash'];?>"/>
			  </div>
              <input type="text" style="display:none;" /><!-- 防止点击Enter键提交 -->
              <div class="act">
              	<span class="skin-blue"><span class="btn"><a href="javascript:void(0);" nc_type="forwardbtn" data-param='{"txtid":"<?php echo $output['traceinfo']['trace_id'];?>"}'><?php echo $lang['sns_forward'];?></a></span></span>
              	<span id="forwardcharcount<?php echo $output['traceinfo']['trace_id'];?>" style="float:right;"></span>
              	<a class="face" nc_type="smiliesbtn" data-param='{"txtid":"forward<?php echo $output['traceinfo']['trace_id'];?>"}' href="javascript:void(0);" ><?php echo $lang['sns_smiles'];?></a> </div>
            </div>
          </form>
        </div>
        <ul class="forward-list">
        </ul>
      </div>
      </div>
    </dl>
    <!-- 转发模块end -->
    <div id="smilies_div" class="smilies-module"></div>
  </li>
  <?php } else {?>
  <li>
    <div class="sns-norecord"><?php echo $lang['sns_trace_deleted'];?></div>
  </li>
  <?php } ?>
</ul> 
<script type="text/javascript" src="<?php echo RESOURCE_PATH;?>/js/smilies/smilies_data.js" charset="utf-8"></script> 
<script type="text/javascript" src="<?php echo RESOURCE_PATH;?>/js/jquery.caretInsert.js" charset="utf-8"></script> 
<script type="text/javascript">
document.onclick = function(){ $("#smilies_div").html(''); $("#smilies_div").hide();};
//var max_recordnum = '<?php echo $output['max_recordnum'];?>';
$(function(){
	$("#tracereply_<?php echo $output['traceinfo']['trace_id'];?>").load('index.php?act=member_snshome&op=commentlist&mid=<?php echo $output['traceinfo']['trace_memberid'];?>&type=0&id=<?php echo $output['traceinfo']['trace_id'];?>');
});
</script>