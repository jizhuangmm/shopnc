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
echo $lang['order_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['manage'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" action=\"index.php\" name=\"formSearch\">\r\n    <input type=\"hidden\" name=\"act\" value=\"trade\" />\r\n    <input type=\"hidden\" name=\"op\" value=\"order_manage\" />\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label>";
echo $lang['order_state'];
echo "</label></th>\r\n          <td colspan=\"4\"><select name=\"status\" class=\"querySelect\">\r\n              <option value=\"\" ";
if ( $output['search']['status'] == "" )
{
		echo "selected";
}
echo ">";
echo $lang['nc_please_choose'];
echo "</option>\r\n              <option value=\"10\"";
if ( $output['search']['status'] == "10" )
{
		echo "selected";
}
echo ">";
echo $lang['pending_payment'];
echo "</option>\r\n              <option value=\"11\"";
if ( $output['search']['status'] == "11" )
{
		echo "selected";
}
echo ">";
echo $lang['pending_recive'];
echo "</option>\r\n              <option value=\"20\"";
if ( $output['search']['status'] == "20" )
{
		echo "selected";
}
echo ">";
echo $lang['pending_ship'];
echo "</option>\r\n              <option value=\"30\"";
if ( $output['search']['status'] == "30" )
{
		echo "selected";
}
echo ">";
echo $lang['shipped'];
echo "</option>\r\n              <option value=\"40\"";
if ( $output['search']['status'] == "40" )
{
		echo "selected";
}
echo ">";
echo $lang['complated'];
echo "</option>\r\n              <option value=\"0\"";
if ( $output['search']['status'] == "0" )
{
		echo "selected";
}
echo ">";
echo $lang['cancelled'];
echo "</option>\r\n              <option value=\"50\"";
if ( $output['search']['status'] == "50" )
{
		echo "selected";
}
echo ">";
echo $lang['pended_payment'];
echo "</option>\r\n            </select>\r\n            <label style=\" margin-left:20px;\">";
echo $lang['type'];
echo "</label>\r\n            <select name=\"field\" class=\"querySelect\">\r\n              <option value=\"store_name\" ";
if ( $output['search']['field'] == "store_name" )
{
		echo "selected";
}
echo ">";
echo $lang['store_name'];
echo "</option>\r\n              <option value=\"buyer_name\" ";
if ( $output['search']['field'] == "buyer_name" )
{
		echo "selected";
}
echo ">";
echo $lang['buyer_name'];
echo "</option>\r\n              <option value=\"payment_name\" ";
if ( $output['search']['field'] == "payment_name" )
{
		echo "selected";
}
echo ">";
echo $lang['payment'];
echo "</option>\r\n              <option value=\"order_sn\" ";
if ( $output['search']['field'] == "order_sn" )
{
		echo "selected";
}
echo ">";
echo $lang['order_number'];
echo "</option>\r\n            </select>\r\n            <input class=\"txt2\" type=\"text\" name=\"search_name\" value=\"";
echo $output['search']['search_name'];
echo "\" /></td>\r\n        </tr>\r\n        <tr>\r\n          <th><label for=\"add_time_from\">";
echo $lang['order_time_from'];
echo "</label></th>\r\n          <td><input class=\"txt date\" type=\"text\" value=\"";
echo $output['search']['add_time_from'];
echo "\" id=\"add_time_from\" name=\"add_time_from\">\r\n            <label for=\"add_time_to\">~</label>\r\n            <input class=\"txt date\" type=\"text\" value=\"";
echo $output['search']['add_time_to'];
echo "\" id=\"add_time_to\" name=\"add_time_to\"/></td>\r\n          <th><label for=\"order_amount_from\">";
echo $lang['order_price_from'];
echo "</label></th>\r\n          <td><input class=\"txt-short\" type=\"text\" value=\"";
echo $output['search']['order_amount_from'];
echo "\" name=\"order_amount_from\" id=\"order_amount_from\"/>\r\n            <label for=\"order_amount_to\">~</label>\r\n            <input class=\"txt-short\" type=\"text\" value=\"";
echo $output['search']['order_amount_to'];
echo "\" name=\"order_amount_to\" id=\"order_amount_to\"/></td>\r\n          <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a>\r\n            ";
if ( $output['filterd'] )
{
		echo "            <a class=\"btns\" href=\"index.php?act=trade&op=order_manage\"><span>";
		echo $lang['cancel_search'];
		echo "</span></a>\r\n            ";
}
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\"><div class=\"title\"><h5>";
echo $lang['nc_prompts'];
echo "</h5><span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n        <ul>\r\n            <li>";
echo $lang['order_help1'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <table class=\"table tb-type2 nobdb\">\r\n    <thead>\r\n      <tr class=\"thead\">\r\n        <th>";
echo $lang['store_name'];
echo "</th>\r\n        <th>";
echo $lang['order_number'];
echo "</th>\r\n        <th>";
echo $lang['buyer_name'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['order_time'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['order_total_price'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['payment'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['order_state'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n      </tr>\r\n    </thead>\r\n    <tbody>\r\n      ";
if ( 0 < count( $output['order_list'] ) )
{
		echo "      ";
		foreach ( $output['order_list'] as $order )
		{
				echo "      <tr class=\"hover\">\r\n        <td>";
				echo $order['store_name'];
				echo "</td>\r\n        <td>\r\n            ";
				echo $order['order_sn'];
				echo "            ";
				if ( !empty( $order['group_id'] ) )
				{
						echo "<span class='red' title='".$lang['nc_groupbuy']."'>(".$lang['nc_groupbuy_flag'].")</span>";
				}
				echo "            ";
				if ( !empty( $order['mansong_id'] ) )
				{
						echo "<span class='red' title='".$lang['nc_mansong']."'>(".$lang['nc_mansong_flag'].")</span>";
				}
				echo "            ";
				if ( !empty( $order['xianshi_id'] ) )
				{
						echo "<span class='red' title='".$lang['nc_xianshi']."'>(".$lang['nc_xianshi_flag'].")</span>";
				}
				echo "            ";
				if ( !empty( $order['bundling_id'] ) )
				{
						echo "<span class='red' title='".$lang['nc_bundling']."'>(".$lang['nc_bundling_flag'].")</span>";
				}
				echo "        </td>\r\n        <td>";
				echo $order['buyer_name'];
				echo "</td>\r\n        <td class=\"nowrap align-center\">";
				echo date( "Y-m-d H:i:s", $order['add_time'] );
				echo "</td>\r\n        <td class=\"align-center\">";
				echo $order['order_amount'];
				echo "</td>\r\n        <td class=\"align-center\">";
				echo $order['payment_name'];
				echo "</td>\r\n        <td class=\"align-center\">";
				echo orderstateinfo( $order['order_state'] );
				echo "</td>\r\n        <td class=\"w60 align-center\"><a href=\"index.php?act=trade&op=show_order&order_id=";
				echo $order['order_id'];
				echo "\">";
				echo $lang['nc_view'];
				echo "</a></td>\r\n      </tr>\r\n      ";
		}
		echo "      ";
}
else
{
		echo "      <tr class=\"no_data\">\r\n        <td colspan=\"15\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n      </tr>\r\n      ";
}
echo "    </tbody>\r\n    <tfoot>\r\n      <tr class=\"tfoot\">\r\n        <td colspan=\"15\" id=\"dataFuncs\"><div class=\"pagination\"> ";
echo $output['show_page'];
echo " </div></td>\r\n      </tr>\r\n    </tfoot>\r\n  </table>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/jquery.ui.js\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/i18n/zh-CN.js\" charset=\"utf-8\"></script>\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/themes/ui-lightness/jquery.ui.css\"  />\r\n<script type=\"text/javascript\">\r\n\$(function(){\r\n    \$('#add_time_from').datepicker({dateFormat: 'yy-mm-dd'});\r\n    \$('#add_time_to').datepicker({dateFormat: 'yy-mm-dd'});\r\n});\r\n</script> \r\n";
?>
