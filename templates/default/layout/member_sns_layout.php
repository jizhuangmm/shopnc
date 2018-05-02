<?php defined('InShopNC') or exit('Access Invalid!');?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET;?>">
<title><?php echo ($lang['nc_member_path_'.$output['menu_sign']]==''?'':$lang['nc_member_path_'.$output['menu_sign']].'_').$output['html_title'];?></title>
<meta name="keywords" content="<?php echo C('site_keywords'); ?>" />
<meta name="description" content="<?php echo C('site_description'); ?>" />
<meta name="author" content="ShopNC">
<meta name="copyright" content="ShopNC Inc. All Rights Reserved">
<link href="<?php echo TEMPLATES_PATH;?>/css/base.css" rel="stylesheet" type="text/css">
<link href="<?php echo TEMPLATES_PATH;?>/css/member.css" rel="stylesheet" type="text/css">
<link href="<?php echo TEMPLATES_PATH;?>/css/member_user.css" rel="stylesheet" type="text/css">
<!--[if IE 6]><style type="text/css">
body {_behavior: url(<?php echo TEMPLATES_PATH;?>/css/csshover.htc);}
</style>
<![endif]-->
<script type="text/javascript">
COOKIE_PRE = '<?php echo COOKIE_PRE;?>';_CHARSET = '<?php echo strtolower(CHARSET);?>';SITEURL = '<?php echo SiteUrl;?>';
</script>
<script type="text/javascript" src="<?php echo RESOURCE_PATH;?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_PATH;?>/js/jquery-ui/jquery.ui.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_PATH;?>/js/jquery.validation.min.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_PATH;?>/js/common.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo RESOURCE_PATH;?>/js/member.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo RESOURCE_PATH;?>/js/utils.js" charset="utf-8"></script>
<!--[if IE]>
<script src="<?php echo RESOURCE_PATH;?>/js/html5.js"></script>
<![endif]-->
<!--[if IE 6]>
<script src="<?php echo RESOURCE_PATH;?>/js/IE6_PNG.js"></script>
<script>
DD_belatedPNG.fix('.pngFix');
</script>
<script> 
// <![CDATA[ 
if((window.navigator.appName.toUpperCase().indexOf("MICROSOFT")>=0)&&(document.execCommand)) 
try{ 
document.execCommand("BackgroundImageCache", false, true); 
   } 
catch(e){} 
// ]]> 
</script> 
<![endif]-->

</head>
<body>
<?php require_once template('layout/layout_top');?>
<header id="header" class="pngFix">
  <div class="wrapper">
    <h1 id="logo" title="<?php echo C('site_name'); ?>"><a href="<?php echo SiteUrl;?>"><img src="<?php echo ATTACH_COMMON.DS.C('site_logo'); ?>" alt="<?php echo C('site_name'); ?>" class="pngFix"></a></h1>
    <nav>
      <ul>
        <li class="frist"><a <?php if($output['header_menu_sign'] == 'snsindex'){ echo "class='active'";}else{ echo "class='normal'";}?> href="index.php?act=member_snsindex" title="<?php echo $lang['nc_member_path_buyerindex'];?>"><?php echo $lang['nc_member_path_buyerindex'];?></a></li>
        <li><a <?php if($output['header_menu_sign'] == 'snshome'){ echo "class='active'";}else{ echo "class='normal'";}?> href="index.php?act=member_snshome" title="<?php echo $lang['nc_member_path_myspace'];?>"><?php echo $lang['nc_member_path_myspace'];?></a></li>
        <li><a <?php if($output['header_menu_sign'] == 'friend'){ echo "class='active'";}else{ echo "class='normal'";}?> href="index.php?act=member_snsfriend&op=find" title="<?php echo $lang['nc_member_path_friend'];?>"><?php echo $lang['nc_member_path_friend'];?></a></li>
        <li><a <?php if($output['header_menu_sign'] == 'message'){ echo "class='active'";}else{ echo "class='normal'";}?> href="index.php?act=home&op=message" title="<?php echo $lang['nc_member_path_message'];?>"><?php echo $lang['nc_member_path_message'];?>
          <?php if (intval($output['message_num']) > 0){ ?>
          <i class="new-message"><?php echo intval($output['message_num']); ?></i>
          <?php }?>
          </a></li>
        <li><a <?php if($output['header_menu_sign'] == 'setting'){ echo "class='active'";}else{ echo "class='normal'";}?> href="index.php?act=home&op=member" title="<?php echo $lang['nc_member_path_setting'];?>"><?php echo $lang['nc_member_path_setting'];?></a></li>
      </ul>
      <div class="search-box">
        <form method="get" action="index.php" onSubmit="return searchInput();">
          <input name="act" id="search_act" value="search" type="hidden">
          <input name="keyword" id="keyword" type="text" class="text" placeholder="<?php echo $lang['nc_searchdefault']; ?>" maxlength="200"/>
          <input name="" type="submit" class="submit pngFix" value="">
        </form>
      </div>
    </nav>
  </div>
