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
echo $lang['store'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=store&op=store\" ><span>";
echo $lang['manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=store&op=store_add\" ><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=store&op=store_audit\" ><span>";
echo $lang['pending'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['grade_apply'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" name='searchform' id='searchform'>\r\n    <input type=\"hidden\" name=\"act\" value=\"store_grade\">\r\n    <input type=\"hidden\" name=\"op\" value=\"store_grade_log\">\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th> <label for=\"storename\">";
echo $lang['admin_gradelog_storename'];
echo "</label></th>\r\n          <td><input type=\"text\" value=\"";
echo $_GET['storename'];
echo "\" name=\"storename\" id=\"storename\" class=\"txt-short\"></td>\r\n          <th colspan=\"1\"><label for=\"membername\">";
echo $lang['admin_gradelog_membername'];
echo "</label></th>\r\n          <td><input type=\"text\" value=\"";
echo $_GET['membername'];
echo "\" name=\"membername\" id=\"membername\" class=\"txt-short\"></td>\r\n          <th><label for=\"gradename\">";
echo $lang['admin_gradelog_gradename'];
echo "</label></th>\r\n          <td><input type=\"text\" value=\"";
echo $_GET['gradename'];
echo "\" name=\"gradename\" id=\"gradename\" class=\"txt-short\"></td>\r\n          <td><select name=\"allowstate\">\r\n              <option value='0' ";
echo $_GET['allowstate'] == 0 ? "selected" : "";
echo ">";
echo $lang['admin_gradelog_auditstate'];
echo "</option>\r\n              <option value='1' ";
echo $_GET['allowstate'] == 1 ? "selected" : "";
echo ">";
echo $lang['admin_gradelog_auditing'];
echo "</option>\r\n              <option value='2' ";
echo $_GET['allowstate'] == 2 ? "selected" : "";
echo ">";
echo $lang['admin_gradelog_auditpass'];
echo "</option>\r\n              <option value='3' ";
echo $_GET['allowstate'] == 3 ? "selected" : "";
echo ">";
echo $lang['admin_gradelog_auditnopass'];
echo "</option>\r\n            </select></td>\r\n          <td><a href=\"javascript:document.searchform.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a></td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li>";
echo $lang['store_grade_help1'];
echo "</li>\r\n            <li>";
echo $lang['store_grade_help2'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form method='post' id=\"form_glog\" action=\"index.php\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" id=\"list_act\" name=\"act\" value=\"store_grade\">\r\n    <input type=\"hidden\" id=\"list_op\" name=\"op\" value=\"sg_logdel\">\r\n    <table class=\"table tb-type2 nobdb\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th class=\"w24\"></th>\r\n          <th>";
echo $lang['admin_gradelog_list_number'];
echo " </th>\r\n          <th>";
echo $lang['admin_gradelog_storename'];
echo " </th>\r\n          <th>";
echo $lang['admin_gradelog_membername'];
echo " </th>\r\n          <th>";
echo $lang['admin_gradelog_gradename'];
echo " </th>\r\n          <th class=\"align-center\">";
echo $lang['admin_gradelog_needcheck'];
echo " </th>\r\n          <th class=\"align-center\">";
echo $lang['admin_gradelog_addtime'];
echo " </th>\r\n          <th class=\"align-center\">";
echo $lang['admin_gradelog_auditstate'];
echo " </th>\r\n          <th class=\"align-center\">";
echo $lang['nc_handle'];
echo " </th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['log_list'] ) || is_array( $output['log_list'] ) )
{
		echo "        ";
		foreach ( $output['log_list'] as $k => $v )
		{
				echo "        <tr class=\"hover\">\r\n          <td><input type=\"checkbox\" name='check_gl_id[]' value=\"";
				echo $v['gl_id'];
				echo "\" class=\"checkitem\"></td>\r\n          <td class=\"w36\">";
				echo $v['gl_id'];
				echo "</td>\r\n          <td>";
				echo $v['gl_shopname'];
				echo "</a></td>\r\n          <td>";
				echo $v['gl_membername'];
				echo "</td>\r\n          <td>";
				echo $v['gl_sgname'];
				echo "</td>\r\n          <td class=\"align-center\">";
				echo $v['gl_sgconfirm'] == 1 ? $lang['nc_yes'] : $lang['nc_no'];
				echo "</td>\r\n          <td class=\"nowarp align-center\">";
				echo date( "Y-m-d", $v['gl_addtime'] );
				echo "</td>\r\n          <td class=\"align-center\">";
				if ( $v['gl_allowstate'] == "1" )
				{
						echo $lang['admin_gradelog_auditpass'];
				}
				else if ( $v['gl_allowstate'] == "2" )
				{
						echo $lang['admin_gradelog_auditnopass'];
				}
				else
				{
						echo $lang['admin_gradelog_auditing'];
				}
				echo "</td>\r\n          <td class=\"w96 align-center\">";
				if ( $v['gl_allowstate'] == 0 )
				{
						echo "            <a href=\"index.php?act=store_grade&op=sg_logedit&id=";
						echo $v['gl_id'];
						echo "\">";
						echo $lang['nc_edit'];
						echo "</a>\r\n            ";
				}
				else
				{
						echo "            <a href=\"index.php?act=store_grade&op=sg_logedit&id=";
						echo $v['gl_id'];
						echo "\">";
						echo $lang['nc_view'];
						echo "</a>\r\n            ";
				}
				echo "</td>\r\n        </tr>\r\n        ";
		}
		echo "        ";
}
else
{
		echo "        <tr class=\"no_data\">\r\n          <td colspan=\"16\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td><input type=\"checkbox\" class=\"checkall\" id=\"checkallBottom\"></td>\r\n          <td colspan=\"16\" id=\"batchAction\"><label for=\"checkallBottom\">";
echo $lang['nc_select_all'];
echo "</label>\r\n            &nbsp;&nbsp;<a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"submit_form('sg_logdel');\"><span>";
echo $lang['nc_del'];
echo "</span></a>\r\n            <div class=\"pagination\"> ";
echo $output['page'];
echo " </div></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\">\r\nvar SITE_URL = \"";
echo SiteUrl;
echo "\";\r\nfunction submit_form(op){\r\n\tif(op=='sg_logdel'){\r\n\t\tif(!confirm('";
echo $lang['nc_ensure_del'];
echo "')){\r\n\t\t\treturn false;\r\n\t\t}\r\n\t}\r\n\t\$('#list_op').val(op);\r\n\t\$('#form_glog').submit();\r\n}\r\n</script>";
?>
