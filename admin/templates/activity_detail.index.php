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
echo $lang['activity_index_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=activity&op=activity\" ><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=activity&op=new\" ><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['activity_index_deal_apply'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  \r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" name=\"formSearch\">\r\n  \t<input type=\"hidden\" name=\"id\" value=\"";
echo $_GET['id'];
echo "\">\r\n    <input type=\"hidden\" name=\"act\" value=\"activity\">\r\n    <input type=\"hidden\" name=\"op\" value=\"detail\">\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label for=\"searchtitle\">";
echo $lang['activity_detail_index_store'];
echo "</label></th>\r\n          <td><input type=\"text\" name=\"searchstore\" id=\"searchstore\" class=\"txt\" value='";
echo $_GET['searchstore'];
echo "'></td>\r\n          <th><label for=\"searchtitle\">";
echo $lang['activity_detail_index_goods_name'];
echo "</label></th>\r\n          <td><input type=\"text\" name=\"searchgoods\" id=\"searchgoods\" class=\"txt\" value='";
echo $_GET['searchgoods'];
echo "'></td>\r\n          <td><select name=\"searchstate\">\r\n              <option value=\"0\" ";
if ( !$_GET['searchstate'] )
{
		echo "selected=selected";
}
echo ">";
echo $lang['activity_detail_index_auditstate'];
echo "</option>\r\n              <option value=\"1\" ";
if ( $_GET['searchstate'] == 1 )
{
		echo "selected=selected";
}
echo ">";
echo $lang['activity_detail_index_to_audit'];
echo "</option>\r\n              <option value=\"2\" ";
if ( $_GET['searchstate'] == 2 )
{
		echo "selected=selected";
}
echo ">";
echo $lang['activity_detail_index_passed'];
echo "</option>\r\n              <option value=\"3\" ";
if ( $_GET['searchstate'] == 3 )
{
		echo "selected=selected";
}
echo ">";
echo $lang['activity_detail_index_unpassed'];
echo "</option>\r\n            </select>\r\n          </td>\r\n          <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a></td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  \r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th class=\"nobg\" colspan=\"12\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li>";
echo $lang['activity_detail_index_tip1'];
echo "</li>\r\n            <li>";
echo $lang['activity_detail_index_tip2'];
echo "</li>\r\n            <li>";
echo $lang['activity_detail_index_tip3'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  \r\n  <form method='post' action=\"index.php\" id=\"listform\">\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th></th>\r\n          <th>";
echo $lang['nc_sort'];
echo "</th>\r\n          <th>";
echo $lang['activity_detail_index_goods_name'];
echo "</th>\r\n          <th>";
echo $lang['activity_detail_index_store'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['nc_status'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody id=\"treet1\">\r\n        ";
if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
{
		echo "        ";
		foreach ( $output['list'] as $k => $v )
		{
				echo "        <tr class=\"hover\">\r\n          <td class=\"w24\"><input type=\"checkbox\" name='activity_detail_id[]' value=\"";
				echo $v['activity_detail_id'];
				echo "\" class=\"checkitem\"></td>\r\n          <td class=\"w48 sort\"><span class=\"tooltip editable\" title=\"";
				echo $lang['nc_editable'];
				echo "\" style=\"cursor:pointer;\"  required=\"1\" fieldid=\"";
				echo $v['activity_detail_id'];
				echo "\" ajax_branch='activity_detail_sort' fieldname=\"activity_detail_sort\" nc_type=\"inline_edit\">";
				echo $v['activity_detail_sort'];
				echo "</span></td>\r\n          <td><a target=\"_blank\" href=\"";
				echo SiteUrl;
				echo "/index.php?act=goods&goods_id=";
				echo $v['item_id'];
				echo "&id=";
				echo $v['store_id'];
				echo "\">";
				echo $v['item_name'];
				echo "</a></td>\r\n          <td><a target=\"_blank\" href=\"";
				echo SiteUrl;
				echo "/index.php?act=show_store&id=";
				echo $v['store_id'];
				echo "\">";
				echo $v['store_name'];
				echo "</a></td>\r\n          <td class=\"align-center\">\r\n          \t";
				switch ( $v['activity_detail_state'] )
				{
				case "0" :
						echo $lang['activity_detail_index_to_audit'];
						break;
				case "1" :
						echo $lang['activity_detail_index_passed'];
						break;
				case "2" :
						echo $lang['activity_detail_index_unpassed'];
				}
				echo "\t\t  </td>\r\n          <td class=\"w150 align-center\">\r\n          \t";
				if ( $v['activity_detail_state'] != "1" )
				{
						echo "            \t<a href=\"index.php?act=activity&op=deal&activity_detail_id=";
						echo $v['activity_detail_id'];
						echo "&state=1\">";
						echo $lang['activity_detail_index_pass'];
						echo "</a>\r\n            ";
				}
				echo "            ";
				if ( $v['activity_detail_state'] == "0" )
				{
						echo "            \t&nbsp;|&nbsp;\r\n            ";
				}
				echo "            ";
				if ( $v['activity_detail_state'] != "2" )
				{
						echo "            \t<a href=\"index.php?act=activity&op=deal&activity_detail_id=";
						echo $v['activity_detail_id'];
						echo "&state=2\">";
						echo $lang['activity_detail_index_refuse'];
						echo "</a>\r\n            ";
				}
				echo "            ";
				if ( $v['activity_detail_state'] == "0" || $v['activity_detail_state'] == "2" )
				{
						echo "            \t&nbsp;|&nbsp;<a href=\"javascript:void(0)\" onclick=\"if(confirm('";
						echo $lang['nc_ensure_del'];
						echo "')){location.href='index.php?act=activity&op=del_detail&activity_detail_id=";
						echo $v['activity_detail_id'];
						echo "';}\">";
						echo $lang['nc_del'];
						echo "</a></td>\r\n            ";
				}
				echo "        </tr>\r\n        ";
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
		echo "      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td><input type=\"checkbox\" class=\"checkall\" id=\"checkall_1\"></td>\r\n          <td colspan=\"16\" id=\"batchAction\">\r\n          \t<label for=\"checkall_1\">";
		echo $lang['nc_select_all'];
		echo "</label>&nbsp;&nbsp;\r\n            <a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"javascript:submit_form('pass');\"><span>";
		echo $lang['activity_detail_index_pass'];
		echo "</span></a>\r\n            <a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"javascript:submit_form('refuse');\"><span>";
		echo $lang['activity_detail_index_refuse'];
		echo "</span></a>\r\n            <a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"javascript:submit_form('del');\"><span>";
		echo $lang['nc_del'];
		echo "</span></a>\r\n            <div class=\"pagination\">";
		echo $output['show_page'];
		echo "</div>\r\n          </td>\r\n        </tr>\r\n      </tfoot>\r\n      ";
}
echo "    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.edit.js\" charset=\"utf-8\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.goods_class.js\" charset=\"utf-8\"></script>\r\n<script type=\"text/javascript\">\r\nfunction submit_form(op){\r\n\tif(op=='del'){\r\n\t\tif(!confirm('";
echo $lang['nc_ensure_del'];
echo "')){\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\t\$('#listform').attr('action','index.php?act=activity&op=del_detail');\r\n\t}else if(op=='pass'){\r\n\t\tif(!confirm('";
echo $lang['activity_detail_index_pass_all'];
echo "')){\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\t\$('#listform').attr('action','index.php?act=activity&op=deal&state=1');\r\n\t}else if(op=='refuse'){\r\n\t\tif(!confirm('";
echo $lang['activity_detail_index_refuse_all'];
echo "')){\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\t\$('#listform').attr('action','index.php?act=activity&op=deal&state=2');\r\n\t}\r\n\t\$('#listform').submit();\r\n}\r\n</script>";
?>
