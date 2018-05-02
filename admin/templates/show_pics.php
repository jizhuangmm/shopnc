<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

echo "\r\n";
foreach ( $output['pics'] as $pic )
{
		echo "    <p><img src=\"";
		echo $output['pic_path'].$pic;
		echo "\" alt=\"\" /><p>\r\n";
}
?>
