<?php
/**
 * 前台control父类,店铺control父类,会员control父类
 *
 *
 * @copyright  Copyright (c) 2007-2012 ShopNC Inc. (http://www.shopnc.net)
 * @license    http://www.shopnc.net
 * @link       http://www.shopnc.net
 * @since      File available since Release v1.1
 */
defined('InShopNC') or exit('Access Invalid!');

/********************************** 前台control父类 **********************************************/

class BaseHomeControl{
	/**
	 * 构造函数
	 */
	public function __construct(){
		/**
		 * 短消息检查
		 */		
		$this->checkMessage();
		/**
		 * 读取通用、布局的语言包
		 */
		Language::read('common,home_layout');
		/**
		 * 设置模板文件夹路径
		 */
		Tpl::setDir('home');
		/**
		 * 获取导航
		 */
		Tpl::output('nav_list',($nav = F('nav'))? $nav :H('nav',true,'file'));

		/**
		 * 设置布局文件内容
		 */
		Tpl::setLayout('home_layout');
		/**
		 * 热门搜索
		 */
		Tpl::output('hot_search',@explode(',',C('hot_search')));
		/**
		 * 商品分类
		 */
		Tpl::output('show_goods_class',($nav = F('goods_class'))? $nav :H('goods_class',true,'file'));
		/**
		 * 转码
		 */
		if ($_GET['column'] && strtoupper(CHARSET) == 'GBK'){
			$_GET = Language::getGBK($_GET);
		}
		/**
		 * 系统状态检查
		 */
		if(!C('site_status')) halt(C('closed_reason'));
	}
	/**
	 * 系统通知发送函数
	 * 
	 * @param int $receiver_id 接受人编号
	 * @param string $tpl_code 模板标识码
	 * @param array $param 内容数组
	 * @param bool $flag 是否遵从系统设置
	 * @return bool
	 */
	public function send_notice($receiver_id,$tpl_code,$param,$flag = true){
		/**
		 * 获取通知内容模板
		 */
		$mail_tpl_model	= Model('mail_templates');
		$mail_tpl	= $mail_tpl_model->getOneTemplates($tpl_code);
		if(empty($mail_tpl) || $mail_tpl['mail_switch'] == 0)return false;
		/**
		 * 获取接收人信息
		 */
		$member_model	= Model('member');
		$receiver	= $member_model->infoMember(array('member_id'=>$receiver_id));
		if(empty($receiver))return false;

		/**
		 * 为通知模板的主题与内容中变量赋值
		 */
		$subject	= ncReplaceText($mail_tpl['title'],$param);
		$message	= ncReplaceText($mail_tpl['content'],$param);
		/**
		 * 根据模板里面确定的通知类型采用对应模式发送通知
		 */
		$result	= false;
		switch($mail_tpl['type']){
			case '0':
				$email	= new Email();
				$result	= true;
				if($flag and $GLOBALS['setting_config']['email_enabled'] == '1' or $flag == false){
					$result	= $email->send_sys_email($receiver['member_email'],$subject,$message);
				}
				break;
			case '1':
				$model_message = Model('message');
				$param = array(
				'member_id'=>$receiver_id,
				'to_member_name'=>$receiver['member_name'],
				'msg_content'=>$message,
				'message_type'=>1//表示系统消息
				);
				$result = $model_message->saveMessage($param);
				break;
		}
		return $result;
	}
	/**
	 * 检查短消息数量
	 *
	 * @param 
	 * @return 
	 */
	private function checkMessage() {
		if($_SESSION['member_id'] == '') return ;
		//判断cookie是否存在
		$cookie_name = 'msgnewnum'.$_SESSION['member_id'];
		if (cookie($cookie_name) != null && intval(cookie($cookie_name)) >=0){
			$countnum = intval(cookie($cookie_name));
		}else {
			$message_model = Model('message');
			$countnum = $message_model->countNewMessage($_SESSION['member_id']);
			setNcCookie($cookie_name,"$countnum",2*3600);//保存1天
		}
		Tpl::output('message_num',$countnum);
	}
}

