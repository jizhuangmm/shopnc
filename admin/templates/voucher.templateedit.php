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
echo "      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"add_form\" method=\"post\" action=\"index.php?act=voucher&op=templateedit\">\r\n    <input type=\"hidden\" id=\"form_submit\" name=\"form_submit\" value=\"ok\"/>\r\n    <input type=\"hidden\" id=\"tid\" name=\"tid\" value=\"";
echo $output['t_info']['voucher_t_id'];
echo "\"/>\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n      \t<tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_voucher_storename'].$lang['nc_colon'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" class=\"readonly txt\" value=\"";
echo $output['t_info']['voucher_t_storename'];
echo "\" readonly></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_voucher_template_title'].$lang['nc_colon'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" class=\"readonly txt\" value=\"";
echo $output['t_info']['voucher_t_title'];
echo "\" readonly></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_voucher_template_enddate'].$lang['nc_colon'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" class=\"readonly txt\" value=\"";
echo date( "Y-m-d", $output['t_info']['voucher_t_end_date'] );
echo "\" readonly></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_voucher_template_price'].$lang['nc_colon'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" class=\"readonly txt\" value=\"";
echo $output['t_info']['voucher_t_price'];
echo "\" readonly></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_voucher_template_total'].$lang['nc_colon'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" class=\"readonly txt\" value=\"";
echo $output['t_info']['voucher_t_total'];
echo "\" readonly></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_voucher_template_eachlimit'].$lang['nc_colon'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" class=\"readonly txt\" value=\"";
echo $output['t_info']['voucher_t_eachlimit'];
echo "\" readonly></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_voucher_template_orderpricelimit'].$lang['nc_colon'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" class=\"readonly txt\" value=\"";
echo $output['t_info']['voucher_t_limit'];
echo "\" readonly></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_voucher_template_describe'].$lang['nc_colon'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea rows=\"6\" readonly=\"readonly\" class=\"readonly tarea\">";
echo $output['t_info']['voucher_t_desc'];
echo "</textarea></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_voucher_template_image'].$lang['nc_colon'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">\r\n          \t";
if ( $output['t_info']['voucher_t_customimg'] )
{
		echo "\t      \t\t<img onload=\"javascript:DrawImage(this,160,160);\" src=\"";
		echo $output['t_info']['voucher_t_customimg'];
		echo "\"/>\r\n\t      \t";
}
echo "          </td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        \r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_voucher_template_giveoutnum'].$lang['nc_colon'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" class=\"readonly txt\" value=\"";
echo $output['t_info']['voucher_t_giveout'];
echo "\" readonly></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_voucher_template_usednum'].$lang['nc_colon'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" class=\"readonly txt\" value=\"";
echo $output['t_info']['voucher_t_used'];
echo "\" readonly></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_voucher_template_points'].$lang['nc_colon'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" class=\"txt\" id=\"points\" name=\"points\" value=\"";
echo $output['t_info']['voucher_t_points'];
echo "\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['nc_status'].$lang['nc_colon'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">\r\n          \t";
foreach ( $output['templatestate_arr'] as $k => $v )
{
		echo "          \t\t<input type=\"radio\" value=\"";
		echo $v[0];
		echo "\" id=\"tstate_";
		echo $v[0];
		echo "\" name=\"tstate\" ";
		echo $v[0] == $output['t_info']['voucher_t_state'] ? "checked=\"checked\"" : "";
		echo ">";
		echo $v[1];
		echo "          \t";
}
echo "          </td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"15\"><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script>\r\n//按钮先执行验证再提交表单\r\n\$(function(){\r\n\t\$(\"#submitBtn\").click(function(){\r\n\t\t\$(\"#add_form\").submit();\r\n\t});\r\n\t//页面输入内容验证\r\n\t\$(\"#add_form\").validate({\r\n\t\terrorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n\t    },\r\n\t    rules : {\r\n\t    \tpoints: {\r\n\t    \t\trequired : true,\r\n\t            digits : true\r\n\t        }\r\n\t    },\r\n\t    messages : {\r\n\t    \tpoints: {\r\n\t    \t\trequired : '";
echo $lang['admin_voucher_template_points_error'];
echo "',\r\n\t\t    \tdigits : '";
echo $lang['admin_voucher_template_points_error'];
echo "'\r\n\t        }\r\n\t    }\r\n\t});\r\n\r\n});\r\n</script> ";
?>
