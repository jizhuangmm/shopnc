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
echo "/js/jquery-ui/jquery.ui.js\"></script>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/i18n/zh-CN.js\" charset=\"utf-8\"></script>\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/themes/ui-lightness/jquery.ui.css\"/>\r\n<div class=\"page\">\r\n  <!-- 页面导航 -->\r\n  <div class=\"fixed-bar\">\r\n    <div class=\"item-title\">\r\n      <h3>";
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
echo "      </ul>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <!--  搜索 -->\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" name=\"formSearch\">\r\n    <input type=\"hidden\" name=\"act\" value=\"voucher\">\r\n    <input type=\"hidden\" name=\"op\" value=\"templatelist\">\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label for=\"store_name\">";
echo $lang['admin_voucher_storename'];
echo "</label></th>\r\n          <td><input type=\"text\" value=\"";
echo $_GET['store_name'];
echo "\" name=\"store_name\" id=\"store_name\" class=\"txt\" style=\"width:100px;\"></td>\r\n          <th><label for=\"store_name\">";
echo $lang['admin_voucher_template_adddate'];
echo "</label></th>\r\n          <td><input type=\"text\" id=\"sdate\" name=\"sdate\" class=\"txt date\" value=\"";
echo $_GET['sdate'];
echo "\" >~<input type=\"text\" id=\"edate\" name=\"edate\" class=\"txt date\" value=\"";
echo $_GET['edate'];
echo "\" ></td>\r\n          <th><label>";
echo $lang['nc_state'];
echo "</label></th>\r\n          <td>\r\n          \t<select name=\"state\">\r\n          \t\t<option value=\"0\" ";
if ( 0 === intval( $_GET['state'] ) )
{
		echo "selected";
}
echo ">";
echo $lang['nc_status'];
echo "</option>\r\n          \t\t";
if ( is_array( $output['templatestate_arr'] ) )
{
		echo "          \t\t";
		foreach ( $output['templatestate_arr'] as $key => $val )
		{
				echo "          \t\t\t<option value=\"";
				echo $val[0];
				echo "\" ";
				if ( intval( $val[0] ) === intval( $_GET['state'] ) )
				{
						echo "selected";
				}
				echo ">";
				echo $val[1];
				echo "</option>\r\n          \t\t";
		}
		echo "          \t\t";
}
echo "            </select></td>\r\n          <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a></td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <!-- 帮助 -->\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\" class=\"nobg\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul><li>";
echo $lang['admin_voucher_template_list_tip'];
echo "</li></ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <!-- 列表 -->\r\n  <form id=\"list_form\" method=\"post\">\r\n    <input type=\"hidden\" id=\"object_id\" name=\"object_id\"  />\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n          <tr class=\"thead\">\r\n          \t  <th class=\"w24\">&nbsp;</th>\r\n              <th class=\"align-left\"><span>";
echo $lang['admin_voucher_storename'];
echo "</span></th>\r\n              <th class=\"align-left\"><span>";
echo $lang['admin_voucher_template_title'];
echo "</span></th>\r\n              <th class=\"align-center\"><span>";
echo $lang['admin_voucher_template_price'];
echo "</span></th>\r\n              <th class=\"align-center\"><span>";
echo $lang['admin_voucher_template_orderpricelimit'];
echo "</span></th>\r\n              <th class=\"align-center\"><span>";
echo $lang['admin_voucher_template_enddate'];
echo "</span></th>\r\n              <th class=\"align-center\"><span>";
echo $lang['admin_voucher_template_adddate'];
echo "</span></th>\r\n              <th class=\"align-center\"><span>";
echo $lang['nc_state'];
echo "</span></th>\r\n              <th class=\"align-center\"><span>";
echo $lang['nc_handle'];
echo "</span></th>\r\n          </tr>\r\n      </thead>\r\n      <tbody id=\"treet1\">\r\n        ";
if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
{
		echo "        ";
		foreach ( $output['list'] as $k => $val )
		{
				echo "        <tr class=\"hover\">\r\n        \t<td>&nbsp;</td>\r\n            <td class=\"align-left\"><a href=\"";
				echo SiteUrl;
				echo "/index.php?act=show_store&id=";
				echo $val['voucher_t_store_id'];
				echo "\" target=\"_blank\"><span>";
				echo $val['voucher_t_storename'];
				echo "</span></a></td>\r\n            <td class=\"align-left\"><span>";
				echo $val['voucher_t_title'];
				echo "</span></td>\r\n            <td class=\"align-center\"><span>";
				echo $val['voucher_t_price'];
				echo "</span></td>\r\n            <td class=\"align-center\"><span>";
				echo $val['voucher_t_limit'];
				echo "</span></td>\r\n            <td class=\"align-center\"><span>";
				echo date( "Y-m-d", $val['voucher_t_start_date'] );
				echo "~";
				echo date( "Y-m-d", $val['voucher_t_end_date'] );
				echo "</span></td>\r\n            <td class=\"align-center\"><span>";
				echo date( "Y-m-d", $val['voucher_t_add_date'] );
				echo "</span></td>\r\n            <td class=\"align-center\"><span>\r\n            ";
				foreach ( $output['templatestate_arr'] as $k => $v )
				{
						if ( $val['voucher_t_state'] == $v[0] )
						{
								echo $v[1];
						}
				}
				echo "            </span></td>\r\n            <td class=\"nowrap align-center\"><a href=\"index.php?act=voucher&op=templateedit&tid=";
				echo $val['voucher_t_id'];
				echo "\">";
				echo $lang['nc_edit'];
				echo "</a></td>\r\n        </tr>\r\n        ";
		}
		echo "        ";
}
else
{
		echo "        <tr class=\"no_data\">\r\n          <td colspan=\"16\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      ";
if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
{
		echo "      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"16\">\r\n            <div class=\"pagination\"> ";
		echo $output['show_page'];
		echo " </div>\r\n          </td>\r\n        </tr>\r\n      </tfoot>\r\n      ";
}
echo "    </table>\r\n  </form>\r\n</div>\r\n<script language=\"javascript\">\r\n\$(function(){\r\n\t\$('#sdate').datepicker({dateFormat: 'yy-mm-dd'});\r\n\t\$('#edate').datepicker({dateFormat: 'yy-mm-dd'});\r\n});\r\n</script>";
?>
