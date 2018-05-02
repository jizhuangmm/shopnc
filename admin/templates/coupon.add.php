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
echo $lang['nc_coupon_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=coupon&op=list\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_add'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"add_form\" method=\"post\" enctype=\"multipart/form-data\" name=\"form1\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['coupon_name'];
echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" id=\"coupon_title\" name=\"coupon_title\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['coupon_price'];
echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" id=\"coupon_exchange\" name=\"coupon_exchange\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['coupon_store_name'];
echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" id=\"coupon_store\" name=\"coupon_store\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['coupon_store_notice'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['coupon_class'];
echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><select name=\"coupon_class\">\r\n              ";
if ( is_array( $output['coupon_class'] ) && !empty( $output['coupon_class'] ) )
{
		echo "              ";
		foreach ( $output['coupon_class'] as $key => $class )
		{
				echo "              <option value=\"";
				echo $class['class_id'];
				echo "\"> ";
				echo $class['class_name'];
				echo "</option>\r\n              ";
		}
		echo "              ";
}
echo "            </select></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['coupon_lifetime'];
echo ":\r\n            </th></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" id=\"coupon_start_date\" name=\"coupon_start_date\" readonly=\"readonly\" />\r\n            ~\r\n            <input type=\"text\" id=\"coupon_end_date\" name=\"coupon_end_date\" readonly=\"readonly\" /></td>\r\n          <td class=\"vatop tips\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['coupon_pic'];
echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"file\" id=\"coupon_banner\" name=\"coupon_banner\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['coupon_coupon_pic_notice'];
echo "</td>\r\n          \r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['coupon_notice'];
echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea class=\"tarea\" name=\"coupon_desc\" rows=\"6\" id=\"coupon_desc\"></textarea></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['coupon_coupon_state'];
echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"state1\" class=\"cb-enable selected\"><span>";
echo $lang['nc_yes'];
echo "</span></label>\r\n            <label for=\"state\" class=\"cb-disable\"><span>";
echo $lang['nc_no'];
echo "</span></label></td>\r\n          <input type=\"radio\" name=\"coupon_state\" value=\"2\" id=\"state1\" checked=\"checked\"/>\r\n          <input type=\"radio\" name=\"coupon_state\" value=\"1\" id=\"state0\" />\r\n          <td class=\"vatop tips\">";
echo $lang['coupon_state_notice'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['coupon_lock'];
echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\">\r\n          <label for=\"lock1\" class=\"cb-enable selected\"><span>";
echo $lang['nc_yes'];
echo "</span></label>\r\n            <label for=\"lock2\" class=\"cb-disable\"><span>";
echo $lang['nc_no'];
echo "</span></label>\r\n          <input type=\"radio\" name=\"coupon_lock\" value=\"2\" id=\"lock2\" checked=\"checked\"/>\r\n          <input type=\"radio\" name=\"coupon_lock\" value=\"1\" id=\"lock1\" /></td>\r\n          <td class=\"vatop tips\">";
echo $lang['coupon_lock_notice'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\"><td colspan=\"15\" ><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<link type=\"text/css\" rel=\"stylesheet\" href=\"";
echo RESOURCE_PATH."/js/jquery-ui/themes/ui-lightness/jquery.ui.css";
echo "\"/>\r\n<script src=\"";
echo RESOURCE_PATH."/js/jquery-ui/jquery.ui.js";
echo "\" charset=\"utf-8\"></script> \r\n<script src=\"";
echo RESOURCE_PATH."/js/jquery-ui/i18n/zh-CN.js";
echo "\" charset=\"utf-8\"></script> \r\n<script>\r\n//按钮先执行验证再提交表单\r\n\$(function(){\$(\"#submitBtn\").click(function(){\r\n    if(\$(\"#add_form\").valid()){\r\n     \$(\"#add_form\").submit();\r\n\t}\r\n\t});\r\n});\r\n//\r\n\$(document).ready(function(){\r\n\t\$('#coupon_start_date').datepicker({onSelect:function(dateText,inst){\r\n    \tvar year2 = dateText.split('-') ;\r\n    \t\$('#coupon_end_date').datepicker( \"option\", \"minDate\", new Date(parseInt(year2[0]),parseInt(year2[1])-1,parseInt(year2[2])) );\r\n    }});\r\n    \$('#coupon_end_date').datepicker({onSelect:function(dateText,inst){\r\n    \tvar year1 = dateText.split('-') ;\r\n    \t\$('#coupon_start_date').datepicker( \"option\", \"maxDate\", new Date(parseInt(year1[0]),parseInt(year1[1])-1,parseInt(year1[2])) );\r\n    }})\r\n\t\$(\"#add_form\").validate({\r\n\t\terrorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        onkeyup    : false,\r\n        rules : {\r\n        \tcoupon_title: {\r\n        \t\trequired : true\r\n        \t},\r\n        \tcoupon_exchange: {\r\n\t\t\t\trequired : true \r\n            },\r\n            coupon_store: {\r\n\t\t\t\trequired : true ,\r\n\t\t\t\tremote   : {\r\n\t               \turl :'index.php?act=coupon&op=ajax&branch=check_store_name',\r\n\t                type:'get',\r\n\t                data:{\r\n\t                    store_name : function(){\r\n\t                        return \$('#coupon_store').val();\r\n\t                        }\r\n\t                    }\r\n\t            }\r\n            },\r\n            coupon_banner : {\r\n\t\t\t\trequired : true \r\n            },\r\n        \tcoupon_desc: {\r\n        \t\trequired : true\r\n        \t},\r\n        \tcoupon_start_date: {\r\n\t\t\t\trequired : true \r\n            },\r\n            coupon_end_date: {\r\n            \trequired : true \r\n            },\r\n            coupon_class : {\r\n\t\t\t\trequired : true\r\n            }\r\n        },\r\n        messages : {\r\n      \t\tcoupon_title: {\r\n       \t\t\trequired : '";
echo $lang['coupon_name_null'];
echo "'\r\n\t    \t},\r\n\t    \tcoupon_exchange: {\r\n\t\t\t\trequired : '";
echo $lang['coupon_price_error'];
echo "'\r\n\t\t    },\r\n\t\t    coupon_store: {\r\n\t\t\t\trequired : '";
echo $lang['coupon_store_null'];
echo "',\r\n\t\t\t\tremote : '";
echo $lang['coupon_store_name_null'];
echo "'\r\n\t\t\t},\r\n\t\t\tcoupon_banner : {\r\n\t\t\t\trequired : '";
echo $lang['coupon_pic_null'];
echo "' \r\n            },\r\n        \tcoupon_desc: {\r\n        \t\trequired : '";
echo $lang['coupon_notice_null'];
echo "'\r\n        \t},\r\n        \tcoupon_start_date: {\r\n        \t\trequired : '";
echo $lang['coupon_start_time_null'];
echo "'\r\n            },\r\n            coupon_end_date: {\r\n            \trequired : '";
echo $lang['coupon_end_time_null'];
echo "'\r\n            },\r\n            coupon_class : {\r\n\t\t\t\trequired : '";
echo $lang['coupon_class_null'];
echo "'\r\n            }\r\n        }\r\n\t});\r\n});\r\n</script> \r\n";
?>
