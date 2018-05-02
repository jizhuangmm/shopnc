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
echo "      </ul>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <!--  搜索 -->\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" name=\"formSearch\">\r\n    <input type=\"hidden\" name=\"act\" value=\"promotion_mansong\">\r\n    <input type=\"hidden\" name=\"op\" value=\"mansong_list\">\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label for=\"mansong_name\">";
echo $lang['mansong_name'];
echo "</label></th>\r\n          <td><input type=\"text\" value=\"";
echo $_GET['mansong_name'];
echo "\" name=\"mansong_name\" id=\"mansong_name\" class=\"txt\" style=\"width:100px;\"></td>\r\n          <th><label for=\"store_name\">";
echo $lang['store_name'];
echo "</label></th>\r\n          <td><input type=\"text\" value=\"";
echo $_GET['store_name'];
echo "\" name=\"store_name\" id=\"store_name\" class=\"txt\" style=\"width:100px;\"></td>\r\n          <th><label for=\"\">";
echo $lang['nc_state'];
echo "</label></th>\r\n          <td>\r\n              <select name=\"state\">\r\n                  ";
if ( is_array( $output['mansong_state_list'] ) )
{
		echo "                  ";
		foreach ( $output['mansong_state_list'] as $key => $val )
		{
				echo "                  <option value=\"";
				echo $key;
				echo "\" ";
				if ( intval( $key ) === intval( $_GET['state'] ) )
				{
						echo "selected";
				}
				echo ">";
				echo $val;
				echo "</option>\r\n                  ";
		}
		echo "                  ";
}
echo "              </select>\r\n          </td>\r\n          <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a></td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <!-- 帮助 -->\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\" class=\"nobg\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li>";
echo $lang['mansong_list_help1'];
echo "</li>\r\n            <li>";
echo $lang['mansong_list_help2'];
echo "</li>\r\n            <li>";
echo $lang['mansong_list_help3'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <!-- 列表 -->\r\n  <form id=\"list_form\" method=\"post\">\r\n    <input type=\"hidden\" id=\"object_id\" name=\"object_id\"  />\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n          <tr class=\"thead\">\r\n              <th class=\"align-left\"><span>";
echo $lang['mansong_name'];
echo "</span></th>\r\n              <th class=\"align-left\" width=\"240\"><span>";
echo $lang['store_name'];
echo "</span></th>\r\n              <th class=\"align-center\" width=\"100\"><span>";
echo $lang['start_time'];
echo "</span></th>\r\n              <th class=\"align-center\" width=\"100\"><span>";
echo $lang['end_time'];
echo "</span></th>\r\n              <th class=\"align-center\" width=\"80\"><span>";
echo $lang['nc_state'];
echo "</span></th>\r\n              <th class=\"align-center\" width=\"120\"><span>";
echo $lang['nc_handle'];
echo "</span></th>\r\n          </tr>\r\n      </thead>\r\n      <tbody id=\"treet1\">\r\n        ";
if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
{
		echo "        ";
		foreach ( $output['list'] as $k => $val )
		{
				echo "        <tr class=\"hover\">\r\n            <td class=\"align-left\"><span>";
				echo $val['mansong_name'];
				echo "</span></td>\r\n            <td class=\"align-left\"><a href=\"";
				echo SiteUrl;
				echo "/index.php?act=show_store&id=";
				echo $val['store_id'];
				echo "\" target=\"_blank\"><span>";
				echo $val['store_name'];
				echo "</span></a></td>\r\n            <td class=\"align-center\"><span>";
				echo date( "Y-m-d", $val['start_time'] );
				echo "</span></td>\r\n            <td class=\"align-center\"><span>";
				echo date( "Y-m-d", $val['end_time'] );
				echo "</span></td>\r\n            <td class=\"align-center\"><span>";
				echo $output['mansong_state_list'][$val['state']];
				echo "</span></td>\r\n\r\n            <td class=\"nowrap align-center\">\r\n                <!-- 详细按钮 --> \r\n                <a href=\"index.php?act=promotion_mansong&op=mansong_detail&mansong_id=";
				echo $val['mansong_id'];
				echo "\">";
				echo $lang['nc_detail'];
				echo "</a>\r\n                <!-- 失效按钮 --> \r\n                ";
				if ( intval( $val['state'] ) === intval( $output['mansong_state_published'] ) )
				{
						echo "                <a class=\"delete\" href=\"javascript:if(confirm('";
						echo $lang['ensure_invaditation'];
						echo "'))window.location = 'index.php?act=promotion_mansong&op=mansong_invaditation&mansong_id=";
						echo $val['mansong_id'];
						echo "';\">";
						echo $lang['nc_invalidation'];
						echo "</a>\r\n                ";
				}
				echo "            </td>\r\n        </tr>\r\n        ";
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
		echo "      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td>";
		if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
		{
				echo "            ";
		}
		echo "</td>\r\n          <td colspan=\"16\"></label>\r\n            <div class=\"pagination\"> ";
		echo $output['show_page'];
		echo " </div></td>\r\n        </tr>\r\n      </tfoot>\r\n      ";
}
echo "    </table>\r\n  </form>\r\n</div>\r\n";
?>
