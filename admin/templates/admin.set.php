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
echo $lang['admin_index_admin_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=admin&op=admin\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['admin_index_edit_right'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"admin_form\" method=\"post\" name=\"adminForm\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"space\">\r\n          <th>";
echo $lang['admin_index_username'];
echo ":";
echo $output['admin_info']['admin_name'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
foreach ( $output['function_array'] as $k => $v )
{
		echo "        <tr>\r\n          <td class=\"required\"><input id=\"";
		echo $k;
		echo "\" type=\"checkbox\" onclick=\"selectAll('";
		echo $k;
		echo "')\">\r\n            &nbsp;\r\n            <label for=\"";
		echo $k;
		echo "\">";
		echo $v[0];
		echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><ul class=\"nofloat w830\">\r\n              ";
		$i = 1;
		$j = count( $v );
		for ( ;	$i < $j;	++$i	)
		{
				echo "              <li class=\"left w18pre\" style=\"width:auto; margin-left:10px;\">\r\n                <label><input class=\"";
				echo $k;
				echo "\" type=\"checkbox\" name=\"permission[";
				echo $v[$i][0];
				echo "]\" value=\"1\" \r\n        ";
				if ( @in_array( $v[$i][0], $output['admin_array']['admin_permission'] ) )
				{
						echo "checked=\"checked\"";
				}
				echo " >\r\n                ";
				echo $v[$i][1];
				echo "</label>\r\n              </li>\r\n              ";
		}
		echo "            </ul></td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n        \r\n          <td><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.adminForm.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script>\r\nfunction selectAll(name){\r\n    if(\$('#'+name).attr('checked') == true) {\r\n        \$('.'+name).attr('checked',true);\r\n    }\r\n    else {\r\n        \$('.'+name).attr('checked',false);\r\n    }\r\n}\r\n</script> \r\n";
?>
