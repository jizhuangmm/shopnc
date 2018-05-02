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
echo $lang['adv_index_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['adv_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=adv&op=adv_check\"><span>";
echo $lang['adv_wait_check'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=adv&op=adv_add\"><span>";
echo $lang['adv_add'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=adv&op=ap_manage\"><span>";
echo $lang['ap_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=adv&op=ap_add\"><span>";
echo $lang['ap_add'];
echo "</span></a></li>\r\n        <!--<li><a href=\"index.php?act=adv&op=adv_cache_refresh\"><span>";
echo $lang['adv_cache_refresh'];
echo "</span></a></li>-->\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" action=\"index.php?act=adv&op=adv\" name=\"formSearch\">\r\n    <input type=\"hidden\" name=\"act\" value=\"adv\" />\r\n    <input type=\"hidden\" name=\"op\" value=\"adv\" />\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th>";
echo $lang['adv_name'];
echo "</th>\r\n          <td><input class=\"txt\" type=\"text\" name=\"search_name\" value=\"";
echo $_GET['search_name'];
echo "\" /></td>\r\n          <th>";
echo $lang['adv_search_from'];
echo "</th>\r\n          <td><input class=\"txt date\" type=\"text\" id=\"add_time_from\" name=\"add_time_from\" value=\"";
echo $_GET['add_time_from'];
echo "\"/>\r\n            <label for=\"add_time_to\">~</label>\r\n            <input class=\"txt date\" type=\"text\" id=\"add_time_to\" name=\"add_time_to\" value=\"";
echo $_GET['add_time_to'];
echo "\"/></td>\r\n          <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a><a href=\"JavaScript:void(0);\" onclick=\"window.location.href='index.php?act=adv&op=adv'\" class=\"btns tooltip\" title=\"";
echo $lang['adv_all'];
echo "\"><span>";
echo $lang['adv_all'];
echo "</span></a> <a href=\"JavaScript:void(0);\" onclick=\"window.location.href='index.php?act=adv&op=adv&overtime=0'\" class=\"btns tooltip\" title=\"";
echo $lang['adv_not_overtime'];
echo "\"><span>";
echo $lang['adv_not_overtime'];
echo "</span></a> <a href=\"JavaScript:void(0);\" onclick=\"window.location.href='index.php?act=adv&op=adv&overtime=1'\" class=\"btns tooltip\" title=\"";
echo $lang['adv_overtime'];
echo "\"><span>";
echo $lang['adv_overtime'];
echo "</span></a></td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li>";
echo $lang['adv_help1'];
echo "</li>\r\n            <li>";
echo $lang['adv_help2'];
echo "</li>\r\n            <li>";
echo $lang['adv_help3'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form method=\"post\" id=\"store_form\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th></th>\r\n          <th>";
echo $lang['adv_name'];
echo "</th>\r\n          <th>";
echo $lang['adv_ap_id'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['adv_class'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['adv_start_time'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['adv_end_time'];
echo "</th>\r\n          <th class=\"align-center\"><span class=\"paixv\"><a href=\"index.php?act=adv&op=adv&order=clicknum\">";
echo $lang['adv_click_num'];
echo "</a></span></th>\r\n          <th>";
echo $lang['adv_owner'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['adv_info'] ) || is_array( $output['adv_info'] ) )
{
		echo "        ";
		foreach ( $output['adv_info'] as $k => $v )
		{
				echo "        <tr class=\"hover\">\r\n          <td class=\"w24\"><input type=\"checkbox\" class=\"checkitem\" name=\"del_id[]\" value=\"";
				echo $v['adv_id'];
				echo "\" /></td>\r\n          <td><span title=\"";
				echo $v['adv_title'];
				echo "\">";
				echo str_cut( $v['adv_title'], "36" );
				echo "</span></td>\r\n          ";
				foreach ( $output['ap_info'] as $ap_k => $ap_v )
				{
						if ( $v['ap_id'] == $ap_v['ap_id'] )
						{
								echo "          <td><span title=\"";
								echo $ap_v['ap_name'];
								echo "\">";
								echo str_cut( $ap_v['ap_name'], "22" );
								echo "</span></td>\r\n          <td class=\"align-center\">";
								switch ( $ap_v['ap_class'] )
								{
								case "0" :
										echo $lang['adv_pic'];
										break;
								case "1" :
										echo $lang['adv_word'];
										break;
								case "2" :
										echo $lang['adv_slide'];
										break;
								case "3" :
										echo "Flash";
								}
								echo "</td>\r\n          ";
						}
				}
				echo "          <td class=\"align-center nowrap\">";
				echo date( "Y-m-d", $v['adv_start_date'] );
				echo "</td>\r\n          <td class=\"align-center nowrap\">";
				echo date( "Y-m-d", $v['adv_end_date'] );
				echo "</td>\r\n          <td class=\"align-center\">";
				echo "<a href='index.php?act=adv&op=click_chart&adv_id=".$v['adv_id']."'>".$v['click_num']."</a>";
				echo "</td>\r\n          <td>";
				if ( $v['member_name'] != "" )
				{
						echo $v['member_name'];
				}
				else
				{
						echo $lang['adv_admin_add'];
				}
				echo "</td>\r\n          <td class=\"w72 align-center\"><a href=\"index.php?act=adv&op=adv_edit&adv_id=";
				echo $v['adv_id'];
				echo "\">";
				echo $lang['adv_edit'];
				echo "</a>&nbsp;|&nbsp;<a href=\"javascript:if(confirm('";
				echo $lang['nc_ensure_del'];
				echo "'))window.location = 'index.php?act=adv&op=adv_del&adv_id=";
				echo $v['adv_id'];
				echo "';\">";
				echo $lang['nc_del'];
				echo "</a></td>\r\n        </tr>\r\n        ";
		}
		echo "        ";
}
else
{
		echo "        <tr class=\"no_data\">\r\n          <td colspan=\"15\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td><input type=\"checkbox\" class=\"checkall\" id=\"checkall\"/></td>\r\n          <td id=\"batchAction\" colspan=\"15\"><span class=\"all_checkbox\">\r\n            <label for=\"checkall\">";
echo $lang['nc_select_all'];
echo "</label>\r\n            </span>&nbsp;&nbsp;<a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"if(confirm('";
echo $lang['adv_del_sure'];
echo "')){\$('#store_form').submit();}\"><span>";
echo $lang['nc_del'];
echo "</span></a>\r\n            <div class=\"pagination\"> ";
echo $output['page'];
echo " </div></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/themes/ui-lightness/jquery.ui.css\"  />\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/jquery.ui.js\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/i18n/zh-CN.js\" charset=\"utf-8\"></script> \r\n<script type=\"text/javascript\">\r\n\$(function(){\r\n    \$('#add_time_from').datepicker({dateFormat: 'yy-mm-dd'});\r\n    \$('#add_time_to').datepicker({dateFormat: 'yy-mm-dd'});\r\n});\r\n</script>";
?>
