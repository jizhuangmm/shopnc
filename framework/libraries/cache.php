<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

final class Cache
{

		public static function getCache( $type, $param = "" )
		{
				$lang = Language::getlangcontent( );
				$type = strtoupper( $type[0] ).strtolower( substr( $type, 1 ) );
				$function = "get".$type."Cache";
				if ( !method_exists( Cache, $function ) )
				{
						$error = $lang['please_check_your_cache_type'];
						throw_exception( $error );
				}
				$result = self::$function( $param );
				return $result;
		}

		private static function getSettingCache( $param )
		{
				$lang = Language::getlangcontent( );
				$cache_file = BasePath.DS."cache".DS."setting.php";
				if ( file_exists( $cache_file ) && time( ) - FILE_EXPIRE <= filemtime( $cache_file ) )
				{
						require( $cache_file );
						return $data;
				}
				$param = array( "table" => "setting" );
				$result = Db::select( $param );
				$tmp .= "<?php \r\n";
				$tmp .= "defined('InShopNC') or exit('Access Invalid!'); \r\n";
				$tmp .= "\$data = array(\r\n";
				if ( is_array( $result ) )
				{
						foreach ( $result as $k => $v )
						{
								$tmp .= "'".$v['name']."' => '".( $v['name'] == "statistics_code" || $v['name'] == "qq_appcode" || $v['name'] == "creditrule" ? $v['value'] : addslashes( $v['value'] ) )."', \r\n";
						}
				}
				$tmp .= ");";
				$fp = @fopen( $cache_file, "wb+" );
				if ( fwrite( $fp, $tmp ) === FALSE )
				{
						$error = $lang['please_check_your_system_chmod'];
						throw_exception( $error );
				}
				@fclose( $fp );
				require( $cache_file );
				return $data;
		}

		private static function getGoods_class_infoCache( $param )
		{
				$lang = Language::getlangcontent( );
				if ( ncMemcache::isconnected( ) )
				{
						$data = ncMemcache::get( $param['name'] );
						if ( $data === FALSE )
						{
								$data = self::makegoods_class_infocache( $param );
								ncMemcache::set( $param['name'], $data );
								return $data;
						}
				}
				else
				{
						$cache_file = BasePath.DS."cache".DS."category".DS.$param['name'].".php";
						if ( file_exists( $cache_file ) && time( ) - FILE_EXPIRE <= filemtime( $cache_file ) && empty( $param['new'] ) )
						{
								require( $cache_file );
								return $data;
						}
						$data = self::makegoods_class_infocache( $param );
						if ( c( "class_generation_cache" ) == "1" )
						{
								self::write_cache_file( $data, $cache_file );
						}
				}
				return $data;
		}

