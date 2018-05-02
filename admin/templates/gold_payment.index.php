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
echo $lang['nc_pay_method'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['payment_index_sites'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=gold_payment&op=payment\"><span>";
echo $lang['payment_index_store'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\" class=\"nobg\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li>";
echo $lang['payment_index_help3'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <table class=\"table tb-type2\">\r\n    <thead>\r\n      <tr class=\"thead\">\r\n        <th>";
echo $lang['payment_index_name'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['payment_index_enable'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n      </tr>\r\n    </thead>\r\n    <tbody>\r\n      ";
if ( !empty( $output['payment_list'] ) || is_array( $output['payment_list'] ) )
{
		foreach ( $output['payment_list'] as $k => $v )
		{
				echo "      <tr class=\"hover\">\r\n        <td>";
				echo $v['payment_name'];
				echo "</td>\r\n        <td class=\"w25pre align-center\">";
				if ( $v['payment_state'] == "1" )
				{
						echo "          ";
						echo $lang['nc_yes'];
						echo "          ";
				}
				else
				{
						echo "          ";
						echo $lang['nc_no'];
						echo "          ";
				}
				echo "</td>\r\n        <td class=\"w156 align-center\">";
				if ( $v['payment_state'] == "1" )
				{
						echo "          <a href=\"javascript:void(0)\" onclick=\"if(confirm('";
						echo $lang['payment_index_ensure_disable'];
						echo "?')){location.href='index.php?act=gold_payment&op=set&state=2&payment_id=";
						echo $v['payment_id'];
						echo "'}\"> ";
						echo $lang['payment_index_disable'];
						echo "</a>\r\n          ";
				}
				else
				{
						echo "          <a href=\"index.php?act=gold_payment&op=set&state=1&payment_id=";
						echo $v['payment_id'];
						echo "\">";
						echo $lang['payment_index_enable'];
						echo "</a>\r\n          ";
				}
				echo "          | <a href=\"index.php?act=gold_payment&op=edit&payment_id=";
				echo $v['payment_id'];
				echo "\">";
				echo $lang['nc_edit'];
				echo "</a></td>\r\n      </tr>\r\n      ";
		}
}
echo "    </tbody>\r\n    <tfoot>\r\n      <tr class=\"tfoot\">\r\n        <td colspan=\"15\"></td>\r\n      </tr>\r\n    </tfoot>\r\n  </table>\r\n</div>\r\n";
?>
