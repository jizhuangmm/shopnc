<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

echo "<script type=\"text/javascript\">\r\n\$(document).ready(function(){\r\n    get_complain_talk();\r\n    \$(\"#btn_publish\").click(function(){\r\n        if(\$(\"#complain_talk\").val()=='') {\r\n            alert(\"";
echo $lang['talk_null'];
echo "\");\r\n        }\r\n        else {\r\n            publish_complain_talk();\r\n        }\r\n    });\r\n    \$(\"#btn_refresh\").click(function(){\r\n        get_complain_talk();\r\n    });\r\n});\r\nfunction get_complain_talk() {\r\n    \$(\"#div_talk\").empty();\r\n    \$.ajax({\r\n        type:'POST',\r\n        url:'index.php?act=complain&op=get_complain_talk',\r\n        cache:false,\r\n        data:\"complain_id=";
echo $output['complain_info']['complain_id'];
echo "\",\r\n        dataType:'json',\r\n        error:function(){\r\n                \$(\"#div_talk\").append(\"<p class='admin'>\"+\"";
echo $lang['talk_none'];
echo "\"+\"</p>\");\r\n        },\r\n        success:function(talk_list){\r\n            if(talk_list.length >= 1) {\r\n                for(var i = 0; i < talk_list.length; i++)\r\n                {\r\n                    var link = \"<p class='\"+talk_list[i].css+\"'>\"+talk_list[i].talk+\"</p>\";\r\n                    \$(\"#div_talk\").append(link);\r\n                }\r\n            }\r\n            else {\r\n                \$(\"#div_talk\").append(\"<p class='admin'>\"+\"";
echo $lang['talk_none'];
echo "\"+\"</p>\");\r\n            }\r\n        }\r\n\t});\r\n}\r\nfunction publish_complain_talk() {\r\n        \$.ajax({\r\n            type:'POST',\r\n                url:'index.php?act=complain&op=publish_complain_talk',\r\n                cache:false,\r\n                data:\"complain_id=";
echo $output['complain_info']['complain_id'];
echo "&complain_talk=\"+encodeURIComponent(\$(\"#complain_talk\").val()),\r\n                dataType:'json',\r\n                error:function(){\r\n                    alert(\"";
echo $lang['talk_send_fail'];
echo "\");\r\n                },\r\n                    success:function(talk_list){\r\n                        if(talk_list == 'success') {\r\n                            \$(\"#complain_talk\").val('');\r\n                            get_complain_talk();\r\n                            alert(\"";
echo $lang['talk_send_success'];
echo "\");\r\n                        }\r\n                        else {\r\n                            alert(\"";
echo $lang['talk_send_fail'];
echo "\");\r\n                        }\r\n                    }\r\n        });\r\n}\r\n\r\nfunction forbit_talk(talk_id) {\r\n        \$.ajax({\r\n            type:'POST',\r\n                url:'index.php?act=complain&op=forbit_talk',\r\n                cache:false,\r\n                data:\"talk_id=\"+talk_id,\r\n                dataType:'json',\r\n                error:function(){\r\n                    alert(\"";
echo $lang['talk_forbit_fail'];
echo "\");\r\n                },\r\n                    success:function(talk_list){\r\n                        if(talk_list == 'success') {\r\n                            get_complain_talk();\r\n                            alert(\"";
echo $lang['talk_forbit_success'];
echo "\");\r\n                        }\r\n                        else {\r\n                            alert(\"";
echo $lang['talk_forbit_fail'];
echo "\");\r\n                        }\r\n                    }\r\n        });\r\n}\r\n</script>\r\n\r\n<table class=\"table tb-type2 order mtw\">\r\n  <thead class=\"thead\">\r\n    <tr class=\"space\">\r\n      <th>";
echo $lang['talk_detail'];
echo "</th>\r\n    </tr>\r\n  </thead>\r\n  <tbody>\r\n    <tr>\r\n      <th>";
echo $lang['talk_list'];
echo "</th>\r\n    </tr>\r\n    <tr class=\"noborder\">\r\n      <td class=\"complain-content\"><div id=\"div_talk\" class=\"div_talk\"> </div></td>\r\n    </tr>\r\n    ";
if ( intval( $output['complain_info']['complain_state'] ) !== 99 )
{
		echo "    <tr>\r\n      <th>";
		echo $lang['talk_send'];
		echo "</th>\r\n    </tr>\r\n    <tr class=\"noborder\">\r\n      <td>\r\n          <textarea id=\"complain_talk\" class=\"tarea\"></textarea>\r\n        </td>\r\n    </tr>\r\n    <tr>\r\n      <td><a href=\"JavaScript:void(0);\" id=\"btn_refresh\" class=\"btn\" onclick=\"submit_delete_batch()\"><span>";
		echo $lang['talk_refresh'];
		echo "</span></a><a href=\"JavaScript:void(0);\" id=\"btn_publish\" class=\"btn\" onclick=\"submit_delete_batch()\"><span>";
		echo $lang['talk_send'];
		echo "</span></a></td>\r\n    </tr>\r\n    ";
}
echo "  </tbody>\r\n</table>\r\n";
?>
