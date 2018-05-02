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
echo $lang['admin_index_admin_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=admin&op=admin_add\" ><span>";
echo $lang['nc_add'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"post\" id='form_admin'>\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"space\">\r\n          <th colspan=\"15\" class=\"nobg\">";
echo $lang['nc_list'];
echo "</th>\r\n        </tr>\r\n        <tr class=\"thead\">\r\n          <th><input type=\"checkbox\" class=\"checkall\" id=\"checkallBottom\" name=\"chkVal\"></th>\r\n          <th>";
echo $lang['admin_index_username'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['admin_index_last_login'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['admin_index_login_times'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['admin_list'] ) || is_array( $output['admin_list'] ) )
{
		echo "        ";
		foreach ( $output['admin_list'] as $k => $v )
		{
				echo "        <tr class=\"hover\">\r\n          <td class=\"w24\">";
				if ( $v['admin_is_super'] != 1 )
				{
						echo "            <input type=\"checkbox\" name=\"del_id[]\" value=\"";
						echo $v['admin_id'];
						echo "\" class=\"checkitem\" onclick=\"javascript:chkRow(this);\">\r\n            ";
				}
				else
				{
						echo "            <input name=\"del_id[]\" type=\"checkbox\" value=\"";
						echo $v['admin_id'];
						echo "\" disabled=\"disabled\">\r\n            ";
				}
				echo "</td>\r\n          <td>";
				echo $v['admin_name'];
				echo "</td>\r\n          <td class=\"align-center\">";
				echo $v['admin_login_time'] ? date( "Y-m-d H:i:s", $v['admin_login_time'] ) : $lang['admin_index_login_null'];
				echo "</td>\r\n          <td class=\"align-center\">";
				echo $v['admin_login_num'];
				echo "</td>\r\n          <td class=\"w150 align-center\">";
				if ( $v['admin_is_super'] )
				{
						echo "            ";
						echo $lang['admin_index_sys_admin_no'];
						echo "            ";
				}
				else
				{
						echo "            <a href=\"index.php?act=admin&op=admin_set&admin_id=";
						echo $v['admin_id'];
						echo "\">";
						echo $lang['admin_index_edit_right'];
						echo "</a> | <a href=\"javascript:void(0)\" onclick=\"if(confirm('";
						echo $lang['nc_ensure_del'];
						echo "')){location.href='index.php?act=admin&op=admin_del&admin_id=";
						echo $v['admin_id'];
						echo "'}\">";
						echo $lang['admin_index_del_admin'];
						echo "</a> | <a href=\"index.php?act=admin&op=admin_edit&admin_id=";
						echo $v['admin_id'];
						echo "\">";
						echo $lang['nc_edit'];
						echo "</a>\r\n            ";
				}
				echo "</td>\r\n        </tr>\r\n        ";
		}
		echo "        ";
}
else
{
		echo "        <tr class=\"no_data\">\r\n          <td colspan=\"10\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      <tfoot>\r\n        ";
if ( !empty( $output['admin_list'] ) || is_array( $output['admin_list'] ) )
{
		echo "        <tr class=\"tfoot\">\r\n          <td><input type=\"checkbox\" class=\"checkall\" id=\"checkallBottom\" name=\"chkVal\"></td>\r\n          <td colspan=\"16\"><label for=\"checkallBottom\">";
		echo $lang['nc_select_all'];
		echo "</label>\r\n            &nbsp;&nbsp;<a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"if(confirm('";
		echo $lang['nc_ensure_del'];
		echo "')){\$('#form_admin').submit();}\"><span>";
		echo $lang['nc_del'];
		echo "</span></a>\r\n            <div class=\"pagination\"> ";
		echo $output['page'];
		echo " </div></td>\r\n        </tr>\r\n        ";
}
echo "      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n";
?>
