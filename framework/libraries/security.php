<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Security
{

		public static function getToken( )
		{
				$token = substr( md5( substr( time( ), 0, -7 ).md5( MD5_KEY ) ), 8, 8 );
				echo "<input type='hidden' name='formhash' value='".$token."' />";
		}

		public static function checkToken( )
		{
				$token = $_POST['formhash'];
				$input_token = substr( md5( substr( time( ), 0, -7 ).md5( MD5_KEY ) ), 8, 8 );
				if ( $token != $input_token )
				{
						$error = "token is error!";
						throw_exception( $error );
				}
				return TRUE;
		}

		public static function fliterXss( $input )
		{
				$patterns = array( "/<script.*>.*<\\/script>/siU", "/<iframe.*>.*<\\/iframe>/siU", "/<input(.*submit.*)(\\>|\\/\\>)/siUe", "/<form(.*action.*)>/siUe", "/on(abort|activate|afterprint|afterupdate|beforeactivate|beforecopy|beforecut|beforedeactivate|beforeeditfocus|beforepaste|beforeprint|beforeunload|beforeupdate|blur|bounce|cellchange|change|click|contextmenu|controlselect|copy|cut|dataavailable|datasetchanged|datasetcomplete|dblclick|deactivate|drag|dragend|dragenter|dragleave|dragover|dragstart|drop|error|errorupdate|filterchange|finish|focus|focusin|focusout|help|keydown|keypress|keyup|layoutcomplete|load|losecapture|mousedown|mouseenter|mouseleave|mousemove|mouseout|mouseover|mouseup|mousewheel|move|moveend|movestart|paste|propertychange|readystatechange|reset|resize|resizeend|resizestart|rowenter|rowexit|rowsdelete|rowsinserted|scroll|select|selectionchange|selectstart|start|stop|submit|unload)\\s*=\\s*('|\")[^\"]*('|\")/i" );
				$replacements = array( "", "", "", "", "" );
				return preg_replace( $patterns, $replacements, $input );
		}

		public static function fliterHtmlSpecialChars( $string )
		{
				$string = preg_replace( "/&amp;((#(\\d{3,5}|x[a-fA-F0-9]{4})|[a-zA-Z][a-z0-9]{2,5});)/", "&\\1", str_replace( array( "&", "\"", "<", ">" ), array( "&amp;", "&quot;", "&lt;", "&gt;" ), $string ) );
				return $string;
		}

		public static function getAddslashesForInput( $array, $ignore = array( ) )
		{
				if ( !empty( $array ) )
				{
						while ( list( $k, $v ) = each( &$array ) )
						{
								if ( is_string( $v ) )
								{
										if ( $k == "statistics_code" )
										{
												$v = $v;
										}
										else
										{
												$v = self::fliterxss( $v );
												if ( !in_array( $k, $ignore ) )
												{
														$v = self::fliterhtmlspecialchars( $v );
												}
												else
												{
														$v = str_ireplace( array( "<script", "<iframe" ), array( "&lt;script", "&lt;iframe" ), $v );
												}
										}
										if ( !get_magic_quotes_gpc( ) )
										{
												$array[$k] = addslashes( trim( $v ) );
										}
										else
										{
												$array[$k] = trim( $v );
										}
								}
								else if ( is_array( $v ) )
								{
										if ( $k == "statistics_code" )
										{
												$array[$k] = $v;
										}
										else
										{
												$array[$k] = self::getaddslashesforinput( $v );
										}
								}
						}
						return $array;
				}
				return FALSE;
		}

}

if ( !defined( "InShopNC" ) )
{
		exit( "Access Invalid!" );
}
?>
