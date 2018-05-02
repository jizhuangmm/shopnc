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
echo $lang['complain_manage_title'];
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
echo "      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"search_form\" method=\"get\" name=\"formSearch\">\r\n  \t<input type=\"hidden\" name=\"act\" value=\"complain\" />\r\n  \t<input type=\"hidden\" name=\"op\" value=\"complain_subject_list\" />\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label>";
echo $lang['complain_subject_type'];
echo "</label></th>\r\n          <td><select class=\"querySelect\" name=\"complain_subject_type\">\r\n              <option value=\"0\">";
echo $lang['complain_text_select'];
echo "</option>\r\n              <option value=\"1\" ";
if ( $_GET['complain_subject_type'] === "1" )
{
		echo "selected=true";
}
echo ">";
echo $lang['complain_text_buyer'];
echo "</option>\r\n              <option value=\"2\" ";
if ( $_GET['complain_subject_type'] === "2" )
{
		echo "selected=true";
}
echo ">";
echo $lang['complain_text_seller'];
echo "</option>\r\n            </select></td>\r\n          <td><a href=\"JavaScript:void(0);\" onclick=\"document.formSearch.submit()\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a></td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <form method='post' id=\"list_form\" action=\"\">\r\n    <input type=\"hidden\" id=\"complain_subject_id\" name=\"complain_subject_id\" value=\"\" />\r\n    <table class=\"table tb-type2 nobdb\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th class=\"w24\"></th>\r\n          <th>";
echo $lang['complain_subject_content'];
echo "</th>\r\n          <th>";
echo $lang['complain_subject_desc'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['complain_subject_type'];
echo "</th>\r\n          <th class=\"w72 align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
{
		echo "        ";
		foreach ( $output['list'] as $v )
		{
				echo "        <tr class=\"hover\">\r\n          <td><input type=\"checkbox\" name='voucher_price_checkbox' value=\"";
				echo $v['complain_subject_id'];
				echo "\" class=\"checkitem\"></td>\r\n          <td>";
				echo $v['complain_subject_content'];
				echo "</td>\r\n          <td>";
				echo $v['complain_subject_desc'];
				echo "</td>\r\n          <td class=\"align-center\">";
				switch ( intval( $v['complain_subject_type'] ) )
				{
				case 1 :
						echo $lang['complain_text_buyer'];
						break;
				case 2 :
						echo $lang['complain_text_seller'];
						break;
				default :
						echo "";
				}
				echo "</td>\r\n          <td class=\"align-center\"><a href=\"JavaScript:void(0);\" onclick=\"submit_delete('";
				echo $v['complain_subject_id'];
				echo "')\">";
				echo $lang['nc_del'];
				echo "</a></td>\r\n          ";
		}
		echo "          ";
}
else
{
		echo "        <tr class=\"no_data\">\r\n          <td colspan=\"16\">";
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
		echo "</label>\r\n            &nbsp;&nbsp;<a href=\"JavaScript:void(0);\" id=\"btn_batch_drop\" class=\"btn\" onclick=\"submit_delete_batch()\"><span>";
		echo $lang['nc_del'];
		echo "</span></a>\r\n            <div class=\"pagination\"> ";
		echo $output['page'];
		echo " </div></td>\r\n        </tr>\r\n        ";
}
echo "      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.edit.js\" charset=\"utf-8\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.goods_class.js\" charset=\"utf-8\"></script> \r\n<script type=\"text/javascript\">\r\n\r\nfunction submit_delete_batch(){\r\n    /* 获取选中的项 */\r\n    var items = '';\r\n    \$('.checkitem:checked').each(function(){\r\n        items += this.value + ',';\r\n    });\r\n    if(items != '') {\r\n        items = items.substr(0, (items.length - 1));\r\n        submit_delete(items);\r\n    }  \r\n}\r\nfunction submit_delete(complain_subject_id){\r\n    if(confirm('";
echo $lang['confirm_delete'];
echo "')) {\r\n        \$('#list_form').attr('method','post');\r\n        \$('#list_form').attr('action','index.php?act=complain&op=complain_subject_drop');\r\n        \$('#complain_subject_id').val(complain_subject_id);\r\n        \$('#list_form').submit();\r\n    }\r\n}\r\nfunction submit_search() {\r\n    \$('#search_form').attr('method','get');\r\n    \$('#act').val('complain');\r\n    \$('#op').val('complain_subject_list');\r\n    \$('#search_form').submit();\r\n}\r\n\r\n</script>";
?>
