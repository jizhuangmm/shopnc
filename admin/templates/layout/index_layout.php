<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

if ( !defined( "InShopNC" ) )
{
		exit( "Access Invalid!" );
}
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\" >\r\n<head>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html;\" charset=\"";
echo CHARSET;
echo "\">\r\n<title>";
echo $output['html_title'];
echo "</title>\r\n<link href=\"";
echo TEMPLATES_PATH;
echo "/css/skin_0.css\" rel=\"stylesheet\" type=\"text/css\" id=\"cssfile\"/>\r\n<script type=\"text/javascript\" SRC=\"";
echo RESOURCE_PATH;
echo "/js/jquery.js\"></script>\r\n<!--[if IE]>\r\n<script src=\"";
echo RESOURCE_PATH;
echo "/js/html5.js\"></script>\r\n<![endif]-->\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.validation.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.cookie.js\"></script>\r\n<script>\r\n//\r\n\$(document).ready(function () {\r\n    \$('span.bar-btn').click(function () {\r\n\t\$('ul.bar-list').toggle('fast');\r\n    });\r\n});\r\n\r\n\$(document).ready(function(){\r\n\tvar pagestyle = function() {\r\n\t\tvar iframe = \$(\"#workspace\");\r\n\t\tvar h = \$(window).height() - iframe.offset().top;\r\n\t\tvar w = \$(window).width() - iframe.offset().left;\r\n\t\tif(h < 300) h = 300;\r\n\t\tif(w < 973) w = 973;\r\n\t\tiframe.height(h);\r\n\t\tiframe.width(w);\r\n\t}\r\n\tpagestyle();\r\n\t\$(window).resize(pagestyle);\r\n\t//turn location\r\n\tif(\$.cookie('now_location_act') != null){\r\n\t\topenItem(\$.cookie('now_location_op')+','+\$.cookie('now_location_act')+','+\$.cookie('now_location_nav'));\r\n\t}else{\r\n\t\t\$('#mainMenu>ul').first().css('display','block');\r\n\t\t//第一次进入后台时，默认定到欢迎界面\r\n\t\t\$('#item_welcome').addClass('selected');\t\t\t\r\n\t\t\$('#workspace').attr('src','index.php?act=dashboard&op=welcome');\r\n\t}\r\n\r\n//\t\$('#clear_cache').click(function(){\r\n//\t\t\$.ajax({\r\n//\t\t\ttype: \"GET\",\r\n//\t\t\turl: \"index.php?act=index&op=clear_cache\",\r\n//\t\t\tsuccess: function(msg){\r\n//\t\t\t\talert( \"";
echo $lang['nc_update_cache_succ'];
echo "\" );\r\n//\t\t\t},\r\n//\t\t\terror :function(){\r\n//\t\t\t\talert( \"";
echo $lang['nc_update_cache_again'];
echo "\" );\r\n//\t\t\t}\r\n//\t\t});\r\n//\t});\r\n\t\$('#iframe_refresh').click(function(){\r\n\t\tvar fr = document.frames ? document.frames(\"workspace\") : document.getElementById(\"workspace\").contentWindow;;\r\n\t\tfr.location.reload();\r\n\t});\r\n\r\n});\r\n//收藏夹\r\nfunction addBookmark(url, label) {\r\n    if (document.all)\r\n    {\r\n        window.external.addFavorite(url, label);\r\n    }\r\n    else if (window.sidebar)\r\n    {\r\n        window.sidebar.addPanel(label, url, '');\r\n    }\r\n}\r\n\r\n\r\nfunction openItem(args){\r\n\t//cookie\r\n\t\r\n\tif(\$.cookie('";
echo COOKIE_PRE;
echo "sys_key') === null){\r\n\t\tlocation.href = 'index.php?act=login&op=login';\r\n\t\treturn false;\r\n\t}\r\n\r\n\tspl = args.split(',');\r\n\top  = spl[0];\r\n\ttry {\r\n\t\tact = spl[1];\r\n\t\tnav = spl[2];\r\n\t}\r\n\tcatch(ex){}\r\n\tif (typeof(act)=='undefined'){var nav = args;}\r\n\t\$('.actived').removeClass('actived');\r\n\t\$('#nav_'+nav).addClass('actived');\r\n\r\n\t\$('.selected').removeClass('selected');\t\r\n\r\n\t//show\r\n\t\$('#mainMenu ul').css('display','none');\r\n\t\$('#sort_'+nav).css('display','block');\t\r\n\r\n\tif (typeof(act)=='undefined'){\r\n\t\t//顶部菜单事件\r\n\t\thtml = \$('#sort_'+nav+'>li>dl>dd>ol>li').first().html();\r\n\t\tstr = html.match(/openItem\\('(.*)'\\)/ig);\r\n\t\targ = str[0].split(\"'\");\r\n\t\tspl = arg[1].split(',');\r\n\t\top  = spl[0];\r\n\t\tact = spl[1];\r\n\t\tnav = spl[2];\r\n\t\tfirst_obj = \$('#sort_'+nav+'>li>dl>dd>ol>li').first().children('a');\r\n\t\t\$(first_obj).addClass('selected');\t\t\r\n\t\t//crumbs\r\n\t\t\$('#crumbs').html('<span>'+\$('#nav_'+nav+' > span').html()+'</span><span class=\"arrow\">&nbsp;</span><span>'+\$(first_obj).text()+'</span>');\t\t\r\n\t}else{\r\n\t\t//左侧菜单事件\r\n\t\t//location\r\n\t\t\$.cookie('now_location_nav',nav);\r\n\t\t\$.cookie('now_location_act',act);\r\n\t\t\$.cookie('now_location_op',op);\r\n//\t\t\$(\"#item_\"+op).addClass('selected');//使用name，不使用ID，因为ID有重复的\r\n\t\t\$(\"a[name='item_\"+op+\"']\").addClass('selected');\r\n\t\t//crumbs\r\n\t\t\$('#crumbs').html('<span>'+\$('#nav_'+nav+' > span').html()+'</span><span class=\"arrow\">&nbsp;</span><span>'+\$('#item_'+op).html()+'</span>');\r\n\t}\r\n\r\n\tsrc = 'index.php?act='+act+'&op='+op;\r\n\t\$('#workspace').attr('src',src);\r\n\r\n}\r\n\r\n\$(function(){\r\n\t\tbindAdminMenu();\r\n\t\t})\r\n\t\tfunction bindAdminMenu(){\r\n\t\t\r\n\t\t/*\$(\"#mainMenu\").find(\"ul\").find(\"li\").find(\"dl\").find(\"dt\").click(function(){\r\n\t\t\tdt = \$(this);\r\n\t\t\tdd = \$(this).next(\"dd\");\r\n\t\t\tif(dd.css(\"display\")==\"none\"){\r\n\t\t\t\tdd.slideDown(\"fast\");\r\n\t\t\t\tdt.css(\"background-position\",\"-322px -170px\");\r\n\t\t\t}else{\r\n\t\t\t\tdd.slideUp(\"fast\");\r\n\t\t\t\tdt.css(\"background-position\",\"-483px -170px\");\r\n\t\t\t}\r\n\t\t});*/\r\n\t\r\n\t\t\$(\"[nc_type='parentli']\").click(function(){\r\n\t\t\tvar key = \$(this).attr('dataparam');\r\n\t\t\tif(\$(this).find(\"dd\").css(\"display\")==\"none\"){\r\n\t\t\t\t\$(\"[nc_type='\"+key+\"']\").slideDown(\"fast\");\r\n\t\t\t\t\$(this).find('dt').css(\"background-position\",\"-322px -170px\");\r\n\t\t\t\t\$(this).find(\"dd\").show();\r\n\t\t\t}else{\r\n\t\t\t\t\$(\"[nc_type='\"+key+\"']\").slideUp(\"fast\");\r\n\t\t\t\t\$(this).find('dt').css(\"background-position\",\"-483px -170px\");\r\n\t\t\t\t\$(this).find(\"dd\").hide();\r\n\t\t\t}\r\n\t\t});\r\n\t}\r\n</script>\r\n<script type=\"text/javascript\"> \r\n//显示灰色JS遮罩层 \r\nfunction showBg(ct,content){ \r\nvar bH=\$(\"body\").height(); \r\nvar bW=\$(\"body\").width(); \r\nvar objWH=getObjWh(ct); \r\n\$(\"#pagemask\").css({width:bW,height:bH,display:\"none\"}); \r\nvar tbT=objWH.split(\"|\")[0]+\"px\"; \r\nvar tbL=objWH.split(\"|\")[1]+\"px\"; \r\n\$(\"#\"+ct).css({top:tbT,left:tbL,display:\"block\"}); \r\n\$(window).scroll(function(){resetBg()}); \r\n\$(window).resize(function(){resetBg()}); \r\n} \r\nfunction getObjWh(obj){ \r\nvar st=document.documentElement.scrollTop;//滚动条距顶部的距离 \r\nvar sl=document.documentElement.scrollLeft;//滚动条距左边的距离 \r\nvar ch=document.documentElement.clientHeight;//屏幕的高度 \r\nvar cw=document.documentElement.clientWidth;//屏幕的宽度 \r\nvar objH=\$(\"#\"+obj).height();//浮动对象的高度 \r\nvar objW=\$(\"#\"+obj).width();//浮动对象的宽度 \r\nvar objT=Number(st)+(Number(ch)-Number(objH))/2; \r\nvar objL=Number(sl)+(Number(cw)-Number(objW))/2; \r\nreturn objT+\"|\"+objL; \r\n} \r\nfunction resetBg(){ \r\nvar fullbg=\$(\"#pagemask\").css(\"display\"); \r\nif(fullbg==\"block\"){ \r\nvar bH2=\$(\"body\").height(); \r\nvar bW2=\$(\"body\").width(); \r\n\$(\"#pagemask\").css({width:bW2,height:bH2}); \r\nvar objV=getObjWh(\"dialog\"); \r\nvar tbT=objV.split(\"|\")[0]+\"px\"; \r\nvar tbL=objV.split(\"|\")[1]+\"px\"; \r\n\$(\"#dialog\").css({top:tbT,left:tbL}); \r\n} \r\n} \r\n\r\n//关闭灰色JS遮罩层和操作窗口 \r\nfunction closeBg(){ \r\n\$(\"#pagemask\").css(\"display\",\"none\"); \r\n\$(\"#dialog\").css(\"display\",\"none\"); \r\n} \r\n</script>\r\n<script type=\"text/javascript\"> \r\n\$(function(){   \r\n    var \$li =\$(\"#skin li\");   \r\n\t\t\$li.click(function(){   \r\n\t\t\$(\"#\"+this.id).addClass(\"selected\").siblings().removeClass(\"selected\");\r\n\t\t\$(\"#cssfile\").attr(\"href\",\"";
echo TEMPLATES_PATH;
echo "/css/\"+ (this.id) +\".css\");   \r\n        \$.cookie( \"MyCssSkin\" ,  this.id , { path: '/', expires: 10 });  \r\n\r\n        \$('iframe').contents().find('#cssfile2').attr(\"href\",\"";
echo TEMPLATES_PATH;
echo "/css/\"+ (this.id) +\".css\"); \r\n    });   \r\n\r\n    var cookie_skin = \$.cookie( \"MyCssSkin\");   \r\n    if (cookie_skin) {   \r\n\t\t\$(\"#\"+cookie_skin).addClass(\"selected\").siblings().removeClass(\"selected\");\r\n\t\t\$(\"#cssfile\").attr(\"href\",\"";
echo TEMPLATES_PATH;
echo "/css/\"+ cookie_skin +\".css\"); \r\n\t\t\$.cookie( \"MyCssSkin\" ,  cookie_skin  , { path: '/', expires: 10 }); \r\n    }   \r\n});\r\n</script>\r\n\r\n</head>\r\n\r\n<body style=\"margin: 0px;\" scroll=\"no\">\r\n<div id=\"pagemask\"></div>\r\n<div id=\"dialog\" style=\"display:none\">\r\n  <div class=\"title\">\r\n    <h3>";
echo $lang['nc_admin_navigation'];
echo "</h3>\r\n    <span><a href=\"JavaScript:void(0);\" onclick=\"closeBg();\">";
echo $lang['nc_close'];
echo "</a></span> </div>\r\n  <div class=\"content\">\r\n  ";
foreach ( $output['map_nav'] as $k => $v )
{
		echo "  <dl>\t\r\n  <dt>";
		echo $v['text'];
		echo "</dt>\r\n  \t";
		foreach ( $v['list'] as $key => $value )
		{
				echo "  \t<dd><a href=\"javascript:void(0)\" onclick=\"openItem('";
				echo $value['args'];
				echo "')\">";
				echo $value['text'];
				echo "</a></dd>\r\n  \t";
		}
		echo "  \t </dl>\r\n  ";
}
echo "  </div>\r\n</div>\r\n<table style=\"width: 100%;\" id=\"frametable\" height=\"100%\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\r\n  <tbody>\r\n    <tr>\r\n      <td colspan=\"2\" height=\"90\" class=\"mainhd\"><div class=\"layout-header\"> <!-- Title/Logo - can use text instead of image -->\r\n          <div id=\"title\"><a href=\"index.php\"></a></div>\r\n          <!-- Top navigation -->\r\n          <div id=\"topnav\" class=\"top-nav\">\r\n            <ul>\r\n              <li class=\"adminid\" title=\"";
echo $lang['nc_hello'];
echo ":";
echo $output['admin_info']['name'];
echo "\">";
echo $lang['nc_hello'];
echo "&nbsp;:&nbsp;<strong>";
echo $output['admin_info']['name'];
echo "</strong></li>\r\n              <li><a href=\"index.php?act=index&op=modifypw\" target=\"workspace\" ><span>";
echo $lang['nc_modifypw'];
echo "</span></a></li>\r\n              <li><a href=\"index.php?act=index&op=logout\" title=\"";
echo $lang['nc_logout'];
echo "\"><span>";
echo $lang['nc_logout'];
echo "</span></a></li>\r\n              <li><a href=\"";
echo SiteUrl;
echo "\" target=\"_blank\" title=\"";
echo $lang['nc_homepage'];
echo "\"><span>";
echo $lang['nc_homepage'];
echo "</span></a></li>\r\n            </ul>\r\n          </div>\r\n          <!-- End of Top navigation --> \r\n          <!-- Main navigation -->\r\n          <nav id=\"nav\" class=\"main-nav\">\r\n            <ul>\r\n           ";
echo $output['top_nav'];
echo "            </ul>\r\n          </nav>\r\n          <div class=\"loca\"><strong>";
echo $lang['nc_loca'];
echo ":</strong>\r\n            <div id=\"crumbs\" class=\"crumbs\"><span>";
echo $lang['nc_console'];
echo "</span><span class=\"arrow\">&nbsp;</span><span>";
echo $lang['nc_welcome_page'];
echo "</span> </div>\r\n          </div>\r\n          <div class=\"toolbar\">\r\n            <ul id=\"skin\" class=\"skin\"><span>";
echo $lang['nc_skin_peeler'];
echo "</span>\r\n              <li id=\"skin_0\" class=\"\" title=\"";
echo $lang['nc_default_style'];
echo "\"></li>\r\n              <li id=\"skin_1\" class=\"\" title=\"";
echo $lang['nc_mac_style'];
echo "\"></li>\r\n            </ul>\r\n            <div class=\"sitemap\"><a id=\"siteMapBtn\" href=\"#rhis\" onclick=\"showBg('dialog','dialog_content');\"><span>";
echo $lang['nc_sitemap'];
echo "</span></a></div>\r\n            <div class=\"toolmenu\"><span class=\"bar-btn\"></span>\r\n              <ul class=\"bar-list\">\r\n                <li><a onclick=\"openItem('clear,cache,setting');\" href=\"javascript:void(0)\">";
echo $lang['nc_update_cache'];
echo "</a></li>\r\n                <li><a href=\"";
echo SiteUrl.DS.ProjectName.DS;
echo "\" id=\"iframe_refresh\">";
echo $lang['nc_refresh'];
echo $lang['nc_admincp'];
echo "</a></li>\r\n                <li><a href=\"JavaScript:void(0);\" onclick=\"openItem('db,db,website');\">";
echo $lang['nc_backup_db'];
echo "</a></li>\r\n                <li><a href=\"index.php?act=updatestat&op=index\" target=\"workspace\" >";
echo $lang['nc_updatestat_qk'];
echo "</a></li>\r\n                <li><a href=\"";
echo SiteUrl.DS.ProjectName.DS;
echo "\" title=\"";
echo $lang['nc_admincp'];
echo "-";
echo $output['html_title'];
echo "\" rel=\"sidebar\" onclick=\"javascript:window.external.AddFavorite('";
echo SiteUrl.DS.ProjectName.DS;
echo "', '";
echo $lang['nc_admincp'];
echo "-";
echo $output['html_title'];
echo "');return false;\">";
echo $lang['nc_favorite'];
echo $lang['nc_admincp'];
echo "</a></li>\r\n              </ul>\r\n            </div>\r\n          </div>\r\n        </div>\r\n        <div > </div></td>\r\n    </tr>\r\n    <tr>\r\n      <td class=\"menutd\" valign=\"top\" width=\"161\"><div id=\"mainMenu\" class=\"main-menu\">\r\n          ";
echo $output['left_nav'];
echo "        </div><div class=\"copyright\">\r\n        <p>Powered By <em><a href=\"http://www.shopnc.net/product/\" target=\"_blank\"><font class=\"blue\">Shop</font><font class=\"orange\">NC</font></a><sup>V2.3</sup></em></p>\r\n        <p>&copy;2007-2013 <a href=\"http://www.shopnc.net/\" target=\"_blank\">ShopNC Inc.</a></p></div></td>\r\n      <td valign=\"top\" width=\"100%\"><iframe src=\"\" id=\"workspace\" name=\"workspace\" style=\"overflow: visible;\" frameborder=\"0\" width=\"100%\" height=\"100%\" scrolling=\"yes\" onload=\"window.parent\"></iframe></td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n</body>\r\n</html>\r\n";
?>
