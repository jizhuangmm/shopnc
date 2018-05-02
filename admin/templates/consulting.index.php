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
echo $lang['consulting_index_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" name=\"formSearch\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"act\" value=\"consulting\" />\r\n    <input type=\"hidden\" name=\"op\" value=\"consulting\" />\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label for=\"member_name\">";
echo $lang['consulting_index_sender'];
echo "</label></th>\r\n          <td><input class=\"txt\" type=\"text\" name=\"member_name\" id=\"member_name\" value=\"";
echo $output['member_name'];
echo "\" /></td>\r\n          <th><label for=\"consult_content\"> ";
echo $lang['consulting_index_content'];
echo "</label></th>\r\n          <td><input class=\"txt\" type=\"text\" name=\"consult_content\" id=\"consult_content\" value=\"";
echo $output['consult_content'];
echo "\" /></td>\r\n          <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a>\r\n            ";
if ( $output['form_submit'] == "ok" )
{
		echo "            <a class=\"btns tooltip\" href=\"index.php?act=consulting&op=consulting\" title=\"";
		echo $lang['nc_cancel_search'];
		echo "\"><span>";
		echo $lang['nc_cancel_search'];
		echo "</span></a>\r\n            ";
}
echo "        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\"><div class=\"title\"><h5>";
echo $lang['nc_prompts'];
echo "</h5><span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n        <ul>\r\n            <li>";
echo $lang['consulting_index_help1'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form method=\"POST\" action=\"index.php?act=consulting&op=delete\" onsubmit=\"return checkForm() && confirm('";
echo $lang['nc_ensure_del'];
echo "');\" name=\"form1\">\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        ";
if ( is_array( $output['consult_list'] ) && 0 < count( $output['consult_list'] ) )
{
		echo "        ";
		foreach ( $output['consult_list'] as $k => $consult )
		{
				echo "        <tr class=\"space\">\r\n          <th class=\"w24\"><input type=\"checkbox\" class=\"checkitem\" name=\"consult_id[]\" value=\"";
				echo $consult['consult_id'];
				echo "\" /></th>\r\n          <th>\r\n          \t<strong>";
				echo $lang['consulting_index_object'];
				echo ":&nbsp;</strong>\r\n          \t<span><a target=\"_blank\" href=\"";
				echo SiteUrl."/index.php?act=goods&goods_id=".$consult['goods_id']."&id=".$consult['store_id'];
				echo "\">";
				echo $consult['cgoods_name'];
				echo "</a></span>\r\n          </th>\r\n          <th><strong>";
				echo $lang['consulting_index_store_name'];
				echo ":</strong>&nbsp;<a href=\"";
				echo SiteUrl."/index.php?act=show_store&id=".$consult['store_id'];
				echo "\" target=\"_blank\" class=\"normal\" >";
				echo $consult['store_name'];
				echo "</a></th>\r\n          <th><strong>";
				echo $lang['nc_handle'];
				echo ":</strong>&nbsp;<a href=\"javascript:if(confirm('";
				echo $lang['nc_ensure_del'];
				echo "')){location.href='";
				echo urlencode( "index.php?act=consulting&op=delete&consult_id=".$consult['consult_id'] );
				echo "';}\" class=\"normal\" >";
				echo $lang['nc_del'];
				echo "</a></th>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"12\"><fieldset class=\"w mtn\">\r\n              <legend><span><strong>";
				echo $lang['consulting_index_sender'];
				echo ":</strong>&nbsp;\r\n              ";
				if ( empty( $consult['member_id'] ) || $consult['member_id'] == "0" )
				{
						echo $lang['consulting_index_guest'];
				}
				else
				{
						echo $consult['cmember_name'];
				}
				echo "              </span>&nbsp;&nbsp;&nbsp;&nbsp;<span><strong>";
				echo $lang['consulting_index_time'];
				echo ":</strong>&nbsp;";
				echo date( "Y-m-d H:i:s", $consult['consult_addtime'] );
				echo "</span></legend>\r\n              <div class=\"formelement\" id=\"hutia_";
				echo $k;
				echo "\">";
				echo $consult['consult_content'];
				echo "</div>\r\n            </fieldset>\r\n            <fieldset class=\"d mtm mbw\">\r\n              <legend><strong>";
				echo $lang['consulting_index_reply'];
				echo ":</strong></legend>\r\n              <div class=\"formelement\" id=\"hutia2_";
				echo $k;
				echo "\">\r\n                ";
				if ( $consult['consult_reply'] != "" )
				{
						echo "                ";
						echo $consult['consult_reply'];
						echo "                ";
				}
				else
				{
						echo "                ";
						echo $lang['consulting_index_no_reply'];
						echo "                ";
				}
				echo "              </div>\r\n            </fieldset>\r\n         </td>\r\n        </tr>\r\n        ";
		}
		echo "        ";
}
else
{
		echo "        <tr class=\"no_data\">\r\n          <td colspan=\"20\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      <tfoot>\r\n        ";
if ( is_array( $output['consult_list'] ) && 0 < count( $output['consult_list'] ) )
{
		echo "        <tr class=\"tfoot\">\r\n          <td><input type=\"checkbox\" class=\"checkall\" id=\"checkallBottom\"></td>\r\n          <td colspan=\"16\"><label for=\"checkallBottom\">";
		echo $lang['nc_select_all'];
		echo "</label>\r\n            &nbsp;&nbsp;<a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.form1.submit()\"><span>";
		echo $lang['nc_del'];
		echo "</span></a>\r\n            <div class=\"pagination\">";
		echo $output['show_page'];
		echo "</div></td>\r\n        </tr>\r\n        ";
}
echo "      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\">\r\nfunction checkForm(){\r\n\tflag = false;\r\n\t\$.each(\$(\"input[name='consult_id[]']\"),function(i,n){\r\n\t\tif(\$(n).attr('checked')){\r\n\t\t\tflag = true;\r\n\t\t\treturn false;\r\n\t\t}\r\n\t});\r\n\tif(!flag)alert('";
echo $lang['consulting_del_choose'];
echo "');\r\n\treturn flag;\r\n}\r\n</script> \r\n<script>\r\n(function(){\r\n  \$('.w').each(function(i){\r\n  var o = document.getElementById(\"hutia_\"+i);\r\n  var s = o.innerHTML;\r\n  var p = document.createElement(\"span\");\r\n  var n = document.createElement(\"a\");\r\n  p.innerHTML = s.substring(0,50);\r\n  n.innerHTML = s.length > 50 ? \"";
echo $lang['consulting_index_unfold'];
echo "\" : \"\";\r\n  n.href = \"###\";\r\n  n.onclick = function(){\r\n    if (n.innerHTML == \"";
echo $lang['consulting_index_unfold'];
echo "\"){\r\n      n.innerHTML = \"";
echo $lang['consulting_index_retract'];
echo "\";\r\n      p.innerHTML = s;\r\n    }else{\r\n      n.innerHTML = \"";
echo $lang['consulting_index_unfold'];
echo "\";\r\n      p.innerHTML = s.substring(0,50);\r\n    }\r\n  }\r\n  o.innerHTML = \"\";\r\n  o.appendChild(p);\r\n  o.appendChild(n);\r\n  });\r\n})();\r\n(function(){\r\n\t  \$('.d').each(function(i){\r\n\t  var o = document.getElementById(\"hutia2_\"+i);\r\n\t  var s = o.innerHTML;\r\n\t  var p = document.createElement(\"span\");\r\n\t  var n = document.createElement(\"a\");\r\n\t  p.innerHTML = s.substring(0,50);\r\n\t  n.innerHTML = s.length > 50 ? \"";
echo $lang['consulting_index_unfold'];
echo "\" : \"\";\r\n\t  n.href = \"###\";\r\n\t  n.onclick = function(){\r\n\t    if (n.innerHTML == \"";
echo $lang['consulting_index_unfold'];
echo "\"){\r\n\t      n.innerHTML = \"";
echo $lang['consulting_index_retract'];
echo "\";\r\n\t      p.innerHTML = s;\r\n\t    }else{\r\n\t      n.innerHTML = \"";
echo $lang['consulting_index_unfold'];
echo "\";\r\n\t      p.innerHTML = s.substring(0,50);\r\n\t    }\r\n\t  }\r\n\t  o.innerHTML = \"\";\r\n\t  o.appendChild(p);\r\n\t  o.appendChild(n);\r\n\t  });\r\n\t})();\r\n  </script>";
?>
