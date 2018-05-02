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
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=adv&op=adv\"><span>";
echo $lang['adv_manage'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['adv_wait_check'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=adv&op=adv_add\"><span>";
echo $lang['adv_add'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=adv&op=ap_manage\"><span>";
echo $lang['ap_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=adv&op=ap_add\"><span>";
echo $lang['ap_add'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" action=\"index.php?act=adv&op=adv_check\" name=\"formSearch\">\r\n    <input type=\"hidden\" name=\"act\" value=\"adv\" />\r\n    <input type=\"hidden\" name=\"op\" value=\"adv_check\" />\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th> <label for=\"search_name\">";
echo $lang['adv_name'];
echo "</label></th>\r\n          <td><input class=\"txt\" type=\"text\" name=\"search_name\" id=\"search_name\" value=\"";
echo $_GET['search_name'];
echo "\" /></td>\r\n          <th><label for=\"add_time_from\">";
echo $lang['adv_search_from'];
echo "</label></th>\r\n          <td><input class=\"txt date\" type=\"text\" id=\"add_time_from\" name=\"add_time_from\" value=\"";
echo $_GET['add_time_from'];
echo "\"/>\r\n            <label for=\"add_time_to\">~&nbsp;</label>\r\n            <input class=\"txt date\" type=\"text\" id=\"add_time_to\" name=\"add_time_to\" value=\"";
echo $_GET['add_time_to'];
echo "\"/></td>\r\n          <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a> <a href=\"JavaScript:void(0);\" onclick=\"window.location.href='index.php?act=adv&op=adv_check'\" class=\"btns tooltip\" title=\"";
echo $lang['adv_all'];
echo "\"><span>";
echo $lang['adv_all'];
echo "</span></a> <a href=\"JavaScript:void(0);\" onclick=\"window.location.href='index.php?act=adv&op=adv_check&style=buy'\" class=\"btns tooltip\" title=\"";
echo $lang['check_adv_buy'];
echo "\"><span>";
echo $lang['check_adv_buy'];
echo "</span></a> <a href=\"JavaScript:void(0);\" onclick=\"window.location.href='index.php?act=adv&op=adv_check&style=order'\" class=\"btns tooltip\" title=\"";
echo $lang['check_adv_order'];
echo "\"><span>";
echo $lang['check_adv_order'];
echo "</span></a> <a href=\"JavaScript:void(0);\" onclick=\"window.location.href='index.php?act=adv&op=adv_check&style=change'\" class=\"btns tooltip\" title=\"";
echo $lang['check_adv_change'];
echo "\"><span>";
echo $lang['check_adv_change'];
echo "</span></a> <a href=\"JavaScript:void(0);\" onclick=\"window.location.href='index.php?act=adv&op=adv_check&style=noallo'\" class=\"btns tooltip\" title=\"";
echo $lang['check_adv_no2'];
echo "\"><span>";
echo $lang['check_adv_no2'];
echo "</span></a></td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li>";
echo $lang['adv_help4'];
echo "</li>\r\n            <li>";
echo $lang['adv_help5'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <table class=\"table tb-type2\">\r\n    <thead>\r\n      <tr class=\"thead\">\r\n        <th>&nbsp;</th>\r\n        <th>";
echo $lang['adv_name'];
echo "</th>\r\n        <th>";
echo $lang['adv_ap_id'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['ap_show_style'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['adv_class'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['adv_start_time'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['adv_end_time'];
echo "</th>\r\n        <th>";
echo $lang['adv_owner'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['check_adv_type'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n      </tr>\r\n    </thead>\r\n    <tbody>\r\n      ";
if ( !empty( $output['adv_info'] ) || is_array( $output['adv_info'] ) )
{
		echo "      ";
		foreach ( $output['adv_info'] as $k => $v )
		{
				echo "      <tr class=\"hover\">\r\n        <td class=\"w12\">&nbsp;</td>\r\n        <td><span title=\"";
				echo $v['adv_title'];
				echo "\">";
				echo str_cut( $v['adv_title'], "28" );
				echo "</span></td>\r\n        ";
				foreach ( $output['ap_info'] as $ap_k => $ap_v )
				{
						if ( $v['ap_id'] == $ap_v['ap_id'] )
						{
								$ap_id = $ap_v['ap_id'];
								echo "        <td><span title=\"";
								echo $ap_v['ap_name'];
								echo "\">";
								echo str_cut( $ap_v['ap_name'], "22" );
								echo "</span></td>\r\n        <td class=\"align-center\">";
								switch ( $ap_v['ap_display'] )
								{
								case "0" :
										echo $lang['ap_slide_show'];
										break;
								case "1" :
										echo $lang['ap_mul_adv'];
										break;
								case "2" :
										echo $lang['ap_one_adv'];
										break;
								default :
										echo $lang['adv_index_unknown'];
								}
								echo "</td>\r\n        <td  class=\"align-center\">";
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
								echo "</td>\r\n        ";
						}
				}
				echo "        <td class=\"nowarp align-center\">";
				echo date( "Y-m-d", $v['adv_start_date'] );
				echo "</td>\r\n        <td class=\"nowarp align-center\">";
				echo date( "Y-m-d", $v['adv_end_date'] );
				echo "</td>\r\n        <td>";
				echo $v['member_name'];
				echo "</td>\r\n        <td class=\"w72 align-center\">";
				if ( $v['is_allow'] == "2" )
				{
						echo $lang['check_adv_no2'];
				}
				else
				{
						switch ( $v['buy_style'] )
						{
						case "buy" :
								echo $lang['check_adv_buy'];
								break;
						case "order" :
								echo $lang['check_adv_order'];
								break;
						case "change" :
								echo $lang['check_adv_change'];
						}
				}
				echo "</td>\r\n        <td class=\"w72 align-center\">";
				if ( $v['is_allow'] != "2" )
				{
						echo "          <a href=\"index.php?act=adv&op=adv_check&do=check&adv_id=";
						echo $v['adv_id'];
						echo "\">";
						echo $lang['check_adv_view'];
						echo "</a>\r\n          ";
				}
				echo "</td>\r\n      </tr>\r\n      ";
		}
		echo "      ";
}
else
{
		echo "      <tr class=\"no_data\">\r\n        <td colspan=\"15\">";
		echo $lang['check_adv_nothing'];
		echo "</td>\r\n      </tr>\r\n      ";
}
echo "    </tbody>\r\n    <tfoot>\r\n      <tr class=\"tfoot\">\r\n        <td colspan=\"15\"><div class=\"pagination\"> ";
echo $output['page'];
echo " </div></td>\r\n      </tr>\r\n    </tfoot>\r\n  </table>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/jquery.ui.js\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/i18n/zh-CN.js\" charset=\"utf-8\"></script>\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/themes/ui-lightness/jquery.ui.css\"  />\r\n<script type=\"text/javascript\">\r\n\$(function(){\r\n    \$('#add_time_from').datepicker({dateFormat: 'yy-mm-dd'});\r\n    \$('#add_time_to').datepicker({dateFormat: 'yy-mm-dd'});\r\n});\r\n</script>";
?>
