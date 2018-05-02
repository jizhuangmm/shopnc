<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

echo "<table class=\"table tb-type2 order mtw\">\r\n  <thead class=\"thead\">\r\n    <tr class=\"space\">\r\n      <th>";
echo $lang['complain_appeal_detail'];
echo "</th>\r\n    </tr>\r\n  </thead>\r\n  <tbody>\r\n    <tr>\r\n      <th>";
echo $lang['complain_appeal_message'];
echo "</th>\r\n    </tr>\r\n    <tr class=\"noborder\">\r\n      <td><ul>\r\n          <li><strong>";
echo $lang['complain_accused'];
echo ":</strong>";
echo $output['complain_info']['accused_name'];
echo "</li>\r\n          <li><strong>";
echo $lang['complain_appeal_evidence'];
echo ":</strong>\r\n            ";
if ( empty( $output['complain_info']['appeal_pic1'] ) && empty( $output['complain_info']['appeal_pic2'] ) && empty( $output['complain_info']['appeal_pic3'] ) )
{
		echo $lang['complain_pic_none'];
}
else
{
		$pic_link = "/index.php?act=show_pics&type=complain&pics=";
		if ( !empty( $output['complain_info']['appeal_pic1'] ) )
		{
				$pic_link .= $output['complain_info']['appeal_pic1']."|";
		}
		if ( !empty( $output['complain_info']['appeal_pic2'] ) )
		{
				$pic_link .= $output['complain_info']['appeal_pic2']."|";
		}
		if ( !empty( $output['complain_info']['appeal_pic3'] ) )
		{
				$pic_link .= $output['complain_info']['appeal_pic3']."|";
		}
		$pic_link = rtrim( $pic_link, "|" );
		echo "            <a href=\"";
		echo $pic_link;
		echo "\" target=\"_blank\">";
		echo $lang['complain_pic_view'];
		echo "</a>\r\n            ";
}
echo "          </li>\r\n          <li><strong>";
echo $lang['complain_appeal_datetime'];
echo ":</strong>";
echo date( "Y-m-d H:i:s", $output['complain_info']['appeal_datetime'] );
echo "</li>\r\n        </ul></td>\r\n    </tr>\r\n    <tr>\r\n      <th>";
echo $lang['complain_appeal_content'];
echo "</th>\r\n    </tr>\r\n    <tr class=\"noborder\">\r\n      <td>";
echo $output['complain_info']['appeal_message'];
echo "</td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n";
?>
