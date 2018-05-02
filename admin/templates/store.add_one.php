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
echo $lang['store'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=store&op=store\" ><span>";
echo $lang['manage'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=store&op=store_audit\" ><span>";
echo $lang['pending'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=store_grade&op=store_grade_log\" ><span>";
echo $lang['grade_apply'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"post\" name=\"form1\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"step\" value=\"one\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"member_name\">";
echo $lang['user_name'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" id=\"member_name\" name=\"member_name\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['enter_shop_owner_info'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"member_passwd\">";
echo $lang['pwd'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"password\" id=\"member_passwd\" name=\"member_passwd\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"><input type=\"checkbox\" checked=\"checked\" id=\"checkbox\" value=\"1\" name=\"need_password\"> ";
echo $lang['need_verify_pwd'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\"><a href=\"javascript:document.form1.submit();\" class=\"btn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.ipassword.js\"></script> \r\n<script type=\"text/javascript\">\r\n\$(document).ready(function(){\t\r\n\t// to enable iPass plugin\r\n\t\$(\"input[type=password]\").iPass();\r\n});\t\r\n</script> \r\n";
?>
