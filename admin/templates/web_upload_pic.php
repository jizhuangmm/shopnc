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
echo "<script type=\"text/javascript\">\n\t";
if ( $output['type'] == "adv" && 0 < $output['ap_id'] )
{
		echo "\t\tparent.update_adv_pic(\"";
		echo $output['var_name'];
		echo "\",\"";
		echo $output['ap_id'];
		echo "\");\n\t";
}
else
{
		echo "\t\tparent.update_pic(\"";
		echo $output['var_name'];
		echo "\",\"";
		echo $output['pic'];
		echo "\");\n\t";
}
echo "</script>";
?>
