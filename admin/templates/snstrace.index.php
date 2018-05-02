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
echo $lang['admin_snstrace_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['admin_snstrace_tracelist'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=snstrace&op=commentlist\"><span>";
echo $lang['admin_snstrace_commentlist'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" name=\"formSearch\">\r\n    <input type=\"hidden\" name=\"act\" value=\"snstrace\">\r\n    <input type=\"hidden\" name=\"op\" value=\"tracelist\">\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label for=\"search_uname\">";
echo $lang['admin_snstrace_membername'];
echo "</label></th>\r\n          <td><input type=\"text\" value=\"";
echo $_GET['search_uname'];
echo "\" name=\"search_uname\" id=\"search_uname\" class=\"txt\"></td>\r\n          <th><label for=\"search_content\">";
echo $lang['admin_snstrace_content'];
echo "</label></th>\r\n          <td><input type=\"text\" value=\"";
echo $_GET['search_content'];
echo "\" name=\"search_content\" id=\"search_content\" class=\"txt\"></td>\r\n          <th><label>";
echo $lang['admin_snstrace_state'];
echo "</label></th>\r\n          <td><select name=\"search_state\">\r\n              <option value=''>";
echo $lang['nc_please_choose'];
echo "...</option>\r\n              <option value=\"0\" ";
echo $_GET['search_state'] == "0" ? "selected" : "";
echo ">";
echo $lang['admin_snstrace_stateshow'];
echo "</option>\r\n              <option value=\"1\" ";
echo $_GET['search_state'] == "1" ? "selected" : "";
echo ">";
echo $lang['admin_snstrace_statehide'];
echo "</option>\r\n            </select></td>\r\n          <th><label for=\"search_stime\">";
echo $lang['admin_snstrace_addtime'];
echo "</label></th>\r\n          <td><input type=\"text\" class=\"txt date\" value=\"";
echo $_GET['search_stime'];
echo "\" name=\"search_stime\" id=\"search_stime\" class=\"txt\">\r\n            <label for=\"search_etime\">~</label>\r\n            <input type=\"text\" class=\"txt date\" value=\"";
echo $_GET['search_etime'];
echo "\" name=\"search_etime\" id=\"search_etime\" class=\"txt\">\r\n            <a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a></td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li>";
echo $lang['admin_snstrace_tracelisttip1'];
echo "</li>\r\n            <li>";
echo $lang['admin_snstrace_tracelisttip2'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form method='post' id=\"form_trace\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        ";
if ( !empty( $output['tracelist'] ) || is_array( $output['tracelist'] ) )
{
		echo "        ";
		foreach ( $output['tracelist'] as $k => $v )
		{
				echo "        <tr class=\"hover edit\">\r\n          <td style=\"vertical-align:top;\"><input type=\"checkbox\" name=\"t_id[]\" value=\"";
				echo $v['trace_id'];
				echo "\" class=\"checkitem\"></td>\r\n          <td class=\"fd-list\"><!-- 动态列表start -->\r\n            \r\n            <li>\r\n              <div class=\"fd-aside\"> <span class=\"thumb size60\"><a href=\"";
				echo SiteUrl.DS;
				echo "index.php?act=member_snshome&mid=";
				echo $v['trace_memberid'];
				echo "\" target=\"_blank\"> <img src=\"";
				if ( $v['trace_memberavatar'] != "" )
				{
						echo SiteUrl.DS.ATTACH_AVATAR.DS.$v['trace_memberavatar'];
				}
				else
				{
						echo SiteUrl.DS.ATTACH_COMMON.DS.c( "default_user_portrait" );
				}
				echo "\" onload=\"javascript:DrawImage(this,60,60);\"> </a> </span> </div>\r\n              <dl class=\"fd-wrap\">\r\n                <dt>\r\n                  <h3><a href=\"";
				echo SiteUrl.DS;
				echo "index.php?act=member_snshome&mid=";
				echo $v['trace_memberid'];
				echo "\" target=\"_blank\">";
				echo $v['trace_membername'];
				echo "</a>";
				echo $lang['nc_colon'];
				echo "</h3>\r\n                  <h5>";
				echo parsesmiles( $v['trace_title'] );
				echo "</h5>\r\n                </dt>\r\n                <dd>\r\n                  ";
				if ( 0 < $v['trace_originalid'] )
				{
						echo "                  <div class=\"fd-forward\">\r\n                    ";
						if ( $v['trace_originalstate'] == 1 )
						{
								echo $lang['admin_snstrace_originaldeleted'];
						}
						else
						{
								echo "                    ";
								echo parsesmiles( $v['trace_content'] );
								echo "                    <div class=\"stat\"> <span>";
								echo $lang['admin_snstrace_forward'];
								echo 0 < $v['trace_orgcopycount'] ? "(".$v['trace_orgcopycount'].")" : "";
								echo "</span>&nbsp;&nbsp; <span><a href=\"index.php?act=snstrace&op=commentlist&tid=";
								echo $v['trace_originalid'];
								echo "\">";
								echo $lang['admin_snstrace_comment'];
								echo 0 < $v['trace_orgcommentcount'] ? "(".$v['trace_orgcommentcount'].")" : "";
								echo "</a></span> </div>\r\n                    ";
						}
						echo "                  </div>\r\n                  ";
				}
				else
				{
						echo "                  ";
						echo parsesmiles( $v['trace_content'] );
						echo "                  ";
				}
				echo "                </dd>\r\n                <dd> <span class=\"fc-time fl\">";
				echo date( "Y-m-d H:i", $v['trace_addtime'] );
				echo "</span> <span class=\"fr\">";
				echo $lang['admin_snstrace_forward'];
				echo 0 < $v['trace_copycount'] ? "(".$v['trace_copycount'].")" : "";
				echo "&nbsp;|&nbsp;<a href=\"index.php?act=snstrace&op=commentlist&tid=";
				echo $v['trace_id'];
				echo "\">";
				echo $lang['admin_snstrace_comment'];
				echo 0 < $v['trace_commentcount'] ? "(".$v['trace_commentcount'].")" : "";
				echo "</a></span> <span class=\"fl\">&nbsp;&nbsp;";
				echo $lang['admin_snstrace_state'].$lang['nc_colon'];
				echo $v['trace_state'] == 1 ? "<font style='color:red;'>".$lang['admin_snstrace_statehide']."</font>" : "{$lang['admin_snstrace_stateshow']}";
				echo "</span> <span class=\"fl\">&nbsp;&nbsp;";
				echo $lang['admin_snstrace_privacytitle'].$lang['nc_colon'];
				echo "                  ";
				switch ( $v['trace_privacy'] )
				{
				case "1" :
						echo $lang['admin_snstrace_privacy_friend'];
						break;
				case "2" :
						echo $lang['admin_snstrace_privacy_self'];
						break;
				default :
						echo $lang['admin_snstrace_privacy_all'];
				}
				echo "                  </span> </dd>\r\n                <div class=\"clear\"></div>\r\n              </dl>\r\n            </li>\r\n            \r\n            <!-- 动态列表end --></td>\r\n        </tr>\r\n        ";
		}
		echo "        ";
}
else
{
		echo "        <tr class=\"no_data\">\r\n          <td colspan=\"15\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td class=\"w24\"><input type=\"checkbox\" class=\"checkall\" id=\"checkallBottom\"></td>\r\n          <td colspan=\"16\"><label for=\"checkallBottom\">";
echo $lang['nc_select_all'];
echo "</label>\r\n            &nbsp;&nbsp; <a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"submit_form('del');\"><span>";
echo $lang['nc_del'];
echo "</span></a> <a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"submit_form('hide');\"><span>";
echo $lang['admin_snstrace_statehide'];
echo "</span></a> <a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"submit_form('show');\"><span>";
echo $lang['admin_snstrace_stateshow'];
echo "</span></a>\r\n            <div class=\"pagination\"> ";
echo $output['show_page'];
echo " </div></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/jquery.ui.js\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/i18n/zh-CN.js\" charset=\"utf-8\"></script>\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/themes/ui-lightness/jquery.ui.css\"  />\r\n<script type=\"text/javascript\">\r\n\$(function(){\r\n    \$('#search_stime').datepicker({dateFormat: 'yy-mm-dd'});\r\n    \$('#search_etime').datepicker({dateFormat: 'yy-mm-dd'});\r\n});\r\nfunction submit_form(type){\r\n\tif(type=='del'){\r\n\t\tif(!confirm('";
echo $lang['nc_ensure_del'];
echo "')){\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\t\$('#form_trace').attr('action','index.php?act=snstrace&op=tracedel');\r\n\t}else if(type=='hide'){\r\n\t\t\$('#form_trace').attr('action','index.php?act=snstrace&op=traceedit&type=hide');\r\n\t}else{\r\n\t\t\$('#form_trace').attr('action','index.php?act=snstrace&op=traceedit&type=show');\r\n\t}\r\n\t\$('#form_trace').submit();\r\n}\r\n</script>";
?>
