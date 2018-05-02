<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Services_JSON
{

		public static $use = NULL;

		private function __construct( )
		{
		}

		public function utf162utf8( $utf16 )
		{
				if ( function_exists( "mb_convert_encoding" ) )
				{
						return mb_convert_encoding( $utf16, "UTF-8", "UTF-16" );
				}
				$bytes = ord( $utf16[0] ) << 8 | ord( $utf16[1] );
				switch ( TRUE )
				{
						return chr( 127 & $bytes );
						return chr( 192 | $bytes >> 6 & 31 ).chr( 128 | $bytes & 63 );
						return chr( 224 | $bytes >> 12 & 15 ).chr( 128 | $bytes >> 6 & 63 ).chr( 128 | $bytes & 63 );
				}
				return "";
		}

		public function utf82utf16( $utf8 )
		{
				if ( function_exists( "mb_convert_encoding" ) )
				{
						return mb_convert_encoding( $utf8, "UTF-16", "UTF-8" );
				}
				switch ( strlen( $utf8 ) )
				{
				case 1 :
						return $utf8;
				case 2 :
						return chr( 7 & ord( $utf8[0] ) >> 2 ).chr( 192 & ord( $utf8[0] ) << 6 | 63 & ord( $utf8[1] ) );
				case 3 :
						return chr( 240 & ord( $utf8[0] ) << 4 | 15 & ord( $utf8[1] ) >> 2 ).chr( 192 & ord( $utf8[1] ) << 6 | 127 & ord( $utf8[2] ) );
				}
				return "";
		}

		public function encode( $var )
		{
				switch ( gettype( $var ) )
				{
				case "boolean" :
						return $var ? "true" : "false";
				case "NULL" :
						return "null";
				case "integer" :
						return ( integer )$var;
				case "double" :
				case "float" :
						return ( double )$var;
				case "string" :
						$ascii = "";
						$strlen_var = strlen( $var );
						$c = 0;
						for ( ;	$c < $strlen_var;	default :
	switch ( TRUE )
	{
	++$c	)
								{
										$ord_var_c = ord( $var[$c] );
										$ascii .= "\\b";
										continue;
										$ascii .= "\\t";
										continue;
										$ascii .= "\\n";
										continue;
										$ascii .= "\\f";
										continue;
										$ascii .= "\\r";
										continue;
										$ascii .= "\\".$var[$c];
										continue;
										$ascii .= $var[$c];
										continue;
										$char = pack( "C*", $ord_var_c, ord( $var[$c + 1] ) );
										$c += 1;
										$utf16 = self::utf82utf16( $char );
										$ascii .= sprintf( "\\u%04s", bin2hex( $utf16 ) );
										continue;
										$char = pack( "C*", $ord_var_c, ord( $var[$c + 1] ), ord( $var[$c + 2] ) );
										$c += 2;
										$utf16 = self::utf82utf16( $char );
										$ascii .= sprintf( "\\u%04s", bin2hex( $utf16 ) );
										continue;
										$char = pack( "C*", $ord_var_c, ord( $var[$c + 1] ), ord( $var[$c + 2] ), ord( $var[$c + 3] ) );
										$c += 3;
										$utf16 = self::utf82utf16( $char );
										$ascii .= sprintf( "\\u%04s", bin2hex( $utf16 ) );
										continue;
										$char = pack( "C*", $ord_var_c, ord( $var[$c + 1] ), ord( $var[$c + 2] ), ord( $var[$c + 3] ), ord( $var[$c + 4] ) );
										$c += 4;
										$utf16 = self::utf82utf16( $char );
										$ascii .= sprintf( "\\u%04s", bin2hex( $utf16 ) );
								}
								continue;
								$char = pack( "C*", $ord_var_c, ord( $var[$c + 1] ), ord( $var[$c + 2] ), ord( $var[$c + 3] ), ord( $var[$c + 4] ), ord( $var[$c + 5] ) );
								$c += 5;
								$utf16 = self::utf82utf16( $char );
								$ascii .= sprintf( "\\u%04s", bin2hex( $utf16 ) );
						}
						return "\"".$ascii."\"";
				case "array" :
						if ( is_array( $var ) && count( $var ) && array_keys( $var ) !== range( 0, sizeof( $var ) - 1 ) )
						{
								$properties = array_map( array(
										self,
										"name_value"
								), array_keys( $var ), array_values( $var ) );
								foreach ( $properties as $property )
								{
										if ( !Services_JSON::iserror( $property ) )
										{
												continue;
										}
										return $property;
								}
								return "{".join( ",", $properties )."}";
						}
						$elements = array_map( array(
								self,
								"encode"
						), $var );
						foreach ( $elements as $element )
						{
								if ( !Services_JSON::iserror( $element ) )
								{
										continue;
								}
								return $element;
						}
						return "[".join( ",", $elements )."]";
				case "object" :
						$vars = get_object_vars( $var );
						$properties = array_map( array(
								self,
								"name_value"
						), array_keys( $vars ), array_values( $vars ) );
						foreach ( $properties as $property )
						{
								if ( !Services_JSON::iserror( $property ) )
								{
										continue;
								}
								return $property;
						}
						return "{".join( ",", $properties )."}";
				default :
				}
				return self::$use & SERVICES_JSON_SUPPRESS_ERRORS ? "null" : new Services_JSON_Error( gettype( $var )." can not be encoded as JSON string" );
		}

		public function name_value( $name, $value )
		{
				$encoded_value = self::encode( $value );
				if ( Services_JSON::iserror( $encoded_value ) )
				{
						return $encoded_value;
				}
				return self::encode( strval( $name ) ).":".$encoded_value;
		}

		public function reduce_string( $str )
		{
				$str = preg_replace( array( "#^\\s*//(.+)\$#m", "#^\\s*/\\*(.+)\\*/#Us", "#/\\*(.+)\\*/\\s*\$#Us" ), "", $str );
				return trim( $str );
		}

		public function decode( $str, $use = 0 )
		{
				self::$use = $use;
				$str = self::reduce_string( $str );
				switch ( strtolower( $str ) )
				{
				case "true" :
						return TRUE;
				case "false" :
						return FALSE;
				case "null" :
						return;
				default :
						$m = array( );
						if ( is_numeric( $str ) )
						{
								return ( double )$str == ( integer )$str ? ( integer )$str : ( double )$str;
						}
						if ( preg_match( "/^(\"|').*(\\1)\$/s", $str, $m ) && $m[1] == $m[2] )
						{
								$delim = substr( $str, 0, 1 );
								$chrs = substr( $str, 1, -1 );
								$utf8 = "";
								$strlen_chrs = strlen( $chrs );
								$c = 0;
								for ( ;	$c < $strlen_chrs;	default :
	switch ( TRUE )
	{
	++$c	)
										{
												$substr_chrs_c_2 = substr( $chrs, $c, 2 );
												$ord_chrs_c = ord( $chrs[$c] );
												$utf8 .= chr( 8 );
												++$c;
												continue;
												$utf8 .= chr( 9 );
												++$c;
												continue;
												$utf8 .= chr( 10 );
												++$c;
												continue;
												$utf8 .= chr( 12 );
												++$c;
												continue;
												$utf8 .= chr( 13 );
												++$c;
												continue;
												if ( $delim == "\"" && !( $substr_chrs_c_2 != "\\'" ) || ( !( $delim == "'" ) && !( $substr_chrs_c_2 != "\\\"" ) ) )
												{
														$utf8 .= $chrs[++$c];
												}
												continue;
												$utf16 = chr( hexdec( substr( $chrs, $c + 2, 2 ) ) ).chr( hexdec( substr( $chrs, $c + 4, 2 ) ) );
												$utf8 .= self::utf162utf8( $utf16 );
												$c += 5;
												continue;
												$utf8 .= $chrs[$c];
												continue;
												$utf8 .= substr( $chrs, $c, 2 );
												++$c;
												continue;
												$utf8 .= substr( $chrs, $c, 3 );
												$c += 2;
												continue;
												$utf8 .= substr( $chrs, $c, 4 );
												$c += 3;
												continue;
												$utf8 .= substr( $chrs, $c, 5 );
												$c += 4;
										}
										continue;
										$utf8 .= substr( $chrs, $c, 6 );
										$c += 5;
								}
								return $utf8;
						}
						if ( !preg_match( "/^\\[.*\\]\$/s", $str ) || !preg_match( "/^\\{.*\\}\$/s", $str ) )
						{
								break;
						}
						if ( $str[0] == "[" )
						{
								$stk = array(
										SERVICES_JSON_IN_ARR
								);
								$arr = array( );
						}
						else if ( self::$use & SERVICES_JSON_LOOSE_TYPE )
						{
								$stk = array(
										SERVICES_JSON_IN_OBJ
								);
								$obj = array( );
						}
						else
						{
								$stk = array(
										SERVICES_JSON_IN_OBJ
								);
								$obj = new stdClass( );
						}
						array_push( &$stk, array(
								"what" => SERVICES_JSON_SLICE,
								"where" => 0,
								"delim" => FALSE
						) );
						$chrs = substr( $str, 1, -1 );
						$chrs = self::reduce_string( $chrs );
						if ( $chrs == "" )
						{
								if ( reset( &$stk ) == SERVICES_JSON_IN_ARR )
								{
										return $arr;
								}
								return $obj;
						}
						$strlen_chrs = strlen( $chrs );
						$c = 0;
						for ( ;	$c <= $strlen_chrs;	++$c	)
						{
								$top = end( &$stk );
								$substr_chrs_c_2 = substr( $chrs, $c, 2 );
								if ( $c == $strlen_chrs || $chrs[$c] == "," && $top['what'] == SERVICES_JSON_SLICE )
								{
										$slice = substr( $chrs, $top['where'], $c - $top['where'] );
										array_push( &$stk, array(
												"what" => SERVICES_JSON_SLICE,
												"where" => $c + 1,
												"delim" => FALSE
										) );
										if ( reset( &$stk ) == SERVICES_JSON_IN_ARR )
										{
												array_push( &$arr, self::decode( $slice, self::$use ) );
										}
										else
										{
												if ( !( reset( &$stk ) == SERVICES_JSON_IN_OBJ ) )
												{
														continue;
												}
												$parts = array( );
												if ( preg_match( "/^\\s*([\"'].*[^\\\\][\"'])\\s*:\\s*(\\S.*),?\$/Uis", $slice, $parts ) )
												{
														$key = self::decode( $parts[1], self::$use );
														$val = self::decode( $parts[2], self::$use );
														if ( self::$use & SERVICES_JSON_LOOSE_TYPE )
														{
																$obj[$key] = $val;
														}
														else
														{
																$obj->$key = $val;
														}
												}
												else
												{
														if ( !preg_match( "/^\\s*(\\w+)\\s*:\\s*(\\S.*),?\$/Uis", $slice, $parts ) )
														{
																continue;
														}
														$key = $parts[1];
														$val = self::decode( $parts[2], self::$use );
														if ( self::$use & SERVICES_JSON_LOOSE_TYPE )
														{
																$obj[$key] = $val;
														}
														else
														{
																$obj->$key = $val;
														}
												}
										}
								}
								else if ( ( $chrs[$c] == "\"" || $chrs[$c] == "'" ) && $top['what'] != SERVICES_JSON_IN_STR )
								{
										array_push( &$stk, array(
												"what" => SERVICES_JSON_IN_STR,
												"where" => $c,
												"delim" => $chrs[$c]
										) );
								}
								else if ( $chrs[$c] == $top['delim'] && $top['what'] == SERVICES_JSON_IN_STR && ( strlen( substr( $chrs, 0, $c ) ) - strlen( rtrim( substr( $chrs, 0, $c ), "\\" ) ) ) % 2 != 1 )
								{
										array_pop( &$stk );
								}
								else if ( $chrs[$c] == "[" && in_array( $top['what'], array(
												SERVICES_JSON_SLICE,
												SERVICES_JSON_IN_ARR,
												SERVICES_JSON_IN_OBJ
										) ) )
								{
										array_push( &$stk, array(
												"what" => SERVICES_JSON_IN_ARR,
												"where" => $c,
												"delim" => FALSE
										) );
								}
								else if ( $chrs[$c] == "]" && $top['what'] == SERVICES_JSON_IN_ARR )
								{
										array_pop( &$stk );
								}
								else if ( $chrs[$c] == "{" && in_array( $top['what'], array(
												SERVICES_JSON_SLICE,
												SERVICES_JSON_IN_ARR,
												SERVICES_JSON_IN_OBJ
										) ) )
								{
										array_push( &$stk, array(
												"what" => SERVICES_JSON_IN_OBJ,
												"where" => $c,
												"delim" => FALSE
										) );
								}
								else if ( $chrs[$c] == "}" && $top['what'] == SERVICES_JSON_IN_OBJ )
								{
										array_pop( &$stk );
								}
								else
								{
										if ( $substr_chrs_c_2 == "/*" && in_array( $top['what'], array(
												SERVICES_JSON_SLICE,
												SERVICES_JSON_IN_ARR,
												SERVICES_JSON_IN_OBJ
										) ) )
										{
												array_push( &$stk, array(
														"what" => SERVICES_JSON_IN_CMT,
														"where" => $c,
														"delim" => FALSE
												) );
												++$c;
										}
										else
										{
												if ( !( $substr_chrs_c_2 == "*/" ) && !( $top['what'] == SERVICES_JSON_IN_CMT ) )
												{
														continue;
												}
												array_pop( &$stk );
												++$c;
												$i = $top['where'];
												for ( ;	$i <= $c;	++$i	)
												{
														$chrs = substr_replace( $chrs, " ", $i, 1 );
												}
										}
								}
						}
						if ( reset( &$stk ) == SERVICES_JSON_IN_ARR )
						{
								return $arr;
						}
						if ( !( reset( &$stk ) == SERVICES_JSON_IN_OBJ ) )
						{
								break;
						}
						return $obj;
				}
		}

		public function isError( $data, $code = NULL )
		{
				if ( class_exists( "pear" ) )
				{
						return PEAR::iserror( $data, $code );
				}
				if ( is_object( $data ) && ( get_class( $data ) == "services_json_error" || is_subclass_of( $data, "services_json_error" ) ) )
				{
						return TRUE;
				}
				return FALSE;
		}

}

if ( !defined( "InShopNC" ) )
{
		exit( "Access Invalid!" );
}
define( "SERVICES_JSON_SLICE", 1 );
define( "SERVICES_JSON_IN_STR", 2 );
define( "SERVICES_JSON_IN_ARR", 3 );
define( "SERVICES_JSON_IN_OBJ", 4 );
define( "SERVICES_JSON_IN_CMT", 5 );
define( "SERVICES_JSON_LOOSE_TYPE", 16 );
define( "SERVICES_JSON_SUPPRESS_ERRORS", 32 );
if ( class_exists( "PEAR_Error" ) )
{
		class Services_JSON_Error extends PEAR_Error
		{

				public function Services_JSON_Error( $message = "unknown error", $code = NULL, $mode = NULL, $options = NULL, $userinfo = NULL )
				{
						parent::pear_error( $message, $code, $mode, $options, $userinfo );
				}

		}

}
else
{
		class Services_JSON_Error
		{

				public function Services_JSON_Error( $message = "unknown error", $code = NULL, $mode = NULL, $options = NULL, $userinfo = NULL )
				{
						parent::pear_error( $message, $code, $mode, $options, $userinfo );
				}

		}

}
?>
