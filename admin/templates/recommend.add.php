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
echo $lang['recommend_index_type'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=recommend&op=recommend\" ><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_add'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"form_add\" method=\"post\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"config_name\" value=\"css_class,width,height,limit\" />\r\n    <table class=\"table tb-type2 nobdb\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"recommend_name\">";
echo $lang['recommend_index_type_name'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"\" id=\"recommend_name\" name=\"recommend_name\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['recommend_index_type_name'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"css_class\">";
echo $lang['recommend_css_class'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"showcase\" id=\"css_class\" name=\"css_class\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['recommend_css_class_notice'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"width\">";
echo $lang['recommend_add_width'];
echo "</label>-<label for=\"height\">";
echo $lang['recommend_add_height'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['config_array']['width'];
echo "\" name=\"width\" id=\"width\" class=\"txt2\">-&nbsp;&nbsp;<input type=\"text\" value=\"";
echo $output['config_array']['height'];
echo "\" name=\"height\" id=\"height\" class=\"txt2\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['recommend_css_class_px'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"limit\">";
echo $lang['recommend_add_limit'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"10\" name=\"limit\" id=\"limit\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['recommend_add_limit_max'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"recommend_desc\">";
echo $lang['recommend_desc'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea rows=\"6\" class=\"tarea\" name=\"recommend_desc\" id=\"recommend_desc\">";
echo $output['recommend_array']['recommend_desc'];
echo "</textarea></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"15\"><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script>\r\n//按钮先执行验证再提交表单\r\n\$(function(){\$(\"#submitBtn\").click(function(){\r\n    if(\$(\"#form_add\").valid()){\r\n     \$(\"#form_add\").submit();\r\n\t}\r\n\t});\r\n});\r\n//\r\n\$(document).ready(function(){\r\n\t\$(\"#form_add\").validate({\r\n\t\terrorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        onkeyup    : false,\r\n        rules : {\r\n            recommend_name : {\r\n                required : true,\r\n                remote   : {\r\n               \turl :'index.php?act=recommend&op=ajax&type=check_recommend',\r\n                type:'get',\r\n                data:{\r\n                    recommend_name : function(){\r\n                        return \$('#recommend_name').val();\r\n                        },\r\n                    \tid  : ''\r\n                    }\r\n                }\r\n            },\r\n            css_class : {\r\n                required : true\r\n            },\r\n            width : {\r\n                required : true,\r\n                digits   : true\r\n            },\r\n            height : {\r\n                required : true,\r\n                digits   : true\r\n            },\r\n            limit : {\r\n                required : true,\r\n                digits   : true,\r\n                min    :1,\r\n                max    :20\r\n            }\r\n        },\r\n        messages : {\r\n            recommend_name : {\r\n                required : '";
echo $lang['recommend_add_name_null'];
echo "',\r\n                remote   : '";
echo $lang['recommend_add_name_exists'];
echo "'\r\n            },\r\n            css_class  : {\r\n                required   : '";
echo $lang['recommend_css_class_null'];
echo "'\r\n            },\r\n            width  : {\r\n                required : '";
echo $lang['recommend_add_width_int'];
echo "',\r\n                digits   : '";
echo $lang['recommend_add_width_int'];
echo "'\r\n            },\r\n            height  : {\r\n                required : '";
echo $lang['recommend_add_height_int'];
echo "',\r\n                digits   : '";
echo $lang['recommend_add_height_int'];
echo "'\r\n            },\r\n            limit  : {\r\n                required : '";
echo $lang['recommend_add_limit_int'];
echo "',\r\n                digits   : '";
echo $lang['recommend_add_limit_int'];
echo "',\r\n                min    :'";
echo $lang['recommend_add_limit_minerror'];
echo "',\r\n                max    :'";
echo $lang['recommend_add_limit_maxerror'];
echo "'\r\n            }\r\n        }\r\n\t});\r\n});\r\n</script>";
?>
