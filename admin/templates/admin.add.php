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
echo $lang['nc_add'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"add_form\" method=\"post\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2 nobdb\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"admin_name\">";
echo $lang['admin_index_username'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" id=\"admin_name\" name=\"admin_name\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['admin_add_username_tip'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"admin_password\">";
echo $lang['admin_inde_password'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"password\" id=\"admin_password\" name=\"admin_password\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['admin_add_password_tip'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\"><table class=\"table tb-type2 nomargin\">\r\n              <thead>\r\n                <tr class=\"space\">\r\n                  <th>";
echo $lang['admin_set_right_manage'];
echo "</th>\r\n                </tr>\r\n              </thead>\r\n              <tbody>\r\n                ";
foreach ( $output['function_array'] as $k => $v )
{
		echo "                <tr>\r\n                  <td class=\"required\"><input id=\"";
		echo $k;
		echo "\" type=\"checkbox\" onclick=\"selectAll('";
		echo $k;
		echo "')\">\r\n                    &nbsp;\r\n                    <label for=\"";
		echo $k;
		echo "\">";
		echo $v[0];
		echo "</label></td>\r\n                </tr>\r\n                <tr class=\"noborder\">\r\n                  <td class=\"vatop rowform\"><ul class=\"nofloat w830\">\r\n                      ";
		$i = 1;
		$j = count( $v );
		for ( ;	$i < $j;	++$i	)
		{
				echo "                      <li class=\"left w18pre\" style=\"width:auto; margin-left:10px;\">\r\n                        <input class=\"";
				echo $k;
				echo "\" type=\"checkbox\" name=\"permission[";
				echo $v[$i][0];
				echo "]\" value=\"1\" \r\n        ";
				if ( @in_array( $v[$i][0], $output['admin_array']['admin_permission'] ) )
				{
						echo "checked=\"checked\"";
				}
				echo " >\r\n                        &nbsp;\r\n                        <label>";
				echo $v[$i][1];
				echo "</label>\r\n                      </li>\r\n                      ";
		}
		echo "                    </ul></td>\r\n                </tr>\r\n                ";
}
echo "              </tbody>\r\n            </table></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\"><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script>\r\n//按钮先执行验证再提交表\r\n\$(function(){\$(\"#submitBtn\").click(function(){\r\n    if(\$(\"#add_form\").valid()){\r\n     \$(\"#add_form\").submit();\r\n\t}\r\n\t});\r\n});\r\n//\r\nfunction selectAll(name){\r\n    if(\$('#'+name).attr('checked') == true) {\r\n        \$('.'+name).attr('checked',true);\r\n    }\r\n    else {\r\n        \$('.'+name).attr('checked',false);\r\n    }\r\n}\r\n\$(document).ready(function(){\r\n\t\$(\"#add_form\").validate({\r\n\t\terrorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        onkeyup    : false,\r\n        rules : {\r\n            admin_name : {\r\n                required : true,\r\n\t\t\t\tminlength: 3,\r\n\t\t\t\tmaxlength: 20,\r\n\t\t\t\tremote\t: {\r\n                    url :'index.php?act=admin&op=ajax&branch=check_admin_name',\r\n                    type:'get',\r\n                    data:{\r\n                    \tadmin_name : function(){\r\n                            return \$('#admin_name').val();\r\n                        }\r\n                    }\r\n                }\r\n            },\r\n            admin_password : {\r\n                required : true,\r\n\t\t\t\tminlength: 6,\r\n\t\t\t\tmaxlength: 20\r\n            }\r\n        },\r\n        messages : {\r\n            admin_name : {\r\n                required : '";
echo $lang['admin_add_username_null'];
echo "',\r\n\t\t\t\tminlength: '";
echo $lang['admin_add_username_max'];
echo "',\r\n\t\t\t\tmaxlength: '";
echo $lang['admin_add_username_max'];
echo "',\r\n\t\t\t\tremote\t : '";
echo $lang['admin_add_admin_not_exists'];
echo "'\r\n            },\r\n            admin_password : {\r\n                required : '";
echo $lang['admin_add_password_null'];
echo "',\r\n\t\t\t\tminlength: '";
echo $lang['admin_add_password_max'];
echo "',\r\n\t\t\t\tmaxlength: '";
echo $lang['admin_add_password_max'];
echo "'\r\n            }\r\n        }\r\n\t});\r\n});\r\n</script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.ipassword.js\"></script> \r\n<script type=\"text/javascript\">\r\n\$(document).ready(function(){\t\r\n\t// to enable iPass plugin\r\n\t\$(\"input[type=password]\").iPass();\r\n});\t\r\n</script> \r\n";
?>