		private static function makeGoods_class_infoCache( $param )
		{
				$model_goods_class = model( "goods_class" );
				$model_type = model( "type" );
				$model_goods = model( "goods" );
				$count = 0;
				$class_array = getcache( "goodsClass" );
				$data = $class_array[$param['gc_id']];
				if ( !empty( $data ) )
				{
						$show_goods_class = array( );
						$show_goods_class['gc_id'] = $data['gc_id'];
						$show_goods_class['gc_name'] = $data['gc_name'];
						if ( $data['child'] != "" )
						{
								$class_child_array = explode( ",", $data['child'] );
								foreach ( $class_child_array as $k => $v )
								{
										$show_goods_class['child'][$k]['gc_id'] = $class_array[$v]['gc_id'];
										$show_goods_class['child'][$k]['gc_name'] = $class_array[$v]['gc_name'];
								}
						}
						$data['goods_class_array'] = $show_goods_class;
						$gc_id_str = rtrim( $data['gc_id'].",".$data['child'].",".$data['childchild'], "," );
						$data['gc_id_str'] = $gc_id_str;
						$count = $model_goods_class->getGoodsCountById( $gc_id_str );
						$data['count'] = $count;
						$model_goods = model( "goods" );
						$need_param = array( );
						$need_param['gc_id_in'] = $gc_id_str;
						$need_param['goods_show'] = "1";
						$need_param['goods_state'] = "0";
						$need_param['goods_store_state'] = "0";
						if ( 0 < intval( $param['area_id'] ) )
						{
								$need_param['province_id'] = $param['area_id'];
						}
						$goods_list = $model_goods->getGoodsForCache( $need_param, "goods_id" );
						$goods_id_array = array( );
						if ( is_array( $goods_list ) && !empty( $goods_list ) )
						{
								foreach ( $goods_list as $val )
								{
										$goods_id_array[] = $val['goods_id'];
								}
						}
						if ( $goods_id_array != "" )
						{
								$goods_id_str = implode( ",", $goods_id_array );
						}
						else
						{
								$goods_id_str = "";
						}
						if ( $data['type_id'] != "0" )
						{
								if ( !empty( $goods_id_array ) || is_array( $goods_id_array ) )
								{
										$goods_id_where_array = array( );
										$g_sign = "true";
										if ( isset( $param['spec_id'], $param['spec_id'] ) )
										{
												foreach ( $param['spec_id'] as $v )
												{
														$related_param = array( );
														$related_param['in_gc_id'] = $gc_id_str;
														$related_param['sp_value_id'] = $v;
														if ( $g_sign == "false" && !empty( $goods_id_where_array['param'] ) )
														{
																$related_param['in_goods_id'] = implode( ",", $goods_id_where_array['param'] );
														}
														if ( $g_sign == "true" || !empty( $goods_id_where_array['param'] ) )
														{
																$goods_list = $model_type->typeRelatedList( "goods_spec_index", $related_param, "goods_id" );
																if ( is_array( $goods_list ) && !empty( $goods_list ) )
																{
																		foreach ( $goods_list as $val )
																		{
																				if ( !in_array( $val['goods_id'], $goods_id_where_array ) )
																				{
																						if ( in_array( $val['goods_id'], $goods_id_array ) )
																						{
																								$goods_id_where_array['spec'][] = $val['goods_id'];
																						}
																				}
																		}
																}
														}
														if ( $g_sign == "true" )
														{
																$g_sign = "false";
																$goods_id_where_array['param'] = $goods_id_where_array['spec'];
														}
														else if ( isset( $goods_id_where_array['param'] ) )
														{
																$goods_id_where_array['param'] = array_intersect( $goods_id_where_array['param'], ( array )$goods_id_where_array['spec'] );
														}
														unset( $goods_id_where_array['spec'] );
												}
										}
										if ( isset( $param['brand_id'], $param['brand_id'] ) )
										{
												foreach ( $param['brand_id'] as $v )
												{
														$related_param = array( );
														$related_param['in_gc_id'] = $gc_id_str;
														$related_param['brand_id'] = $v;
														if ( $g_sign == "false" && !empty( $goods_id_where_array['param'] ) )
														{
																$related_param['in_goods_id'] = implode( ",", $goods_id_where_array['param'] );
														}
														if ( $g_sign == "true" || !empty( $goods_id_where_array['param'] ) )
														{
																$goods_list = $model_type->typeRelatedList( "goods", $related_param, "goods_id" );
																if ( is_array( $goods_list ) && !empty( $goods_list ) )
																{
																		foreach ( $goods_list as $val )
																		{
																				if ( !in_array( $val['goods_id'], $goods_id_where_array ) )
																				{
																						if ( in_array( $val['goods_id'], $goods_id_array ) )
																						{
																								$goods_id_where_array['brand'][] = $val['goods_id'];
																						}
																				}
																		}
																}
														}
														if ( $g_sign == "true" )
														{
																$g_sign = "false";
																$goods_id_where_array['param'] = $goods_id_where_array['brand'];
														}
														else if ( isset( $goods_id_where_array['param'] ) )
														{
																$goods_id_where_array['param'] = array_intersect( $goods_id_where_array['param'], ( array )$goods_id_where_array['brand'] );
														}
														unset( $goods_id_where_array['brand'] );
												}
										}
										if ( isset( $param['attr_id'], $param['attr_id'] ) )
										{
												foreach ( $param['attr_id'] as $v )
												{
														$related_param = array( );
														$related_param['in_gc_id'] = $gc_id_str;
														$related_param['attr_value_id'] = $v;
														if ( $g_sign == "false" && !empty( $goods_id_where_array['param'] ) )
														{
																$related_param['in_goods_id'] = implode( ",", $goods_id_where_array['param'] );
														}
														if ( $g_sign == "true" || !empty( $goods_id_where_array['param'] ) )
														{
																$goods_list = $model_type->typeRelatedList( "goods_attr_index", $related_param, "goods_id" );
																if ( is_array( $goods_list ) && !empty( $goods_list ) )
																{
																		foreach ( $goods_list as $val )
																		{
																				if ( !in_array( $val['goods_id'], $goods_id_where_array ) )
																				{
																						if ( in_array( $val['goods_id'], $goods_id_array ) )
																						{
																								$goods_id_where_array['attr'][] = $val['goods_id'];
																						}
																				}
																		}
																}
														}
														if ( $g_sign == "true" )
														{
																$g_sign = "false";
																$goods_id_where_array['param'] = $goods_id_where_array['attr'];
														}
														else if ( isset( $goods_id_where_array['param'] ) )
														{
																$goods_id_where_array['param'] = array_intersect( $goods_id_where_array['param'], ( array )$goods_id_where_array['attr'] );
														}
														unset( $goods_id_where_array['attr'] );
												}
										}
								}
								$related_param = array( );
								$related_param['in_gc_id'] = $gc_id_str;
								if ( $g_sign == "false" && !empty( $goods_id_where_array['param'] ) )
								{
										$related_param['in_goods_id'] = implode( ",", $goods_id_where_array['param'] );
								}
								$goods_sign = "true";
								if ( $g_sign == "false" && empty( $goods_id_where_array['param'] ) )
								{
										$spec_count_array = array( );
								}
								else
								{
										$spec_count = $model_type->typeRelatedGroupList( $related_param, "spec" );
										$spec_count_array = array( );
										if ( is_array( $spec_count ) && !empty( $spec_count ) )
										{
												foreach ( $spec_count as $val )
												{
														if ( !empty( $goods_id_array ) )
														{
																if ( !is_array( $goods_id_array ) && !in_array( $val['goods_id'], $goods_id_array ) )
																{
																		$spec_count_array[$val['sp_value_id']][] = $val['goods_id'];
																}
														}
												}
										}
								}
								unset( $spec_count );
								$spec_list = $model_type->typeRelatedJoinListForCache( array(
										"goods_class.type_id" => $data['type_id'],
										"in_gc_id" => $gc_id_str
								), "spec", "spec.sp_id, spec.sp_name, spec.sp_format, spec_value.sp_value_id, spec_value.sp_value_name, spec_value.sp_value_image" );
								$spec_array = array( );
								if ( is_array( $spec_list ) && !empty( $spec_list ) )
								{
										foreach ( $spec_list as $val )
										{
												$spec_array[$val['sp_id']]['name'] = $val['sp_name'];
												$spec_array[$val['sp_id']]['value'][$val['sp_value_id']]['name'] = $val['sp_value_name'];
												if ( $val['sp_format'] == "image" )
												{
														$spec_array[$val['sp_id']]['value'][$val['sp_value_id']]['image'] = $val['sp_value_image'];
												}
												if ( isset( $spec_count_array[$val['sp_value_id']] ) )
												{
														$spec_array[$val['sp_id']]['value'][$val['sp_value_id']]['count'] = count( $spec_count_array[$val['sp_value_id']] );
														if ( !isset( $param['spec_id'] ) && !in_array( $val['sp_value_id'], $param['spec_id'] ) )
														{
																if ( $goods_sign == "true" )
																{
																		$goods_sign = "false";
																		$goods_id_exact_array = array( );
																		$goods_id_exact_array = $spec_count_array[$val['sp_value_id']];
																}
																else
																{
																		$goods_id_exact_array = array_intersect( $goods_id_exact_array, ( array )$spec_count_array[$val['sp_value_id']] );
																}
														}
												}
												else
												{
														$spec_array[$val['sp_id']]['value'][$val['sp_value_id']]['count'] = "0";
														if ( !isset( $param['spec_id'] ) && !in_array( $val['sp_value_id'], $param['spec_id'] ) )
														{
																$goods_sign = "false";
																$goods_id_exact_array = array( );
														}
												}
										}
								}
								unset( $spec_list );
								unset( $spec_count_array );
								$data['spec_array'] = $spec_array;
								unset( $spec_array );
								if ( $g_sign == "false" && empty( $goods_id_where_array['param'] ) )
								{
										$brand_count_array = array( );
								}
								else
								{
										$brand_count = $model_type->typeRelatedGroupList( $related_param, "brand" );
										$brand_count_array = array( );
										if ( is_array( $brand_count ) && !empty( $brand_count ) )
										{
												foreach ( $brand_count as $val )
												{
														if ( !empty( $goods_id_array ) )
														{
																if ( !is_array( $goods_id_array ) && !in_array( $val['goods_id'], $goods_id_array ) )
																{
																		$brand_count_array[$val['brand_id']][] = $val['goods_id'];
																}
														}
												}
										}
								}
								unset( $brand_count );
								$brand_list = $model_type->typeRelatedJoinListForCache( array(
										"goods_class.type_id" => $data['type_id'],
										"brand_apply" => "1",
										"in_gc_id" => $gc_id_str
								), "brand", "brand.brand_id, brand.brand_name, brand.brand_pic" );
								$brand_array = array( );
								if ( is_array( $brand_list ) && !empty( $brand_list ) )
								{
										foreach ( $brand_list as $val )
										{
												$brand_array[$val['brand_id']]['name'] = $val['brand_name'];
												$brand_array[$val['brand_id']]['image'] = $val['brand_pic'];
												if ( isset( $brand_count_array[$val['brand_id']] ) )
												{
														$brand_array[$val['brand_id']]['count'] = count( $brand_count_array[$val['brand_id']] );
														if ( !isset( $param['brand_id'] ) && !in_array( $val['brand_id'], $param['brand_id'] ) )
														{
																if ( $goods_sign == "true" )
																{
																		$goods_sign = "false";
																		$goods_id_exact_array = array( );
																		$goods_id_exact_array = $brand_count_array[$val['brand_id']];
																}
																else
																{
																		$goods_id_exact_array = array_intersect( $goods_id_exact_array, ( array )$brand_count_array[$val['brand_id']] );
																}
														}
												}
												else
												{
														$brand_array[$val['brand_id']]['count'] = "0";
														if ( !isset( $param['brand_id'] ) && !in_array( $val['brand_id'], $param['brand_id'] ) )
														{
																$goods_sign = "false";
																$goods_id_exact_array = array( );
														}
												}
										}
								}
								unset( $brand_list );
								unset( $brand_count_array );
								$data['brand_array'] = $brand_array;
								unset( $brand_array );
								if ( $g_sign == "false" && empty( $goods_id_where_array['param'] ) )
								{
										$attr_count_array = array( );
								}
								else
								{
										$attr_count = $model_type->typeRelatedGroupList( $related_param, "attr" );
										$attr_count_array = array( );
										if ( is_array( $attr_count ) && !empty( $attr_count ) )
										{
												foreach ( $attr_count as $val )
												{
														if ( !empty( $goods_id_array ) )
														{
																if ( !is_array( $goods_id_array ) && !in_array( $val['goods_id'], $goods_id_array ) )
																{
																		$attr_count_array[$val['attr_value_id']][] = $val['goods_id'];
																}
														}
												}
										}
								}
								unset( $attr_count );
								$attr_list = $model_type->typeRelatedJoinListForCache( array(
										"goods_class.type_id" => $data['type_id'],
										"attr_show" => "1",
										"in_gc_id" => $gc_id_str
								), "attr", "attribute.attr_id, attribute.attr_name, attribute_value.attr_value_id, attribute_value.attr_value_name" );
								$attr_array = array( );
								if ( is_array( $attr_list ) && !empty( $attr_list ) )
								{
										foreach ( $attr_list as $val )
										{
												$attr_array[$val['attr_id']]['name'] = $val['attr_name'];
												$attr_array[$val['attr_id']]['value'][$val['attr_value_id']]['name'] = $val['attr_value_name'];
												if ( isset( $attr_count_array[$val['attr_value_id']] ) )
												{
														$attr_array[$val['attr_id']]['value'][$val['attr_value_id']]['count'] = count( $attr_count_array[$val['attr_value_id']] );
														if ( !isset( $param['attr_id'] ) && !in_array( $val['attr_value_id'], $param['attr_id'] ) )
														{
																if ( $goods_sign == "true" )
																{
																		$goods_sign = "false";
																		$goods_id_exact_array = array( );
																		$goods_id_exact_array = $attr_count_array[$val['attr_value_id']];
																}
																else
																{
																		$goods_id_exact_array = array_intersect( $goods_id_exact_array, ( array )$attr_count_array[$val['attr_value_id']] );
																}
														}
												}
												else
												{
														$attr_array[$val['attr_id']]['value'][$val['attr_value_id']]['count'] = "0";
														if ( !isset( $param['attr_id'] ) && !in_array( $val['attr_value_id'], $param['attr_id'] ) )
														{
																$goods_sign = "false";
																$goods_id_exact_array = array( );
														}
												}
										}
								}
								unset( $attr_list );
								unset( $attr_count_array );
								$data['attr_array'] = $attr_array;
								unset( $attr_array );
						}
						if ( isset( $goods_id_exact_array ) )
						{
								$data['goods_id_str'] = implode( ",", array_unique( $goods_id_exact_array ) );
								unset( $goods_id_exact_array );
								return $data;
						}
						$data['goods_id_str'] = $goods_id_str;
						unset( $goods_id_array );
						return $data;
				}
				return FALSE;
		}

