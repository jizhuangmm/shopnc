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
echo "<script type=\"text/javascript\">\r\n\$(document).ready(function(){\r\n    \$(\"#submitBtn\").click(function(){ \r\n        \$(\"#add_form\").submit();\r\n    });\r\n    //页面输入内容验证\r\n\t\$(\"#add_form\").validate({\r\n\t\terrorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        onkeyup    : false,\r\n        rules : {\r\n        \tpromotion_mansong_price: {\r\n                required : true,\r\n                digits : true,\r\n                min : 1\r\n            }\r\n        },\r\n        messages : {\r\n      \t\tpromotion_mansong_price: {\r\n       \t\t\trequired : '";
echo $lang['mansong_price_error'];
echo "',\r\n       \t\t\tdigits : '";
echo $lang['mansong_price_error'];
echo "',\r\n                min : '";
echo $lang['mansong_price_error'];
echo "'\r\n            }\r\n        }\r\n\t});\r\n});\r\n//submit函数\r\nfunction submit_form(submit_type){\r\n\t\$('#submit_type').val(submit_type);\r\n\t\$('#add_form').submit();\r\n}\r\n</script> \r\n<div class=\"page\">\r\n  <!-- 页面导航 -->\r\n  <div class=\"fixed-bar\">\r\n    <div class=\"item-title\">\r\n      <h3>";
echo $lang['promotion_mansong'];
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
echo "      </ul>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"add_form\" method=\"post\" enctype=\"multipart/form-data\" action=\"index.php?act=promotion_mansong&op=mansong_setting_save\">\r\n    <input type=\"hidden\" id=\"submit_type\" name=\"submit_type\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\">";
echo $lang['mansong_price'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n            <td class=\"vatop rowform\">\r\n                <input type=\"text\" id=\"promotion_mansong_price\" name=\"promotion_mansong_price\" value=\"";
echo $output['setting']['promotion_mansong_price'];
echo "\" class=\"txt\">\r\n            </td>\r\n            <td class=\"vatop tips\">";
echo $lang['mansong_price_explain'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"15\"><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n\r\n";
?>
