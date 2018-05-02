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
echo $lang['nc_pointprod'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=pointprod&op=pointprod\" ><span>";
echo $lang['admin_pointprod_list_title'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=pointprod&op=prod_add\" ><span>";
echo $lang['admin_pointprod_add_title'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=pointorder&op=pointorder_list\"><span>";
echo $lang['admin_pointorder_list_title'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['admin_pointorder_changefee'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  ";
if ( is_array( $output['order_info'] ) && 0 < count( $output['order_info'] ) )
{
		echo "  <form id=\"cfee_form\" method=\"post\" name=\"cfee_form\" action=\"index.php?act=pointorder&op=order_changfee&id=";
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
		echo $lang['admin_pointorder_shippingfee'];
		echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" id=\"shippingfee\" name=\"shippingfee\" class=\"txt\" value=\"";
		echo $output['order_info']['point_shippingfee'];
		echo "\"></td><td class=\"vatop tips\"></td>\r\n        </tr></tbody>\r\n        <tfoot>\r\n         <tr class=\"tfoot\">\r\n          <td colspan=\"15\">\r\n          <a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\" onclick=\"document.cfee_form.submit()\"><span>";
		echo $lang['nc_submit'];
		echo "</span></a>\r\n          </td>\r\n        </tr>\r\n      </tfoot>\r\n          \r\n    </table>\r\n  </form>\r\n  ";
}
else
{
		echo "  <div class='msgdiv'> ";
		echo $output['errormsg'];
		echo " <br>\r\n    <br>\r\n    <a class=\"forward\" href=\"index.php?act=pointorder&amp;op=pointorder_list\">";
		echo $lang['admin_pointorder_gobacklist'];
		echo "</a> </div>\r\n  ";
}
echo "</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/jquery.ui.js\"></script>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.validation.min.js\"></script>\r\n<style>\r\n.dialogdiv th {\r\n\ttext-align:right;\r\n\tpadding-right:10px;\r\n\twidth:20%;\r\n}\r\n.msgdiv {\r\n\ttext-align:center;\r\n\tpadding:40px 0px;\r\n}\r\n</style>\r\n<script type=\"text/javascript\">\r\n\$(function(){\r\n    \$('#cfee_form').validate({\r\n        errorPlacement: function(error, element){\r\n            \$(element).next('.field_notice').hide();\r\n            \$(element).after(error);\r\n        },\r\n        rules : {\r\n            shippingfee  : {\r\n                required : true,\r\n                number \t : true\r\n            }\r\n        },\r\n        messages : {\r\n            shippingfee  : {\r\n                required : '";
echo $lang['admin_pointorder_changefee_freightpricenull'];
echo "',\r\n                number   : '";
echo $lang['admin_pointorder_changefee_freightprice_error'];
echo "'\r\n            }\r\n        }\r\n    });\r\n});\r\n</script>\r\n";
?>
