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
$lang['del_store_ok'] = "刪除店舖成功。";
$lang['sel_del_store'] = "請選擇要刪除的內容";
$lang['open'] = "開啟";
$lang['close'] = "關閉";
$lang['no_limit'] = "無限制";
$lang['user_name_no_null'] = "用戶名不能為空";
$lang['pwd_no_null'] = "密碼不能為空";
$lang['user_open_store'] = "該用戶已開通店舖";
$lang['user_no_exist'] = "您輸入的用戶名不存在";
$lang['pwd_fail'] = "您輸入的密碼不正確";
$lang['please_input_store_user_name_p'] = "請輸入店主姓名";
$lang['please_input_store_name_p'] = "請輸入店舖名稱";
$lang['please_input_store_level'] = "請填寫店舖等級";
$lang['back_store_list'] = "返回店舖列表";
$lang['countinue_add_store'] = "繼續新增店舖";
$lang['store_name_exists'] = "該店舖名稱已經存在，請您更換一個名稱";
$lang['add_store_ok'] = "新增店舖成功。";
$lang['add_fail_fail'] = "新增店舖失敗。";
$lang['update_store_ok'] = "編輯店舖成功。";
$lang['update_fail_fail'] = "編輯店舖失敗。";
$lang['store_no_exist'] = "該店舖不存在。";
$lang['store_no_meet'] = "店舖不符合要求";
$lang['operation_ok'] = "操作成功。";
$lang['please_sel_del_store'] = "請選擇要刪除的內容!";
$lang['please_sel_store'] = "請選擇要操作的店舖!";
$lang['del_store_ok'] = "刪除店舖成功。";
$lang['address_no_null'] = "地區不能為空";
$lang['please_sel_edit_store'] = "請選擇要編輯的店舖";
$lang['store_batch_del_ok'] = "店舖批量編輯成功!";
$lang['please_sel_edit_store'] = "請選擇要編輯的內容!";
$lang['store'] = "店舖";
$lang['store_help1'] = "如果當前時間超過店舖有效期或店舖處于關閉狀態，前台將不能繼續瀏覽該店舖，但是店主仍然可以編輯該店舖";
$lang['store_help2'] = "被推薦店舖，將在前台的店舖推薦等相關位置展示，處于關閉中的店舖，不可推薦";
$lang['store_audit_help1'] = "開店申請可批量通過審核";
$lang['store_grade_help1'] = "當管理員刪除升級申請後，店主可繼續申請店舖升級";
$lang['store_grade_help2'] = "審核申請請點擊編輯選項";
$lang['manage'] = "管理";
$lang['pending'] = "開店申請";
$lang['grade_apply'] = "升級申請";
$lang['store_user_name'] = "店主用戶名";
$lang['store_user_id'] = "身份證號";
$lang['store_name'] = "店舖名稱";
$lang['store_index'] = "店舖首頁";
$lang['belongs_class'] = "所屬分類";
$lang['location'] = "所在地";
$lang['details_address'] = "詳細地址";
$lang['zip'] = "郵政編碼";
$lang['tel_phone'] = "聯繫電話";
$lang['belongs_level'] = "所屬等級";
$lang['period_to'] = "有效期至";
$lang['formart'] = "格式：2009-4-30，留空表示不限時間";
$lang['state'] = "狀態";
$lang['open'] = "開啟";
$lang['close'] = "關閉";
$lang['close_reason'] = "關閉原因";
$lang['certification'] = "認證";
$lang['owner_certification'] = "實名認證";
$lang['owner_certification_del'] = "確定要刪除實名認證檔案麼？";
$lang['entity_store_certification'] = "實體店舖認證";
$lang['entity_store_certification_del'] = "確定要刪除店舖認證檔案麼？";
$lang['certification_del_success'] = "認證檔案刪除成功";
$lang['certification_del_fail'] = "認證檔案刪除失敗";
$lang['recommended'] = "推薦";
$lang['recommended_tips'] = "店舖關閉時不可推薦";
$lang['reset'] = "重置";
$lang['please_input_store_name'] = "請輸入店舖名稱";
$lang['please_input_address'] = "請選擇地區";
$lang['view_owner_certification_file'] = "查看實名認證檔案";
$lang['view_entity_store_certification_file'] = "查看實體店舖認證檔案";
$lang['store_user'] = "店主";
$lang['operation'] = "操作";
$lang['editable'] = "可編輯";
$lang['are_you_sure_del_store'] = "您確定要刪除店舖的所有信息（包括商品、訂單等）嗎？";
$lang['no_edit_please_no_choose'] = "不修改請不要選擇";
$lang['unchanged'] = "保持不變";
$lang['to'] = "改為";
$lang['no_edit_please_null'] = "不修改請留空";
$lang['authing'] = "認證中";
$lang['enter_shop_owner_info'] = "請輸入要開店的用戶的信息";
$lang['user_name'] = "用戶名";
$lang['pwd'] = "密碼";
$lang['need_verify_pwd'] = "需要驗證密碼";
$lang['store_domain_edit_success'] = "保存成功";
$lang['store_domain'] = "二級域名";
$lang['store_domain_times'] = "已修改次數";
$lang['store_domain_valid'] = "字母、數字、下劃線、中劃線為有效字元";
$lang['store_domain_rangelength'] = "二級域名長度為 {0} 到 {1} 個字元之間";
$lang['store_domain_times_digits'] = "已修改次數僅能為數字";
$lang['store_domain_times_max'] = "已修改次數最大為 {0}";
$lang['store_domain_length_error'] = "二級域名長度不符合要求";
$lang['store_domain_exists'] = "該二級域名已存在,請更換其它域名";
$lang['store_domain_sys'] = "該二級域名為系統禁止域名,請更換其它域名";
$lang['store_domain_invalid'] = "該二級域名不符合域名命名規範,請不要使用特殊字元";
$lang['store_save_defaultalbumclass_name'] = "預設相冊";
?>
