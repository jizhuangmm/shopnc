<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

echo "<div class=\"page\">\r\n<div class=\"fixed-bar\">\r\n  <div class=\"item-title\">\r\n    <h3>";
echo $lang['adv_index_manage'];
echo "</h3>\r\n    <ul class=\"tab-base\">\r\n      <li><a href=\"index.php?act=adv&op=adv\" ><span>";
echo $lang['adv_manage'];
echo "</span></a></li>\r\n      <li><a href=\"index.php?act=adv&op=adv_check\" ><span>";
echo $lang['adv_wait_check'];
echo "</span></a></li>\r\n      <li><a href=\"index.php?act=adv&op=adv_add\" ><span>";
echo $lang['adv_add'];
echo "</span></a></li>\r\n      <li><a href=\"index.php?act=adv&op=ap_manage\" ><span>";
echo $lang['ap_manage'];
echo "</span></a></li>\r\n      <li><a href=\"index.php?act=adv&op=ap_add\" ><span>";
echo $lang['ap_add'];
echo "</span></a></li>\r\n      <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['check_adv_chart'];
echo "</span></a></li>\r\n    </ul>\r\n  </div>\r\n</div>\r\n<div class=\"fixed-empty\"></div>\r\n<form method=\"post\" action=\"index.php?act=adv&op=click_chart\" name=\"formSearch\">\r\n<input type=\"hidden\" name=\"formsubmit\" value=\"ok\" />\r\n<table class=\"tb-type1 noborder search\">\r\n  <tr>\r\n    <td>\r\n      ";
echo "“".$output['adv_title']."”".$output['year'];
echo $lang['adv_chart_years_chart'];
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ";
echo $lang['adv_chart_searchyear_input'];
echo "</td>\r\n    <td><input class=\"queryInput\" type=\"text\" name=\"year\" /></td>\r\n    <td>";
echo $lang['adv_chart_year'];
echo "</td>\r\n    <td><input type=\"hidden\" name=\"adv_id\" value=\"";
echo $output['adv_id'];
echo "\" />\r\n      ";
echo $lang['adv_search_to'];
echo "&nbsp;\r\n      <input class=\"txt date\" type=\"text\" id=\"add_time_to\" name=\"add_time_to\" value=\"";
echo $_GET['add_time_to'];
echo "\"/></td>\r\n    <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a></td>\r\n  </tr>\r\n</table>\r\n<div class=\"tdare\">\r\n  <object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" width=\"550\" height=\"450\" id=\"adv\">\r\n    <param name=\"movie\" value=\"";
echo SiteUrl;
echo "/resource/clickswf/adv.swf\" />\r\n    <param name=\"quality\" value=\"high\" />\r\n    <param name=\"bgcolor\" value=\"#ffffff\" />\r\n    <param name=\"allowScriptAccess\" value=\"sameDomain\" />\r\n    <param name=\"allowFullScreen\" value=\"true\" />\r\n    <!--[if !IE]>-->\r\n    <object type=\"application/x-shockwave-flash\" data=\"";
echo SiteUrl;
echo "/resource/clickswf/adv.swf\" width=\"550\" height=\"450\">\r\n      <param name=\"quality\" value=\"high\" />\r\n      <param name=\"bgcolor\" value=\"#ffffff\" />\r\n      <param name=\"allowScriptAccess\" value=\"sameDomain\" />\r\n      <param name=\"allowFullScreen\" value=\"true\" />\r\n      <!--<![endif]--> \r\n      <!--[if gte IE 6]>-->\r\n      <p> Either scripts and active content are not permitted to run or Adobe Flash Player version\r\n        10.0.0 or greater is not installed. </p>\r\n      <!--<![endif]--> \r\n      <a href=\"http://www.adobe.com/go/getflashplayer\"> <img src=\"http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif\" alt=\"Get Adobe Flash Player\" /> </a> \r\n      <!--[if !IE]>-->\r\n    </object>\r\n    <!--<![endif]-->\r\n  </object>\r\n</div>\r\n";
?>
