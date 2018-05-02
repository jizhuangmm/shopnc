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
echo "\r\n<dl>\r\n  <dt select_class_id=\"";
echo $output['gc_parent']['gc_id'];
echo "\" title=\"";
echo $output['gc_parent']['gc_name'];
echo "\" ondblclick=\"del_gc_parent(";
echo $output['gc_parent']['gc_id'];
echo ");\"><i onclick=\"del_gc_parent(";
echo $output['gc_parent']['gc_id'];
echo ");\"></i>";
echo $output['gc_parent']['gc_name'];
echo "</dt>\r\n  <div class=\"clear\"></div>\r\n  <input name=\"category_list[";
echo $output['gc_parent']['gc_id'];
echo "][gc_parent][gc_id]\" value=\"";
echo $output['gc_parent']['gc_id'];
echo "\" type=\"hidden\">\r\n  <input name=\"category_list[";
echo $output['gc_parent']['gc_id'];
echo "][gc_parent][gc_name]\" value=\"";
echo $output['gc_parent']['gc_name'];
echo "\" type=\"hidden\">\r\n  ";
if ( !empty( $output['goods_class'] ) || is_array( $output['goods_class'] ) )
{
		echo "  ";
		foreach ( $output['goods_class'] as $k => $v )
		{
				echo "  <dd gc_id=\"";
				echo $v['gc_id'];
				echo "\" title=\"";
				echo $v['gc_name'];
				echo "\" ondblclick=\"del_goods_class(";
				echo $v['gc_id'];
				echo ");\"> \r\n  \t<i onclick=\"del_goods_class(";
				echo $v['gc_id'];
				echo ");\"></i>";
				echo $v['gc_name'];
				echo "    <input name=\"category_list[";
				echo $output['gc_parent']['gc_id'];
				echo "][goods_class][";
				echo $v['gc_id'];
				echo "][gc_id]\" value=\"";
				echo $v['gc_id'];
				echo "\" type=\"hidden\">\r\n    <input name=\"category_list[";
				echo $output['gc_parent']['gc_id'];
				echo "][goods_class][";
				echo $v['gc_id'];
				echo "][gc_name]\" value=\"";
				echo $v['gc_name'];
				echo "\" type=\"hidden\">\r\n  </dd>\r\n  ";
		}
		echo "  ";
}
echo "</dl>\r\n";
?>
