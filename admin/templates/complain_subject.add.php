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
echo "\r\n<div class=\"page\">\r\n  <div class=\"fixed-bar\">\r\n    <div class=\"item-title\">\r\n      <h3> ";
echo $lang['complain_manage_title'];
echo " </h3>\r\n      <ul class=\"tab-base\">\r\n        ";
foreach ( $output['menu'] as $menu )
{
		if ( $menu['menu_type'] == "text" )
		{
				echo "        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
				echo $menu['menu_name'];
				echo "</span></a></li>\r\n        ";
		}
		else
		{
				echo "        <li><a href=\"";
				echo $menu['menu_url'];
				echo "\"><span>";
				echo $menu['menu_name'];
				echo "</span></a></li>\r\n        ";
		}
}
echo "      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"add_form\" method=\"post\" enctype=\"multipart/form-data\" action=\"index.php?act=complain&op=complain_subject_save\">\r\n    <table class=\"table tb-type2 nobdb\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['complain_subject_type'];
echo ":</label></td>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><ul><li><input type='radio' name=\"complain_subject_type\" value =\"1\" id=\"complain_subject_type1\">\r\n            <label for=\"complain_subject_type1\">";
echo $lang['complain_text_buyer'];
echo "</label>\r\n            </li><li>\r\n            <input type='radio' name=\"complain_subject_type\" value =\"2\" id=\"complain_subject_type2\">\r\n            <label for=\"complain_subject_type2\">";
echo $lang['complain_text_seller'];
echo "</label>\r\n            </li></ul></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"complain_subject_content\">";
echo $lang['complain_subject_content'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" id=\"complain_subject_content\" name=\"complain_subject_content\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"complain_subject_desc\">";
echo $lang['complain_subject_desc'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea name=\"complain_subject_desc\" rows=\"6\" class=\"tarea\" id=\"complain_subject_desc\"></textarea></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\"><td colspan=\"15\" ><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\">\r\n//按钮先执行验证再提交表单\r\n\$(function(){\$(\"#submitBtn\").click(function(){\r\n    if(\$(\"#add_form\").valid()){\r\n     \$(\"#add_form\").submit();\r\n\t}\r\n\t});\r\n});\r\n//\r\n\$(document).ready(function(){\r\n    //默认选中第一个radio\r\n    \$(\":radio\").first().attr(\"checked\",true);\r\n    //添加按钮的单击事件\r\n    \$(\"#btn_add\").click(function(){\r\n        submit_form();\r\n    });\r\n    //页面输入内容验证\r\n\t\$(\"#add_form\").validate({\r\n\t\terrorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        onkeyup    : false,\r\n        rules : {\r\n        \tcomplain_subject_content: {\r\n                required : true,\r\n                maxlength : 50\r\n            },\r\n        \tcomplain_subject_desc: {\r\n                required : true,\r\n                maxlength : 100\r\n            }\r\n        },\r\n        messages : {\r\n      \t\tcomplain_subject_content: {\r\n       \t\t\trequired : '";
echo $lang['complain_subject_content_error'];
echo "',\r\n       \t\t\tmaxlength : '";
echo $lang['complain_subject_content_error'];
echo "'\r\n\t    \t},\r\n      \t\tcomplain_subject_desc: {\r\n       \t\t\trequired : '";
echo $lang['complain_subject_desc_error'];
echo "',\r\n       \t\t\tmaxlength : '";
echo $lang['complain_subject_desc_error'];
echo "'\r\n\t    \t}\r\n        }\r\n\t});\r\n});\r\n//submit函数\r\nfunction submit_form(submit_type){\r\n\t\$('#add_form').submit();\r\n}\r\n</script>\r\n";
?>
