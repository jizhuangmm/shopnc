<?php
/**
 * 退款
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

class refundControl extends BaseMemberStoreControl {
	public function __construct(){
		parent::__construct();
		Language::read('member_refund');
	}
	/**
	 * 添加
	 *
	 */
	public function addOp(){
		$model_order = Model('order');
		$model_refund	= Model('refund');
		$model_member	= Model('member');
		$order_id	= intval($_GET['order_id']);
		$condition = array();
		$condition['store_id'] = $_SESSION['store_id'];
		$condition['order_id'] = $order_id;
		$order_list = $model_order->getOrderList($condition);
		$order = $order_list[0];
		$order_amount = $order['order_amount'];//订单金额
		$refund_amount = $order['refund_amount'];//已退金额
		$member_info = $model_member->infoMember(array('member_id'=>$_SESSION['member_id']));
		$available_predeposit = $member_info['available_predeposit'];//可用预存款
		/**
		 * 保存信息
		 */
		if (chksubmit()){
			$order_refund = floatval($_POST["order_refund"]);//退款金额
			$refund_array = array();
			$refund_paymentcode = $_POST["refund_paymentcode"];//支付方式
			if (($order_refund > 0) && ($order_amount >= $order_refund)){//还有可退金额时执行
				//修改订单
				$array['order_amount'] = ncPriceFormat($order_amount-$order_refund);
				$array['refund_amount'] = ncPriceFormat($refund_amount+$order_refund);
				$array['refund_state'] = ($order_amount-$order_refund)?1:2;
				if ($refund_paymentcode == 'predeposit'){
					Language::read('home_payment_index');
					$predeposit_model = Model('predeposit');
					if($order['order_state']<40) {//操作冻结预存款
						//减少买家冻结可用金额
						$log_arr = array();
						$log_arr['memberid'] = $order['buyer_id'];
						$log_arr['membername'] = $order['buyer_name'];
						$log_arr['logtype'] = '1';
						$log_arr['price'] = -$order_refund;
						$log_arr['desc'] = Language::get('payment_index_order').$order['order_sn'].Language::get('payment_refund_predepositfreeze_logdesc');
						$state = $predeposit_model->savePredepositLog('order',$log_arr);
					} else {
						//减少卖家可用金额
						$log_arr = array();
						$log_arr['memberid'] = $_SESSION['member_id'];
						$log_arr['membername'] = $_SESSION['member_name'];
						$log_arr['logtype'] = '0';
						$log_arr['price'] = -$order_refund;
						$log_arr['desc'] = Language::get('payment_index_order').$order['order_sn'].Language::get('payment_refund_predeposit_logdesc');
						if($available_predeposit >= $order_refund) $state = $predeposit_model->savePredepositLog('order',$log_arr);
					}
					//增加买家可用金额
					$log_arr = array();
					$log_arr['memberid'] = $order['buyer_id'];
					$log_arr['membername'] = $order['buyer_name'];
					$log_arr['logtype'] = '0';
					$log_arr['price'] = $order_refund;
					$log_arr['desc'] = Language::get('payment_index_order').$order['order_sn'].Language::get('payment_pay_predeposit_logdesc');
					if($state) $state = $predeposit_model->savePredepositLog('order',$log_arr);
					if($state) $state = $model_order->updateOrder($array,$order_id);
				} else {
					$state = $model_order->updateOrder($array,$order_id);
				}
			}
			if($state) {
				$refund_array['order_amount'] = $order_amount;//退款前订单金额
				$refund_array['order_refund'] = ncPriceFormat($order_refund);//退款金额
				
				$refund_array['order_id'] = $order['order_id'];
				$refund_array['order_sn'] = $order['order_sn'];
				$refund_array['seller_id'] = $order['seller_id'];
				$refund_array['store_id'] = $order['store_id'];
				$refund_array['store_name'] = $order['store_name'];
				$refund_array['buyer_id'] = $order['buyer_id'];
				$refund_array['buyer_name'] = $order['buyer_name'];
				
				$refund_array['add_time'] = time();	
				$refund_array['refund_paymentname'] = Language::get('refund_payment_'.$refund_paymentcode);
				$refund_array['refund_paymentcode'] = $refund_paymentcode;
				$refund_array['refund_message'] = $_POST["refund_message"];
				$model_refund->add($refund_array);
				showDialog(Language::get('nc_common_save_succ'),'reload','succ',empty($_GET['inajax']) ?'':'CUR_DIALOG.close();');
			} else {
				showDialog(Language::get('nc_common_save_fail'),'reload',empty($_GET['inajax']) ?'':'CUR_DIALOG.close();');
			}
		}
		Tpl::output('order',$order);
		Tpl::output('available_predeposit',$available_predeposit);
		Tpl::showpage('store_refund_add','null_layout');
	}
	/**
	 * 退款记录列表页
	 *
	 */
	public function indexOp(){
		/**
		 * 实例化退款模型
		 */
		$model_refund	= Model('refund');
		/**
		 * 分页
		 */
		$page	= new Page();
		$page->setEachNum(10);
		$page->setStyle('admin');
		
		/**
		 * 查询退款记录
		 */
		$condition = array();
		$condition['seller_id'] = $_SESSION['member_id'];
		
		if(trim($_GET['keyword']) != ''){
			$condition['type']	= $_GET['type'];
			$condition['keyword']	= $_GET['keyword'];
		}
		if(trim($_GET['add_time_from']) != ''){
			$add_time_from	= strtotime(trim($_GET['add_time_from']));
			if($add_time_from !== false){
				$condition['add_time_from']	= $add_time_from;
			}
		}
		if(trim($_GET['add_time_to']) != ''){
			$add_time_to	= strtotime(trim($_GET['add_time_to']));
			if($add_time_to !== false){
				$condition['add_time_to']	= $add_time_to+86400;
			}
		}
		$refund_list = $model_refund->getList($condition,$page);
		Tpl::output('last_num',count($refund_list)-1);
		Tpl::output('refund_list',$refund_list);
		Tpl::output('show_page',$page->show());
		self::profile_menu('refund','refund');
		Tpl::output('menu_sign','store_refund');
		Tpl::output('menu_sign_url','index.php?act=refund');
		Tpl::output('menu_sign1','store_refund');
		Tpl::showpage('store_refund');
	}
	/**
	 * 退款记录查看页
	 *
	 */
	public function viewOp(){
		/**
		 * 实例化退款模型
		 */
		$model_refund	= Model('refund');
		$condition = array();
		$condition['seller_id'] = $_SESSION['member_id'];
		$condition['log_id'] = intval($_GET["log_id"]);
		$refund_list = $model_refund->getList($condition);
		$refund = $refund_list[0];
		Tpl::output('refund',$refund);
		Tpl::showpage('store_refund_view','null_layout');
	}
	/**
	 * 用户中心右边，小导航
	 *
	 * @param string	$menu_type	导航类型
	 * @param string 	$menu_key	当前导航的menu_key
	 * @return
	 */
	private function profile_menu($menu_type,$menu_key='') {
		$menu_array	= array();
		switch ($menu_type) {
			case 'refund':
				$menu_array	= array(
					1=>array('menu_key'=>'refund','menu_name'=>Language::get('nc_member_path_store_refund'),	'menu_url'=>'index.php?act=refund')
				);
				break;
		}
		Tpl::output('member_menu',$menu_array);
		Tpl::output('menu_key',$menu_key);
	}
}
