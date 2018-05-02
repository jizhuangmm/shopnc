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
echo "<div class=\"page\">\r\n  <div class=\"fixed-bar\">\r\n    <div class=\"item-title\">\r\n      <h3>";
echo $lang['nc_binding_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_binding_manage'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\" class=\"nobg\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n        \t<ul>\r\n        \t\t<li>";
echo $lang['shareset_list_tip'];
echo "</li>\r\n        \t</ul>\r\n         </td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <table class=\"table tb-type2\">\r\n    <thead>\r\n      <tr class=\"thead\">\r\n        <th>";
echo $lang['shareset_list_appname'];
echo "</th>\r\n        <th>";
echo $lang['shareset_list_appurl'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['shareset_list_appstate'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n      </tr>\r\n    </thead>\r\n    <tbody>\r\n      ";
if ( !empty( $output['app_arr'] ) || is_array( $output['app_arr'] ) )
{
		foreach ( $output['app_arr'] as $k => $v )
		{
				echo "      <tr class=\"hover\">\r\n        <td>";
				echo $v['name'];
				echo "</td>\r\n        <td>";
				echo $v['url'];
				echo "</td>\r\n        <td class=\"w25pre align-center\">\r\n        \t";
				if ( $v['isuse'] == "1" )
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
				echo "        </td>\r\n        <td class=\"w156 align-center\">\r\n        \t";
				if ( $v['isuse'] == "1" )
				{
						echo "        \t\t<a href=\"javascript:void(0)\" onclick=\"if(confirm('";
						echo $lang['shareset_list_closeprompt'];
						echo "')){location.href='index.php?act=sns_sharesetting&op=set&state=0&key=";
						echo $k;
						echo "'}\"> ";
						echo $lang['nc_close'];
						echo "</a>\r\n        \t";
				}
				else
				{
						echo "        \t\t<a href=\"index.php?act=sns_sharesetting&op=set&state=1&key=";
						echo $k;
						echo "\">";
						echo $lang['nc_open'];
						echo "</a>\r\n        \t";
				}
				echo "        \t| <a href=\"index.php?act=sns_sharesetting&op=edit&state=1&key=";
				echo $k;
				echo "\">";
				echo $lang['nc_edit'];
				echo "</a></td>\r\n      </tr>\r\n      ";
		}
}
echo "    </tbody>\r\n    <tfoot>\r\n      <tr class=\"tfoot\">\r\n        <td colspan=\"15\"></td>\r\n      </tr>\r\n    </tfoot>\r\n  </table>\r\n</div>";
?>
