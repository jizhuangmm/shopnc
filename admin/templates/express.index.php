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
echo $lang['express_name'];
echo "</h3>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\"><div class=\"title\"><h5>";
echo $lang['nc_prompts'];
echo "</h5><span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n        <ul>\r\n            <li>";
echo $lang['express_index_help1'];
echo "</li>\r\n            <li>";
echo $lang['express_index_help2'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th class=\"w24\"></th>\r\n          <th class=\"w270\">";
echo $lang['express_name'];
echo "</th>\r\n          <th >";
echo $lang['express_letter'];
echo "</th>\r\n          <th class=\"w270\">";
echo $lang['express_url'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['express_order'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['express_state'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
{
		echo "        ";
		foreach ( $output['list'] as $k => $v )
		{
				echo "        <tr class=\"hover\">\r\n          <td></td>\r\n          <td>";
				echo $v['e_name'];
				echo "</td>\r\n          <td>";
				echo $v['e_letter'];
				echo "</td>\r\n          <td>";
				echo $v['e_url'];
				echo "</td>\r\n          <td class=\"align-center yes-onoff\">";
				if ( $v['e_order'] == "1" )
				{
						echo "            <a href=\"JavaScript:void(0);\" class=\"tooltip enabled\" ajax_branch='order' nc_type=\"inline_edit\" fieldname=\"e_order\" fieldid=\"";
						echo $v['id'];
						echo "\" fieldvalue=\"1\" title=\"";
						echo $lang['nc_editable'];
						echo "\"><img src=\"";
						echo TEMPLATES_PATH;
						echo "/images/transparent.gif\"></a>\r\n            ";
				}
				else
				{
						echo "            <a href=\"JavaScript:void(0);\" class=\"tooltip disabled\" ajax_branch='order' nc_type=\"inline_edit\" fieldname=\"e_order\" fieldid=\"";
						echo $v['id'];
						echo "\" fieldvalue=\"0\"  title=\"";
						echo $lang['nc_editable'];
						echo "\"><img src=\"";
						echo TEMPLATES_PATH;
						echo "/images/transparent.gif\"></a>\r\n            ";
				}
				echo "</td>     \r\n          <td class=\"align-center yes-onoff\">";
				if ( $v['e_state'] == "0" )
				{
						echo "            <a href=\"JavaScript:void(0);\" class=\"tooltip disabled\" ajax_branch='state' nc_type=\"inline_edit\" fieldname=\"e_state\" fieldid=\"";
						echo $v['id'];
						echo "\" fieldvalue=\"0\" title=\"";
						echo $lang['nc_editable'];
						echo "\"><img src=\"";
						echo TEMPLATES_PATH;
						echo "/images/transparent.gif\"></a>\r\n            ";
				}
				else
				{
						echo "            <a href=\"JavaScript:void(0);\" class=\"tooltip enabled\" ajax_branch='state' nc_type=\"inline_edit\" fieldname=\"e_state\" fieldid=\"";
						echo $v['id'];
						echo "\" fieldvalue=\"1\"  title=\"";
						echo $lang['nc_editable'];
						echo "\"><img src=\"";
						echo TEMPLATES_PATH;
						echo "/images/transparent.gif\"></a>\r\n            ";
				}
				echo "</td>\r\n        </tr>\r\n        ";
		}
		echo "        ";
}
else
{
		echo "        <tr class=\"no_data\">\r\n          <td colspan=\"5\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      <tfoot>\r\n        ";
if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
{
		echo "        <tr class=\"tfoot\">\r\n          <td colspan=\"20\"><div class=\"pagination\"> ";
		echo $output['page'];
		echo " </div></td>\r\n        </tr>\r\n        ";
}
echo "      </tfoot>      \r\n    </table>\r\n  <div class=\"clear\"></div>\r\n</div>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.edit.js\" charset=\"utf-8\"></script>";
?>
