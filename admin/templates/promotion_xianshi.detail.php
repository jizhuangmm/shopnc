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
echo "<script type=\"text/javascript\">\r\nfunction submit_cancel_batch(){\r\n    /* 获取选中的项 */\r\n    var items = '';\r\n    \$('.checkitem:checked').each(function(){\r\n        items += this.value + ',';\r\n    });\r\n    if(items != '') {\r\n        items = items.substr(0, (items.length - 1));\r\n        submit_cancel(items);\r\n    }  \r\n    else {\r\n        alert('";
echo $lang['nc_please_select_item'];
echo "');\r\n    }\r\n}\r\nfunction submit_cancel(id){\r\n    if(confirm('";
echo $lang['nc_ensure_cancel'];
echo "')) {\r\n        \$('#list_form').attr('method','post');\r\n        \$('#list_form').attr('action','index.php?act=promotion_xianshi&op=xianshi_quota_cancel');\r\n        \$('#object_id').val(id);\r\n        \$('#list_form').submit();\r\n    }\r\n}\r\n</script>\r\n\r\n<div class=\"page\">\r\n  <!-- 页面导航 -->\r\n  <div class=\"fixed-bar\">\r\n    <div class=\"item-title\">\r\n      <h3>";
echo $lang['promotion_xianshi'];
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
echo $lang['xianshi_name'].":".$output['xianshi_info']['xianshi_name'];
echo "</li>\r\n            <li>\r\n            ";
echo $lang['start_time'].":".date( "Y-m-d", $output['xianshi_info']['start_time'] )." ".$lang['end_time'].":".date( "Y-m-d", $output['xianshi_info']['end_time'] )."  ".$lang['nc_state'].":".$output['state_list'][$output['xianshi_info']['state']];
echo "            </li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <!-- 列表 -->\r\n  <form id=\"list_form\" method=\"post\">\r\n    <input type=\"hidden\" id=\"object_id\" name=\"object_id\"  />\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n        <th width=\"50\"></th>\r\n        <th class=\"align-left\"><span>";
echo $lang['goods_name'];
echo "</span></th>\r\n        <th class=\"align-center\" width=\"120\"><span>";
echo $lang['goods_store_price'];
echo "</span></th>\r\n        <th class=\"align-center\" width=\"120\"><span>";
echo $lang['xianshi_discount'];
echo "</span></th>\r\n        <th class=\"align-center\" width=\"120\"><span>";
echo $lang['xianshi_buy_limit'];
echo "</span></th>\r\n        <th class=\"align-center\" width=\"60\"><span>";
echo $lang['nc_state'];
echo "</span></th>\r\n          </tr>\r\n      </thead>\r\n      <tbody id=\"treet1\">\r\n        ";
if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
{
		echo "        ";
		foreach ( $output['list'] as $k => $val )
		{
				echo "        <tr class=\"hover\">\r\n            <td valign=\"middle\" class=\"align2\"><a href=\"";
				echo SiteUrl.DS;
				echo "index.php?act=goods&goods_id=";
				echo $val['goods_id'];
				echo "&id=";
				echo $output['xianshi_info']['store_id'];
				echo "\" target=\"_blank\"><img src=\"";
				echo $val['goods_image'];
				echo "\" onload=\"javascript:DrawImage(this,50,50);\" /></a></td>\r\n            <td class=\"align-left\"><a href=\"";
				echo SiteUrl.DS;
				echo "index.php?act=goods&goods_id=";
				echo $val['goods_id'];
				echo "&id=";
				echo $output['xianshi_info']['store_id'];
				echo "\" target=\"_blank\"><span>";
				echo $val['goods_name'];
				echo "</span></a></td>\r\n        <td class=\"align-center\"><span>";
				echo $val['goods_store_price'];
				echo "</span></td>\r\n        <td class=\"align-center\"><span>";
				echo $val['discount'];
				echo "</span></td>\r\n        <td class=\"align-center\"><span>";
				echo $val['buy_limit'];
				echo "</span></td>\r\n        <td class=\"align-center\"><span>";
				echo $output['xianshi_goods_state_list'][$val['state']];
				echo "</span></td>\r\n        </tr>\r\n        ";
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
