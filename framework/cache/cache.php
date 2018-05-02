<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Cache
{

		protected $params = NULL;
		protected $enable = NULL;
		protected $handler = NULL;

		public function connect( $type, $args = array( ) )
		{
				if ( empty( $type ) )
				{
						$type = c( "cache.type" );
				}
				$type = strtolower( $type );
				$class = "Cache".ucwords( $type );
				if ( !class_exists( $class ) )
				{
						import( "cache.cache#".$type );
				}
				return new $class( $args );
		}

		public static function getInstance( )
		{
				$args = func_get_args( );
				return get_obj_instance( "Cache", "connect", $args );
		}

}

if ( !defined( "InShopNC" ) )
{
		exit( "Access Invalid!" );
}
?>
