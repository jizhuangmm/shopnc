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
echo $lang['flea_index_class_setting'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['flea_index_class_setting_info'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"post\" enctype=\"multipart/form-data\" name=\"form1\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label for=\"flea_site_name\">";
echo $lang['flea_index_class_setting_digital'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\" style=\"width: 600px\">\r\n\t\t\t<select name=\"shuma_cid1\">\r\n\t                <option value=\"0\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n\t                ";
foreach ( $output['goods_class'] as $val )
{
		echo "\t                <option value=\"";
		echo $val['gc_id'];
		echo "\"";
		if ( $output['shuma']['fc_index_id1'] == $val['gc_id'] )
		{
				echo " selected=\"selected\"";
		}
		echo ">";
		echo $val['gc_name'];
		echo "</option>\r\n\t                ";
}
echo "\t\t\t</select>\r\n\t\t\t<span style=\"padding:0 3px;\">";
echo $lang['flea_index_class_setting_as'];
echo ":</span><input type=\"text\" name=\"shuma_cname1\" value=\"";
echo $output['shuma']['fc_index_name1'];
echo "\" style=\"width: 250px\" />\r\n          </td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['flea_class_index_tips'];
echo "</span></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\" style=\"width: 600px\">\r\n\t\t\t<select name=\"shuma_cid2\">\r\n\t                <option value=\"0\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n\t                ";
foreach ( $output['goods_class'] as $val )
{
		echo "\t                <option value=\"";
		echo $val['gc_id'];
		echo "\"";
		if ( $output['shuma']['fc_index_id2'] == $val['gc_id'] )
		{
				echo " selected=\"selected\"";
		}
		echo ">";
		echo $val['gc_name'];
		echo "</option>\r\n\t                ";
}
echo "\t              </select>\r\n\t              <span style=\"padding:0 3px;\">";
echo $lang['flea_index_class_setting_as'];
echo ":</span><input type=\"text\" name=\"shuma_cname2\" value=\"";
echo $output['shuma']['fc_index_name2'];
echo "\" style=\"width: 250px\" />\r\n          </td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['flea_class_index_tips'];
echo "</span></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\" style=\"width: 600px\">\r\n\t\t\t<select name=\"shuma_cid3\">\r\n\t                <option value=\"0\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n\t                ";
foreach ( $output['goods_class'] as $val )
{
		echo "\t                <option value=\"";
		echo $val['gc_id'];
		echo "\"";
		if ( $output['shuma']['fc_index_id3'] == $val['gc_id'] )
		{
				echo " selected=\"selected\"";
		}
		echo ">";
		echo $val['gc_name'];
		echo "</option>\r\n\t                ";
}
echo "\t              </select>\r\n\t              <span style=\"padding:0 3px;\">";
echo $lang['flea_index_class_setting_as'];
echo ":</span><input type=\"text\" name=\"shuma_cname3\" value=\"";
echo $output['shuma']['fc_index_name3'];
echo "\" style=\"width: 250px\" />\r\n          </td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['flea_class_index_tips'];
echo "</span></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\" style=\"width: 600px\">\r\n\t\t\t<select name=\"shuma_cid4\">\r\n\t                <option value=\"0\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n\t                ";
foreach ( $output['goods_class'] as $val )
{
		echo "\t                <option value=\"";
		echo $val['gc_id'];
		echo "\"";
		if ( $output['shuma']['fc_index_id4'] == $val['gc_id'] )
		{
				echo " selected=\"selected\"";
		}
		echo ">";
		echo $val['gc_name'];
		echo "</option>\r\n\t                ";
}
echo "\t              </select>\r\n\t              <span style=\"padding:0 3px;\">";
echo $lang['flea_index_class_setting_as'];
echo ":</span><input type=\"text\" name=\"shuma_cname4\" value=\"";
echo $output['shuma']['fc_index_name4'];
echo "\" style=\"width: 250px\" />\r\n          </td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['flea_class_index_tips'];
echo "</span></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"flea_site_title\">";
echo $lang['flea_index_class_setting_beauty'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\" style=\"width: 600px\">\r\n\t\t\t<select name=\"zhuangban_cid1\">\r\n\t                <option value=\"0\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n\t                ";
foreach ( $output['goods_class'] as $val )
{
		echo "\t                <option value=\"";
		echo $val['gc_id'];
		echo "\"";
		if ( $output['zhuangban']['fc_index_id1'] == $val['gc_id'] )
		{
				echo " selected=\"selected\"";
		}
		echo ">";
		echo $val['gc_name'];
		echo "</option>\r\n\t                ";
}
echo "\t              </select>\r\n\t              <span style=\"padding:0 3px;\">";
echo $lang['flea_index_class_setting_as'];
echo ":</span><input type=\"text\" name=\"zhuangban_cname1\" value=\"";
echo $output['zhuangban']['fc_index_name1'];
echo "\" style=\"width: 250px\" />\r\n          </td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['flea_class_index_tips'];
echo "</span></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\" style=\"width: 600px\">\r\n\t\t\t<select name=\"zhuangban_cid2\">\r\n\t                <option value=\"0\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n\t                ";
foreach ( $output['goods_class'] as $val )
{
		echo "\t                <option value=\"";
		echo $val['gc_id'];
		echo "\"";
		if ( $output['zhuangban']['fc_index_id2'] == $val['gc_id'] )
		{
				echo " selected=\"selected\"";
		}
		echo ">";
		echo $val['gc_name'];
		echo "</option>\r\n\t                ";
}
echo "\t              </select>\r\n\t              <span style=\"padding:0 3px;\">";
echo $lang['flea_index_class_setting_as'];
echo ":</span><input type=\"text\" name=\"zhuangban_cname2\" value=\"";
echo $output['zhuangban']['fc_index_name2'];
echo "\" style=\"width: 250px\" />\r\n          </td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['flea_class_index_tips'];
echo "</span></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\" style=\"width: 600px\">\r\n\t\t\t<select name=\"zhuangban_cid3\">\r\n\t                <option value=\"0\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n\t                ";
foreach ( $output['goods_class'] as $val )
{
		echo "\t                <option value=\"";
		echo $val['gc_id'];
		echo "\"";
		if ( $output['zhuangban']['fc_index_id3'] == $val['gc_id'] )
		{
				echo " selected=\"selected\"";
		}
		echo ">";
		echo $val['gc_name'];
		echo "</option>\r\n\t                ";
}
echo "\t              </select>\r\n\t              <span style=\"padding:0 3px;\">";
echo $lang['flea_index_class_setting_as'];
echo ":</span><input type=\"text\" name=\"zhuangban_cname3\" value=\"";
echo $output['zhuangban']['fc_index_name3'];
echo "\" style=\"width: 250px\" />\r\n          </td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['flea_class_index_tips'];
echo "</span></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\" style=\"width: 600px\">\r\n\t\t\t<select name=\"zhuangban_cid4\">\r\n\t                <option value=\"0\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n\t                ";
foreach ( $output['goods_class'] as $val )
{
		echo "\t                <option value=\"";
		echo $val['gc_id'];
		echo "\"";
		if ( $output['zhuangban']['fc_index_id4'] == $val['gc_id'] )
		{
				echo " selected=\"selected\"";
		}
		echo ">";
		echo $val['gc_name'];
		echo "</option>\r\n\t                ";
}
echo "\t              </select>\r\n\t              <span style=\"padding:0 3px;\">";
echo $lang['flea_index_class_setting_as'];
echo ":</span><input type=\"text\" name=\"zhuangban_cname4\" value=\"";
echo $output['zhuangban']['fc_index_name4'];
echo "\" style=\"width: 250px\" />\r\n          </td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['flea_class_index_tips'];
echo "</span></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"flea_site_description\">";
echo $lang['flea_index_class_setting_home'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\" style=\"width: 600px\">\r\n\t\t\t<select name=\"jujia_cid1\">\r\n\t                <option value=\"0\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n\t                ";
foreach ( $output['goods_class'] as $val )
{
		echo "\t                <option value=\"";
		echo $val['gc_id'];
		echo "\"";
		if ( $output['jujia']['fc_index_id1'] == $val['gc_id'] )
		{
				echo " selected=\"selected\"";
		}
		echo ">";
		echo $val['gc_name'];
		echo "</option>\r\n\t                ";
}
echo "\t              </select>\r\n\t              <span style=\"padding:0 3px;\">";
echo $lang['flea_index_class_setting_as'];
echo ":</span><input type=\"text\" name=\"jujia_cname1\" value=\"";
echo $output['jujia']['fc_index_name1'];
echo "\" style=\"width: 250px\" />\r\n          </td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['flea_class_index_tips'];
echo "</span></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\" style=\"width: 600px\">\r\n\t\t\t<select name=\"jujia_cid2\">\r\n\t                <option value=\"0\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n\t                ";
foreach ( $output['goods_class'] as $val )
{
		echo "\t                <option value=\"";
		echo $val['gc_id'];
		echo "\"";
		if ( $output['jujia']['fc_index_id2'] == $val['gc_id'] )
		{
				echo " selected=\"selected\"";
		}
		echo ">";
		echo $val['gc_name'];
		echo "</option>\r\n\t                ";
}
echo "\t              </select>\r\n\t              <span style=\"padding:0 3px;\">";
echo $lang['flea_index_class_setting_as'];
echo ":</span><input type=\"text\" name=\"jujia_cname2\" value=\"";
echo $output['jujia']['fc_index_name2'];
echo "\" style=\"width: 250px\" />\r\n          </td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['flea_class_index_tips'];
echo "</span></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\" style=\"width: 600px\">\r\n\t\t\t<select name=\"jujia_cid3\">\r\n\t                <option value=\"0\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n\t                ";
foreach ( $output['goods_class'] as $val )
{
		echo "\t                <option value=\"";
		echo $val['gc_id'];
		echo "\"";
		if ( $output['jujia']['fc_index_id3'] == $val['gc_id'] )
		{
				echo " selected=\"selected\"";
		}
		echo ">";
		echo $val['gc_name'];
		echo "</option>\r\n\t                ";
}
echo "\t              </select>\r\n\t              <span style=\"padding:0 3px;\">";
echo $lang['flea_index_class_setting_as'];
echo ":</span><input type=\"text\" name=\"jujia_cname3\" value=\"";
echo $output['jujia']['fc_index_name3'];
echo "\" style=\"width: 250px\" />\r\n          </td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['flea_class_index_tips'];
echo "</span></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\" style=\"width: 600px\">\r\n\t\t\t<select name=\"jujia_cid4\">\r\n\t                <option value=\"0\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n\t                ";
foreach ( $output['goods_class'] as $val )
{
		echo "\t                <option value=\"";
		echo $val['gc_id'];
		echo "\"";
		if ( $output['jujia']['fc_index_id4'] == $val['gc_id'] )
		{
				echo " selected=\"selected\"";
		}
		echo ">";
		echo $val['gc_name'];
		echo "</option>\r\n\t                ";
}
echo "\t              </select>\r\n\t              <span style=\"padding:0 3px;\">";
echo $lang['flea_index_class_setting_as'];
echo ":</span><input type=\"text\" name=\"jujia_cname4\" value=\"";
echo $output['jujia']['fc_index_name4'];
echo "\" style=\"width: 250px\" />\r\n          </td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['flea_class_index_tips'];
echo "</span></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['flea_index_class_setting_interest'];
echo ":</td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\" style=\"width: 600px\">\r\n\t\t\t<select name=\"xingqu_cid1\">\r\n\t                <option value=\"0\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n\t                ";
foreach ( $output['goods_class'] as $val )
{
		echo "\t                <option value=\"";
		echo $val['gc_id'];
		echo "\"";
		if ( $output['xingqu']['fc_index_id1'] == $val['gc_id'] )
		{
				echo " selected=\"selected\"";
		}
		echo ">";
		echo $val['gc_name'];
		echo "</option>\r\n\t                ";
}
echo "\t              </select>\r\n\t              <span style=\"padding:0 3px;\">";
echo $lang['flea_index_class_setting_as'];
echo ":</span><input type=\"text\" name=\"xingqu_cname1\" value=\"";
echo $output['xingqu']['fc_index_name1'];
echo "\" style=\"width: 250px\" />\r\n          </td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['flea_class_index_tips'];
echo "</span></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\" style=\"width: 600px\">\r\n\t\t\t<select name=\"xingqu_cid2\">\r\n\t                <option value=\"0\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n\t                ";
foreach ( $output['goods_class'] as $val )
{
		echo "\t                <option value=\"";
		echo $val['gc_id'];
		echo "\"";
		if ( $output['xingqu']['fc_index_id2'] == $val['gc_id'] )
		{
				echo " selected=\"selected\"";
		}
		echo ">";
		echo $val['gc_name'];
		echo "</option>\r\n\t                ";
}
echo "\t              </select>\r\n\t              <span style=\"padding:0 3px;\">";
echo $lang['flea_index_class_setting_as'];
echo ":</span><input type=\"text\" name=\"xingqu_cname2\" value=\"";
echo $output['xingqu']['fc_index_name2'];
echo "\" style=\"width: 250px\" />\r\n          </td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['flea_class_index_tips'];
echo "</span></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\" style=\"width: 600px\">\r\n\t\t\t<select name=\"xingqu_cid3\">\r\n\t                <option value=\"0\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n\t                ";
foreach ( $output['goods_class'] as $val )
{
		echo "\t                <option value=\"";
		echo $val['gc_id'];
		echo "\"";
		if ( $output['xingqu']['fc_index_id3'] == $val['gc_id'] )
		{
				echo " selected=\"selected\"";
		}
		echo ">";
		echo $val['gc_name'];
		echo "</option>\r\n\t                ";
}
echo "\t              </select>\r\n\t              <span style=\"padding:0 3px;\">";
echo $lang['flea_index_class_setting_as'];
echo ":</span><input type=\"text\" name=\"xingqu_cname3\" value=\"";
echo $output['xingqu']['fc_index_name3'];
echo "\" style=\"width: 250px\" />\r\n          </td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['flea_class_index_tips'];
echo "</span></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\" style=\"width: 600px\">\r\n\t\t\t<select name=\"xingqu_cid4\">\r\n\t                <option value=\"0\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n\t                ";
foreach ( $output['goods_class'] as $val )
{
		echo "\t                <option value=\"";
		echo $val['gc_id'];
		echo "\"";
		if ( $output['xingqu']['fc_index_id4'] == $val['gc_id'] )
		{
				echo " selected=\"selected\"";
		}
		echo ">";
		echo $val['gc_name'];
		echo "</option>\r\n\t                ";
}
echo "\t              </select>\r\n\t              <span style=\"padding:0 3px;\">";
echo $lang['flea_index_class_setting_as'];
echo ":</span><input type=\"text\" name=\"xingqu_cname4\" value=\"";
echo $output['xingqu']['fc_index_name4'];
echo "\" style=\"width: 250px\" />\r\n          </td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['flea_class_index_tips'];
echo "</span></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"flea_hot_search\">";
echo $lang['flea_index_class_setting_baby'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\" style=\"width: 600px\">\r\n\t\t\t<select name=\"muying_cid1\">\r\n\t                <option value=\"0\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n\t                ";
foreach ( $output['goods_class'] as $val )
{
		echo "\t                <option value=\"";
		echo $val['gc_id'];
		echo "\"";
		if ( $output['muying']['fc_index_id1'] == $val['gc_id'] )
		{
				echo " selected=\"selected\"";
		}
		echo ">";
		echo $val['gc_name'];
		echo "</option>\r\n\t                ";
}
echo "\t              </select>\r\n\t              <span style=\"padding:0 3px;\">";
echo $lang['flea_index_class_setting_as'];
echo ":</span><input type=\"text\" name=\"muying_cname1\" value=\"";
echo $output['muying']['fc_index_name1'];
echo "\" style=\"width: 250px\" />\r\n          </td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['flea_class_index_tips'];
echo "</span></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\" style=\"width: 600px\">\r\n\t\t\t<select name=\"muying_cid2\">\r\n\t                <option value=\"0\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n\t                ";
foreach ( $output['goods_class'] as $val )
{
		echo "\t                <option value=\"";
		echo $val['gc_id'];
		echo "\"";
		if ( $output['muying']['fc_index_id2'] == $val['gc_id'] )
		{
				echo " selected=\"selected\"";
		}
		echo ">";
		echo $val['gc_name'];
		echo "</option>\r\n\t                ";
}
echo "\t              </select>\r\n\t              <span style=\"padding:0 3px;\">";
echo $lang['flea_index_class_setting_as'];
echo ":</span><input type=\"text\" name=\"muying_cname2\" value=\"";
echo $output['muying']['fc_index_name2'];
echo "\" style=\"width: 250px\" />\r\n          </td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['flea_class_index_tips'];
echo "</span></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\" style=\"width: 600px\">\r\n\t\t\t<select name=\"muying_cid3\">\r\n\t                <option value=\"0\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n\t                ";
foreach ( $output['goods_class'] as $val )
{
		echo "\t                <option value=\"";
		echo $val['gc_id'];
		echo "\"";
		if ( $output['muying']['fc_index_id3'] == $val['gc_id'] )
		{
				echo " selected=\"selected\"";
		}
		echo ">";
		echo $val['gc_name'];
		echo "</option>\r\n\t                ";
}
echo "\t              </select>\r\n\t              <span style=\"padding:0 3px;\">";
echo $lang['flea_index_class_setting_as'];
echo ":</span><input type=\"text\" name=\"muying_cname3\" value=\"";
echo $output['muying']['fc_index_name3'];
echo "\" style=\"width: 250px\" />\r\n          </td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['flea_class_index_tips'];
echo "</span></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\" style=\"width: 600px\">\r\n\t\t\t<select name=\"muying_cid4\">\r\n\t                <option value=\"0\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n\t                ";
foreach ( $output['goods_class'] as $val )
{
		echo "\t                <option value=\"";
		echo $val['gc_id'];
		echo "\"";
		if ( $output['muying']['fc_index_id4'] == $val['gc_id'] )
		{
				echo " selected=\"selected\"";
		}
		echo ">";
		echo $val['gc_name'];
		echo "</option>\r\n\t                ";
}
echo "\t              </select>\r\n\t              <span style=\"padding:0 3px;\">";
echo $lang['flea_index_class_setting_as'];
echo ":</span><input type=\"text\" name=\"muying_cname4\" value=\"";
echo $output['muying']['fc_index_name4'];
echo "\" style=\"width: 250px\" />\r\n          </td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['flea_class_index_tips'];
echo "</span></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.form1.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n";
?>