</header>
<div id="container" class="wrapper">
  <div class="layout">
    <?php if($output['left_show'] != 'order_view') { ?>
    <div class="sidebar">
      <dl class="ncu-user">
        <?php if ($output['relation'] == 3){?>
        <dt class="username"><a href="index.php?act=home&op=member"  title="<?php echo $lang['nc_edituserinfo'];?>"><?php echo empty($output['member_info']['member_truename'])? $output['member_info']['member_name']:$output['member_info']['member_truename'];?></a></dt>
        <dd class="userface">
          <div class="pic"><span class="thumb size100"><i></i><img src="<?php if ($output['member_info']['member_avatar']!='') { echo ATTACH_AVATAR.DS.$output['member_info']['member_avatar']; } else { echo ATTACH_COMMON.DS.C('default_user_portrait'); } ?>" onload="javascript:DrawImage(this,100,100);" alt="<?php echo $output['member_info']['member_name']; ?>" / ></span>
            <p><a href="index.php?act=home&op=avatar" title="<?php echo $lang['nc_updateavatar'];?>"><?php echo $lang['nc_updateavatar'];?></a><i></i></p>
          </div>
        </dd>
        <?php }else {?>
        <dt class="username"><?php echo empty($output['member_info']['member_truename'])? $output['member_info']['member_name']:$output['member_info']['member_truename'];?></dt>
        <dd class="userface">
          <div class="pic"><span class="thumb size100"><i></i><img src="<?php if ($output['member_info']['member_avatar']!='') { echo ATTACH_AVATAR.DS.$output['member_info']['member_avatar']; } else { echo ATTACH_COMMON.DS.C('default_user_portrait'); } ?>" onload="javascript:DrawImage(this,100,100);" alt="<?php echo $output['member_info']['member_name']; ?>" / ></span>
          </div>
        </dd>
        <?php }?>
        <dd class="info">
          <ul>
            <li>
              <?php if (empty($output['member_info']['credit_arr'])){ echo $lang['nc_buyercredit'].$output['member_info']['member_credit']; }else {?>
              <span class="buyer-<?php echo $output['member_info']['credit_arr']['grade']; ?> level-<?php echo $output['member_info']['credit_arr']['songrade']; ?>"></span>
              <?php }?>
            </li>
            <li><?php echo $lang['sns_fansnum'].$lang['nc_colon'];?><?php echo $output['fan_count'];?></li>
            <li><?php echo $lang['sns_visits'].$lang['nc_colon'];?><?php echo $output['member_info']['member_snsvisitnum'];?></li>
          </ul>
        </dd>
      </dl>
      <ul class="sns-menu">
        <li <?php if($output['menu_sign'] == 'snshome'){ echo "class='active pngFix'";}else{ echo "class='normal pngFix'";}?>><a href="index.php?act=member_snshome&mid=<?php echo $output['member_info']['member_id'];?>"><?php echo $lang['sns_tab_goods'];?></a></li>
        <li <?php if($output['menu_sign'] == 'snsstore'){ echo "class='active pngFix'";}else{ echo "class='normal pngFix'";}?>><a href="index.php?act=member_snshome&op=storelist&mid=<?php echo $output['member_info']['member_id'];?>"><?php echo $lang['sns_tab_store'];?></a> </li>
        <li <?php if($output['menu_sign'] == 'snstrace'){ echo "class='active pngFix'";}else{ echo "class='normal pngFix'";}?>><a href="index.php?act=member_snshome&op=trace&mid=<?php echo $output['member_info']['member_id'];?>"><?php echo $lang['sns_tab_trace'];?></a> </li>
      </ul>
    </div>
    <div class="right-content">
      <div class="main">
        <?php
		require_once($tpl_file);
		?>
      </div>
    </div>
    <?php
} else {
	require_once($tpl_file);
}
?>
  </div>
</div>
<?php
require_once template('footer');
?>
</body>
</html>
