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
echo $lang['admin_points_log_title'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['admin_points_log_title'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" name=\"formSearch\">\r\n    <input type=\"hidden\" name=\"act\" value=\"pointslog\">\r\n    <input type=\"hidden\" name=\"op\" value=\"pointslog\">\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label>";
echo $lang['admin_points_membername'];
echo "</label></th>\r\n          <td><input type=\"text\" name=\"mname\" class=\"txt\" value='";
echo $_GET['mname'];
echo "'></td><th>";
echo $lang['admin_points_addtime'];
echo "</th>\r\n          <td><input type=\"text\" id=\"stime\" name=\"stime\" class=\"txt date\" value=\"";
echo $_GET['stime'];
echo "\" >\r\n            <label>~</label>\r\n            <input type=\"text\" id=\"etime\" name=\"etime\" class=\"txt date\" value=\"";
echo $_GET['etime'];
echo "\" ></td><td><select name=\"stage\">\r\n              <option value=\"\" ";
if ( !$_GET['stage'] )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_points_stage'];
echo "</option>\r\n              <option value=\"regist\" ";
if ( $_GET['stage'] == "regist" )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_points_stage_regist'];
echo "</option>\r\n              <option value=\"login\" ";
if ( $_GET['stage'] == "login" )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_points_stage_login'];
echo "</option>\r\n              <option value=\"comments\" ";
if ( $_GET['stage'] == "comments" )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_points_stage_comments'];
echo "</option>\r\n              <option value=\"order\" ";
if ( $_GET['stage'] == "order" )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_points_stage_order'];
echo "</option>\r\n              <option value=\"system\" ";
if ( $_GET['stage'] == "system" )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_points_stage_system'];
echo "</option>\r\n              <option value=\"pointorder\" ";
if ( $_GET['stage'] == "pointorder" )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_points_stage_pointorder'];
echo "</option>\r\n              <option value=\"app\" ";
if ( $_GET['stage'] == "app" )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_points_stage_app'];
echo "</option>\r\n          </select></td>\r\n          </tr><tr><th><label>";
echo $lang['admin_points_adminname'];
echo "</label></th><td><input type=\"text\" name=\"aname\" class=\"txt\" value='";
echo $_GET['aname'];
echo "'></td>\r\n          \r\n          <th>";
echo $lang['admin_points_pointsdesc'];
echo "</th>\r\n          <td><input type=\"text\" id=\"description\" name=\"description\" class=\"txt2\" value=\"";
echo $_GET['description'];
echo "\" ></td>\r\n          <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a>\r\n            ";
if ( $output['search_field_value'] != "" || $output['search_sort'] != "" )
{
		echo "            <a href=\"index.php?act=member&op=member\" class=\"btns tooltip\"><span>";
		echo $lang['nc_cancel_search'];
		echo "</span></a>\r\n            ";
}
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\"><div class=\"title\"><h5>";
echo $lang['nc_prompts'];
echo "</h5><span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n        <ul>\r\n            <li>";
echo $lang['admin_points_log_help1'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <table class=\"table tb-type2\">\r\n    <thead>\r\n      <tr class=\"thead\">\r\n        <th class=\"align-center\">";
echo $lang['admin_points_log_num'];
echo "</th>\r\n        <th>";
echo $lang['admin_points_membername'];
echo "</th>\r\n        <th>";
echo $lang['admin_points_adminname'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['admin_points_pointsnum'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['admin_points_addtime'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['admin_points_stage'];
echo "</th>\r\n        <th>";
echo $lang['admin_points_pointsdesc'];
echo "</th>\r\n      </tr>\r\n    </thead>\r\n    <tbody>\r\n      ";
if ( !empty( $output['list_log'] ) || is_array( $output['list_log'] ) )
{
		echo "      ";
		foreach ( $output['list_log'] as $k => $v )
		{
				echo "      <tr class=\"hover\">\r\n        <td class=\"w36 align-center\">";
				echo $v['pl_id'];
				echo "</td>\r\n        <td>";
				echo $v['pl_membername'];
				echo "</td>\r\n        <td>";
				echo $v['pl_adminname'];
				echo "</td>\r\n        <td class=\"align-center\">";
				echo $v['pl_points'];
				echo "</td>\r\n        <td class=\"nowrap align-center\">";
				echo date( "Y-m-d", $v['pl_addtime'] );
				echo "</td>\r\n        <td class=\"align-center\">";
				switch ( $v['pl_stage'] )
				{
				case "regist" :
						echo $lang['admin_points_stage_regist'];
						break;
				case "login" :
						echo $lang['admin_points_stage_login'];
						break;
				case "comments" :
						echo $lang['admin_points_stage_comments'];
						break;
				case "order" :
						echo $lang['admin_points_stage_order'];
						break;
				case "system" :
						echo $lang['admin_points_stage_system'];
						break;
				case "pointorder" :
						echo $lang['admin_points_stage_pointorder'];
						break;
				case "app" :
						echo $lang['admin_points_stage_app'];
				}
				echo "</td>\r\n        <td>";
				echo $v['pl_desc'];
				echo "</td>\r\n      </tr>\r\n      ";
		}
		echo "      ";
}
else
{
		echo "      <tr class=\"no_data\">\r\n        <td colspan=\"15\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n      </tr>\r\n      ";
}
echo "    </tbody>\r\n    <tfoot>\r\n      <tr class=\"tfoot\">\r\n        <td colspan=\"15\"><div class=\"pagination\"> ";
echo $output['show_page'];
echo " </div></td>\r\n      </tr>\r\n    </tfoot>\r\n  </table>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/jquery.ui.js\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/i18n/zh-CN.js\" charset=\"utf-8\"></script>\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/themes/ui-lightness/jquery.ui.css\"  />\r\n<script language=\"javascript\">\r\n\$(function(){\r\n\t\$('#stime').datepicker({dateFormat: 'yy-mm-dd'});\r\n\t\$('#etime').datepicker({dateFormat: 'yy-mm-dd'});\r\n});\r\n</script>\r\n";
?>
