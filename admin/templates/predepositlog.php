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
echo $lang['nc_member_predepositlog'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_member_predepositlog'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" name=\"formSearch\">\r\n    <input type=\"hidden\" name=\"act\" value=\"predeposit\">\r\n    <input type=\"hidden\" name=\"op\" value=\"predepositlog\">\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label>";
echo $lang['admin_predeposit_membername'];
echo "</label></th>\r\n          <td><input type=\"text\" name=\"mname\" class=\"txt\" value='";
echo $_GET['mname'];
echo "'></td>\r\n                    \r\n          <th><label>";
echo $lang['admin_predeposit_addtime'];
echo "</label></th>\r\n          <td><input type=\"text\" id=\"stime\" name=\"stime\" class=\"txt date\" value=\"";
echo $_GET['stime'];
echo "\" >\r\n            <label>~</label>\r\n            <input type=\"text\" id=\"etime\" name=\"etime\" class=\"txt date\" value=\"";
echo $_GET['etime'];
echo "\" ></td>\r\n          \r\n        </tr><tr><th><label>";
echo $lang['admin_predeposit_adminname'];
echo "</label></th>\r\n          <td><input type=\"text\" name=\"aname\" class=\"txt\" value='";
echo $_GET['aname'];
echo "'></td><th><label>";
echo $lang['admin_predeposit_log_desc'];
echo "</label></th>\r\n          <td><input type=\"text\" id=\"description\" name=\"description\" class=\"txt2\" value=\"";
echo $_GET['description'];
echo "\" ></td></tr>\r\n          <tr><th>";
echo $lang['admin_predeposit_pricetype'];
echo "</th><td><select name=\"recordtype\" style=\" width:150px;\">\r\n              <option value=\"0\" ";
if ( !$_GET['recordtype'] )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_predeposit_pricetype'];
echo "</option>\r\n              <option value=\"1\" ";
if ( $_GET['recordtype'] == "1" )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_predeposit_pricetype_available'];
echo "</option>\r\n              <option value=\"2\" ";
if ( $_GET['recordtype'] == "2" )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_predeposit_pricetype_freeze'];
echo "</option>\r\n            </select></td><th>";
echo $lang['admin_predeposit_log_stage'];
echo "</th><td><select name=\"stage\" style=\" width:150px;\">\r\n              <option value=\"\" ";
if ( !$_GET['stage'] )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_predeposit_log_stage'];
echo "</option>\r\n              <option value=\"recharge\" ";
if ( $_GET['stage'] == "recharge" )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_predeposit_log_stage_recharge'];
echo "</option>\r\n              <option value=\"cash\" ";
if ( $_GET['stage'] == "cash" )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_predeposit_log_stage_cash'];
echo "</option>\r\n              <option value=\"order\" ";
if ( $_GET['stage'] == "order" )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_predeposit_log_stage_order'];
echo "</option>\r\n              <option value=\"admin\" ";
if ( $_GET['stage'] == "admin" )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_predeposit_log_stage_artificial'];
echo "</option>\r\n              <option value=\"system\" ";
if ( $_GET['stage'] == "system" )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_predeposit_log_stage_system'];
echo "</option>\r\n            </select><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a></td></tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\"><div class=\"title\"><h5>";
echo $lang['nc_prompts'];
echo "</h5><span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n        <ul>\r\n            <li>";
echo $lang['admin_predeposit_log_help1'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <table class=\"table tb-type2\">\r\n    <thead>\r\n      <tr class=\"thead\">\r\n        <th>";
echo $lang['admin_predeposit_number'];
echo "</th>\r\n        <th>";
echo $lang['admin_predeposit_membername'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['admin_predeposit_addtime'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['admin_predeposit_price'];
echo "(";
echo $lang['currency_zh'];
echo ")</th>\r\n        <th class=\"align-center\">";
echo $lang['admin_predeposit_pricetype'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['admin_predeposit_adminname'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['admin_predeposit_log_stage'];
echo "</th>\r\n        <th>";
echo $lang['admin_predeposit_log_desc'];
echo "</th>\r\n      </tr>\r\n    </thead>\r\n    <tbody>\r\n      ";
if ( !empty( $output['list_log'] ) || is_array( $output['list_log'] ) )
{
		echo "      ";
		foreach ( $output['list_log'] as $k => $v )
		{
				echo "      <tr class=\"hover\">\r\n        <td class=\"w36\">";
				echo $v['pdlog_id'];
				echo "</td>\r\n        <td>";
				echo $v['pdlog_membername'];
				echo "</td>\r\n        <td class=\"nowarp align-center\">";
				echo date( "Y-m-d", $v['pdlog_addtime'] );
				echo "</td>\r\n        <td class=\"align-center\">";
				echo $v['pdlog_price'];
				echo "</td>\r\n        <td class=\"align-center\">";
				echo $v['pdlog_type'] == 1 ? $lang['admin_predeposit_pricetype_freeze'] : $lang['admin_predeposit_pricetype_available'];
				echo "</td>\r\n        <td class=\"align-center\">";
				echo $v['pdlog_adminname'];
				echo "</td>\r\n        <td class=\"align-center\">";
				switch ( $v['pdlog_stage'] )
				{
				case "recharge" :
						echo $lang['admin_predeposit_log_stage_recharge'];
						break;
				case "cash" :
						echo $lang['admin_predeposit_log_stage_cash'];
						break;
				case "order" :
						echo $lang['admin_predeposit_log_stage_order'];
						break;
				case "admin" :
						echo $lang['admin_predeposit_log_stage_artificial'];
						break;
				case "system" :
						echo $lang['admin_predeposit_log_stage_system'];
				}
				echo "</td>\r\n        <td>";
				echo $v['pdlog_desc'];
				echo "</td>\r\n      </tr>\r\n      ";
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
echo "</div></td>\r\n      </tr>\r\n    </tfoot>\r\n  </table>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/jquery.ui.js\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/i18n/zh-CN.js\" charset=\"utf-8\"></script>\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/themes/ui-lightness/jquery.ui.css\"  />\r\n<script language=\"javascript\">\r\n\$(function(){\r\n\t\$('#stime').datepicker({dateFormat: 'yy-mm-dd'});\r\n\t\$('#etime').datepicker({dateFormat: 'yy-mm-dd'});\r\n});\r\n</script>";
?>
