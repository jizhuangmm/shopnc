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
echo $lang['complain_manage_title'];
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
				echo "\"><span>";
				echo $menu['menu_name'];
				echo "</span></a></li>\r\n        ";
		}
}
echo "      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"search_form\" method=\"get\" name=\"formSearch\">\r\n    <input type=\"hidden\" id=\"act\" name=\"act\" value=\"complain\" />\r\n    <input type=\"hidden\" id=\"op\" name=\"op\" value=\"";
echo $output['op'];
echo "\" />\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label for=\"input_complain_accuser\">";
echo $lang['complain_accuser'];
echo "</label></th>\r\n          <td><input class=\"txt\" type=\"text\" name=\"input_complain_accuser\" id=\"input_complain_accuser\" value=\"";
echo $_GET['input_complain_accuser'];
echo "\"></td>\r\n          <th><label for=\"input_complain_subject_content\">";
echo $lang['complain_subject_content'];
echo "</label></th>\r\n          <td colspan=\"2\"><input class=\"txt2\" type=\"text\" name=\"input_complain_subject_content\" id=\"input_complain_subject_content\" value=\"";
echo $_GET['input_complain_subject_content'];
echo "\"></td>\r\n        </tr>\r\n        <tr>\r\n          <th><label for=\"input_complain_accused\">";
echo $lang['complain_accused'];
echo "</label></th>\r\n          <td><input class=\"txt\" type=\"text\" name=\"input_complain_accused\" id=\"input_complain_accused\" value=\"";
echo $_GET['input_complain_accused'];
echo "\"></td>\r\n          <th><label for=\"time_from\">";
echo $lang['complain_datetime'];
echo "</label></th>\r\n          <td><input id=\"time_from\" class=\"txt date\" type=\"text\" name=\"input_complain_datetime_start\" value=\"";
echo $_GET['input_complain_datetime_start'];
echo "\">\r\n            <label for=\"time_to\">~</label>\r\n            <input id=\"time_to\" class=\"txt date\" type=\"text\" name=\"input_complain_datetime_end\" value=\"";
echo $_GET['input_complain_datetime_end'];
echo "\"></td>\r\n          <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a>\r\n            ";
if ( !empty( $_GET['input_complain_accuser'] ) && !empty( $_GET['input_complain_accused'] ) && !empty( $_GET['input_complain_subject_content'] ) && !empty( $_GET['input_complain_datetime_start'] ) && !empty( $_GET['input_complain_datetime_end'] ) )
{
		echo "            <a class=\"btns tooltip\" href=\"index.php?act=complain&op=";
		echo $output['op'];
		echo "\" title=\"";
		echo $lang['nc_cancel_search'];
		echo "\"><span>";
		echo $lang['nc_cancel_search'];
		echo "</span></a>\r\n            ";
}
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\"><div class=\"title\"><h5>";
echo $lang['nc_prompts'];
echo "</h5><span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n        <ul>\r\n            <li>";
echo $lang['complain_help1'];
echo "</li>\r\n            <li>";
echo $lang['complain_help2'];
echo "</li>\r\n\t\t\t<li>";
echo $lang['complain_help3'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form method='post' id=\"list_form\" action=\"index.php?act=voucher_price&op=voucher_price_drop\">\r\n    <table class=\"table tb-type2 nobdb\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th class=\"w12\">&nbsp;</th>\r\n          <th>";
echo $lang['complain_accuser'];
echo "</th>\r\n          <th>";
echo $lang['complain_accused'];
echo "</th>\r\n          <th>";
echo $lang['complain_subject_content'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['complain_datetime'];
echo "</th>\r\n          <th class=\"w72 align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
{
		echo "        ";
		foreach ( $output['list'] as $v )
		{
				echo "        <tr class=\"hover\">\r\n          <td>&nbsp;</td>\r\n          <td>";
				echo $v['accuser_name'];
				echo "</td>\r\n          <td>";
				echo $v['accused_name'];
				echo "</td>\r\n          <td>";
				echo $v['complain_subject_content'];
				echo "</td>\r\n          <td class=\"nowarp align-center\">";
				echo date( "Y-m-d H:i:s", $v['complain_datetime'] );
				echo "</td>\r\n          <td class=\"align-center\"><a href=\"index.php?act=complain&op=complain_progress&complain_id=";
				echo $v['complain_id'];
				echo "\">";
				echo $lang['complain_text_detail'];
				echo "</a></td>\r\n        </tr>\r\n        ";
		}
		echo "        ";
}
else
{
		echo "        <tr class=\"no_data\">\r\n          <td colspan=\"15\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      ";
if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
{
		echo "      <tfoot>\r\n        <tr>\r\n          <td colspan=\"15\"><div class=\"pagination\"> ";
		echo $output['show_page'];
		echo " </div></td>\r\n        </tr>\r\n      </tfoot>\r\n      ";
}
echo "    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/jquery.ui.js\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/i18n/zh-CN.js\" charset=\"utf-8\"></script>\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/themes/ui-lightness/jquery.ui.css\"  />\r\n<script type=\"text/javascript\">\r\n\$(document).ready(function(){\r\n\t//表格移动变色\r\n\t\$(\"tbody .line\").hover(\r\n    function()\r\n    {\r\n        \$(this).addClass(\"complain_highlight\");\r\n    },\r\n    function()\r\n    {\r\n        \$(this).removeClass(\"complain_highlight\");\r\n    });\r\n    \$('#time_from').datepicker({dateFormat: 'yy-mm-dd',onSelect:function(dateText,inst){\r\n        var year2 = dateText.split('-') ;\r\n        \$('#time_to').datepicker( \"option\", \"minDate\", new Date(parseInt(year2[0]),parseInt(year2[1])-1,parseInt(year2[2])) );\r\n    }});\r\n    \$('#time_to').datepicker({onSelect:function(dateText,inst){\r\n        var year1 = dateText.split('-') ;\r\n        \$('#time_from').datepicker( \"option\", \"maxDate\", new Date(parseInt(year1[0]),parseInt(year1[1])-1,parseInt(year1[2])) );\r\n    }});\r\n\r\n});\r\n</script> \r\n";
?>
