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
echo $lang['order_state'];
echo "</th>\r\n      </tr>\r\n      <tr>\r\n        <td colspan=\"2\"><ul>\r\n            <li>\r\n            <strong>";
echo $lang['order_number'];
echo ":</strong>";
echo $output['list'][0]['order_sn'];
echo "            </li>\r\n            <li><strong>";
echo $lang['order_state'];
echo ":</strong>";
echo orderstateinfo( $output['list'][0]['order_state'] );
echo "</li>\r\n            <li><strong>";
echo $lang['order_total_price'];
echo ":</strong><span class=\"red_common\">";
echo $lang['currency'].$output['list'][0]['order_amount'];
echo " </span><!--(";
echo $lang['offer'];
echo ":";
echo $lang['currency'].$output['list'][0]['discount'];
echo ")--></li>\r\n            <li><strong>";
echo $lang['order_total_transport'];
echo ":</strong>";
echo $lang['currency'].$output['list'][0]['shipping_fee'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n      <tr class=\"space\">\r\n        <th colspan=\"2\">";
echo $lang['order_detail'];
echo "</th>\r\n      </tr>\r\n      <tr>\r\n        <th>";
echo $lang['order_info'];
echo "</th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li><strong>";
echo $lang['buyer_name'];
echo ":</strong>";
echo $output['list'][0]['buyer_name'];
echo "</li>\r\n            <li><strong>";
echo $lang['seller_name'];
echo ":</strong>";
echo $output['list'][0]['member_name'];
echo "</li>\r\n            ";
if ( $output['list'][0]['payment_name'] != "" )
{
		echo "            <li><strong>";
		echo $lang['payment'];
		echo ":</strong>";
		echo $output['list'][0]['payment_name'];
		echo "</li>\r\n            ";
}
echo "            ";
if ( $output['list'][0]['pay_message'] != "" )
{
		echo "            <li><strong>";
		echo $lang['pay_message'];
		echo ":</strong>\r\n\t\t      \t";
		$tmp = unserialize( $output['list'][0]['pay_message'] );
		echo "\t      \t\t";
		if ( $tmp !== FALSE )
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
				echo "\t\t      ";
		}
		else
		{
				echo "\t\t     \t";
				echo $output['list'][0]['pay_message'];
				echo "\t\t      ";
		}
		echo "            </li>\r\n            ";
}
echo "            <li><strong>";
echo $lang['order_time'];
echo ":</strong>";
echo date( "Y-m-d H:i:s", $output['list'][0]['add_time'] );
echo "</li>\r\n            ";
if ( $output['list'][0]['payment_time'] != "" )
{
		echo "            <li><strong>";
		echo $lang['payment_time'];
		echo ":</strong>";
		echo date( "Y-m-d H:i:s", $output['list'][0]['payment_time'] );
		echo "</li>\r\n            ";
}
echo "            ";
if ( $output['list'][0]['shipping_time'] != "" )
{
		echo "            <li><strong>";
		echo $lang['ship_time'];
		echo ":</strong>";
		echo date( "Y-m-d H:i:s", $output['list'][0]['shipping_time'] );
		echo "</li>\r\n            ";
}
echo "            ";
if ( $output['list'][0]['finnshed_time'] != "" )
{
		echo "            <li><strong>";
		echo $lang['complate_time'];
		echo ":</strong>";
		echo date( "Y-m-d H:i:s", $output['list'][0]['finnshed_time'] );
		echo "</li>\r\n            ";
}
echo "            ";
if ( $output['list'][0]['order_message'] != "" )
{
		echo "            <li><strong>";
		echo $lang['buyer_message'];
		echo ":</strong>";
		echo $output['list'][0]['order_message'];
		echo "</li>\r\n            ";
}
echo "          </ul></td>\r\n      </tr>\r\n      <tr>\r\n        <th>";
echo $lang['consignee_ship_order_info'];
echo "</th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li><strong>";
echo $lang['consignee_name'];
echo ":</strong>";
echo $output['list'][0]['true_name'];
echo "</li>\r\n            <li><strong>";
echo $lang['region'];
echo ":</strong>";
echo $output['list'][0]['area_info'];
echo "</li>\r\n            <li><strong>";
echo $lang['zip'];
echo ":</strong>";
echo $output['list'][0]['zip_code'];
echo "</li>\r\n            <li><strong>";
echo $lang['tel_phone'];
echo ":</strong>";
echo $output['list'][0]['tel_phone'];
echo "</li>\r\n            <li><strong>";
echo $lang['mob_phone'];
echo ":</strong>";
echo $output['list'][0]['mob_phone'];
echo "</li>\r\n            <li><strong>";
echo $lang['address'];
echo ":</strong>";
echo $output['list'][0]['address'];
echo "</li>\r\n            <li><strong>";
echo $lang['ship_method'];
echo ":</strong>";
echo $output['list'][0]['shipping_name'];
echo "</li>\r\n            ";
if ( $output['list'][0]['shipping_code'] != "" )
{
		echo "            <li><strong>";
		echo $lang['ship_code'];
		echo ":</strong>";
		echo $output['list'][0]['shipping_code'];
		echo "</li>\r\n            ";
}
echo "          </ul></td>\r\n      </tr>\r\n      <tr>\r\n        <th>";
echo $lang['product_info'];
echo "</th>\r\n      </tr>\r\n      <tr>\r\n        <td><table class=\"table tb-type2 goods \">\r\n            <tbody>\r\n              <tr>\r\n                <th></th>\r\n                <th>";
echo $lang['product_info'];
echo "</th>\r\n                <th class=\"align-center\">";
echo $lang['product_spec'];
echo "</th>\r\n                <th class=\"align-center\">";
echo $lang['product_price'];
echo "</th>\r\n                <th class=\"align-center\">";
echo $lang['product_num'];
echo "</th>\r\n              </tr>\r\n              ";
foreach ( $output['list'] as $goods )
{
		echo "              <tr>\r\n                <td class=\"w60 picture\"><div class=\"size-56x56\"><span class=\"thumb size-56x56\"><i></i><a href=\"";
		echo SiteUrl;
		echo "/index.php?act=goods&goods_id=";
		echo $goods['goods_id'];
		echo "&id=";
		echo $goods['store_id'];
		echo "\" target=\"_blank\"><img alt=\"";
		echo $lang['product_pic'];
		echo "\" src=\"";
		echo thumb( $goods, "tiny" );
		echo "\" onload=\"javascript:DrawImage(this,56,56);\"/> </a></span></div></td>\r\n                <td class=\"w50pre\"><a href=\"";
		echo SiteUrl;
		echo "/index.php?act=goods&goods_id=";
		echo $goods['goods_id'];
		echo "&id=";
		echo $goods['store_id'];
		echo "\" target=\"_blank\">";
		echo $goods['goods_name'];
		echo "</a></td>\r\n                <td class=\"align-center\">";
		echo $goods['spec_info'];
		echo "</td>\r\n                <td class=\"w96 align-center\"><span class=\"red_common\">";
		echo $lang['currency'].$goods['goods_price'];
		echo "</span></td>\r\n                <td class=\"w96 align-center\">";
		echo $goods['goods_num'];
		echo "</td>\r\n              </tr>\r\n              ";
}
echo "            </tbody>\r\n          </table></td>\r\n      </tr>\r\n      <tr>\r\n      \t<th>";
echo $lang['nc_promotion'];
echo "</th>\r\n      </tr>\r\n      <tr>\r\n          <td>\r\n  <!-- S 促销信息 -->\r\n      ";
if ( !empty( $output['list'][0]['group_id'] ) )
{
		echo "      <span style=\"color:red\">";
		echo $lang['nc_groupbuy'];
		echo "</span>\r\n      <a href=\"";
		echo SiteUrl.DS.ncurl( array(
				"act" => "show_groupbuy",
				"op" => "groupbuy_detail",
				"group_id" => $output['list'][0]['group_id'],
				"id" => $output['list'][0]['store_id']
		), "groupbuy" );
		echo "\" target=\"_blank\">";
		echo $lang['nc_groupbuy_view'];
		echo "</a>\r\n      ";
}
echo "      ";
if ( !empty( $output['list'][0]['xianshi_id'] ) )
{
		echo "      <span style=\"color:red\">";
		echo $output['list'][0]['xianshi_explain'];
		echo "</span>\r\n      ";
}
echo "      ";
if ( !empty( $output['list'][0]['mansong_id'] ) )
{
		echo "      <span style=\"color:red\">";
		echo $output['list'][0]['mansong_explain'];
		echo "</span>\r\n      ";
}
echo "      ";
if ( !empty( $output['list'][0]['bundling_id'] ) )
{
		echo "      <span style=\"color:red\">";
		echo $output['list'][0]['bundling_explain'];
		echo "</span>\r\n      ";
}
echo "  <!-- E 促销信息 -->\r\n\r\n          </td>\r\n      </tr>\r\n    </tbody>\r\n    <tfoot>\r\n      <tr class=\"tfoot\">\r\n        <td><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"history.go(-1)\"><span>";
echo $lang['nc_back'];
echo "</span></a></td>\r\n      </tr>\r\n    </tfoot>\r\n  </table>\r\n</div>\r\n";
?>
