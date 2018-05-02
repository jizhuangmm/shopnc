<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class flea_regionControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "region,flea_index" );
				if ( $GLOBALS['setting_config']['flea_isuse'] != 1 )
				{
						showmessage( Language::get( "flea_index_unable" ), "index.php?act=dashboard&op=welcome" );
				}
		}

		public function flea_regionOp( )
		{
				require_once( BasePath.DS."framework".DS."libraries".DS."flea_cache.php" );
				$lang = Language::getlangcontent( );
				$model_area = model( "flea_area" );
				if ( $_POST['form_submit'] == "ok" )
				{
						$new_cache = FALSE;
						if ( is_array( $_POST['new_area_name'] ) )
						{
								foreach ( $GLOBALS['_POST']['new_area_name'] as $k => $v )
								{
										if ( !empty( $v ) )
										{
												$insert_array = array( );
												$insert_array['flea_area_name'] = $v;
												$insert_array['flea_area_parent_id'] = $_POST['flea_area_parent_id'];
												$insert_array['flea_area_sort'] = intval( $_POST['new_area_sort'][$k] );
												$insert_array['flea_area_deep'] = $_POST['child_area_deep'];
												$model_area->add( $insert_array );
												$new_cache = TRUE;
										}
								}
						}
						if ( is_array( $_POST['area_name'] ) )
						{
								foreach ( $GLOBALS['_POST']['area_name'] as $k => $v )
								{
										if ( !empty( $v ) )
										{
												$insert_array = array( );
												$insert_array['flea_area_id'] = $k;
												$insert_array['flea_area_name'] = $v;
												$insert_array['flea_area_sort'] = intval( $_POST['area_sort'][$k] );
												$model_area->update( $insert_array );
												$new_cache = TRUE;
										}
								}
						}
						if ( !empty( $_POST['hidden_del_id'] ) )
						{
								$GLOBALS['_POST']['hidden_del_id'] = trim( $_POST['hidden_del_id'], "|" );
								$del_id = explode( "|", $_POST['hidden_del_id'] );
								$model_area->del( $del_id, $_POST['child_area_deep'] );
								$new_cache = TRUE;
						}
						if ( $new_cache === TRUE )
						{
								flea_Cache::getcache( "flea_area", array(
										"deep" => $_POST['child_area_deep'],
										"new" => "1"
								) );
						}
						showmessage( $lang['region_index_modify_succ'] );
				}
				$province_list = flea_Cache::getcache( "flea_area", array( "deep" => "1" ) );
				$child_area_deep = 1;
				if ( !empty( $_GET['province'] ) )
				{
						$cache_data = flea_Cache::getcache( "flea_area", array( "deep" => "2" ) );
						if ( is_array( $cache_data ) )
						{
								$city_list = array( );
								foreach ( $cache_data as $k => $v )
								{
										if ( $v['flea_area_parent_id'] == intval( $_GET['province'] ) )
										{
												$city_list[] = $v;
										}
								}
						}
						unset( $cache_data );
						$child_area_deep = 2;
						if ( !empty( $_GET['city'] ) )
						{
								$cache_data = flea_Cache::getcache( "flea_area", array( "deep" => "3" ) );
								if ( is_array( $cache_data ) )
								{
										$district_list = array( );
										foreach ( $cache_data as $k => $v )
										{
												if ( $v['flea_area_parent_id'] == intval( $_GET['city'] ) )
												{
														$district_list[] = $v;
												}
										}
								}
								unset( $cache_data );
								$child_area_deep = 3;
								if ( !empty( $_GET['district'] ) )
								{
										$child_area_deep = 4;
								}
						}
				}
				$condition['flea_area_parent_id'] = $_GET['flea_area_parent_id'] ? $_GET['flea_area_parent_id'] : "0";
				$area_list = $model_area->getListArea( $condition, "flea_area_sort asc" );
				Tpl::output( "province", $_GET['province'] ? $_GET['province'] : "" );
				Tpl::output( "city", $_GET['city'] );
				Tpl::output( "district", $_GET['district'] );
				Tpl::output( "province_list", $province_list );
				Tpl::output( "city_list", $city_list );
				Tpl::output( "district_list", $district_list );
				Tpl::output( "flea_area_parent_id", $_GET['flea_area_parent_id'] ? $_GET['flea_area_parent_id'] : "0" );
				Tpl::output( "area_list", $area_list );
				Tpl::output( "child_area_deep", $child_area_deep );
				Tpl::showpage( "flea_region.index" );
		}

		public function flea_region_importOp( )
		{
				require_once( BasePath.DS."framework".DS."libraries".DS."flea_cache.php" );
				$lang = Language::getlangcontent( );
				$model_area = model( "flea_area" );
				if ( $_POST['form_submit'] == "ok" )
				{
						if ( !empty( $_FILES['csv'] ) )
						{
								$fp = @fopen( $_FILES['csv']['tmp_name'], "rb" );
								$area_parent_id_1 = 0;
								while ( !feof( $fp ) )
								{
										$data = fgets( $fp, 4096 );
										switch ( strtoupper( $_POST['charset'] ) )
										{
										case "UTF-8" :
												if ( !( strtoupper( CHARSET ) !== "UTF-8" ) )
												{
														break;
												}
												$data = iconv( "UTF-8", strtoupper( CHARSET ), $data );
												break;
										case "GBK" :
												if ( strtoupper( CHARSET ) !== "GBK" )
												{
														break;
												}
												$data = iconv( "GBK", strtoupper( CHARSET ), $data );
										}
										if ( !empty( $data ) )
										{
												$data = str_replace( "\"", "", $data );
												$tmp_array = array( );
												$tmp_array = explode( ",", $data );
												$tmp_deep = "flea_area_parent_id_".( count( $tmp_array ) - 1 );
												$insert_array = array( );
												$insert_array['flea_area_sort'] = $tmp_array[0];
												$insert_array['flea_area_parent_id'] = $$tmp_deep;
												$insert_array['flea_area_name'] = $tmp_array[count( $tmp_array ) - 1];
												$insert_array['flea_area_deep'] = count( $tmp_array ) - 1;
												$area_id = $model_area->add( $insert_array );
												$tmp = "flea_area_parent_id_".count( $tmp_array );
												$$tmp = $area_id;
										}
								}
								$i = 1;
								for ( ;	$i <= 4;	++$i	)
								{
										$tmp = "flea_area_parent_id_".$i;
										if ( 0 <= intval( $$tmp ) )
										{
												flea_Cache::getcache( "flea_area", array(
														"deep" => intval( $i ),
														"new" => "1"
												) );
										}
								}
								showmessage( $lang['region_import_succ'], "index.php?act=flea_region&op=flea_region" );
						}
						else
						{
								showmessage( $lang['region_import_csv_null'] );
						}
				}
				Tpl::showpage( "flea_region.import" );
		}

		public function flea_import_default_areaOp( )
		{
				$lang = Language::getlangcontent( );
				$file = BasePath."/resource/examples/flea_area.sql";
				if ( !is_file( $file ) )
				{
						showmessage( $lang['region_import_csv_null'] );
				}
				$handle = @fopen( $file, "r" );
				$tmp_sql = "";
				if ( $handle )
				{
						Db::query( "TRUNCATE TABLE `".DBPRE."flea_area`" );
						while ( !feof( $handle ) )
						{
								$buffer = fgets( $handle );
								if ( trim( $buffer ) != "" )
								{
										$tmp_sql .= $buffer;
										if ( !( substr( rtrim( $buffer ), -1 ) == ";" ) && !preg_match( "/^(INSERT)\\s+(INTO)\\s+/i", ltrim( $tmp_sql ) ) && !( substr( rtrim( $buffer ), -2 ) == ");" ) && empty( $tmp_sql ) )
										{
												if ( strtoupper( CHARSET ) == "GBK" )
												{
														$tmp_sql = iconv( "UTF-8", strtoupper( CHARSET ), $tmp_sql );
												}
												$tmp_sql = str_replace( "`shopnc_flea_area`", "`".DBPRE."flea_area`", $tmp_sql );
												Db::query( $tmp_sql );
												unset( $tmp_sql );
										}
								}
						}
						@fclose( $handle );
						require_once( BasePath.DS."framework".DS."libraries".DS."flea_cache.php" );
						$i = 1;
						for ( ;	$i <= 4;	++$i	)
						{
								$tmp = "flea_area_parent_id_".$i;
								if ( 0 <= intval( $$tmp ) )
								{
										flea_Cache::getcache( "flea_area", array(
												"deep" => intval( $i ),
												"new" => "1"
										) );
								}
						}
						showmessage( $lang['region_import_succ'], "index.php?act=flea_region&op=flea_region" );
				}
				else
				{
						showmessage( $lang['region_import_csv_null'] );
				}
		}

}

?>
