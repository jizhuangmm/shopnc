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
echo $lang['mailtemplates_index_notice'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=mailtemplates&op=mailtemplates\" ><span>";
echo $lang['mailtemplates_index_mail'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['mailtemplates_index_message'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form name='form1' method='post'>\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"submit_type\" id=\"submit_type\" value=\"\" />\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n      <tr class=\"space\">\r\n          <th colspan=\"15\" class=\"nobg\">";
echo $lang['nc_list'];
echo "</th>\r\n        </tr>\r\n        <tr class=\"thead\">\r\n          <th>&nbsp; </th>\r\n          <th>";
echo $lang['mailtemplates_index_desc'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['mailtemplates_index_ON'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( is_array( $output['templates_list'] ) && !empty( $output['templates_list'] ) )
{
		echo "        ";
		foreach ( $output['templates_list'] as $k => $v )
		{
				echo "        <tr class=\"hover\">\r\n          <td class=\"w24\"><input type=\"checkbox\" name=\"del_id[]\" value=\"";
				echo $v['code'];
				echo "\" class=\"checkitem\"></td>\r\n          <td class=\"w50pre\">";
				echo $v['name'];
				echo "</td>\r\n          <td class=\"align-center power-onoff\">";
				if ( $v['mail_switch'] == "0" )
				{
						echo "            <a href=\"JavaScript:void(0);\" class=\"tooltip disabled\" ajax_branch='mail_switch' nc_type=\"inline_edit\" fieldname=\"mail_switch\" fieldid=\"";
						echo $v['code'];
						echo "\" fieldvalue=\"0\" title=\"";
						echo $lang['nc_editable'];
						echo "\"><img src=\"";
						echo TEMPLATES_PATH;
						echo "/images/transparent.gif\"></a>\r\n            ";
				}
				else
				{
						echo "            <a href=\"JavaScript:void(0);\" class=\"tooltip enabled\" ajax_branch='mail_switch' nc_type=\"inline_edit\" fieldname=\"mail_switch\" fieldid=\"";
						echo $v['code'];
						echo "\" fieldvalue=\"1\" title=\"";
						echo $lang['nc_editable'];
						echo "\"><img src=\"";
						echo TEMPLATES_PATH;
						echo "/images/transparent.gif\"></a>\r\n            ";
				}
				echo "</td>\r\n          <td class=\"w60 align-center\"><a href=\"index.php?act=mailtemplates&op=msgtemplates_edit&code=";
				echo $v['code'];
				echo "\">";
				echo $lang['nc_edit'];
				echo "</a></td>\r\n        </tr>\r\n        ";
		}
		echo "        ";
}
echo "      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td><input type=\"checkbox\" class=\"checkall\" id=\"checkallBottom\"></td>\r\n          <td colspan=\"16\"><label for=\"checkallBottom\">";
echo $lang['nc_select_all'];
echo "</label>\r\n            &nbsp;&nbsp;<a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"\$('#submit_type').val('mail_switchON');go();\"><span>";
echo $lang['mailtemplates_index_ON'];
echo "</span></a><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"\$('#submit_type').val('mail_switchOFF');go();\"><span>";
echo $lang['mailtemplates_index_OFF'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.edit.js\" charset=\"utf-8\"></script> \r\n<script type=\"text/javascript\">\r\n<!--\r\nfunction go(){\r\n\tvar url=\"index.php?act=mailtemplates&op=ajax\";\r\n\tdocument.form1.action = url;\r\n\tdocument.form1.submit();\r\n}\r\n//-->\r\n</script> \r\n";
?>
