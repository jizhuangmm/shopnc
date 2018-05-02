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
echo $lang['upload_set'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['upload_pic_base'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=font_setting\"><span>";
echo $lang['font_set'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=base_setting\"><span>";
echo $lang['upload_set_base'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=ftp_setting\"><span>";
echo $lang['upload_set_ftp'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"form\" method=\"post\" enctype=\"multipart/form-data\" name=\"settingForm\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label for=\"site_name\">";
echo $lang['image_dir_type'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><ul class=\"nofloat\">\r\n              <li>\r\n                <input id=\"image_dir_type_0\" name=\"image_dir_type\" type=\"radio\" style=\"margin-bottom:6px;\" value=\"1\"";
echo $output['list_setting']['image_dir_type'] == "1" ? " checked=\"checked\"" : "";
echo "/>\r\n                <label for=\"image_dir_type_0\">";
echo $lang['image_dir_type_0'];
echo "</label>\r\n              </li>\r\n              <li>\r\n                <input id=\"image_dir_type_1\" name=\"image_dir_type\" type=\"radio\" style=\"margin-bottom:6px;\" value=\"2\"";
echo $output['list_setting']['image_dir_type'] == "2" ? " checked=\"checked\"" : "";
echo "/>\r\n                <label for=\"image_dir_type_1\">";
echo $lang['image_dir_type_1'];
echo "</label>\r\n              </li>\r\n              <li>\r\n                <input id=\"image_dir_type_2\" name=\"image_dir_type\" type=\"radio\" style=\"margin-bottom:6px;\" value=\"3\"";
echo $output['list_setting']['image_dir_type'] == "3" ? " checked=\"checked\"" : "";
echo "/>\r\n                <label for=\"image_dir_type_2\">";
echo $lang['image_dir_type_2'];
echo "</label>\r\n              </li>\r\n              <li>\r\n                <input id=\"image_dir_type_3\" name=\"image_dir_type\" type=\"radio\" style=\"margin-bottom:6px;\" value=\"4\"";
echo $output['list_setting']['image_dir_type'] == "4" ? " checked=\"checked\"" : "";
echo "/>\r\n                <label for=\"image_dir_type_3\">";
echo $lang['image_dir_type_3'];
echo "</label>\r\n              </li>\r\n            </ul></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n\t\t<tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"image_max_filesize\">";
echo $lang['upload_image_filesize'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $lang['upload_image_file_size'];
echo ":\r\n            <input id=\"image_max_filesize\" name=\"image_max_filesize\" type=\"text\" class=\"txt\" style=\"width:30px;\" value=\"";
echo $output['list_setting']['image_max_filesize'] ? $output['list_setting']['image_max_filesize'] : "1024";
echo "\"/>\r\n            KB&nbsp;(1024 KB = 1MB)</td>\r\n          <td class=\"vatop tips\">";
echo $lang['image_max_size_tips'];
echo "</td>\r\n        </tr>\r\n\t\t<tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"image_allow_ext\">";
echo $lang['image_allow_ext'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input id=\"image_allow_ext\" name=\"image_allow_ext\" value=\"";
echo $output['list_setting']['image_allow_ext'] ? $output['list_setting']['image_allow_ext'] : "gif,jpeg,jpg,bmp,png,swf,tbi";
echo "\" class=\"txt\" type=\"text\" /></td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['image_allow_ext_notice'];
echo "</span></td>\r\n        </tr>\r\n\t\t<tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"thumb_tiny_width\">";
echo $lang['upload_goods_image_size_tiny'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $lang['image_width'];
echo ":\r\n            <input id=\"thumb_tiny_width\" name=\"thumb_tiny_width\" type=\"text\" class=\"txt\" style=\"width:30px;\" value=\"";
echo $output['list_setting']['thumb_tiny_width'] ? $output['list_setting']['thumb_tiny_width'] : "60";
echo "\"/>\r\n            px&nbsp;&nbsp;&nbsp;&nbsp;";
echo $lang['image_height'];
echo ":\r\n            <input name=\"thumb_tiny_height\" type=\"text\" class=\"txt\" style=\"width:30px;\" value=\"";
echo $output['list_setting']['thumb_tiny_height'] ? $output['list_setting']['thumb_tiny_height'] : "60";
echo "\"/>\r\n            px </td>\r\n          <td class=\"vatop tips\">";
echo $lang['upload_goods_image_size_tiny_tips'];
echo "</td>\r\n        </tr>\r\n\t\t<tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"thumb_small_width\">";
echo $lang['upload_goods_image_size_small'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $lang['image_width'];
echo ":\r\n            <input id=\"thumb_small_width\" name=\"thumb_small_width\" type=\"text\" class=\"txt\" style=\"width:30px;\" value=\"";
echo $output['list_setting']['thumb_small_width'] ? $output['list_setting']['thumb_small_width'] : "160";
echo "\"/>\r\n            px&nbsp;&nbsp;&nbsp;&nbsp;";
echo $lang['image_height'];
echo ":\r\n            <input name=\"thumb_small_height\" type=\"text\" class=\"txt\" style=\"width:30px;\" value=\"";
echo $output['list_setting']['thumb_small_height'] ? $output['list_setting']['thumb_small_height'] : "160";
echo "\"/>\r\n            px </td>\r\n          <td class=\"vatop tips\">";
echo $lang['upload_goods_image_size_small_tips'];
echo "</td>\r\n        </tr>\r\n\t\t<tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"thumb_mid_width\">";
echo $lang['upload_goods_image_size_medium'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $lang['image_width'];
echo ":\r\n            <input id=\"thumb_mid_width\" name=\"thumb_mid_width\" type=\"text\" class=\"txt\" style=\"width:30px;\" value=\"";
echo $output['list_setting']['thumb_mid_width'] ? $output['list_setting']['thumb_mid_width'] : "300";
echo "\"/>\r\n            px&nbsp;&nbsp;&nbsp;&nbsp;";
echo $lang['image_height'];
echo ":\r\n            <input name=\"thumb_mid_height\" type=\"text\" class=\"txt\" style=\"width:30px;\" value=\"";
echo $output['list_setting']['thumb_mid_height'] ? $output['list_setting']['thumb_mid_height'] : "300";
echo "\"/>\r\n            px </td>\r\n          <td class=\"vatop tips\">";
echo $lang['upload_goods_image_size_medium_tips'];
echo "</td>\r\n        </tr>\r\n\t\t<tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"thumb_max_width\">";
echo $lang['upload_goods_image_size_large'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $lang['image_width'];
echo ":\r\n            <input id=\"thumb_max_width\" name=\"thumb_max_width\" type=\"text\" class=\"txt\" style=\"width:30px;\" value=\"";
echo $output['list_setting']['thumb_max_width'] ? $output['list_setting']['thumb_max_width'] : "1024";
echo "\"/>\r\n            px&nbsp;&nbsp;&nbsp;&nbsp;";
echo $lang['image_height'];
echo ":\r\n            <input name=\"thumb_max_height\" type=\"text\" class=\"txt\" style=\"width:30px;\" value=\"";
echo $output['list_setting']['thumb_max_height'] ? $output['list_setting']['thumb_max_height'] : "1024";
echo "\"/>\r\n            px </td>\r\n          <td class=\"vatop tips\">";
echo $lang['upload_goods_image_size_large_tips'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.settingForm.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\">\r\n//<!CDATA[\r\n\$(function(){\r\n\t\$('#form').validate({\r\n\t\trules : {\r\n\t\t\timage_max_size : {\r\n\t\t\t\tnumber : true,\r\n\t\t\t\tmaxlength : 4\r\n\t\t\t},\r\n\t\t\timage_allow_ext : {\r\n\t\t\t\trequired : true\r\n\t\t\t}\r\n\t\t},\r\n\t\tmessages : {\r\n\t\t\timage_max_size : {\r\n\t\t\t\tnumber : '";
echo $lang['image_max_size_only_num'];
echo "',\r\n\t\t\t\tmaxlength : '";
echo $lang['image_max_size_c_num'];
echo "'\r\n\t\t\t},\r\n\t\t\timage_allow_ext : {\r\n\t\t\t\trequired : '";
echo $lang['image_allow_ext_not_null'];
echo "'\r\n\t\t\t}\r\n\t\t}\r\n\t});\r\n});\r\n//]]>\r\n</script>";
?>
