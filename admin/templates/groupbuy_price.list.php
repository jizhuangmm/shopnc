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
echo $lang['groupbuy_index_manage'];
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
echo "      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th class=\"nobg\" colspan=\"12\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li>";
echo $lang['groupbuy_price_range_help1'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form id=\"list_form\" method='post'>\r\n    <input id=\"range_id\" name=\"range_id\" type=\"hidden\" />\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th></th>\r\n          <th>";
echo $lang['range_name'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['range_start'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['range_end'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
{
		echo "        ";
		foreach ( $output['list'] as $val )
		{
				echo "        <tr class=\"hover\">\r\n          <td class=\"w36\"><input type=\"checkbox\"  value=\"";
				echo $val['range_id'];
				echo "\" class=\"checkitem\"></td>\r\n          <td>";
				echo $val['range_name'];
				echo "</td>\r\n          <td class=\"w18pre align-center\">";
				echo $val['range_start'];
				echo "</td>\r\n          <td class=\"w18pre align-center\">";
				echo $val['range_end'];
				echo "</td>\r\n          <td class=\"w156 align-center\"><a href=\"index.php?act=groupbuy&op=price_edit&range_id=";
				echo $val['range_id'];
				echo "\">";
				echo $lang['nc_edit'];
				echo "</a> | <a href=\"JavaScript:void(0);\" onClick=\"submit_delete('";
				echo $val['range_id'];
				echo "')\">";
				echo $lang['nc_del'];
				echo "</a></td>\r\n        </tr>\r\n        ";
		}
		echo "        ";
}
else
{
		echo "        <tr class=\"no_data\">\r\n          <td colspan=\"10\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      ";
if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
{
		echo "      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td><input type=\"checkbox\" class=\"checkall\" id=\"checkall_1\"></td>\r\n          <td id=\"batchAction\" colspan=\"15\"><span class=\"all_checkbox\">\r\n            <label for=\"checkall_1\">";
		echo $lang['nc_select_all'];
		echo "</label>\r\n            </span>&nbsp;&nbsp; <a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"submit_delete_batch();\"><span>";
		echo $lang['nc_del'];
		echo "</span></a>\r\n        </tr>\r\n      </tfoot>\r\n      ";
}
echo "    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.edit.js\" charset=\"utf-8\"></script> \r\n<script type=\"text/javascript\">\r\nfunction submit_delete_batch(){\r\n    /* 获取选中的项 */\r\n    var items = '';\r\n    \$('.checkitem:checked').each(function(){\r\n        items += this.value + ',';\r\n    });\r\n    if(items != '') {\r\n        items = items.substr(0, (items.length - 1));\r\n        submit_delete(items);\r\n    }  \r\n    else {\r\n        alert('";
echo $lang['nc_please_select_item'];
echo "');\r\n    }\r\n}\r\nfunction submit_delete(id){\r\n    if(confirm('";
echo $lang['nc_ensure_del'];
echo "')) {\r\n        \$('#list_form').attr('method','post');\r\n        \$('#list_form').attr('action','index.php?act=groupbuy&op=price_drop');\r\n        \$('#range_id').val(id);\r\n        \$('#list_form').submit();\r\n    }\r\n}\r\n\r\n</script>\r\n";
?>
