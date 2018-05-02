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
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"ztc_form\" method=\"post\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_gradelog_storename'];
echo "<!-- 店铺名称 -->:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $output['log_info']['gl_shopname'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_gradelog_membername'];
echo "<!-- 会员名称 -->:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $output['log_info']['gl_membername'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_gradelog_gradename'];
echo "<!-- 等级 -->:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $output['log_info']['gl_sgname'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['grade_sortname'];
echo "<!-- 级别 -->:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $output['log_info']['gl_sgsort'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_gradelog_needcheck'];
echo "<!-- 需要审核 -->:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $output['log_info']['gl_sgconfirm'] == 1 ? $lang['nc_yes'] : $lang['nc_no'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_gradelog_addtime'];
echo "<!-- 添加时间 -->:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo date( "Y-m-d", $output['log_info']['gl_addtime'] );
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_gradelog_auditstate'];
echo "<!-- 审核状态 -->:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          ";
if ( $output['log_info']['gl_allowstate'] == 0 )
{
		echo "          <td class=\"vatop rowform\">\r\n            <input type=\"radio\" name=\"gl_state\" value='0' ";
		if ( $output['log_info']['gl_allowstate'] == 0 )
		{
				echo "checked";
		}
		echo "/>\r\n            ";
		echo $lang['admin_gradelog_auditing'];
		echo "<!-- 等待审核 -->\r\n            \r\n            <input type=\"radio\" name=\"gl_state\" value='1' ";
		if ( $output['log_info']['gl_allowstate'] == 1 )
		{
				echo "checked";
		}
		echo "/>\r\n            ";
		echo $lang['admin_gradelog_auditpass'];
		echo "<!-- 通过审核 -->\r\n            \r\n            <input type=\"radio\" name=\"gl_state\" value='2' ";
		if ( $output['log_info']['gl_allowstate'] == 2 )
		{
				echo "checked";
		}
		echo "/>\r\n            ";
		echo $lang['admin_gradelog_auditnopass'];
		echo "<!-- 审核失败 --> \r\n            &nbsp;&nbsp;&nbsp;&nbsp;\r\n            </td>\r\n          \t<td class=\"vatop tips\">";
		echo $lang['admin_gradelog_audittip'];
		echo "</td>\r\n            ";
}
else
{
		echo "            <td class=\"vatop rowform\">\r\n            ";
		switch ( $output['log_info']['gl_allowstate'] )
		{
		case 1 :
				echo $lang['admin_gradelog_auditpass'];
				break;
		case 2 :
				echo $lang['admin_gradelog_auditnopass'];
		}
		echo "\t\t\t</td>\r\n\t\t\t<td class=\"vatop tips\"></td>\r\n\t\t\t";
}
echo "        </tr>\r\n      </tbody>\r\n    </table>\r\n    ";
if ( $output['log_info']['gl_allowstate'] == 0 )
{
		echo "    <table class=\"table tb-type2 nobdb\">\r\n      <tbody>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
		echo $lang['admin_gradelog_remark'];
		echo "<!-- 备注 -->:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea rows=\"6\" class=\"tarea\" name=\"remark\"></textarea></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><input class=\"btn btn-green big\" name=\"submit\" value=\"";
		echo $lang['nc_submit'];
		echo "\" type=\"submit\"></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n    ";
}
else
{
		echo "    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
		echo $lang['admin_gradelog_auditadmin'];
		echo "<!-- 审核人员 -->:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
		echo $output['log_info']['gl_allowadminname'];
		echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
		echo $lang['admin_gradelog_remark'];
		echo "<!-- 备注 -->:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
		echo $output['log_info']['gl_allowremark'];
		echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><input type=\"reset\" onclick=\"window.location.href = 'index.php?act=store_grade&op=store_grade_log'\" class=\"btn big\" name=\"reset\" value=\"";
		echo $lang['nc_backlist'];
		echo "\"></td>\r\n        </tr>\r\n        ";
}
echo "      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n";
?>
