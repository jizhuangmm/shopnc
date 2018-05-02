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
echo $lang['web_set'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['basic_info'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=captcha_setting\"><span>";
echo $lang['manage_about'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=creditgrade\"><span>";
echo $lang['setting_store_creditrule'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=ucenter_setting\"><span>";
echo $lang['ucenter_integration'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=qq_setting\"><span>";
echo $lang['qqSettings'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=sina_setting\"><span>";
echo $lang['sinaSettings'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=login_setting\"><span>";
echo $lang['loginSettings'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"post\" enctype=\"multipart/form-data\" name=\"form1\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"old_site_logo\" value=\"";
echo $output['list_setting']['site_logo'];
echo "\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label for=\"site_name\">";
echo $lang['web_name'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input id=\"site_name\" name=\"site_name\" value=\"";
echo $output['list_setting']['site_name'];
echo "\" class=\"txt\" type=\"text\" /></td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['web_name_notice'];
echo "</span></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"site_logo\">";
echo $lang['site_logo'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><span class=\"type-file-show\"><img class=\"show_image\" src=\"";
echo TEMPLATES_PATH;
echo "/images/preview.png\">\r\n            <div class=\"type-file-preview\"><img src=\"";
echo SiteUrl."/".( ATTACH_COMMON.DS.$output['list_setting']['site_logo'] );
echo "\"></div>\r\n            </span><span class=\"type-file-box\">\r\n            <input name=\"site_logo\" type=\"file\" class=\"type-file-file\" id=\"site_logo\" size=\"30\" hidefocus=\"true\" nc_type=\"change_site_logo\">\r\n            </span></td>\r\n          <td class=\"vatop tips\">180px * 50px</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"icp_number\">";
echo $lang['icp_number'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input id=\"icp_number\" name=\"icp_number\" value=\"";
echo $output['list_setting']['icp_number'];
echo "\" class=\"txt\" type=\"text\" /></td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['icp_number_notice'];
echo "</span></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"site_phone\">";
echo $lang['site_phone'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input id=\"site_phone\" name=\"site_phone\" value=\"";
echo $output['list_setting']['site_phone'];
echo "\" class=\"txt\" type=\"text\" /></td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['site_phone_notice'];
echo "</span></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"site_email\">";
echo $lang['site_email'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input id=\"site_email\" name=\"site_email\" value=\"";
echo $output['list_setting']['site_email'];
echo "\" class=\"txt\" type=\"text\" /></td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['site_email_notice'];
echo "</span></td>\r\n        </tr>\r\n         <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"statistics_code\">";
echo $lang['flow_static_code'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea name=\"statistics_code\" rows=\"6\" class=\"tarea\" id=\"statistics_code\">";
echo $output['list_setting']['statistics_code'];
echo "</textarea></td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['flow_static_code_notice'];
echo "</span></td>\r\n        </tr> \r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"time_zone\"> ";
echo $lang['time_zone_set'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><select id=\"time_zone\" name=\"time_zone\">\r\n              <option value=\"-12\">(GMT -12:00) Eniwetok, Kwajalein</option>\r\n              <option value=\"-11\">(GMT -11:00) Midway Island, Samoa</option>\r\n              <option value=\"-10\">(GMT -10:00) Hawaii</option>\r\n              <option value=\"-9\">(GMT -09:00) Alaska</option>\r\n              <option value=\"-8\">(GMT -08:00) Pacific Time (US &amp; Canada), Tijuana</option>\r\n              <option value=\"-7\">(GMT -07:00) Mountain Time (US &amp; Canada), Arizona</option>\r\n              <option value=\"-6\">(GMT -06:00) Central Time (US &amp; Canada), Mexico City</option>\r\n              <option value=\"-5\">(GMT -05:00) Eastern Time (US &amp; Canada), Bogota, Lima, Quito</option>\r\n              <option value=\"-4\">(GMT -04:00) Atlantic Time (Canada), Caracas, La Paz</option>\r\n              <option value=\"-3.5\">(GMT -03:30) Newfoundland</option>\r\n              <option value=\"-3\">(GMT -03:00) Brassila, Buenos Aires, Georgetown, Falkland Is</option>\r\n              <option value=\"-2\">(GMT -02:00) Mid-Atlantic, Ascension Is., St. Helena</option>\r\n              <option value=\"-1\">(GMT -01:00) Azores, Cape Verde Islands</option>\r\n              <option value=\"0\">(GMT) Casablanca, Dublin, Edinburgh, London, Lisbon, Monrovia</option>\r\n              <option value=\"1\">(GMT +01:00) Amsterdam, Berlin, Brussels, Madrid, Paris, Rome</option>\r\n              <option value=\"2\">(GMT +02:00) Cairo, Helsinki, Kaliningrad, South Africa</option>\r\n              <option value=\"3\">(GMT +03:00) Baghdad, Riyadh, Moscow, Nairobi</option>\r\n              <option value=\"3.5\">(GMT +03:30) Tehran</option>\r\n              <option value=\"4\">(GMT +04:00) Abu Dhabi, Baku, Muscat, Tbilisi</option>\r\n              <option value=\"4.5\">(GMT +04:30) Kabul</option>\r\n              <option value=\"5\">(GMT +05:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>\r\n              <option value=\"5.5\">(GMT +05:30) Bombay, Calcutta, Madras, New Delhi</option>\r\n              <option value=\"5.75\">(GMT +05:45) Katmandu</option>\r\n              <option value=\"6\">(GMT +06:00) Almaty, Colombo, Dhaka, Novosibirsk</option>\r\n              <option value=\"6.5\">(GMT +06:30) Rangoon</option>\r\n              <option value=\"7\">(GMT +07:00) Bangkok, Hanoi, Jakarta</option>\r\n              <option value=\"8\">(GMT +08:00) Beijing, Hong Kong, Perth, Singapore, Taipei</option>\r\n              <option value=\"9\">(GMT +09:00) Osaka, Sapporo, Seoul, Tokyo, Yakutsk</option>\r\n              <option value=\"9.5\">(GMT +09:30) Adelaide, Darwin</option>\r\n              <option value=\"10\">(GMT +10:00) Canberra, Guam, Melbourne, Sydney, Vladivostok</option>\r\n              <option value=\"11\">(GMT +11:00) Magadan, New Caledonia, Solomon Islands</option>\r\n              <option value=\"12\">(GMT +12:00) Auckland, Wellington, Fiji, Marshall Island</option>\r\n            </select></td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['set_sys_use_time_zone'];
echo "+8</span></td>\r\n        </tr>              \r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['site_state'];
echo ":</td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"site_status1\" class=\"cb-enable ";
if ( $output['list_setting']['site_status'] == "1" )
{
		echo "selected";
}
echo "\" ><span>";
echo $lang['open'];
echo "</span></label>\r\n            <label for=\"site_status0\" class=\"cb-disable ";
if ( $output['list_setting']['site_status'] == "0" )
{
		echo "selected";
}
echo "\" ><span>";
echo $lang['close'];
echo "</span></label>\r\n            <input id=\"site_status1\" name=\"site_status\" ";
if ( $output['list_setting']['site_status'] == "1" )
{
		echo "checked=\"checked\"";
}
echo "  value=\"1\" type=\"radio\">\r\n            <input id=\"site_status0\" name=\"site_status\" ";
if ( $output['list_setting']['site_status'] == "0" )
{
		echo "checked=\"checked\"";
}
echo " value=\"0\" type=\"radio\"></td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['site_state_notice'];
echo "</span></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"closed_reason\">";
echo $lang['closed_reason'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea name=\"closed_reason\" rows=\"6\" class=\"tarea\" id=\"closed_reason\" >";
echo $output['list_setting']['closed_reason'];
echo "</textarea></td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['closed_reason_notice'];
echo "</span></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.form1.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\">\r\n// 模拟网站LOGO上传input type='file'样式\r\n\$(function(){\r\n    var textButton=\"<input type='text' name='textfield' id='textfield1' class='type-file-text' /><input type='button' name='button' id='button1' value='' class='type-file-button' />\"\r\n\t\$(textButton).insertBefore(\"#site_logo\");\r\n\t\$(\"#site_logo\").change(function(){\r\n\t\$(\"#textfield1\").val(\$(\"#site_logo\").val());\r\n});\r\n// 上传图片类型\r\n\$('input[class=\"type-file-file\"]').change(function(){\r\n\tvar filepatd=\$(this).val();\r\n\tvar extStart=filepatd.lastIndexOf(\".\");\r\n\tvar ext=filepatd.substring(extStart,filepatd.lengtd).toUpperCase();\t\t\r\n\t\tif(ext!=\".PNG\"&&ext!=\".GIF\"&&ext!=\".JPG\"&&ext!=\".JPEG\"){\r\n\t\t\talert(\"";
echo $lang['default_img_wrong'];
echo "\");\r\n\t\t\t\t\$(this).attr('value','');\r\n\t\t\treturn false;\r\n\t\t}\r\n\t});\r\n\t\r\n\$('#time_zone').attr('value','";
echo $output['list_setting']['time_zone'];
echo "');\t\r\n});\r\n</script>";
?>
