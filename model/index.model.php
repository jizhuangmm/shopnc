<?php
/**
 * 首页管理
 *
 * 
 *
 *
 * @copyright  Copyright (c) 2007-2012 ShopNC Inc. (http://www.shopnc.net)
 * @license    http://www.shopnc.net
 * @link       http://www.shopnc.net
 * @since      File available since Release v1.1
 */
defined('InShopNC') or exit('Access Invalid!');
class indexModel {
	/**
	 * 获取推荐店铺信息
	 *
	 * @param int $store_num 推荐店铺数目
	 * @return array	店铺数组信息
	 */	
	public function getRecommendStore($store_num = 3) {
		$recommend_store	= array();
		$array				= array();
		$array['table']		= 'store';
		$array['field']		= 'store_id,store_name,member_name,store_domain,store_credit,store_logo';
		$array['where']		= 'where store_recommend=1 and store_state = 1';
		$array['order'] = 'store_id desc';
		$array['limit']		= $store_num;
		$recommend_store	= Db::select($array);
		if(is_array($recommend_store) && !empty($recommend_store)) {
			$storeid_arr = array();
			foreach ($recommend_store as $key => $val) {
				//生成缓存的键值
				$hash_key = $val['store_id'];
				if ($_cache = rcache($hash_key,'store')){
					foreach ($_cache as $k=>$v){
						$val[$k] = $v;
					}
				}else {
					$storeid_arr[] = $val['store_id'];
				}
				//得到店铺信用数组
				$val['credit_arr'] = getCreditArr($val['store_credit']);
				//店铺标志
				$val['store_logo'] = $val['store_logo'] != '' ?  ATTACH_STORE.'/'.$val['store_logo'] : ATTACH_COMMON.DS.$GLOBALS['setting_config']['default_store_logo'];
				$recommend_storenew[$val['store_id']] = $val;
			}
			if (!empty($storeid_arr)){
				$model = Model();
				$goodsnum_arr = $model->table('goods')->field('store_id,count(*) as goods_count')->where(array('goods_show'=>'1','store_id'=>array('in',$storeid_arr)))->group('store_id')->select();
				if (!empty($goodsnum_arr)){
					foreach ($goodsnum_arr as $k=>$v){
						$recommend_storenew[$v['store_id']]['goods_count'] = $v['goods_count'];
					}
				}
			}
		}
		return $recommend_storenew;
	}
	/**
	 * 获取收藏店铺信息
	 *
	 * @param int $store_num 店铺数目
	 * @return array	店铺数组信息
	 */	
	public function getFavoritesStore($store_num = 3) {
		$store_list 	= array();
		$array				= array();
		$array['table']		= 'store';
		$array['field']		= 'store_id,store_name,member_name,store_domain,store_credit,store_logo';
		$array['where']		= 'where store_collect>0 and store_state = 1';
		$array['order'] = 'store_collect desc,store_id desc';
		$array['limit']		= $store_num;
		$store_list	= Db::select($array);
		if(is_array($store_list) && !empty($store_list)) {
			foreach ($store_list as $key => $val) {
				//店铺标志
				$val['store_logo'] = $val['store_logo'] != '' ?  ATTACH_STORE.'/'.$val['store_logo'] : ATTACH_COMMON.DS.$GLOBALS['setting_config']['default_store_logo'];
				$store_list[$key] = $val;
			}
		}
		return $store_list;
	}
	/**
	 * 获取最近加盟店铺信息
	 *
	 * @param int $store_num 店铺数目
	 * @return array	店铺数组信息
	 */	
	public function getNewStore($store_num = 3) {
		$store_list 	= array();
		$array				= array();
		$array['table']		= 'store';
		$array['field']		= 'store_id,store_name,member_name,store_domain,store_credit,store_logo';
		$array['where']		= 'where store_state = 1';
		$array['order'] = 'store_id desc';
		$array['limit']		= $store_num;
		$store_list	= Db::select($array);
		if(is_array($store_list) && !empty($store_list)) {
			foreach ($store_list as $key => $val) {
				//店铺标志
				$val['store_logo'] = $val['store_logo'] != '' ?  ATTACH_STORE.'/'.$val['store_logo'] : ATTACH_COMMON.DS.$GLOBALS['setting_config']['default_store_logo'];
				$store_list[$key] = $val;
			}
		}
		return $store_list;
	}
}