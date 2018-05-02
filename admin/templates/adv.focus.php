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
echo "\r\n\r\n<div class=\"page\">\r\n  <div class=\"fixed-bar\">\r\n    <div class=\"item-title\">\r\n      <h3>";
echo $lang['adv_index_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=adv&op=adv&type=normal\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"adv_form\" enctype=\"multipart/form-data\" method=\"post\" action=\"index.php\">\r\n    <input type=\"hidden\" name=\"act\" value=\"adv\"/>\r\n    <input type=\"hidden\" name=\"op\" value=\"updateFocus\"/>\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    ";
foreach ( $output['adv_list'] as $adv )
{
		echo "    <input type=\"hidden\" name=\"adv_id_";
		echo $adv['adv_id'];
		echo "\" value=\"";
		echo $adv['adv_id'];
		echo "\"/>\r\n    <input type=\"hidden\" name=\"old_pic_";
		echo $adv['adv_id'];
		echo "\" value=\"";
		echo $adv['adv_pic'];
		echo "\"/>\r\n    <table class=\"table tb-type2 nobdb\">\r\n      <tr>\r\n        <td colspan=\"2\" class=\"required\"><label for=\"adv_title_";
		echo $adv['adv_id'];
		echo "\">";
		echo $lang['adv_edit_desc'];
		echo ":</label></td>\r\n      </tr>\r\n      <tr class=\"noborder\">\r\n        <td class=\"vatop rowform\"><input type=\"text\" name=\"adv_title_";
		echo $adv['adv_id'];
		echo "\" id=\"adv_title_";
		echo $adv['adv_id'];
		echo "\" value=\"";
		echo $adv['adv_title'];
		echo "\" class=\"txt\"/></td>\r\n        <td class=\"vatop tips\">";
		echo $lang['adv_edit_desc_tip'];
		echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
		echo $lang['adv_focus_pic'];
		echo ":</label></td>\r\n      </tr>\r\n      <tr class=\"noborder\">\r\n        <td class=\"vatop rowform\"><input type=\"file\" name=\"adv_pic_";
		echo $adv['adv_id'];
		echo "\"/></td>\r\n        <td class=\"vatop tips\">";
		echo $lang['adv_edit_support'];
		echo "gif,jpg,jpeg,png;";
		echo $lang['adv_focus_r_size'];
		echo ":550px*270px<br>\r\n          ";
		echo $lang['adv_edit_remote'];
		echo "</td>\r\n      </tr>\r\n      ";
		if ( $adv['adv_pic'] != "" )
		{
				echo "      <tr class=\"noborder\">\r\n        <td colspan=\"2\"><img src=\"";
				echo SiteUrl."/".ATTACH_ADV."/".$adv['adv_pic'];
				echo "\" width=\"275\" height=\"135\"/></td>\r\n      </tr>\r\n      ";
		}
		echo "      <tr>\r\n        <td colspan=\"2\" class=\"required\"><label for=\"adv_url_";
		echo $adv['adv_id'];
		echo "\">";
		echo $lang['adv_edit_url'];
		echo ":</label></td>\r\n      </tr>\r\n      <tr class=\"noborder\">\r\n        <td class=\"vatop rowform\"><input type=\"text\" name=\"adv_url_";
		echo $adv['adv_id'];
		echo "\" id=\"adv_url_";
		echo $adv['adv_id'];
		echo "\" value=\"";
		echo $adv['adv_url'];
		echo "\" class=\"txt\"/></td>\r\n        <td class=\"vatop tips\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
		echo $lang['adv_edit_state'];
		echo ":</td>\r\n      </tr>\r\n      <tr class=\"noborder\">\r\n        <td class=\"vatop rowform\"><input type=\"radio\" name=\"adv_state_";
		echo $adv['adv_id'];
		echo "\" value=\"1\" ";
		if ( $adv['adv_state'] == "1" )
		{
				echo "checked";
		}
		echo "/>\r\n          ";
		echo $lang['adv_edit_open'];
		echo "          <input type=\"radio\" name=\"adv_state_";
		echo $adv['adv_id'];
		echo "\" value=\"0\" ";
		if ( $adv['adv_state'] == "0" )
		{
				echo "checked";
		}
		echo "/>\r\n          ";
		echo $lang['adv_edit_close'];
		echo "</td>\r\n        <td class=\"vatop tips\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"adv_sort_";
		echo $adv['adv_id'];
		echo "\">";
		echo $lang['nc_sort'];
		echo ":</label></td>\r\n      </tr>\r\n      <tr class=\"noborder\">\r\n        <td class=\"vatop rowform\"><input type=\"text\" name=\"adv_sort_";
		echo $adv['adv_id'];
		echo "\" id=\"adv_sort_";
		echo $adv['adv_id'];
		echo "\" value=\"";
		echo $adv['adv_sort'];
		echo "\" class=\"txt\"/></td>\r\n        <td class=\"vatop tips\">";
		echo $lang['adv_edit_sort_tip'];
		echo "</td>\r\n      </tr>\r\n    </table>\r\n    ";
}
echo "    <table class=\"table tb-type2 nobdb\">\r\n      <tbody>\r\n        <tr>\r\n          <td><input class=\"btn btn-green big\" name=\"submit\" value=\"";
echo $lang['adv_focus_update'];
echo "\" type=\"submit\"></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\">\r\n//<!CDATA[\r\n\$(function(){\r\n    \$('input[type=\"file\"]').change(function(){\r\n\t\t\tvar filepath=\$(this).val();\r\n\t\t\tvar extStart=filepath.lastIndexOf(\".\");\r\n\t\t\tvar ext=filepath.substring(extStart,filepath.length).toUpperCase();\t\t\r\n\t\t\tif(ext!=\".PNG\"&&ext!=\".GIF\"&&ext!=\".JPG\"&&ext!=\".JPEG\"){\r\n\t\t\t\talert(\"";
echo $lang['adv_edit_img_wrong'];
echo "\");\r\n\t\t\t\t\$(this).attr('value','');\r\n\t\t\t\treturn false;\r\n\t\t\t}\r\n    });\r\n});\r\n//]]>\r\n</script>";
?>
