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
echo $lang['mailtemplates_index_notice'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=mailtemplates&op=mailtemplates\" ><span>";
echo $lang['mailtemplates_index_mail'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=mailtemplates&op=msgtemplates\" ><span>";
echo $lang['mailtemplates_index_message'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_edit'];
echo $lang['mailtemplates_index_message'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"form_templates\" method=\"post\" name=\"form1\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"code\" value=\"";
echo $output['templates_array']['code'];
echo "\" />\r\n    <table class=\"table tb-type2 nobdb\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>\r\n            <label class=\"validation\" for=\"link\">";
echo $lang['mailtemplates_msg_edit_content'];
echo ":</label>\r\n            </label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea name=\"content\" rows=\"6\" class=\"tarea\">";
echo $output['templates_array']['content'];
echo "</textarea></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\"><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.form1.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n";
?>
