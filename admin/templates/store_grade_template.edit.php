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
echo $lang['store_grade'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=store_grade&op=store_grade\" ><span>";
echo $lang['manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=store_grade&op=store_grade_add\" ><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"post\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"sg_id\" value=\"";
echo $output['grade_array']['sg_id'];
echo "\" />\r\n    <ul style=\"margin: 5px; width: 100%;\">\r\n      ";
if ( !empty( $output['dir_list'] ) || is_array( $output['dir_list'] ) )
{
		echo "      ";
		foreach ( $output['dir_list'] as $k => $v )
		{
				echo "      <li style=\"float: left; text-align: center; margin: 5px;\"> <a target=\"_blank\" href=\"";
				echo SiteUrl;
				echo "/templates/";
				echo TPL_NAME;
				echo "/store/style/";
				echo $v;
				echo "/screenshot.jpg\"><img width=\"160\" height=\"120\" src=\"";
				echo SiteUrl;
				echo "/templates/";
				echo TPL_NAME;
				echo "/store/style/";
				echo $v;
				echo "/images/preview.jpg\" style=\"border: 1px solid #ccc;\"></a><br>\r\n        ";
				if ( $v == "default" )
				{
						echo "        <input type=\"checkbox\" value=\"default\" name=\"template[]\" disabled=\"disabled\" checked=\"checked\">\r\n    \t\t<input type=\"hidden\" value=\"default\" name=\"template[]\" />\r\n        ";
				}
				else
				{
						echo "        <input type=\"checkbox\" ";
						if ( @in_array( $v, $output['grade_array']['sg_template'] ) )
						{
								echo "checked=\"checked\"";
						}
						echo " value=\"";
						echo $v;
						echo "\" name=\"template[]\">\r\n        ";
				}
				echo "      </li>\r\n      ";
		}
		echo "      ";
}
echo "    </ul>\r\n    <div class=\"clear\"></div>\r\n    <table class=\"table tb-type2 nobdb\">\r\n      <tbody>\r\n        <tr>\r\n          <td><input class=\"btn btn-green big\" name=\"submit\" value=\"";
echo $lang['nc_submit'];
echo "\" type=\"submit\"></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n";
?>