/********************************** 会员control父类 **********************************************/

class BaseMemberControl{
	public function __construct(){
		/**
		 * 系统状态检查
		 */	
		if($GLOBALS['setting_config']['site_status'] == '0') {
			showMessage($GLOBALS['setting_config']['closed_reason']);
			exit();
		}
		/**
		 * 读取语言包
		 */
		Language::read('common,member_layout');
		/**
		 * 转码
		 */
		if ($_GET['column'] && strtoupper(CHARSET) == 'GBK'){
			$_GET = Language::getGBK($_GET);
		}
		/**
		 * 会员验证
		 */
		$this->checkLogin();
		/**
		 * 短消息检查
		 */		
		$this->checkMessage();
		/**
		 * 设置模板文件夹路径
		 */
		Tpl::setDir('member');
		/**
		 * 设置布局文件内容
		 */
		Tpl::setLayout('member_layout');
		Tpl::output('header_menu_sign','setting');//默认选中顶部“设置”菜单
		/**
		 * 获取导航
		 */
		Tpl::output('nav_list',($nav = F('nav')) ? $nav : H('nav',true,'file'));
	}
	/**
	 * 系统通知发送函数
	 * 
	 * @param int $receiver_id 接受人编号
	 * @param string $tpl_code 模板标识码
	 * @param array $param 内容数组
	 * @param bool $flag 是否遵从系统设置
	 * @return bool
	 */
	public function send_notice($receiver_id,$tpl_code,$param,$flag = true){
		/**
		 * 获取通知内容模板
		 */
		$mail_tpl_model	= Model('mail_templates');
		$mail_tpl	= $mail_tpl_model->getOneTemplates($tpl_code);
		if(empty($mail_tpl) || $mail_tpl['mail_switch'] == 0)return false;
		
		/**
		 * 获取接收人信息
		 */
		$member_model	= Model('member');
		$receiver	= $member_model->infoMember(array('member_id'=>$receiver_id));
		if(empty($receiver))return false;
		
		/**
		 * 为通知模板的主题与内容中变量赋值
		 */
		$subject	= ncReplaceText($mail_tpl['title'],$param);
		$message	= ncReplaceText($mail_tpl['content'],$param);
		/**
		 * 根据模板里面确定的通知类型采用对应模式发送通知
		 */
		$result	= false;
		switch($mail_tpl['type']){
			case '0':
				$email	= new Email();
				$result	= true;
				if($flag and $GLOBALS['setting_config']['email_enabled'] == '1' or $flag == false){
					$result	= $email->send_sys_email($receiver['member_email'],$subject,$message);
				}
				break;
			case '1':
				$model_message = Model('message');
				$param = array(
					'member_id'=>$receiver_id,
					'to_member_name'=>$receiver['member_name'],
					'msg_content'=>$message,
					'message_type'=>1//表示系统消息
				);
				$result = $model_message->saveMessage($param);
				break;
		}
		return $result;
	}
	/**
	 * 验证会员是否登录
	 *
	 * @param 
	 * @return 
	 */
	private function checkLogin(){
		if ($_SESSION['is_login'] !== '1'){
			if (trim($_GET['op']) == 'favoritesgoods' || trim($_GET['op']) == 'favoritesstore'){
				$lang = Language::getLangContent('UTF-8');
				echo json_encode(array('done'=>false,'msg'=>$lang['no_login']));
				die;
			}
			$ref_url = request_uri();
			if ($_GET['inajax']){
				showDialog('','','js',"login_dialog();",200);
			}else {
				@header("location: index.php?act=login&ref_url=".urlencode($ref_url));
			}
			exit;
		}
	}
	/**
	 * 检查短消息数量
	 *
	 * @param 
	 * @return 
	 */
	private function checkMessage() {
		if($_SESSION['member_id'] == '') return ;
		//判断cookie是否存在
		$cookie_name = 'msgnewnum'.$_SESSION['member_id'];
		if (cookie($cookie_name) != null && intval(cookie($cookie_name)) >=0){
			$countnum = intval(cookie($cookie_name));
		}else {
			$message_model = Model('message');
			$countnum = $message_model->countNewMessage($_SESSION['member_id']);
			setNcCookie($cookie_name,"$countnum",2*3600);//保存2小时
		}
		Tpl::output('message_num',$countnum);
	}
	/**
	 * 检查店铺名称是否存在
	 *
	 * @param 
	 * @return 
	 */
	public function checknameinner() {
		/**
		 * 实例化卖家模型
		 */
		$model_store	= Model('store');

		$store_name	= trim($_GET['store_name']);
		$store_info	= $model_store->shopStore(array('store_name'=>$store_name));
		if($store_info['store_name'] != ''&&$store_info['member_id'] != $_SESSION['member_id']) {			
			return false;
		} else {			
			return true;
		}
	}
	/**
	 * 买家的左侧上部的头像和订单数量
	 *
	 * @param 
	 * @return 
	 */
	public function get_member_info() {		
		//生成缓存的键值
		$hash_key = $_SESSION['member_id'];
		//写入缓存的数据
		$cachekey_arr = array('member_name','store_id','member_avatar','member_qq','member_email','member_msn','member_ww','member_goldnum','member_points',
							'available_predeposit','member_snsvisitnum','credit_arr','order_nopay','order_noreceiving','order_noeval','fan_count');
		//先查找$hash_key缓存
		if ($_cache = rcache($hash_key,'member')){
			foreach ($_cache as $k=>$v){
				$member_info[$k] = $v;
			}
		} else {
			$model = Model('my_order');
			$member_info = $model->table('member')->where(array('member_id'=>$_SESSION['member_id']))->find();
			$member_info['credit_arr'] = getCreditArr(intval($member_info['member_credit']));//信用度
			$member_info['order_nopay'] = $model->myOrderCount(array('buyer_id'=>"{$_SESSION['member_id']}",'order_state' => 'order_pay'));//待付款
			$member_info['order_noreceiving'] = $model->myOrderCount(array('buyer_id'=>"{$_SESSION['member_id']}",'order_state' => 'order_shipping'));//待确认收货
			$member_info['order_noeval'] = $model->myOrderCount(array('buyer_id'=>"{$_SESSION['member_id']}",'order_evalbuyer_able' => '1'));//待评价
			//粉丝数
			/*$fan_count = $model->table('sns_friend')->where(array('friend_tomid'=>$this->member_id))->count();
			$fan_count = $fan_count > 0?$fan_count:0;
			$member_info['fan_count'] = $fan_count;*/
			wcache($hash_key,$member_info,'member');
		}
		Tpl::output('member_info',$member_info);
		Tpl::output('header_menu_sign','snsindex');//默认选中顶部“买家首页”菜单
	}
}

