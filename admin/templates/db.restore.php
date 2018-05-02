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
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=db&op=db\" ><span>";
echo $lang['db_index_backup'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['db_index_restore'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th class=\"nobg\" colspan=\"12\"><div class=\"title\"><h5>";
echo $lang['nc_prompts'];
echo "</h5><span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n        <ul>\r\n            <li>";
echo $lang['db_import_help1'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form method=\"post\" id=\"form_db\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n      <tr class=\"space\">\r\n          <th colspan=\"15\" class=\"nobg\">";
echo $lang['db_index_db'];
echo $lang['nc_list'];
echo "</th>\r\n        </tr>\r\n        <tr class=\"thead\">\r\n          <th></th>\r\n          <th>";
echo $lang['db_index_name'];
echo "</th>\r\n          <th>";
echo $lang['db_restore_backup_time'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['db_restore_backup_size'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['db_restore_volumn'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['dir_list'] ) || is_array( $output['dir_list'] ) )
{
		echo "        ";
		foreach ( $output['dir_list'] as $k => $v )
		{
				echo "        <tr class=\"hover\">\r\n          <td class=\"w24\"><input type=\"checkbox\" class=\"checkitem\" name=\"dir_name[]\" value=\"";
				echo $v['name'];
				echo "\"></td>\r\n          <td class=\"w25pre\"><!--<img fieldid=\"";
				echo $v['name'];
				echo "\" status=\"open\" nc_type=\"flex\" src=\"";
				echo TEMPLATES_PATH;
				echo "/images/tv-expandable.gif\">--> \r\n            ";
				echo $v['name'];
				echo "</td>\r\n          <td class=\"w25pre\">";
				echo $v['make_time'];
				echo "</td>\r\n          <td class=\"align-center\">";
				echo $v['size'];
				echo "</td>\r\n          <td class=\"align-center\">";
				echo $v['file_num'];
				echo "</td>\r\n          <td class=\"w72 align-center\"><span> <a href=\"javascript:if(confirm('";
				echo $lang['nc_ensure_del'];
				echo "')){location.href='index.php?act=db&op=db_del&dir_name=";
				echo $v['name'];
				echo "'};\">";
				echo $lang['nc_del'];
				echo "</a>&nbsp;|&nbsp; <a href=\"javascript:if(confirm('";
				echo $lang['db_index_backup_tip'];
				echo "?')){location.href='index.php?act=db&op=db_import&dir_name=";
				echo $v['name'];
				echo "&step=1'};\">";
				echo $lang['db_restore_import'];
				echo "</a> </span></td>\r\n        </tr>\r\n        ";
		}
		echo "        ";
}
else
{
		echo "        <tr class=\"no_data\">\r\n          <td colspan=\"10\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td><input type=\"checkbox\" class=\"checkall\" id=\"checkallBottom\" name=\"chkVal\"></td>\r\n          <td colspan=\"16\"><label for=\"checkallBottom\">";
echo $lang['nc_select_all'];
echo "</label>\r\n            &nbsp;&nbsp;<a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"if(confirm('";
echo $lang['nc_ensure_del'];
echo "')){\$('#form_db').submit()}\"><span>";
echo $lang['nc_del'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.db_dir.js\"></script> \r\n";
?>
