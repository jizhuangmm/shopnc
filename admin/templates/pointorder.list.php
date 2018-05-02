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
echo "/js/common.js\" charset=\"utf-8\"></script>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/jquery.ui.js\"></script>\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/themes/ui-lightness/jquery.ui.css\"  />\r\n\r\n<div class=\"page\">\r\n  <div class=\"fixed-bar\">\r\n    <div class=\"item-title\">\r\n      <h3>";
echo $lang['nc_pointprod'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=pointprod&op=pointprod\" ><span>";
echo $lang['admin_pointprod_list_title'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=pointprod&op=prod_add\" ><span>";
echo $lang['admin_pointprod_add_title'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['admin_pointorder_list_title'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" name=\"formSearch\">\r\n    <input type=\"hidden\" name=\"act\" value=\"pointorder\">\r\n    <input type=\"hidden\" name=\"op\" value=\"pointorder_list\">\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label for=\"pordersn\">";
echo $lang['admin_pointorder_ordersn'];
echo "</label></th>\r\n          <td><input type=\"text\" name=\"pordersn\" id=\"pordersn\" class=\"txt\" value='";
echo $_GET['pordersn'];
echo "'></td>\r\n          <th><label for=\"pbuyname\">";
echo $lang['admin_pointorder_membername'];
echo "</label></th>\r\n          <td><input type=\"text\" name=\"pbuyname\" id=\"pbuyname\" class=\"txt\" value='";
echo $_GET['pbuyname'];
echo "'></td>\r\n          <td><select name=\"porderpayment\">\r\n              <option value=\"\" ";
if ( !$_GET['porderpayment'] )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_pointorder_payment'];
echo "</option>\r\n              ";
if ( is_array( $output['payment_list'] ) && 0 < count( $output['payment_list'] ) )
{
		echo "              ";
		foreach ( $output['payment_list'] as $v )
		{
				echo "              <option value=\"";
				echo $v['payment_code'];
				echo "\" ";
				if ( $_GET['porderpayment'] == $v['payment_code'] )
				{
						echo "selected=selected";
				}
				echo ">";
				echo $v['payment_name'];
				echo "</option>\r\n              ";
		}
		echo "              ";
}
echo "            </select>\r\n            <select name=\"porderstate\">\r\n              <option value=\"\" ";
if ( !$_GET['porderstate'] )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_pointorder_orderstate'];
echo "</option>\r\n              <option value=\"canceled\" ";
if ( $_GET['porderstate'] == "canceled" )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_pointorder_state_canceled'];
echo "</option>\r\n              <option value=\"waitpay\" ";
if ( $_GET['porderstate'] == "waitpay" )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_pointorder_state_submit'].",".$lang['admin_pointorder_state_waitpay'];
echo "</option>\r\n              <option value=\"waitconfirmpay\" ";
if ( $_GET['porderstate'] == "waitconfirmpay" )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_pointorder_state_paid'].",".$lang['admin_pointorder_state_confirmpay'];
echo "</option>\r\n              <option value=\"waitship\" ";
if ( $_GET['porderstate'] == "waitship" )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_pointorder_state_confirmpaid'].",".$lang['admin_pointorder_state_waitship'];
echo "</option>\r\n              <option value=\"waitreceiving\" ";
if ( $_GET['porderstate'] == "waitreceiving" )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_pointorder_state_shipped'].",".$lang['admin_pointorder_state_waitreceiving'];
echo "</option>\r\n              <option value=\"finished\" ";
if ( $_GET['porderstate'] == "finished" )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_pointorder_state_finished'];
echo "</option>\r\n            </select></td>\r\n          <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a></td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <form method='post' id=\"form_order\" action=\"index.php\">\r\n    <input type=\"hidden\" name=\"act\" value=\"pointorder\">\r\n    <input type=\"hidden\" id=\"list_op\" name=\"op\" value=\"order_dropall\">\r\n    <table class=\"table tb-type2\">\r\n      <thead> <tr class=\"space\">\r\n          <th colspan=\"15\">";
echo $lang['nc_list'];
echo "</th>\r\n        </tr>\r\n        <tr class=\"thead\">\r\n          <th>&nbsp;</th>\r\n          <th>";
echo $lang['admin_pointorder_ordersn'];
echo "</th>\r\n          <th>";
echo $lang['admin_pointorder_membername'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['admin_pointorder_exchangepoints'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['admin_pointorder_shippingfee'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['admin_pointorder_payment'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['admin_pointorder_addtime'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['admin_pointorder_orderstate'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['order_list'] ) || is_array( $output['order_list'] ) )
{
		echo "        ";
		foreach ( $output['order_list'] as $k => $v )
		{
				echo "        <tr class=\"hover\">\r\n          <td class=\"w12\">&nbsp;</td>\r\n          <td>";
				echo $v['point_ordersn'];
				echo "</td>\r\n          <td>";
				echo $v['point_buyername'];
				echo "</td>\r\n          <td class=\"align-center\">";
				echo $v['point_allpoint'];
				echo "</td>\r\n          <td class=\"align-center\">";
				echo $v['point_shippingfee'];
				echo "</td>\r\n          <td class=\"align-center\">";
				echo $v['point_paymentname'];
				echo "</td>\r\n          <td class=\"nowarp align-center\">";
				echo date( "Y-m-d H:i:s", $v['point_addtime'] );
				echo "</td>\r\n          <td class=\"align-center\">";
				echo $v['point_orderstatetext']['order_state'];
				echo $v['point_orderstatetext']['change_state'] == "" ? "" : ",".$v['point_orderstatetext']['change_state'];
				echo "</td>\r\n          <td class=\"w150 align-center\"><a href=\"index.php?act=pointorder&op=order_info&order_id=";
				echo $v['point_orderid'];
				echo "\" class=\"edit\">";
				echo $lang['nc_view'];
				echo "</a> \r\n            ";
				if ( $v['point_orderstate'] == 10 && $v['point_shippingcharge'] == 1 )
				{
						echo "            <a href=\"index.php?act=pointorder&op=order_changfee&id=";
						echo $v['point_orderid'];
						echo "\">";
						echo $lang['admin_pointorder_changefee'];
						echo "</a>\r\n            ";
				}
				echo "            ";
				if ( $v['point_orderstate'] == 11 && $v['point_shippingcharge'] == 1 )
				{
						echo "            <a href=\"javascript:void(0)\" onclick=\"confirmorder('index.php?act=pointorder&op=order_confirmpaid&id=";
						echo $v['point_orderid'];
						echo "','";
						echo $lang['admin_pointorder_confirmpaid_confirmtip'];
						echo "');\">";
						echo $lang['admin_pointorder_confirmpaid'];
						echo "</a>\r\n            ";
				}
				echo "            ";
				if ( $v['point_orderstate'] == 20 )
				{
						echo "            <a href=\"index.php?act=pointorder&op=order_ship&id=";
						echo $v['point_orderid'];
						echo "\">";
						echo $lang['admin_pointorder_ship_title'];
						echo "</a>\r\n            ";
				}
				echo "            ";
				if ( $v['point_orderstate'] == 30 )
				{
						echo "            <a href=\"index.php?act=pointorder&op=order_ship&id=";
						echo $v['point_orderid'];
						echo "\">";
						echo $lang['admin_pointorder_ship_modtip'];
						echo "</a>\r\n            ";
				}
				echo "            \r\n            <!-- 取消订单 -->\r\n            \r\n            ";
				if ( $v['point_shippingcharge'] == 1 && ( $v['point_orderstate'] == 10 || $v['point_paymentcode'] == "offline" && $v['point_orderstate'] == 11 ) )
				{
						echo "            <a href=\"javascript:void(0)\" onclick=\"confirmorder('index.php?act=pointorder&op=order_cancel&id=";
						echo $v['point_orderid'];
						echo "','";
						echo $lang['admin_pointorder_cancel_confirmtip'];
						echo "');\">";
						echo $lang['admin_pointorder_cancel_title'];
						echo "</a>\r\n            ";
				}
				echo "            ";
				if ( $v['point_shippingcharge'] != 1 && $v['point_orderstate'] == 20 )
				{
						echo "            <a href=\"javascript:void(0)\" onclick=\"confirmorder('index.php?act=pointorder&op=order_cancel&id=";
						echo $v['point_orderid'];
						echo "','";
						echo $lang['admin_pointorder_cancel_confirmtip'];
						echo "');\">";
						echo $lang['admin_pointorder_cancel_title'];
						echo "</a>\r\n            ";
				}
				echo "            <br>\r\n            ";
				if ( $v['point_orderstate'] == 2 )
				{
						echo "            <a href=\"javascript:void(0)\" onclick=\"if(confirm('";
						echo $lang['nc_ensure_del'];
						echo "')){window.location='index.php?act=pointorder&op=order_drop&order_id=";
						echo $v['point_orderid'];
						echo "';}else{return false;}\">";
						echo $lang['nc_del'];
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
if ( !empty( $output['order_list'] ) || is_array( $output['order_list'] ) )
{
		echo "        <tr class=\"tfoot\"> \r\n          <td colspan=\"16\" id=\"dataFuncs\">\r\n            <div class=\"pagination\"> ";
		echo $output['show_page'];
		echo " </div></td>\r\n        </tr>\r\n        ";
}
echo "      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\">\r\nfunction confirmorder(url,msg){\r\n\tif(!confirm(msg)){\r\n\t\treturn false;\r\n\t}else{\r\n\t\twindow.location.href = url;\r\n\t}\r\n}\r\n</script>";
?>
