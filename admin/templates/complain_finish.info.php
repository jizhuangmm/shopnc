<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

echo "<table class=\"table tb-type2 order mtw\">\r\n  <thead class=\"thead\">\r\n    <tr class=\"space\">\r\n      <th>";
echo $lang['final_handle_detail'];
echo "</th>\r\n    </tr></thead>\r\n    <tbody>\r\n    <tr>\r\n      <th>";
echo $lang['final_handle_message'];
echo "</th>\r\n    </tr>\r\n    <tr class=\"noborder\">\r\n      <td>";
echo $output['complain_info']['final_handle_message'];
echo "</td>\r\n    </tr>\r\n    <tr>\r\n      <th>";
echo $lang['final_handle_datetime'];
echo "</th>\r\n    </tr>\r\n    <tr class=\"noborder\">\r\n      <td>";
echo date( "Y-m-d H:i:s", $output['complain_info']['final_handle_datetime'] );
echo "</td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n";
?>
