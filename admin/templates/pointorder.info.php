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
echo "\r\n<div class=\"page\">\r\n  <table class=\"table tb-type2 order\">\r\n    <tbody>\r\n      <tr class=\"space\">\r\n        <th colspan=\"15\">";
echo $lang['admin_pointorder_info_ordersimple'];
echo "</th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li><strong>";
echo $lang['admin_pointorder_ordersn'];
echo ":</strong>";
echo $output['order_info']['point_ordersn'];
echo "</li>\r\n            <li><strong>";
echo $lang['admin_pointorder_orderstate'];
echo ":</strong>";
echo $output['order_info']['point_orderstatetext']['order_state'];
echo $output['order_info']['point_orderstatetext']['change_state'] == "" ? "" : ",".$output['order_info']['point_orderstatetext']['change_state'];
echo "</li>\r\n            <li><strong>";
echo $lang['admin_pointorder_exchangepoints'];
echo ":</strong><span class=\"red_common\">";
echo $output['order_info']['point_allpoint'];
echo "</span></li>\r\n            ";
if ( $output['order_info']['point_shippingcharge'] == 1 )
{
		echo "            <li><strong>";
		echo $lang['admin_pointorder_shippingfee'];
		echo ":</strong>";
		echo $output['order_info']['point_shippingfee'];
		echo "</li>\r\n            ";
}
echo "            <li><strong>";
echo $lang['admin_pointorder_addtime'];
echo ":</strong><span class=\"red_common\">";
echo date( "Y-m-d H:i:s", $output['order_info']['point_addtime'] );
echo "</span></li>\r\n          </ul></td>\r\n      </tr>\r\n      <tr class=\"space\">\r\n        <th colspan=\"2\">";
echo $lang['admin_pointorder_info_orderdetail'];
echo "</th>\r\n      </tr>\r\n      <tr>\r\n        <th>";
echo $lang['admin_pointorder_info_memberinfo'];
echo "</th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li><strong>";
echo $lang['admin_pointorder_membername'];
echo ":</strong>";
echo $output['order_info']['point_buyername'];
echo "</li>\r\n            <li><strong>";
echo $lang['admin_pointorder_info_memberemail'];
echo ":</strong>";
echo $output['order_info']['point_buyeremail'];
echo "</li>\r\n            <li><strong>";
echo $lang['admin_pointorder_info_ordermessage'];
echo ":</strong>";
echo $output['order_info']['point_ordermessage'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n      ";
if ( $output['order_info']['point_shippingcharge'] == 1 )
{
		echo "      <tr>\r\n        <td><ul>\r\n            <li><strong>";
		echo $lang['admin_pointorder_payment'];
		echo ":</strong>";
		echo $output['order_info']['point_paymentname'];
		echo "</li>\r\n            <li><strong>";
		echo $lang['admin_pointorder_info_paymenttime'];
		echo ":</strong>";
		echo date( "Y-m-d H:i:s", $output['order_info']['point_paymenttime'] );
		echo "</li>\r\n            <li><strong>";
		echo $lang['admin_pointorder_info_paymentmessage'];
		echo ":</strong>\r\n\t        ";
		$tmp = @unserialize( $output['order_info']['point_paymessage'] );
		echo "\t        ";
		if ( is_array( $tmp ) && 0 < count( $tmp ) )
		{
				echo "\t\t      \t";
				if ( $tmp['user'] )
				{
						echo $lang['pay_bank_user']." ".stripslashes( $tmp['user'] );
				}
				echo "\t\t      \t";
				if ( $tmp['bank'] )
				{
						echo $lang['pay_bank_bank']." ".stripslashes( $tmp['bank'] );
				}
				echo "\t\t      \t";
				if ( $tmp['account'] )
				{
						echo $lang['pay_bank_account']." ".stripslashes( $tmp['account'] );
				}
				echo "\t\t      \t";
				if ( $tmp['num'] )
				{
						echo $lang['pay_bank_num']." ".stripslashes( $tmp['num'] );
				}
				echo "\t\t      \t";
				if ( $tmp['date'] )
				{
						echo $lang['pay_bank_date']." ".stripslashes( $tmp['date'] );
				}
				echo "\t\t      \t";
				if ( $tmp['order'] )
				{
						echo $lang['pay_bank_order']." ".stripslashes( $tmp['order'] );
				}
				echo "\t\t      \t";
				if ( $tmp['extend'] )
				{
						echo $lang['pay_bank_extend']." ".stripslashes( $tmp['extend'] );
				}
				echo "\t\t    ";
		}
		else
		{
				echo "\t        \t";
				echo $output['order_info']['point_paymessage'];
				echo "\t        ";
		}
		echo "            \r\n            </li>\r\n          </ul></td>\r\n      </tr>\r\n      ";
}
echo "      <tr>\r\n        <th>";
echo $lang['admin_pointorder_info_shipinfo'];
echo "</th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li><strong>";
echo $lang['admin_pointorder_info_shipinfo_truename'];
echo ":</strong>";
echo $output['order_info']['point_truename'];
echo "</li>\r\n            <li><strong>";
echo $lang['admin_pointorder_info_shipinfo_areainfo'];
echo ":</strong>";
echo $output['order_info']['point_areainfo'];
echo "</li>\r\n            <li><strong>";
echo $lang['admin_pointorder_info_shipinfo_zipcode'];
echo ":</strong>";
echo $output['order_info']['point_zipcode'];
echo "</li>\r\n            <li><strong>";
echo $lang['admin_pointorder_info_shipinfo_telphone'];
echo ":</strong>";
echo $output['order_info']['point_telphone'];
echo "</li>\r\n            <li><strong>";
echo $lang['admin_pointorder_info_shipinfo_mobphone'];
echo ":</strong>";
echo $output['order_info']['point_mobphone'];
echo "</li>\r\n            <li><strong>";
echo $lang['admin_pointorder_info_shipinfo_address'];
echo ":</strong>";
echo $output['order_info']['point_address'];
echo "</li>\r\n            ";
if ( $output['order_info']['point_shippingcode'] != "" )
{
		echo "            <li><strong>";
		echo $lang['admin_pointorder_shipping_code'];
		echo ":</strong>";
		echo $output['order_info']['point_shippingcode'];
		echo "</li>\r\n            ";
}
echo "            ";
if ( $output['order_info']['point_shippingtime'] != "" )
{
		echo "            <li><strong>";
		echo $lang['admin_pointorder_shipping_time'];
		echo ":</strong>";
		echo date( "Y-m-d", $output['order_info']['point_shippingtime'] );
		echo "</li>\r\n            ";
}
echo "            ";
if ( $output['order_info']['point_shippingdesc'] != "" )
{
		echo "            <li style=\"width:60%;\"><strong>";
		echo $lang['admin_pointorder_info_shipinfo_description'];
		echo ":</strong>";
		echo $output['order_info']['point_shippingdesc'];
		echo "</li>\r\n            ";
}
echo "          </ul></td>\r\n      </tr>\r\n      <tr>\r\n        <th>";
echo $lang['admin_pointorder_info_prodinfo'];
echo "</th>\r\n      </tr>\r\n      <tr>\r\n        <td><table class=\"table tb-type2 goods \">\r\n            <tbody>\r\n              <tr>\r\n                <th></th>\r\n                <th></th>\r\n                <th>";
echo $lang['admin_pointorder_exchangepoints'];
echo "</th>\r\n                <th>";
echo $lang['admin_pointorder_info_prodinfo_exnum'];
echo "</th>\r\n              </tr>\r\n              ";
foreach ( $output['prod_list'] as $v )
{
		echo "              <tr>\r\n                <td class=\"w60 picture\"><div class=\"size-56x56\"><span class=\"thumb size-56x56\"><i></i><a href=\"";
		echo SiteUrl;
		echo "/index.php?act=pointprod&op=pinfo&id=";
		echo $v['point_goodsid'];
		echo "\" target=\"_blank\" class=\"order_info_pic\"> <img src=\"";
		echo SiteUrl.DS.ATTACH_POINTPROD.DS.$v['point_goodsimage']."_small.".get_image_type( $v['point_goodsimage'] );
		echo "\" onerror=\"this.src='";
		echo SiteUrl.DS.defaultgoodsimage( "tiny" );
		echo "'\" onload=\"javascript:DrawImage(this,56,56);\" /></a></span></div></td>\r\n                <td class=\"w50pre\"><a href=\"";
		echo SiteUrl;
		echo "/index.php?act=pointprod&op=pinfo&id=";
		echo $v['point_goodsid'];
		echo "\" target=\"_blank\">";
		echo $v['point_goodsname'];
		echo "</a></td>\r\n                <td>";
		echo $v['point_goodspoints'];
		echo "</td>\r\n                <td>";
		echo $v['point_goodsnum'];
		echo "</td>\r\n              </tr>";
}
echo "            </tbody>\r\n          </table></td>\r\n      </tr>\r\n    </tbody>\r\n    <tfoot>\r\n      <tr class=\"tfoot\">\r\n        <td><a href=\"index.php?act=pointorder&op=pointorder_list\" class=\"btn\"><span>";
echo $lang['admin_pointorder_gobacklist'];
echo "</span></a></td>\r\n      </tr>\r\n    </tfoot>\r\n  </table>\r\n</div>\r\n";
?>