		public static function makeallcache( $type )
		{
				$lang = Language::getlangcontent( );
				$time = time( );
				switch ( $type )
				{
				case "setting" :
						$cache_file_set = BasePath.DS."cache".DS."setting.php";
						$param = array( "table" => "setting" );
						$result = Db::select( $param );
						$tmp .= "<?php \r\n";
						$tmp .= "defined('InShopNC') or exit('Access Invalid!'); \r\n";
						$tmp .= "\$data = array(\r\n";
						if ( is_array( $result ) )
						{
								foreach ( $result as $k => $v )
								{
										$tmp .= "'".$v['name']."' => '".( $v['name'] == "statistics_code" || $v['name'] == "qq_appcode" || $v['name'] == "creditrule" ? $v['value'] : addslashes( $v['value'] ) )."', \r\n";
								}
						}
						$tmp .= ");";
						$fp = @fopen( $cache_file_set, "wb+" );
						if ( fwrite( $fp, $tmp ) === FALSE )
						{
								$error = $lang['please_check_your_system_chmod'];
								throw_exception( $error );
						}
						@fclose( $fp );
						break;
				case "goodsclass" :
						$cache_file_goods = BasePath.DS."cache".DS."goodsClass.php";
						$param = array( );
						$param['table'] = "goods_class";
						$param['where'] = "gc_show=1";
						$param['order'] = "gc_parent_id asc, gc_sort asc";
						$result = Db::select( $param );
						$child = array( );
						$childchild = array( );
						$keywords = array( );
						$result_copy = $result;
						foreach ( $result as $k => $v )
						{
								if ( $v['gc_keywords'] != "" || $v['gc_description'] != "" )
								{
										if ( $v['gc_keywords'] != "" )
										{
												$keywords[$v['gc_id']]['key'] = $v['gc_keywords'];
										}
										if ( $v['gc_description'] != "" )
										{
												$keywords[$v['gc_id']]['desc'] = $v['gc_description'];
										}
								}
								unset( $result_copy[$k] );
								$tmp = array( );
								foreach ( $result_copy as $key => $value )
								{
										if ( $value['gc_parent_id'] == $v['gc_id'] )
										{
												$tmp[] = $value['gc_id'];
										}
								}
								$child[$v['gc_id']] = $tmp;
								$tmp = array( );
								self::getallchildid( $result_copy, $v['gc_id'], $tmp );
								$childchild[$v['gc_id']] = $tmp;
								if ( is_array( $childchild[$v['gc_id']] ) )
								{
										foreach ( $childchild[$v['gc_id']] as $key => $value )
										{
												if ( in_array( $value, $child[$v['gc_id']] ) )
												{
														unset( in_array( $value, $child[$v['gc_id']] )[$key] );
												}
										}
								}
								unset( $tmp );
						}
						$tmp = "";
						$tmp .= "<?php \r\n";
						$tmp .= "defined('InShopNC') or exit('Access Invalid!'); \r\n";
						$tmp .= "\$data = array(\r\n";
						if ( is_array( $result ) )
						{
								foreach ( $result as $k => $v )
								{
										$tmp .= $v['gc_id']."=>array(";
										$tmp .= "'gc_id'=>'".$v['gc_id']."',";
										$tmp .= "'gc_name'=>'".addslashes( trim( $v['gc_name'] ) )."',";
										$tmp .= "'store_id'=>'".$v['store_id']."',";
										$tmp .= "'type_id'=>'".$v['type_id']."',";
										$tmp .= "'gc_parent_id'=>'".$v['gc_parent_id']."',";
										$tmp .= "'gc_sort'=>'".$v['gc_sort']."',";
										$tmp .= "'gc_show'=>'".$v['gc_show']."',";
										$tmp .= "'gc_index_show'=>'".$v['gc_index_show']."',";
										$tmp .= "'child'=>'".implode( ",", $child[$v['gc_id']] )."',";
										$tmp .= "'childchild'=>'".implode( ",", $childchild[$v['gc_id']] )."',";
										$tmp .= "),\r\n";
								}
						}
						$tmp .= ");";
						$fp = @fopen( $cache_file_goods, "wb+" );
						if ( fwrite( $fp, $tmp ) === FALSE )
						{
								$error = $lang['please_check_your_system_chmod_goods'];
								throw_exception( $error );
						}
						@fclose( $fp );
						$tmp = "";
						$tmp .= "<?php \r\n";
						$tmp .= "defined('InShopNC') or exit('Access Invalid!'); \r\n";
						$tmp .= "\$data = ".var_export( $keywords, TRUE )."\n?>";
						@file_put_contents( BasePath."/cache/goodsClassKeywords.php", @strip_whitespace( $tmp ) );
						break;
				case "adv" :
						delcachefile( "adv" );
						$adv = model( "adv" );
						$adv_info = $adv->getList( "" );
						foreach ( $adv_info as $k => $v )
						{
								if ( !( $time < $v['adv_end_date'] ) && !( $v['is_allow'] == "1" ) )
								{
										Cache::makeadvcache( $v['adv_id'] );
								}
						}
						$ap_info = $adv->getApList( );
						foreach ( $ap_info as $k => $v )
						{
								Cache::makeapcache( $v['ap_id'] );
						}
						break;
				case "class_tag" :
						$cache_file = BasePath.DS."cache".DS."class_tag".DS."tag.php";
						$model_class_tag = model( "goods_class_tag" );
						$result = $model_class_tag->getTagList( "" );
						$tmp .= "<?php \r\n";
						$tmp .= "defined('InShopNC') or exit('Access Invalid!'); \r\n";
						$tmp .= "\$data = array(\r\n";
						if ( is_array( $result ) )
						{
								foreach ( $result as $k => $v )
								{
										$tmp .= "array(\r\n";
										$tmp .= "'gc_tag_id'=>'".$v['gc_tag_id']."',";
										$tmp .= "'gc_tag_name'=>'".addslashes( $v['gc_tag_name'] )."',";
										$tmp .= "'gc_tag_value'=>'".addslashes( $v['gc_tag_value'] )."',";
										$tmp .= "'gc_id'=>'".$v['gc_id']."',";
										$tmp .= "'type_id'=>'".$v['type_id']."',";
										$tmp .= "),\r\n";
								}
						}
						$tmp .= ");";
						$fp = @fopen( $cache_file, "wb+" );
						if ( fwrite( $fp, $tmp ) === FALSE )
						{
								$error = $lang['please_check_your_system_chmod_goods'];
								throw_exception( $error );
						}
						@fclose( $fp );
						require( $cache_file );
						return $data;
				case "nav" :
						$cache_file = BasePath.DS."cache".DS."nav.php";
						delcachefile( "nav.php" );
						$nav_list = model( "navigation" )->getNavigationList( array( "order" => "navigation.nav_sort" ), NULL );
						$tmp .= "<?php \r\n";
						$tmp .= "defined('InShopNC') or exit('Access Invalid!'); \r\n";
						$tmp .= "\$data = array(\r\n";
						if ( is_array( $nav_list ) )
						{
								foreach ( $nav_list as $k => $v )
								{
										$tmp .= "array(\r\n";
										$tmp .= "'nav_id'=>'".$v['nav_id']."',";
										$tmp .= "'nav_type'=>'".$v['nav_type']."',";
										$tmp .= "'nav_title'=>'".addslashes( $v['nav_title'] )."',";
										$tmp .= "'nav_url'=>'".$v['nav_url']."',";
										$tmp .= "'nav_location'=>'".$v['nav_location']."',";
										$tmp .= "'nav_new_open'=>'".$v['nav_new_open']."',";
										$tmp .= "'nav_sort'=>'".$v['nav_sort']."',";
										$tmp .= "'item_id'=>'".$v['item_id']."',";
										$tmp .= "),\r\n";
								}
						}
						$tmp .= ");";
						$fp = @fopen( $cache_file, "wb+" );
						if ( fwrite( $fp, $tmp ) === FALSE )
						{
								$error = $lang['please_check_your_system_chmod_goods'];
								throw_exception( $error );
						}
						@fclose( $fp );
						require( $cache_file );
						return $data;
				case "link" :
						$cache_file = BasePath.DS."cache".DS."link.php";
						$model_flink = model( "link" );
						$flink = $model_flink->getLinkList( array( "order" => "link_sort" ) );
						if ( !empty( $flink ) || is_array( $flink ) )
						{
								$show_flink = array( );
								foreach ( $flink as $val )
								{
										if ( $val['link_pic'] != "" )
										{
												$val['link_pic'] = ATTACH_LINK.DS.$val['link_pic'];
										}
										$show_flink[] = $val;
								}
						}
						$tmp .= "<?php \r\n";
						$tmp .= "defined('InShopNC') or exit('Access Invalid!'); \r\n";
						$tmp .= "\$data = array(\r\n";
						if ( is_array( $show_flink ) )
						{
								foreach ( $show_flink as $k => $v )
								{
										$tmp .= "array(\r\n";
										$tmp .= "'link_id'=>'".$v['link_id']."',";
										$tmp .= "'link_title'=>'".addslashes( $v['link_title'] )."',";
										$tmp .= "'link_url'=>'".$v['link_url']."',";
										$tmp .= "'link_pic'=>'".$v['link_pic']."',";
										$tmp .= "'link_sort'=>'".$v['link_sort']."',";
										$tmp .= "),\r\n";
								}
						}
						$tmp .= ");";
						$fp = @fopen( $cache_file, "wb+" );
						if ( fwrite( $fp, $tmp ) === FALSE )
						{
								$error = $lang['please_check_your_system_chmod_goods'];
								throw_exception( $error );
						}
						@fclose( $fp );
						require( $cache_file );
						return $data;
				}
		}