/********************************** 会员(卖家)control父类 **********************************************/

class BaseMemberStoreControl extends BaseMemberControl{
	public function __construct(){
		parent::__construct();
		if (!$_SESSION['store_id']){
			@header("Location: index.php?act=member_snsindex&op=nostoreindex");
			exit;
		}

		$model_store	= Model('store');
		$store_info		= $model_store->shopStore(array('store_id'=>$_SESSION['store_id']));
		if ($store_info['store_center_quicklink'] != ''){
			$quick_link = @unserialize($store_info['store_center_quicklink']);
			Tpl::output('quick_link',$quick_link);
		}

		/**
		 * 设置布局文件内容
		 */
		Tpl::setLayout('member_store_layout');

		//更新店铺缓存
		setNcCookie('cron_store',encrypt($store_info['store_id'],MD5_KEY));
	}
}

/********************************** 店铺 control父类 **********************************************/

class BaseStoreControl{
	/**
	 * 构造函数
	 */
	public function __construct(){
		/**
		 * 读取布局的语言包文件
		 */
		Language::read('common,store_layout');
		/**
		 * 系统状态检查
		 */	
		if(C('site_status') == '0') {
			showMessage(C('closed_reason'));
			exit();
		}
		/**
		 * 设置模板文件夹路径
		 */
		Tpl::setDir('store');
		/**
		 * 获取导航
		 */
		Tpl::output('nav_list',($g = F('nav')) ? $g : H('nav',true,'file'));
		/**
		 * 设置布局文件内容
		 */
		Tpl::setLayout('store_layout');
		/**
		 * 短消息检查
		 */
		$this->checkMessage();
	}
	/**
	 * 系统通知发送函数
	 * 
	 * @param int $receiver_id 接受人编号
	 * @param string $tpl_code 模板标识码
	 * @param array $param 内容数组
	 * @param bool $flag 是否遵从系统设置
	 * @return bool
	 */
	public function send_notice($receiver_id,$tpl_code,$param,$flag = true){
		/**
		 * 获取通知内容模板
		 */
		$mail_tpl_model	= Model('mail_templates');
		$mail_tpl	= $mail_tpl_model->getOneTemplates($tpl_code);
		if(empty($mail_tpl) || $mail_tpl['mail_switch'] == 0)return false;
		
		/**
		 * 获取接收人信息
		 */
		$member_model	= Model('member');
		$receiver	= $member_model->infoMember(array('member_id'=>$receiver_id));
		if(empty($receiver))return false;
		
		/**
		 * 为通知模板的主题与内容中变量赋值
		 */
		$subject	= ncReplaceText($mail_tpl['title'],$param);
		$message	= ncReplaceText($mail_tpl['content'],$param);
		/**
		 * 根据模板里面确定的通知类型采用对应模式发送通知
		 */
		$result	= false;
		switch($mail_tpl['type']){
			case '0':
				$email	= new Email();
				$result	= true;
				if($flag and $GLOBALS['setting_config']['email_enabled'] == '1' or $flag == false){
					$result	= $email->send_sys_email($receiver['member_email'],$subject,$message);
				}
				break;
			case '1':
				$model_message = Model('message');
				$param = array(
					'member_id'=>$receiver_id,
					'to_member_name'=>$receiver['member_name'],
					'msg_content'=>$message,
					'message_type'=>1//表示系统消息
				);				
				$result = $model_message->saveMessage($param);
				break;
		}
		return $result;
	}
	/**
	 * 检查短消息数量
	 *
	 * @param 
	 * @return 
	 */
	private function checkMessage() {
		if($_SESSION['member_id'] == '') return ;
		//判断cookie是否存在
		$cookie_name = 'msgnewnum'.$_SESSION['member_id'];
		if (cookie($cookie_name) != null && intval(cookie($cookie_name)) >=0){
			$countnum = intval(cookie($cookie_name));
		}else {
			$message_model = Model('message');
			$countnum = $message_model->countNewMessage($_SESSION['member_id']);
			setNcCookie($cookie_name,"$countnum",2*3600);//2小时
		}
		Tpl::output('message_num',$countnum);
	}
	/**
	 * 检查店铺开启状态
	 *
	 * @param int $store_id 店铺编号
	 * @param string $msg 警告信息
	 */
	protected function checkStoreState($store_id,$msg = ''){
		$lang	= Language::getLangContent();
		$model_store	= Model('store');
		$store_info	= $model_store->shopStore(array('store_id'=>$store_id));
		if($store_info['store_state'] == '0' || intval($store_info['store_audit']) === 0 || (intval($store_info['store_end_time']) != 0 && $store_info['store_end_time'] <= time())){
			if($msg != ''){
				showMessage($msg, '', '', 'error');
			}else{
				showMessage($lang['nc_store_close'], '', '', 'error');
			}
		}
		return $store_info;
	}
	/**
	 * 得到店铺展示信息
	 * @param array $store_info 店铺详细
	 * @param int $id 店铺编号
	 * 两个参数任选一个传递
	 */
	public function show_store_info($store_info = array(),$id = 0){
		Language::read('member_map_index');
		//得到店铺展示信息
		$model = Model('store');
		if ($id > 0){
			//查询店铺详细信息
			$store_info = $model->table('store')->where(array('store_id'=>$id))->find();
		}
		//生成缓存的键值
		$hash_key = $store_info['store_id'];
		//写入缓存的数据
		$cachekey_arr = array('store_id','store_name','store_auth','name_auth','grade_id','member_id','member_name','area_id','store_address',
						'store_tel','store_time','store_logo','store_label','store_qq','store_ww','store_msn','store_domain','store_credit','praise_rate',
						'store_desccredit','store_desccredit_rate','store_servicecredit','store_servicecredit_rate','store_deliverycredit',
						'store_deliverycredit_rate','store_code','store_collect','map','city','goods_count','grade_name','grade_goodslimit','nav','hotsales',
						'hotcollect','sgclass');

		//先查找$hash_key缓存
		if ($_cache = rcache($hash_key,'store')){
			foreach ($_cache as $k=>$v){
				$store_info[$k] = $v;
			}
			//得到商品信息
			$hotcollect_gid = array();
			if (!empty($store_info['hotcollect'])){
				$hotcollect_gid = explode(',',$store_info['hotcollect']);
			}
			$hotsales_gid = array();
			if (!empty($store_info['hotsales'])){
				$hotsales_gid = explode(',',$store_info['hotsales']);
			}
			$gid_str = empty($gid_str)?'':trim($gid_str,',');
			$goodslist = $model->table('goods')->field('goods_id,store_id,goods_name,goods_store_price,goods_image,salenum,goods_collect')->where(array('store_id'=>$store_info['store_id'],'goods_id'=>array('in',array_merge($hotsales_gid,$hotcollect_gid)),'goods_show'=>1))->order('salenum DESC')->select();
			$hot_sales = array();
			$hot_collect = array();
			if (!empty($goodslist)){
				foreach ($goodslist as $k=>$v){
					if (in_array($v['goods_id'],$hotsales_gid)){
						$hot_sales[] = $v;
					}
					if (in_array($v['goods_id'],$hotcollect_gid)){
						$hot_collect[] = $v;
					}
				}
			}
			$goods_class_list = empty($store_info['sgclass'])?array():unserialize($store_info['sgclass']);
		}else{
			//得到店铺等级信息
			$store_grade_info = $model->table('store_grade')->where(array('sg_id'=>$store_info['grade_id']))->find();
			$store_info['grade_name'] = $store_grade_info['sg_name'];
			$store_info['grade_goodslimit'] = $store_grade_info['sg_goods_limit'];
			//得到店铺商品数量
			$goods_count = $model->table('goods')->where(array('store_id'=>$store_info['store_id'],'goods_show'=>'1'))->count();
			$store_info['goods_count'] = $goods_count;
			//处理地区信息
			$area_array	= array();
			$area_array = explode("\t",$store_info["area_info"]);
			$map_city	= Language::get('member_map_city');
			$city	= '';
			if(strpos($area_array[0], $map_city) !== false){
				$city	= $area_array[0];
			}else {
				$city	= $area_array[1];
			}
			$store_info['city'] = $city;
			//查询店铺地图信息
			$map_info = $model->table('map')->where(array('store_id'=>$store_info['store_id'],'map_api'=>'baidu'))->order('map_id desc')->find();
			$store_info['map'] = array('point_lng'=>$map_info['point_lng'],'point_lat'=>$map_info['point_lat']);
			//动态评价
			$store_info['store_desccredit_rate'] = @round($store_info['store_desccredit']/5*100,2);
			$store_info['store_servicecredit_rate'] = @round($store_info['store_servicecredit']/5*100,2);
			$store_info['store_deliverycredit_rate'] = @round($store_info['store_deliverycredit']/5*100,2);
			
			//得到店铺导航信息
			$store_navigation_list = $model->table('store_navigation')->where(array('sn_store_id'=>$store_info['store_id'],'sn_if_show'=>1))->order('sn_sort')->select();
			if (!empty($store_navigation_list)){
				foreach ($store_navigation_list as $k=>$v){
					unset($v['sn_content']);
					$store_info['nav'][] = $v;
				}
			}
			//商品销售排行
			$hot_sales	= $model->getOrderGoodsRank(5,$store_info['store_id']);
			$store_info['hotsales'] = '';
			if (!empty($hot_sales)){
				$gid_arr = array();
				foreach ($hot_sales as $k=>$v){
					$gid_arr[] = $v['goods_id'];
				}
				$store_info['hotsales'] = empty($gid_arr)?'':implode(',',$gid_arr);
			}
			//商品收藏排行
			$hot_collect	= $model->getOrderGoodsRank(5,$store_info['store_id'],'collect');
			$store_info['hotcollect'] = '';
			if (!empty($hot_collect)){
				$gid_arr = array();
				foreach ($hot_collect as $k=>$v){
					$gid_arr[] = $v['goods_id'];
				}
				$store_info['hotcollect'] = empty($gid_arr)?'':implode(',',$gid_arr);
			}
			//得到商品分类信息
			$goodsclass_model = Model('my_goods_class');
			$goods_class_list = $goodsclass_model->getShowTreeList($store_info['store_id']);
			$store_info['sgclass'] = empty($goods_class_list)?'':serialize($goods_class_list);
			if (!empty($store_info)){
				foreach ($store_info as $k=>$v){
					if (in_array($k,$cachekey_arr)){
						$data[$k] = $v;
					}
				}
			}
			//缓存店铺信息
			wcache($hash_key,$data,'store');
		}
		//得到店铺信用数组
		$store_info['credit_arr'] = getCreditArr($store_info['store_credit']);
		//输出信息
		Tpl::output('store_info',$store_info);
		Tpl::output('hot_sales',$hot_sales);
		Tpl::output('hot_collect',$hot_collect);
		Tpl::output('goods_class_list',$goods_class_list);
		//页面title
		Tpl::output('page_title',$store_info['store_name']);
		return $store_info;
	}
	/**
	 * 查询店铺动态评价
	 * @param int $store_id 店铺编号
	 */
	public function show_storeeval($store_id){
		if ($store_id<=0){
			return array();
		}
		$evaluate_model = Model("evaluate");
		$storestat_list = $evaluate_model->getOneStoreEvalStat($store_id);
		for ($i=1;$i<4;$i++){
			$storestat_list[$i]['evalstat_fivenum_rate'] = @round($storestat_list[$i]['evalstat_fivenum']/$storestat_list[$i]['evalstat_timesnum']*100,2);
			$storestat_list[$i]['evalstat_fournum_rate'] = @round($storestat_list[$i]['evalstat_fournum']/$storestat_list[$i]['evalstat_timesnum']*100,2);
			$storestat_list[$i]['evalstat_threenum_rate'] = @round($storestat_list[$i]['evalstat_threenum']/$storestat_list[$i]['evalstat_timesnum']*100,2);
			$storestat_list[$i]['evalstat_twonum_rate'] = @round($storestat_list[$i]['evalstat_twonum']/$storestat_list[$i]['evalstat_timesnum']*100,2);
			$storestat_list[$i]['evalstat_onenum_rate'] = @round($storestat_list[$i]['evalstat_onenum']/$storestat_list[$i]['evalstat_timesnum']*100,2);
			$storestat_list[$i]['evalstat_average'] = $storestat_list[$i]['evalstat_average']>0?$storestat_list[$i]['evalstat_average']:0;
		}
		Tpl::output('storestat_list',$storestat_list);
	}
}