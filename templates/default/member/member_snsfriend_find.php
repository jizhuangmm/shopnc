<?php defined('InShopNC') or exit('Access Invalid!');?>

<div class="wrap">
  <div class="tabmenu">
    <?php include template('member/member_submenu');?>
  </div>
  <div class="friendfind"> 
    <!-- 搜索好友start -->
    
    <form action="index.php" method="get">
      <table class="search-form">
        <input type="hidden" name="act" value="member_snsfriend">
        <input type="hidden" name="op" value="find">
        <input type="hidden" name="form_submit" value="ok">
        <tr>
          <td>&nbsp;</td>
          <td class="w150"><input type="text" class="text" name="searchname" value="<?php echo $_GET['searchname'];?>" placeholder="<?php echo $lang['snsfriend_find_keytip'];?>" ></td>
          <td class="w90 tc"><input type="submit" class="submit" value="<?php echo $lang['snsfriend_search'];?>"></td>
        </tr>
      </table>
    </form>
    
    <!-- 搜索好友end -->
    <table class="ncu-table-style">
      <?php if($output['type']=='list'){?>
      <thead>
        <tr>
          <th class="tc"><h3><?php echo $lang['snsfriend_searchresult'];?></h3></th>
        </tr>
      </thead>
      <tbody>
        <?php if(empty($_GET['searchname'])){?>
        <tr>
          <td colspan="20" class="norecord" ><i></i><span><?php echo $lang['snsfriend_find_keytip'];?></span></td>
        </tr>
        <?php }else{?>
        <tr>
          <td colspan="20" id="searchlist"></td>
        </tr>
        <?php }?>
      </tbody>
    </table>
    <?php } else{ ?>
    <!-- 粉丝列表start -->
    <div class="fanlist">
      <table class="ncu-table-style">
        <thead>
          <tr>
            <th class="tc"><h3><?php echo $lang['snsfriend_latelyfans']; ?></h3></th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($output['fanlist'])) { ?>
          <tr>
            <td colspan="2"><ul class="friend-list">
                <?php foreach($output['fanlist'] as $k => $v){ ?>
                <li id="recordone_<?php echo $v['friend_frommid']; ?>">
                  <div class="friend-img"><span class="thumb size100"><a href="index.php?act=member_snshome&mid=<?php echo $v['friend_frommid'];?>" target="_blank"><img src="<?php if ($v['member_avatar']!='') { echo ATTACH_AVATAR.DS.$v['member_avatar']; } else { echo ATTACH_COMMON.DS.C('default_user_portrait'); } ?>" alt="<?php echo $v['friend_frommname']; ?>" onload="javascript:DrawImage(this,100,100);"  /></a></span></div>
                  <dl>
                    <dt> <a href="index.php?act=member_snshome&mid=<?php echo $v['friend_frommid'];?>" target="_blank" class="friend-name" title="<?php echo $v['friend_frommname']; ?>"><?php echo $v['friend_frommname']; ?></a> <a href="index.php?act=home&op=sendmsg&member_id=<?php echo $v['friend_frommid']; ?>" target="_blank" class="message" title="<?php echo $lang['nc_message'] ;?>">&nbsp;</a> <em class="<?php echo $v['sex_class'];?>"></em> </dt>
                    <dd class="credit">
                      <?php if (empty($v['credit_arr'])){ echo $lang['nc_buyercredit'].$lang['nc_colon'].$v['member_credit']; }else {?>
                      <span class="buyer-<?php echo $v['credit_arr']['grade']; ?> level-<?php echo $v['credit_arr']['songrade']; ?>"></span>
                      <?php }?>
                    </dd>
                    <dd class="area"><?php echo $v['member_areainfo']; ?></dd>
                    <dd nc_type="signmodule"><span nc_type="mutualsign" style="display:none;"><?php echo $lang['snsfriend_follow_eachother'];?></span><span nc_type="followsign" style="display:none;"><?php echo $lang['snsfriend_followed'];?></span> <a href="javascript:void(0)" class="ncu-btn2 mt5" nc_type="followbtn" data-param='{"mid":"<?php echo $v['friend_frommid'];?>"}'><?php echo $lang['snsfriend_followbtn'];?></a> </dd>
                  </dl>
                </li>
                <?php } ?>
              </ul></td>
          </tr>
          <?php }else{?>
          <tr>
            <td colspan="2" class="norecord" ><i></i><span style="line-height:28px !important;"><?php echo $lang['snsfriend_latelyfans_nohave'];?></span></td>
          </tr>
          <?php }?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="20"></td>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- 粉丝列表end -->
    <?php }?>
  </div>
</div>
<script type="text/javascript" src="<?php echo RESOURCE_PATH;?>/js/jquery.ajaxdatalazy.js" charset="utf-8"></script> 
<script type="text/javascript" src="<?php echo RESOURCE_PATH;?>/js/sns_friend.js" charset="utf-8"></script> 
<script type="text/javascript">
	$(function(){
		<?php if($output['type']=='list' && !empty($_GET['searchname'])){?>
        //加载好友动态分页
		$('#searchlist').lazyinit();
		var urlstr = "index.php?act=member_snsfriend&op=findlist&"+$.param({'searchname':'<?php echo $_GET['searchname'];?>'});
		$('#searchlist').lazyshow({'url':urlstr,'iIntervalId':true});
		<?php }?>
	});
</script>