		private function getAllChildID( &$goodsclass, $gc_id, &$child )
		{
				foreach ( $goodsclass as $k => $v )
				{
						if ( $v['gc_parent_id'] == $gc_id )
						{
								$child[] = $v['gc_id'];
								self::getallchildid( $goodsclass, $v['gc_id'], $child );
						}
				}
		}

		public static function makeAdvCache( $adv_id )
		{
				$lang = Language::getlangcontent( );
				$adv = model( "adv" );
				$condition['adv_id'] = $adv_id;
				$adv_info = $adv->getList( $condition );
				$adv_info = $adv_info['0'];
				$tmp .= "<?php \r\n";
				$tmp .= "defined('InShopNC') or exit('Access Invalid!'); \r\n";
				foreach ( $adv_info as $k => $v )
				{
						if ( !is_numeric( $k ) )
						{
								$content = addslashes( $v );
								$content = str_replace( "\$", "\\\$", $content );
								$tmp .= "\$".$k." = \"".$content."\"; \r\n";
						}
				}
				$cache_file = BasePath.DS."cache".DS."adv".DS."adv_".$adv_id.".cache.php";
				$fp = @fopen( $cache_file, "wb+" );
				if ( fwrite( $fp, $tmp ) === FALSE )
				{
						$error = $lang['please_check_your_system_chmod_ad'];
						throw_exception( $error );
				}
				@fclose( $fp );
				return TRUE;
		}

