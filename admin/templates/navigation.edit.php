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
echo $lang['navigation_index_nav'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=navigation&op=navigation\" ><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=navigation&op=navigation_add\" ><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_edit'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"navigation_form\" method=\"post\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"nav_id\" value=\"";
echo $output['navigation_array']['nav_id'];
echo "\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label> ";
echo $lang['navigation_add_type'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><ul class=\"nofloat\">\r\n              <li class=\"left w100pre\"><span class=\"radio\">\r\n                <input type=\"radio\" ";
if ( $output['navigation_array']['nav_type'] == "0" )
{
		echo "checked=\"checked\"";
}
echo " value=\"0\" name=\"nav_type\" id=\"diy\" onclick=\"showType('diy');\">\r\n                <label for=\"diy\">";
echo $lang['navigation_add_custom'];
echo "</label>\r\n                </span> </li>\r\n              <li class=\"left w100pre\"><span class=\"radio\">\r\n                <input type=\"radio\" ";
if ( $output['navigation_array']['nav_type'] == "1" )
{
		echo "checked=\"checked\"";
}
echo " value=\"1\" name=\"nav_type\" id=\"goods_class\" onclick=\"showType('goods_class');\">\r\n                <label for=\"goods_class\">";
echo $lang['navigation_add_goods_class'];
echo "</label>\r\n                </span>\r\n                <select name=\"goods_class_id\" id=\"goods_class_id\" style=\"display: none;\">\r\n                  ";
if ( is_array( $output['goods_class_list'] ) )
{
		echo "                  ";
		foreach ( $output['goods_class_list'] as $k => $v )
		{
				echo "                  <option ";
				if ( $output['navigation_array']['item_id'] == $v['gc_id'] )
				{
						echo "selected=\"selected\"";
				}
				echo " value=\"";
				echo $v['gc_id'];
				echo "\">";
				echo $v['gc_name'];
				echo "</option>\r\n                  ";
		}
		echo "                  ";
}
echo "                </select>\r\n              </li>\r\n              <li class=\"left w100pre\"><span class=\"radio\">\r\n                <input type=\"radio\" ";
if ( $output['navigation_array']['nav_type'] == "2" )
{
		echo "checked=\"checked\"";
}
echo " value=\"2\" name=\"nav_type\" id=\"article_class\" onclick=\"showType('article_class');\">\r\n                <label for=\"article_class\">";
echo $lang['navigation_add_article_class'];
echo "</label>\r\n                </span>\r\n                <select name=\"article_class_id\" id=\"article_class_id\" style=\"display: none;\">\r\n                  ";
if ( is_array( $output['article_class_list'] ) )
{
		echo "                  ";
		foreach ( $output['article_class_list'] as $k => $v )
		{
				echo "                  <option ";
				if ( $output['navigation_array']['item_id'] == $v['ac_id'] )
				{
						echo "selected=\"selected\"";
				}
				echo " value=\"";
				echo $v['ac_id'];
				echo "\">";
				echo $v['ac_name'];
				echo "</option>\r\n                  ";
		}
		echo "                  ";
}
echo "                </select>\r\n              </li>\r\n              <li class=\"left w100pre\"><span class=\"radio\">\r\n                <input type=\"radio\" ";
if ( $output['navigation_array']['nav_type'] == "3" )
{
		echo "checked=\"checked\"";
}
echo " value=\"3\" name=\"nav_type\" id=\"activity\" onclick=\"showType('activity');\">\r\n                <label for=\"activity\">";
echo $lang['navigation_add_activity'];
echo "</label>\r\n                </span>\r\n                <select name=\"activity_id\" id=\"activity_id\" style=\"display: none;\">\r\n                  ";
if ( is_array( $output['activity_list'] ) )
{
		echo "                  ";
		foreach ( $output['activity_list'] as $k => $v )
		{
				echo "                  <option ";
				if ( $output['navigation_array']['item_id'] == $v['activity_id'] )
				{
						echo "selected=\"selected\"";
				}
				echo " value=\"";
				echo $v['activity_id'];
				echo "\">";
				echo $v['activity_title'];
				echo "</option>\r\n                  ";
		}
		echo "                  ";
}
echo "                </select>\r\n              </li>\r\n            </ul></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"nav_title\">";
echo $lang['navigation_index_title'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['navigation_array']['nav_title'];
echo "\" name=\"nav_title\" id=\"nav_title\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"nav_url\">";
echo $lang['navigation_index_url'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['navigation_array']['nav_url'];
echo "\" name=\"nav_url\" id=\"nav_url\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>\r\n            <label for=\"type\">";
echo $lang['navigation_index_location'];
echo ":</label>\r\n            </label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform \"><ul>\r\n              <li>\r\n                <input type=\"radio\" ";
if ( $output['navigation_array']['nav_location'] == "0" )
{
		echo "checked=\"checked\"";
}
echo " value=\"0\" name=\"nav_location\" id=\"nav_location0\">\r\n                <label for=\"nav_location0\">";
echo $lang['navigation_index_top'];
echo "</label>\r\n              </li>\r\n              <li>\r\n                <input type=\"radio\" ";
if ( $output['navigation_array']['nav_location'] == "1" )
{
		echo "checked=\"checked\"";
}
echo " value=\"1\" name=\"nav_location\" id=\"nav_location1\">\r\n                <label for=\"nav_location1\">";
echo $lang['navigation_index_center'];
echo "</label>\r\n              </li>\r\n              <li>\r\n                <input type=\"radio\" ";
if ( $output['navigation_array']['nav_location'] == "2" )
{
		echo "checked=\"checked\"";
}
echo " value=\"2\" name=\"nav_location\" id=\"nav_location2\">\r\n                <label for=\"nav_location2\">";
echo $lang['navigation_index_bottom'];
echo " </label>\r\n              </li>\r\n            </ul></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>\r\n            <label>";
echo $lang['navigation_index_open_new'];
echo ":</label>\r\n            </label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"nav_new_open1\" class=\"cb-enable ";
if ( $output['navigation_array']['nav_new_open'] == "1" )
{
		echo "selected";
}
echo "\" ><span>";
echo $lang['nc_yes'];
echo "</span></label>\r\n            <label for=\"nav_new_open0\" class=\"cb-disable ";
if ( $output['navigation_array']['nav_new_open'] == "0" )
{
		echo "selected";
}
echo "\" ><span>";
echo $lang['nc_no'];
echo "</span></label>\r\n            <input id=\"nav_new_open1\" name=\"nav_new_open\" ";
if ( $output['navigation_array']['nav_new_open'] == "1" )
{
		echo "checked=\"checked\"";
}
echo "  value=\"1\" type=\"radio\">\r\n            <input id=\"nav_new_open0\" name=\"nav_new_open\" ";
if ( $output['navigation_array']['nav_new_open'] == "0" )
{
		echo "checked=\"checked\"";
}
echo " value=\"0\" type=\"radio\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"nav_sort\">";
echo $lang['nc_sort'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['navigation_array']['nav_sort'];
echo "\" name=\"nav_sort\" id=\"nav_sort\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"15\"><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script>\r\n//按钮先执行验证再提交表单\r\n\$(function(){\$(\"#submitBtn\").click(function(){\r\n    if(\$(\"#navigation_form\").valid()){\r\n     \$(\"#navigation_form\").submit();\r\n\t}\r\n\t});\r\n});\r\n//\r\n\$(document).ready(function(){\r\n\t\$('#navigation_form').validate({\r\n        errorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        rules : {\r\n            nav_title : {\r\n                required : true\r\n            },\r\n            nav_sort:{\r\n               number   : true\r\n            }\r\n        },\r\n        messages : {\r\n            nav_title : {\r\n                required : '";
echo $lang['navigation_add_partner_null'];
echo "'\r\n            },\r\n            nav_sort  : {\r\n                number   : '";
echo $lang['navigation_add_sort_int'];
echo "'\r\n            }\r\n        }\r\n    });\r\n\t\r\n\t";
if ( $output['navigation_array']['nav_type'] == "1" )
{
		echo "\tshowType('goods_class');\r\n\t";
}
echo "\t";
if ( $output['navigation_array']['nav_type'] == "2" )
{
		echo "\tshowType('article_class');\r\n\t";
}
echo "\t";
if ( $output['navigation_array']['nav_type'] == "3" )
{
		echo "\tshowType('activity');\r\n\t";
}
echo "});\r\n\r\nfunction showType(type){\r\n\t\$('#goods_class_id').css('display','none');\r\n\t\$('#article_class_id').css('display','none');\r\n\t\$('#activity_id').css('display','none');\r\n\tif(type == 'diy'){\r\n\t\t\$('#nav_url').attr('disabled',false);\r\n\t}else{\r\n\t\t\$('#nav_url').attr('disabled',true);\r\n\t\t\$('#'+type+'_id').show();\t\r\n\t}\r\n}\r\n</script>";
?>
