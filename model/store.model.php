<?php
/**
 * 卖家管理
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
class storeModel extends Model {
	public function __construct(){
		parent::__construct('store');
	}
	/**
	 * 创建店铺
	 *
	 * @param	array $param	条件数组
	 */	
	public function createStore($param) {
		if(empty($param)) {
			return false;
		}
		$shop_array		= array();
		$shop_array['grade_id']		= intval($param['grade_id']);
		$shop_array['store_owner_card']	= trim($param['store_owner_card']);
		$shop_array['store_name']	= trim($param['store_name']);
		$shop_array['member_id']	= $_SESSION['member_id'];
		$shop_array['member_name']	= $_SESSION['member_name'];
		$shop_array['sc_id']		= intval($param['sc_id']);
		$shop_array['area_id']		= trim($param['area_id']);
		$shop_array['area_info']	= trim($param['area_info']);
		$shop_array['store_address']= trim($param['store_address']);
		$shop_array['store_zip']	= trim($param['store_zip']);
		$shop_array['store_tel']	= trim($param['store_tel']);
		$shop_array['store_zy']		= trim($param['store_zy']);
		$shop_array['store_image']	= trim($param['store_image']);
		$shop_array['store_image1']	= trim($param['store_image1']);
		$shop_array['store_state']	= 1;
		$shop_array['store_audit']	= $param['store_audit'];
		$shop_array['store_time']	= time();

		$result	= Db::insert('store',$shop_array);
		if ($result) {
			Db::update('member',array('store_id'=>$result),"WHERE member_id='{$_SESSION['member_id']}'");
			return $result;
		} else {
			return false;
		}
	}
	/**
	 * 设置店铺
	 *
	 * @param	array $param	条件数组
	 */	
	public function setStore($param) {
		if (empty($param)){
			return false;
		}

		$tmp = array(
			'store_name'=>$param['store_name'],
			'area_id'=>$param['area_id'],
			'area_info'=>$param['area_info'],
			'store_address'=>$param['store_address'],
			'store_label'=>empty($param['store_label'])?$param['store_old_label']:$param['store_label'],
			'store_banner'=>empty($param['store_banner'])?$param['store_old_banner']:$param['store_banner'],
			'store_logo'=>empty($param['store_logo'])?$param['store_old_logo']:$param['store_logo'],
			'store_tel'=>$param['store_tel'],
			'store_qq'=>$param['store_qq'],
			'store_ww'=>$param['store_ww'],
			'store_msn'=>$param['store_msn'],
			'store_zy'=>$param['store_zy'],
			'description'=>$param['description'],
			'store_domain'=>$param['store_domain'],
		    'store_keywords'=>$param['seo_keywords'],
		    'store_description'=>$param['seo_description']
		);
		if (!empty($param['store_theme'])){
			$tmp['store_theme'] = $param['store_theme'];
		}
		if (empty($tmp['store_domain'])) unset($tmp['store_domain']);
		$where = " store_id = '". $param['store_id'] ."'";
		$result = Db::update('store',$tmp,$where);
		return $result;
	}
	/**
	 * 获取店铺信息
	 *
	 * @param	array $param 店铺条件
	 * @param	string $field 显示字段
	 * @return	array 数组格式的返回结果
	 */
	public function shopStore($param,$field='*') {
		if(empty($param)) {
			return false;
		}
		//得到条件语句
		$condition_str	= $this->getCondition($param);
		$param	= array();
		$param['table']	= 'store';
		$param['where']	= $condition_str;
		$param['field']	= $field;
		$param['limit'] = 1;
		$store_info	= Db::select($param);
		return $store_info[0];
	}
	/**
	 * 获取店铺信息总数
	 *
	 * @param	array $param 店铺条件
	 * @param	string $field 显示字段
	 * @return	array 数组格式的返回结果
	 */	
	public function countStore($param){
		$condition_str = $this->getCondition($param);
		$array	= array();
		$array['table']	= 'store';
		$array['where'] = $condition_str;
		$array['field'] = 'count(store_id)';
		$goods_array	= Db::select($array);
		return $goods_array[0][0];
	}
	/**
	 * 将条件数组组合为SQL语句的条件部分
	 *
	 * @param	array $conditon_array
	 * @return	string
	 */
	private function getCondition($conditon_array){
		$condition_sql = '';

		if($conditon_array['store_recommend'] != '') {
			$condition_sql	.= " and `store`.store_recommend = '{$conditon_array['store_recommend']}'";
		}
		if($conditon_array['store_state'] != '') {
			$condition_sql	.= " and `store`.store_state = '{$conditon_array['store_state']}'";
		}
		if($conditon_array['friend_list'] != '') {
			$condition_sql	.= " and `store`.member_name IN (".$conditon_array['friend_list'].")";
		}
		if($conditon_array['store_name'] != '') {
			$condition_sql	.= " and `store`.store_name='".$conditon_array['store_name']."'";
		}
		if($conditon_array['store_id'] != '') {
			$condition_sql	.= " and `store`.store_id='{$conditon_array['store_id']}'";
		}
		if($conditon_array['member_id'] != '') {
			$condition_sql	.= " and `store`.member_id='{$conditon_array['member_id']}'";
		}
		if($conditon_array['store_id_in'] != ''){
			$condition_sql	.= " and `store`.store_id in (".$conditon_array['store_id_in'].")";
		}
		if($conditon_array['like_owner_and_name'] != '') {
			$condition_sql	.= " and member_name like '%".$conditon_array['like_owner_and_name']."%'";
		}
		if($conditon_array['like_store_name'] != '') {
			$condition_sql	.= " and `store`.store_name like '%".$conditon_array['like_store_name']."%'";
		}
		if($conditon_array['grade_id'] != '') {
			$condition_sql	.= " and `store`.grade_id='".$conditon_array['grade_id']."'";
		}
		if(isset($conditon_array['grade_id_in'])) {
			if ($conditon_array['grade_id_in'] == ''){
				$condition_sql	.= " and `store`.grade_id in ('')";
			} else {
				$condition_sql	.= " and `store`.grade_id in ({$conditon_array['grade_id_in']})";
			}
		}
		if($conditon_array['store_audit'] != '') {
			$condition_sql	.= " and `store`.store_audit = '".$conditon_array['store_audit']."'";
		}
		if($conditon_array['area_id'] != '') {
			$condition_sql	.= " and `store`.area_id = '".$conditon_array['area_id']."'";
		}
		if($conditon_array['in_area_id'] != '') {
			$condition_sql	.= " and `store`.area_id in (".$conditon_array['in_area_id'].")";
		}
		if($conditon_array['sc_id'] != '') {
			$condition_sql	.= " and `store`.sc_id = '".$conditon_array['sc_id']."'";
		}
		if(isset($conditon_array['sc_id_in'])) {
			if ($conditon_array['sc_id_in'] == ''){
				$condition_sql	.= " and `store`.sc_id in ('') ";
			}else {
				$condition_sql	.= " and `store`.sc_id in({$conditon_array['sc_id_in']})";
			}
		}
		if($conditon_array['store_domain'] != '') {
			$condition_sql	.= " and `store`.store_domain = '".$conditon_array['store_domain']."'";
		}
		if ($conditon_array['lt_store_end_time'] != ''){
			$condition_sql	.= " and (`store`.store_end_time > 0 and `store`.store_end_time<'".$conditon_array['lt_store_end_time']."')";
		}
		if($conditon_array['like_store_domain'] != '') {
			$condition_sql	.= " and `store`.store_domain like '%".$conditon_array['like_store_domain']."%'";
		}
		if($conditon_array['store_domain_not_null'] != '') {
			$condition_sql	.= " and `store`.store_domain <> ''";
		}
		return $condition_sql;
	}
	
	/**
	 * 店铺列表
	 *
	 * @param array $condition 检索条件
	 * @param obj 分页对象
	 * @return array 数组形式的返回结果
	 */
	public function getStoreList($condition,$page = '',$type = 'simple'){
		$condition_str = $this->getCondition($condition);
		$param = array();
		$param['where'] = $condition_str;
		switch ($type){
			case 'store_class':
				$param['table'] = 'store,store_class';
				$param['join_type']= 'INNER JOIN';
				$param['join_on']= array('store.sc_id = store_class.sc_id');
				break;
			default:
				$param['table'] = 'store';
				break;
		}
		$param['field'] = $condition['field'];
		$param['order'] = $condition['order'] ? $condition['order'] : 'store.store_id desc';
		$param['group'] = $condition['group'];
		$param['limit'] = $condition['limit'];
		$result = Db::select($param,$page);
		return $result;
	}
	
	/**
	 * 新增
	 *
	 * @param array $param 参数
	 * @return array $rs_row 返回数组形式的查询结果
	 */
	public function add($param){
		if (empty($param)){
			return false;
		}
		if (is_array($param)){
			$tmp = array();
			foreach ($param as $k => $v){
				$tmp[$k] = $v;
			}
			$result = Db::insert('store',$tmp);
			return $result;
		}else {
			return false;
		}
	}
	/**
	 * 更新
	 *
	 * @param array $param 参数
	 * @return array $rs_row 返回数组形式的查询结果
	 */
	public function storeUpdate($param){
		if (empty($param)){
			return false;
		}
		if (is_array($param)){
			$tmp = array();
			foreach ($param as $k => $v){
				$tmp[$k] = $v;
			}
			$where = " store_id = '". $param['store_id'] ."'";
			$result = Db::update('store',$tmp,$where);
			return $result;
		}else {
			return false;
		}
	}
	/**
	 * 根据条件更新
	 *
	 * @param array $param 参数
	 * @return array $rs_row 返回数组形式的查询结果
	 */
	public function updateByCondtion($param,$condition){
		if (empty($param)){
			return false;
		}
		$condition_str = $this->getCondition($condition);
		return Db::update('store',$param,$condition_str);
	}
	/**
	 * 删除店铺
	 *
	 * @param int $id 记录ID
	 * @return bool 布尔类型的返回结果
	 */
	public function del($id){
		if (intval($id) > 0){
			$store_array = $this->shopStore(array('store_id'=>intval($id)));
			/**
			 * 删除店铺相关图片
			 */
			@unlink(BasePath.DS.ATTACH_AUTH.DS.$store_array['store_image']);
			@unlink(BasePath.DS.ATTACH_AUTH.DS.$store_array['store_image1']);
			@unlink(BasePath.DS.ATTACH_STORE.DS.$store_array['store_label']);
			@unlink(BasePath.DS.ATTACH_STORE.DS.$store_array['store_banner']);
			@unlink(BasePath.DS.ATTACH_STORE.DS.$store_array['store_logo']);
			if($store_array['store_code'] != 'default_qrcode.png')
			@unlink(BasePath.DS.ATTACH_STORE.DS.$store_array['store_code']);
			if($store_array['store_slide'] != ''){
				foreach(explode(',', $store_array['store_slide']) as $val){
					@unlink(BasePath.DS.ATTACH_SLIDE.DS.$val);
				}
			}
			$where = " store_id = '". intval($id) ."'";
			$result = Db::delete('store',$where);
			return $result;
		}else {
			return false;
		}
	}

    /**
	 * 根据编号获取单个内容
	 *
	 * @param int
	 * @return array 数组类型的返回结果
	 */
	public function getOne($id){
		if (intval($id) > 0){
			$param = array();
			$param['table'] = 'store'; 
			$param['field'] = 'store_id';
			$param['value'] = intval($id);
			$result = Db::getRow($param);
			return $result;
		}else {
			return FALSE;
		}
	}

	/**
	 * 删除用户收藏店铺
	 *
	 * @param int $id 记录ID
	 * @return bool 布尔类型的返回结果
	 */
	public function favorites_store_del($id){
		if (intval($id) > 0){
			$where = " fav_type='store' and fav_id = '".intval($id)."' ";
			$result = Db::delete('favorites',$where);
			return $result;
		}else {
			return false;
		}
	}	
	
	/**
	 * 获得店铺商品数量信息
	 * 
	 * @param	array $param 店铺数组
	 * @return	array 数组格式的返回结果
	 */
	public function getStoreGoods($store_list,$condition = array()){
		if (!empty($store_list) && is_array($store_list)){
			$store_id = array();
			foreach ($store_list as $key=>$store){
				//生成缓存的键值
				$hash_key = $store['store_id'];
				if ($_cache = rcache($hash_key,'store')){
					foreach ($_cache as $k=>$v){						
						$store[$k] = $v;
					}
				}else {
					$store_id[] = intval($store['store_id']);
					$store['goods_count'] = 0;//店铺商品数
				}
				//得到店铺信用数组
				$store['credit_arr'] = getCreditArr($store['store_credit']);
				$store_list[$key] = $store;
			}
			if (!empty($store_id)){
				$goods_array = $this->getStoreGoodsNum($store_id,$condition);
				if (!empty($goods_array) && is_array($goods_array)){
					foreach ($goods_array as $v){
						foreach ($store_list as $key=>$store){
							$s_id = $store['store_id'];
							if ($s_id == $v['store_id']) {
								$store_list[$key]['goods_count'] = intval($v['count'])>0?intval($v['count']):0;
								break;
							}
						}
					}
				}
			}
		}
		return $store_list;
	}
	
	/**
	 * 获店铺的上架商品数目
	 *
	 * @return array	数组信息
	 */	
	public function getStoreGoodsNum($store_id,$condition_array = array()) {
		$condition_sql = '';
		if($condition_array['add_time_from'] != ''){
			$condition_sql	.= " and goods_add_time >= '".$condition_array['add_time_from']."'";
		}
		if($condition_array['add_time_to'] != ''){
			$condition_sql	.= " and goods_add_time <= '".$condition_array['add_time_to']."'";
		}
		$array	= array();
		$array['field'] = 'count(*) as count,store_id';
		$array['table'] = 'goods';
		$array['where'] = $condition_sql." and goods_show=1 and store_id in ('".implode("','",$store_id)."') ";
		$array['group'] = 'store_id';
		$goods_array	= Db::select($array);
		return $goods_array;
	}
	/**
	 * 获得店铺展示信息
	 * 
	 * $param int $id 店铺ID
	 * $return array()
	 */
	public function getShowStoreInfo($id){
		$array = array();
		/**
		 * 获得店铺信息
		 */
		$store_info = self::shopStore(array(
			'store_id'=>$id
		));
		//得到店铺信用数组
		$store_info['credit_arr'] = getCreditArr($store_info['store_credit']);
		/**
		 * 得到店铺等级信息
		 */
		$store_grade_class = Model('store_grade');
		$store_grade_info = $store_grade_class->getOneGrade($store_info['grade_id']);
		/**
		 * 得到店铺导航信息
		 */
		$store_navigation_partner_class = Model('store_navigation_partner');//导航显示为1，不显示为0
		$store_navigation_list = $store_navigation_partner_class->getNavigationList(array(
			'sn_store_id'=>$store_info['store_id'],
			'sn_if_show'=>1
		));
		/**
		 * 得到店铺商品数量
		 */
		$goods_class = Model('goods');
		$goods_count = $goods_class->countGoods(array(
			'store_id'=>$store_info['store_id'],
			'goods_show'=>1
		));
		/**
		 * 得到商品分类信息
		 */
		$goods_class_class = Model('my_goods_class');
		$goods_class_list = $goods_class_class->getShowTreeList($store_info['store_id']);
		/**
		 * 整理返回数组
		 */
		$array = array(
			'store'=>$store_info,
			'store_grade'=>$store_grade_info,
			'store_navigation'=>$store_navigation_list,
			'goods_count'=>$goods_count,
			'goods_class'=>$goods_class_list
		);
		/**
		 * 返回数组
		 */
		return $array;
	}
	/**
	 * 获取商品销售排行
	 *
	 * @param int $goods_num 显示的商品排行数目
	 * @return array	商品信息
	 */
	public function getOrderGoodsRank($goods_num,$id,$type='') {
		$array		= array();
		$array['table'] = 'goods';
		$array['field']	= 'goods.goods_id,goods.store_id,goods.goods_name,goods.goods_store_price,goods.goods_image,goods.salenum,goods.goods_collect';
		$array['where']	= ' where goods.goods_show = 1 and goods.store_id='.$id;//上架,商品状态(非禁售),商品所在店铺状态(0正常,1关闭),售出数量
		$array['order'] = ' salenum DESC';
		if($type == 'collect'){
			$array['order'] = ' goods_collect desc';
		}else{
			$array['order']	= ' salenum desc';
		}
		$array['limit'] = $goods_num;
		$goods_rank		= Db::select($array);

		return $goods_rank;
	}
}