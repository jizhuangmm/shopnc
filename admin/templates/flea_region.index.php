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
echo "<div class=\"page\">\r\n  <div class=\"fixed-bar\">\r\n    <div class=\"item-title\">\r\n      <h3>";
echo $lang['region_index_config'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"javascript:void(0)\" onclick=\"if(confirm('";
echo $lang['region_index_import_tip'];
echo "?')){location.href='index.php?act=flea_region&op=flea_import_default_area';}\"><span>";
echo $lang['region_index_import_region'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n   <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th class=\"nobg\" colspan=\"12\"><div class=\"title\"><h5>";
echo $lang['nc_prompts'];
echo "</h5><span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n        <ul>\r\n            <li>";
echo $lang['region_index_help2'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table> \r\n  <table class=\"tb-type1 noborder search\">\r\n    <tbody>\r\n      <tr>\r\n        <th><label>";
echo $lang['region_index_choose_region'];
echo "</label></th>\r\n        <td><select name=\"province\" id=\"province\" onchange=\"refreshdistrict(\$(this).val(),'province')\">\r\n\t\t\t<option value=\"\" ";
if ( $output['province'] == "" )
{
		echo "selected='selected'";
}
echo ">-";
echo $lang['region_index_province'];
echo "-</option>\r\n\t\t\t";
if ( !empty( $output['province_list'] ) || is_array( $output['province_list'] ) )
{
		echo "\t\t\t";
		foreach ( $output['province_list'] as $k => $v )
		{
				echo "\t\t\t<option value=\"";
				echo $v['flea_area_id'];
				echo "\" ";
				if ( $output['province'] == $v['flea_area_id'] )
				{
						echo "selected='selected'";
				}
				echo ">";
				echo $v['flea_area_name'];
				echo "</option>\r\n\t\t\t";
		}
		echo "\t\t\t";
}
echo "\t\t  </select>\r\n\t\t  <select name=\"city\" id=\"city\" onchange=\"refreshdistrict(\$(this).val(),'city')\">\r\n\t\t\t<option value=\"\" ";
if ( $output['city'] == "" )
{
		echo "selected='selected'";
}
echo ">-";
echo $lang['region_index_city'];
echo "-</option>\r\n\t\t\t";
if ( !empty( $output['city_list'] ) || is_array( $output['city_list'] ) )
{
		echo "\t\t\t";
		foreach ( $output['city_list'] as $k => $v )
		{
				echo "\t\t\t<option value=\"";
				echo $v['flea_area_id'];
				echo "\" ";
				if ( $output['city'] == $v['flea_area_id'] )
				{
						echo "selected='selected'";
				}
				echo ">";
				echo $v['flea_area_name'];
				echo "</option>\r\n\t\t\t";
		}
		echo "\t\t\t";
}
echo "\t\t  </select></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form method=\"post\" id='form_area_list';>\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type='hidden' name='flea_area_parent_id' value=\"";
echo $output['flea_area_parent_id'];
echo "\" />\r\n    <input type='hidden' name='child_area_deep' value=\"";
echo $output['child_area_deep'];
echo "\" />\r\n    <input type='hidden' name='hidden_del_id' id='hidden_del_id' value='' />\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th class=\"align-center\">";
echo $lang['nc_sort'];
echo "</th>\r\n          <th>";
echo $lang['region_index_name'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody id=\"treet1\">\r\n\t\t";
if ( !empty( $output['area_list'] ) || is_array( $output['area_list'] ) )
{
		echo "        ";
		foreach ( $output['area_list'] as $k => $v )
		{
				echo "        <tr id='area_tr_";
				echo $v['flea_area_id'];
				echo "' class=\"hover edit\">\r\n        <td class=\"w48 sort align-center\"><span id='area_sort_";
				echo $v['flea_area_id'];
				echo "'><input name=\"area_sort[";
				echo $v['flea_area_id'];
				echo "]\" value=\"";
				echo $v['flea_area_sort'];
				echo "\" type='text'/></span></td><td class=\"node\"><span class=\"node_name\" id='area_name_";
				echo $v['flea_area_id'];
				echo "'><input name=\"area_name[";
				echo $v['flea_area_id'];
				echo "]\" value=\"";
				echo $v['flea_area_name'];
				echo "\" type='text'/></span></td>\r\n        <td class=\"w72 align-center\"><a href=\"javascript:void(0)\" onclick='del(\"";
				echo $v['flea_area_id'];
				echo "\");'>";
				echo $lang['nc_del'];
				echo "</a></td>\r\n        </tr>\r\n        ";
		}
		echo "        ";
}
echo "      </tbody>\r\n      <tbody>\r\n        <tr>\r\n          <td colspan=\"15\"><a href=\"JavaScript:void(0);\" class=\"btn-add marginleft\" onclick='add_tr();'><span>";
echo $lang['region_index_add'];
echo "</span></a></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"15\"><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"form_list_submit();\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script>\r\n\r\n\r\nfunction add_tr(){\r\n\t\$('#treet1').append('<tr class=\"hover edit\"><td class=\"w48 sort\"><input type=\"text\" name=\"new_area_sort[]\" value=\"0\" /></td><td class=\"node\"><input type=\"text\" name=\"new_area_name[]\" value=\"\" /></td><td></td></tr>');\r\n}\r\nfunction edit(id){\r\n\t//sort\r\n\t\$('#area_sort_'+id).html(\"<input name='area_sort[\"+id+\"]' value='\"+\$('#hidden_area_sort_'+id).val()+\"' type='text'/>\");\r\n\t//name\r\n\t\$('#area_name_'+id).html(\"<input name='area_name[\"+id+\"]' value='\"+\$('#hidden_area_name_'+id).val()+\"' type='text'/> \");\r\n}\r\nfunction del(id){\r\n\t\$('#area_tr_'+id).remove();\r\n\t\$('#hidden_del_id').val(\$('#hidden_del_id').val()+'|'+id);\r\n}\r\nfunction refreshdistrict(parent_id,type){\r\n\tvar url = '';\r\n\tif(type == 'province'){\r\n\t\turl += '&province='+\$('#province').val();\r\n\t}\r\n\tif(type == 'city'){\r\n\t\turl += '&province='+\$('#province').val()+'&city='+\$('#city').val();\r\n\t}\r\n\tif(type == 'district'){\r\n\t\turl += '&province='+\$('#province').val()+'&city='+\$('#city').val()+'&district='+\$('#district').val();\r\n\t}\r\n\tlocation.href='index.php?act=flea_region&op=flea_region&flea_area_parent_id='+parent_id+url;\r\n}\r\nfunction form_list_submit(){\r\n\tif(\$('#hidden_del_id').val()){\r\n\t\tif(!confirm('";
echo $lang['region_index_del_tip'];
echo "?')){\r\n\t\t\treturn false;\r\n\t\t}\r\n\t}\r\n\t\$('#form_area_list').submit();\r\n}\r\n</script> ";
?>
