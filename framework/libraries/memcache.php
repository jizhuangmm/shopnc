<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class ncMemcache
{

		private static $config = NULL;
		private static $type = NULL;
		private static $prefix = NULL;
		private static $enable = FALSE;
		private static $instance = NULL;
		private static $memcache = NULL;

		private function __construct( )
		{
		}

		public static function getInstance( )
		{
				self::$config = c( "memcache" );
				if ( extension_loaded( "memcache" ) )
				{
				}
				if ( !self::$config['enable'] )
				{
						self::$enable = FALSE;
				}
				else if ( self::$instance === NULL || !self::$instance instanceof ncMemcache )
				{
						self::$instance = new self( );
						self::$instance->init( );
				}
		}

		private function init( )
		{
				self::$prefix = self::$config['prefix'] ? self::$config['prefix'] : substr( md5( $_SERVER['HTTP_HOST'] ), 0, 6 )."_";
				self::$memcache = new Memcache( );
				if ( function_exists( "memcache_add_server" ) )
				{
						self::$enable = self::$memcache->addServer( self::$config['host'], self::$config['port'], self::$config['pconnect'] ? TRUE : FALSE );
				}
				else
				{
						$func = self::$config['pconnect'] ? "pconnect" : "connect";
						self::$enable = @self::$memcache->$func( self::$config['host'], self::$config['port'] );
				}
		}

		public function isConnected( )
		{
				self::getinstance( );
				return self::$enable;
		}

		public function set( $key, $value, $type = "", $ttl = FILE_EXPIRE )
		{
				self::$type = $type;
				return self::$memcache->set( @self::_key( $key ), $value, MEMCACHE_COMPRESSED, $ttl );
		}

		public function get( $key, $type = "" )
		{
				self::$type = $type;
				return self::$memcache->get( @self::_key( $key ) );
		}

		public function rm( $key, $type = "" )
		{
				self::$type = $type;
				return self::$memcache->rm( @self::_key( $key ) );
		}

		public function clear( )
		{
				return self::$memcache->flush( );
		}

		private function _key( $str )
		{
				return self::$prefix.self::$type.$str;
		}

}

if ( !defined( "InShopNC" ) )
{
		exit( "Access Invalid!" );
}
?>
