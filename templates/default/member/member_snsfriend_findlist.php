<?php defined('InShopNC') or exit('Access Invalid!');?>

<div id="lazymodule"> 
  <!-- 搜索列表start -->
  <table class="ncu-table-style">
    <tbody>
      <?php if ($output['memberlist']) { ?>
      <tr>
        <td colspan="2"><ul class="friend-list">
            <?php foreach($output['memberlist'] as $k => $v){ ?>
            <li id="recordone_<?php echo $v['member_id']; ?>">
              <div class="friend-img"> <span class="thumb size100"> <a href="index.php?act=member_snshome&mid=<?php echo $v['member_id'];?>" target="_blank"><img src="<?php if ($v['member_avatar']!='') { echo ATTACH_AVATAR.DS.$v['member_avatar']; } else { echo ATTACH_COMMON.DS.C('default_user_portrait'); } ?>" alt="<?php echo $v['member_name']; ?>" onload="javascript:DrawImage(this,100,100);"  /></a> </span> </div>
              <dl>
                <dt> <a href="index.php?act=member_snshome&mid=<?php echo $v['member_id'];?>"  class="friend-name" title="<?php echo $v['friend_tomname']; ?>" target="_blank"><?php echo $v['member_name']; ?></a> <a href="index.php?act=home&op=sendmsg&member_id=<?php echo $v['member_id']; ?>" target="_blank" class="message" title="<?php echo $lang['nc_message'] ;?>">&nbsp;</a> <em class="<?php echo $v['sex_class']; ?>"></em> </a> </dt>
                <dd class="credit">
                  <?php if (empty($v['credit_arr'])){ echo $lang['nc_buyercredit'].$lang['nc_colon'].$v['member_credit']; }else {?>
                  <span class="buyer-<?php echo $v['credit_arr']['grade']; ?> level-<?php echo $v['credit_arr']['songrade']; ?>"></span>
                  <?php }?>
                </dd>
                <dd class="area"><?php echo $v['member_areainfo'];?></dd>
                <dd nc_type="signmodule"> <span nc_type="mutualsign" style="<?php echo $v['followstate']!=2?'display:none;':'';?>"><?php echo $lang['snsfriend_follow_eachother'];?></span> <span nc_type="followsign" style="<?php echo $v['followstate']!=1?'display:none;':'';?>"><?php echo $lang['snsfriend_followed'];?></span> <a href="javascript:void(0)" class="ncu-btn2" nc_type="followbtn" data-param='{"mid":"<?php echo $v['member_id'];?>"}'style="<?php echo $v['followstate']!=0?'display:none;':'';?>"><?php echo $lang['snsfriend_followbtn'];?></a> </dd>
              </dl>
            </li>
            <?php } ?>
          </ul></td>
      </tr>
      <?php } else{?>
      <tr>
        <td colspan="2" class="norecord"><i>&nbsp;</i><span><?php echo $lang['no_record'];?></span></td>
      </tr>
      <?php }?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="20"></td>
      </tr>
    </tfoot>
  </table>
  <?php if ($output['hasmore']){?>
  <div id="lazymore"></div>
  <?php }?>
  <!-- 搜索列表end --> 
</div>
