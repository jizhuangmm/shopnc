<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class CategoryCache
{

		private $path = NULL;
		public static $_instance = NULL;

		private function __construct( )
		{
				$this->path = BasePath.DS."cache".DS."category".DS;
		}

		public static function getInstance( )
		{
				if ( is_null( self::$_instance ) )
				{
						self::$_instance = new self( );
				}
				return self::$_instance;
		}

		public function setPath( $url_str )
		{
				$this->path = $url_str;
		}

		public function getPath( )
		{
				return $this->path;
		}

		public function has( $gc_id )
		{
				return is_file( $this->path.$gc_id.".php" );
		}

		public function read( $gc_id )
		{
				if ( !is_file( $this->path.$gc_id.".php" ) )
				{
						return FALSE;
				}
				include( $this->path.$gc_id.".php" );
				return $data;
		}

		public function write( $name, $content )
		{
				if ( !( $fp = @fopen( $this->path.$name.".php", "w" ) ) )
				{
						return FALSE;
				}
				$content = "<?php !defined('InShopNC') && exit('Access denied'); \$data = ".str_replace( array( "\r", "\n", "\t" ), NULL, var_export( $content, TRUE ) ).";";
				flock( $fp, 2 );
				fwrite( $fp, $content );
				flock( $fp, 3 );
				fclose( $fp );
				return TRUE;
		}

}

?>
