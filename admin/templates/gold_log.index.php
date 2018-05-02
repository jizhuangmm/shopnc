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
echo $lang['nc_gold_buy'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=gold_buy&op=gold_buy\" ><span>";
echo $lang['gbuy_log'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['gold_log'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" action=\"index.php\" id=\"submit_form\" name=\"formSearch\">\r\n    <input type=\"hidden\" name=\"act\" value=\"gold_buy\" />\r\n    <input type=\"hidden\" name=\"op\" value=\"gold_log\" />\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label for=\"storename\">";
echo $lang['store_name'];
echo "</label></th>\r\n          <td><input class=\"txt\" type=\"text\" value=\"";
echo $output['search']['storename'];
echo "\" id=\"storename\" name=\"storename\" /></td>\r\n          <th><label for=\"membername\">";
echo $lang['buyer_name'];
echo "</label></th>\r\n          <td><input class=\"txt\" type=\"text\" value=\"";
echo $output['search']['membername'];
echo "\" id=\"membername\" name=\"membername\" /></td>\r\n          <th><label for=\"add_time_from\">";
echo $lang['glog_add_time_from'];
echo "</label></th>\r\n          <td><input class=\"txt date\" type=\"text\" value=\"";
echo $output['search']['add_time_from'];
echo "\" id=\"add_time_from\" name=\"add_time_from\"/>\r\n            <label for=\"add_time_to\">~</label>\r\n            <input class=\"txt date\" type=\"text\" value=\"";
echo $output['search']['add_time_to'];
echo "\" id=\"add_time_to\" name=\"add_time_to\" /></td>\r\n          <td><select name=\"method\">\r\n              <option value=\"\" ";
if ( $output['search']['method'] == "" )
{
		echo "selected";
}
echo ">";
echo $lang['glog_method'];
echo "</option>\r\n              <option value=\"1\" ";
if ( $output['search']['method'] == "1" )
{
		echo "selected";
}
echo ">";
echo $lang['glog_method1'];
echo "</option>\r\n              <option value=\"2\" ";
if ( $output['search']['method'] == "2" )
{
		echo "selected";
}
echo ">";
echo $lang['glog_method2'];
echo "</option>\r\n            </select></td>\r\n          <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a></td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <table class=\"table tb-type2 nobdb\">\r\n    <thead>\r\n      <tr class=\"thead\">\r\n        <th></th>\r\n        <th>";
echo $lang['glog_add_time'];
echo "</th>\r\n        <th>";
echo $lang['store_name'];
echo "          </td>\r\n        <th>";
echo $lang['buyer_name'];
echo "</th>\r\n        <th>";
echo $lang['gbuy_gold_num'];
echo "</th>\r\n        <th>";
echo $lang['glog_method'];
echo "</th>\r\n        <th>";
echo $lang['glog_handle_desc'];
echo "</th>\r\n      </tr>\r\n    </thead>\r\n    <tbody>\r\n      ";
if ( 0 < count( $output['glog_list'] ) )
{
		echo "      ";
		foreach ( $output['glog_list'] as $key => $val )
		{
				echo "      <tr class=\"hover\">\r\n        <td class=\"w12\"></td>\r\n        <td>";
				echo date( "Y-m-d H:i:s", $val['glog_addtime'] );
				echo "</td>\r\n        <td>";
				echo $val['glog_storename'];
				echo "</td>\r\n        <td>";
				echo $val['glog_membername'];
				echo "</td>\r\n        <td>";
				echo $val['glog_goldnum'];
				echo "</td>\r\n        <td>";
				if ( $val['glog_method'] == 2 )
				{
						echo "          ";
						echo $lang['glog_method2'];
						echo "          ";
				}
				echo "          ";
				if ( $val['glog_method'] == 1 )
				{
						echo "          ";
						echo $lang['glog_method1'];
						echo "          ";
				}
				echo "</td>\r\n        <td>";
				echo $val['glog_desc'];
				echo "</td>\r\n      </tr>\r\n      ";
		}
		echo "      ";
}
else
{
		echo "      <tr class=\"no_data\">\r\n        <td colspan=\"15\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n      </tr>\r\n      ";
}
echo "    </tbody>\r\n    <tfoot>\r\n      <tr class=\"tfoot\">\r\n        <td colspan=\"16\"><div class=\"pagination\"> ";
echo $output['show_page'];
echo " </div></td>\r\n      </tr>\r\n    </tfoot>\r\n  </table>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/jquery.ui.js\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/i18n/zh-CN.js\" charset=\"utf-8\"></script>\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/themes/ui-lightness/jquery.ui.css\"  />\r\n<script type=\"text/javascript\">\r\n\$(function(){\r\n    \$('#add_time_from').datepicker({dateFormat: 'yy-mm-dd'});\r\n    \$('#add_time_to').datepicker({dateFormat: 'yy-mm-dd'});\r\n});\r\n</script>";
?>
