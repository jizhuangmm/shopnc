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
echo "      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <br/>\r\n  <form id=\"add_form\" method=\"post\" enctype=\"multipart/form-data\" action=\"index.php?act=inform&op=inform_subject_save\">\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['inform_type'];
echo ":</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\"><ul class=\"nofloat\">\r\n              ";
foreach ( $output['list'] as $inform_type )
{
		echo "              <li>\r\n                <p>\r\n                  <input type='radio' name=\"inform_subject_type\" id=\"";
		echo $inform_type['inform_type_id'].",".$inform_type['inform_type_name'];
		echo "\" value =\"";
		echo $inform_type['inform_type_id'].",".$inform_type['inform_type_name'];
		echo "\">\r\n                  <label for=\"";
		echo $inform_type['inform_type_id'].",".$inform_type['inform_type_name'];
		echo "\">";
		echo $inform_type['inform_type_name'];
		echo ":</label>\r\n                  </input>\r\n                  &nbsp;&nbsp;<span style=\"color:green\" >";
		echo $inform_type['inform_type_desc'];
		echo "</span></p>\r\n              </li>\r\n              ";
}
echo "            </ul></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\"  for=\"inform_subject_content\">";
echo $lang['inform_subject'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" id=\"inform_subject_content\" name=\"inform_subject_content\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n      <tfoot>\r\n        <tr class=\"tfoot\"><td colspan=\"15\" ><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\">\r\n//按钮先执行验证再提交表单\r\n\$(function(){\$(\"#submitBtn\").click(function(){\r\n    if(\$(\"#add_form\").valid()){\r\n     \$(\"#add_form\").submit();\r\n\t}\r\n\t});\r\n});\r\n//\r\n\$(document).ready(function(){\r\n    //默认选中第一个radio\r\n    \$(\":radio\").first().attr(\"checked\",true);\r\n    //添加按钮的单击事件\r\n    \$(\"#btn_add\").click(function(){\r\n        submit_form();\r\n    });\r\n    //页面输入内容验证\r\n\t\$(\"#add_form\").validate({\r\n\t\terrorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        onkeyup    : false,\r\n        rules : {\r\n        \tinform_subject_content: {\r\n                required : true,\r\n                maxlength : 100\r\n            }\r\n        },\r\n        messages : {\r\n      \t\tinform_subject_content: {\r\n       \t\t\trequired : '";
echo $lang['inform_subject_add_null'];
echo "',\r\n       \t\t\tmaxlength : '";
echo $lang['inform_subject_add_null'];
echo "'\r\n\t    \t}\r\n        }\r\n\t});\r\n});\r\n//submit函数\r\nfunction submit_form(submit_type){\r\n\t\$('#add_form').submit();\r\n}\r\n</script>";
?>
