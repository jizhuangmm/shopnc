<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class snstraceControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "snstrace" );
		}

		public function tracelistOp( )
		{
				$tracelog_model = model( "sns_tracelog" );
				$condition = array( );
				if ( $_GET['search_uname'] != "" )
				{
						$condition['trace_membernamelike'] = trim( $_GET['search_uname'] );
				}
				if ( $_GET['search_content'] != "" )
				{
						$condition['trace_contentortitle'] = trim( $_GET['search_content'] );
				}
				if ( $_GET['search_state'] != "" )
				{
						$condition['trace_state'] = "{$_GET['search_state']}";
				}
				if ( $_GET['search_stime'] != "" )
				{
						$condition['stime'] = strtotime( $_GET['search_stime'] );
				}
				if ( $_GET['search_etime'] != "" )
				{
						$condition['etime'] = strtotime( $_GET['search_etime'] );
				}
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$tracelist = $tracelog_model->getTracelogList( $condition, $page );
				if ( !empty( $tracelist ) )
				{
						foreach ( $tracelist as $k => $v )
						{
								if ( !empty( $v['trace_title'] ) )
								{
										$v['trace_title'] = str_replace( "%siteurl%", SiteUrl.DS, $v['trace_title'] );
								}
								if ( !empty( $v['trace_content'] ) )
								{
										$v['trace_content'] = str_replace( "%siteurl%", SiteUrl.DS, $v['trace_content'] );
										$v['trace_content'] = str_replace( Language::get( "admin_snstrace_collectgoods" ), "", $v['trace_content'] );
										$v['trace_content'] = str_replace( Language::get( "admin_snstrace_collectstore" ), "", $v['trace_content'] );
								}
								$tracelist[$k] = $v;
						}
				}
				Tpl::output( "tracelist", $tracelist );
				Tpl::output( "show_page", $page->show( ) );
				Tpl::showpage( "snstrace.index" );
		}

		public function tracedelOp( )
		{
				$tid = $_POST['t_id'];
				if ( empty( $tid ) )
				{
						showmessage( Language::get( "admin_snstrace_pleasechoose_del" ), "index.php?act=snstrace&op=tracelist", "", "error" );
				}
				$tid_str = implode( "','", $tid );
				$tracelog_model = model( "sns_tracelog" );
				$result = $tracelog_model->delTracelog( array(
						"trace_id_in" => $tid_str
				) );
				if ( $result )
				{
						$tracelog_list = $tracelog_model->getTracelogList( array(
								"traceid_in" => "{$tid_str}"
						) );
						if ( !empty( $tracelog_list ) )
						{
								foreach ( $tracelog_list as $k => $v )
								{
										unset( $tid[array_search( $v['trace_id'], $tid )] );
								}
						}
						$tid_str = implode( "','", $tid );
						$comment_model = model( "sns_comment" );
						$condition = array( );
						$condition['comment_originalid_in'] = $tid_str;
						$condition['comment_originaltype'] = "0";
						$comment_model->delComment( $condition );
						$tracelog_model->tracelogEdit( array(
								"trace_originalstate" => "1"
						), array(
								"trace_originalid_in" => "{$tid_str}"
						) );
						showmessage( Language::get( "nc_common_del_succ" ), "index.php?act=snstrace&op=tracelist", "", "succ" );
				}
				else
				{
						showmessage( Language::get( "nc_common_del_fail" ), "index.php?act=snstrace&op=tracelist", "", "error" );
				}
		}

		public function traceeditOp( )
		{
				$tid = $_POST['t_id'];
				if ( empty( $tid ) )
				{
						showmessage( Language::get( "admin_snstrace_pleasechoose_edit" ), "index.php?act=snstrace&op=tracelist", "", "error" );
				}
				$tid_str = implode( "','", $tid );
				$type = $_GET['type'];
				$tracelog_model = model( "sns_tracelog" );
				$update_arr = array( );
				if ( $type == "hide" )
				{
						$update_arr['trace_state'] = "1";
				}
				else
				{
						$update_arr['trace_state'] = "0";
				}
				$result = $tracelog_model->tracelogEdit( $update_arr, array(
						"traceid_in" => "{$tid_str}"
				) );
				unset( $update_arr );
				if ( $result )
				{
						$condition = array( );
						$condition['traceid_in'] = "{$tid_str}";
						if ( $type == "hide" )
						{
								$condition['trace_state'] = "1";
						}
						else
						{
								$condition['trace_state'] = "0";
						}
						$tracelog_list = $tracelog_model->getTracelogList( $condition );
						unset( $condition );
						$tid_new = array( );
						if ( !empty( $tracelog_list ) )
						{
								foreach ( $tracelog_list as $k => $v )
								{
										$tid_new[] = $v['trace_id'];
								}
						}
						$tid_str = implode( "','", $tid_new );
						$update_arr = array( );
						if ( $type == "hide" )
						{
								$update_arr['trace_originalstate'] = "1";
						}
						else
						{
								$update_arr['trace_originalstate'] = "0";
						}
						$tracelog_model->tracelogEdit( $update_arr, array(
								"trace_originalid_in" => "{$tid_str}"
						) );
						showmessage( Language::get( "nc_common_op_succ" ), "index.php?act=snstrace&op=tracelist", "", "succ" );
				}
				else
				{
						showmessage( Language::get( "nc_common_op_fail" ), "index.php?act=snstrace&op=tracelist", "", "error" );
				}
		}

		public function commentlistOp( )
		{
				$comment_model = model( "sns_comment" );
				$condition = array( );
				if ( $_GET['search_uname'] != "" )
				{
						$condition['comment_membername_like'] = trim( $_GET['search_uname'] );
				}
				if ( $_GET['search_content'] != "" )
				{
						$condition['comment_content_like'] = trim( $_GET['search_content'] );
				}
				if ( $_GET['search_state'] != "" )
				{
						$condition['comment_state'] = "{$_GET['search_state']}";
				}
				if ( $_GET['search_stime'] != "" )
				{
						$condition['stime'] = strtotime( $_GET['search_stime'] );
				}
				if ( $_GET['search_etime'] != "" )
				{
						$condition['etime'] = strtotime( $_GET['search_etime'] );
				}
				if ( $_GET['tid'] != "" )
				{
						$condition['comment_originalid'] = "{$_GET['tid']}";
						$condition['comment_originaltype'] = "0";
				}
				$page = new Page( );
				$page->setEachNum( 20 );
				$page->setStyle( "admin" );
				$commentlist = $comment_model->getCommentList( $condition, $page );
				Tpl::output( "commentlist", $commentlist );
				Tpl::output( "show_page", $page->show( ) );
				Tpl::showpage( "snscomment.index" );
		}

		public function commentdelOp( )
		{
				$cid = $_POST['c_id'];
				if ( empty( $cid ) )
				{
						showmessage( Language::get( "admin_snstrace_pleasechoose_del" ), "index.php?act=snstrace&op=commentlist", "", "error" );
				}
				$cid_str = implode( "','", $cid );
				$comment_model = model( "sns_comment" );
				$result = $comment_model->delComment( array(
						"comment_id_in" => "{$cid_str}"
				) );
				if ( $result )
				{
						showmessage( Language::get( "nc_common_del_succ" ), "index.php?act=snstrace&op=commentlist", "", "succ" );
				}
				else
				{
						showmessage( Language::get( "nc_common_del_fail" ), "index.php?act=snstrace&op=commentlist", "", "error" );
				}
		}

		public function commenteditOp( )
		{
				$cid = $_POST['c_id'];
				if ( empty( $cid ) )
				{
						showmessage( Language::get( "admin_snstrace_pleasechoose_edit" ), "index.php?act=snstrace&op=commentlist", "", "error" );
				}
				$cid_str = implode( "','", $cid );
				$type = $_GET['type'];
				$comment_model = model( "sns_comment" );
				$update_arr = array( );
				if ( $type == "hide" )
				{
						$update_arr['comment_state'] = "1";
				}
				else
				{
						$update_arr['comment_state'] = "0";
				}
				$result = $comment_model->commentEdit( $update_arr, array(
						"comment_id_in" => "{$cid_str}"
				) );
				unset( $update_arr );
				if ( $result )
				{
						showmessage( Language::get( "nc_common_op_succ" ), "index.php?act=snstrace&op=commentlist", "", "succ" );
				}
				else
				{
						showmessage( Language::get( "nc_common_op_fail" ), "index.php?act=snstrace&op=commentlist", "", "error" );
				}
		}

}

?>
