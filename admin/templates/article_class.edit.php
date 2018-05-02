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
echo $lang['article_class_index_class'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=article_class&op=article_class\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=article_class&op=article_class_add\"><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_edit'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"article_class_form\" method=\"post\" name=\"articleClassForm\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"ac_id\" value=\"";
echo $output['class_array']['ac_id'];
echo "\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"ac_name\">";
echo $lang['article_class_index_name'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['class_array']['ac_name'];
echo "\" name=\"ac_name\" id=\"ac_name\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['article_class_index_name'];
echo "</td>\r\n        </tr><!--\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"parent_id\">";
echo $lang['article_class_add_sup_class'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><select name=\"ac_parent_id\" id=\"ac_parent_id\">\r\n              <option value=\"0\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n              ";
if ( !empty( $output['parent_list'] ) || is_array( $output['parent_list'] ) )
{
		echo "              ";
		foreach ( $output['parent_list'] as $k => $v )
		{
				echo "              <option ";
				if ( $output['class_array']['ac_parent_id'] == $v['ac_id'] )
				{
						echo "selected='selected'";
				}
				echo " value=\"";
				echo $v['ac_id'];
				echo "\">";
				echo $v['ac_name'];
				echo "</option>\r\n              ";
		}
		echo "              ";
}
echo "            </select></td>\r\n          <td class=\"vatop tips\">";
echo $lang['article_class_add_sup_class_notice2'];
echo "</td>\r\n        </tr>\r\n        --><tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"ac_sort\">";
echo $lang['nc_sort'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['class_array']['ac_sort'];
echo "\" name=\"ac_sort\" id=\"ac_sort\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['article_class_add_update_sort'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"15\" ><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script>\r\n//按钮先执行验证再提交表单\r\n\$(function(){\$(\"#submitBtn\").click(function(){\r\n    if(\$(\"#article_class_form\").valid()){\r\n     \$(\"#article_class_form\").submit();\r\n\t}\r\n\t});\r\n});\r\n//\r\n\$(document).ready(function(){\r\n\t\$('#article_class_form').validate({\r\n        errorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        onfocusout : false,\r\n        onkeyup    : false,\r\n        rules : {\r\n            ac_name : {\r\n                required : true,\r\n                remote   : {\r\n                url :'index.php?act=article_class&op=ajax&branch=check_class_name',\r\n                type:'get',\r\n                data:{\r\n                    ac_name : function(){\r\n                        return \$('#ac_name').val();\r\n                    },\r\n                    ac_parent_id : function() {\r\n                        return \$('#ac_parent_id').val();\r\n                    },\r\n                    ac_id : '";
echo $output['class_array']['ac_id'];
echo "'\r\n                  }\r\n                }\r\n            },\r\n            ac_sort : {\r\n                number   : true\r\n            }\r\n        },\r\n        messages : {\r\n            ac_name : {\r\n                required : '";
echo $lang['article_class_add_name_null'];
echo "',\r\n                remote   : '";
echo $lang['article_class_add_name_exists'];
echo "'\r\n            },\r\n            ac_sort  : {\r\n                number   : '";
echo $lang['article_class_add_sort_int'];
echo "'\r\n            }\r\n        }\r\n    });\r\n});\r\n</script>";
?>