		public static function makeApCache( $ap_id )
		{
				$lang = Language::getlangcontent( );
				$adv = model( "adv" );
				$condition['ap_id'] = $ap_id;
				$adv_info = $adv->getList( $condition, "", "", "slide_sort, adv_id desc" );
				$ap_info = $adv->getApList( $condition );
				$ap_info = $ap_info['0'];
				$tmp .= "<?php \r\n";
				$tmp .= "defined('InShopNC') or exit('Access Invalid!'); \r\n";
				$tmp .= "\$data = array(\r\n";
				if ( !empty( $adv_info ) )
				{
						foreach ( $adv_info as $k => $v )
						{
								$tmp .= "array('".$v['adv_id']."','".$v['is_allow']."','".$v['adv_start_date']."','".$v['adv_end_date']."'), \r\n";
						}
				}
				$tmp .= ");\r\n";
				foreach ( $ap_info as $k => $v )
				{
						if ( !is_numeric( $k ) )
						{
								$tmp .= "\$".$k." = '".$v."'; \r\n";
						}
				}
				$cache_file = BasePath.DS."cache".DS."adv".DS."ap_".$ap_id.".cache.php";
				$fp = @fopen( $cache_file, "wb+" );
				if ( fwrite( $fp, $tmp ) === FALSE )
				{
						$error = $lang['please_check_your_system_chmod_adv'];
						throw_exception( $error );
				}
				@fclose( $fp );
				return TRUE;
		}

