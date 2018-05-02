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
echo $lang['nc_voucher_price_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        ";
foreach ( $output['menu'] as $menu )
{
		if ( $menu['menu_key'] == $output['menu_key'] )
		{
				echo "        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
				echo $menu['menu_name'];
				echo "</span></a></li>\r\n        ";
		}
		else
		{
				echo "        <li><a href=\"";
				echo $menu['menu_url'];
				echo "\" ><span>";
				echo $menu['menu_name'];
				echo "</span></a></li>\r\n        ";
		}
}
echo "      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"add_form\" method=\"post\" action=\"index.php?act=voucher&op=";
echo $output['menu_key'];
echo "\">\r\n    <input type=\"hidden\" id=\"form_submit\" name=\"form_submit\" value=\"ok\"/>\r\n    <input type=\"hidden\" name=\"priceid\" value=\"";
echo $output['info']['voucher_price_id'];
echo "\"/>\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\">";
echo $lang['admin_voucher_price_title'];
echo "(";
echo $lang['currency_zh'];
echo ")";
echo $lang['nc_colon'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" id=\"voucher_price\" name=\"voucher_price\" class=\"txt\" value=\"";
echo $output['info']['voucher_price'];
echo "\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\">";
echo $lang['admin_voucher_price_describe'].$lang['nc_colon'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea name=\"voucher_price_describe\" rows=\"6\" class=\"tarea\" id=\"voucher_price_describe\">";
echo $output['info']['voucher_price_describe'];
echo "</textarea></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\">";
echo $lang['admin_voucher_price_points'].$lang['nc_colon'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" id=\"voucher_points\" name=\"voucher_points\" class=\"txt\" value=\"";
echo 0 < $output['info']['voucher_defaultpoints'] ? $output['info']['voucher_defaultpoints'] : 0;
echo "\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['admin_voucher_price_points_tip'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"15\"><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script>\r\n//按钮先执行验证再提交表单\r\n\$(function(){\r\n\t\$(\"#submitBtn\").click(function(){\r\n\t\t\$(\"#add_form\").submit();\r\n\t});\r\n\t//页面输入内容验证\r\n\t\$(\"#add_form\").validate({\r\n\t\terrorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        onkeyup    : false,\r\n        rules : {\r\n        \tvoucher_price_describe: {\r\n                required : true,\r\n                maxlength : 255\r\n        \t},\r\n        \tvoucher_price: {\r\n                required : true,\r\n                digits : true,\r\n                min : 1\r\n            },\r\n            voucher_points: {\r\n                digits : true\r\n            }\r\n        },\r\n        messages : {\r\n      \t\tvoucher_price_describe: {\r\n       \t\t\trequired : '";
echo $lang['admin_voucher_price_describe_error'];
echo "',\r\n       \t\t\tmaxlength : '";
echo $lang['admin_voucher_price_describe_lengtherror'];
echo "'\r\n\t    \t},\r\n\t    \tvoucher_price: {\r\n                required : '";
echo $lang['admin_voucher_price_error'];
echo "',\r\n                digits : '";
echo $lang['admin_voucher_price_error'];
echo "',\r\n                min : '";
echo $lang['admin_voucher_price_error'];
echo "'\r\n\t\t    },\r\n\t\t    voucher_points: {\r\n\t\t    \tdigits : '";
echo $lang['admin_voucher_price_points_error'];
echo "'\r\n            }\r\n        }\r\n\t});\r\n});\r\n</script>";
?>
