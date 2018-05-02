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
echo $lang['nc_ztc_manage'];
echo "<!-- 直通车管理 --></h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['admin_ztc_list_title'];
echo "<!-- 申请列表 --></span></a></li>\r\n        <li><a href=\"index.php?act=ztc_class&op=ztc_glist\" ><span>";
echo $lang['admin_ztc_goodslist_title'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=ztc_class&op=ztc_glog\" ><span>";
echo $lang['admin_ztc_loglist_title'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <!-- <form id=\"ztc_form\" method=\"post\" action=\"index.php?act=ztc_class&op=edit_ztc&z_id=";
echo $output['ztc_info']['ztc_id'];
echo "\"> -->\r\n  <form id=\"ztc_form\" method=\"post\" name=\"ztc_form\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label for=\"admin_ztc_applyrecord\">";
echo $lang['admin_ztc_applytype'];
echo "<!-- 申请类型 -->:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" class=\"readonly txt\" id=\"admin_ztc_applyrecord\" value=\"";
echo $output['ztc_info']['ztc_type'] == 1 ? $lang['admin_ztc_rechargerecord'] : $lang['admin_ztc_applyrecord'];
echo "\" readonly /></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"ztc_membername\">";
echo $lang['admin_ztc_membername'];
echo "<!-- 会员名称 -->:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" class=\"readonly txt\" id=\"ztc_membername\" value=\"";
echo $output['ztc_info']['ztc_membername'];
echo "\" readonly /></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"ztc_storename\">";
echo $lang['admin_ztc_storename'];
echo "<!-- 店铺名称 -->:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" class=\"readonly txt\" id=\"ztc_storename\" value=\"";
echo $output['ztc_info']['ztc_storename'];
echo "\" readonly /></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"ztc_goodsname\">";
echo $lang['admin_ztc_goodsname'];
echo "<!-- 商品名称 -->:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea rows=\"6\" readonly=\"readonly\" class=\"readonly tarea\" id=\"ztc_goodsname\">";
echo $output['ztc_info']['ztc_goodsname'];
echo "</textarea></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"admin_ztc_goldunit\">";
echo $lang['admin_ztc_edit_costgold'];
echo "<!-- 消耗金币 -->:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" class=\"readonly txt\" id=\"admin_ztc_goldunit\" value=\"";
echo $output['ztc_info']['ztc_gold'];
echo " ";
echo $lang['admin_ztc_goldunit'];
echo "\" readonly />\r\n            \r\n            <!-- 枚 --></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"ztc_remark\">";
echo $lang['admin_ztc_edit_remark'];
echo "<!-- 备注信息 -->:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" class=\"readonly txt\" id=\"ztc_remark\" value=\"";
echo $output['ztc_info']['ztc_remark'];
echo "\" readonly /></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_ztc_addtime'];
echo " <!-- 添加时间 -->:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" class=\"readonly txt\" id=\"ztc_membername\" value=\"";
echo date( "Y-m-d", $output['ztc_info']['ztc_addtime'] );
echo "\" readonly /></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"ztc_paystate\">";
echo $lang['admin_ztc_paystate'];
echo "<!-- 支付状态 -->:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" class=\"readonly txt\" id=\"ztc_paystate\" value=\"";
echo $output['ztc_info']['ztc_paystate'] == 1 ? $lang['admin_ztc_paysuccess'] : $lang['admin_ztc_waitpaying'];
echo "\" readonly /></td><td class=\"vatop tips\"></td>\r\n        </tr>\r\n        ";
if ( $output['ztc_info']['ztc_type'] == 0 )
{
		echo "        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
		echo $lang['admin_ztc_starttime'];
		echo "<!-- 开始时间 -->:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input name=\"ztc_stime\" id=\"ztc_stime\" type=\"text\" class=\"txt date\" value=\"";
		echo date( "Y-m-d", $output['ztc_info']['ztc_startdate'] );
		echo "\"/>\r\n            <input name=\"ztc_nowdate\" id=\"ztc_nowdate\" type=\"hidden\" value=\"";
		echo $output['nowdate'];
		echo "\"/></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
		echo $lang['admin_ztc_auditstate'];
		echo "<!-- 审核状态 -->:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><ul class=\"nofloat\">\r\n              <li>\r\n                <input type=\"radio\" name=\"ztc_state\" value='0' ";
		if ( $output['ztc_info']['ztc_state'] == 0 )
		{
				echo "checked";
		}
		echo "/>\r\n                ";
		echo $lang['admin_ztc_auditing'];
		echo "<!-- 未审核 --></li>\r\n              <li>\r\n                <input type=\"radio\" name=\"ztc_state\" value='1' ";
		if ( $output['ztc_info']['ztc_state'] == 1 )
		{
				echo "checked";
		}
		echo "/>\r\n                ";
		echo $lang['admin_ztc_auditpass'];
		echo "<!-- 审核通过 --></li>\r\n              <li>\r\n                <input type=\"radio\" name=\"ztc_state\" value='2' ";
		if ( $output['ztc_info']['ztc_state'] == 2 )
		{
				echo "checked";
		}
		echo "/>\r\n                ";
		echo $lang['admin_ztc_auditnopass'];
		echo "<!-- 审核失败 --></li>\r\n            </ul></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      <tbody>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\"><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.ztc_form.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n          </tfoot>\r\n        \r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/jquery.ui.js\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/i18n/zh-CN.js\" charset=\"utf-8\"></script>\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/themes/ui-lightness/jquery.ui.css\"  />\r\n<script>\r\n\$(function(){\r\n\t\$('#ztc_stime').datepicker({dateFormat: 'yy-mm-dd'});\r\n\t\r\n\tjQuery.validator.addMethod(\"greater\", function(value, element, param) {\r\n\t\tvar comparetext = \$.trim(\$(param).val());\r\n\t\t//申请类型\r\n\t\tvar t = '";
echo $output['ztc_info']['ztc_type'];
echo "';\r\n\t\tif(t == '0'){\r\n\t\t\tif(value == ''){return false;}else{\r\n\t\t\t\tif(value && comparetext){return comparetext <= value;}else{return true;}\r\n\t\t\t}\r\n\t\t}else{ return true;}\r\n\t}, \"";
echo $lang['admin_ztc_edit_starttime_error'];
echo "\");\r\n\t\r\n\t/*\$('#ztc_form').validate({\r\n        errorPlacement: function(error, element){\r\n            \$(element).next('.field_notice').hide();\r\n            \$(element).after(error);\r\n        },\r\n        onkeyup : false,\r\n        rules : {\r\n            ztc_stime : {\r\n            \tgreater   : \"#ztc_nowdate\"\r\n            }\r\n        },\r\n        messages : {\r\n        \tztc_stime       : {\r\n        \t\tgreater    : '";
echo $lang['admin_ztc_edit_starttime_error'];
echo "'\r\n        \t}\r\n        }\r\n    });*/\r\n});\r\n\r\n\r\n</script> \r\n";
?>
