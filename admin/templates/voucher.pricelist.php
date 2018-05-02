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
echo $lang['nc_voucher_price_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        ";
foreach ( $output['menu'] as $menu )
{
		if ( $menu['menu_key'] == $output['menu_key'] )
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
echo "      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n    <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th class=\"nobg\" colspan=\"12\"><div class=\"title\"><h5>";
echo $lang['nc_prompts'];
echo "</h5><span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n        <ul>\r\n\t\t\t<li>";
echo $lang['admin_voucher_price_tip1'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form method='post' id=\"list_form\" action=\"index.php?act=voucher&op=pricedrop\">\r\n    <input type=\"hidden\" id=\"voucher_price_id\" name=\"voucher_price_id\" value=\"\" />\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th class=\"w24\"></th>\r\n          <th>";
echo $lang['admin_voucher_price_describe'];
echo "</th>\r\n          <th>";
echo $lang['admin_voucher_price_title'];
echo "(";
echo $lang['currency_zh'];
echo ")</th>\r\n          <th>";
echo $lang['admin_voucher_price_points'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
{
		echo "        ";
		foreach ( $output['list'] as $v )
		{
				echo "        <tr class=\"hover\">\r\n          <td><input type=\"checkbox\" name='voucher_price_checkbox' value=\"";
				echo $v['voucher_price_id'];
				echo "\" class=\"checkitem\"></td>\r\n          <td><span>";
				echo $v['voucher_price_describe'];
				echo "</span></td>\r\n          <td><span>";
				echo $v['voucher_price'];
				echo "</span></td>\r\n          <td><span>";
				echo $v['voucher_defaultpoints'];
				echo "</span></td>\r\n          <td class=\"w96 align-center\">\r\n          \t<a href=\"index.php?act=voucher&op=priceedit&priceid=";
				echo $v['voucher_price_id'];
				echo "\">";
				echo $lang['nc_edit'];
				echo "</a>\r\n          \t<a href=\"JavaScript:void(0);\" onclick=\"submit_delete('";
				echo $v['voucher_price_id'];
				echo "')\">";
				echo $lang['nc_del'];
				echo "</a>\r\n          </td>\r\n          ";
		}
		echo "          ";
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
		echo "      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td>";
		if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
		{
				echo "            <input type=\"checkbox\" class=\"checkall\" id=\"checkall_1\">\r\n            ";
		}
		echo "</td>\r\n          <td colspan=\"16\">\r\n          \t<label for=\"checkallBottom\">";
		echo $lang['nc_select_all'];
		echo "</label>&nbsp;&nbsp;\r\n          \t<a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"submit_delete_batch()\"><span>";
		echo $lang['nc_del'];
		echo "</span></a>\r\n            <div class=\"pagination\"> ";
		echo $output['show_page'];
		echo " </div></td>\r\n        </tr>\r\n      </tfoot>\r\n      ";
}
echo "    </table>\r\n  </form>\r\n</div> \r\n<script type=\"text/javascript\">\r\nfunction submit_delete_batch(){\r\n    /* 获取选中的项 */\r\n    var items = '';\r\n    \$('.checkitem:checked').each(function(){\r\n        items += this.value + ',';\r\n    });\r\n    if(items != '') {\r\n        items = items.substr(0, (items.length - 1));\r\n        submit_delete(items);\r\n    }  \r\n}\r\nfunction submit_delete(voucher_price_id){\r\n    if(confirm('";
echo $lang['nc_ensure_del'];
echo "')) {\r\n        \$('#list_form').attr('method','post');\r\n        \$('#voucher_price_id').val(voucher_price_id);\r\n        \$('#list_form').submit();\r\n    }\r\n}\r\n</script>";
?>
