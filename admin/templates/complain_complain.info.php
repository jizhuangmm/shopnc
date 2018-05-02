<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

echo "<table class=\"table tb-type2 order mtw\">\r\n  <thead class=\"thead\">\r\n    <tr class=\"space\">\r\n      <th>";
echo $lang['complain_message'];
echo "</th>\r\n    </tr>\r\n  </thead>\r\n  <tbody>\r\n    <tr>\r\n      <th>";
echo $lang['final_handle_message'];
echo "</th>\r\n    </tr>\r\n    <tr class=\"noborder hover\">\r\n      <td><ul>\r\n          <li><strong>";
echo $lang['complain_state'];
echo ":</strong><b>";
echo $output['complain_info']['complain_state_text'];
echo "</b></li>\r\n          <li><strong>";
echo $lang['complain_type'];
echo ":</strong>";
echo $output['complain_info']['complain_type_text'];
echo "</li>\r\n          <li><strong>";
echo $lang['complain_subject_content'];
echo ":</strong>";
echo $output['complain_info']['complain_subject_content'];
echo "</li>\r\n          <li><strong>";
echo $lang['complain_accuser'];
echo ":</strong>";
echo $output['complain_info']['accuser_name'];
echo "</li>\r\n          <li><strong>";
echo $lang['complain_evidence'];
echo ":</strong>\r\n            ";
if ( empty( $output['complain_info']['complain_pic1'] ) && empty( $output['complain_info']['complain_pic2'] ) && empty( $output['complain_info']['complain_pic3'] ) )
{
		echo $lang['complain_pic_none'];
}
else
{
		$pic_link = "/index.php?act=show_pics&type=complain&pics=";
		if ( !empty( $output['complain_info']['complain_pic1'] ) )
		{
				$pic_link .= $output['complain_info']['complain_pic1']."|";
		}
		if ( !empty( $output['complain_info']['complain_pic2'] ) )
		{
				$pic_link .= $output['complain_info']['complain_pic2']."|";
		}
		if ( !empty( $output['complain_info']['complain_pic3'] ) )
		{
				$pic_link .= $output['complain_info']['complain_pic3']."|";
		}
		$pic_link = rtrim( $pic_link, "|" );
		echo "            <a href=\"";
		echo $pic_link;
		echo "\" target=\"_blank\">";
		echo $lang['complain_pic_view'];
		echo "</a>\r\n            ";
}
echo "          </li>\r\n          <li><strong>";
echo $lang['complain_datetime'];
echo ":</strong>";
echo date( "Y-m-d H:i:s", $output['complain_info']['complain_datetime'] );
echo "</li>\r\n        </ul></td>\r\n    </tr>\r\n    <tr>\r\n      <th>";
echo $lang['complain_goods'];
echo "</th>\r\n    </tr>\r\n    <tr class=\"noborder\">\r\n      <td><table class=\"table tb-type2 goods \">\r\n          <tr>\r\n            <th colspan=\"2\">";
echo $lang['complain_goods_name'];
echo "</th>\r\n            <th>";
echo $lang['complain_text_num'];
echo "</th>\r\n            <th>";
echo $lang['complain_text_price'];
echo "</th>\r\n          </tr>\r\n          ";
foreach ( ( array )$output['complain_goods_list'] as $complain_goods )
{
		echo "          <tr>\r\n            <td width=\"65\" align=\"center\" valign=\"middle\"><a style=\"text-decoration:none;\" href=\"";
		echo SiteUrl."/index.php?act=goods&goods_id=".$complain_goods['goods_id']."&id=".$output['order_info']['store_id'];
		echo "\" target=\"_blank\">\r\n              <img width=\"50\" src=\"";
		echo cthumb( $complain_goods['goods_image'], "tiny", $output['order_info']['store_id'] );
		echo "\" />\r\n              </a></td>\r\n            <td class=\"intro\"><p><a href=\"";
		echo SiteUrl."/index.php?act=goods&goods_id=".$complain_goods['goods_id']."&id=".$output['order_info']['store_id'];
		echo "\" target=\"_blank\"> ";
		echo $complain_goods['goods_name'];
		echo " </a></p>\r\n              <p><span>";
		echo $complain_goods['spec_info'];
		echo "</span> </p></td>\r\n            <td width=\"10%\">";
		echo $complain_goods['goods_num'];
		echo "</td>\r\n            <td width=\"10%\">";
		echo $lang['currency'].$complain_goods['goods_price'];
		echo "</td>\r\n          </tr>\r\n          <tr class=\"problem_desc\">\r\n            <td colspan=\"4\"><div class=\"complain-tit\"><span>";
		echo $lang['complain_text_problem'];
		echo ":</span>";
		echo $complain_goods['complain_message'];
		echo "</div></td>\r\n          </tr>\r\n          ";
}
echo "        </table></td>\r\n    </tr>\r\n    <tr>\r\n      <th>";
echo $lang['complain_content'];
echo "</th>\r\n    </tr>\r\n    <tr class=\"noborder\">\r\n      <td><div class=\"complain-intro\" style=\" color: #06C; border-color: #A7CAED; \">";
echo $output['complain_info']['complain_content'];
echo "</div></td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n";
?>
