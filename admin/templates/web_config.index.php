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
echo "\n<div class=\"page\">\n  <div class=\"fixed-bar\">\n    <div class=\"item-title\">\n      <h3>";
echo $lang['web_config_index'];
echo "</h3>\n      <ul class=\"tab-base\">\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\n      </ul>\n    </div>\n  </div>\n  <div class=\"fixed-empty\"></div>\n  <table class=\"table tb-type2\" id=\"prompt\">\n    <tbody>\n      <tr class=\"space odd\">\n        <th colspan=\"12\"><div class=\"title\"><h5>";
echo $lang['nc_prompts'];
echo "</h5><span class=\"arrow\"></span></div></th>\n      </tr>\n      <tr>\n        <td>\n        <ul>\n            <li>";
echo $lang['web_config_index_help1'];
echo "</li>\n            <li>";
echo $lang['web_config_index_help2'];
echo "</li>\n            <li>";
echo $lang['web_config_index_help3'];
echo "</li>\n          </ul></td>\n      </tr>\n    </tbody>\n  </table>\n    <table class=\"table tb-type2 nobdb\">\n      <thead>\n        <tr class=\"thead\">\n          <th>";
echo $lang['nc_sort'];
echo "</th>\n          <th>";
echo $lang['web_config_web_name'];
echo "</th>\n          <th>";
echo $lang['web_config_style_name'];
echo "</th>\n          <th class=\"align-center\">";
echo $lang['web_config_update_time'];
echo "</th>\n          <th class=\"align-center\">";
echo $lang['nc_display'];
echo "</th>\n          <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\n        </tr>\n      </thead>\n      <tbody>\n        ";
if ( !empty( $output['web_list'] ) || is_array( $output['web_list'] ) )
{
		echo "        ";
		foreach ( $output['web_list'] as $k => $v )
		{
				echo "        <tr class=\"hover\">\n          <td class=\"w48 sort\">";
				echo $v['web_sort'];
				echo "</td>\n          <td>";
				echo $v['web_name'];
				echo "</td>\n          <td>";
				echo $output['style_array'][$v['style_name']];
				echo "</td>\n          <td class=\"w150 align-center\">";
				echo date( "Y-m-d H:i:s", $v['update_time'] );
				echo "</td>\n          <td class=\"w150 align-center\">";
				echo $v['web_show'] == 1 ? $lang['nc_yes'] : $lang['nc_no'];
				echo "</td>\n          <td class=\"w150 align-center\"><a href=\"index.php?act=web_config&op=web_edit&web_id=";
				echo $v['web_id'];
				echo "\">";
				echo $lang['web_config_web_edit'];
				echo "</a> | \n          \t<a href=\"index.php?act=web_config&op=code_edit&web_id=";
				echo $v['web_id'];
				echo "\">";
				echo $lang['web_config_code_edit'];
				echo "</a></td>\n        </tr>\n        ";
		}
		echo "        ";
}
else
{
		echo "        <tr class=\"no_data\">\n          <td colspan=\"15\">";
		echo $lang['nc_no_record'];
		echo "</td>\n        </tr>\n        ";
}
echo "      </tbody>\n      <tfoot>\n        ";
if ( !empty( $output['web_list'] ) || is_array( $output['web_list'] ) )
{
		echo "        <tr class=\"tfoot\">\n          <td colspan=\"16\">\n            <div class=\"pagination\"> ";
		echo $output['page'];
		echo " </div></td>\n        </tr>\n        ";
}
echo "      </tfoot>\n    </table>\n</div>";
?>