		public static function deladcache( $id, $type )
		{
				$filename = BasePath.DS."cache".DS."adv".DS.$type."_".$id.".cache.php";
				if ( !file_exists( $filename ) )
				{
						return FALSE;
				}
				if ( !@unlink( $filename ) )
				{
						return FALSE;
				}
				return TRUE;
		}

		public static function get_groupbuy_area_cache( )
		{
				$cache_file = BasePath.DS."cache".DS."groupbuy".DS."area.php";
				if ( !file_exists( $cache_file ) )
				{
						self::update_groupbuy_area_cache( );
				}
				require( $cache_file );
				return $data;
		}

		public static function update_groupbuy_area_cache( )
		{
				$cache_file = BasePath.DS."cache".DS."groupbuy".DS."area.php";
				$model = model( "groupbuy_area" );
				$param = array( );
				$param['order'] = "area_sort asc";
				$data = $model->getTreeList( $param, "", 2 );
				self::write_cache_file( $data, $cache_file );
		}

		public static function get_groupbuy_class_cache( )
		{
				$cache_file = BasePath.DS."cache".DS."groupbuy".DS."class.php";
				if ( !file_exists( $cache_file ) )
				{
						self::update_groupbuy_class_cache( );
				}
				require( $cache_file );
				return $data;
		}

