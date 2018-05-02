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
echo $lang['admin_snstrace_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=snstrace&op=tracelist\"><span>";
echo $lang['admin_snstrace_tracelist'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['admin_snstrace_commentlist'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" name=\"formSearch\">\r\n    <input type=\"hidden\" name=\"act\" value=\"snstrace\">\r\n    <input type=\"hidden\" name=\"op\" value=\"commentlist\">\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label for=\"search_uname\">";
echo $lang['admin_snstrace_membername'];
echo "</label></th>\r\n          <td><input type=\"text\" value=\"";
echo $_GET['search_uname'];
echo "\" name=\"search_uname\" id=\"search_uname\" class=\"txt\"></td>\r\n          <th><label for=\"search_content\">";
echo $lang['admin_snstrace_content'];
echo "</label></th>\r\n          <td><input type=\"text\" value=\"";
echo $_GET['search_content'];
echo "\" name=\"search_content\" id=\"search_content\" class=\"txt\"></td>\r\n          <th><label>";
echo $lang['admin_snstrace_state'];
echo "</label></th>\r\n          <td>\r\n          \t<select name=\"search_state\">\r\n              <option value=''>";
echo $lang['nc_please_choose'];
echo "...</option>\r\n              <option value=\"0\" ";
echo $_GET['search_state'] == "0" ? "selected" : "";
echo ">";
echo $lang['admin_snstrace_stateshow'];
echo "</option>\r\n              <option value=\"1\" ";
echo $_GET['search_state'] == "1" ? "selected" : "";
echo ">";
echo $lang['admin_snstrace_statehide'];
echo "</option>\r\n            </select>\r\n           </td>\r\n           <th><label for=\"search_stime\">";
echo $lang['admin_snstrace_addtime'];
echo "</label></th>\r\n           <td>\r\n           \t<input type=\"text\" class=\"txt date\" value=\"";
echo $_GET['search_stime'];
echo "\" name=\"search_stime\" id=\"search_stime\" class=\"txt\">\r\n          \t<label for=\"search_etime\">~</label>\r\n          \t<input type=\"text\" class=\"txt date\" value=\"";
echo $_GET['search_etime'];
echo "\" name=\"search_etime\" id=\"search_etime\" class=\"txt\">\r\n           <a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a>\r\n          </td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li>";
echo $lang['admin_snstrace_commentlisttip'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form method='post' id=\"form_comment\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th class=\"w24\"></th>\r\n          <th>";
echo $lang['admin_snstrace_content'];
echo "</th>\r\n          <th class=\"w150 align-center\">";
echo $lang['admin_snstrace_membername'];
echo "</th>\r\n          <th class=\"w150 align-center\">";
echo $lang['admin_snstrace_addtime'];
echo "</th>\r\n          <th class=\"w150 align-center\">IP</th>\r\n          <th class=\"w150 align-center\">";
echo $lang['admin_snstrace_state'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['commentlist'] ) || is_array( $output['commentlist'] ) )
{
		echo "        ";
		foreach ( $output['commentlist'] as $k => $v )
		{
				echo "        <tr class=\"hover edit\">\r\n          <td class=\"w24\"><input type=\"checkbox\" name=\"c_id[]\" value=\"";
				echo $v['comment_id'];
				echo "\" class=\"checkitem\"></td>\r\n          <td>";
				echo parsesmiles( $v['comment_content'] );
				echo "</td>\r\n          <td class=\"w150 align-center\">";
				echo $v['comment_membername'];
				echo "</td>\r\n          <td class=\"w150 align-center\">";
				echo date( "Y-m-d H:i:s", $v['comment_addtime'] );
				echo "</td>\r\n          <td class=\"w150 align-center\">";
				echo $v['comment_ip'];
				echo "</td>\r\n          <td class=\"w150 align-center\">";
				echo $v['comment_state'] == 1 ? $lang['admin_snstrace_statehide'] : $lang['admin_snstrace_stateshow'];
				echo "</td>\r\n        </tr>\r\n        ";
		}
		echo "        ";
}
else
{
		echo "        <tr class=\"no_data\">\r\n          <td colspan=\"15\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td><input type=\"checkbox\" class=\"checkall\" id=\"checkallBottom\"></td>\r\n          <td colspan=\"16\"><label for=\"checkallBottom\">";
echo $lang['nc_select_all'];
echo "</label>\r\n            &nbsp;&nbsp;\r\n            <a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"submit_form('del');\"><span>";
echo $lang['nc_del'];
echo "</span></a>\r\n            <a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"submit_form('hide');\"><span>";
echo $lang['admin_snstrace_statehide'];
echo "</span></a>\r\n            <a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"submit_form('show');\"><span>";
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
echo "')){\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\t\$('#form_comment').attr('action','index.php?act=snstrace&op=commentdel');\r\n\t}else if(type=='hide'){\r\n\t\t\$('#form_comment').attr('action','index.php?act=snstrace&op=commentedit&type=hide');\r\n\t}else{\r\n\t\t\$('#form_comment').attr('action','index.php?act=snstrace&op=commentedit&type=show');\r\n\t}\r\n\t\$('#form_comment').submit();\r\n}\r\n</script>";
?>
