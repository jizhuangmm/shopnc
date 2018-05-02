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
echo $lang['payment_index_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=gold_payment&op=gold_payment\"><span>";
echo $lang['payment_index_sites'];
echo "</span></a></li>\r\n\t\t<li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['payment_index_store'];
echo "</span></a></li>                \r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\" class=\"nobg\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li>";
echo $lang['payment_index_help1'];
echo "</li>\r\n            <li>";
echo $lang['payment_index_help2'];
echo " </li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <table class=\"table tb-type2\">\r\n    <thead>\r\n      <tr class=\"thead\">\r\n        <th>";
echo $lang['payment_index_name'];
echo "</th>\r\n        <th>";
echo $lang['payment_index_desc'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['payment_index_enable'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['payment_index_currency'];
echo "</th>\r\n        <!-- <th>";
echo $lang['payment_index_version'];
echo "</th> -->\r\n        <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n      </tr>\r\n    </thead>\r\n    <tbody>\r\n      ";
if ( !empty( $output['payment_list'] ) || is_array( $output['payment_list'] ) )
{
		foreach ( $output['payment_list'] as $k => $v )
		{
				echo "      <tr class=\"hover\">\r\n        <td>";
				echo $v['name'];
				echo "</td>\r\n        <td class=\"w50pre\">";
				echo $v['content'];
				echo "</td>\r\n        <td class=\"align-center\">";
				if ( @in_array( $v['code'], $output['payment_inc'] ) )
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
				echo "</td>\r\n        <td class=\"align-center\">";
				echo $v['currency'];
				echo "</td>\r\n        <!-- <td class=\"table-center\">";
				echo $v['version'];
				echo "</td> -->\r\n        <td class=\"w60 align-center\">";
				if ( @in_array( $v['code'], $output['payment_inc'] ) )
				{
						echo "          <a href=\"javascript:void(0)\" onclick=\"if(confirm('";
						echo $lang['payment_index_ensure_disable'];
						echo "?')){location.href='index.php?act=gold_payment&op=payment_set&state=close&code=";
						echo $v['code'];
						echo "'}\">";
						echo $lang['payment_index_disable'];
						echo "</a>\r\n          ";
				}
				else
				{
						echo "          <a href=\"index.php?act=gold_payment&op=payment_set&state=open&code=";
						echo $v['code'];
						echo "\">";
						echo $lang['payment_index_enable'];
						echo "</a>\r\n          ";
				}
				echo "</td>\r\n      </tr>\r\n      ";
		}
}
echo "    </tbody>\r\n    <tfoot>\r\n      <tr class=\"tfoot\">\r\n        <td colspan=\"15\"></td>\r\n      </tr>\r\n    </tfoot>\r\n  </table>\r\n</div>\r\n";
?>
