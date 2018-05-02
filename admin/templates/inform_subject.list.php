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
echo $lang['inform_manage_title'];
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
echo "      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"search_form\" method=\"get\" name=\"formSearch\">\r\n    <input type=\"hidden\" id=\"act\" name=\"act\" value=\"inform\" />\r\n    <input type=\"hidden\" id=\"op\" name=\"op\" value=\"inform_subject_list\" />\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th> <label for=\"\"> ";
echo $lang['inform_type'];
echo "</label></th>\r\n          <td><select name=\"inform_subject_type_id\">\r\n              <option value=\"\">";
echo $lang['inform_text_select'];
echo "</option>\r\n              ";
foreach ( $output['type_list'] as $type )
{
		echo "              <option value=\"";
		echo $type['inform_type_id'];
		echo "\"\r\n                  ";
		if ( $_GET['inform_subject_type_id'] == $type['inform_type_id'] )
		{
				echo "selected=true";
		}
		echo "                > ";
		echo $type['inform_type_name'];
		echo " </option>\r\n              ";
}
echo "            </select></td>\r\n          <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a></td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th class=\"nobg\" colspan=\"12\"><div class=\"title\"><h5>";
echo $lang['nc_prompts'];
echo "</h5><span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n        <ul>\r\n            <li>";
echo $lang['inform_help5'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form method='post' id=\"list_form\" action=\"\">\r\n    <input type=\"hidden\" id=\"inform_subject_id\" name=\"inform_subject_id\" value=\"\" />\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th></th>\r\n          <th>";
echo $lang['inform_subject'];
echo "</th>\r\n          <th>";
echo $lang['inform_type'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
{
		echo "        ";
		foreach ( $output['list'] as $v )
		{
				echo "        <tr class=\"hover\">\r\n          <td class=\"w24\"><input type=\"checkbox\" name='voucher_price_checkbox' value=\"";
				echo $v['inform_subject_id'];
				echo "\" class=\"checkitem\"></td>\r\n          <td>";
				echo $v['inform_subject_content'];
				echo "</td>\r\n          <td>";
				echo $v['inform_subject_type_name'];
				echo "</td>\r\n          <td class=\"w72 align-center\"><a href=\"JavaScript:void(0);\" onclick=\"submit_delete('";
				echo $v['inform_subject_id'];
				echo "')\">";
				echo $lang['nc_del'];
				echo "</a></td>\r\n          ";
		}
		echo "          ";
}
else
{
		echo "        <tr class=\"no_data\">\r\n          <td colspan=\"10\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      <tfoot>\r\n        ";
if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
{
		echo "        <tr class=\"tfoot\">\r\n          <td>";
		if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
		{
				echo "            <input type=\"checkbox\" class=\"checkall\" id=\"checkall_1\">\r\n            ";
		}
		echo "</td>\r\n          <td colspan=\"16\"><label for=\"checkall_1\">";
		echo $lang['nc_select_all'];
		echo "</label>\r\n            &nbsp;&nbsp;<a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"submit_delete_batch()\"><span>";
		echo $lang['nc_del'];
		echo "</span></a>\r\n            <div class=\"pagination\">";
		echo $output['show_page'];
		echo "</div></td>\r\n        </tr>\r\n        ";
}
echo "      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.edit.js\" charset=\"utf-8\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.goods_class.js\" charset=\"utf-8\"></script> \r\n<script type=\"text/javascript\">\r\n\r\n\r\nfunction submit_delete_batch(){\r\n    /* 获取选中的项 */\r\n    var items = '';\r\n    \$('.checkitem:checked').each(function(){\r\n        items += this.value + ',';\r\n    });\r\n    if(items != '') {\r\n        items = items.substr(0, (items.length - 1));\r\n        submit_delete(items);\r\n    }  \r\n}\r\nfunction submit_delete(inform_subject_id){\r\n    if(confirm('";
echo $lang['confirm_delete'];
echo "')) {\r\n        \$('#list_form').attr('method','post');\r\n        \$('#list_form').attr('action','index.php?act=inform&op=inform_subject_drop');\r\n        \$('#inform_subject_id').val(inform_subject_id);\r\n        \$('#list_form').submit();\r\n    }\r\n}\r\n\r\n</script> \r\n";
?>
