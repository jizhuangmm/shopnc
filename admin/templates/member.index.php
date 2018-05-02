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
echo $lang['member_index_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=member&op=member_add\" ><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" name=\"formSearch\">\r\n    <input type=\"hidden\" value=\"member\" name=\"act\">\r\n    <input type=\"hidden\" value=\"member\" name=\"op\">\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <td><select name=\"search_field_name\" >\r\n              <option ";
if ( $output['search_field_name'] == "member_name" )
{
		echo "selected='selected'";
}
echo " value=\"member_name\">";
echo $lang['member_index_name'];
echo "</option>\r\n              <option ";
if ( $output['search_field_name'] == "member_email" )
{
		echo "selected='selected'";
}
echo " value=\"member_email\">";
echo $lang['member_index_email'];
echo "</option>\r\n              <option ";
if ( $output['search_field_name'] == "member_truename" )
{
		echo "selected='selected'";
}
echo " value=\"member_truename\">";
echo $lang['member_index_true_name'];
echo "</option>\r\n            </select></td>\r\n          <td><input type=\"text\" value=\"";
echo $output['search_field_value'];
echo "\" name=\"search_field_value\" class=\"txt\"></td>\r\n          <th><label>";
echo $lang['nc_sort'];
echo "</label></th>\r\n          <td><select name=\"search_sort\" >\r\n              <option ";
if ( $output['search_sort'] == "member_name desc" )
{
		echo "selected='selected'";
}
echo " value=\"member_time desc\">";
echo $lang['member_index_reg_time'];
echo "</option>\r\n              <option ";
if ( $output['search_sort'] == "member_name desc" )
{
		echo "selected='selected'";
}
echo " value=\"member_login_time desc\">";
echo $lang['member_index_last_login'];
echo "</option>\r\n              <option ";
if ( $output['search_sort'] == "member_login_num desc" )
{
		echo "selected='selected'";
}
echo " value=\"member_login_num desc\">";
echo $lang['member_index_login_time'];
echo "</option>\r\n            </select></td>\r\n          <td><select name=\"search_state\" >\r\n              <option ";
if ( $_GET['search_state'] == "" )
{
		echo "selected='selected'";
}
echo " value=\"\">";
echo $lang['member_index_state'];
echo "</option>\r\n              <option ";
if ( $_GET['search_state'] == "no_informallow" )
{
		echo "selected='selected'";
}
echo " value=\"no_informallow\">";
echo $lang['member_index_inform_deny'];
echo "</option>\r\n              <option ";
if ( $_GET['search_state'] == "no_isbuy" )
{
		echo "selected='selected'";
}
echo " value=\"no_isbuy\">";
echo $lang['member_index_buy_deny'];
echo "</option>\r\n              <option ";
if ( $_GET['search_state'] == "no_isallowtalk" )
{
		echo "selected='selected'";
}
echo " value=\"no_isallowtalk\">";
echo $lang['member_index_talk_deny'];
echo "</option>\r\n              <option ";
if ( $_GET['search_state'] == "no_memberstate" )
{
		echo "selected='selected'";
}
echo " value=\"no_memberstate\">";
echo $lang['member_index_login_deny'];
echo "</option>\r\n            </select></td>\r\n          <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a>\r\n            ";
if ( $output['search_field_value'] != "" || $output['search_sort'] != "" )
{
		echo "            <a href=\"index.php?act=member&op=member\" class=\"btns tooltip\"><span>";
		echo $lang['nc_cancel_search'];
		echo "</span></a>\r\n            ";
}
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n    <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\"><div class=\"title\"><h5>";
echo $lang['nc_prompts'];
echo "</h5><span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n        <ul>\r\n            <li>";
echo $lang['member_index_help1'];
echo "</li>\r\n            <li>";
echo $lang['member_index_help2'];
echo "</li>\r\n            <li>";
echo $lang['member_index_help3'];
echo "</li>\r\n            <li>";
echo $lang['member_index_help4'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form method=\"post\" id=\"form_member\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2 nobdb\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th>&nbsp;</th>\r\n          <th colspan=\"2\">";
echo $lang['member_index_name'];
echo "</th>\r\n          <th class=\"align-center\"><span fieldname=\"logins\" nc_type=\"order_by\">";
echo $lang['member_index_login_time'];
echo "</span></th>\r\n          <th class=\"align-center\"><span fieldname=\"last_login\" nc_type=\"order_by\">";
echo $lang['member_index_last_login'];
echo "</span></th>\r\n          <th class=\"align-center\">";
echo $lang['member_index_points'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['member_index_prestore'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['member_index_login'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['member_index_store'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      <tbody>\r\n        ";
if ( !empty( $output['member_list'] ) || is_array( $output['member_list'] ) )
{
		echo "        ";
		foreach ( $output['member_list'] as $k => $v )
		{
				echo "        <tr class=\"hover member\">\r\n          <td class=\"w24\"><input type=\"checkbox\" name='del_id[]' value=\"";
				echo $v['member_id'];
				echo "\" class=\"checkitem\"></td>\r\n          <td class=\"w48 picture\"><div class=\"size-44x44\"><span class=\"thumb size-44x44\"><i></i><img src=\"";
				if ( $v['member_avatar'] != "" )
				{
						echo SiteUrl.DS.ATTACH_AVATAR.DS.$v['member_avatar'];
				}
				else
				{
						echo "templates/images/default_user_portrait.gif";
				}
				echo "\"  onload=\"javascript:DrawImage(this,44,44);\"/></span></div></td>\r\n          <td><p class=\"name\"><strong>";
				echo $v['member_name'];
				echo "</strong>(";
				echo $lang['member_index_true_name'];
				echo ": ";
				echo $v['member_truename'];
				echo ")</p>\r\n            <p class=\"smallfont\">";
				echo $lang['member_index_reg_time'];
				echo ":&nbsp;";
				echo $v['member_time'];
				echo "</p>\r\n            <div class=\"relative\" >\r\n              <div class=\"im\"><span class=\"email\" >\r\n                ";
				if ( $v['member_email'] != "" )
				{
						echo "                <a href=\"mailto:";
						echo $v['member_email'];
						echo "\" class=\"tooltip yes\" title=\"";
						echo $lang['member_index_email'];
						echo ":";
						echo $v['member_email'];
						echo "\">";
						echo $v['member_email'];
						echo "</a></span>\r\n                ";
				}
				else
				{
						echo "                <a href=\"JavaScript:void(0);\" class=\"tooltip\" title=\"";
						echo $lang['member_index_null'];
						echo "\" >";
						echo $v['member_email'];
						echo "</a></span>\r\n                ";
				}
				echo "                <span class=\"qq\">\r\n                ";
				if ( $v['member_qq'] != "" )
				{
						echo "                <a href=\"JavaScript:void(0);\" class=\"tooltip yes\" title=\"QQ:";
						echo $v['member_qq'];
						echo "\">qq</a>\r\n                ";
				}
				else
				{
						echo "                <a href=\"JavaScript:void(0);\" class=\"tooltip\" title=\"";
						echo $lang['member_index_null'];
						echo "\">qq</a>\r\n                ";
				}
				echo "                </span> <span class=\"wangwang\">\r\n                ";
				if ( $v['member_ww'] != "" )
				{
						echo "                <a href=\"JavaScript:void(0);\" class=\"tooltip yes\" title=\"";
						echo $v['member_ww'];
						echo "\">wangwang</a>\r\n                ";
				}
				else
				{
						echo "                <a href=\"JavaScript:void(0);\" class=\"tooltip\" title=\"";
						echo $lang['member_index_null'];
						echo "\">wangwang</a>\r\n                ";
				}
				echo "                </span> <span class=\"msn\">\r\n                ";
				if ( $v['member_msn'] != "" )
				{
						echo "                <a href=\"JavaScript:void(0);\" class=\"tooltip yes\" title=\"MSN:";
						echo $v['member_msn'];
						echo "\">msn</a>\r\n                ";
				}
				else
				{
						echo "                <a href=\"JavaScript:void(0);\" class=\"tooltip\" title=\"";
						echo $lang['member_index_null'];
						echo "\">msn</a>\r\n                ";
				}
				echo "                </span></div>\r\n            </div></td>\r\n          <td class=\"align-center\">";
				echo $v['member_login_num'];
				echo "</td>\r\n          <td class=\"w150 align-center\"><p>";
				echo $v['member_login_time'];
				echo "</p>\r\n            <p>";
				echo $v['member_login_ip'];
				echo "</p></td>\r\n          <td class=\"align-center\">";
				echo $v['member_points'];
				echo "</td>\r\n          <td class=\"align-center\"><p>";
				echo $lang['member_index_available'];
				echo ":&nbsp;<strong class=\"red\">";
				echo $v['available_predeposit'];
				echo "</strong>&nbsp;";
				echo $lang['currency_zh'];
				echo "</p>\r\n            <p>";
				echo $lang['member_index_frozen'];
				echo ":&nbsp;<strong class=\"red\">";
				echo $v['freeze_predeposit'];
				echo "</strong>&nbsp;";
				echo $lang['currency_zh'];
				echo "</p></td>\r\n          <td class=\"align-center\">";
				echo $v['member_state'] == 1 ? $lang['member_edit_allow'] : $lang['member_edit_deny'];
				echo "</td>\r\n          <td class=\"align-center\">";
				if ( $v['store_id'] != 0 )
				{
						echo "            <a onclick=\"parent.openItem('store','store','store');\" href=\"index.php?act=store&op=store_edit&store_id=";
						echo $v['store_id'];
						echo "\">";
						echo $lang['member_index_store'];
						echo "</a>\r\n            ";
				}
				echo "</td>\r\n          <td class=\"w72 align-center\"><a href=\"index.php?act=member&op=member_edit&member_id=";
				echo $v['member_id'];
				echo "\">";
				echo $lang['nc_edit'];
				echo "</a> | <a href=\"javascript:void(0)\" onclick=\"if(confirm('";
				echo $lang['nc_ensure_del'];
				echo "')){location.href='index.php?act=member&op=member_del&member_id=";
				echo $v['member_id'];
				echo "'}\">";
				echo $lang['nc_del'];
				echo "</a></td>\r\n        </tr>\r\n        ";
		}
		echo "        ";
}
else
{
		echo "        <tr class=\"no_data\">\r\n          <td colspan=\"11\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      <tfoot class=\"tfoot\">\r\n        ";
if ( !empty( $output['member_list'] ) || is_array( $output['member_list'] ) )
{
		echo "        <tr>\r\n          <td><input type=\"checkbox\" class=\"checkall\" id=\"checkallBottom\"></td>\r\n          <td colspan=\"16\"><label for=\"checkallBottom\">";
		echo $lang['nc_select_all'];
		echo "</label>\r\n            &nbsp;&nbsp;<a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"if(confirm('";
		echo $lang['nc_ensure_del'];
		echo "')){\$('#form_member').submit();}\"><span>";
		echo $lang['nc_del'];
		echo "</span></a>\r\n            <div class=\"pagination\"> ";
		echo $output['page'];
		echo " </div></td>\r\n        </tr>\r\n        ";
}
echo "      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n\r\n";
?>
