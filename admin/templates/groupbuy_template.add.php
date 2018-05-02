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
echo "<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/jquery.ui.js\"></script>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/i18n/zh-CN.js\" charset=\"utf-8\"></script>\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/themes/ui-lightness/jquery.ui.css\"  />\r\n\r\n<script type=\"text/javascript\">\r\n\$(document).ready(function(){\r\n    \$(\"#submit\").click(function(){\r\n        \$(\"#add_form\").submit();\r\n    });\r\n    jQuery.validator.methods.greaterThanDate = function(value, element, param) {\r\n        var date1 = new Date(Date.parse(param.replace(/-/g, \"/\")));\r\n        var date2 = new Date(Date.parse(value.replace(/-/g, \"/\")));\r\n        return date1 < date2;\r\n    };\r\n\r\n    jQuery.validator.methods.endDate = function(value, element) {\r\n        var startDate = \$(\"#start_time\").val();\r\n        var date1 = new Date(Date.parse(startDate.replace(/-/g, \"/\")));\r\n        var date2 = new Date(Date.parse(value.replace(/-/g, \"/\")));\r\n        return date1 < date2;\r\n    };\r\n    \r\n    \r\n    //团购活动起始时间\r\n    \$('#start_time').datepicker();\r\n    \$('#end_time').datepicker();\r\n    \$('#join_end_time').datepicker();\r\n    \r\n\t\$('#add_form').validate({\r\n        errorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        onfocusout : false,\r\n        onkeyup    : false,\r\n        rules : {\r\n            template_name : {\r\n                required : true\r\n            },\r\n            start_time : {\r\n                required : true,\r\n                dateISO : true,\r\n                greaterThanDate :  '";
echo date( "Y-m-d", $output['max_end_time'] );
echo "'\r\n            },\r\n            end_time : {\r\n                required : true,\r\n                dateISO : true,\r\n                endDate : true\r\n            },\r\n            join_end_time : {\r\n                required : true,\r\n                dateISO : true\r\n            }\r\n        },\r\n        messages : {\r\n            template_name : {\r\n                required :  '";
echo $lang['template_name_error'];
echo "'\r\n            },\r\n            start_time : {\r\n                required : '";
echo $lang['start_time_error'];
echo "',\r\n                dateISO :  '";
echo $lang['start_time_error'];
echo "',\r\n                greaterThanDate :  '";
echo $lang['start_time_overlap'];
echo "'\r\n            },\r\n            end_time : {\r\n                required : '";
echo $lang['end_time_error'];
echo "',\r\n                dateISO :  '";
echo $lang['end_time_error'];
echo "',\r\n                endDate :  '";
echo $lang['end_time_error'];
echo "'\r\n            },\r\n            join_end_time : {\r\n                required : '";
echo $lang['join_end_time_error'];
echo "',\r\n                dateISO :  '";
echo $lang['join_end_time_error'];
echo "'\r\n            }\r\n        }\r\n    });\r\n});\r\n</script>\r\n<div class=\"page\">\r\n  <div class=\"fixed-bar\">\r\n    <div class=\"item-title\">\r\n      <h3>";
echo $lang['groupbuy_index_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n          ";
foreach ( $output['menu'] as $menu )
{
		if ( $menu['menu_type'] == "text" )
		{
				echo "          <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
				echo $menu['menu_name'];
				echo "</span></a></li>\r\n          ";
		}
		else
		{
				echo "          <li><a href=\"";
				echo $menu['menu_url'];
				echo "\" ><span>";
				echo $menu['menu_name'];
				echo "</span></a></li>\r\n          ";
		}
}
echo "      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <!-- 操作说明 -->\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n      <tbody>\r\n      <tr class=\"space odd\">\r\n          <th colspan=\"12\" class=\"nobg\"><div class=\"title\">\r\n                  <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n                  <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n          <td><ul>\r\n                  <li>";
echo $lang['groupbuy_template_add_help1'];
echo "</li>\r\n                  <li>";
echo $lang['groupbuy_template_add_help2'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n      </tbody>\r\n  </table>\r\n  <form id=\"add_form\" method=\"post\" action=\"index.php?act=groupbuy&op=groupbuy_template_save\">\r\n      <input name=\"template_id\" type=\"hidden\" value=\"";
echo $output['template_info']['template_id'];
echo "\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"template_name\">";
echo $lang['groupbuy_template_name'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['template_info']['template_name'];
echo "\" name=\"template_name\" id=\"template_name\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang[''];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"start_time\">";
echo $lang['start_time'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n            <td class=\"vatop rowform\">\r\n                <input type=\"text\" value=\"\" name=\"start_time\" id=\"start_time\" class=\"txt date-short\">";
echo $lang['day'];
echo " <select name=\"start_time_hour\" class=\"valid\" style=\"width:60px; margin-left:8px; margin-left:4px;\">\r\n                    ";
foreach ( $output['hour_list'] as $key )
{
		echo "                    <option value=\"";
		echo $key;
		echo "\">";
		echo $key;
		echo "</option>\r\n                    ";
}
echo "                </select>";
echo $lang['hour'];
echo "        </td>\r\n          <td class=\"vatop tips\">";
if ( !empty( $output['max_end_time'] ) )
{
		echo $lang['groupbuy_start_time_explain'].date( "Y-m-d", $output['max_end_time'] );
}
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"end_time\">";
echo $lang['end_time'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n            <td class=\"vatop rowform\">\r\n                <input type=\"text\" value=\"";
echo $output['template_info']['end_time'];
echo "\" name=\"end_time\" id=\"end_time\" class=\"txt date-short\">";
echo $lang['day'];
echo "                <select name=\"end_time_hour\" class=\"valid\" style=\"width:60px; margin-left:8px; margin-left:4px;\">\r\n                    ";
foreach ( $output['hour_list'] as $key )
{
		echo "                  <option value=\"";
		echo $key;
		echo "\">";
		echo $key;
		echo "</option>\r\n                    ";
}
echo "                </select>";
echo $lang['hour'];
echo "</td>\r\n          <td class=\"vatop tips\">";
echo $lang[''];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"join_end_time\">";
echo $lang['join_end_time'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n            <td class=\"vatop rowform\">\r\n                <input type=\"text\" value=\"";
echo $output['template_info']['join_end_time'];
echo "\" name=\"join_end_time\" id=\"join_end_time\" class=\"txt date-short\">";
echo $lang['day'];
echo "                <select name=\"join_end_time_hour\" class=\"valid\" style=\"width:60px; margin-left:8px; margin-left:4px;\">\r\n                    ";
foreach ( $output['hour_list'] as $key )
{
		echo "                  <option value=\"";
		echo $key;
		echo "\">";
		echo $key;
		echo "</option>\r\n                    ";
}
echo "                </select>";
echo $lang['hour'];
echo "</td>\r\n          <td class=\"vatop tips\">";
echo $lang[''];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr>\r\n          <td colspan=\"2\"><a id=\"submit\" href=\"javascript:void(0)\" class=\"btn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n\r\n";
?>
