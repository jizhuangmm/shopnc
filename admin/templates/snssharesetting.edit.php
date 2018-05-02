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
echo "<div class=\"page\">\r\n  <div class=\"fixed-bar\">\r\n    <div class=\"item-title\">\r\n      <h3>";
echo $lang['nc_binding_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=sns_sharesetting&op=sharesetting\"><span>";
echo $lang['nc_binding_manage'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['shareset_edit_title'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"post\" name=\"settingForm\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n      \t<tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['shareset_list_appname'].$lang['nc_colon'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $output['edit_arr']['name'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['shareset_edit_appisuse'].$lang['nc_colon'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\">\r\n          \t<label for=\"isuse_1\" class=\"cb-enable ";
if ( $output['edit_arr']['isuse'] == "1" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['nc_open'];
echo "\"><span>";
echo $lang['nc_open'];
echo "</span></label>\r\n            <label for=\"isuse_0\" class=\"cb-disable ";
if ( $output['edit_arr']['isuse'] == "0" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['nc_close'];
echo "\"><span>";
echo $lang['nc_close'];
echo "</span></label>\r\n            <input type=\"radio\" id=\"isuse_1\" name=\"isuse\" value=\"1\" ";
echo $output['edit_arr']['isuse'] == 1 ? "checked=checked" : "";
echo ">\r\n            <input type=\"radio\" id=\"isuse_0\" name=\"isuse\" value=\"0\" ";
echo $output['edit_arr']['isuse'] == 0 ? "checked=checked" : "";
echo "></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        ";
if ( isset( $output['edit_arr']['appcode'] ) )
{
		echo "        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"appcode\">";
		echo $lang['shareset_edit_appcode'].$lang['nc_colon'];
		echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea name=\"appcode\" rows=\"6\" class=\"tarea\" id=\"appcode\">";
		echo $output['edit_arr']['appcode'];
		echo "</textarea></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        ";
}
echo "        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"appid\">";
echo $lang['shareset_edit_appid'].$lang['nc_colon'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input id=\"appid\" name=\"appid\" value=\"";
echo $output['edit_arr']['appid'];
echo "\" class=\"txt\" type=\"text\"></td>\r\n          <td class=\"vatop tips\"><a href=\"";
echo $output['edit_arr']['applyurl'];
echo "\" target=\"_blank\" style=\"color:#ffffff; font-weight:bold;\">";
echo $lang['shareset_edit_applylike'];
echo "</a></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"appkey\">";
echo $lang['shareset_edit_appkey'].$lang['nc_colon'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input id=\"appkey\" name=\"appkey\" value=\"";
echo $output['edit_arr']['appkey'];
echo "\" class=\"txt\" type=\"text\"></td>\r\n          <td class=\"vatop tips\">&nbsp;</td>\r\n        </tr>\r\n        ";
if ( isset( $output['edit_arr']['secretkey'] ) )
{
		echo "        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"appid\">";
		echo "Secret Key".$lang['nc_colon'];
		echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input id=\"secretkey\" name=\"secretkey\" value=\"";
		echo $output['edit_arr']['secretkey'];
		echo "\" class=\"txt\" type=\"text\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.settingForm.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>";
?>
