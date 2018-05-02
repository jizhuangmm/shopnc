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
echo "<script type=\"text/javascript\">\r\nfunction submit_delete_batch(){\r\n    /* 获取选中的项 */\r\n    var items = '';\r\n    \$('.checkitem:checked').each(function(){\r\n        items += this.value + ',';\r\n    });\r\n    if(items != '') {\r\n        items = items.substr(0, (items.length - 1));\r\n        submit_delete(items);\r\n    }  \r\n    else {\r\n        alert('";
echo $lang['nc_please_select_item'];
echo "');\r\n    }\r\n}\r\nfunction submit_delete(id){\r\n    if(confirm('";
echo $lang['nc_ensure_del'];
echo "')) {\r\n        \$('#list_form').attr('method','post');\r\n        \$('#list_form').attr('action','index.php?act=groupbuy&op=groupbuy_drop');\r\n        \$('#group_id').val(id);\r\n        \$('#list_form').submit();\r\n    }\r\n}\r\n</script>\r\n\r\n<div class=\"page\">\r\n  <div class=\"fixed-bar\">\r\n    <div class=\"item-title\">\r\n      <h3>";
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
echo "      </ul>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\" class=\"nobg\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li>";
echo $lang['groupbuy_index_help1'];
echo "</li>\r\n            <li>";
echo $lang['groupbuy_index_help2'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form id=\"list_form\" method=\"post\">\r\n    <input type=\"hidden\" id=\"group_id\" name=\"group_id\"  />\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th>&nbsp; </th>\r\n          <th colspan=\"2\">";
echo $lang['groupbuy_index_name'];
echo "</th>\r\n          <th>";
echo $lang['groupbuy_template_name'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['groupbuy_index_start_time'];
echo " - ";
echo $lang['groupbuy_index_end_time'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['groupbuy_index_state'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['groupbuy_index_click'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['nc_recommend'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody id=\"treet1\">\r\n        ";
if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
{
		echo "        ";
		foreach ( $output['list'] as $k => $val )
		{
				echo "        <tr class=\"hover\">\r\n          <td class=\"w24\"><input type=\"checkbox\" value=\"";
				echo $val['group_id'];
				echo "\" class=\"checkitem\"></td>\r\n          <td class=\"w60 picture\"><div class=\"size-56x56\"><span class=\"thumb size-56x56\"><i></i><a target=\"_blank\" href=\"";
				echo SiteUrl."/index.php?act=show_groupbuy&op=groupbuy_detail&group_id=".$val['group_id'];
				echo "\"><img src=\"";
				echo SiteUrl."/upload/groupbuy/".$val['group_pic'];
				echo "\"  onload=\"javascript:DrawImage(this,56,56);\"/></a></span></div></td>\r\n          <td class=\"group\"><p><a target=\"_blank\" href=\"";
				echo SiteUrl."/index.php?act=show_groupbuy&op=groupbuy_detail&group_id=".$val['group_id'];
				echo "\">";
				echo $val['group_name'];
				echo "</a></p>\r\n            <p class=\"goods\">";
				echo $lang['groupbuy_index_goods_name'];
				echo ":<a target=\"_blank\" href=\"";
				echo SiteUrl."/index.php?act=goods&goods_id=".$val['goods_id']."&id=".$val['store_id'];
				echo "\" title=\"";
				echo $val['goods_name'];
				echo "\">";
				echo $val['goods_name'];
				echo "</a></p>\r\n            <p class=\"store\">";
				echo $lang['groupbuy_index_store_name'];
				echo ":<a target=\"_blank\" href=\"";
				echo SiteUrl."/index.php?act=show_store&id=".$val['store_id'];
				echo "\" title=\"";
				echo $val['store_name'];
				echo "\">";
				echo $val['store_name'];
				echo "</a></p></td>\r\n          <td>";
				echo $val['template_name'];
				echo "</td>\r\n          <td  class=\"align-center nowarp\"><p>";
				echo date( "Y".$lang['nc_year']."m".$lang['nc_month']."d".$lang['nc_day'], $val['start_time'] );
				echo "</p>\r\n            <p>-</p>\r\n            <p>";
				echo $val['end_time'] == 0 ? $lang['groupbuy_index_long_group'] : date( "Y".$lang['nc_year']."m".$lang['nc_month']."d".$lang['nc_day'], $val['end_time'] );
				echo "</p></td>\r\n          <td class=\"align-center\">";
				$group_state = $val['state'];
				echo $output['state_list'][$group_state];
				echo "</td>\r\n          <td class=\"align-center\">";
				echo $val['views'] == 0 ? "0" : $val['views'];
				echo "</td>\r\n          <td class=\"yes-onoff align-center\">";
				if ( $val['recommended'] == "0" )
				{
						echo "            <a href=\"JavaScript:void(0);\" class=\"tooltip disabled\" ajax_branch='recommended' nc_type=\"inline_edit\" fieldname=\"recommended\" fieldid=\"";
						echo $val['group_id'];
						echo "\" fieldvalue=\"0\" title=\"";
						echo $lang['nc_editable'];
						echo "\"><img src=\"";
						echo TEMPLATES_PATH;
						echo "/images/transparent.gif\"></a>\r\n            ";
				}
				else
				{
						echo "            <a href=\"JavaScript:void(0);\" class=\"tooltip enabled\" ajax_branch='recommended' nc_type=\"inline_edit\" fieldname=\"recommended\" fieldid=\"";
						echo $val['group_id'];
						echo "\" fieldvalue=\"1\" title=\"";
						echo $lang['nc_editable'];
						echo "\"><img src=\"";
						echo TEMPLATES_PATH;
						echo "/images/transparent.gif\"></a>\r\n            ";
				}
				echo "</td>\r\n          <td class=\"nowrap align-center\"><!-- 查看按钮 --> \r\n            <a href=\"";
				echo SiteUrl."/index.php?act=show_groupbuy&op=groupbuy_detail&group_id=".$val['group_id'];
				echo "\" target=\"_blank\">";
				echo $lang['nc_detail'];
				echo "</a> | \r\n            <!-- 审核按钮 -->\r\n            \r\n            ";
				if ( $val['state'] == 1 )
				{
						echo "            <a href=\"javascript:void(0)\" onclick=\"if(confirm('";
						echo $lang['ensure_verify_success'];
						echo "')){location.href='";
						echo "index.php?act=groupbuy&op=groupbuy_verify_success&group_id=".$val['group_id'];
						echo "';}\">";
						echo $lang['verify_success'];
						echo "</a> | <a href=\"javascript:void(0)\" onclick=\"if(confirm('";
						echo $lang['ensure_verify_fail'];
						echo "')){location.href='";
						echo "index.php?act=groupbuy&op=groupbuy_verify_fail&group_id=".$val['group_id'];
						echo "';}\">";
						echo $lang['verify_fail'];
						echo "</a> | \r\n            ";
				}
				echo "            \r\n            <!-- 结束按钮 -->\r\n            \r\n            ";
				if ( $val['state'] == 3 )
				{
						echo "            <a href=\"javascript:void(0)\" onclick=\"if(confirm('";
						echo $lang['ensure_close'];
						echo "')){location.href='";
						echo "index.php?act=groupbuy&op=groupbuy_close&group_id=".$val['group_id'];
						echo "';}\">";
						echo $lang['op_close'];
						echo "</a> | \r\n            ";
				}
				echo "            \r\n            <!-- 删除按钮 --> \r\n            <a href=\"javascript:void(0)\" onclick=\"submit_delete('";
				echo $val['group_id'];
				echo "');\">";
				echo $lang['nc_del'];
				echo "</a></td>\r\n        </tr>\r\n        ";
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
		echo "      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td><input type=\"checkbox\" class=\"checkall\" id=\"checkallBottom\"></td>\r\n          <td colspan=\"16\"><label>\r\n            <label for=\"checkallBottom\">";
		echo $lang['nc_select_all'];
		echo "</label>\r\n            </span>&nbsp;&nbsp; <a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"submit_delete_batch()\"><span>";
		echo $lang['nc_del'];
		echo "</span></a>\r\n            <div class=\"pagination\">";
		echo $output['show_page'];
		echo " </div></td>\r\n        </tr>\r\n      </tfoot>\r\n      ";
}
echo "    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.edit.js\" charset=\"utf-8\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.goods_class.js\" charset=\"utf-8\"></script> \r\n";
?>
