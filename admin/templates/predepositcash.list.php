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
echo $lang['nc_member_predepositmanage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=predeposit&op=predeposit\"><span>";
echo $lang['admin_predeposit_rechargelist'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['admin_predeposit_cashmanage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=predeposit&op=artificial\"><span>";
echo $lang['admin_predeposit_artificial'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" action=\"index.php\">\r\n    <input type=\"hidden\" name=\"act\" value=\"predeposit\">\r\n    <input type=\"hidden\" name=\"op\" value=\"cashlist\">\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th>";
echo $lang['admin_predeposit_membername'];
echo "</th>\r\n          <td><input type=\"text\" name=\"mname\" class=\"txt\" value='";
echo $_GET['mname'];
echo "'></td>\r\n          <th>";
echo $lang['admin_predeposit_addtime'];
echo "</th>\r\n          <td colspan=\"2\"><input type=\"text\" id=\"stime\" name=\"stime\" class=\"txt date\" value=\"";
echo $_GET['stime'];
echo "\">\r\n            <label>~</label>\r\n            <input type=\"text\" id=\"etime\" name=\"etime\" class=\"txt date\" value=\"";
echo $_GET['etime'];
echo "\"></td>\r\n        </tr>\r\n        <tr>\r\n          <th>";
echo $lang['admin_predeposit_cash_shoukuanname'];
echo "</th>\r\n          <td><input type=\"text\" name=\"shoukuan_name\" class=\"txt\" value='";
echo $_GET['shoukuan_name'];
echo "'></td>\r\n          <th>";
echo $lang['admin_predeposit_screen'];
echo "</th>\r\n          <td>";
if ( is_array( $output['payment_array'] ) && 0 < count( $output['payment_array'] ) )
{
		echo "            <select name=\"payment_search\" id=\"payment_search\">\r\n              <option value=\"\">";
		echo $lang['admin_predeposit_payment'];
		echo "</option>\r\n              ";
		foreach ( $output['payment_array'] as $k => $v )
		{
				echo "              <option value=\"";
				echo $k;
				echo "\" ";
				if ( $_GET['payment_search'] == $k )
				{
						echo "selected=\"selected\"";
				}
				echo " title=\"";
				echo $v['payment_info'];
				echo "\">";
				echo $v['payment_name'];
				echo "</option>\r\n              ";
		}
		echo "            </select>\r\n            ";
}
echo "            <select id=\"paystate_search\" name=\"paystate_search\">\r\n              <option value=\"0\">";
echo $lang['admin_predeposit_paystate'];
echo "</option>\r\n              ";
if ( is_array( $output['cashpaystate'] ) && 0 < count( $output['cashpaystate'] ) )
{
		echo "              ";
		foreach ( $output['cashpaystate'] as $k => $v )
		{
				echo "              <option value=\"";
				echo $k + 1;
				echo "\" ";
				if ( $_GET['paystate_search'] == $k + 1 )
				{
						echo "selected=\"selected\"";
				}
				echo ">";
				echo $v;
				echo "</option>\r\n              ";
		}
		echo "              ";
}
echo "            </select>\r\n            <select id=\"state_search\" name=\"state_search\">\r\n              <option value=\"0\">";
echo $lang['admin_predeposit_recordstate'];
echo "</option>\r\n              ";
if ( is_array( $output['cashstate'] ) && 0 < count( $output['cashstate'] ) )
{
		echo "              ";
		foreach ( $output['cashstate'] as $k => $v )
		{
				echo "              <option value=\"";
				echo $k + 1;
				echo "\" ";
				if ( $_GET['state_search'] == $k + 1 )
				{
						echo "selected=\"selected\"";
				}
				echo ">";
				echo $v;
				echo "</option>\r\n              ";
		}
		echo "              ";
}
echo "            </select>\r\n            <a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a></td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li>";
echo $lang['admin_predeposit_cash_help1'];
echo "</li>\r\n            <li>";
echo $lang['admin_predeposit_cash_help2'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <table class=\"table tb-type2 nobdb\">\r\n    <thead>\r\n      <tr class=\"thead\">\r\n        <th>&nbsp;</th>\r\n        <th>";
echo $lang['admin_predeposit_sn'];
echo "</th>\r\n        <th>";
echo $lang['admin_predeposit_membername'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['admin_predeposit_addtime'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['admin_predeposit_payment'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['admin_predeposit_cash_price'];
echo "(";
echo $lang['currency_zh'];
echo ")</th>\r\n        <th class=\"align-center\">";
echo $lang['admin_predeposit_recordstate'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['admin_predeposit_paystate'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n      </tr>\r\n    </thead>\r\n    <tbody>\r\n      ";
if ( !empty( $output['cash_list'] ) || is_array( $output['cash_list'] ) )
{
		echo "      ";
		foreach ( $output['cash_list'] as $k => $v )
		{
				echo "      <tr class=\"hover\">\r\n        <td class=\"w12\">&nbsp;</td>\r\n        <td>";
				echo $v['pdcash_sn'];
				echo "</td>\r\n        <td>";
				echo $v['pdcash_membername'];
				echo "</td>\r\n        <td class=\"nowrap align-center\">";
				echo date( "Y-m-d", $v['pdcash_addtime'] );
				echo "</td>\r\n        <td class=\"align-center\">";
				echo $output['payment_array'][$v['pdcash_payment']]['payment_name'];
				echo "</td>\r\n        <td class=\"align-center\">";
				echo $v['pdcash_price'];
				echo "</td>\r\n        <td class=\"align-center\">";
				echo $output['cashstate'][$v['pdcash_state']];
				echo "</td>\r\n        <td class=\"align-center\">";
				echo $output['cashpaystate'][$v['pdcash_paystate']];
				echo "</td>\r\n        <td class=\"w72 align-center\">";
				if ( $v['pdcash_state'] == 0 )
				{
						echo "          <a href=\"index.php?act=predeposit&op=cashedit&id=";
						echo $v['pdcash_id'];
						echo "\" class=\"edit\">";
						echo $lang['nc_edit'];
						echo "</a>\r\n          ";
				}
				echo "          ";
				if ( $v['pdcash_state'] == 2 && $v['pdcash_paystate'] == 0 )
				{
						echo "          <a href=\"javascript:void(0)\" onclick=\"if(confirm('";
						echo $lang['nc_ensure_del'];
						echo "')){window.location='index.php?act=predeposit&op=cashdel&id=";
						echo $v['pdcash_id'];
						echo "';}else{return false;}\">";
						echo $lang['nc_del'];
						echo "</a>\r\n          ";
				}
				echo "          <a href=\"index.php?act=predeposit&op=cashinfo&id=";
				echo $v['pdcash_id'];
				echo "\" class=\"edit\">";
				echo $lang['nc_view'];
				echo "</a></td>\r\n      </tr>\r\n      ";
		}
		echo "      ";
}
else
{
		echo "      <tr class=\"no_data\">\r\n        <td colspan=\"10\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n      </tr>\r\n      ";
}
echo "    </tbody>\r\n    <tfoot>\r\n      <tr>\r\n        <td colspan=\"16\" id=\"dataFuncs\"><div class=\"pagination\"> ";
echo $output['show_page'];
echo " </div></td>\r\n      </tr>\r\n    </tfoot>\r\n  </table>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/jquery.ui.js\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/i18n/zh-CN.js\" charset=\"utf-8\"></script>\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/themes/ui-lightness/jquery.ui.css\"  />\r\n<script language=\"javascript\">\r\n\$(function(){\r\n\t\$('#stime').datepicker({dateFormat: 'yy-mm-dd'});\r\n\t\$('#etime').datepicker({dateFormat: 'yy-mm-dd'});\r\n});\r\n</script>";
?>
