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
echo $lang['feedback_mange_title'];
echo "</h3>\r\n    </div>\r\n  </div>\r\n<div class=\"fixed-empty\"></div>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\"><div class=\"title\">&nbsp;</div></th>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form method='post' id=\"form_link\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2 nobdb\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th>&nbsp;</th>\r\n          <th>";
echo $lang['feedback_index_content'];
echo "</th>\r\n          <th>";
echo $lang['feedback_index_time'];
echo "</th>\r\n          <th>";
echo $lang['feedback_index_from'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
{
		echo "        ";
		foreach ( $output['list'] as $k => $v )
		{
				echo "        <tr class=\"hover edit\">\r\n          <td class=\"w24\"><input type=\"checkbox\" name=\"del_id[]\" value=\"";
				echo $v['id'];
				echo "\" class=\"checkitem\"></td>\r\n          <td width=\"705px\">";
				echo htmlspecialchars( $v['content'], ENT_QUOTES );
				echo "</td>\r\n          <td>";
				echo date( "Y-m-d H:i:s", $v['ftime'] );
				echo "</td>\r\n          <td>";
				echo $v['type'] == 1 ? "MOBILE" : "PC";
				echo "</td>\r\n          <td class=\"w96 align-center\"><a href=\"javascript:if(confirm('";
				echo $lang['nc_ensure_del'];
				echo "'))window.location = 'index.php?act=feedback&op=del&id=";
				echo $v['id'];
				echo "';\">";
				echo $lang['nc_del'];
				echo "</a></td>\r\n        </tr>\r\n        ";
		}
		echo "        ";
}
else
{
		echo "        <tr class=\"no_data\">\r\n          <td colspan=\"10\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      <tfoot>\r\n        ";
if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
{
		echo "        <tr class=\"tfoot\" id=\"dataFuncs\">\r\n          <td><input type=\"checkbox\" class=\"checkall\" id=\"checkallBottom\"></td>\r\n          <td colspan=\"16\" id=\"batchAction\"><label for=\"checkallBottom\">";
		echo $lang['nc_select_all'];
		echo "</label>\r\n            &nbsp;&nbsp; <a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"if(confirm('";
		echo $lang['nc_ensure_del'];
		echo "')){\$('#form_link').submit();}\"><span>";
		echo $lang['nc_del'];
		echo "</span></a>\r\n            <div class=\"pagination\"> ";
		echo $output['page'];
		echo " </div></td>\r\n        </tr>\r\n      </tfoot>\r\n      ";
}
echo "    </table>\r\n  </form>\r\n</div>";
?>