		public static function update_groupbuy_class_cache( )
		{
				$cache_file = BasePath.DS."cache".DS."groupbuy".DS."class.php";
				$model_groupbuy_class = model( "groupbuy_class" );
				$param = array( );
				$param['order'] = "sort asc";
				$data = $model_groupbuy_class->getTreeList( $param );
				self::write_cache_file( $data, $cache_file );
		}

		public static function get_groupbuy_price_range_cache( )
		{
				$cache_file = BasePath.DS."cache".DS."groupbuy".DS."price_range.php";
				if ( !file_exists( $cache_file ) )
				{
						self::update_groupbuy_price_range_cache( );
				}
				require( $cache_file );
				return $data;
		}

		public static function update_groupbuy_price_range_cache( )
		{
				$cache_file = BasePath.DS."cache".DS."groupbuy".DS."price_range.php";
				$model = model( "groupbuy_price_range" );
				$param = array( );
				$param['order'] = "range_start asc";
				$data = $model->getList( $param );
				self::write_cache_file( $data, $cache_file );
		}

		private static function getClass_tagCache( $param )
		{
				$cache_file = BasePath.DS."cache".DS."class_tag".DS."tag.php";
				if ( file_exists( $cache_file ) && time( ) - FILE_EXPIRE <= filemtime( $cache_file ) && empty( $param['new'] ) )
				{
						require( $cache_file );
						return $data;
				}
				$dir = dirname( $cache_file );
				if ( !is_dir( $dir ) )
				{
						mkdir( $dir );
				}
				$model_class_tag = model( "goods_class_tag" );
				$result = $model_class_tag->getTagList( "" );
				$tmp .= "<?php \r\n";
				$tmp .= "defined('InShopNC') or exit('Access Invalid!'); \r\n";
				$tmp .= "\$data = array(\r\n";
				if ( is_array( $result ) )
				{
						foreach ( $result as $k => $v )
						{
								$tmp .= "array(\r\n";
								$tmp .= "'gc_tag_id'=>'".$v['gc_tag_id']."',";
								$tmp .= "'gc_tag_name'=>'".addslashes( trim( $v['gc_tag_name'] ) )."',";
								$tmp .= "'gc_tag_value'=>'".addslashes( trim( $v['gc_tag_value'] ) )."',";
								$tmp .= "'gc_id'=>'".$v['gc_id']."',";
								$tmp .= "'type_id'=>'".$v['type_id']."',";
								$tmp .= "),\r\n";
						}
				}
				$tmp .= ");";
				$fp = @fopen( $cache_file, "wb+" );
				if ( fwrite( $fp, $tmp ) === FALSE )
				{
						$error = $lang['please_check_your_system_chmod_goods'];
						throw_exception( $error );
				}
				@fclose( $fp );
				require( $cache_file );
				return $data;
		}

		private static function write_cache_file( $data, $cache_file )
		{
				if ( file_exists( $cache_file ) )
				{
						@unlink( $cache_file );
				}
				$dir = dirname( $cache_file );
				if ( !is_dir( $dir ) )
				{
						mkdir( $dir );
				}
				$tmp .= "<?php ";
				$tmp .= "defined('InShopNC') or exit('Access Invalid!'); ";
				$tmp .= "\$data = ";
				$tmp .= var_export( $data, TRUE );
				$tmp .= ";";
				$fp = @fopen( $cache_file, "wb+" );
				if ( fwrite( $fp, $tmp ) === FALSE )
				{
						$error = $lang['please_check_your_system_chmod'];
				}
				@fclose( $fp );
				if ( $error != "" )
				{
						throw_exception( $error );
				}
		}

}

if ( !defined( "InShopNC" ) )
{
		exit( "Access Invalid!" );
}
?>
