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
echo "<style type=\"text/css\">\r\nh3 { margin-top:0;\r\n}\r\n</style>\r\n\r\n\r\n<dl>\r\n  <dt style=\"padding:10px 30px;\">\r\n    <input type=\"text\" style=\" width:400px;\" value='<script type=\"text/javascript\" src=\"";
echo "<?php echo SiteUrl;?>/index.php?act=adv&op=advshow&ap_id=".$_GET['id'];
echo "\"></script>' />\r\n  </dt>\r\n  <dd style=\"border-top: dotted 1px #E7E7E7; padding:10px 30px; color: #F60;\">";
echo $lang['adv_index_copy_to_clip'];
echo "</dd>\r\n</dl>\r\n";
?>
