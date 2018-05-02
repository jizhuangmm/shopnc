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
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=store_grade&op=store_grade_add\" ><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"post\" name=\"formSearch\">\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label for=\"like_sg_name\">";
echo $lang['store_grade_name'];
echo "</label></th>\r\n          <td><input type=\"text\" value=\"";
echo $output['like_sg_name'];
echo "\" name=\"like_sg_name\" id=\"like_sg_name\" class=\"txt\"></td>\r\n          <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a>\r\n            ";
if ( $output['like_sg_name'] != "" )
{
		echo "            <a class=\"btns tooltip\" href=\"index.php?act=store_grade&op=store_grade\" title=\"";
		echo $lang['cancel_search'];
		echo "\"><span>";
		echo $lang['cancel_search'];
		echo "</span></a>\r\n            ";
}
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li>";
echo $lang['store_grade_help1'];
echo "</li>\r\n            <li>";
echo $lang['store_grade_help2'];
echo "</li>\r\n            <li>";
echo $lang['store_grade_help3'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form id=\"form_grade\" method='post' name=\"\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th class=\"w24\">&nbsp;</th>\r\n          <th>";
echo $lang['grade_sortname'];
echo "</th>\r\n          <th>";
echo $lang['store_grade_name'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['allow_pubilsh_product_num'];
echo "</th>\r\n          <!--<th>";
echo $lang['upload_space_size'];
echo "(MB)</th>-->\r\n          <th class=\"align-center\">";
echo $lang['optional_template_num'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['charges_standard'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['need_audit'];
echo "</th>\r\n          <th>";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['grade_list'] ) || is_array( $output['grade_list'] ) )
{
		echo "        ";
		foreach ( $output['grade_list'] as $k => $v )
		{
				echo "        <tr class=\"hover\">\r\n          <td>";
				if ( 1 < $v['sg_id'] )
				{
						echo "            <input type=\"checkbox\" name='check_sg_id[]' value=\"";
						echo $v['sg_id'];
						echo "\" class=\"checkitem\">\r\n            ";
				}
				echo "</td>\r\n          <td class=\"w36\">";
				echo $v['sg_sort'];
				echo "</td>\r\n          <td>";
				echo $v['sg_name'];
				echo "</td>\r\n          <td class=\"align-center\">";
				echo $v['sg_goods_limit'];
				echo "</td>\r\n          <!--<td class=\"table-center\">";
				echo $v['sg_space_limit'];
				echo "</td>-->\r\n          <td class=\"align-center\">";
				echo $v['sg_template_number'];
				echo "</td>\r\n          <td class=\"align-center\">";
				echo $v['sg_price'];
				echo "</td>\r\n          <td class=\"align-center\">";
				if ( $v['sg_confirm'] == "0" )
				{
						echo "            ";
						echo $lang['nc_no'];
						echo "            ";
				}
				else
				{
						echo "            ";
						echo $lang['nc_yes'];
						echo "            ";
				}
				echo "</td>\r\n          <td class=\"w270\"><a href=\"index.php?act=store_grade&op=store_grade_edit&sg_id=";
				echo $v['sg_id'];
				echo "\">";
				echo $lang['nc_edit'];
				echo "</a> |\r\n            ";
				if ( $v['sg_id'] == "1" )
				{
						echo "            ";
						echo $lang['default_store_grade_no_del'];
						echo " |\r\n            ";
				}
				else
				{
						echo "            <a href=\"javascript:if(confirm('";
						echo $lang['problem_del'];
						echo "'))window.location = 'index.php?act=store_grade&op=store_grade_del&sg_id=";
						echo $v['sg_id'];
						echo "';\">";
						echo $lang['nc_del'];
						echo "</a> |\r\n            ";
				}
				echo "            <a href=\"index.php?act=store_grade&op=store_grade_templates&sg_id=";
				echo $v['sg_id'];
				echo "\">";
				echo $lang['set_template'];
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
echo "      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td><input type=\"checkbox\" class=\"checkall\" id=\"checkallBottom\"></td>\r\n          <td colspan=\"15\"><label for=\"checkallBottom\">";
echo $lang['nc_select_all'];
echo "</label>\r\n            &nbsp;&nbsp;<a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"if(confirm('";
echo $lang['problem_del'];
echo "')){\$('#form_grade').submit();}\"><span>";
echo $lang['nc_del'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n";
?>
