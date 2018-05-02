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
echo $lang['nc_pay_method'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=gold_payment&op=gold_payment\"><span>";
echo $lang['payment_index_sites'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_edit'];
echo $output['payment']['payment_name'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"post_form\" method=\"post\" name=\"form1\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"payment_id\" value=\"";
echo $output['payment']['payment_id'];
echo "\" />\r\n    <table class=\"table tb-type2 nobdb\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['payment_index_name'];
echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $output['payment']['payment_name'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        ";
if ( $output['payment']['payment_code'] == "offline" )
{
		echo "        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"parent_id\">";
		echo $lang['payment_info'];
		echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea name=\"payment_info\" rows=\"6\" class=\"tarea\" id=\"payment_info\" >";
		echo $output['payment']['payment_info'];
		echo "</textarea></td>\r\n          <td class=\"vatop tips\">";
		echo $lang['payment_notice'];
		echo "</td>\r\n        </tr>\r\n        ";
}
else if ( $output['payment']['payment_code'] == "chinabank" )
{
		echo "        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
		echo $lang['payment_chinabank_account'];
		echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"hidden\" name=\"config_name\" value=\"chinabank_account,chinabank_key\" />\r\n            <input name=\"chinabank_account\" id=\"chinabank_account\" value=\"";
		echo $output['config_array']['chinabank_account'];
		echo "\" class=\"txt\" type=\"text\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
		echo $lang['payment_chinabank_key'];
		echo ":\r\n            </th></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input name=\"chinabank_key\" id=\"chinabank_key\" value=\"";
		echo $output['config_array']['chinabank_key'];
		echo "\" class=\"txt\" type=\"text\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        ";
}
else if ( $output['payment']['payment_code'] == "tenpay" )
{
		echo "        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
		echo $lang['payment_tenpay_account'];
		echo ":\r\n            </th></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"hidden\" name=\"config_name\" value=\"tenpay_account,tenpay_key\" />\r\n            <input name=\"tenpay_account\" id=\"tenpay_account\" value=\"";
		echo $output['config_array']['tenpay_account'];
		echo "\" class=\"txt\" type=\"text\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
		echo $lang['payment_tenpay_key'];
		echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input name=\"tenpay_key\" id=\"tenpay_key\" value=\"";
		echo $output['config_array']['tenpay_key'];
		echo "\" class=\"txt\" type=\"text\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        ";
}
else if ( $output['payment']['payment_code'] == "alipay" )
{
		echo "        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
		echo $lang['payment_alipay_account'];
		echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"hidden\" name=\"config_name\" value=\"alipay_service,alipay_account,alipay_key,alipay_partner\" />\r\n          \t<input type=\"hidden\" name=\"alipay_service\" value=\"create_direct_pay_by_user\" />\r\n            <input name=\"alipay_account\" id=\"alipay_account\" value=\"";
		echo $output['config_array']['alipay_account'];
		echo "\" class=\"txt\" type=\"text\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
		echo $lang['payment_alipay_key'];
		echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input name=\"alipay_key\" id=\"alipay_key\" value=\"";
		echo $output['config_array']['alipay_key'];
		echo "\" class=\"txt\" type=\"text\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
		echo $lang['payment_alipay_partner'];
		echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input name=\"alipay_partner\" id=\"alipay_partner\" value=\"";
		echo $output['config_array']['alipay_partner'];
		echo "\" class=\"txt\" type=\"text\"></td>\r\n          <td class=\"vatop tips\"><a href=\"https://b.alipay.com/order/pidKey.htm?pid=2088001525694587&product=fastpay\" target=\"_blank\">get my key and partner ID</a></td>\r\n        </tr>\r\n        ";
}
echo "        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['payment_index_enable'];
echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"payment_state1\" class=\"cb-enable ";
if ( $output['payment']['payment_state'] == "1" )
{
		echo "selected";
}
echo "\" ><span>";
echo $lang['nc_yes'];
echo "</span></label>\r\n            <label for=\"payment_state2\" class=\"cb-disable ";
if ( $output['payment']['payment_state'] == "2" )
{
		echo "selected";
}
echo "\" ><span>";
echo $lang['nc_no'];
echo "</span></label>\r\n            <input type=\"radio\" ";
if ( $output['payment']['payment_state'] == "1" )
{
		echo "checked=\"checked\"";
}
echo " value=\"1\" name=\"payment_state\" id=\"payment_state1\">\r\n            <input type=\"radio\" ";
if ( $output['payment']['payment_state'] == "2" )
{
		echo "checked=\"checked\"";
}
echo " value=\"2\" name=\"payment_state\" id=\"payment_state2\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"15\"><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"  onclick=\"document.form1.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a> <a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"history.go(-1)\"><span>";
echo $lang['nc_back'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script>\r\n\$(document).ready(function(){\r\n\t\$('#post_form').validate({\r\n\t\t";
if ( $output['payment']['payment_code'] == "chinabank" )
{
		echo "        rules : {\r\n            chinabank_account : {\r\n                required   : true\r\n            },\r\n            chinabank_key : {\r\n                required   : true\r\n            }\r\n        },\r\n        messages : {\r\n            chinabank_account  : {\r\n                required  : '";
		echo $lang['payment_chinabank_account'];
		echo $lang['payment_edit_not_null'];
		echo "'\r\n            },\r\n            chinabank_key  : {\r\n                required   : '";
		echo $lang['payment_chinabank_key'];
		echo $lang['payment_edit_not_null'];
		echo "'\r\n            }\r\n        }\r\n\t\t";
}
else if ( $output['payment']['payment_code'] == "tenpay" )
{
		echo "        rules : {\r\n            tenpay_account : {\r\n                required   : true\r\n            },\r\n            tenpay_key : {\r\n                required   : true\r\n            }\r\n        },\r\n        messages : {\r\n            tenpay_account  : {\r\n                required  : '";
		echo $lang['payment_tenpay_account'];
		echo $lang['payment_edit_not_null'];
		echo "'\r\n            },\r\n            tenpay_key  : {\r\n                required   : '";
		echo $lang['payment_tenpay_key'];
		echo $lang['payment_edit_not_null'];
		echo "'\r\n            }\r\n        }\r\n\t\t\t\r\n\t\t";
}
else if ( $output['payment']['payment_code'] == "alipay" )
{
		echo "        rules : {\r\n            alipay_account : {\r\n                required   : true\r\n            },\r\n            alipay_key : {\r\n                required   : true\r\n            },\r\n            alipay_partner : {\r\n                required   : true\r\n            }\r\n        },\r\n        messages : {\r\n            alipay_account  : {\r\n                required  : '";
		echo $lang['payment_alipay_account'];
		echo $lang['payment_edit_not_null'];
		echo "'\r\n            },\r\n            alipay_key  : {\r\n                required   : '";
		echo $lang['payment_alipay_key'];
		echo $lang['payment_edit_not_null'];
		echo "'\r\n            },\r\n            alipay_partner  : {\r\n                required   : '";
		echo $lang['payment_alipay_partner'];
		echo $lang['payment_edit_not_null'];
		echo "'\r\n            }\r\n        }\r\n\t\t";
}
echo "    });\r\n});\r\n</script>";
?>
