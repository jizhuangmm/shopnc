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
echo $lang['nc_pointprod'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['admin_pointprod_list_title'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=pointprod&op=prod_add\" ><span>";
echo $lang['admin_pointprod_add_title'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=pointorder&op=pointorder_list\" ><span>";
echo $lang['admin_pointorder_list_title'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" name=\"formSearch\">\r\n    <input type=\"hidden\" name=\"act\" value=\"pointprod\">\r\n    <input type=\"hidden\" name=\"op\" value=\"pointprod\">\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label for=\"pg_name\">";
echo $lang['admin_pointprod_goods_name'];
echo "</label></th>\r\n          <td><input type=\"text\" name=\"pg_name\" id=\"pg_name\" class=\"txt\" value='";
echo $_GET['pg_name'];
echo "'></td>\r\n          <td><select name=\"pg_state\">\r\n              <option value=\"\" ";
if ( !$_GET['pg_state'] )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_pointprod_state'];
echo "</option>\r\n              <option value=\"show\" ";
if ( $_GET['pg_state'] == "show" )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_pointprod_show_up'];
echo "</option>\r\n              <option value=\"nshow\" ";
if ( $_GET['pg_state'] == "nshow" )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_pointprod_show_down'];
echo "</option>\r\n              <option value=\"commend\" ";
if ( $_GET['pg_state'] == "commend" )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_pointprod_commend'];
echo "</option>\r\n            </select></td>\r\n          <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a>\r\n            ";
if ( $output['search_field_value'] != "" || $output['search_sort'] != "" )
{
		echo "            <a href=\"index.php?act=member&op=member\" class=\"btns tooltip\"><span>";
		echo $lang['nc_cancel_search'];
		echo "</span></a>\r\n            ";
}
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <form method='post' id=\"form_prod\" action=\"index.php\">\r\n    <input type=\"hidden\" name=\"act\" value=\"pointprod\">\r\n    <input type=\"hidden\" id=\"list_op\" name=\"op\" value=\"prod_dropall\">\r\n    <table class=\"table tb-type2 nobdb\">\r\n      <thead>\r\n        <tr class=\"space\">\r\n          <th colspan=\"15\">";
echo $lang['nc_list'];
echo "</th>\r\n        </tr>\r\n        <tr class=\"thead\">\r\n          <th>&nbsp;</th>\r\n          <th>&nbsp;</th>\r\n          <th>";
echo $lang['admin_pointprod_goods_name'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['admin_pointprod_goods_points'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['admin_pointprod_goods_price'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['admin_pointprod_goods_storage'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['admin_pointprod_goods_view'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['admin_pointprod_salenum'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['admin_pointprod_show_up'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['admin_pointprod_commend'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['prod_list'] ) || is_array( $output['prod_list'] ) )
{
		echo "        ";
		foreach ( $output['prod_list'] as $k => $v )
		{
				echo "        <tr class=\"hover\">\r\n          <td class=\"w24\"><input type=\"checkbox\" name=\"pg_id[]\" value=\"";
				echo $v['pgoods_id'];
				echo "\" class=\"checkitem\"></td>\r\n          <td class=\"w48 picture\"><div class=\"size-44x44\"><span class=\"thumb size-44x44\"><i></i><img height=\"44\" width=\"44\" src=\"";
				echo SiteUrl.DS.ATTACH_POINTPROD.DS.$v['pgoods_image']."_small.".get_image_type( $v['pgoods_image'] );
				echo "\" onerror=\"this.src='";
				echo defaultgoodsimage( "tiny" );
				echo "'\" onload=\"javascript:DrawImage(this,44,44);\"/></span></div></td>\r\n          <td><a href=\"";
				echo SiteUrl.DS;
				echo "index.php?act=pointprod&op=pinfo&id=";
				echo $v['pgoods_id'];
				echo "\" target=\"_blank\" >";
				echo $v['pgoods_name'];
				echo "</a></td>\r\n          <td class=\"align-center\">";
				echo $v['pgoods_points'];
				echo "</td>\r\n          <td class=\"align-center\">";
				echo $v['pgoods_price'];
				echo "</td>\r\n          <td class=\"align-center\">";
				echo $v['pgoods_storage'];
				echo "</td>\r\n          <td class=\"align-center\">";
				echo $v['pgoods_view'];
				echo "</td>\r\n          <td class=\"align-center\">";
				echo $v['pgoods_salenum'];
				echo "</td>\r\n          <td class=\"align-center power-onoff\">";
				if ( $v['pgoods_show'] == "0" )
				{
						echo "            <a href=\"JavaScript:void(0);\" class=\"tooltip disabled\" ajax_branch='pgoods_show' nc_type=\"inline_edit\" fieldname=\"pgoods_show\" fieldid=\"";
						echo $v['pgoods_id'];
						echo "\" fieldvalue=\"0\" title=\"";
						echo $lang['nc_editable'];
						echo "\"><img src=\"";
						echo TEMPLATES_PATH;
						echo "/images/transparent.gif\"></a>\r\n            ";
				}
				else
				{
						echo "            <a href=\"JavaScript:void(0);\" class=\"tooltip enabled\" ajax_branch='pgoods_show' nc_type=\"inline_edit\" fieldname=\"pgoods_show\" fieldid=\"";
						echo $v['pgoods_id'];
						echo "\" fieldvalue=\"1\" title=\"";
						echo $lang['nc_editable'];
						echo "\"><img src=\"";
						echo TEMPLATES_PATH;
						echo "/images/transparent.gif\"></a>\r\n            ";
				}
				echo "</td>\r\n          <td class=\"align-center yes-onoff\">";
				if ( $v['pgoods_commend'] == "0" )
				{
						echo "            <a href=\"JavaScript:void(0);\" class=\"tooltip disabled\" ajax_branch='pgoods_commend' nc_type=\"inline_edit\" fieldname=\"pgoods_commend\" fieldid=\"";
						echo $v['pgoods_id'];
						echo "\" fieldvalue=\"0\" title=\"";
						echo $lang['nc_editable'];
						echo "\"><img src=\"";
						echo TEMPLATES_PATH;
						echo "/images/transparent.gif\"></a>\r\n            ";
				}
				else
				{
						echo "            <a href=\"JavaScript:void(0);\" class=\"tooltip enabled\" ajax_branch='pgoods_commend' nc_type=\"inline_edit\" fieldname=\"pgoods_commend\" fieldid=\"";
						echo $v['pgoods_id'];
						echo "\" fieldvalue=\"1\" title=\"";
						echo $lang['nc_editable'];
						echo "\"><img src=\"";
						echo TEMPLATES_PATH;
						echo "/images/transparent.gif\"></a>\r\n            ";
				}
				echo "</td>\r\n          <td class=\"w72 align-center\"><a href=\"index.php?act=pointprod&op=prod_edit&pg_id=";
				echo $v['pgoods_id'];
				echo "\" class=\"edit\">";
				echo $lang['nc_edit'];
				echo "</a> | <a href=\"javascript:void(0)\" onclick=\"if(confirm('";
				echo $lang['nc_ensure_del'];
				echo "')){window.location='index.php?act=pointprod&op=prod_drop&pg_id=";
				echo $v['pgoods_id'];
				echo "';}else{return false;}\">";
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
echo "      </tbody>\r\n      <tfoot>\r\n        <tr>\r\n          <td><input type=\"checkbox\" class=\"checkall\" id=\"checkallBottom\"></td>\r\n          <td colspan=\"16\" id=\"dataFuncs\"><label for=\"checkallBottom\">";
echo $lang['nc_select_all'];
echo "</label>\r\n            &nbsp;&nbsp;<a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"submit_form('prod_dropall');\"><span>";
echo $lang['nc_del'];
echo "</span></a>\r\n            <div class=\"pagination\"> ";
echo $output['show_page'];
echo " </div></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.edit.js\" charset=\"utf-8\"></script> \r\n<script type=\"text/javascript\">\r\nfunction submit_form(op){\r\n\tif(op=='prod_dropall'){\r\n\t\tif(!confirm('";
echo $lang['nc_ensure_del'];
echo "')){\r\n\t\t\treturn false;\r\n\t\t}\r\n\t}\r\n\t\$('#list_op').val(op);\r\n\t\$('#form_prod').submit();\r\n}\r\n</script>";
?>
