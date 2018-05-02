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
echo "<script type=\"text/javascript\">\r\n\$(document).ready(function(){\r\n\t\r\n    \$(\".complain_dialog\").hide();\r\n    \$(\"#verify_button\").click(function(){\r\n         if(confirm(\"";
echo $lang['verify_submit_message'];
echo "\")) {\r\n             \$(\"#verify_form\").submit();\r\n         }\r\n    });\r\n    \$(\"#close_button\").click(function(){\r\n        \$(\"final_handle_message\").text('');\r\n        \$(\".complain_dialog\").show();\r\n        \$(\"#close_button\").hide();\r\n    });\r\n    \$(\"#btn_handle_submit\").click(function(){\r\n        if(\$(\"#final_handle_message\").val()=='') {\r\n            alert(\"";
echo $lang['final_handle_message_error'];
echo "\");\r\n        }\r\n        else {\r\n            if(confirm(\"";
echo $lang['complain_close_confirm'];
echo "\")) {\r\n                \$(\"#close_form\").submit();\r\n            }\r\n        }\r\n    });\r\n    \$(\"#btn_close_cancel\").click(function(){\r\n        \$(\".complain_dialog\").hide();\r\n        \$(\"#close_button\").show();\r\n    });\r\n\r\n});\r\n</script>\r\n\r\n<div class=\"page\">\r\n<div class=\"fixed-bar\">\r\n  <div class=\"item-title\">\r\n    <h3>";
echo $lang['complain_manage_title'];
echo "</h3>\r\n    <ul class=\"tab-base\">\r\n      ";
foreach ( $output['menu'] as $menu )
{
		if ( $menu['menu_type'] == "text" )
		{
				echo "      <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
				echo $menu['menu_name'];
				echo "</span></a></li>\r\n      ";
		}
		else
		{
				echo "      <li><a href=\"";
				echo $menu['menu_url'];
				echo "\" ><span>";
				echo $menu['menu_name'];
				echo "</span></a></li>\r\n      ";
		}
}
echo "    </ul>\r\n  </div>\r\n</div>\r\n<div class=\"fixed-empty\"></div>\r\n";
include( template( "complain_order.info", ProjectName ) );
include( template( "complain_complain.info", ProjectName ) );
if ( !empty( $output['complain_info']['appeal_message'] ) )
{
		include( template( "complain_appeal.info", ProjectName ) );
}
if ( 20 < intval( $output['complain_info']['complain_state'] ) )
{
		include( template( "complain_talk.info", ProjectName ) );
}
if ( !empty( $output['complain_info']['final_handle_message'] ) )
{
		include( template( "complain_finish.info", ProjectName ) );
}
if ( intval( $output['complain_info']['complain_state'] ) !== 99 )
{
		echo "<table class=\"table tb-type2 order mtw\">\r\n  <thead class=\"thead\">\r\n    <tr class=\"space\">\r\n      <th>";
		echo $lang['complain_handle'];
		echo "</th>\r\n    </tr>\r\n  </thead>\r\n  <tbody>\r\n  <tr>\r\n      <td>\r\n          <form method='post' id=\"verify_form\" action=\"index.php?act=complain&op=complain_verify\">\r\n              <input name=\"complain_id\" type=\"hidden\" value=\"";
		echo $output['complain_info']['complain_id'];
		echo "\" />\r\n              ";
		if ( intval( $output['complain_info']['complain_state'] ) === 10 )
		{
				echo "              <a id=\"verify_button\" class=\"btn\" href=\"javascript:void(0)\"><span>";
				echo $lang['complain_text_verify'];
				echo "</span></a>\r\n              ";
		}
		echo "              ";
		if ( intval( $output['complain_info']['complain_state'] ) !== 99 )
		{
				echo "              <a id=\"close_button\" class=\"btn\" href=\"javascript:void(0)\"><span>";
				echo $lang['complain_text_close'];
				echo "</span></a>\r\n              ";
		}
		echo "          </form>\r\n      </td>\r\n  </tr>\r\n    <tr class=\"complain_dialog\">\r\n      <th>";
		echo $lang['final_handle_message'];
		echo ":</th>\r\n    </tr>\r\n  <form method='post' id=\"close_form\" action=\"index.php?act=complain&op=complain_close\">\r\n    <input name=\"complain_id\" type=\"hidden\" value=\"";
		echo $output['complain_info']['complain_id'];
		echo "\" />\r\n    <tr class=\"noborder complain_dialog\">\r\n      <td><textarea id=\"final_handle_message\" name=\"final_handle_message\" class=\"tarea\"></textarea></td>\r\n    </tr>\r\n    <tr class=\"complain_dialog\">\r\n        <td>\r\n            <a id=\"btn_handle_submit\" class=\"btn\" href=\"javascript:void(0)\"><span>";
		echo $lang['nc_submit'];
		echo "</span></a>\r\n            <a id=\"btn_close_cancel\" class=\"btn\" href=\"javascript:void(0)\"><span>";
		echo $lang['nc_cancel'];
		echo "</span></a>\r\n        </td>\r\n    </tr>\r\n  </form>\r\n    </tbody>\r\n</table>\r\n";
}
?>
