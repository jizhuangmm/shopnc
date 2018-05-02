<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class evaluateControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "evaluate" );
				$storeeval_op = array( "evalstore_list" );
				$op = $_GET['op'] ? $_GET['op'] : $_POST['op'];
				if ( in_array( $op, $storeeval_op ) )
				{
						$evalstore_type = array(
								1 => Language::get( "admin_evalstore_type_1" ),
								2 => Language::get( "admin_evalstore_type_2" ),
								3 => Language::get( "admin_evalstore_type_3" )
						);
						Tpl::output( "evalstore_type", $evalstore_type );
				}
				else
				{
						$evaluate_state = array(
								0 => Language::get( "admin_evaluate_state_common" ),
								1 => Language::get( "admin_evaluate_state_hidden" )
						);
						Tpl::output( "evaluate_state", $evaluate_state );
						$evaluate_grade = array(
								"1" => Language::get( "admin_evaluate_grade_good" ),
								"0" => Language::get( "admin_evaluate_grade_normal" ),
								"-1" => Language::get( "admin_evaluate_grade_bad" )
						);
						Tpl::output( "evaluate_grade", $evaluate_grade );
						$evaluate_defaulttext = array(
								"1" => Language::get( "admin_evaluate_defaultcontent_good" ),
								"0" => Language::get( "admin_evaluate_defaultcontent_normal" ),
								"-1" => Language::get( "admin_evaluate_defaultcontent_bad" )
						);
						Tpl::output( "evaluate_defaulttext", $evaluate_defaulttext );
				}
		}

		public function indexOp( )
		{
				$this->evalgoods_listOp( );
		}

		public function evalgoods_listOp( )
		{
				$condition = array( );
				$condition['geval_type'] = "1";
				if ( $_GET['state'] != "" )
				{
						$condition['geval_state'] = "{$_GET['state']}";
				}
				if ( $_GET['grade'] != "" )
				{
						$condition['geval_scores'] = "{$_GET['grade']}";
				}
				if ( $_GET['goods_name'] != "" )
				{
						$condition['geval_goodsname'] = $_GET['goods_name'];
				}
				if ( $_GET['store_name'] != "" )
				{
						$condition['geval_storename'] = $_GET['store_name'];
				}
				if ( $_GET['stime'] != "" )
				{
						$condition['geval_addtime_gt'] = strtotime( $_GET['stime'] );
				}
				if ( $_GET['etime'] != "" )
				{
						$condition['geval_addtime_lt'] = strtotime( $_GET['etime'] );
				}
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$evaluate_model = model( "evaluate" );
				$evalgoods_list = $evaluate_model->getGoodsEvalList( $condition, $page );
				Tpl::output( "show_page", $page->show( ) );
				Tpl::output( "evalgoods_list", $evalgoods_list );
				Tpl::showpage( "evalgoods.index" );
		}

		public function evalgoods_infoOp( )
		{
				$url = "index.php?act=evaluate";
				if ( $_GET['type'] == "seller" )
				{
						$url = "index.php?act=evaluate&op=evalseller_list";
				}
				$id = intval( $_GET['id'] );
				if ( $id <= 0 )
				{
						$id = intval( $_POST['id'] );
				}
				if ( $id <= 0 )
				{
						showmessage( Language::get( "wrong_argument" ), $url, "", "error" );
				}
				$evaluate_model = model( "evaluate" );
				if ( $_POST['form_submit'] == "ok" )
				{
						$evaluation_state = intval( $_POST['state'] );
						$evaluation_state != "0" && $evaluation_state != "1" ? showmessage( Language::get( "wrong_argument" ), "index.php?act=evaluate&op=evalgoods_info&id=".$id, "", "error" ) : "";
						$update_arr = array( );
						$update_arr['geval_state'] = "{$evaluation_state}";
						$update_arr['geval_remark'] = trim( $_POST['admin_remark'] );
						$result = $evaluate_model->editGoodsEval( $update_arr, array(
								"geval_id" => "{$id}"
						) );
						if ( $result )
						{
								showmessage( Language::get( "admin_evaluate_edit_success" ), $url );
						}
						else
						{
								showmessage( Language::get( "admin_evaluate_edit_fail" ), $url, "", "error" );
						}
				}
				else
				{
						$info = $evaluate_model->getGoodsEvalInfo( array(
								"geval_id" => "{$id}"
						) );
						if ( empty( $info ) )
						{
								showmessage( Language::get( "admin_evaluate_recorderror" ), $url, "", "error" );
						}
						Tpl::output( "info", $info );
						Tpl::showpage( "evalgoods.info" );
				}
		}

		public function evalgoods_delOp( )
		{
				$id = intval( $_GET['id'] );
				if ( $id <= 0 )
				{
						showmessage( Language::get( "wrong_argument" ), "", "", "error" );
				}
				$evaluate_model = model( "evaluate" );
				$info = $evaluate_model->getGoodsEvalInfo( array(
						"geval_id" => "{$id}"
				) );
				if ( empty( $info ) )
				{
						showmessage( Language::get( "admin_evaluate_recorderror" ), "", "", "error" );
				}
				$result = $evaluate_model->delGoodsEval( array(
						"geval_id_del" => "{$id}"
				) );
				if ( $result )
				{
						showmessage( Language::get( "admin_evaluate_drop_success" ), "", "", "error" );
				}
				else
				{
						showmessage( Language::get( "admin_evaluate_drop_fail" ), "", "", "error" );
				}
		}

		public function delexplainOp( )
		{
				$id = intval( $_GET['id'] );
				if ( $id <= 0 )
				{
						echo 0;
						exit( );
				}
				$evaluate_model = model( "evaluate" );
				$result = $evaluate_model->editGoodsEval( array(
						"geval_explain" => ""
				), array(
						"geval_id" => "{$id}"
				) );
				if ( $result )
				{
						echo 1;
						exit( );
				}
				echo 0;
				exit( );
		}

		public function evalstore_listOp( )
		{
				$condition = array( );
				if ( $_GET['store_name'] != "" )
				{
						$condition['seval_storename'] = "{$_GET['store_name']}";
				}
				if ( $_GET['from_name'] != "" )
				{
						$condition['seval_membername'] = "{$_GET['from_name']}";
				}
				if ( $_GET['grade'] != "" )
				{
						$condition['seval_scores'] = "{$_GET['grade']}";
				}
				if ( $_GET['stime'] != "" )
				{
						$condition['seval_addtime_gt'] = strtotime( $_GET['stime'] );
				}
				if ( $_GET['etime'] != "" )
				{
						$condition['seval_addtime_lt'] = strtotime( $_GET['etime'] );
				}
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$evaluate_model = model( "evaluate" );
				$evalstore_list = $evaluate_model->getStoreEvalList( $condition, $page );
				Tpl::output( "show_page", $page->show( ) );
				Tpl::output( "evalstore_list", $evalstore_list );
				Tpl::showpage( "evalstore.index" );
		}

		public function evalstore_delOp( )
		{
				$id = intval( $_GET['id'] );
				if ( $id <= 0 )
				{
						showmessage( Language::get( "wrong_argument" ), "index.php?act=evaluate", "", "error" );
				}
				$evaluate_model = model( "evaluate" );
				$info = $evaluate_model->getStoreEvalInfo( array(
						"seval_id" => "{$id}"
				) );
				if ( empty( $info ) )
				{
						showmessage( Language::get( "admin_evaluate_recorderror" ), "", "", "error" );
				}
				$result = $evaluate_model->delStoreEval( array(
						"seval_id_del" => "{$id}"
				) );
				if ( $result )
				{
						showmessage( Language::get( "admin_evaluate_drop_success" ), "", "", "error" );
				}
				else
				{
						showmessage( Language::get( "admin_evaluate_drop_fail" ), "", "", "error" );
				}
		}

		public function evalseller_listOp( )
		{
				$condition = array( );
				$condition['geval_type'] = "2";
				if ( $_GET['state'] != "" )
				{
						$condition['geval_state'] = "{$_GET['state']}";
				}
				if ( $_GET['grade'] != "" )
				{
						$condition['geval_scores'] = "{$_GET['grade']}";
				}
				if ( $_GET['goods_name'] != "" )
				{
						$condition['geval_goodsname'] = $_GET['goods_name'];
				}
				if ( $_GET['to_name'] != "" )
				{
						$condition['geval_tomembername'] = $_GET['to_name'];
				}
				if ( $_GET['stime'] != "" )
				{
						$condition['geval_addtime_gt'] = strtotime( $_GET['stime'] );
				}
				if ( $_GET['etime'] != "" )
				{
						$condition['geval_addtime_lt'] = strtotime( $_GET['etime'] );
				}
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$evaluate_model = model( "evaluate" );
				$evalgoods_list = $evaluate_model->getGoodsEvalList( $condition, $page );
				Tpl::output( "show_page", $page->show( ) );
				Tpl::output( "evalgoods_list", $evalgoods_list );
				Tpl::showpage( "evalseller.index" );
		}

}

?>
