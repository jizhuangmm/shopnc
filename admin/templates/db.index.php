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
echo $lang['db_index_db'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['db_index_backup'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=db&op=db_restore\" ><span>";
echo $lang['db_index_restore'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th class=\"nobg\" colspan=\"12\"><div class=\"title\"><h5>";
echo $lang['nc_prompts'];
echo "</h5><span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n        <ul>\r\n            <li>";
echo $lang['db_index_help1'];
echo "</li>\r\n            <li>";
echo $lang['db_index_help2'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form method=\"post\" id=\"db_form\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['db_index_backup_method'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><ul class=\"nofloat\">\r\n              <li>\r\n                <input type=\"radio\" checked=\"checked\" value=\"all\" id=\"backup_all\" name=\"backup_type\">\r\n                <label for=\"backup_all\">";
echo $lang['db_index_all_data'];
echo "</label>\r\n              </li>\r\n              <li>\r\n                <input type=\"radio\" value=\"custom\" id=\"backup_custom\" name=\"backup_type\">\r\n                <label for=\"backup_custom\">";
echo $lang['db_index_spec_table'];
echo "</label>\r\n              </li>\r\n            </ul></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tbody style=\"display:none;\" id=\"tables\">\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\" >";
echo $lang['db_index_table'];
echo "</td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"vatop rowform\"><input type=\"checkbox\" class=\"checkall\" id=\"checkall\">\r\n            &nbsp;\r\n            <label for=\"checkall\">";
echo $lang['nc_select_all'];
echo "</label></td>\r\n        </tr>\r\n        <tr id=\"input\">\r\n          <td colspan=\"2\" class=\"vatop rowform\"><ul class=\"nofloat w830\">\r\n              ";
if ( !empty( $output['table_list'] ) || is_array( $output['table_list'] ) )
{
		echo "              ";
		foreach ( $output['table_list'] as $k => $v )
		{
				echo "              <li class=\"left w25pre\">\r\n                <input type=\"checkbox\" value=\"";
				echo $v;
				echo "\" class=\"checkitem\" name=\"tables[]\">\r\n                <label>";
				echo $v;
				echo "</label>\r\n              </li>\r\n              ";
		}
		echo "              ";
}
echo "            </ul></td>\r\n        </tr>\r\n      </tbody>\r\n      <tbody>\r\n      \t<tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['db_index_size'];
echo "(kb):</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"2048\" name=\"file_size\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['db_index_min_size'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['db_index_name'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['back_dir'];
echo "\" name=\"backup_name\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['db_index_name_tip'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot class=\"tfoot\">\r\n        <tr>\r\n          <td colspan=\"2\">\r\n          <a href=\"JavaScript:void(0);\" class=\"btn\" id=\"btn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script>\r\n\$(document).ready(function(){\r\n\t\$('#backup_all').click(function(){\r\n\t\t\$('#tables').css('display','none');\r\n\t\t\$(\".checkitem\").attr(\"checked\",true);\r\n\t});\r\n\t\$('#backup_custom').click(function(){\r\n\t\t\$('#tables').css('display','');\r\n\t\t\$(\".checkitem\").attr(\"checked\",false);\r\n\t});\r\n\t\$('#btn').click(function(){\r\n\t\tif(confirm('";
echo $lang['db_index_backup_tip'];
echo "?')){\r\n\t\t\t\$(\"#db_form\").submit();\r\n\t\t}else{\r\n\t\t\treturn false;\r\n\t\t}\r\n\t});\r\n});\r\n</script>";
?>
