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
echo "<div class=\"page\">\r\n  <!-- 页面导航 -->\r\n  <div class=\"fixed-bar\">\r\n    <div class=\"item-title\">\r\n      <h3>";
echo $lang['promotion_mansong'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        ";
foreach ( $output['menu'] as $menu )
{
		if ( $menu['menu_type'] == "text" )
		{
				echo "        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
				echo $menu['menu_name'];
				echo "</span></a></li>\r\n        ";
		}
		else
		{
				echo "        <li><a href=\"";
				echo $menu['menu_url'];
				echo "\" ><span>";
				echo $menu['menu_name'];
				echo "</span></a></li>\r\n        ";
		}
}
echo "      </ul>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <!-- 帮助 -->\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\" class=\"nobg\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li>";
echo $lang['mansong_name'].":".$output['mansong_info']['mansong_name'];
echo "</li>\r\n            <li>\r\n            ";
echo $lang['start_time'].":".date( "Y-m-d", $output['mansong_info']['start_time'] )." ".$lang['end_time'].":".date( "Y-m-d", $output['mansong_info']['end_time'] )."  ".$lang['nc_state'].":".$output['mansong_state_list'][$output['mansong_info']['state']];
echo "            </li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <!-- 列表 -->\r\n  <form id=\"list_form\" method=\"post\">\r\n    <input type=\"hidden\" id=\"object_id\" name=\"object_id\"  />\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n        <th class=\"align-center\" width=\"90\"><span>";
echo $lang['text_level'];
echo "</span></th>\r\n        <th class=\"align-center\" width=\"90\"><span>";
echo $lang['level_price'];
echo "</span></th>\r\n        <th class=\"align-center\" width=\"90\"><span>";
echo $lang['shipping_free'];
echo "</span></th>\r\n        <th class=\"align-center\" width=\"90\"><span>";
echo $lang['level_discount'];
echo "</span></th>\r\n        <th class=\"align-left\"><span>";
echo $lang['gift_name'];
echo "</span></th>\r\n          </tr>\r\n      </thead>\r\n      <tbody id=\"treet1\">\r\n        ";
if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
{
		echo "        ";
		foreach ( $output['list'] as $k => $val )
		{
				echo "        <tr class=\"hover\">\r\n        <td class=\"align-center\"><span>";
				echo $val['level'];
				echo "</span></td>\r\n        <td class=\"align-center\"><span>";
				echo $val['price'];
				echo "</span></td>\r\n        <td class=\"align-center\"><span>";
				echo empty( $val['shipping_free'] ) ? $lang['nc_no'] : $lang['nc_yes'];
				echo "</span></td>\r\n        <td class=\"align-center\"><span>";
				echo empty( $val['discount'] ) ? $lang['text_not_join'] : $val['discount'];
				echo "</span></td>\r\n        ";
				if ( empty( $val['gift_name'] ) )
				{
						echo "        <td class=\"align-left\"><span>";
						echo $lang['text_not_join'];
						echo "</span></td>\r\n        ";
				}
				else
				{
						echo "        <td class=\"align-left\">\r\n            <span>";
						echo $val['gift_name'];
						echo "</span>\r\n            ";
						if ( !empty( $val['gift_link'] ) )
						{
								echo "            <a href=\"";
								echo $val['gift_link'];
								echo "\" target=\"_blank\">";
								echo $lang['text_gift'].$lang['text_link'];
								echo "</a>\r\n            ";
						}
						echo "        </td>\r\n        ";
				}
				echo "        </tr>\r\n        ";
		}
		echo "        ";
}
else
{
		echo "        <tr class=\"no_data\">\r\n          <td colspan=\"16\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      ";
if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
{
		echo "      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"16\">\r\n              <div class=\"pagination\"> ";
		echo $output['show_page'];
		echo " </div>\r\n      </td>\r\n        </tr>\r\n      </tfoot>\r\n      ";
}
echo "    </table>\r\n  </form>\r\n</div>\r\n";
?>
