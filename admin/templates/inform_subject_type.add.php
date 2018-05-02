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
echo $lang['inform_manage_title'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        ";
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
				echo "\" ><span>";
				echo $menu['menu_name'];
				echo "</span></a></li>\r\n        ";
		}
}
echo "      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"add_form\" method=\"post\" enctype=\"multipart/form-data\" action=\"index.php?act=inform&op=inform_subject_type_save\" name=\"form1\">\r\n    <table class=\"table tb-type2 nobdb\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\">";
echo $lang['inform_type'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" id=\"inform_type_name\" name=\"inform_type_name\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\">";
echo $lang['inform_type_desc'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea name=\"inform_type_desc\" rows=\"6\" id=\"inform_type_desc\" class=\"tarea\"></textarea></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.form1.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\">\r\n//按钮先执行验证再提交表单\r\n\$(function(){\$(\"#submitBtn\").click(function(){\r\n    if(\$(\"#goods_class_form\").valid()){\r\n     \$(\"#goods_class_form\").submit();\r\n\t}\r\n\t});\r\n});\r\n//\r\n\$(document).ready(function(){\r\n    //添加按钮的单击事件\r\n    \$(\"#btn_add\").click(function(){\r\n        submit_form();\r\n    });\r\n    //页面输入内容验证\r\n\t\$(\"#add_form\").validate({\r\n\t\terrorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        onkeyup    : false,\r\n        rules : {\r\n        \tinform_type_name: {\r\n        \t\trequired : true,\r\n                maxlength : 50\r\n        \t},\r\n        \tinform_type_desc: {\r\n                required : true,\r\n                maxlength : 100\r\n            }\r\n        },\r\n        messages : {\r\n      \t\tinform_type_name: {\r\n       \t\t\trequired : '";
echo $lang['inform_type_null'];
echo "',\r\n       \t\t\tmaxlength : '";
echo $lang['inform_type_null'];
echo "'\r\n\t    \t},\r\n\t    \tinform_type_desc: {\r\n                required : '";
echo $lang['inform_type_desc_null'];
echo "',\r\n                maxlength : '";
echo $lang['inform_type_desc_null'];
echo "'\r\n\t\t    }\r\n        }\r\n\t});\r\n});\r\n//submit函数\r\nfunction submit_form(submit_type){\r\n\t\$('#add_form').submit();\r\n}\r\n</script>";
?>
