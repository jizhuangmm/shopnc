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
echo "<script type=\"text/javascript\">\r\nfunction submit_verify(id){\r\n    if(confirm('";
echo $lang['confirm_verify'];
echo "')) {\r\n        \$('#list_form').attr('method','post');\r\n        \$('#list_form').attr('action','index.php?act=promotion_mansong&op=mansong_apply_verify');\r\n        \$('#object_id').val(id);\r\n        \$('#list_form').submit();\r\n    }\r\n}\r\nfunction submit_cancel(id){\r\n    if(confirm('";
echo $lang['confirm_cancel'];
echo "')) {\r\n        \$('#list_form').attr('method','post');\r\n        \$('#list_form').attr('action','index.php?act=promotion_mansong&op=mansong_apply_cancel');\r\n        \$('#object_id').val(id);\r\n        \$('#list_form').submit();\r\n    }\r\n}\r\n\r\n</script>\r\n\r\n<div class=\"page\">\r\n  <!-- 页面导航 -->\r\n  <div class=\"fixed-bar\">\r\n    <div class=\"item-title\">\r\n      <h3>";
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
echo "      </ul>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <!-- 帮助 -->\r\n  <div class=\"fixed-empty\"></div>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\" class=\"nobg\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li>";
echo $lang['mansong_apply_list_help1'];
echo "</li>\r\n            <li>";
echo $lang['mansong_apply_list_help2'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <!-- 列表 -->\r\n  <form id=\"list_form\" method=\"post\">\r\n    <input type=\"hidden\" id=\"object_id\" name=\"object_id\"  />\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th>";
echo $lang['store_name'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['apply_quantity'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['apply_date'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['nc_status'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody id=\"treet1\">\r\n        ";
if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
{
		echo "        ";
		foreach ( $output['list'] as $k => $val )
		{
				echo "        <tr class=\"hover\">\r\n          <td class=\"align-left\"><a href=\"";
				echo SiteUrl;
				echo "/index.php?act=show_store&id=";
				echo $val['store_id'];
				echo "\" target=\"_blank\"><span>";
				echo $val['store_name'];
				echo "</span></a></td>\r\n          <td class=\"align-center\">";
				echo $val['apply_quantity'];
				echo "</td>\r\n          <td class=\"align-center\">";
				echo date( "Y-m-d", $val['apply_date'] );
				echo "</td>\r\n          <td class=\"align-center\">\r\n              ";
				switch ( intval( $val['state'] ) )
				{
				case 1 :
						echo $lang['state_new'];
						break;
				case 2 :
						echo $lang['state_verify'];
						break;
				case 3 :
						echo $lang['state_cancel'];
						break;
				case 4 :
						echo $lang['state_verify_fail'];
				}
				echo "          </td>\r\n          <td class=\"nowrap align-center\">\r\n              ";
				if ( intval( $val['state'] ) === 1 )
				{
						echo "              <!-- 审核按钮 -->\r\n              <a href=\"javascript:void(0)\" onclick=\"submit_verify('";
						echo $val['apply_id'];
						echo "')\">";
						echo $lang['nc_verify'];
						echo "</a> |  \r\n              <!-- 取消按钮 --> \r\n              <a href=\"javascript:void(0)\" onclick=\"submit_cancel('";
						echo $val['apply_id'];
						echo "');\">";
						echo $lang['nc_cancel'];
						echo "</a> \r\n              ";
				}
				echo "          </td>\r\n        </tr>\r\n        ";
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
		echo "      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"16\"><label>\r\n            <div class=\"pagination\">";
		echo $output['show_page'];
		echo " </div></td>\r\n        </tr>\r\n      </tfoot>\r\n      ";
}
echo "    </table>\r\n  </form>\r\n</div>\r\n";
?>
