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
echo "<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/jquery.ui.js\"></script>\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/themes/ui-lightness/jquery.ui.css\"  />\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.validation.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/i18n/zh-CN.js\" charset=\"utf-8\"></script>\r\n<div class=\"page\">\r\n  <div class=\"fixed-bar\">\r\n    <div class=\"item-title\">\r\n      <h3>";
echo $lang['nc_pointprod'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=pointprod&op=pointprod\" ><span>";
echo $lang['admin_pointprod_list_title'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=pointprod&op=prod_add\" ><span>";
echo $lang['admin_pointprod_add_title'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=pointorder&op=pointorder_list\"><span>";
echo $lang['admin_pointorder_list_title'];
echo "</span></a></li>\r\n        ";
if ( $output['order_info']['point_orderstate'] == 20 )
{
		echo "        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
		echo $lang['admin_pointorder_ship_title'];
		echo "</span></a></li>\r\n        ";
}
echo "        ";
if ( $output['order_info']['point_orderstate'] == 30 )
{
		echo "        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
		echo $lang['admin_pointorder_ship_modtip'];
		echo "</span></a></li>\r\n        ";
}
echo "      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  ";
if ( is_array( $output['order_info'] ) && 0 < count( $output['order_info'] ) )
{
		echo "  <form id=\"ship_form\" method=\"post\" name=\"ship_form\" action=\"index.php?act=pointorder&op=order_ship&id=";
		echo $_GET['id'];
		echo "\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\"/>\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
		echo $lang['admin_pointorder_membername'];
		echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
		echo $output['order_info']['point_buyername'];
		echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label> ";
		echo $lang['admin_pointorder_ordersn'];
		echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
		echo $output['order_info']['point_ordersn'];
		echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label> ";
		echo $lang['admin_pointorder_shipping_code'];
		echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" id=\"shippingcode\" name=\"shippingcode\" class=\"txt\" value=\"";
		echo $output['order_info']['point_shippingcode'];
		echo "\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label> ";
		echo $lang['admin_pointorder_shipping_time'];
		echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" id=\"shippingtime\" name=\"shippingtime\" class=\"txt date\" value=\"";
		if ( $output['order_info']['point_shippingtime'] )
		{
				echo date( "Y-m-d", $output['order_info']['point_shippingtime'] );
		}
		echo "\">\r\n            </td>\r\n          <td class=\"vatop tips\">";
		echo $lang['admin_pointorder_shipping_timetip'];
		echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
		echo $lang['admin_pointorder_shipping_description'];
		echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea name=\"shippingdesc\" rows=\"6'\" class=\"tarea\" id=\"shippingdesc\">";
		echo $output['order_info']['point_shippingdesc'];
		echo "</textarea></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" >\r\n          <a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.ship_form.submit()\"><span>";
		echo $lang['nc_submit'];
		echo "</span></a>\r\n          </td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n  ";
}
else
{
		echo "  <div class='msgdiv'> ";
		echo $output['errormsg'];
		echo " <br>\r\n    <br>\r\n    <a class=\"forward\" href=\"index.php?act=pointorder&amp;op=pointorder_list\">";
		echo $lang['admin_pointorder_gobacklist'];
		echo "</a> </div>\r\n  ";
}
echo "</div>\r\n<script type=\"text/javascript\">\r\n\$(function(){\r\n\t\$('#shippingtime').datepicker({dateFormat: 'yy-mm-dd'});\r\n\t\r\n\t\$('#ship_form').validate({\r\n        errorPlacement: function(error, element){\r\n            \$(element).next('.field_notice').hide();\r\n            \$(element).after(error);\r\n        },\r\n        rules : {\r\n            shippingcode  : {\r\n                required : true\r\n            }\r\n        },\r\n        messages : {\r\n            shippingcode  : {\r\n                required : '";
echo $lang['admin_pointorder_ship_code_nullerror'];
echo "'\r\n            }\r\n        }\r\n    });\r\n});\r\n</script>";
?>
