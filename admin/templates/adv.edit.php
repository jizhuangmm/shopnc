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
echo $lang['adv_change'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"adv_form\" enctype=\"multipart/form-data\" method=\"post\" name=\"advForm\">\r\n    <input type=\"hidden\" name=\"ref_url\" value=\"";
echo $output['ref_url'];
echo "\" />\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        ";
foreach ( $output['adv_list'] as $k => $v )
{
		echo "        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"adv_name\">";
		echo $lang['adv_name'];
		echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" name=\"adv_name\" id=\"adv_name\" class=\"txt\" value=\"";
		echo $v['adv_title'];
		echo "\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        ";
		foreach ( $output['ap_info'] as $ap_k => $ap_v )
		{
				if ( $v['ap_id'] == $ap_v['ap_id'] )
				{
						echo "        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
						echo $lang['adv_ap_id'];
						echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
						echo $ap_v['ap_name'];
						echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
						echo $lang['adv_class'];
						echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
						switch ( $ap_v['ap_class'] )
						{
						case "0" :
								echo $lang['adv_pic'];
								break;
						case "1" :
								echo $lang['adv_word'];
								break;
						case "2" :
								echo $lang['adv_slide'];
								break;
						case "3" :
								echo "Flash";
						}
						echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"adv_start_date\">";
						echo $lang['adv_start_time'];
						echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" name=\"adv_start_date\" id=\"adv_start_date\" class=\"txt date\" value=\"";
						echo date( "Y-m-d", $v['adv_start_date'] );
						echo "\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"adv_end_date\">";
						echo $lang['adv_end_time'];
						echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" name=\"adv_end_date\" id=\"adv_end_date\" class=\"txt date\" value=\"";
						echo date( "Y-m-d", $v['adv_end_date'] );
						echo "\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        ";
						switch ( $ap_v['ap_class'] )
						{
						case "0" :
								$pic_content = unserialize( $v['adv_content'] );
								$pic = $pic_content['adv_pic'];
								$url = $pic_content['adv_pic_url'];
								echo "        <tr id=\"adv_pic\" >\r\n          <input type=\"hidden\" name=\"mark\" value=\"0\">\r\n          <td colspan=\"2\" class=\"required\"><label for=\"file_adv_pic\">";
								echo $lang['adv_img_upload'];
								echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><span class=\"type-file-show\"><img class=\"show_image\" src=\"";
								echo TEMPLATES_PATH;
								echo "/images/preview.png\">\r\n            <div class=\"type-file-preview\"><img src=\"";
								echo SiteUrl."/".ATTACH_ADV."/".$pic;
								echo "\" onload=\"javascript:DrawImage(this,500,500);\"></div>\r\n            </span><span class=\"type-file-box\">\r\n            <input type=\"file\" class=\"type-file-file\" id=\"file_adv_pic\" name=\"adv_pic\" size=\"30\" />\r\n            </span>\r\n            <input type=\"hidden\" name=\"pic_ori\" value=\"";
								echo $pic;
								echo "\"></td>\r\n          <td class=\"vatop tips\">";
								echo $lang['adv_edit_support'];
								echo "gif,jpg,jpeg,png </td>\r\n        </tr>\r\n        <tr id=\"adv_pic_url\">\r\n          <td colspan=\"2\" class=\"required\"><label for=\"adv_pic_url\">";
								echo $lang['adv_url'];
								echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" id=\"adv_pic_url\" name=\"adv_pic_url\" value=\"";
								echo $url;
								echo "\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
								echo $lang['adv_url_donotadd'];
								echo "</td>\r\n        </tr>\r\n        ";
								break;
						case "1" :
								$word_content = unserialize( $v['adv_content'] );
								$word = $word_content['adv_word'];
								$url = $word_content['adv_word_url'];
								echo "        <tr id=\"adv_word\" >\r\n          <input type=\"hidden\" name=\"mark\" value=\"1\">\r\n          <td colspan=\"2\" class=\"required\"><label for=\"adv_word\">";
								echo $lang['adv_word_content'];
								echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" name=\"adv_word\" id=\"adv_word\" class=\"txt\" value=\"";
								echo $word;
								echo "\"></td>\r\n          <td class=\"vatop tips\">";
								echo $lang['adv_max'];
								echo $ap_v['ap_width'];
								echo $lang['adv_byte'];
								echo "            <input type=\"hidden\" name=\"adv_word_len\" value=\"";
								echo $ap_v['ap_width'];
								echo "\" ></td>\r\n        </tr>\r\n        <tr id=\"adv_word_url\">\r\n          <td colspan=\"2\" class=\"required\"><label for=\"adv_word_url\">";
								echo $lang['adv_url'];
								echo ":</label></td>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" name=\"adv_word_url\" class=\"txt\"  id=\"adv_word_url\" value=\"";
								echo $url;
								echo "\"></td>\r\n          <td class=\"vatop tips\">";
								echo $lang['adv_url_donotadd'];
								echo "            </label></td>\r\n        </tr>\r\n        ";
								break;
						case "2" :
								$pic_content = unserialize( $v['adv_content'] );
								$pic = $pic_content['adv_slide_pic'];
								$url = $pic_content['adv_slide_url'];
								echo "        <tr id=\"adv_slide_pic\" >\r\n          <input type=\"hidden\" name=\"mark\" value=\"2\">\r\n          <td colspan=\"2\" class=\"required\"><label class=\"file_adv_slide_pic\">";
								echo $lang['adv_slide_upload'];
								echo ":</label></td>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><span class=\"type-file-show\"><img class=\"show_image\" src=\"";
								echo TEMPLATES_PATH;
								echo "/images/preview.png\">\r\n            <div class=\"type-file-preview\"><img src=\"";
								echo SiteUrl."/".ATTACH_ADV."/".$pic;
								echo "\" onload=\"javascript:DrawImage(this,500,500);\"></div>\r\n            </span> <span class=\"type-file-box\">\r\n            <input type=\"file\" class=\"type-file-file\" id=\"file_adv_slide_pic\" name=\"adv_slide_pic\" size=\"30\" >\r\n            </span>\r\n            <input type=\"hidden\" name=\"pic_ori\" value=\"";
								echo $pic;
								echo "\"></td>\r\n          <td class=\"vatop tips\">";
								echo $lang['adv_edit_support'];
								echo "gif,jpg,jpeg,png </td>\r\n        </tr>\r\n        <tr id=\"adv_slide_url\">\r\n          <td colspan=\"2\" class=\"required\"><label for=\"adv_slide_url\">";
								echo $lang['adv_url'];
								echo ":</label></td>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" name=\"adv_slide_url\" id=\"adv_slide_url\" class=\"txt\" value=\"";
								echo $url;
								echo "\"></td>\r\n          <td class=\"vatop tips\">";
								echo $lang['adv_url_donotadd'];
								echo "</td>\r\n        </tr>\r\n        <tr id=\"adv_slide_sort\">\r\n          <td colspan=\"2\" class=\"required\"><label for=\"adv_slide_sort\">";
								echo $lang['adv_slide_sort'];
								echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" name=\"adv_slide_sort\" id=\"adv_slide_sort\" class=\"txt\" value=\"";
								echo $v['slide_sort'];
								echo "\"></td>\r\n          <td class=\"vatop tips\">";
								echo $lang['adv_slide_sort_role'];
								echo "</td>\r\n        </tr>\r\n        ";
								break;
						case "3" :
								$flash_content = unserialize( $v['adv_content'] );
								$flash = $flash_content['flash_swf'];
								$url = $flash_content['flash_url'];
								echo "        <tr id=\"adv_flash_swf\">\r\n          <input type=\"hidden\" name=\"mark\" value=\"3\">\r\n          <td colspan=\"2\" class=\"required\"><label class=\"file_flash_swf\">";
								echo $lang['adv_flash_upload'];
								echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><span class=\"type-file-box\">\r\n            <input type=\"file\" name=\"flash_swf\" class=\"type-file-file\" id=\"file_flash_swf\" size=\"30\"/>\r\n            </span></td>\r\n          <td class=\"vatop tips\">";
								echo $lang['adv_please_file_swf_file'];
								echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td><a href=\"http://";
								echo $url;
								echo "\" target='_blank'>\r\n            <button style=\"width:";
								echo $ap_v['ap_width'];
								echo "px; height:";
								echo $ap_v['ap_height'];
								echo "px; border:none; padding:0; background:none;\" disabled >\r\n            <object id=\"FlashID\" classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" width=\"";
								echo $ap_v['ap_width'];
								echo "\" height=\"";
								echo $ap_v['ap_height'];
								echo "\">\r\n              <param name=\"movie\" value=\"";
								echo SiteUrl."/".ATTACH_ADV."/".$flash;
								echo "\" />\r\n              <param name=\"quality\" value=\"high\" />\r\n              <param name=\"wmode\" value=\"opaque\" />\r\n              <param name=\"swfversion\" value=\"9.0.45.0\" />\r\n              <!-- 此 param 标签提示使用 Flash Player 6.0 r65 和更高版本的用户下载最新版本的 Flash Player。如果您不想让用户看到该提示，请将其删除。 -->\r\n              <param name=\"expressinstall\" value=\"";
								echo RESOURCE_PATH;
								echo "/js/expressInstall.swf\" />\r\n              <!-- 下一个对象标签用于非 IE 浏览器。所以使用 IECC 将其从 IE 隐藏。 -->\r\n              <object type=\"application/x-shockwave-flash\" data=\"";
								echo SiteUrl."/".ATTACH_ADV."/".$flash;
								echo "\" width=\"";
								echo $ap_v['ap_width'];
								echo "\" height=\"";
								echo $ap_v['ap_height'];
								echo "\">\r\n                <param name=\"quality\" value=\"high\" />\r\n                <param name=\"wmode\" value=\"opaque\" />\r\n                <param name=\"swfversion\" value=\"9.0.45.0\" />\r\n                <param name=\"expressinstall\" value=\"";
								echo RESOURCE_PATH;
								echo "/js/expressInstall.swf\" />\r\n                <!-- 浏览器将以下替代内容显示给使用 Flash Player 6.0 和更低版本的用户。 -->\r\n                <h4>此页面上的内容需要较新版本的 Adobe Flash Player。</h4>\r\n                <p><a href=\"http://www.adobe.com/go/getflashplayer\"><img src=\"http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif\" alt=\"获取 Adobe Flash Player\" width=\"112\" height=\"33\" /></a></p>\r\n              </object>\r\n            </object>\r\n            </button>\r\n            <input type=\"hidden\" name=\"flash_ori\" value=\"";
								echo $flash;
								echo "\">\r\n            </a> \r\n            <script type=\"text/javascript\">\r\n<!--\r\nswfobject.registerObject(\"FlashID\");\r\n//--></script></td>\r\n          <td></td>\r\n        </tr>\r\n        <tr id=\"adv_flash_url\">\r\n          <td colspan=\"2\" class=\"required\"><label for=\"flash_url\">";
								echo $lang['adv_url'];
								echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" name=\"flash_url\" id=\"flash_url\" class=\"txt\" value=\"";
								echo $url;
								echo "\"></td>\r\n          <td class=\"vatop tips\">";
								echo $lang['adv_url_donotadd'];
								echo "</td>\r\n        </tr>\r\n        ";
						}
						echo "        ";
				}
				echo "        ";
		}
		echo "        ";
}
echo "      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"15\"><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.advForm.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<link type=\"text/css\" rel=\"stylesheet\" href=\"";
echo RESOURCE_PATH."/js/jquery-ui/themes/ui-lightness/jquery.ui.css";
echo "\"/>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/jquery.ui.js\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/i18n/zh-CN.js\" charset=\"utf-8\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/swfobject_modified.js\" charset=\"utf-8\"></script> \r\n<script type=\"text/javascript\">\r\n\$(function(){\r\n    \$('#adv_start_date').datepicker({dateFormat: 'yy-mm-dd'});\r\n    \$('#adv_end_date').datepicker({dateFormat: 'yy-mm-dd'});\r\n});\r\n</script> \r\n<script type=\"text/javascript\">\r\n\$(function(){\r\n\tvar textButton=\"<input type='text' name='textfield' id='textfield1' class='type-file-text' /><input type='button' name='button' id='button1' value='' class='type-file-button' />\"\r\n    \$(textButton).insertBefore(\"#file_adv_pic\");\r\n    \$(\"#file_adv_pic\").change(function(){\r\n\t\$(\"#textfield1\").val(\$(\"#file_adv_pic\").val());\r\n    });\r\n\t\r\n\tvar textButton=\"<input type='text' name='textfield' id='textfield2' class='type-file-text' /><input type='button' name='button' id='button2' value='' class='type-file-button' />\"\r\n    \$(textButton).insertBefore(\"#file_adv_slide_pic\");\r\n    \$(\"#file_adv_slide_pic\").change(function(){\r\n\t\$(\"#textfield2\").val(\$(\"#file_adv_slide_pic\").val());\r\n    });\r\n\t\r\n\tvar textButton=\"<input type='text' name='textfield' id='textfield3' class='type-file-text' /><input type='button' name='button' id='button3' value='' class='type-file-button' />\"\r\n    \$(textButton).insertBefore(\"#file_flash_swf\");\r\n    \$(\"#file_flash_swf\").change(function(){\r\n\t\$(\"#textfield3\").val(\$(\"#file_flash_swf\").val());\r\n    });\r\n});\r\n</script>";
?>
