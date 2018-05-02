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
echo "<div class=\"page\">\r\n  <div class=\"fixed-bar\">\r\n    <div class=\"item-title\">\r\n      <h3>绑定管理</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>绑定管理</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\" class=\"nobg\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li></li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <table class=\"table tb-type2\">\r\n    <thead>\r\n      <tr class=\"thead\">\r\n        <th>平台名称</th>\r\n        <th>网址</th>\r\n        <th class=\"align-center\">启用</th>\r\n        <th class=\"align-center\">操作</th>\r\n      </tr>\r\n    </thead>\r\n    <tbody>\r\n      ";
if ( !empty( $output['api_arr'] ) || is_array( $output['api_arr'] ) )
{
		foreach ( $output['api_arr'] as $k => $v )
		{
				echo "      <tr class=\"hover\">\r\n        <td>";
				echo $v['name'];
				echo "</td>\r\n        <td>";
				echo $v['url'];
				echo "</td>\r\n        <td class=\"w25pre align-center\">\r\n        \t";
				if ( $v['payment_state'] == "1" )
				{
						echo "        \t\t";
						echo $lang['nc_yes'];
						echo "        \t";
				}
				else
				{
						echo "        \t\t";
						echo $lang['nc_no'];
						echo "        \t";
				}
				echo "</td>\r\n        <td class=\"w156 align-center\">\r\n        \t";
				if ( $v['payment_state'] == "1" )
				{
						echo "        \t\t<a href=\"javascript:void(0)\" onclick=\"if(confirm('";
						echo $lang['payment_index_ensure_disable'];
						echo "?')){location.href='index.php?act=gold_payment&op=set&state=2&payment_id=";
						echo $v['payment_id'];
						echo "'}\"> ";
						echo $lang['payment_index_disable'];
						echo "</a>\r\n        \t";
				}
				else
				{
						echo "        \t\t<a href=\"index.php?act=gold_payment&op=set&state=1&payment_id=";
						echo $v['payment_id'];
						echo "\">";
						echo $lang['payment_index_enable'];
						echo "</a>\r\n        \t";
				}
				echo "        \t| <a href=\"index.php?act=gold_payment&op=edit&payment_id=";
				echo $v['payment_id'];
				echo "\">";
				echo $lang['nc_edit'];
				echo "</a></td>\r\n      </tr>\r\n      ";
		}
}
echo "    </tbody>\r\n    <tfoot>\r\n      <tr class=\"tfoot\">\r\n        <td colspan=\"15\"></td>\r\n      </tr>\r\n    </tfoot>\r\n  </table>\r\n</div>";
?>
