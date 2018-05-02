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
echo $lang['activity_index_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=activity&op=new\" ><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" name=\"formSearch\">\r\n    <input type=\"hidden\" name=\"act\" value=\"activity\">\r\n    <input type=\"hidden\" name=\"op\" value=\"activity\">\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label for=\"searchtitle\">";
echo $lang['activity_index_title'];
echo "</label></th>\r\n          <td><input type=\"text\" name=\"searchtitle\" id=\"searchtitle\" class=\"txt\" value='";
echo $_GET['searchtitle'];
echo "'></td>\r\n          <td><select name=\"searchstate\">\r\n              <option value=\"0\" ";
if ( !$_GET['searchstate'] )
{
		echo "selected=selected";
}
echo ">";
echo $lang['activity_openstate'];
echo "</option>\r\n              <option value=\"2\" ";
if ( $_GET['searchstate'] == 2 )
{
		echo "selected=selected";
}
echo ">";
echo $lang['activity_openstate_open'];
echo "</option>\r\n              <option value=\"1\" ";
if ( $_GET['searchstate'] == 1 )
{
		echo "selected=selected";
}
echo ">";
echo $lang['activity_openstate_close'];
echo "</option>\r\n            </select>\r\n          </td>\r\n          <th colspan=\"1\"><label for=\"searchstartdate\">";
echo $lang['activity_index_periodofvalidity'];
echo "</label></th>\r\n          <td>\r\n          \t<input type=\"text\" name=\"searchstartdate\" id=\"searchstartdate\" class=\"txt date\" readonly='' value='";
echo $_GET['searchstartdate'];
echo "'>~<input type=\"text\" name=\"searchenddate\" id=\"searchenddate\" class=\"txt date\" readonly='' value='";
echo $_GET['searchenddate'];
echo "'></td>\r\n          <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a></td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th class=\"nobg\" colspan=\"12\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li>";
echo $lang['activity_index_help1'];
echo "</li>\r\n            <li>";
echo $lang['activity_index_help2'];
echo "</li>\r\n            <li>";
echo $lang['activity_index_help3'];
echo "</li>\r\n            <li>";
echo $lang['activity_index_help4'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form id=\"listform\" action=\"index.php\" method='post'>\r\n    <input type=\"hidden\" name=\"act\" value=\"activity\" />\r\n    <input type=\"hidden\" id=\"listop\" name=\"op\" value=\"del\" />\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th class=\"w24\">&nbsp;</th>\r\n          <th class=\"w48 \">";
echo $lang['nc_sort'];
echo "</th>\r\n          <th class=\"w270\">";
echo $lang['activity_index_title'];
echo "</th>\r\n          <th class=\"w96\">";
echo $lang['activity_index_banner'];
echo "</th>\r\n          <!-- <th class=\"align-center\">";
echo $lang['activity_index_type'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['activity_index_style'];
echo "</th> -->\r\n          <th class=\"align-center\">";
echo $lang['activity_index_start'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['activity_index_end'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['activity_openstate'];
echo "</th>\r\n          <th class=\"w150 align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody id=\"treet1\">\r\n        ";
if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
{
		echo "        ";
		foreach ( $output['list'] as $k => $v )
		{
				echo "        <tr class=\"hover edit row\">\r\n          <td><input type=\"checkbox\" name='activity_id[]' value=\"";
				echo $v['activity_id'];
				echo "\" class=\"checkitem\"></td>\r\n          <td class=\"sort\"><span class=\"tooltip editable\" title=\"";
				echo $lang['nc_editable'];
				echo "\" required=\"1\" fieldid=\"";
				echo $v['activity_id'];
				echo "\" ajax_branch='activity_sort' fieldname=\"activity_sort\" nc_type=\"inline_edit\" >";
				echo $v['activity_sort'];
				echo "</span></td>\r\n          <td class=\"name\"><span class=\"tooltip editable\" title=\"";
				echo $lang['nc_editable'];
				echo "\" required=\"1\" fieldid=\"";
				echo $v['activity_id'];
				echo "\" ajax_branch='activity_title' fieldname=\"activity_title\" nc_type=\"inline_edit\" >";
				echo $v['activity_title'];
				echo "</span></td>\r\n          <td><div class=\"link-logo\"><span class=\"thumb size-logo\"><i></i><img height=\"31\" width=\"88\" src=\"";
				if ( is_file( BasePath.DS.ATTACH_ACTIVITY.DS.$v['activity_banner'] ) )
				{
						echo SiteUrl."/".ATTACH_ACTIVITY."/".$v['activity_banner'];
				}
				else
				{
						echo SiteUrl."/templates/".TPL_NAME."/images/sale_banner.jpg";
				}
				echo "\" onload=\"javascript:DrawImage(this,88,31);\" /></span></div></td>\r\n          <!-- <td class=\"align-center\">";
				switch ( $v['activity_type'] )
				{
				case "1" :
						echo $lang['activity_index_goods'];
						break;
				case "2" :
						echo $lang['activity_index_group'];
				}
				echo "</td>\r\n          <td class=\"nowarp align-center\">";
				switch ( $v['activity_style'] )
				{
				case "default_style" :
						echo $lang['activity_index_default'];
				}
				echo "</td> -->\r\n          <td class=\"nowrap align-center\">";
				echo date( "Y-m-d", $v['activity_start_date'] );
				echo "</td>\r\n          <td class=\"align-center\">";
				echo date( "Y-m-d", $v['activity_end_date'] );
				echo "</td>\r\n          <td class=\"align-center\">";
				echo $v['activity_state'] == 1 ? $lang['activity_openstate_open'] : $lang['activity_openstate_close'];
				echo "</td>\r\n          <td class=\"align-center\">\r\n          \t<a href=\"index.php?act=activity&op=edit&activity_id=";
				echo $v['activity_id'];
				echo "\">";
				echo $lang['nc_edit'];
				echo "</a>&nbsp;|&nbsp;\r\n          \t";
				if ( $v['activity_state'] == 0 || $v['activity_end_date'] < time( ) )
				{
						echo "          \t<a href=\"javascript:void(0)\" onclick=\"if(confirm('";
						echo $lang['nc_ensure_del'];
						echo "')){location.href='index.php?act=activity&op=del&activity_id=";
						echo $v['activity_id'];
						echo "';}\">";
						echo $lang['nc_del'];
						echo "</a>&nbsp;|&nbsp;\r\n          \t";
				}
				echo "          \t<a href=\"index.php?act=activity&op=detail&id=";
				echo $v['activity_id'];
				echo "\">";
				echo $lang['activity_index_deal_apply'];
				echo "</a>\r\n          </td>\r\n        </tr>\r\n        ";
		}
		echo "        ";
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
		echo "        <tr class=\"tfoot\">\r\n          <td><input type=\"checkbox\" class=\"checkall\" id=\"checkallBottom\" name=\"chkVal\"></td>\r\n          <td colspan=\"16\"><label for=\"checkallBottom\">";
		echo $lang['nc_select_all'];
		echo "</label>\r\n            &nbsp;&nbsp;<a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"submit_form('del');\"><span>";
		echo $lang['nc_del'];
		echo "</span></a>\r\n            <div class=\"pagination\"> ";
		echo $output['show_page'];
		echo " </div></td>\r\n        </tr>\r\n        ";
}
echo "      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<link type=\"text/css\" rel=\"stylesheet\" href=\"";
echo RESOURCE_PATH."/js/jquery-ui/themes/ui-lightness/jquery.ui.css";
echo "\"/>\r\n<script src=\"";
echo RESOURCE_PATH."/js/jquery-ui/jquery.ui.js";
echo "\"></script> \r\n<script src=\"";
echo RESOURCE_PATH."/js/jquery-ui/i18n/zh-CN.js";
echo "\" charset=\"utf-8\"></script>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.edit.js\" charset=\"utf-8\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.goods_class.js\" charset=\"utf-8\"></script>\r\n<script type=\"text/javascript\">\r\n\$(\"#searchstartdate\").datepicker({dateFormat: 'yy-mm-dd'});\r\n\$(\"#searchenddate\").datepicker({dateFormat: 'yy-mm-dd'});\r\nfunction submit_form(op){\r\n\tif(op=='del'){\r\n\t\tif(!confirm('";
echo $lang['nc_ensure_del'];
echo "')){\r\n\t\t\treturn false;\r\n\t\t}\r\n\t}\r\n\t\$('#listop').val(op);\r\n\t\$('#listform').submit();\r\n}\r\n</script>";
?>
