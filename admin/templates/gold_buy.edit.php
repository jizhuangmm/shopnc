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
echo $lang['nc_gold_buy'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=gold_buy&op=gold_buy\"><span>";
echo $lang['gbuy_log'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"post_form\" method=\"post\" name=\"form1\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"gbuy_id\" value=\"";
echo $output['gold_buy']['gbuy_id'];
echo "\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['buyer_name'];
echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $output['gold_buy']['gbuy_membername'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['gbuy_gold'];
echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $output['member_goldnum'];
echo " ";
echo $lang['gbuy_num'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['gbuy_price'];
echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $output['gold_buy']['gbuy_price'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['gbuy_user_remark'];
echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $output['gold_buy']['gbuy_user_remark'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        ";
if ( $output['gold_buy']['gbuy_ispay'] == 0 )
{
		echo "        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
		echo $lang['gbuy_gold_num'];
		echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" id=\"gbuy_num\" name=\"gbuy_num\" value=\"";
		echo $output['gold_buy']['gbuy_num'];
		echo "\" class=\"txt\"/></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"parent_id\">";
		echo $lang['gbuy_sys_remark'];
		echo ":</label>\r\n            </th></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea name=\"gbuy_sys_remark\" id=\"gbuy_sys_remark\" class=\"tarea\" >";
		echo $output['gold_buy']['gbuy_sys_remark'];
		echo "</textarea></td>\r\n          <td class=\"vatop tips\">";
		echo $lang['gbuy_pay_notice'];
		echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
		echo $lang['gbuy_ispay'];
		echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><p>\r\n              <label>\r\n                <input type=\"radio\" value=\"1\" name=\"gbuy_ispay\">\r\n                ";
		echo $lang['nc_yes'];
		echo "</label>\r\n              <label>\r\n                <input type=\"radio\" checked=\"checked\" value=\"0\" name=\"gbuy_ispay\">\r\n                ";
		echo $lang['nc_no'];
		echo "</label>\r\n            </p></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"15\"><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"  onclick=\"document.form1.submit()\"><span>";
		echo $lang['nc_submit'];
		echo "</span></a> <a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"history.go(-1)\"><span>";
		echo $lang['nc_back'];
		echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n    ";
}
else
{
		echo "    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\">";
		echo $lang['gbuy_gold_num'];
		echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
		echo $output['gold_buy']['gbuy_num'];
		echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"parent_id\">";
		echo $lang['gbuy_sys_remark'];
		echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
		echo $output['gold_buy']['gbuy_sys_remark'];
		echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
		echo $lang['gbuy_ispay'];
		echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><p>\r\n              <label> ";
		echo $lang['nc_yes'];
		echo "</label>\r\n            </p></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"15\"><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"history.go(-1)\"><span>";
		echo $lang['nc_back'];
		echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n    ";
}
echo "  </form>\r\n</div>\r\n<script>\r\n\$(document).ready(function(){\r\n\t\$('#post_form').validate({\r\n        errorPlacement: function(error, element){\r\n            \$(element).next('.field_notice').hide();\r\n            \$(element).after(error);\r\n        },\r\n        onfocusout : false,\r\n        onkeyup    : false,\r\n        rules : {\r\n            gbuy_num : {\r\n                required   : true,\r\n                number : true\r\n            }\r\n        },\r\n        messages : {\r\n            gbuy_num : {\r\n                required  : '";
echo $lang['gbuy_number'];
echo "',\r\n                number : '";
echo $lang['gbuy_number'];
echo "'\r\n            }\r\n        }\r\n    });\r\n});\r\n</script>";
?>
