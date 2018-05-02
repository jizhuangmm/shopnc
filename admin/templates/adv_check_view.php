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
echo "\r\n<div class=\"page\">\r\n  <div class=\"fixed-bar\">\r\n    <div class=\"item-title\">\r\n      <h3>";
echo $lang['adv_index_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=adv&op=adv\"><span>";
echo $lang['adv_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=adv&op=adv_check\"><span>";
echo $lang['adv_wait_check'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=adv&op=adv_add\"><span>";
echo $lang['adv_add'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=adv&op=ap_manage\"><span>";
echo $lang['ap_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=adv&op=ap_add\"><span>";
echo $lang['ap_add'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['check_adv_submit'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <table class=\"table tb-type2 nobdb\" id=\"main_table\">\r\n    <tbody>\r\n      <tr class=\"noborder\">\r\n        <td colspan=\"2\" class=\"required\"><label>";
echo $lang['adv_name'];
echo ":</label></td>\r\n      </tr>\r\n      <tr class=\"noborder\">\r\n        <td class=\"vatop rowform\">";
echo $output['adv_list']['adv_title'];
echo "</td>\r\n        <td class=\"vatop tips\"></td>\r\n      </tr>\r\n      <tr>\r\n        <td colspan=\"2\" class=\"required\"><label>";
echo $lang['adv_ap_id'];
echo ":</label></td>\r\n      </tr>\r\n      <tr class=\"noborder\">\r\n        <td class=\"vatop rowform\">";
echo $output['ap_info']['ap_name'];
echo "</td>\r\n        <td class=\"vatop tips\"></td>\r\n      </tr>\r\n      <tr>\r\n        <td colspan=\"2\" class=\"required\"><label>";
echo $lang['adv_class'];
echo ":</label></td>\r\n      </tr>\r\n      <tr class=\"noborder\">\r\n        <td class=\"vatop rowform\">";
switch ( $output['ap_info']['ap_class'] )
{
case "0" :
		echo $lang['adv_pic'];
		break;
case "1" :
		echo $lang['adv_word'];
		break;
case "2" :
		echo $lang['adv_slide'];
}
echo "</td>\r\n        <td class=\"vatop tips\"></td>\r\n      </tr>\r\n      <tr>\r\n        <td colspan=\"2\" class=\"required\"><label>";
echo $lang['adv_start_time'];
echo ":</label></td>\r\n      </tr>\r\n      <tr class=\"noborder\">\r\n        <td class=\"vatop rowform\">";
echo date( "Y-m-d", $output['adv_list']['adv_start_date'] );
echo "</td>\r\n        <td class=\"vatop tips\"></td>\r\n      </tr>\r\n      <tr>\r\n        <td colspan=\"2\" class=\"required\"><label>";
echo $lang['adv_end_time'];
echo ":</label></td>\r\n      </tr>\r\n      <tr class=\"noborder\">\r\n        <td class=\"vatop rowform\">";
echo date( "Y-m-d", $output['adv_list']['adv_end_date'] );
echo "</td>\r\n        <td class=\"vatop tips\"></td>\r\n      </tr>\r\n      ";
if ( $output['adv_list']['buy_style'] != "change" )
{
		$adv_content = $output['adv_list']['adv_content'];
}
else
{
		$cache_file = BasePath.DS."cache".DS."adv_change".DS."adv_".$output['adv_list']['adv_id'].".change.php";
		include( $cache_file );
		$adv_content = $content;
}
switch ( $output['ap_info']['ap_class'] )
{
case "0" :
		$pic_content = unserialize( $adv_content );
		$pic = $pic_content['adv_pic'];
		$url = $pic_content['adv_pic_url'];
		echo "      <tr>\r\n        <td><img src=\"";
		echo SiteUrl."/".ATTACH_ADV."/".$pic;
		echo "\" width=\"";
		echo 500 < $output['ap_info']['ap_width'] ? 500 : $output['ap_info']['ap_width'];
		echo "\"/>\r\n          <input type=\"hidden\" name=\"pic_ori\" value=\"";
		echo $pic;
		echo "\"></td>\r\n        <td></td>\r\n      </tr>\r\n      <tr id=\"adv_pic_url\">\r\n        <td colspan=\"2\" class=\"required\">";
		echo $lang['adv_url'];
		echo ":</td>\r\n      </tr>\r\n      <tr class=\"noborder\">\r\n        <td class=\"vatop rowform\">";
		echo $url;
		echo "</td>\r\n        <td class=\"vatop tips\"></td>\r\n      </tr>\r\n      ";
		break;
case "1" :
		$word_content = unserialize( $adv_content );
		$word = $word_content['adv_word'];
		$url = $word_content['adv_word_url'];
		echo "      <tr id=\"adv_word\">\r\n        <td colspan=\"2\" class=\"required\">";
		echo $lang['adv_word_content'];
		echo ":</td>\r\n      </tr>\r\n      <tr class=\"noborder\">\r\n        <td class=\"vatop rowform\">";
		echo $word;
		echo "</td>\r\n        <td class=\"vatop tips\"></td>\r\n      </tr>\r\n      <tr id=\"adv_word_url\">\r\n        <td colspan=\"2\" class=\"required\">";
		echo $lang['adv_url'];
		echo ":</td>\r\n      </tr>\r\n      <tr class=\"noborder\">\r\n        <td class=\"vatop rowform\"><label>";
		echo $url;
		echo "</label></td>\r\n        <td class=\"vatop tips\"></td>\r\n      </tr>\r\n      ";
		break;
case "2" :
		$pic_content = unserialize( $adv_content );
		$pic = $pic_content['adv_slide_pic'];
		$url = $pic_content['adv_slide_url'];
		echo "      <tr>\r\n        <td class=\"vatop rowform\"><img src=\"";
		echo SiteUrl."/".ATTACH_ADV."/".$pic;
		echo "\" width=\"";
		echo 500 < $output['ap_info']['ap_width'] ? 500 : $output['ap_info']['ap_width'];
		echo "\"/>\r\n          <input type=\"hidden\" name=\"pic_ori\" value=\"";
		echo $pic;
		echo "\"></td>\r\n        <td class=\"vatop tips\"></td>\r\n      </tr>\r\n      <tr id=\"adv_slide_url\">\r\n        <td colspan=\"2\" class=\"required\">";
		echo $lang['adv_url'];
		echo ":</td>\r\n      </tr>\r\n      <tr class=\"noborder\">\r\n        <td class=\"vatop rowform\">";
		echo $url;
		echo "</td>\r\n        <td class=\"vatop tips\"></td>\r\n      </tr>\r\n      ";
		break;
case "3" :
		$flash_content = unserialize( $adv_content );
		$flash = $flash_content['flash_swf'];
		$url = $flash_content['flash_url'];
		echo "      <tr id=\"adv_flash_swf\">\r\n        <td colspan=\"2\" class=\"required\"><label>";
		echo $lang['adv_flash_upload'];
		echo ":</label></td>\r\n      </tr>\r\n      <tr class=\"noborder\">\r\n        <td class=\"vatop rowform\"><input type=\"file\" name=\"flash_swf\" /></td>\r\n        <td class=\"vatop tips\">";
		echo $lang['adv_please_upload_swf_file'];
		echo "</td>\r\n      </tr>\r\n      <tr>\r\n        <td class=\"vatop rowform\"><input type=\"hidden\" name=\"flash_ori\" value=\"";
		echo $flash;
		echo "\">\r\n          <object id=\"FlashID\" classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" width=\"";
		echo $ap_v['ap_width'];
		echo "\" height=\"";
		echo $output['ap_info']['ap_height'];
		echo "\">\r\n            <param name=\"movie\" value=\"";
		echo SiteUrl."/".ATTACH_ADV."/".$flash;
		echo "\" />\r\n            <param name=\"quality\" value=\"high\" />\r\n            <param name=\"wmode\" value=\"opaque\" />\r\n            <param name=\"swfversion\" value=\"9.0.45.0\" />\r\n            <!-- 此 param 标签提示使用 Flash Player 6.0 r65 和更高版本的用户下载最新版本的 Flash Player。如果您不想让用户看到该提示，请将其删除。 -->\r\n            <param name=\"expressinstall\" value=\"";
		echo RESOURCE_PATH;
		echo "/js/expressInstall.swf\" />\r\n            <!-- 下一个对象标签用于非 IE 浏览器。所以使用 IECC 将其从 IE 隐藏。 --> \r\n            <!--[if !IE]>-->\r\n            <object type=\"application/x-shockwave-flash\" data=\"";
		echo SiteUrl."/".ATTACH_ADV."/".$flash;
		echo "\" width=\"";
		echo $output['ap_info']['ap_width'];
		echo "\" height=\"";
		echo $output['ap_info']['ap_height'];
		echo "\">\r\n              <!--<![endif]-->\r\n              <param name=\"quality\" value=\"high\" />\r\n              <param name=\"wmode\" value=\"opaque\" />\r\n              <param name=\"swfversion\" value=\"9.0.45.0\" />\r\n              <param name=\"expressinstall\" value=\"";
		echo RESOURCE_PATH;
		echo "/js/expressInstall.swf\" />\r\n              <!-- 浏览器将以下替代内容显示给使用 Flash Player 6.0 和更低版本的用户。 -->\r\n              <div>\r\n                <h4>此页面上的内容需要较新版本的 Adobe Flash Player。</h4>\r\n                <p><a href=\"http://www.adobe.com/go/getflashplayer\"><img src=\"http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif\" alt=\"获取 Adobe Flash Player\" width=\"112\" height=\"33\" /></a></p>\r\n              </div>\r\n              <!--[if !IE]>-->\r\n            </object>\r\n            <!--<![endif]-->\r\n          </object>\r\n          <script type=\"text/javascript\">\r\n<!--\r\nswfobject.registerObject(\"FlashID\");\r\n//-->\r\n</script></td>\r\n        <td class=\"vatop tips\"></td>\r\n      </tr>\r\n      <tr id=\"adv_flash_url\">\r\n        <td colspan=\"2\" class=\"required\">";
		echo $lang['adv_url'];
		echo ":</td>\r\n      </tr>\r\n      <tr class=\"noborder\">\r\n        <td class=\"vatop rowform\"><input type=\"text\" name=\"flash_url\" class=\"txt\" value=\"";
		echo $url;
		echo "\"></td>\r\n        <td class=\"vatop tips\">";
		echo $lang['adv_url_donotadd'];
		echo "</td>\r\n      </tr>\r\n      ";
}
echo "    </tbody>\r\n    <tfoot>\r\n      <tr class=\"tfoot\">\r\n        <td colspan=\"15\"><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\" onclick=window.location.href='index.php?act=adv&op=adv_check&savecheck=yes&ap_id=";
echo $output['adv_list']['ap_id'];
echo "&adv_id=";
echo $output['adv_list']['adv_id'];
echo "'><span>";
echo $lang['check_adv_yes'];
echo "</span></a> <a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\" onclick=window.location.href='index.php?act=adv&op=adv_check&savecheck=no&adv_id=";
echo $output['adv_list']['adv_id'];
echo "'><span>";
echo $lang['check_adv_no'];
echo "</span></a>\r\n      </tr>\r\n    </tfoot>\r\n  </table>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/swfobject_modified.js\"></script> \r\n";
?>
